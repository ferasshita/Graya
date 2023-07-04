<footer class="main-footer">
 <div class="pull-right d-none d-sm-inline-block">
     <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
   <li class="nav-item">
   <a class="nav-link" href="<?php echo $dircheckPath; ?>about">حول</a>
   </li>
 </ul>
 </div>
  كل الحقوق محفوظه .قرايه <?php echo date('Y'); ?> &copy;
</footer>
<script>
function mode(){
    $.ajax({
        type:'POST',
        url:'<?php echo $dircheckPathad; ?>login_codes.php',
        data:{'type':'mode'},
        success: function(done){
            if (done == 'yes') {
              var $sidebar = $('body');
              var $html = $('html');
              if ($sidebar.hasClass('dark-skin')) {
                $sidebar.removeClass('dark-skin')
                $html.removeClass('dark-skin')

                $sidebar.addClass('light-skin')
                $html.addClass('light-skin')
              } else {
                $sidebar.removeClass('light-skin')
                $html.removeClass('light-skin')
                $sidebar.addClass('dark-skin')
                $html.addClass('dark-skin')
              }
            }else{
                alert('Action denied! You are not allowed to doing this action');
            }
        }
    });

}
</script>
