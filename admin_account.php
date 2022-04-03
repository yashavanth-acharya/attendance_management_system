<?php include("db.php") ;
session_start();
if(!$_SESSION['t1'])
{
    header("location:http://localhost/projects/Gptattendence/login.php");
}
$id=$_SESSION['t1'];
        $selectbranch="SELECT `name`,`Branch` FROM `admin` WHERE `Email`='$id'";
        $result=mysqli_query($link,$selectbranch);
        $row=mysqli_fetch_row($result);
        $branch=$row[1];
        $tname=$row[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GPT||Admin account</title>
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
                <button type="button" class="close close1" >
                        <span class="clrs text-light">&times;</span>
                      </button>
            <ul>
                <li><a href="?home=1">Home</a></li>
                <li><a href="?att=2">Attendence</a></li>
                <li><a href="?addstd=3">Teachers</a></li>
                <li><a href="?old=4">Oldrecord</a></li>
                <li><a href="?logout=5">Logout</a></li>
            </ul>
        </nav>
    <?php
    if(@$_GET['home']==1)
    {
        echo "<style>body{overflow: hidden;}</style>";
        echo "<div class='jumbotron'id='cont-one'>
        <h1 class='display-1'>GPT</h1>;
        
        
        
        </div>";
    }
if(@$_GET['att']==2)
{
    echo '<div class="container" style="position:fixed;left:0" id="content">
    <h1 class="display-4 ml-5">Attendence list</h1> 
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
<button type="submit" class="btn btn-primary ml-2" name="send" id="send">Send</button>
</form>
<br>


<table class="table table-bordered mt-2" id="creat_table"style="top:50%;overflow-y: scroll;">
 <thead>
   <tr>
   <th>S.no</th>
     <th>Register Number</th>
     <th>Student name</th>
     <th>Subject</th>
     <th>Total Class</th>
     <th>Present Class</th>
     <th>Percentage</th>
     <th>Mobile</th>
   </tr>
 </thead>
 <tbody>';
 if(isset($_POST['select']))
 {
   $sem=$_POST['sem'];
   
    
       echo'<script>$(document).ready(function(){
         $("#sem1").val("'.$sem.'");
       });</script>';
       $count=0;
       $rollno="SELECT `r_no`,`mobile` FROM `student` WHERE `sem`='$sem'";
       $stdr=mysqli_query($link,$rollno);
     while($roll=mysqli_fetch_assoc($stdr))
     {
       $number=$roll['r_no'];
       $mobile=$roll['mobile'];
     $student="SELECT `r_no`, `name`, `total_class`, `present_class`, `total_present`, `subject` FROM `attends` WHERE `r_no`='$number'AND `branch`='$branch'";
     $std=mysqli_query($link,$student);
  
 while($row=mysqli_fetch_assoc($std))
 {
   $count++;
   echo '<tr>
   <td>'.$count.'</td>      
   <td contenteditable="true" class="rollno">'.$row['r_no'].'</td>
   <td contenteditable="true" class="name">'.$row['name'].'</td>
   <td contenteditable="true"  class="sub">'.$row['subject'].'</td>
   <td contenteditable="true"  class="tc">'.$row['total_class'].'</td>
   <td contenteditable="true"  class="present_class">'.$row['present_class'].'</td>
   <td  contenteditable="true" id="prsent" class="total_present">'.$row['total_present'].'</td>
   <td  contenteditable="true" id="mob" class="mob">'.$mobile.'</td>
   </tr>';

}
     }
  
 }
 if(isset($_POST['send']))
 {
  $sem=$_POST['sem'];
  $rollno="SELECT `r_no`,`mobile` FROM `student` WHERE `sem`='$sem'";
  $stdr=mysqli_query($link,$rollno);
while($roll=mysqli_fetch_assoc($stdr))
{
  $rollnumbre=$roll['r_no'];
  $numbers=$roll['mobile'];
$student="SELECT `r_no`, `name`, `total_class`, `present_class`, `total_present`, `subject`,`date_time` FROM `attends` WHERE `r_no`='$rollnumbre'AND `branch`='$branch'";
$std=mysqli_query($link,$student);

while($row=mysqli_fetch_assoc($std))
{
  $name=$row['name'];
  $sub=$row['subject'];
  $total=$row['total_class'];
  $presentclass=$row['present_class'];
  $percentage=$row['total_present'];
  $date=$row['date_time'];
  // $message="Subject $sub,Totalclass $total, Presentclass $presentclass";
  $pertest=intval($percentage);
  if("75"<$pertest)
  {
    $remark="Excellent";
  }
  elseif("60"<$pertest)
  {
    $remark="Need to improve";
  }
  else{
    $remark="Please visit the college";
  }
  $message="Hi, Parents of $name, attedance status of $name attedance as of $date
  Total Number of classes of subject $sub is $total. 
  Number of classes attended $presentclass
  percentage $percentage.
  remark
  $remark";
  sms($message,$numbers);
  // echo $message."<br>";
  $rol=$row['r_no'];
  $name=$row['name'];
  $subject=$row['subject'];
  $totalclasses=$row['total_class'];
  $presentclasses=$row['present_class'];
  $percentage=$row['total_present'];
   $insertsql="INSERT INTO `oldrecode`(`Register_Number`,`Student_name`,`Subject`,`Total_Classes`,`Present_Classes`,`Percentage`,`Mobile`,`branch`)VALUES ('$rol','$name','$subject','$totalclasses','$presentclasses','$percentage','$numbers','$branch')";
    $set=mysqli_query($link,$insertsql);
    if($insertsql!=" ")
    {
      // echo $insertsql;
      $sutdele="DELETE FROM `attends` WHERE `r_no`='$rol'";
      mysqli_query($link,$sutdele);
    }
 }
}

 }
