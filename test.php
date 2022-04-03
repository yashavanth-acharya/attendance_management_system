<?php 
// if(isset($_POST['upload1']))
include("db.php");
print_r($_POST);
if(isset($_POST['rollno']))
 {
  
   $rollno=$_POST['rollno'];
   $name=$_POST['name'];
   $present_class=$_POST['present_class'];
   $totalpresent=$_POST['total_present'];
   $totalclass=$_POST['tc'];
   $subject=$_POST['sub'];
   $branch=$_POST['branch'];
   
   for($i=0;$i< count($rollno);$i++)
   {
     $rno=mysqli_real_escape_string($link,$rollno[$i]);
     $stdname=mysqli_real_escape_string($link,$name[$i]);
     $pc=mysqli_real_escape_string($link,$present_class[$i]);
     $totalpre=mysqli_real_escape_string($link,$totalpresent[$i]);
     $tc=mysqli_real_escape_string($link,$totalclass[$i]);
     $sub=mysqli_real_escape_string($link,$subject[$i]);
     $branchstd=mysqli_real_escape_string($link,$branch[$i]);
   
$query="INSERT INTO `attends`(`r_no`, `name`, `total_class`, `present_class`, `total_present`, `subject`,`branch`) VALUES ('$rno','$stdname','$tc','$pc','$totalpre','$sub','$branchstd')";
if($query!="")
{
if(mysqli_multi_query($link,$query))
{
  
echo"data saved";
}
else
{
  echo $query;
echo" not saved";
}
}
else{
echo"fil the all fileds";
}
 }  
}

            ?>