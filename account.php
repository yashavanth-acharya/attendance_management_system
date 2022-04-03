<?php include("db.php");
session_start();
if (!$_SESSION['t1']) {
  header("location:login.php");
}
$id = $_SESSION['t1'];
$selectbranch = "SELECT `name`,`Branch` FROM `teachers` WHERE `Email`='$id'";
$result = mysqli_query($link, $selectbranch);
$row = mysqli_fetch_row($result);
$branch = $row[1];
$tname = $row[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GPT|| account</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src=" https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>

</head>

<body>
  <script src="js/jquery.js"></script>
  <!-- <div class="page-wrapper chiller-theme toggled"></div> -->
  <a id="show-sidebar" class="btn btn-sm btn-dark">
    <i class="fas fa-bars" id="ibar"></i>
  </a>
  <nav id="slide">
    <button type="button" class="close close1">
      <span class="clrs text-light">&times;</span>
    </button>
    <ul>
      <li><a href="?home=1">Home</a></li>
      <li><a href="?att=2">Attendence</a></li>
      <li><a href="?addstd=3">Add Student</a></li>
      <!-- <li><a href="">About</a></li> -->
      <li><a href="?logout=4">Logout</a></li>
    </ul>
  </nav>
  <?php
  if (@$_GET['home'] == 1) {
    echo "<style>body{overflow: hidden;}</style>";
    echo "<div class='jumbotron'id='cont-one'>
        <h1 class='display-1'>GPT</h1>;
        
        
        
        </div>";
  }
  if (@$_GET['att'] == 2) {


    echo '<div class="container" style="position:fixed;left:0" id="content">
       <h1 class="display-4 ml-5">Take Attendence</h1> 
      <div id="alertdata" class="container"></div>
       <form method="POST" enctype="multipart/form-data" class="form-inline">
       <div class="form-group">
<select class="form-control" style="width:100%"  id="sem1" name="sem">
<option value="0">Select Semester</option>
<option value="Isem">Isem</option>
<option value="IIsem">IIsem</option>
<option value="IIIsem">IIIsem</option>
<option value="IVsem">IVsem</option>
<option value="Vsem">Vsem</option>
<option value="VIsem">VIsem</option>
</select>
</div>
<button type="submit" class="btn btn-primary ml-2" name="select" id="select">Select</button>

<div class="form-group">
<select class="form-control ml-1 sele" style="width:100%" id="subject2" name="subject1">
<option value="null">Select Subject</option>
';
    if (isset($_POST['select'])) {
      $sem = $_POST['sem'];
      $sqlsub = "SELECT `suject` FROM `subject` WHERE `sem`='$sem' AND `branch`='$branch'";
      $subject = mysqli_query($link, $sqlsub);
      while ($sub = mysqli_fetch_assoc($subject)) {
        echo '<option value="' . $sub['suject'] . '">' . $sub['suject'] . '</option>';
      }
    }
    echo '</select>
</div>

</form>
<br>

<table class="table table-bordered mt-0" id="creat_table">

<thead>
  <tr>
    <th>Total Class</th>
    <th>action</th>
  </tr>
</thead>
<tbody> 
</tr>
<td contenteditable="true" width="3%" class="total" id="total" name="total"></td>
<td width="2%">
<button type="submit" class="btn btn-primary ml-5" name="upload1" id="upload1">Upload</button></tr></tbody>
</td>
</tr>
</tbody>
</table>
<p id="erorr"></p>
<table class="table table-bordered mt-2" id="creat_table"style="top:50%;overflow-y: scroll;">
    <thead>
      <tr>
      <th>S.no</th>
        <th>Register Number</th>
        <th>Student name</th>
        <th>Student name</th>
        <th>Present Class</th>
        <th>Presentege</th>
      </tr>
    </thead>
    <tbody>';
    if (isset($_POST['select'])) {

      $sem = $_POST['sem'];


      echo '<script>$(document).ready(function(){
            $("#sem1").val("' . $sem . '");
          });</script>';


      $student = "SELECT `id`,`r_no`, `name` FROM `student` WHERE `sem`='$sem' AND `branch`='$branch'";
      $std = mysqli_query($link, $student);
      $count = 0;

      while ($row = mysqli_fetch_assoc($std)) {

        $count++;
        $branchstd = str_repeat("$branch", $count);
        echo '<tr>
      <td>' . $count . '</td>      
      <td contenteditable="true" class="rollno">' . $row['r_no'] . '</td>
      <td contenteditable="true" class="name">' . $row['name'] . '</td>
      <td contenteditable="true"  class="sub"></td>
      <td contenteditable="true" hidden class="tc"></td>
      <td contenteditable="true"  class="present_class"></td>
      <td  contenteditable="true" id="prsent" class="total_present"></td>
      <td  contenteditable="true"  hidden id="branch" class="branch">' . $branch . '</td>

      </tr>';
      }

      // echo'<input type="hiddden" vaule='.$r.'';
      // echo $branchstd;
    }
    echo '</table>    
       </div>';
  }


  if (@$_GET['addstd'] == 3) {
    $style = "
      <style>
      body{
        overflow-y: scroll;
      }
      </style>
      ";
    echo $style;
    if (isset($_POST['btn1'])) {

      // include("db.php");
      // include_once('PHPExcel/PHPExcel.php');
      include("PHPExcel.php");
      include("PHPExcel/IOFactory.php");
      $file = $_FILES['t1']['name'];
      $name = "file/" . $file;
      $temp = $_FILES['t1']['tmp_name'];
      move_uploaded_file("$temp", "$name");
      if ($_FILES['t1']['size'] == 0 && $_FILES['t1']['error'] == 0) {
        $sheet = PHPExcel_IOFactory::load($name);
        foreach ($sheet->getWorksheetIterator() as $next) {
          $hr = $next->getHighestRow();
          for ($i = 2; $i <= $hr; $i++) {
            $r_no = mysqli_real_escape_string($link, $next->getCellByColumnAndRow(0, $i)->getValue());
            $name = mysqli_real_escape_string($link, $next->getCellByColumnAndRow(1, $i)->getValue());
            $branch = mysqli_real_escape_string($link, $next->getCellByColumnAndRow(2, $i)->getValue());
            $sem = mysqli_real_escape_string($link, $next->getCellByColumnAndRow(3, $i)->getValue());
            $mobile = mysqli_real_escape_string($link, $next->getCellByColumnAndRow(4, $i)->getValue());
            $sql = "INSERT INTO `student`(`r_no`, `name`, `branch`, `sem`, `mobile`) VALUES ('$r_no','$name','$branch','$sem','$mobile')";
            echo mysqli_query($link, $sql);
            if ($sql != ' ') {
              echo '<div class="container"><div class="alert alert-success alert-dismissible fade show  d-block">
              <button class="close" data-dismiss="alert">&times;</button>
              <strong>Student will be added</strong>
          </div></div>
          
          <script>location.href="account.php?addstd=3"</script>';
              unlink($name);
            }
          }
        }
      } else {
        echo '<script>alert("Please select the file")</script>';
      }
    }

    $seleectstd = "SELECT `id`,`r_no`, `name`, `sem`, `mobile` FROM `student` WHERE branch='$branch' ";
    $selcet = mysqli_query($link, $seleectstd);

    echo '
       <div class="container" style="margin-top:1%;left:0;position:fixed;" id="content">
       <h1 class="ml-4">Add Student</h1>
 <div class="card-body text-left" style="">
 <form method="POST" enctype="multipart/form-data">
 <div class="form-group">
 <input type="file" name="t1" id="t1" accept=".xls,.xlsx">
 </div>
 <button type="submit" class="btn btn-primary"  name="btn1" id="btn1">click</button>
 </form>
                   <p class="card-text">
                   <div class="table-responsive">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered">
    <thead>
      <tr>
       <th>Register number</th>
        <th>Name</th>
        <th>Semester</th>
        <th>Mobile</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
     ';
    while ($s = mysqli_fetch_assoc($selcet)) {
      echo "<tr><td>" . $s['r_no'] . "</td>
      <td>" . $s['name'] . "</td>
      <td>" . $s['sem'] . "</td>
      <td>" . $s['mobile'] . "</td>
      <td><a href=?editroll=" . $s['id'] . ">Edit</a>
      <a href=?delete=" . $s['id'] . ">Delete</a>
      </td>
      </tr>";
    }

    echo '</tbody>
  </table>    </div>
                   </p>
                 </div>
               

 </div> 
 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  
  ';
  }

  $stdid = "SELECT * FROM `student`";
  $selcet = mysqli_query($link, $stdid);
  while ($y = mysqli_fetch_assoc($selcet)) {
    if (@$_GET['editroll'] == $y['id']) {
      if (isset($_POST['upload'])) {
        $r_no = $_POST['Lname'];
        $name = $_POST['t1'];
        $sem = $_POST['sem'];
        $mobile = $_POST['mno'];
        $idd = $y['id'];
        $student = " UPDATE `student` SET `r_no`='$r_no',`name`='$name',`sem`='$sem',`mobile`='$mobile' WHERE `id`='$idd' ";
        $add = mysqli_query($link, $student);
        // echo $student;
        if ($student !== " ") {
          echo '<div class="container"><div class="alert alert-success alert-dismissible fade show  d-block">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong>Done</strong>
      </div></div>';
          echo '<script>location.href="account.php?addstd=3"</script>';
        }
      }
      echo '<script>$(document).ready(function(){
      $("#sem").val("' . $y['sem'] . '");
    });</script>';
      echo '
