<?php
  include('../config/constants.php'); 

  if(isset($_GET['id']) AND isset($_GET['image_name']))
  {
    // 1. Get ID and Image Name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // 2. Remove the Image if Available
    if($image_name != "")
    {
        $path="../images/food/".$image_name;
        $remove=unlink($path);

        if($remove==false)
        {
            $_SESSION['upload']="<div class='error'>Failed to Remove Food Image.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
            die();
        }
    }

    // 3. Delete Food From Database
    $sql= "DELETE FROM tbl_food WHERE id=$id";
    $res=mysqli_query($conn,$sql);

    if($res==true)
    {
        $_SESSION['delete']="<div class='success'>Food Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

    else
    {
        $_SESSION['delete']= "<div class='error'>Failed to Delete Food.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
  }

  else
  {
    $_SESSION['unauthorize'] = "<div class='error'>Failed to Delete Food.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
  }
?>