<?php
session_start();
$conn = mysqli_connect("localhost", "root","","todoapp");
if(!$conn){
  echo mysqli_connect_error($conn);
}
$sql = "SELECT * FROM `tasks` order by id asc";
$result = mysqli_query($conn , $sql);



?>
<!DOCTYPE html>
<html>
  <head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-to-do-list/1.0.0/bootstrap-to-do-list.rtl.min.css" integrity="sha512-9T1NdqjWrFbCzAdmtAfhtMLnOXOsb0xwcs/B5qlGevZcNc6PePt+ghTACNSQch/WZqq4K3Sn+cXYJhiDIXBJwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">To Do App</h4>
            <?php 
                if(isset($_SESSION['errors'])):
                  if(is_array($_SESSION['errors'])):
                foreach($_SESSION['errors'] as $error ): ?>
                  <div class="alert alert-danger text-center">
                    <?php echo $error ; ?>
                  </div>
                <?php endforeach;
                  elseif(!is_array($_SESSION['errors'])):?>
                        <div class="alert alert-danger text-center">
                        <?php  echo $_SESSION['errors'];
                        ?>  
                        </div>
           <?php
                  endif; 
                endif;
                unset($_SESSION['errors']);

                  ?>
            <?php 
                if(isset($_SESSION['success'])):
                ?>
                  <div class="alert alert-success text-center">
                    <?php echo $_SESSION['success'] ; ?>
                  </div>
                  <?php
                        unset($_SESSION['success']);
                        endif;
                  ?>

            <form action ="handelers/store-task.php" method="POST" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
              <div class="col-12">
                <div class="form-outline">
                  <input name ="title" type="text" id="form1" class="form-control" />
                  <label class="form-label" for="form1">Enter a task here</label>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" name ="" class="btn btn-primary">add</button>
              </div>

            </form>

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Todo item</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_assoc($result)):
                  ?>
                <tr>
                  <th scope="row"> <?php echo $row['id'] ;?></th>
                  <td><?php echo $row['title'];?></td>
                  <td>
                    
                    <a href="handelers/deleteTask.php?id=<?php echo $row['id'];?>" class="btn btn-danger"> Delete </a>
                    <button type="submit" onclick="location.href='update.php?<?php echo 'id=' . $row['id'].'&title='.$row['title'] ?>'"  class="btn btn-success ms-1">update</button>
                  </td>
                </tr>
                <?php 
                 endwhile ;?> 
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
</html>