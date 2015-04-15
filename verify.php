<?php
//not working yet :/
require('connect.php');
include('header.php');
$roll=urldecode($_GET['roll']);
$name=urldecode($_GET['name']);
$score=urldecode($_GET['score']);
$self=$_SERVER['PHP_SELF'];
if ($_GET['sub']) {
$sqlq='SELECT * FROM `student` WHERE `name` LIKE "$name" ';
$runq=mysql_query($sqlq);
$numr=mysql_num_rows($runq);
if (!$numr==1) {
echo "<center><h1><font color=\"red\">This is not an AUTHENTIC certificate</font></h1></center>";
echo "$numr";
}
else {
echo "<center><h1><font color=\"green\">This is  an AUTHENTIC certificate</font></h1></center>";
}
}
else {
echo "<center><form action=\"$self\" method=\"get\">Name: <input type=\"text\" name=\"name\"><br/>Roll: <input type=\"text\" name=\"roll\"><br/>Score: <input type=\"text\" name=\"score\"><br/><input type=\"submit\" name=\"sub\" value=\"Verify\"><br/></form></center>";
}
include('footer.php');
?>
