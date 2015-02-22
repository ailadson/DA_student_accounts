<?php

function encodeComma($str){
    return str_replace(",","&#44;",$str);
}

function decodeComma($str){
    return str_replace("&#44;",",",$str);
}

function getContentFromString($contentString){
    $splitContent = explode(',', $contentString);
    $rtnArray = array();
    foreach($splitContent as $kvPair){
        $kvArray = explode(":",$kvPair,2);
        $rtnArray[trim($kvArray[0])] = trim($kvArray[1]);
    }
    return $rtnArray;
}

function verifyUsername($name, $entries){
    foreach ($entries as $entry){
        if($entry["title"]['$t'] == $name){
            $content = getContentFromString($entry["content"]['$t']);
            
//            if($content["password"] != $pw){
//                return false;
//            }
        
            $content["name"] = $name;
            return $content;
        }
    }
    return false;
}

function packChallenges($content, $challenges){
    foreach ($challenges as $challenge){
        if($challenge["title"]['$t'] == $content["name"]){
            $c = getContentFromString($challenge["content"]['$t']);
            $content["challenges"] = $c;
            return $content;
        }
    }
}

function getContentFromGSX($challenge){
    $a = array();
    foreach($challenge as $key => $value){
        if(strpos($key,'gsx$') === 0 && (bool)$value['$t']){
            $a[str_replace('gsx$', '', $key)] = $value['$t'];
        }
    }
    return $a;
}

function packChallengeInfo($content, $challengeInfo){
    $content["challengeInfo"] = array();
    foreach ($challengeInfo as $info){
        $content["challengeInfo"][strtolower(str_replace(" ","",str_replace(":","",$info["title"]['$t'])))] = getContentFromGSX($info);
    }
    return $content;
}

function packSurveyInfo($info){
    $a = array();
    foreach($info as $key => $record) {
        $a[$key] = getContentFromGSX($record);
    }
    return $a;
}

function saveID($loc,$id){
//   //extract data
    if(file_exists($loc)){
        $data = file_get_contents($loc);
        $len = strlen($data);
    } else {
        $len = 0;
    }
    
    $id_fp = fopen($loc, 'w+');
    if($len > 0){
        $data .= ' : ';
    } else {
        $data = "";
    }
    
    $data .= $id;
    
    //write and return
    fwrite($id_fp, $data);
    fclose($id_fp);
}
function getProfile($username){
    $path = getProfilePath($username);
    return json_decode(file_get_contents($path),true);
}

function saveProfile($username,$profile){
    $path = getProfilePath($username);
    $data = json_encode($profile);
    file_put_contents($path,$data);
}

function getProfilePath($username){
    $name = str_replace(" ","_",$username);
    $path = 'data/profiles/'.$name.'.json';
    return $path;
}

?>