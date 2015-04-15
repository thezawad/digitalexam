<?php
include('header_exam.php');
if(isset($_POST['do']) && $_POST['do'] == 'correct')
{
	include("functions.php");
	include("connect.php");
	$name=$_POST['name'];
	$roll=$_POST['roll'];
        $examname=$_POST['xamz'];
	$num = $_POST['qnum'];
	$points = 0;
	echo "<center>";
	echo "Name:  <b>$name</b>";

echo "<br/>";
echo "Roll:   <b>$roll</b>";
echo "<br/>";
echo "</center>";
	for($i = 0; $i < $num;$i++)
	{
		$quid = $_POST["q$i"];
		$ans = $_POST[$quid];
		$a = get_answer($quid);
		$a = $a->correct;
		$j = $i+1;

		if($ans == $a)
		{
			$points++;
			
		}
echo "<center>";

		echo("Question $j: Your answer: <b>$ans -- Correct: <font color=\"green\">$a</font></b> <br>");
	}
	$score="$points/$num";
	$query_z="INSERT into `student` (name,roll,score,examname) VALUES ('$name','$roll','$score','$examname')";
        if(@mysql_query($query_z)) {
	echo("<hr>You got <b><font color=\"blue\">$points/$num</font></b>");
	echo "</center>";
	echo "<br/><br/><center><form action=\"certificate.php\" method=\"post\"><input type=\"hidden\" name=\"nname\" value=\"$name\"><input type=\"hidden\" name=\"rroll\" value=\"$roll\"><input type=\"hidden\" name=\"sscore\" value=\"$score\"><input type=\"hidden\" name=\"xxam\" value=\"$examname\"><input type=\"submit\" name=\"getca\" value=\"Get Certificate\"></form></center>";
	}
}
include('footer.php');
?>
