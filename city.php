<?php 
include("App_Code/AdminEditController.php");

$city_masterMod = new city_masterModel();
$obj = new city_masterController();



if(isset($_POST['cityEnter'])){

    
    $city_masterMod->city = $_POST['city'];
    $city_masterMod->state_id = $_POST['dropState'];

    if(!empty($city_masterMod->city)){

        if($_POST['update_city'] != ""){
          
            $city_masterMod->city_id = $_POST['update_city'];
            if($obj->UpdateCityData($city_masterMod)){

                echo "<script>M.toast({html: 'City Update'});</script>";
            } else {
                echo "<script>M.toast({html: 'Error while updating City'});</script>";
            }
        }
        else
        {
            if($obj->InsertCityData($city_masterMod)){

                echo "<script>M.toast({html: 'City Added'});</script>";
            } else {
                echo "<script>M.toast({html: 'Error while adding City'});</script>";
            }
        }

    } else {
        echo "<script>M.toast({html: 'Please select all fields'});</script>";
    }
}


if(isset($_REQUEST['delete'])){

    $city_masterMod->city_id = $_REQUEST['delete'];
    $obj->DeleteCity($city_masterMod);
    echo "<script>window.location.href='admin_index.php?page=city.php';</script>";
}

?>

<!--Start of City table-->
<section id="city" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                            <table class="responsive-table highlight" id="tbl1">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>City</th>
                                      <th>State</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $data = $obj->ShowCityData($city_masterMod);
                                  $count=1;
                                  foreach ($data as $result) {
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["city"]; ?></td>
                                    <td><?php echo $result["state"]; ?></td>

                                    <td><a href="#edit_city" class="modal-trigger" onclick="editCity(<?php echo $result['city_id'];?>);" data-edit="<?php echo $result['city_id'];?>"><i class="material-icons">edit</i></a>
                                    </td>

                                    <td><a onclick="return confirm('Are your sure want to delete city?');" href="admin_index.php?page=city.php&delete=<?php echo $result["city_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                  </tr>

                                  <?php

                                  }
                                  
                                  ?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <a href="#edit_city" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div id="edit_city" class="modal">
            <div class="modal-content">
              <h4>Enter City</h4>
            <div class="row">
            <div class="input-field col m12">
            <i class="material-icons prefix">filter_hdr</i>       
            <select id="dropState" name="dropState">
                <option value="" disabled selected>Choose your option</option>
                    <?php 
                    $state_masterModel = new state_masterModel();
                    $sobj = new state_masterController();
                    $data = $sobj->ShowStateData($state_masterModel);
                      $count=1;
                      foreach ($data as $result) 
                        { ?>

                        <option value="<?php echo $result['state_id']; ?>"><?php echo $result['state']; ?></option>

                        <?php } ?>
                        </select>
                        <label>Select State</label>              
                </div>
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">location_city</i>
                        <input type="text" name="city" id="cityname" class="icon_prefix">
                        <label for="city" id="citylabel">City</label>
                        </div>
                </div>
            </div>
            
            <input type="hidden" name="update_city" id="hiddenValue">

            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="cityEnter" id="city-btn">Save
                     <i class="material-icons right">save</i>
                </button>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
            </div>
            </div>
    </section>

    <!--End of City table-->