<?php
include('header_exam.php');
$exid = $_GET['exid'];
require('connect.php');
$query = "SELECT * FROM questions WHERE eid='$exid' ORDER BY id";
$titq = "SELECT * FROM exams WHERE id='$exid'";
$results = mysql_query($query) or die($query);
$num = mysql_num_rows($results);
$ex = mysql_fetch_object(mysql_query($titq));

print("
<html>
	<head>
		<title>$ex->title</title>
		<link type=\"text/css\" rel=\"stylesheet\" href=\"exam.css\">
	</head>
	
	<body>
		
		<form action=\"correction.php\" method=\"POST\">
		<center>Name: <input type=\"text\" name=\"name\"><br/>
		Roll: <input type=\"text\" name=\"roll\"><br/>
		<input type=\"hidden\" name=\"do\" value=\"correct\">
		<input type=\"hidden\" name=\"q$i\" value=\"$quid\">
		<H1>$ex->title ($ex->date)</H1>
		<hr>");
for($i = 0; $i < $num; $i++){
	$quid = mysql_result($results,$i,'id');
	$q = mysql_result($results,$i,'q');
	$a1 = mysql_result($results,$i,'a1');
	$a2 = mysql_result($results,$i,'a2');
	$a3 = mysql_result($results,$i,'a3');
	$a4 = mysql_result($results,$i,'a4');
	$comments = mysql_result($results,$i,'comments');
	$pik = mysql_result($results,$i,'pic');
	$j = $i + 1;

print("
<br>

<p class=\"question\">$j. $q</p>
<input type=\"hidden\" name=\"q$i\" value=\"$quid\">
");

if($pik != -1)
{
	echo "<center><IMG SRC=\"getpik.php?pid=$pik\"></center><br>";
}

print("
<blockquote>
<div align=\"justify\">
<label>a)<input type=\"radio\" name=\"$quid\" value=\"1\"><span class=\"answer\"> $a1</span></label><br>
<label>b)<input type=\"radio\" name=\"$quid\" value=\"2\"><span class=\"answer\"> $a2</span></label><br>
<label>c)<input type=\"radio\" name=\"$quid\" value=\"3\"><span class=\"answer\"> $a3</span></label><br>
<label>d)<input type=\"radio\" name=\"$quid\" value=\"4\"><span class=\"answer\"> $a4</span></label><br>
</div>
</blockquote>
<br>");

if($comments != '' && $comments != 'No comments')
echo("<p class=\"comments\" align=\"left\">$comments</p>");

echo("<br>
<hr>");
}
print("<input type=\"hidden\" name=\"qnum\" value=\"$num\"><input type=\"hidden\" name=\"xamz\" value=\"$ex->title\"> <center> <input type=\"submit\" value=\"Submit for correction\"></center></form></body></html>");
include('footer.php');
?>
