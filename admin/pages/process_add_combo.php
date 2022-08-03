<?php
session_start();
include('../../config.php');
extract($_POST);
$target_dir = "../../combo_images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$flname = "combo_images/" . basename($_FILES["image"]["name"]);
mysqli_query($con, "INSERT INTO  tbl_movie VALUES(NULL,'$sdate','$edate','$wdate','$desc','$amount','$flname')");
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
echo $_FILES["image"]["tmp_name"];
$_SESSION['success'] = "Combo Added";
header('location:view_combos.php');
