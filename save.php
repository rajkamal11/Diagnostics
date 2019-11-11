<?php
if(!empty($_POST['data'])){
$data = $_POST['data'];
$name = explode('@@@@@@',$data);
$fname = $name[0].".txt";//generates random name

$file = fopen('uploads/'.$fname, 'w');//creates new file
fwrite($file, $data);
fclose($file);
}
?>