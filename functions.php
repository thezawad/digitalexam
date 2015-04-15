<?php
function add_q($eid,$q,$a1,$a2,$a3,$a4,$correct,$comments,$pic) {
	require('connect.php');
	if($pic != ''){
		$pic_id = add_photo($pic);
	}
	else{
		$pic_id = -1;
	}
	$query = "INSERT INTO questions VALUES('','".addslashes($eid)."','".addslashes($q)."','".addslashes($a1)."','".addslashes($a2)."','".addslashes($a3)."','".addslashes($a4)."','".addslashes($correct)."','".addslashes($comments)."','".addslashes($pic_id)."')";
	mysql_query($query) or die($query);
	mysql_close();
}

function add_photo($Picture){
	require_once('connect.php');
	set_time_limit(60);
	$PSize = filesize($Picture); 
        $mysqlPicture = addslashes(fread(fopen($Picture, "r"), $PSize));
	mysql_query("INSERT INTO Images (Image) VALUES ('$mysqlPicture')");
	return mysql_insert_id();
}

function update_pid($quid,$pid)
{
	$query = "UPDATE questions SET pic='$pid' WHERE id='$quid' LIMIT 1";
	include("connect.php");
	mysql_query($query) or die($query);
}

function get_question($id){
	$query = "SELECT * FROM questions WHERE id=$id";
	include"connect.php";
	return mysql_fetch_object(mysql_query($query));
}


function edit_q($id,$q,$a1,$a2,$a3,$a4,$correct,$comments)
{
	$query = "UPDATE questions SET q='".addslashes($q)."',a1='".addslashes($a1)."',a2='".addslashes($a2)."',a3='".addslashes($a3)."',a4='".addslashes($a4)."',correct='".addslashes($correct)."',comments='".addslashes($comments)."' WHERE id='$id' LIMIT 1";
	include"connect.php";
	mysql_query($query) or die($query);
}

function delete_q($id)
{
	$query = "DELETE FROM questions WHERE id='$id' LIMIT 1";
	include"connect.php";
	mysql_query($query) or die($query);
}

function get_answer($id)
{
	$query = "SELECT correct FROM questions WHERE id='$id' LIMIT 1";
	return mysql_fetch_object(mysql_query($query));
}

function add_ex($title, $date)
{
	$query = "INSERT INTO exams VALUES('','".addslashes($title)."','$date')";
	include "connect.php";
	mysql_query($query) or die($query);
}

function edit_ex($title, $date, $exid)
{
	$query = "UPDATE exams SET title='".addslashes($title)."',date='$date' WHERE id=$exid LIMIT 1";
	include "connect.php";
	mysql_query($query) or die($query);
}

function del_ex($exid)
{
	$query1 = "DELETE FROM exams WHERE id='$exid' LIMIT 1";
	$query2 = "DELETE FROM questions WHERE eid='$exid'";
	require "connect.php";
	mysql_query($query1) or die($query1);
	mysql_query($query2) or die($query2);
}

function get_1ex($exid)
{
	$query = "SELECT * FROM exams WHERE id='$exid' LIMIT 1";
	require"connect.php";
	return mysql_fetch_object(mysql_query($query));
}

function get_ex()
{
	$query = "SELECT * FROM exams";
	include "connect.php";
	$r = mysql_query($query) or die($query);
	return $r;
}
	
?>
