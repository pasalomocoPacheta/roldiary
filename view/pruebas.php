<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');
include (FORMULARIOS_PATH."pruebaformularios.php");
echo "<br>";
echo "<br>";

var_dump(IMG_PATH);

$path = constant(IMG_PATH);
echo "";
echo "<br>";
echo $_SERVER['DOCUMENT_ROOT'];
echo "<br>";
echo "<br>";
echo $_SERVER['HTTP_HOST'];

?>