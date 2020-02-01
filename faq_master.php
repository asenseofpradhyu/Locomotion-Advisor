<?php 

$faq_masterModel = new faq_masterModel();
$obj = new faq_masterController();

if(isset($_POST['faqEnter'])){

    
    $faq_masterModel->faq_que = $_POST['question'];
    $faq_masterModel->faq_ans = $_POST['answer'];

    if(!empty($faq_masterModel->faq_que) && !empty($faq_masterModel->faq_ans)){

        if($_POST['update_faqmaster'] != ""){

            $faq_masterModel->faq_id = $_POST['update_faqmaster'];
            if($obj->UpdateFaqData($faq_masterModel)){

                echo "<script>M.toast({html: 'FAQ Update'});</script>";
            } else {
                echo "<script>M.toast({html: 'Error while updating FAQ'});</script>";
            }

        } else {
        if($obj->InsertFaqData($faq_masterModel)){
            echo "<script>M.toast({html: 'FAQ's Added'});</script>";
        }
        else {
            echo "<script>M.toast({html: 'Error while adding FAQ's});</script>";
        }
    }

    } else {
        echo "<script>M.toast({html: 'Please select all fields'});</script>";
    }
    unset($faq_masterModel);
}
if(isset($_REQUEST['delete'])){

    $faq_masterModel->faq_id = $_REQUEST['delete'];
    $obj->DeleteFaq($faq_masterModel);
    echo "<script>window.location.location.href='admin_index.php?page=faq_master.php';</script>";

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
                                      <th>Question</th>
                                      <th>Answer</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  $faq_masterModel = new faq_masterModel();
                                  $data = $obj->ShowFaqData($faq_masterModel);
                                  $count=1;
                                  foreach ($data as $result) :
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["faq_que"]; ?></td>
                                    <td><?php echo $result["faq_ans"]; ?></td>
                                    <td><a href="#edit_faq" class="modal-trigger" onclick="editFaqMaster(<?php echo $result['faq_id'];?>);"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete FAQ?');" href="admin_index.php?page=faq_master.php&delete=<?php echo $result["faq_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                  </tr>

                                  <?php  endforeach; ?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <a href="#edit_faq" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div id="edit_faq" class="modal">
            <div class="modal-content">
              <h4>Enter FAQ</h4>
            <div class="row">
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">create</i>
                        <input type="text" name="question" id="question" class="icon_prefix">
                        <label for="question">Question</label>
                    </div>
                </div>
                <div class="col m12">
                    <div class="input-field">
                        <i class="material-icons prefix">description</i>
                        <textarea id="answer" class="materialize-textarea" name="answer"></textarea>
                        <label for="answer">Answer</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="update_faqmaster" id="hiddenValue">
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="faqEnter">Save
                     <i class="material-icons right">save</i>
                </button>
            </div>
            </div>
            </div>
    </section>

    <!--End of Faq table-->