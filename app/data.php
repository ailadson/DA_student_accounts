<?php
    require("sanatize.php");

    $dir = "data/".$_GET["type"]."/".$_GET["name"]."/";

    $files = scandir($dir);
    $data = array(
        "d" => array()
    );
    $index = 0;

    foreach ($files as $file) {
        if($file != '.' && $file != '..'){
            $myfile = fopen($dir.$file, "r");
            $content = fread($myfile,filesize($dir.$file));
            fclose($myfile);
            
            if($file == "meta.json"){
                $data['m'] = json_decode($content,true)["meta"];
            } else {
                $data['d'][$index] = sanatizeAssocArray(json_decode($content, true), array("id"));
            }
            $index += 1;
        }
    }

    echo json_encode($data);
?>