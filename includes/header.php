<?php
if($dircheckPath == "hi"){
$dircheckPath = "../";
}else{
  $dircheckPath = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Graya <?php if($class_name != "index"){ ?> | <?php echo $class_name; }elseif($chapter_name != NULL){?> | <?php echo $chapter_name; ?><?php } ?></title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="-Graya notes- for here you can get the lastest notes of libyan education">
    <meta name="keyword" content="graya, notes, libya, libyan, منهج, ليبيا, ,وزاره التعليم, اسئله, اجوبه, استرشاديه">
    <link rel="icon" href="<?php echo $dircheckPath; ?>images/favicon.ico">
  <link rel="manifest" href="manifest.json">
<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <meta name="apple-mobile-web-app-title" content="Add to Home">

    <link rel="shortcut icon" sizes="16x16" href="<?php echo $dircheckPath; ?>images/favicon.ico">
    <link rel="shortcut icon" sizes="196x196" href="<?php echo $dircheckPath; ?>images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $dircheckPath; ?>images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo $dircheckPath; ?>css/addtohomescreen.css">
    <script src="<?php echo $dircheckPath; ?>js/addtohomescreen.js"></script>
    <script>
    addToHomescreen();
    </script>
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?php echo $dircheckPath; ?>css/vendors_css.css">

	<!-- Style-->
	<link rel="stylesheet" href="<?php echo $dircheckPath; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo $dircheckPath; ?>css/skin_color.css">

</head>
