<?php 
    
    function sanatizeAssocArray($obj, $remove){
        $sanatized = array();
        
        foreach($obj as $key => $val){
            if(!in_array($key,$remove)){
                $sanatized[$key] = $val;
            }
        }
        
        return $sanatized;
    }
?>