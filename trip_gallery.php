<?php 
$trip_gallery_masterModel = new trip_Gallery_masterModel();
$obj = new trip_gallery_masterController();

if(isset($_POST['submit'])){

    if($_FILES['image-file[]']['error'] > 0){

        echo "<script>M.toast({html: 'Error While Uploading Images'});</script>";

    } else {
       
    for($result=0; $result < count($_FILES['image-file[]']['name']); $result++) {

            $filetmp = $_FILES['image-file[]']['tmp_name'][$result];
            $filename = $_FILES['image-file[]']['name'][$result];
            $filetype = $_FILES['image-file[]']['type'][$result];
            $path = 'img/trip_gallery/'.$filename;

            move_uploaded_file($filetmp, $path);
            $image_name = $image_name.",".$path;
            $trip_gallery_masterModel->destination_img = $image_name;

        }

        if($obj->InsertDestinationGallery($trip_gallery_masterModel)){
            echo "<script>M.toast({html: 'Destination Gallery Added'});</script>";
        } else {
            echo "<script>M.toast({html: 'Error While Adding Data'});</script>";
        }
    }
}

if(isset($_REQUEST['delete'])){

    $trip_gallery_masterModel->destination_id = $_REQUEST['delete'];
    $obj->DeleteDestinationGallery($trip_gallery_masterModel);
    echo "<script>window.location.assign(admin_index.php?page=trip_gallery.php);</script>";
}

?>



<!--Start of Trip-Gallery table-->
<section id="trip-gallery" class="right-content">
        <div class="admin-content-bg">
            <div class="row">
                <div class="col l12">
                    <div class="card ">
                        <div class="card-content">
                            <table class="responsive-table highlight">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Destination</th>
                                      <th>Images</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                  </tr>
                                </thead>
                        
                                <tbody>
                                <?php 
                                $count = 1;
                                $imageCount = 0;
                                $data = $obj->ShowDestinationGallery($trip_gallery_masterModel);
                                foreach($data as $result) :
                                    if($result['galary_image']){
                                        $imageCount++;
                                    }
                                ?>
                                  <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $result['dm_id'];?></td>
                                    <td>
                                    <a href="#logomodel" class="">
                                        <div class="multiple-img">
                                            <div class="layer"></div>
                                            <img src="img/Black Wings.jpg" class="tableimg-logo circle responsive-img" alt="Logo Image">
                                            <p><?php echo $imageCount;?></p>
                                        </div>
                                    </a>
                                    </td>
                                    <td><a href="#!"><i class="material-icons">edit</i></a></td>
                                    <td><a onclick="return confirm('Are your sure want to delete city?');" href="admin_index.php?page=trip_gallery.php&delete=<?php echo $result['dg_id'];?>"><i class="material-icons">delete</i></a></td>
                                  </tr>
                                  <?php endforeach;?>
                                </tbody>
                              </table>
                      </div>
                </div>
                <div class="fixed-action-btn">
                    <a href="#edit_trip_gallery" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Add">
                      <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        </div>



        <div id="edit_trip_gallery" class="modal">
            <div class="modal-content">
              <h4>Enter Destination</h4>
            <div class="row">
            <div class="input-field file-field col m12">  
            <div class="btn">
                <span>Images</span>
                 <input type="file" multiple="multiple" name="image-file[]">
            </div>
            <div class="file-path-wrapper">
                 <input class="file-path validate" type="text">
            </div>
             </div>

            </div>
                <div class="col m12">
                    <div class="input-field">
                    <i class="material-icons prefix">location_city</i>
                        <input type="text" name="destination" id="destination" class="icon_prefix">
                        <label for="destination">Destination</label>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="submit">Save
                     <i class="material-icons right">save</i>
                </button>
            </div>
            </div>
            </div>
    </section>

    <!--End of Trip-Gallery table-->