<div class="container" style="margin-top:3%;left:0;position:fixed;" id="content">
       <h1>Edit Student</h1>

 <div class="card "style="left:0;width:40%;">
 <div class="card-body text-left">
   <p class="card-text">
   <form method="POST" enctype="multipart/form-data" action="">
  <div class="form-group">
  <label for="Name1">Name:</label>
  <input type="text" class="form-control" required pattern="^[A-Za-z]*$" title="Alphabets only" style="width:100%" id="Name1" name="t1" 
  value=' . $y['name'] . '>
</div>
<div class="form-group">
<label for="Lname">Register number:</label>
<input type="text" class="form-control" required  style="width:100%" id="Lname" name="Lname" value=' . $y['r_no'] . '>
</div>
<div class="form-group">
<label for="sem">Semester:</label>
<select class="form-control" style="width:100%"  id="sem" name="sem">
<option value="Isem">Isem</option>
<option value="IIsem">IIsem</option>
<option value="IIIsem">IIIsem</option>
<option value="IVsem">IVsem</option>
<option value="Vsem">Vsem</option>
<option value="VIsem">VIsem</option>
</select>
</div>
<div class="form-group">
<label for="mno">Mobile number:</label>
<input type="tel" class="form-control" required pattern="[0-9]{10}" title="Enter valid Mobile number" style="width:100%"  id="mno" name="mno"value=' . $y['mobile'] . '>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary" name="upload" id="upload">Upload</button>
</div>

    </form> </p>
 </div>
 </div>';
    }
    if (@$_GET['delete'] == $y['id']) {
      $id = $y['id'];


      $deletstd = "DELETE FROM `student` WHERE `id`='$id'";
      $del = mysqli_query($link, $deletstd);
      if ($del) {
        echo '<div class="container"><div class="alert alert-success alert-dismissible fade show  d-block">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Student will be added</strong>
    </div></div><script>
    location.href="account.php?addstd=3"</script>';
      }
    }
  }
  if (@$_GET['logout'] == 4) {
    session_destroy();
    header("location:login.php");
  }
  ?>
</body>

</html>