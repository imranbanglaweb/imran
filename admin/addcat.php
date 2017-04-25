<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_9">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 
               if ($_SERVER['REQUEST_METHOD']== 'POST') {
                    $catname=$_POST['catname'];
    $catname=mysqli_real_escape_string($dbcon->link,$catname);
                  if (empty($catname)) {
                    echo "<span class='error'>Field Not empty</span>";
                  }
                  else
                  {
                    $query="INSERT INTO tbl_cate(name) VALUES
                    ('$catname')";
                    $catinsert=$dbcon->insert($query);
                   if ($catinsert) {
              echo "<span class='success'>Category Added</span>";
                   }
                   else{
                    echo "no Category added";
                   }
                  }

                }

             ?>
                 <form action="addcat.php" method="POST">
                    <table class="form">
                   					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="catname" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                <input type="submit" name="submit" Value="Added" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
 <?php include 'inc/footer.php';?>