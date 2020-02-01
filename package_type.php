<?php 

$packagetype_masterModel = new packagetype_masterModel();
$obj = new packagetype_masterController();

if(isset($_POST['packageEnter'])){

    
    $packagetype_masterModel->ur_id = $_POST['roll'];
    $packagetype_masterModel->package_type = $_POST['package'];

      if(!empty($packagetype_masterModel->ur_id) && !empty($packagetype_masterModel->package_type)){

        if($_POST['update_packagetype'] != ''){

          $packagetype_masterModel->package_type_id = $_POST['update_packagetype'];
            if($obj->UpdatePackageData($packagetype_masterModel)){

                echo "<script>M.toast({html: 'Package Type Update'});</script>";
            } else {
                echo "<script>M.toast({html: 'Error while updating Package Type'});</script>";
            }

        } else {

          if($obj->InsertPackageData($packagetype_masterModel))
          {
              echo "<script>M.toast({html: 'Package Type Added'});</script>";
          }
          else{
            echo "<script>M.toast({html: 'Error while adding Package Type'});</script>";
          }

        }

      } else {
        echo "<script>M.toast({html: 'Please select all fields'});</script>";
      }

   
}
if(isset($_REQUEST['delete'])){

    $packagetype_masterModel->package_type_id = $_REQUEST['delete'];
    $obj->DeletePackage($packagetype_masterModel);
    echo "<script>window.location.location.href='admin_index.php?page=package_type.php';</script>";

}

?>

<!--Start of Faq table-->
<section id="faq" class="right-content">
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
                                      <th>Type</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $data = $obj->ShowPackageData($packagetype_masterModel);
                                  $count=1;
                                  foreach ($data as $result) :
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["user_role"]; ?></td>
                                    <td><?php echo $result["package_type"]; ?></td>
                                    <td><a href="#edit_package_type" class="modal-trigger" onclick="editPackageTypeMaster(<?php echo $result['package_type_id'];?>);"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete Package?');" href="admin_index.php?page=package_type.php&delete=<?php echo $result["package_type_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                  </tr>

                                  <?php  endforeach; ?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <a href="#edit_package_type" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div id="edit_package_type" class="modal">
            <div class="modal-content">
              <h4>Enter Package Type</h4>
            <div class="row">
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">face</i>
                    <select name="roll" id="roll">
                        <option value="" disabled selected>Choose your option</option>
                        <?php 
                            $role_masterModel = new role_masterModel();
                            $obj = new role_masterController();
                            $data = $obj->ShowUserRoleData($role_masterModel);
                                foreach ($data as $result) :
                                ?>

                                <option value="<?php echo $result['ur_id']; ?>"><?php echo $result['user_role']; ?></option>

                      <?php endforeach; ?>
                    </select>
                    <label for="roll">User Roll</label>
                    </div>
                </div>
                <div class="col m12">
                    <div class="input-field">
                        <i class="material-icons prefix">announcement</i>
                        <input type="text" name="package" id="packagetype" class="icon_prefix">
                        <label for="package">Package Type</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="update_packagetype" id="hiddenValue">
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="packageEnter">Save
                     <i class="material-icons right">save</i>
                </button>
            </div>
            </div>
            </div>
    </section>

    <!--End of Faq table-->