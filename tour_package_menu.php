<?php 

echo "<script>editOperatorpackageMaster(".$_SESSION['user'].");</script>";
$tour_package_masterModel = new tour_package_masterModel();
$obj = new tour_package_masterController();


if(isset($_POST['tourPackageEnter'])){

    
    $tour_package_masterModel->package_title = $_POST['title'];
    $tour_package_masterModel->package_price = $_POST['price'];
    $tour_package_masterModel->package_description = $_POST['description'];
    $tour_package_masterModel->package_type_id = $_POST['package_type'];
    $tour_package_masterModel->status = $_POST['status'];



    if(!empty($tour_package_masterModel->package_title) && !empty($tour_package_masterModel->package_price) && !empty($tour_package_masterModel->package_description) && !empty($tour_package_masterModel->status)){

        if($_POST['update_tourpackagemaster'] != ""){
          
            $tour_package_masterModel->package_id = $_POST['update_tourpackagemaster'];
            if($obj->UpdateTourPackageData($tour_package_masterModel)){

                echo "<script>M.toast({html: 'Package Update'});</script>";
            } else {
                echo "<script>M.toast({html: 'Error while updating Package'});</script>";
            }
        }
        else
        {

            if($_FILES['dimage']['error'] > 0 ){
                echo "<script>M.toast({html: 'Please Add Image'});</script>";
            } else {
                $imagepath = "img/tour_package".$_FILES['dimage']['name'];
                move_uploaded_file($_FILES['dimage']['tmp_name'], $imagepath);
                $tour_package_masterModel->dimage = $imagepath;
            }

            if($obj->InsertTourPackageData($tour_package_masterModel)){

                echo "<script>M.toast({html: 'Package Added'});</script>";
            } else {
                echo "<script>M.toast({html: 'Error while adding Package'});</script>";
            }
        }

    } else {
        echo "<script>M.toast({html: 'Please select all fields'});</script>";
    }
}


if(isset($_REQUEST['delete'])){

    $tour_package_masterModel->package_id = $_REQUEST['delete'];
    $obj->DeleteTourPackage($tour_package_masterModel);
    echo "<script>window.location.href='tour-admin.php?page=tour_package_menu.php';</script>";
}



?>

<!--Start of Package-Menu table-->
<section id="package-menu" class="right-content">
            <div class="admin-content-bg">
                <div class="row">
                    <div class="col l12">
                        <div class="card ">
                            <div class="card-content">
                                <table class="responsive-table highlight centered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                        <?php 
                                  $tour_package_masterModel->user_id = $_SESSION['user'];
                                  
                                  $data = $obj->ShowTourPackageData($tour_package_masterModel);
                                  $count=1;
                                  foreach ($data as $result) {
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["package_title"]; ?></td>
                                    <td><?php echo $result["package_price"]; ?></td>
                                    <td><?php echo $result["status"]; ?></td>

                                    <td><a href="#edit_package_menu" class="modal-trigger" onclick="editTourPackageMaster(<?php echo $result['package_id'];?>);"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete Package?');" href="tour_admin.php?page=tour_package_menu.php&delete=<?php echo $result["package_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                <?php

                                  }
                                  
                                  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="fixed-action-btn">
                            <a href="#edit_package_menu" class="btn-floating btn-large red modal-trigger tooltipped"
                                data-position="left" data-tooltip="Add">
                                <i class="large material-icons">add</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="edit_package_menu" class="modal">
                <div class="modal-content">
                  <h4>Enter Package</h4>
                <div class="row">
                    <div class="col m12">
                        <div class="input-field">
                        <i class="material-icons prefix">title</i>
                            <input type="text" name="title" id="plantitle" class="icon_prefix">
                            <label for="title">Package Title</label>
                        </div>
                    </div>
                    <div class="col m12">
                        <div class="input-field">
                        <i class="material-icons prefix">monetization_on</i>
                            <input type="number" name="price" id="planprice" class="icon_prefix">
                            <label for="price">Package Price</label>
                        </div>
                    </div>
                    <div class="col m12">
                        <div class="input-field">
                        <i class="material-icons prefix">description</i>
                        <textarea id="description" class="materialize-textarea" name="description"></textarea>
                        <label for="description">Textarea</label>
                        </div>
                    </div>
                    <div class="col m12">
                        <div class="input-field">
                        <i class="material-icons prefix">more</i>
                        <select name="package_type">
                            <option value="" disabled selected>Choose your option</option>
                            <?php

                        $sobj = new package_type_masterController();
                        $packagetype_masterModel = new packagetype_masterModel();
                        $data = $sobj->ShowPackagetypedata($packagetype_masterModel);
                    foreach ($data as $result) 
                            { ?>
                                <option value="<?php echo $result['package_type_id']; ?>"><?php echo $result['package_type']; ?></option>

                            <?php } ?>
                        </select>
                         <label>Package Type</label>
                        </div>
                    </div>
                    <div class="col m12">
                    <div class="file-field input-field">
                            <div class="btn">
                              <span>File</span>
                              <input type="file" name="dimage">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>
                    </div>
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
                <input type="hidden" name="update_tourpackagemaster" id="hiddenValue">
                <div class="modal-footer">
                    <button class="btn waves-effect waves-light" type="submit" name="tourPackageEnter">Save
                         <i class="material-icons right">save</i>
                    </button>
                </div>
                </div>
                </div>
        </section>

        <!--End of Package Menu table-->
