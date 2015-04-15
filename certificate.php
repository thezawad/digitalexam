<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
error_reporting(0);
require('connect.php');
$name=$_POST['nname'];
$roll=$_POST['rroll'];
$score=$_POST['sscore'];
$examname=$_POST['xxam'];
if ($_POST['getca']) {
?>
<html>
<head>
<title>Certificate || DreamTeam ALDC</title>


<style type="text/css">
/*----------Text Styles----------*/
.ws6 {font-size: 8px;}
.ws7 {font-size: 9.3px;}
.ws8 {font-size: 11px;}
.ws9 {font-size: 12px;}
.ws10 {font-size: 13px;}
.ws11 {font-size: 15px;}
.ws12 {font-size: 16px;}
.ws14 {font-size: 19px;}
.ws16 {font-size: 21px;}
.ws18 {font-size: 24px;}
.ws20 {font-size: 27px;}
.ws22 {font-size: 29px;}
.ws24 {font-size: 20px;}
.ws26 {font-size: 35px;}
.ws28 {font-size: 37px;}
.ws36 {font-size: 48px;}
.ws48 {font-size: 64px;}
.ws72 {font-size: 96px;}
.wpmd {font-size: 13px;font-family: 'Arial';font-style: normal;font-weight: normal;}
/*----------Para Styles----------*/
DIV,UL,OL /* Left */
{
 margin-top: 0px;
 margin-bottom: 0px;
}
</style>

<style type="text/css">
div#container
{
	position:relative;
	width: 1070px;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}
body {text-align:center;margin:0}
</style>

</head>

<body>

<div id="container">
<div id="image1" style="position:absolute; overflow:hidden; left:0px; top:1px; width:1070px; height:685px; z-index:0"><img src="images/cert.png" alt="" title="" border=0 width=1070 height=685></div>

<div id="text1" style="position:absolute; overflow:hidden; left:202px; top:123px; width:709px; height:42px; z-index:1">
<div class="wpmd">
<div><font color="#3366FF" face="Arial" class="ws24"><B>This certificate is awarded for <?php echo "$examname"; ?> Examination to</B></font></div>
</div></div>

<div id="text2" style="position:absolute; overflow:hidden; left:403px; top:215px; width:287px; height:66px; z-index:2">
<div class="wpmd">
<div><font face="Arial" class="ws24"><b>Name: </b><?php echo "$name"; ?></font></div>
</div></div>

<div id="text3" style="position:absolute; overflow:hidden; left:403px; top:270px; width:262px; height:44px; z-index:3">
<div class="wpmd">
<div><font face="Arial" class="ws24"><b>Roll: </b><?php echo "$roll"; ?></font></div>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:403; top:325px; width:255px; height:39px; z-index:4">
<div class="wpmd">
<div><font face="Arial" class="ws24"><b>Score: </b><?php echo "$score"; ?></font></div>
</div></div>

<div id="text5" style="position:absolute; overflow:hidden; left:137px; top:393px; width:238px; height:158px; z-index:5">
<div class="wpmd">
<div><img src="<?php echo "http://chart.apis.google.com/chart?cht=qr&chs=150x100&chl=$name $roll $score $examname&chld=H|0"; ?>"></div>
</div></div>

<div id="text6" style="position:absolute; overflow:hidden; left:748px; top:538px; width:225px; height:62px; z-index:6">
<div class="wpmd">
<div align=center><font color="#FF0000" face="Arial" class="ws18">Powered by:</font></div>
<div align=center><font color="#FF0000" face="Arial" class="ws18">Digital Exam System</font></div>
</div></div>


</div></body>
</html>
<?php
}
else {
echo " error";
}
?>
