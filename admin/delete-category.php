<?php 

     include('../config/constants.php');

    //echo "Delete Page";
    //Check whether the id and image_namevalue is set or not

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the Value and Delete
        //echo "Get the Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical iamge file is available
         if($image_name != "")
         {
            // Get the Image Path
            $path="../images/category/".$image_name;

            // Remove Image File from Folder
            $remove=unlink($path);

            if($remove==false)
            {
                $_SESSION['remove']="<div class='error'>Failed to Remove Category Image.</div>";

                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        } 
        //Delete Data from Database
        $sql="DELETE FROM tbl_category WHERE id=$id";

        $res=mysqli_query($conn, $sql);

        if($res==true)
        {
          $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";

          header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";

            header('location:'.SITEURL.'admin/manage-category.php');
        }

    }
    else
    {
        //Redirect to Manage Category Page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>