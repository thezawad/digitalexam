<?php
$query = "SELECT * FROM exams ORDER BY id";
require("connect.php");
$ex = mysql_query($query) or die($query);
$xnum = mysql_num_rows($ex);
?>

<?php include('header.php'); ?>


<body>
<center><h2>Exams</h2></center>
<center>
<table width="331" border="1">
  <tr>
    <th width="176" scope="col">Title</th>
    <th width="78" scope="col">Date</th>
    <th width="20" scope="col">Delete</th>
    <th width="29" scope="col">Edit</th>
  </tr>
  </center>


<?php
for($i = 0; $i < $xnum; $i++)
{

	$id = mysql_result($ex,$i,'id');
	$title = mysql_result($ex,$i,'title');
	$date = mysql_result($ex,$i,'date');
	echo("
	<script language=\"javascript\">
<!--
   function confdel$id(){
   if(confirm('Are you sure you want to delete the exam and ALL its questions?'))
   document.del$id.submit();
   }
// -->
</script>
	  <tr>
    <td> $title</td>
    <td>$date</td>
    <td><form action=\"addex.php\" method=\"post\" name=\"del$id\"><input type=\"hidden\" name=\"do\" value=\"del\"><input type=\"hidden\" name=\"exid\" value=\"$id\"><input type=\"submit\" value=\"del\" onClick=\"javascript:confdel$id()\"></form></td>
    <td><form action=\"addex.php\" method=\"post\"><input type=\"hidden\" name=\"do\" value=\"edit\"><input type=\"hidden\" name=\"exid\" value=\"$id\"><input type=\"submit\" value=\"edit\"></form></td>
  </tr>
  ");
 }

	?>
	</table>
</body>
</html>
<?php  include('footer.php'); ?>
