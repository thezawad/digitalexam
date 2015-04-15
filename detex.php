<?php
//HTML Head
include("header.php");
//error reporting turned off
error_reporting(0);
// Adding config file for database
require("connect.php");
//PHP Starts

if ($_POST['go']) {
$roll=$_POST['roll'];
/
$self=$_SERVER['PHP_SELF'];





$sql="SELECT * FROM `student` WHERE `roll`='$roll'";

$za=mysql_query($sql);
if (!$za) {
die(mysql_error());
}
/
echo "<center><table border=\"0\"><tr style=\"font-size: 20px;
color: #000;\">
<td width=\"100\" ><b>ROLL</b></td>
<td width=\"200\" ><b>NAME</b></td>
<td width=\"300\"><b>EXAM NAME</b></td>
<td width=\"100\"><b>RESULT</b></td>
</tr></table></center>";
echo "<!--";
echo "-->";
while ($row1=mysql_fetch_array($za, MYSQL_ASSOC))
{

echo  "<center><table border=\"1\">

";
echo"
<tr>
<td width=\"100\"><b>{$row1['roll']}<b></td>
<td width=\"200\"><b>{$row1['name']}</b></td>
<td width=\"300\"><b>{$row1['examname']}</b></td>
<td width=\"100\"><b>{$row1['score']}</b></td>
</tr>
</table></center>";

}


}

else
{
// Printing form
echo "<center><b>Please enter students roll to check result</b><br/><br/><form method=\"post\" action=\"$self\">Roll: <input type=\"text\"   name=\"roll\" value=\"\"><br/><input type=\"submit\" name=\"go\" value=\"Check\"></form><center>";
}
// HTML Footer
include("footer.php");
?>
</html>
