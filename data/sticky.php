<?php

function getSticky(){
    $ret=array();
    if(file_exists("sticky.txt")){
        $content=file_get_contents("sticky.txt");
        if(!$content){
            $content='';
        }
    }else{
        $content='';
    }
    $ret['content'] = $content;
    return $ret;
}

function storeSticky($data){
    $ret=array();
    file_put_contents("sticky.txt",$data);
    $ret['success']='OK';
    return $ret;
}


header('Content-type:text/javascript;charset=UTF-8');
$action = $_GET["action"];

switch ($action) {
    case "load":
    $ret = getSticky();
    break;

    case "save":
    $ret = storeSticky($_GET["text"]);
    break;
}

echo json_encode($ret);
?>
