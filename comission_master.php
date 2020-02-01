<?php 

$commission_masterModel = new commission_masterModel();
$obj = new commission_masterController();

if(isset($_POST['commissionEnter'])){

    
    $commission_masterModel->commission = $_POST['commission'];


    if($obj->InsertCommissionData($commission_masterModel))
    {
        echo "<script>M.toast({html: 'FAQ's Added'});</script>";
    }
    else{
      echo "<script>M.toast({html: 'Error while adding FAQ's});</script>";
    }
}


?>

<!--Start of Faq table-->
<section id="faq" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12">
                                 <input id="comission" type="number" name="commission">
                                <label for="comission">Set Commission</label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="commissionEnter">Save
                            <i class="material-icons right">save</i>
                        </button>
                      </div>
                </div>
            </div>
        </div>
        </div>
        
    </section>

    <!--End of Faq table-->