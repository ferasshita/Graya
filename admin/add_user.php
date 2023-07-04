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
  .strength{
        height:0px;
        width:100%;
        background:#ccc;
        margin-top: -7px;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
        overflow: hidden;
        transition: height 0.3s;
      }
        .pst{
          width:0px;
          height: 7px;
          display: block;
          transition: width 0.3s;
          }

  </style>
  <?php include "../includes/navhead.php"; ?>


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
  <h4 class="box-title"> <strong>Add users</strong></h4>
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
  <form id="postingToDB" method="post" action="login_codes.php">
  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
  <label>Username:</label>
  <input type="text" class="form-control" id="un" name="un"  placeholder="Username">
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
  <label>Password:</label>
  <input type="text" data-strength class="form-control" id="p" name="p"  placeholder="Password">
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
  <label>First name:</label>
  <input type="text" class="form-control" id="fn" name="fn"  placeholder="First name">
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
  <label>Last name:</label>
  <input type="text" class="form-control" id="ln" name="ln"  placeholder="Last name">
  </div>
  </div>


  <input type="hidden" name="type" value="add_user">

  <!-- /.box-body -->
  <div class="box-footer">
  <button type="submit" name="sub" class="btn btn-rounded btn-primary btn-outline" >
  <i class="ti-save-alt"></i> Save
  </button>
  </div>
  </div>
  <div class="loadingPosting"><p class="loadingPostingP">0</p></div>

  </form>
  <div id="getingNP"></div>
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

  $("#postingToDB").clearForm();
  $('#photo_preview').hide();
  $('#cancel_photo_preview').hide();
  $('#photo_preview_box').show();
  $("#tabl").load(location.href + " #tabl");
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
  <h4 class="box-title"><strong>Users</strong></h4>
  <ul class="box-controls pull-right">
  <li><a class="box-btn-close" href="#"></a></li>
  <li><a class="box-btn-slide" href="#"></a></li>
  <li><a class="box-btn-fullscreen" href="#"></a></li>
  </ul>
  </div>

  <div class="col-12">
  <div class="box">
  <div class="box-header with-border">
  <h4 class="box-title">Users</h4>
  </div>
  <div class="box-body">
  <div class="table-responsive">

  <table id="tabl" class="table table-lg invoice-archive example">
  <thead>
  <tr>
  <th>Username</th>
  <th>Firstname</th>
  <th>Lastname</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>

  <?php
  $query = mysqli_query($conn,"select * from user") or die(mysqli_error());
  while ($row = mysqli_fetch_array($query)) {
  $user_id = $row['user_id'];
  ?><tr id="course_id<?php echo $user_id;?>">
  <td><?php echo $row['username']; ?></td>
  <td><?php echo $row['firstname']; ?></td>
  <td><?php echo $row['lastname']; ?></td>
  <td class="text-center"><a onclick="deleteitem('<?php echo $user_id; ?>')" style='color:#d71717' class="btn"><i class='fa fa-remove'></i> Delete</a></td>


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
  data:{'id':id, 'type':'delete_user'},
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
  <script>
  $(function() {

    function passwordCheck(password) {
      if (password.length >= 8)
        strength += 1;

      if (password.match(/(?=.*[0-9])/))
        strength += 1;

      if (password.match(/(?=.*[!,%,&,@,#,$,^,*,?,_,~,<,>,])/))
        strength += 1;

      if (password.match(/(?=.*[a-z])/))
        strength += 1;

      if (password.match(/(?=.*[A-Z])/))
        strength += 1;

      displayBar(strength);
    }

    function displayBar(strength) {
      switch (strength) {
        case 1:
          $("#password-strength span").css({
            "width": "20%",
            "background": "#de1616"
          });
          break;

        case 2:
          $("#password-strength span").css({
            "width": "40%",
            "background": "#de1616"
          });
          break;

        case 3:
          $("#password-strength span").css({
            "width": "60%",
            "background": "#de1616"
          });
          break;

        case 4:
          $("#password-strength span").css({
            "width": "80%",
            "background": "#FFA200"
          });
          break;

        case 5:
          $("#password-strength span").css({
            "width": "100%",
            "background": "#06bf06"
          });
          break;

        default:
          $("#password-strength span").css({
            "width": "0",
            "background": "#de1616"
          });
      }
    }

    $("[data-strength]").after("<div id=\"password-strength\" class=\"strength\"><span class=\"pst\"></span></div>")

    $("[data-strength]").focus(function() {
      $("#password-strength").css({
        "height": "7px"
      });
    }).blur(function() {
      $("#password-strength").css({
        "height": "0px"
      });
    });

    $("[data-strength]").keyup(function() {
      strength = 0;
      var password = $(this).val();
      passwordCheck(password);
    });

  });
  </script>
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
