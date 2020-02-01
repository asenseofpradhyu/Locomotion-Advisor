<?php 

$plan_masterModel = new plan_masterModel();
$obj = new plan_masterController();

if(isset($_POST['planEnter'])){
    $plan_masterModel->plan_title = $_POST['title'];
    $plan_masterModel->plan_price = $_POST['price'];
    $plan_masterModel->discount = $_POST['discount'];
    $plan_masterModel->discraption = $_POST['discription'];
    $plan_masterModel->quarter_time = $_POST['year'];
    $plan_masterModel->duration = $_POST['duration'];
    $plan_masterModel->status = $_POST['status'];

    if(!empty($plan_masterModel->plan_title) && !empty($plan_masterModel->plan_price) && !empty($plan_masterModel->discount) && !empty($plan_masterModel->discraption) && !empty($plan_masterModel->quarter_time)  && !empty($plan_masterModel->duration)  && !empty($plan_masterModel->status)){

        if($_POST['update_planmaster'] != ""){

            $plan_masterModel->plan_id = $_POST['update_planmaster'];
            if($obj->UpdatePlanMasterData($plan_masterModel)){
    
                echo "<script>M.toast({html: 'User Plan Update'});</script>";
            } else {
                echo "<script>M.toast({html: 'Error while updating Plan'});</script>";
            }

        } else {

        if($obj->InsertPlanData($plan_masterModel))
        {
            echo "<script>M.toast({html: 'Plan Added'});</script>";
        }
        else{
        echo "<script>M.toast({html: 'Error while adding Plan});</script>";
        }

        }

    } else {
        echo "<script>M.toast({html: 'Please select all fields'});</script>";
    }
    unset($plan_masterModel);
}
if(isset($_REQUEST['delete'])){

    $plan_masterModel->plan_id = $_REQUEST['delete'];
    $obj->DeletePlan($plan_masterModel);
    echo "<script>window.location.href='admin_index.php?page=plan_master.php';</script>";

}

?>

<!--Start of Plan table-->
<section id="plan_master" class="right-content">
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
                                      <th>Price</th>
                                      <th>Discount</th>
                                      <th>Quarter Time</th>
                                      <th>Duration</th>
                                      <th>Status</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $plan_masterModel = new plan_masterModel();
                                  $data = $obj->ShowPlanData($plan_masterModel);
                                  $count=1;
                                  foreach ($data as $result) :
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["plan_title"]; ?></td>
                                    <td><?php echo $result["plan_price"]; ?></td>
                                    <td><?php echo $result["discount"]; ?></td>
                                    <td><?php echo $result["quarter_time"]; ?></td>
                                    <td><?php echo $result["duration"]; ?></td>
                                    <td><?php echo $result["status"]; ?></td>
                                    <td><a href="#edit_plan_master" class="modal-trigger" onclick="editPlanMaster(<?php echo $result['plan_id'];?>);"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete Plan?');" href="admin_index.php?page=plan_master.php&delete=<?php echo $result["plan_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                  </tr>

                                  <?php  endforeach; ?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <a href="#edit_plan_master" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div id="edit_plan_master" class="modal">
            <div class="modal-content">
              <h4>Enter Plan</h4>
            <div class="row">
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">title</i>
                        <input type="text" name="title" id="plantitle" class="icon_prefix">
                        <label for="title">Title</label>
                    </div>
                </div>
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">monetization_on</i>
                        <input type="number" name="price" id="planprice" class="icon_prefix">
                        <label for="price">Price</label>
                    </div>
                </div>
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">attach_money</i>
                        <input type="text" name="discount" id="plandiscount" class="icon_prefix">
                        <label for="discount">Discount</label>
                    </div>
                </div>
                <div class="col m12">
                    <div class="input-field">
                        <i class="material-icons prefix">description</i>
                        <textarea id="plandescription" class="materialize-textarea" name="discription"></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">monetization_on</i>
                        <input type="number" name="duration" id="planduration" class="icon_prefix">
                        <label for="duration">Duration</label>
                    </div>
                </div>
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">access_time</i>
                        <select name="year">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Full Year">Full Year</option>
                            <option value="Oct-Nov-Dec-Jan">Oct-Nov-Dec-Jan</option>
                            <option value="Feb-March-Apr-May">Feb-March-Apr-May</option>
                            <option value="Jun-Jul-Aug-Sep">Jun-Jul-Aug-Sep</option>
                        </select>
                    <label>Quarter Time</label>
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
            <input type="hidden" name="update_planmaster" id="hiddenValue">
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="planEnter">Save
                     <i class="material-icons right">save</i>
                </button>
            </div>
            </div>
            </div>
    </section>

    <!--End of Plan table-->