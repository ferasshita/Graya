<?php include('../config/connect.php'); ?>
<?php
$class_name = "index";
$chapter_name = "";
$dircheckPath = "hi";
$page_name = "";
$hh = "login";
if(isset($_SESSION['id'])){
 header("location:home");
}
?>
<?php include "../includes/header.php"; ?>
<body style="background:#d3d3d3" class="hold-transition ltr theme-primary bg-gradient-primary">
  <script src="js/jquery.js" type="text/javascript"></script>
      <script src="js/bootstrap.js" type="text/javascript"></script>
  <nav class='navbar navbar-expand-lg navbar-light py-3' id='mainNav'>
  	<div class='container'>
  		<a class='navbar-brand js-scroll-trigger' href='../'><img
  					alt='Logo' src='../images/logo.png' loading='lazy'
  					style='width: 50px;'><h5 style="font-size: 20px;color: #32475e;display: initial;">Graya</h5></a>
  	</div>
  </nav>
  <style>
  		.bg-gradient-primary{
  			/*background:url('imgs/main_icons/cover2.jpg') ;*/
              background-size: cover;
  		}.bg-white-10 {
               background-color: rgba(255, 255, 255, 30%);
           }

  	</style>
  <div class="container h-p100">
  		<div class="row align-items-center justify-content-md-center h-p100">

  			<div class="col-12">
  				<div class="row justify-content-center no-gutters">
  					<div class="col-lg-4 col-md-5 col-12">
  						<div style="background:#FFFFFF" class="bg-white-10 rounded5">
  							<div class="content-top-agile p-10 pb-0">
  								<h2 class="text-black">Login </h2>
  							</div>
  							<div class="p-30">
  									<div class="form-group">
  										<div class="input-group mb-3">
  											<div class="input-group-prepend">
  												<span class="input-group-text bg-transparent text-black"><i class="ti-user"></i></span>
  											</div>
  											<input type="text" name="login_username" id="un" placeholder="Username" class="form-control pl-15 bg-transparent text-black plc-white">
  										</div>
  									</div>
  									<div class="form-group" >
  										<div class="input-group mb-3" >

                      <div class="input-group" id="show_hide_password">
                          <div class="input-group-prepend">
                              <span class="input-group-text bg-transparent text-black"><i class="ti-lock" aria-hidden="true"></i></span>
                          </div>
                        <input placeholder="Password"
                          type="password"
                          id="pd"
                          name="signup_password"  aria-controls="pw-validation-msg"
                           autocomplete="current-password" style="border-left:none" class="form-control pl-15 bg-transparent text-black plc-white">
                        <div class="input-group-addon" style="background:transparent;border-left:none">
                            <a href=""><i id="eye" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                  </div>
  										</div>
  									</div>
  									  <div class="row">
  										<!-- /.col -->

  										<!-- /.col -->
  										<div class="col-12 text-center">
  										  <button type="submit" id="loginFunCode" class="fix-login-button btn mdc-button btn-info btn-rounded mt-10">Login</button>
  										</div>
  										<!-- /.col -->
  									  </div>

                                   <p id="login_wait" style="margin: 0px;"></p>

  							</div>
  						</div>
  					</div>
  				</div>
  			</div>

  		</div>

  	</div>

      <script type="text/javascript">
        function loginUser(){
            var username = document.getElementById("un").value;
            var password = document.getElementById("pd").value;
            $.ajax({
                type:'POST',
                url:'login_codes.php',
                data:{'type':'login','un':username,'pd':password},
                beforeSend:function(){
                    $('.fix-login-button').hide();
                    $('#login_wait').html("Loading...");
                },
                success:function(data){
                    $('#login_wait').html(data);
                    if (data == "Done..") {
                        $('#login_wait').html("<p class='alertGreen'>Welcome..</p>");
                        setTimeout(' window.location.href = "home"; ',2000);
                    }else{
                        $('.fix-login-button').show();
                    }
                },
                error:function(err){
                    alert(err);
                }
            });
        }
        $('#loginFunCode').click(function(){
            loginUser();
        });
        $(".form-control").keypress( function (e) {
            if (e.keyCode == 13) {
                loginUser();
            }
        });
    </script>
      <script>
          $(document).ready(function() {
              $("#show_hide_password a").on('click', function(event) {
                  event.preventDefault();
                  if($('#show_hide_password input').attr("type") == "text"){
                      $('#show_hide_password input').attr('type', 'password');
                      $('#show_hide_password #eye').addClass( "fa-eye-slash" );
                      $('#show_hide_password #eye').removeClass( "fa-eye" );
                  }else if($('#show_hide_password input').attr("type") == "password"){
                      $('#show_hide_password input').attr('type', 'text');
                      $('#show_hide_password #eye').removeClass( "fa-eye-slash" );
                      $('#show_hide_password #eye').addClass( "fa-eye" );
                  }
              });
          });
      </script>
      <script src="../js/vendors.min.js"></script>
      <script src="../js/pages/chat-popup.js"></script>
      <script src="../assets/icons/feather-icons/feather.min.js"></script>

      <!-- Crypto Tokenizer Admin App -->
      <script src="../js/template.js"></script>

</body>
</html>
