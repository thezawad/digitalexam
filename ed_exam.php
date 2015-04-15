<?php
include('header.php');
if(isset($_GET['exid']))
$exid = $_GET['exid'];
else
$exid = 1;
require('connect.php');
$query = "SELECT * FROM questions WHERE eid='$exid' ORDER BY id";
$results = mysql_query($query) or die($query);
$num = mysql_num_rows($results);

include_once "functions.php";
$exs = get_ex();
$xnum = mysql_num_rows($exs);
$xmen = "<select name=\"exid\">
	<option selected>Select Exam</option>\n";
for($i = 0; $i < $xnum; $i++)
{
	$title = mysql_result($exs,$i,'title');
	$id = mysql_result($exs,$i,'id');
	$dat = mysql_result($exs, $i,'date');
	$xmen .= "	<option value=\"$id\">$title ($dat)</option>\n";
}
$xmen .= "</select>";

print("<html>
<body>
<center><form action=\"\" method=\"get\">$xmen<span><input type=\"submit\" value=\"go\"></span></form></center>

");
for($i = 0; $i < $num; $i++){
	$quid = mysql_result($results,$i,'id');
	$q = mysql_result($results,$i,'q');
	$a1 = mysql_result($results,$i,'a1');
	$a2 = mysql_result($results,$i,'a2');
	$a3 = mysql_result($results,$i,'a3');
	$a4 = mysql_result($results,$i,'a4');
	$comments = mysql_result($results,$i,'comments');
	$correct = mysql_result($results,$i,'correct');
	$pik = mysql_result($results,$i,'pic');
	$j = $i + 1;

print("
<script language=\"javascript\">
<!--
   function confdel$quid(){
   if(confirm('Are you sure you want to delete question $j?'))
   document.del$quid.submit();
   }
// -->
</script>
<br>
<center>
<h2>Question $j 
<form action=\"question.php\" method=\"POST\">
<input type=\"hidden\" name=\"do\" value=\"edit\">
<input type=\"hidden\" name=\"qid\" value=\"$quid\">
<input type=\"submit\" value=\"edit\">
</form>
<form action=\"question.php\" method=\"POST\" name=\"del$quid\">
<input type=\"hidden\" name=\"do\" value=\"del\">
<input type=\"hidden\" name=\"qid\" value=\"$quid\">
<input type=\"hidden\" name=\"exid\" value=\"$exid\">
<input type=\"button\" value=\"Delete\" onClick=\"javascript:confdel$quid()\">
</form>
</h2>
<hr>
<h3>$q</h3>");

if($pik != -1)
{
	echo "<IMG SRC=\"getpik.php?pid=$pik\"><br>";
}
$c1 = ''; $c2 = ''; $c3 = ''; $c4 = '';
switch($correct)
{
	case 1:
		$c1 = 'checked';
		break;
	case 2:
		$c2 = 'checked';
		break;
	case 3:
		$c3 = 'checked';
		break;
	case 4:
		$c4 = 'checked';
		break;
}

print("
<blockquote>
<blockquote>
<blockquote>
<blockquote>
<blockquote>
<div align=\"justify\">
<label><input $c1 type=\"radio\">$a1</label><br>
<label><input $c2 type=\"radio\">$a2</label><br>
<label><input $c3 type=\"radio\">$a3</label><br>
<label><input $c4 type=\"radio\">$a4</label><br>
</div>
</blockquote>
</blockquote>
</blockquote>
</blockquote>
</blockquote>
<br>
<hr>
");
}
include ('footer.php');
?>
