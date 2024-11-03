<?php

   include('../config/constants.php');

  // 1.get the ID of to be deleted
  $id = $_GET ['id'];

  // 2.Create SQL Query to Delete Admin
  $sql="DELETE FROM tbl_admin WHERE id=$id";

  //Execute the Query
  $res= mysqli_query($conn, $sql);

  if($res==TRUE)
  {
      //echo "Admin Deleted";
      $_SESSION['delete']= "<div class='success'>Admin Deleted Successfully</div>";

      header('location:'.SITEURL.'admin/manage-admin.php');
  }
  else{
    //echo"Failed to deleted";
    $_SESSION['delete']="<div class='error'>Failed to Delete Admin. Try Again Later.</div>";

    header('location:'.SITEURL.'admin/manage-admin.php');
  }
  //3. Redirect to Manage Admin page with message (success/error)
?>