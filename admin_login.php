<?php include("db.php");
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GPT|| AdminLOGIN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
</head>

<body>
  <?php
  if (@$_GET['id'] != "sinup" && @$_GET['id'] != "forgot" && @$_GET['id'] != "changep") {
    if (isset($_POST['b1'])) {
      $t1 = $_POST['t1'];
      $t2 = $_POST['p1'];
      $sql = "SELECT * FROM `admin_login` WHERE email='$t1' AND password=MD5('$t2')";
      $s = mysqli_query($link, $sql);
      $nos = mysqli_num_rows($s);

      if ($nos > 0) {
        $_SESSION['t1'] = $t1;
        header("location:admin_account.php?home=1");

        //   setcookie("$t1",time()+3600);
      } else {
        echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show  d-block">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong>Invaild Password or Userid
      </div></div>';
      }
    }
    echo '
       <div class="conatiner">
       <div class="d-flex flex-wrap align-content-center justify-content-center"  >
       <div class="col-sm-20 col-lg-20 col-md-20 col-60 ">
       <div class="card mt-10 mx-lg-auto shadow-lg mx-auto"  style="width:120%"id="topvalue">
       <div class="card-body">
       <h4 class="card-title">Login</h4>
       <div class="card-text">
       <form class="from-singin"  method="POST" id="loginfrom"> 
       <div class="form-label-group"> 
        <label for="t1">UserID</label>  
    <input type="text" name="t1" id="t1"  required autofocus class="form-control"><br>
    </div>
    <div class="form-label-group"> 
    <label for="p1">Password</label>
    <input type="password" name="p1" id="p1" pattern=".{8,32}" title="minimum 8 or Maximum 32 character will be required" required  class="form-control"><span class="text-danger"></span><br>
    </div>
    <button type="submit" class="btn bt-md btn-primary btn-block text-uppercase" name="b1" id="b1">login</button>
    
    <p class="card-text"><a href="?id=forgot">Forgot Password</a></p>
    <p class="card-text">Don\'t have an account?<a href="?id=sinup">  Sinup</a></p>
    </form>
       </form>
       </div> 
       </div>
       </div>
       </div> 
       </div>
       </div>
      
       ';
  }

  if (@$_GET['id'] == "sinup") {
    if (isset($_POST['bf1'])) {
      $fname = $_POST['t2'];
      $mobile = $_POST['t4'];
      $branch = $_POST['t5'];
      $email = $_POST['t6'];
      $password = $_POST['t7'];
      $sql = " INSERT INTO `admin`(`name`, `mobile`, `Email`, `Branch`) VALUES ('$fname','$mobile','$email','$branch')";
      $a = mysqli_query($link, $sql);
      $log = "INSERT INTO `admin_login`(`email`, `password`, `mobil_no`)  VALUES ('$email',MD5('$password'),'$mobile')";
      $b = mysqli_query($link, $log);
      if ($a && $b) {
        $_SESSION['t1'] = $email;
        header("location:http://localhost/projects/Gptattendence/admin_account.php?home=1");
      }
    }
    echo '
    <div class="container"><div class="card   shadow-lg mx-auto"  style="width:40%" id="topvalue">
      <!-- <ion-icon name="person"></ion-icon> -->
      <div class="card-body ">
      <h4 class="card-title">Sinup</h4>
      <form class="from-singin"  method="POST"> 
      <div class="form-label-group"> 
      <label for="t2">First name</label>     
      <input type="text" name="t2" id="t2" pattern="^[A-Za-z]*$" title="Alphabets only" required autofocus class="form-control">
      </div>
      <div class="form-label-group">  
      <label for="t4"> Mobile number</label> 
      <input type="tel" name="t4" id="t4" pattern="[0-9]{10}" title="Enter valid Mobile number" required autofocus class="form-control">
      </div>
      <div class="form-label-group">     
      <label for="t5">Branch</label>
        <select  name="t5" id="t5" class="form-control" >
            <option value="COMPUTER SCIENCE & ENGG">COMPUTER SCIENCE & ENGG</option>
            <option value="ELECTRONICS & COMMUNICATION ENGG">ELECTRONICS & COMMUNICATION ENGG</option>
            <option value="CIVIL ENGINEERING(GENERAL)">CIVIL ENGINEERING(GENERAL)</option>
            <option value="MECHANICAL ENGG.(GENERAL)">MECHANICAL ENGG. (GENERAL)</option>
            <option value="ELECTRICAL & ELECRONICS ENGG">ELECTRICAL & ELECRONICS ENGG</option>
            <option value="SCIENCE">SCIENCE</option>
        </select>
 
      </div>
      <div class="form-label-group">  
      <label for="t6">Email</label>   
      <input type="Email" name="t6" id="t6"  required autofocus class="form-control">
      </div>
      <div class="form-label-group">  
      <label for="t7">Password</label>   
      <input type="password" name="t7" id="t7" pattern=".{8,32}" title="minimum 8 or Maximum 32 character will be required" required autofocus class="form-control"><br>
      </div>
      <button type="submit" class="btn bt-md btn-primary btn-block text-uppercase" name="bf1" id="bf1">Signup</button>
  
      </form></div></div></div>
   
    ';
  }
  if (@$_GET['id'] == 'forgot') {

    if (isset($_POST['bf1'])) {
      $id = $_POST['t1'];
      $t2 = $_POST['p1'];
      //  $t3=$_POST['t3'];
      $sql = "SELECT * FROM `admin_login` WHERE  email='$id' AND mobil_no='$t2'";
      $s = mysqli_query($link, $sql);
      $nos = mysqli_num_rows($s);
      if ($nos > 0) {
        $_SESSION['fuser'] = $id;
        header("location:login.php?id=changep");
      } else {
        echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show  d-block">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>Invaild Userid or Mobile number
        </div></div>';
      }
    }
    echo '<div class="container"><div class="card mt-10 mx-lg-auto shadow-lg mx-auto"  style="width:30%"id="topvalue">
<!-- <ion-icon name="person"></ion-icon> -->
<div class="card-body ">
<h4 class="card-title">Login</h4>
<form class="from-singin"  method="POST"> 
 <div class="form-label-group"> 
 <label for="t1">Your Email</label>    <span class="fi-person"></span>
<input type="text" name="t1" id="t1"  required autofocus class="form-control">
</div><br>
<div class="form-label-group"> 
<label for="p1">Your Mobile number</label>  
<input type="phone" name="p1" id="p1" required  class="form-control">
</div><br>
<button type="submit" class="btn bt-md btn-primary btn-block text-uppercase" name="bf1" id="bf1">Submit</button>
</form>
</div>
</div>
</div>
</div>';
  }
  if (@$_GET['id'] == 'changep') {
    $user = $_SESSION['fuser'];
    echo "<h1 style='color:white'>$user</h1>";
    if (isset($_POST['bc1'])) {

      $t3 = $_POST['t1'];
      $con = "UPDATE `admin_login` SET `password`=MD5('$t3') WHERE  `email`='$user'";
      $re = mysqli_query($link, $con);
      echo "<script>alert(' Password is changed')</script>";
      // header("location:");
    }
    echo '<script>
    $(document).ready(function(){
    var p1,p2;
p1=("#t1").val();
t1=("#p1").val();
if(p1==t1){
  $(".err").html("Mached").css({"color":"green"});
  $("#bc1").attr("disabled", false);
}
else
{
  $(".err").html(" Not mached").cass({"color":"red"});
  $("#bc1").attr("disabled", true);

}
}); </script>
    
    <div class="container"><div class="card mt-10 mx-lg-auto shadow-lg mx-auto"  style="width:40%" id="topvalue">
    <!-- <ion-icon name="person"></ion-icon> -->
    <div class="card-body ">
    <h4 class="card-title"></h4>
    <form class="from-singin"  method="POST"> 
       <div class="form-label-group"> 
           
    <input type="password" name="t1" id="t1" placeholder="Enter new Password" required autofocus class="form-control">
    </div><br>
    <div class="form-label-group"> 
    <input type="password" name="p1" id="p1" placeholder="Confirm password" required  class="form-control">
    </div><br>
    <button type="submit" class="btn bt-md btn-primary btn-block text-uppercase" name="bc1" id="bc1">Check</button>
    </form>
    </div>
    </div>
    </div>
    </div>';
  }
  ?>
</body>

</html>