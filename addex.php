<?php
if(isset($_POST['do']))
{
	$do = $_POST['do'];
	include_once("functions.php");
	if($do == 'add')
	{
		$date = $_POST['dm']."-".$_POST['dy'];
		add_ex($_POST['title'],$date);
		include "manex.php";
		die();
	}
	elseif($do == 'doedit')
	{
		$date = $_POST['dm']."-".$_POST['dy'];
		edit_ex($_POST['title'],$date, $_POST['exid']);
		include "manex.php";
		die();
	}
	elseif($do == 'del')
	{
		del_ex($_POST['exid']);
		include "manex.php";
		die();
	}
	elseif($do == 'edit')
	{
		$dov = 'doedit';
		$subval = 'edit';
		$x = get_1ex($_POST['exid']);
		$title = $x->title;
		$extra = "<input type=\"hidden\" name=\"exid\" value=\"$x->id\">";
	}
		
}
else
{
	$dov = 'add';
	$subval = 'Add';
	$title = '';
	$extra = '';
}

?>

<?php include('header.php'); ?>

<body>
<center>
<form action="addex.php" method="post" name="" id="">
 <?php echo"$extra" ?>
  <p>Add an exam
    <input name="do" type="hidden" id="do" value="<?php echo "$dov" ?>">
  </p>
  <p>Exam Name
    <input name="title" type="text" id="title" value="<?php echo "$title" ?>" size="25">    
    <br>
    Exam Date:
    <select name="dm" id="dm">
      <option value="0" selected>Month</option>
      <option value="01">Jan</option>
      <option value="02">Feb</option>
      <option value="03">Mar</option>
      <option value="04">Apr</option>
      <option value="05">May</option>
      <option value="06">Jun</option>
      <option value="07">Jul</option>
      <option value="08">Aug</option>
      <option value="09">Sep</option>
      <option value="10">Oct</option>
      <option value="11">Nov</option>
      <option value="12">Dec</option>
    </select>
    <select name="dy" id="dy">
      <option value="0" selected>Year</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
    </select>  
    <br>
    <input type="submit" value="<?php echo"$subval" ?>">
  </p>
</form>
</center>
</body>
</html>
<?php include('footer.php'); ?>