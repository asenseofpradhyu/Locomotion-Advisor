<?php 

$state_masterMod = new state_masterModel();
$obj = new state_masterController();

if(isset($_POST['stateEnter'])){

    
    $state_masterMod->state = $_POST['state'];

    if(!empty($state_masterMod->state)){
        if($_POST['update_state'] != ''){

          $state_masterMod->state_id = $_POST['update_state'];

          if($obj->UpdateStateData($state_masterMod)){

            echo "<script>M.toast({html: 'State Update'});</script>";
        } else {
            echo "<script>M.toast({html: 'Error while updating State'});</script>";
        }
        } else {

            if($obj->InsertStateData($state_masterMod))
            {
                echo "<script>M.toast({html: 'State Added'});</script>";
            }
            else{
              echo "<script>M.toast({html: 'Error while adding State'});</script>";
            }

        }
         
    } else {
      echo "<script>M.toast({html: 'Please select all fields'});</script>";
  }
}
if(isset($_REQUEST['delete'])){

    $state_masterMod->state_id = $_REQUEST['delete'];
    $obj->DeleteState($state_masterMod);
    echo "<script>window.location.assign(admin_index.php?page=states.php);</script>";

}

?>

<!--Start of States table-->
<section id="states" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                            <table class="responsive-table highlight">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>States</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $data = $obj->ShowStateData($state_masterMod);
                                  $count=1;
                                  foreach ($data as $result) :
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["state"]; ?></td>
                                    <td><a href="#edit_state" class="modal-trigger" onclick="editState(<?php echo $result['state_id'];?>);"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete state?');" href="admin_index.php?page=states.php&delete=<?php echo $result["state_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                  </tr>

                                  <?php  endforeach; ?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <a href="#edit_state" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div id="edit_state" class="modal">
            <div class="modal-content">
              <h4>Enter States</h4>
            <div class="row">
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">filter_hdr</i>
                        <input type="text" name="state" id="statename" class="icon_prefix">
                        <label for="state">State</label>
                          </div>
                </div>
            </div>
            <input type="hidden" name="update_state" id="hiddenValue">
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="stateEnter">Save
                     <i class="material-icons right">save</i>
                </button>
            </div>
            </div>
            </div>
    </section>

    <!--End of States table-->