echo'</table>    
    
</div>';


}
if(@$_GET['addstd']==3)
{$seleectstd="SELECT `name`, `mobile`, `Email` FROM `teachers` ";
  $selcet=mysqli_query($link,$seleectstd);
  echo' <div class="container mt-3 p-3" style="top:50%;overflow-y: scroll;">
<h4 class="display-3">Teachers</h4>
  <div class="table-responsive">
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
<br>
<table class="table table-bordered">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
</tr>
</thead>
<tbody id="myTable">
';
while($s=mysqli_fetch_assoc($selcet))
{
echo"
<td>".$s['name']."</td>
<td>".$s['Email']."</td>
<td>".$s['mobile']."</td>
</tr>";

}

echo'</tbody>
</table>    </div>
  </p>
</div>
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
if(@$_GET['old']==4)
{
 echo'
 <div class="container" style="position:fixed;left:0" id="content">
    <h1 class="display-4 ml-5">Old Records</h1> 
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
</form>
<br>
 
 
 <div class="card-body text-left" style="top:50%;overflow-y: scroll;">
                   <p class="card-text">
                   <div class="table-responsive">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>S.no</th>
      <th>Register Number</th>
      <th>Student name</th>
      <th>Subject</th>
      <th>Total Class</th>
      <th>Present Class</th>
      <th>Percentage</th>
      <th>Mobile</th>
      </tr>
    </thead>';
    
    if(isset($_POST['select']))
    {
      $sem=$_POST['sem'];
      
       
          echo'<script>$(document).ready(function(){
            $("#sem1").val("'.$sem.'");
          });</script>';
          $count=0;
          $rollno="SELECT `r_no`,`mobile` FROM `student` WHERE `sem`='$sem'";
          $stdr=mysqli_query($link,$rollno);
        while($roll=mysqli_fetch_assoc($stdr))
        {
          $number=$roll['r_no'];
          $mobile=$roll['mobile'];
        $student="SELECT `Register_Number`, `Student_name`, `Subject`, `Total_Classes`, `Present_Classes`, `Percentage` FROM `oldrecode` WHERE `Register Number`='$number'AND `branch`='$branch'";
        $std=mysqli_query($link,$student);
     
    while($row=mysqli_fetch_assoc($std))
    {
      $count++;
      echo '<tbody id="myTable">
      <tr>
      <td>'.$count.'</td>      
      <td contenteditable="true" class="rollno">'.$row['Register_Number'].'</td>
      <td contenteditable="true" class="name">'.$row['Student_name'].'</td>
      <td contenteditable="true"  class="sub">'.$row['Subject'].'</td>
      <td contenteditable="true"  class="tc">'.$row['Total_Classes'].'</td>
      <td contenteditable="true"  class="present_class">'.$row['Present_Classes'].'</td>
      <td  contenteditable="true" id="prsent" class="total_present">'.$row['Percentage'].'</td>
      <td  contenteditable="true" id="mob" class="mob">'.$mobile.'</td>
      </tr>';
   
   }
        }
     
    }
    echo'</tbody>
  </table>    </div>
                   </p>
                 </div>
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
if(@$_GET['logout']==5)
{
  session_destroy();
  header("location:admin_login.php");
}
    ?>
</body>
</html>
