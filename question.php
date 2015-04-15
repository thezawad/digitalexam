<?php
if(isset($_POST['do'])){
	include_once('functions.php');
	if($_POST['do'] == 'add')
	{
		
		add_q($_POST['exid'],$_POST['question'],$_POST['a1'],$_POST['a2'],$_POST['a3'],$_POST['a4'],$_POST['answer'],$_POST['comments'],$_POST['pik']);
		echo "<center><b>Question added succesfully</b></center>";
		include("question_form.php");
	}
	
	elseif($_POST['do'] == 'edit')
	{
		$d = get_question($_POST['qid']); 
		$c1 = ''; $c2 = ''; $c3 = ''; $c4 = '';
switch($d->correct)
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
	?>
<?php include('header.php'); ?>

<body bgcolor="#FFFFFF" text="#000000">
<form method="post" action="">
<input type="hidden" name="do" value="doedit">
<input type="hidden" name="exid" value="<?php echo("$d->eid") ?>">
<input type="hidden" name="id" value="<?php echo("$d->id"); ?>">
    Question: <textarea name="question" cols="120" rows="3"><?php echo("$d->q"); ?></textarea>
  </p>
  <p>
 Answers (Tick the correct answer.): <br/> 
    Answer 1: <input type="radio" <?php echo"$c1" ?> name="answer" value="1">
    <input type="text" name="a1" value="<?php echo("$d->a1"); ?>" size="75">
  </p>
  <p> 
    Answer 2: <input type="radio" <?php echo"$c2" ?> name="answer" value="2">
    <input type="text" name="a2" value="<?php echo("$d->a2"); ?>" size="75">
  </p>
  <p> 
    Answer 3: <input type="radio" <?php echo"$c3" ?> name="answer" value="3">
    <input type="text" name="a3" value="<?php echo("$d->a3"); ?>" size="75">
  </p>
  <p> 
    Answer 4: <input type="radio" <?php echo"$c4" ?> name="answer" value="4">
    <input type="text" name="a4" value="<?php echo("$d->a4"); ?>" size="75">
  </p>
    <p>
    Comments: <textarea name="comments" cols="75" rows="3"><?php echo("$d->comments"); ?></textarea>
  </p>
<?php  if($d->pic == -1){
echo("<a href=\"piked.php?quid=$d->id&action=new\" target=\"piked\" onClick=\"window.open('', 'piked','width=450, height=210, title=Edit picture')\">Add picture</a><br>");}
else{
echo "<IMG SRC=\"getpik.php?pid=$d->pic \"><br>
<a href=\"piked.php?quid=$d->id&action=new\" target=\"piked\" onClick=\"window.open('', 'piked','width=450, height=210, title=Edit picture')\">Change picture</a>"; }  ?>
  <p>
    <input type="submit" value="Apply changes">
  </p>

</form>
</body>
</html>
<?php
}

elseif($_POST['do'] == 'doedit')
{
	$exid = $_POST['exid'];
	edit_q($_POST['id'],$_POST['question'],$_POST['a1'],$_POST['a2'],$_POST['a3'],$_POST['a4'],$_POST['answer'],$_POST['comments']);
	echo"
	<script language=\"javascript\">
	<!--
		location.href='ed_exam.php?exid=$exid';
	// -->
	</script>
	";
}

elseif($_POST['do'] == 'del')
{
	$exid = $_POST['exid'];
	delete_q($_POST['qid']);
		echo"
	<script language=\"javascript\">
	<!--
		location.href='ed_exam.php?exid=$exid';
	// -->
	</script>
	";
}	
		

}
else
include("question_form.php");
include('footer.php');
	?>
