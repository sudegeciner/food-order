<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" palceholder="Food title goes here." value="">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="Description" cols="30" row="5" value=""></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>

                </tr>

                <tr>
                    <td>Select New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <?php
                            $sql="SELECT * FROM tbl_catgeory WHERE active='Yes'";

                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title=$row['title'];
                                    $category_id=$row['id'];

                                  // echo "<option value='$category_id'>$category_title</option>";

                                  ?> 
                                  <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                  <?php
                                }
                            }

                            else
                            {
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                            ?>
                        
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                    
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Update Food" class="btn-seconder">
                    </td>
                </tr>
            </table>
        </form>



    </div>
</div>

<?php include('partials/footer.php'); ?>