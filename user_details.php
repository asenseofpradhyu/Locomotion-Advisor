<?php 

$user_detailsmasterModel = new user_detailsmasterModel();
$obj = new userDetails_masterController();


if(isset($_REQUEST['delete'])){

    $user_detailsmasterModel->user_id = $_REQUEST['delete'];
    $obj->DeleteUserDetails($user_detailsmasterModel);
    echo "<script>window.location.location.href='admin_index.php?page=user_details.php';</script>";
}

?>

<!--Start of User Details table-->
<section id="userDetails" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                            <table class="responsive-table highlight">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Roll</th>
                                      <th>Gender</th>
                                      <th>Mobile</th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th>Edit</th>
                                      <th>Delete</th>                                      
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $data = $obj->ShowUserDetailsData($user_detailsmasterModel);
                                  $count=1;
                                  foreach ($data as $result) {
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["Name"]; ?></td>
                                    <td><?php echo $result["user_role"]; ?></td>
                                    <td><?php echo $result["Gender"]; ?></td>
                                    <td><?php echo $result["mobile"]; ?></td>
                                    <td><?php echo $result["email"]; ?></td>
                                    <td><?php echo $result["status"]; ?></td>
                                    <td><a href="#!"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete city?');" href="admin_index.php?page=user_details.php&delete=<?php echo $result["user_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                  </tr>

                                  <?php

                                  }
                                  
                                  ?>
                                </tbody>
                              </table>
                      </div>
                </div>
            </div>
        </div>
        </div>
        
    </section>

    <!--End of User Details table-->