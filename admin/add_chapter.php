<?php include('../config/connect.php'); ?>
<?php
$class_name = "index";
$chapter_name = "";
$dircheckPath = "hi";
$page_name = "admin";
if(!isset($_SESSION['id'])){
 header("location:../index");
}
?>
<?php include "../includes/header.php"; ?>
<body class="hold-transition <?php if(isset($_SESSION['mode'])){echo $_SESSION['mode'];}else{echo "light-skin";} ?> sidebar-mini theme-warning fixed ltr">
  <script src="js/jquery.js" type="text/javascript"></script>
      <script src="js/bootstrap.js" type="text/javascript"></script>
<div class="wrapper">
<div id="loader"></div>
<style>
.container > div {
width: 100%;
vertical-align: middle;
height:200px;
}
</style>
<?php include "../includes/navhead.php"; ?>

<?php
$pageid = filter_var(htmlentities($_GET['pid']), FILTER_SANITIZE_NUMBER_INT);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<section class="content">
      <!--======================================[content start]============================-->




            <div class="row">

                <div class="col-md-12 col-12 fixed-flex-report">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title"> <strong>Add chapter</strong></h4>
                            <ul class="box-controls pull-right">
                                <li><a class="box-btn-close" href="#"></a></li>
                                <li><a class="box-btn-slide" href="#"></a></li>
                                <li><a class="box-btn-fullscreen" href="#"></a></li>
                            </ul>
                        </div>

                        <div class="col-lg-12 col-12 fixed-width-form">
                            <div class="box">
                                <!-- /.box-header -->
                                    <div class="box-body">
                                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Add chapter</h4>
                                        <hr class="my-15">
                                        <form id="postingToDB" method="post" action="login_codes.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>chapter name:</label>
                                                    <input type="text" class="form-control" id="un" name="un"  placeholder="chapter name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>The file:</label>
                                                    <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, video/mp4, video/wmp, video/ogg, audio/mp3, application/pdf">
                                                </div>
                                            </div>

                                            <input type="hidden" id="id" name="id" value="<?php echo $pageid; ?>">
                                            <input type="hidden" name="type" value="add_chapter">

                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" name="sub" class="btn btn-rounded btn-primary btn-outline" >
                                                <i class="ti-save-alt"></i> Save
                                            </button>
                                        </div>
                                        <p id="login_wait" style="margin: 0px;"></p>
                                        <div class="loadingPosting"><p class="loadingPostingP">0</p></div>
                                  </div>
                                  <div id="getingNP"></div>

</form>
                                    <script>
                                    $(document).ready(function(){
                                    $('.loadingPosting').hide();
                                    var i = 1;
                                    $("#postingToDB").on('submit',function(e){
                                    var plus = i++;
                                    $("#getingNP").prepend("<div id='FetchingNewPostsDiv"+plus+"' style='display:none;'></div>");
                                    e.preventDefault();
                                    $(this).ajaxSubmit({
                                    beforeSend:function(){
                                    $('.loadingPosting').show();
                                    $(".loadingPostingP").css({'width' : '0%'});
                                    $(".loadingPostingP").html('0');
                                    $("#login_wait").show();

                                    },
                                    uploadProgress:function(event,position,total,percentCompelete){
                                    $(".loadingPostingP").css({'width' : percentCompelete + '%'});
                                    $(".loadingPostingP").html(percentCompelete);
                                    },
                                    success:function(data){
                                    $("#postingToDB").slideDown(function(){
                                      $('#login_wait').html("<p class='alertGreen'>Done..</p>");
                                        $("#postingToDB").clearForm();
                                        $('#photo_preview').hide();
                                        $('#cancel_photo_preview').hide();
                                        $('#photo_preview_box').show();
                                        $("#tabl").load(location.href + " #tabl");
                                        $(".loadingPosting").fadeOut(1000);
                                        $("#login_wait").fadeOut(1000);
                                    });
                                    }
                                    });

                                    });
                                    });
                                    </script>
                            </div>
                            <!-- /.box -->
                        </div>

                    </div>
                </div>

              </div>
            </div>


            <div class="row">

                <div class="col-md-12 col-12 fixed-flex-report">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>chapter</strong></h4>
                            <ul class="box-controls pull-right">
                                <li><a class="box-btn-close" href="#"></a></li>
                                <li><a class="box-btn-slide" href="#"></a></li>
                                <li><a class="box-btn-fullscreen" href="#"></a></li>
                            </ul>
                        </div>

                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">chapter</h4>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">

                                        <table id="tabl" class="table table-lg invoice-archive example">
                                            <thead>
                                            <tr>
                                              <th>chapter Name</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                              <?php
                                              $query = mysqli_query($conn,"select * from chapter where subject_id = '$pageid'") or die(mysqli_error());
                                              while ($row = mysqli_fetch_array($query)) {
                                                  $chapter_id = $row['chapter_id'];
                                                  $chapter_name = $row['chapter_name'];
                                                  $location = $row['location'];
                                                  ?>
                                                  <tr id="course_id<?php echo $chapter_id; ?>">
                                              <!-- end script -->

                                              <td><a href="../<?php echo $location; ?>"><?php echo $row['chapter_name']; ?></a></td>
                                              <td class="text-center"><a onclick="deleteitem('<?php echo $chapter_id; ?>')" style='color:#d71717' class="btn"><i class='fa fa-remove'></i> Delete</a></td>
                                              <!-- user delete modal -->

                                              <!-- end delete modal -->

                                              </tr>
                                          <?php } ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



<script>
function deleteitem(id){
  if(confirm("Are you sure to delete this")){
$.ajax({
    type:'POST',
    url:'login_codes.php',
    data:{'id':id, 'type':'delete_chapter'},
    beforeSend: function(){
        $('#course_id'+id).hide();
    },
    success: function(done){
        if (done == 'yes') {
            $('#course_id'+id).html('');
        }else{
            $('#course_id'+id).html('');
        }
    }
});
}else{
return false;
}
}
</script>

<!--====================================================================================================-->


                <!--======================================[content end]============================-->

              </section>
              <!-- /.content -->
              </div>
              </div>
              <!-- /.content-wrapper -->

              <?php include "../includes/footer.php"; ?>
              <!-- Control Sidebar -->


              <!-- /.control-sidebar -->

              <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
              <div class="control-sidebar-bg"></div>
              </div>
              <!-- ./wrapper -->

              <!-- ./side demo panel -->

              <!-- Sidebar -->

              <!-- Page Content overlay -->


              <!-- Vendor JS -->
              <script src="../js/vendors.min.js"></script>
              <script src="../js/pages/chat-popup.js"></script>
              <script src="../js/jquery.form.min.js"></script>
              <script src="../assets/icons/feather-icons/feather.min.js"></script>

              <!-- Crypto Tokenizer Admin App -->
              <script src="../js/template.js"></script>

              <script src="../js/pages/data-table.js"></script>

  <script src="../assets/vendor_components/datatable/datatables.min.js"></script>

              </body>
              </html>
