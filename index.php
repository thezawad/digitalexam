<?php
error_reporting(0);
$self=$_SERVER['PHP_SELF'];
$pass=$_POST['pass'];
if ($pass=="teacher" || $pass=="master") {
?>
<?php
include('header.php');
?>
<center>
<font color="green"><h1>Welcome to Digital Exam System</h1></font><br/><br/><br/>
<p><font color="red" size="4"><b>Digital Exam System</b> is a software to make it easier to run an exam. It works smoothly. All you need is Login to your system -> Create Exam -> Add Question -> View Exam -> View Exam Final -> Select Your Exam -> Click 'Go'. <br/>
Share this link with your student or ask them to connect your Wi-Fi network and you're done! :-)<br/>
<b>Digital Exam System</b> is a centralized classroom exam management and MCQ exam solution. When you're in class just complete your discussion on specific Topic(s) and then ask your students to attend in the examination with their Wi-Fi enabled digital device.<br/>
<br/>Students just need to open the link or android app -> Enter their Name and Roll -> And Answer Then question(s) -> Click Submit for correction.<br/>
They will instantly get the answer(s) and score.<br/>
You may also have a look over individual student's result. Just Click Check Result -> Enter student's roll -> Click check and you're done! You can see student's roll , name , exam name and result</font></p>
</center>
<?php
}
else {
echo "<head><title>Digital Exam System Login || DreamTeam ALDC</title></head>";
echo "<center><h1>Login to Digital Exam System</h1></center>";
echo "<body background=\"images/bubble.png\">";
echo "<center><form action=\"$self\" method=\"post\"><input type=\"password\" name=\"pass\"><input type=\"submit\" name=\"submit\" value=\"Login\"></form></center></form></body>";
}
include ('footer.php');
?>