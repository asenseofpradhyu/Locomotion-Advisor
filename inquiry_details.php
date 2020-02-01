<?php 

$inquiry_detailsmasterModel = new inquiry_detailsmasterModel();
$obj = new inquiryDetails_masterController();


if(isset($_REQUEST['delete'])){

    $inquiry_detailsmasterModel->inq_id = $_REQUEST['delete'];
    $obj->DeleteinquiryDetails($inquiry_detailsmasterModel);
    
    echo "<script>window.location.location.href='admin_index.php?page=inquiry_details.php';</script>";
}

?>

<!--Start of User Details table-->
<section id="userDetails" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                            <table class="responsive-table highlight">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Message</th>
                                      <th>Date</th>
                                      <th>Send Mail</th>
                                      <th>Delete</th>                                      
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                  
                                  $data = $obj->ShowInquiryDetailsData($inquiry_detailsmasterModel);
                                  $count=1;
                                  foreach ($data as $result) {
                                
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result["name"]; ?></td>
                                    <td><?php echo $result["email"]; ?></td>
                                    <td><?php echo $result["message"]; ?></td>
                                    <td><?php echo $result["date"]; ?></td>
                                    <td><a href="mailto:<?php echo $result["email"];?>"><i class="material-icons">send</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete Inquiry?');" href="admin_index.php?page=inquiry_details.php&delete=<?php echo $result["inq_id"]; ?>"><i class="material-icons">delete</i></a></td>
                                  </tr>

                                  <?php

                                  }
                                  
                                  ?>
                                </tbody>
                              </table>
                      </div>
                </div>
            </div>
        </div>
        </div>
        
    </section>

    <!--End of User Details table-->