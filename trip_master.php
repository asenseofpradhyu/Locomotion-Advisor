<?php 

$trip_master_masterMod = new trip_master_masterModel();
$obj = new trip_master_masterController();

if(isset($_POST['destinationEnter'])){

    $trip_master_masterMod->destination_name = $_POST['nameOfDestination'];
    $trip_master_masterMod->destination_description = $_POST['destinationDescription'];
    
    if(!empty($trip_master_masterMod->destination_name) && !empty($trip_master_masterMod->destination_description)){

      if($_POST['update_trip_master'] != ''){

        $trip_master_masterMod->destination_id = $_POST['update_trip_master'];
            if($obj->UpdateDestinationDetails($trip_master_masterMod)){

                echo "<script>M.toast({html: 'Destination Update'});</script>";
            } else {
                echo "<script>M.toast({html: 'Error while updating Destination'});</script>";
            }

      } else {

        // Logo Image Uploader 
    if($_FILES['logo']['error'] > 0 ){
      echo "<script>M.toast({html: 'Please Add logo'});</script>";
  } else {
      $logopath = "img/logo/".$_FILES['logo']['name'];
      move_uploaded_file($_FILES['logo']['tmp_name'], $logopath);
      $trip_master_masterMod->destination_logo = $logopath;
  }


  // Banner Image Uploader 
  if($_FILES['banner']['error'] > 0 ){
      echo "<script>M.toast({html: 'Please Add Banner'});</script>";
  } else {
      $bannerpath = "img/banner/".$_FILES['banner']['name'];
      move_uploaded_file($_FILES['banner']['tmp_name'], $bannerpath);
      $trip_master_masterMod->destination_bannar_img = $bannerpath;
  }
 
  if($obj->InsertDestinationMaster($trip_master_masterMod)){
      echo "<script>M.toast({html: 'Destination Added'});</script>";
  } else {
      echo "<script>M.toast({html: 'Error while adding Data'});</script>";
  }

      }

    } else {
      echo "<script>M.toast({html: 'Please select all fields'});</script>";
    }
    

}

if(isset($_REQUEST['delete'])){

    $trip_master_masterMod->dm_id = $_REQUEST['delete'];
    $obj->DeleteDestination($trip_master_masterMod);
    echo "<script>window.location.assign(admin_index.php?page=trip_master.php)</script>";

}

?>

<!--Start of Trip Master table-->
<section id="trip-master" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                            <table class="responsive-table">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Destination</th>
                                      <th>Description</th>
                                      <th>Logo</th>
                                      <th>Banner</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>  
                                    <?php

                                    $data = $obj->ShowDestinationDetails($trip_master_masterMod);
                                    $count=1;
                                    foreach($data as $result) :

                                    ?>
                                  <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $result['destination_name']?></td>
                                    <td><?php echo $result['destination_discription']?></td>
                                    <td>
                                    <a href="#logomodel" class="modal-trigger">
                                    <img src="<?php echo $result['destination_logo']?>" class="tableimg-logo circle responsive-img" alt="Logo Image">
                                    </a>
                                    </td>

                                    <td><img src="<?php echo $result['destination_bannar_img']?>" class="tableimg-banner responsive-img" alt="Banner Image"></td>
                                    <td><a href="#edit_trip_master" class="modal-trigger" onclick="editTripMaster(<?php echo $result['dm_id'];?>);"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete destination?');" href="admin_index.php?page=trip_master.php&delete=<?php echo $result['dm_id']?>"><i class="material-icons">delete</i></a></td>
                                  </tr>
                                    <?php endforeach;?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <a href="#edit_trip_master" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div id="edit_trip_master" class="modal">
            <div class="modal-content">
              <h4>Enter Destination Detaills</h4>
            <div class="row">
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">filter_hdr</i>
                        <input type="text" name="nameOfDestination" id="name-of-destination" class="icon_prefix">
                        <label for="name-of-destination">Name of Destination</label>
                     </div>
                </div>
                <div class="col m12">
                <div class="input-field">
                    <i class="material-icons prefix">description</i>
                    <textarea id="destination-description" class="materialize-textarea" name="destinationDescription"></textarea>
                    <label for="textarea2">Destination Description</label>
                </div>
                </div>
                <div class="col m12">
                <div class="file-field input-field">
      <div class="btn">
        <span>Logo</span>
        <input type="file" name="logo" id="logo">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
                </div>
                <div class="col m12">
                <div class="file-field input-field">
      <div class="btn">
        <span>Banner</span>
        <input type="file" name="banner" id="banner">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
          </div>
            </div>
            <input type="hidden" name="update_trip_master" id="hiddenValue">
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="destinationEnter">Save
                     <i class="material-icons right">save</i>
                </button>
            </div>
            </div>
            </div>
    </section>

    <!--End of Trip Master table-->