<?php 

$role_masterModel = new role_masterModel();
$obj = new role_masterController();

if(isset($_POST['roleEnter'])){

    
    $role_masterModel->user_role = $_POST['role'];

    if(!empty($role_masterModel->user_role)){
      
      if($_POST['update_rolemaster'] != ""){
      
        $role_masterModel->ur_id = $_POST['update_rolemaster'];
        
        if($obj->UpdateUserRoleData($role_masterModel)){

            echo "<script>M.toast({html: 'User Role Update'});</script>";
        } else {
            echo "<script>M.toast({html: 'Error while updating User Role'});</script>";
        }
    } else {
      
      if($obj->InsertUserRole($role_masterModel))
      {
          echo "<script>M.toast({html: 'User Role Added'});</script>";
      }
      else{
        echo "<script>M.toast({html: 'Error while adding User Role Data'});</script>";
      }
    }

    } else {
      echo "<script>M.toast({html: 'Please select all fields'});</script>";
      }
}

if(isset($_REQUEST['delete'])){

    $role_masterModel->ur_id = $_REQUEST['delete'];
    $obj->DeleteUserRole($role_masterModel);
    echo "<script>window.location.href=admin_index.php?page=role_master.php;</script>";

}

?>

<!--Start of Role Master table-->
<section id="role_master" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                            <table class="responsive-table highlight">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>User Roll</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $data = $obj->ShowUserRoleData($role_masterModel);
                                  $count=1;
                                  foreach ($data as $result) :
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["user_role"]; ?></td>
                                    <td><a href="#edit_role" class="modal-trigger" onclick="editRoleMaster(<?php echo $result['ur_id'];?>);"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete User Role ?');" href="admin_index.php?page=role_master.php&delete=<?php echo $result["ur_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                  </tr>

                                  <?php  endforeach; ?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <a href="#edit_role" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div id="edit_role" class="modal">
            <div class="modal-content">
              <h4>Enter User Roll</h4>
            <div class="row">
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" name="role" id="rolename" class="icon_prefix">
                        <label for="role">User Roll</label>
                          </div>
                </div>
            </div>
            <input type="hidden" name="update_rolemaster" id="hiddenValue">
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="roleEnter">Save
                     <i class="material-icons right">save</i>
                </button>
            </div>
            </div>
            </div>
    </section>

    <!--End of Role Master table-->