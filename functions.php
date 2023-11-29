<?php 

$errorTitle = $errorContent = "";
$topic = $content = "";
$displayTopic= $displayContent = "";

function validateTopic($topic){
    $topic = trim($_POST['topic']);
    if (empty($topic)) {
        return '*กรุณากรอกข้อมูล';
    }elseif(strlen($topic) < 4 || strlen($topic) > 140){
        return  '*ชื่อกระทู้ต้องมีความยาว 4–140 ตัวอักษร';
    }elseif(strip_tags($topic) !== $topic){
        return '*ชื่อกระทู้ต้องไม่มี HTML';
    }
}

function validateContent($content){
    $content = trim($_POST['content']);
    if (empty($content)) {
        return '*กรุณากรอกข้อมูล';
    }elseif(strlen($content) < 6 || strlen($content) > 2000){
        return '*ชื่อกระทู้ต้องมีความยาว 6–2000 ตัวอักษร';
    }else{
        return $content="";
    }
}

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $errorTitle = validateTopic($_POST['topic']);
    $errorContent = validateContent($_POST['content']);
    if(empty($errorContent) && empty($errorTitle)){
        $displayTopic = htmlspecialchars($_POST['topic']);
        $displayContent = nl2br(htmlspecialchars($_POST['content']));
    }else{
        $topic = $_POST['topic'];
        $content = $_POST['content'];
    }
}


