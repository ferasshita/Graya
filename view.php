<?php $dircheckPath = "not hi";
$page_name = "";
?>
<?php $id = filter_var(htmlentities($_GET['pid']), FILTER_SANITIZE_NUMBER_INT); ?>
<?php include('config/connect.php'); ?>
<?php  $query = mysqli_query($conn,"select * from chapter where chapter_id = '$id'") or die(mysqli_error());
  while ($row = mysqli_fetch_array($query)) {
    $chapter_id = $row['chapter_id'];
    $chapter_name = $row['chapter_name'];
    $location = $row['location'];
    $class_name = "";
      ?>
<?php include "includes/header.php"; ?>
<body class="hold-transition <?php if(isset($_SESSION['mode'])){echo $_SESSION['mode'];}else{echo "light-skin";} ?> sidebar-mini theme-warning fixed rtl">
<?php if(preg_match("/.(pdf)$/i", $location/*importent!!!*/)){ ?>
  <div id="adobe-dc-view" ></div>
  <script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
  <script type="text/javascript">
    document.addEventListener("adobe_dc_view_sdk.ready", function(){
      var adobeDCView = new AdobeDC.View({clientId: "d912cbf9f4c843e680ec4c4e02db3594", divId: "adobe-dc-view"});
      adobeDCView.previewFile({
        content:{location: {url: "https://localhost/learn/<?php echo $location; ?>"}},
        metaData:{fileName: "<?php echo $chapter_name; ?>"}
      }, {});
    });
  </script>
<?php }else{ ?>
<div align="center">
<img src="images/preloaders/1.gif" alt="loading...">
</div>
              <script> document.location.href = '<?php echo $location; ?>'; </script>
<?php } ?>

<?php } ?>





<!-- ./wrapper -->

	<!-- ./side demo panel -->

	<!-- Sidebar -->

	<!-- Page Content overlay -->


	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>

	<!-- Crypto Tokenizer Admin App -->
	<script src="js/template.js"></script>



</body>
</html>
