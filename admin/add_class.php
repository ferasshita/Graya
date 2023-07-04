<?php
$class_name = "index";
$chapter_name = "";
$dircheckPath = "hi";
$page_name = "admin";
?>
<?php include('../config/connect.php');
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
if(isset($_GET['id'])){
    $course = mysqli_query($conn, "SELECT * FROM class where class_id = {$_GET['id']}");
    foreach(mysqli_fetch_array($course) as $k => $v){
        $$k = $v;
    }
}
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
                      <h4 class="box-title"> <strong>Add class</strong></h4>
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
                                  <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Add class</h4>
                                  <hr class="my-15">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Class name:</label>
                                              <input type="text" class="form-control login_signup_textfield" id="un" name="signup_username"  placeholder="Class name">
                                          </div>
                                      </div>

                                  <!-- /.box-body -->
                                  <div class="box-footer">
                                      <button id="signupFunCode" type="submit" class="login_signup_btn2 btn btn-rounded btn-primary btn-outline" >
                                          <i class="ti-save-alt"></i> Save
                                      </button>
                                  </div>
                              <p id="login_wait" style="margin: 0px;"></p>
                              </div>
                          <script type="text/javascript">
                              function signupUser(){
                                  var username = document.getElementById("un").value;
                                  $.ajax({
                                      type:'POST',
                                      url:'login_codes.php',
                                      data:{'type':'add_class','un':username},
                                      beforeSend:function(){
                                          $('.login_signup_btn2').hide();
                                          $('#login_wait').html("<b>Adding class</b>");
                                          $("#login_wait").show();
                                      },
                                      success:function(data){
                                          $('#login_wait').html(data);
                                          if (data == "Done..") {
                                              $('#login_wait').html("<p class='alertGreen'>Done..</p>");
                                              $('.login_signup_btn2').show();
                                              $("#tabl").load(location.href + " #tabl");
                                              $("#login_wait").fadeOut(1000);

                                          }else{
                                              $('.login_signup_btn2').show();
                                          }
                                      },
                                      error:function(err){
                                          alert(err);
                                      }
                                  });
                              }
                              $('#signupFunCode').click(function(){
                                  signupUser();
                              });

                              $(".login_signup_textfield").keypress( function (e) {
                                  if (e.keyCode == 13) {
                                      signupUser();
                                  }
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
                      <h4 class="box-title"><strong>Classes</strong></h4>
                      <ul class="box-controls pull-right">
                          <li><a class="box-btn-close" href="#"></a></li>
                          <li><a class="box-btn-slide" href="#"></a></li>
                          <li><a class="box-btn-fullscreen" href="#"></a></li>
                      </ul>
                  </div>

                  <div class="col-12">
                      <div class="box">
                          <div class="box-header with-border">
                              <h4 class="box-title">Classes</h4>
                          </div>
                          <div class="box-body">
                              <div class="table-responsive">

                                  <table id="tabl" class="table table-lg invoice-archive example">
                                      <thead>
                                      <tr>
                                        <th>class Name</th>
                                          <th class="text-center">Actions</th>
                                      </tr>
                                      </thead>
                                      <tbody>

                                        <?php
                                        $query = mysqli_query($conn,"select * from class") or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($query)) {
                                            $class_id = $row['class_id'];
                                            $class_name = $row['class_name'];
                                            ?>
                                            <tr id="course_id<?php echo $class_id; ?>">


                                        <!-- script -->
                                        <!-- end script -->

                                        <td><a href="add_subject?pid=<?php echo $class_id ?>"><?php echo $row['class_name']; ?></a></td>
<td class="text-center"><a onclick="deleteitem('<?php echo $class_id; ?>')" style='color:#d71717' class="btn"><i class='fa fa-remove'></i> Delete</a></td>
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
          data:{'id':id, 'type':'delete_class'},
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
              <script src="../assets/icons/feather-icons/feather.min.js"></script>

              <!-- Crypto Tokenizer Admin App -->
              <script src="../js/template.js"></script>
              <script src="../js/pages/data-table.js"></script>

  <script src="../assets/vendor_components/datatable/datatables.min.js"></script>


              </body>
              </html>
