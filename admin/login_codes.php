<?php include('../config/connect.php'); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";

try
    {
    $connc = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $connc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<?php
$type = htmlentities($_POST['type'], ENT_QUOTES);
if($type == "login"){
$username = htmlentities($_POST['un'], ENT_QUOTES);
$password = htmlentities($_POST['pd'], ENT_QUOTES);
if($username == null && $password == null){
echo "<p class='alertRed'>enter username and password to login</p>";
}elseif ($username == null){
  echo "<p class='alertRed'>enter username to login</p>";
}elseif($password == null){
  echo "<p class='alertRed'>enter password to login</p>";
}else{
$rUsername = "";
    $chekPwd = $connc->prepare("SELECT * FROM user WHERE username = :username");
    $chekPwd->bindParam(':username',$username,PDO::PARAM_STR);
    $chekPwd->execute();
    while ($row = $chekPwd->fetch(PDO::FETCH_ASSOC)) {
        $rUsername = $row['username'];
        $rPassword = $row['password'];
}
    // check if user try to login in his username or email


    // ========================
    if ($rUsername != $username) {
        echo "User doesn't exist!";

    }elseif (!password_verify($password,$rPassword)/*$password != $rPassword*/) {
        echo "<p class='alertRed'>your password is not correct</p>";
    }else{
    $loginsql = "SELECT * FROM user WHERE username= :username  AND password= :rPassword";
    $query = $connc->prepare($loginsql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':rPassword', $rPassword, PDO::PARAM_STR);
    $query->execute();
    $num = $query->rowCount();
    if($num == 0){
        echo "<p class='alertRed'>Your password and username is not correct!</p>";
    }else{
        $_SESSION['attempts'] = 0;
        while($row_fetch = $query->fetch(PDO::FETCH_ASSOC)){
          $user_id = $row_fetch['user_id'];
          $username = $row_fetch['username'];
          $firstname = $row_fetch['firstname'];
          $lastname = $row_fetch['lastname'];
          $user_id = $row_fetch['user_id'];
}
          $_SESSION['id'] = $user_id;
          $_SESSION['username'] = $username;
          $_SESSION['firstname'] = $firstname;
          $_SESSION['lastname'] = $lastname;
          $_SESSION['user_id'] = $user_id;

        echo "Done..";


    }
    }

}
}elseif($type == "add_class"){

  $class_name = htmlentities($_POST['un'], ENT_QUOTES);
if($class_name == ""){
echo"<p class='alertRed'>The fields can't be empty!</p>";
}else{
$post_id = rand()+time();
      mysqli_query($conn,"insert into class (class_id,class_name) values ('$post_id','$class_name')");
      echo "Done..";
}
}elseif($type == "add_subject"){

  $subject_name = htmlentities($_POST['un'], ENT_QUOTES);
  $class_id = htmlentities($_POST['id'], ENT_QUOTES);
  if($subject_name == ""){
  echo"<p class='alertRed'>The fields can't be empty!</p>";
  }else{
    $post_id = rand()+time();
  mysqli_query($conn,"insert into subject (subject_id,subject_name,class_id) values ('$post_id','$subject_name','$class_id')") or die(mysqli_error());
      echo "Done..";
}
}elseif($type == "add_chapter"){

  $chapter_name = filter_var(htmlspecialchars($_POST['un']),FILTER_SANITIZE_STRING);
  $subject_id = filter_var(htmlspecialchars($_POST['id']),FILTER_SANITIZE_STRING);
  $image = $_FILES["image"]["name"];
  if($chapter_name == ""){
  echo"<p class='alertRed'>The fields can't be empty!</p>";
  }else{
  $query = mysqli_query($conn,"select class_id from subject where subject_id = '$subject_id'") or die(mysqli_error());
  while ($row = mysqli_fetch_array($query)) {
  $class_id = $row['class_id'];
  }
      $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
      $image_name = addslashes($_FILES['image']['name']);
      $image_size = getimagesize($_FILES['image']['tmp_name']);

      $post_fileName = $_FILES["image"]["name"];
      $post_fileTmpLoc = $_FILES["image"]["tmp_name"];
      $post_fileType = $_FILES["image"]["type"];
      $post_fileSize = $_FILES["image"]["size"];
      $post_fileErrorMsg = $_FILES["image"]["error"];
      $post_fileName = preg_replace('#[^a-z.0-9]#i', '', $post_fileName);
      $post_kaboom = explode(".", $post_fileName);
      $post_fileExt = end($post_kaboom);
      $post_fileName = time().rand().".".$post_fileExt;

      move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" .$post_fileName);
      $location = "uploads/" .$post_fileName;
$post_id = rand()+time();
      mysqli_query($conn,"insert into chapter (chapter_id,chapter_name,subject_id,location,class_id) values ('$post_id','$chapter_name','$subject_id','$location','$class_id')") or die(mysqli_error());
}
}elseif($type == "delete_class"){
  $get_id = htmlentities($_POST['id'], ENT_QUOTES);

  mysqli_query($conn,"delete from chapter where class_id='$get_id'")or die(mysqli_error());
  mysqli_query($conn,"delete from subject where class_id='$get_id'")or die(mysqli_error());
  mysqli_query($conn,"delete from class where class_id='$get_id'")or die(mysqli_error());
  echo "yes";

}elseif($type == "delete_subject"){
  $get_id = htmlentities($_POST['id'], ENT_QUOTES);

  mysqli_query($conn,"delete from chapter where subject_id='$get_id'")or die(mysqli_error());
  mysqli_query($conn,"delete from subject where subject_id='$get_id'")or die(mysqli_error());
  echo "yes";

}elseif($type == "delete_chapter"){
  $get_id = htmlentities($_POST['id'], ENT_QUOTES);
  $query = mysqli_query($conn,"SELECT location FROM chapter WHERE chapter_id = '$get_id'");
  while ($row = mysqli_fetch_array($query)) {
  $location = $row['location'];
  }
  unlink("../".$location);
  mysqli_query($conn,"delete from chapter where chapter_id='$get_id'") or die(mysqli_error());
  echo "yes";

}elseif($type == "add_user"){
  $signup_password_var = filter_var(htmlentities($_POST['p']),FILTER_SANITIZE_STRING);
  $options = array(
      'cost' => 12,
  );
  $p = password_hash($signup_password_var, PASSWORD_BCRYPT, $options);

    $un = filter_var(htmlentities($_POST['un']),FILTER_SANITIZE_STRING);
    $fn = filter_var(htmlentities($_POST['fn']),FILTER_SANITIZE_STRING);
    $ln = filter_var(htmlentities($_POST['ln']),FILTER_SANITIZE_STRING);

    mysqli_query($conn,"insert into user (username,password,firstname,lastname) values ('$un','$p','$fn','$ln')")or die(mysqli_error());

}elseif($type == "delete_user"){
  $get_id = htmlentities($_POST['id'], ENT_QUOTES);
mysqli_query($conn,"delete from user where user_id='$get_id'")or die(mysqli_error());
echo "yes";
}elseif($type == "mode"){
if(!isset($_SESSION['mode']) || $_SESSION['mode'] == "light-skin"){
  $_SESSION['mode'] = "dark-skin";
}else{
  $_SESSION['mode'] = "light-skin";
}
echo "yes";
}
$conn = null;
 ?>
