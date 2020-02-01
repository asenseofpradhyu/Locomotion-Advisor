<?php 

$tour_package_masterModel = new tour_package_masterModel();
$obj = new tour_package_masterController();

if(isset($_POST['packageEnter'])){

    $tour_package_masterModel->status = $_POST['status'];
    $tour_package_masterModel->package_id = $_POST['update_packagetype'];

      if(!empty($tour_package_masterModel->status)){

        if($_POST['update_packagetype'] != ''){

            if($obj->AdminUpdatePackageData($tour_package_masterModel)){
                echo "<script>M.toast({html: 'Error while updating Package Type'});</script>";
            } else {
                echo "<script>M.toast({html: 'Package Status Update'});</script>";
            }

        }

      } else {
        echo "<script>M.toast({html: 'Please select all fields'});</script>";
      }

   
}
if(isset($_REQUEST['delete'])){

    $packagetype_masterModel->package_type_id = $_REQUEST['delete'];
    $obj->DeletePackage($packagetype_masterModel);
    echo "<script>window.location.location.href='admin_index.php?page=package_details.php';</script>";

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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $data = $obj->ShowTourPackageData($tour_package_masterModel);
                                  $count=1;
                                  foreach ($data as $result) {
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["package_title"]; ?></td>
                                    <td><?php echo $result["package_description"]; ?></td>
                                    <td><?php echo $result["package_price"]; ?></td>
                                    <td><?php echo $result["status"]; ?></td>

                                    <td><a href="#edit_package_type" class="modal-trigger" onclick="editTourPackageMaster(<?php echo $result['package_id'];?>);"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete Package?');" href="tour_admin.php?page=package_details.php&delete=<?php echo $result["package_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                <?php

                                  }
                                  
                                  ?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <!-- <a href="#edit_package_type" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a> -->
                </div>
            </div>
        </div>
        </div>
        <div id="edit_package_type" class="modal">
            <div class="modal-content">
              <h4>Select Action</h4>
            <div class="row">
            <div class="col m12">
                        <div class="input-field">
                        <i class="material-icons prefix">more</i>
                        <select name="status">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Active">Active</option>
                            <option value="De-active">De-Active</option>
                        </select>
                         <label>Status</label>
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