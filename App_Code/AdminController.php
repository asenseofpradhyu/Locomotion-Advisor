<?php 
include("db_connect.php");
include("Model.php");
//  include("AdminEditController.php");


class state_masterController extends DatabaseConnect{
    
    public function InsertStateData(state_masterModel $state_masterModel){

        $con = $this->Db_Connect();

        $state_check_query = "SELECT state FROM state_master WHERE state = :state";
        $state_check_stmt = $con->prepare($state_check_query);
        $state_check_stmt->execute(['state'=>$state_masterModel->state]);

        if($state_check_stmt->rowCount() > 0){

            echo "<script>M.toast({html: 'State already added'});script>";

        } else {

            $state_insert_query = "INSERT INTO state_master(state) VALUES(:state)";
            $state_insert_stmt = $con->prepare($state_insert_query);
            return $state_insert_stmt->execute(['state'=>$state_masterModel->state]);

        }
    }

    public function ShowStateData(state_masterModel $state_masterModel){

        $con = $this->Db_Connect();

        if($state_masterModel->state_id > 0)
        {
            $show_state_query = "SELECT * FROM state_master Where state_id=:state_id"; 
            $show_state_stmt = $con->prepare($show_state_query);
            $show_state_stmt->execute(['state_id'=>$state_masterModel->state_id]);
        }
        else
        {
            $show_state_query = "SELECT * FROM state_master";
            $show_state_stmt = $con->prepare($show_state_query);
            $show_state_stmt->execute();
        }
       
        return $show_state_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateStateData(state_masterModel $state_masterModel){
        $con = $this->Db_Connect();
        $update_state_query = "UPDATE state_master SET state_id = :state_id, state = :state WHERE state_id = :state_id";
        $update_state_stmt = $con->prepare($update_state_query);
        return $update_state_stmt->execute(['state_id'=>$state_masterModel->state_id, 'state'=>$state_masterModel->state]);
    }

    public function DeleteState(state_masterModel $state_masterModel){
        $con = $this->Db_Connect();
        $state_delete_query = "DELETE from state_master WHERE state_id = :state_id";
        $state_delete_stmt = $con->prepare($state_delete_query);
        return $state_delete_stmt->execute(['state_id'=>$state_masterModel->state_id]);
    }
}

class city_masterController extends DatabaseConnect{

    public function InsertCityData(city_masterModel $city_masterModel){

        $con = $this->Db_Connect();
        $city_check_query = "SELECT city FROM city_master WHERE city = :city";
        $city_check_stmt = $con->prepare($city_check_query);
        $city_check_stmt->execute(['city'=>$city_masterModel->city]);

        if($city_check_stmt->rowCount() > 0){

            echo "<script>M.toast({html: 'City already added'});</script>";

        } else {

            $city_insert_query = "INSERT INTO city_master VALUES(NULL,:state_id,:city)";
            $city_insert_stmt = $con->prepare($city_insert_query);
            return $city_insert_stmt->execute(['state_id'=>$city_masterModel->state_id,'city'=>$city_masterModel->city]);

        }
    }
    

    public function ShowCityData(city_masterModel $city_masterModel){
        $con = $this->Db_Connect();
        if($city_masterModel->city_id > 0)
        {
            $show_city_query = "SELECT cm.*,sm.state FROM `city_master` as cm Inner Join state_master as sm ON cm.state_id = sm.state_id Where cm.city_id=:city_id"; 
            $show_city_stmt = $con->prepare($show_city_query);
            $show_city_stmt->execute(['city_id'=>$city_masterModel->city_id]);
        }
        else
        {
            $show_city_query = "SELECT cm.*,sm.state FROM `city_master` as cm Inner Join state_master as sm ON cm.state_id = sm.state_id ";
            $show_city_stmt = $con->prepare($show_city_query);
            $show_city_stmt->execute();
        }
       
        return $show_city_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateCityData(city_masterModel $city_masterModel){
        $con = $this->Db_Connect();
        $update_city_query = "UPDATE city_master SET state_id = :state_id, city = :city WHERE city_id = :city_id";
        $update_city_stmt = $con->prepare($update_city_query);
        return $update_city_stmt->execute(['city_id'=>$city_masterModel->city_id,'state_id'=>$city_masterModel->state_id, 'city'=>$city_masterModel->city]);
    }

    public function DeleteCity(city_masterModel $city_masterModel){
        $con = $this->Db_Connect();
        $city_delete_query = "DELETE from city_master WHERE city_id = :city_id";
        $city_delete_stmt = $con->prepare($city_delete_query);
        return $city_delete_stmt->execute(['city_id'=>$city_masterModel->city_id]);
    }
}

class trip_gallery_masterController extends DatabaseConnect{
    
    public function InsertDestinationGallery(trip_Gallery_masterModel $trip_gallerymastermodel){
        $con = $this->Db_Connect();
        $destination_query = "SELECT dm_id from destination_gallary_master WHERE dm_id = :destinationMasterID";
        $destination_stmt = $con->prepare($destination_query);
        $destination_stmt->execute(['destinationMasterID'=>$trip_gallerymastermodel->destinationMaster_id]);

        if($trip_gallerymastermodel->rowCount() > 0)
        {
            echo "<script>M.toast({html: 'City already added'});script>";

        } else {

            $destination_query = 'INSERT INTO destination_galary_master VALUES(NUll, NULL, :gallery_image)';
            $destination_stmt = $con->prepare($destination_query);
            return $destination_stmt->execute(['gallery_image'=>$trip_gallerymastermodel->destination_img]);

        }
    }

    public function ShowDestinationGallery(trip_Gallery_masterModel $trip_gallerymastermodel){
        $con = $this->Db_Connect();
    if($trip_gallerymastermodel->destination_id >0 ){

        $destination_query = "SELECT dg_id FROM destination_galary_master WHERE dg_id = :DestinationGalleryID";
        $destination_stmt = $con->prepare($destination_query);
        $destination_stmt->execute(['DestinationGalleryID'=>$trip_gallerymastermodel->destinationMaster_id]);

    } else {

        $destination_query = "SELECT * FROM destination_galary_master";
        $destination_stmt = $con->prepare($destination_query);
        $destination_stmt->execute();

        }

        return $destination_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteDestinationGallery(trip_Gallery_masterModel $trip_gallerymastermodel){
        $con = $this->Db_Connect();
        $destination_query = "DELETE FROM destination_galary_master WHERE dg_id = :destinationGalleryID";
        $destination_stmt = $con->prepare($destination_query);
        return $destination_stmt->execute(['destinationGalleryID'=>$trip_gallerymastermodel->destination_id]);

    }

}

class trip_master_masterController extends DatabaseConnect{

    public function InsertDestinationMaster(trip_master_masterModel $trip_master_masterModel){
        $con = $this->Db_Connect();
        $trip_master_query = "SELECT destination_name from destination_master WHERE destination_name = :destinationName";
        $trip_master_stmt = $con->prepare($trip_master_query);
        $trip_master_stmt->execute(['destinationName'=>$trip_master_masterModel->destination_name]);

        if($trip_master_stmt->rowCount() > 0){

            echo "<script>M.toast({html: 'Destination already added'});script>";

        } else {
        
        $trip_master_query = "INSERT INTO destination_master VALUES(NULL, :destination_name, :destination_description, :destination_logo, :destination_bannar)";
        $trip_master_stmt = $con->prepare($trip_master_query);

        return $trip_master_stmt->execute(['destination_name'=>$trip_master_masterModel->destination_name, 'destination_description'=>$trip_master_masterModel->destination_description, 'destination_logo'=>$trip_master_masterModel->destination_logo, 'destination_bannar'=>$trip_master_masterModel->destination_bannar_img]);

        }
    }

    public function ShowDestinationDetails(trip_master_masterModel $trip_master_masterModel){
        $con = $this->Db_Connect();
        if($trip_master_masterModel->destination_id > 0){

            $destination_detail = "SELECT * from destination_master WHERE dm_id = :destinationMasterID";
            $destination_stmt = $con->prepare($destination_detail);
            $destination_stmt->execute(['destinationMasterID'=>$trip_master_masterModel->destination_id]);

        } else {
            $destination_detail = "SELECT * from destination_master";
            $destination_stmt = $con->prepare($destination_detail);
            $destination_stmt->execute();
        }

        return $destination_stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function UpdateDestinationDetails(trip_master_masterModel $trip_master_masterModel){
        $con = $this->Db_Connect();
        $update_trip_query = "UPDATE destination_master SET destination_name = :destination_name, destination_logo = :destination_logo, destination_bannar = :destination_bannar WHERE dm_id = :dm_id";
        $update_trip_stmt = $con->prepare($update_trip_query);
        return $update_trip_stmt->execute(['dm_id'=>$trip_master_masterModel->dm_id,'destination_name'=>$trip_master_masterModel->destination_name, 'destination_description'=>$trip_master_masterModel->destination_description, 'destination_logo'=>$trip_master_masterModel->destination_logo, 'destination_bannar'=>$trip_master_masterModel->destination_bannar_img]);
    }

    public function DeleteDestination(trip_master_masterModel $trip_master_masterModel){
        $con = $this->Db_Connect();
        $destination_delete_query = "DELETE FROM destination_master WHERE dm_id = :deleteid";
        $destination_delete_stmt = $con->prepare($destination_delete_query);
        return $destination_delete_stmt->execute(['deleteid'=>$trip_master_masterModel->dm_id]);
    }

}

class role_masterController extends DatabaseConnect{

    public function InsertUserRole(role_masterModel $role_masterModel){
        $con = $this->Db_Connect();
        $role_check_query = "SELECT user_role FROM user_role_master WHERE user_role = :user_role";
        $role_check_stmt = $con->prepare($role_check_query);
        $role_check_stmt->execute(['user_role'=>$role_masterModel->user_role]);

        if($role_check_stmt->rowCount() > 0){
            echo "<script>M.toast({html: 'User Role already added'});script>";
        } else {

            $role_insert_query = "INSERT INTO user_role_master VALUES(NULL, :user_role)";
            $role_insert_stmt = $con->prepare($role_insert_query);
            return $role_insert_stmt->execute(['user_role'=>$role_masterModel->user_role]);

        }

    }

    public function ShowUserRoleData(role_masterModel $role_masterModel){
        $con = $this->Db_Connect();
        if($role_masterModel->ur_id > 0)
        {
           $show_role_query = "SELECT * FROM user_role_master WHERE ur_id = :ur_id";
           $show_role_stmt = $con->prepare($show_role_query);
           $show_role_stmt->execute(['ur_id'=>$role_masterModel->ur_id]);
        }
        else
        {
            $show_role_query = "SELECT * FROM user_role_master";
            $show_role_stmt = $con->prepare($show_role_query);
            $show_role_stmt->execute();
        }
       
        return $show_role_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateUserRoleData(role_masterModel $role_masterModel){
        $con = $this->Db_Connect();
        $update_user_role_query = "UPDATE user_role_master SET user_role = :user_role WHERE ur_id = :ur_id";
        $update_user_role_stmt = $con->prepare($update_user_role_query);
        return $update_user_role_stmt->execute(['ur_id'=>$role_masterModel->ur_id, 'user_role'=>$role_masterModel->user_role]);
    }

    public function DeleteUserRole(role_masterModel $role_masterModel){
        $con = $this->Db_Connect();
        $role_delete_query = "DELETE FROM user_role_master WHERE ur_id = :ur_id";
        $role_delete_stmt = $con->prepare($role_delete_query);
        return $role_delete_stmt->execute(['ur_id'=>$role_masterModel->ur_id]);

    }

}

class faq_masterController extends DatabaseConnect{

    public function InsertFaqData(faq_masterModel $faq_masterModel){

        $faq_check_query = "SELECT faq_que FROM faq_master WHERE faq_que = :faq_que";
        $faq_check_stmt = $this->Db_Connect()->prepare($faq_check_query);
        $faq_check_stmt->execute(['faq_que'=>$faq_masterModel->faq_que]);

        if($faq_check_stmt->rowCount() > 0 ){
            echo "<script>M.toast({html: 'Question Already added'});script>";
        } else {

            $faq_insert_query = "INSERT INTO faq_master VALUES(NULL, :faq_que, :faq_ans)";
            $faq_insert_stmt = $this->Db_Connect()->prepare($faq_insert_query);
            return $faq_insert_stmt->execute(['faq_que'=>$faq_masterModel->faq_que, 'faq_ans'=>$faq_masterModel->faq_ans]);

        }

    }

    public function ShowFaqData(faq_masterModel $faq_masterModel){
        $con = $this->Db_Connect();
        if($faq_masterModel->faq_id > 0)
        {
        $show_faq_query = "SELECT * FROM faq_master WHERE faq_id = :faq_id";
        $show_faq_stmt = $con->prepare($show_faq_query);
        $show_faq_stmt->execute(['ur_id'=>$faq_masterModel->faq_id]);
        }
        else
        {
            $show_faq_query = "SELECT * FROM faq_master";
            $show_faq_stmt = $con->prepare($show_faq_query);
            $show_faq_stmt->execute();
        }
    
        return $show_faq_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateFaqData(faq_masterModel $faq_masterModel){
        $con = $this->Db_Connect();
        $update_faq_query = "UPDATE faq_master SET faq_que = :faq_que, faq_ans = :faq_ans WHERE faq_id = :faq_id";
        $update_faq_stmt = $con->prepare($update_faq_query);
        $val = $update_faq_stmt->execute(['faq_id'=>$faq_masterModel->faq_id, 'faq_que'=>$faq_masterModel->faq_que, 'faq_ans'=>$faq_masterModel->faq_ans]);
       
        return $val;

    }

    public function DeleteFaq(faq_masterModel $faq_masterModel){
        $con = $this->Db_Connect();
        $faq_delete_query = "DELETE FROM faq_master WHERE faq_id = :faq_id";
        $faq_delete_stmt = $con->prepare($faq_delete_query);
        return $faq_delete_stmt->execute(['faq_id'=>$faq_masterModel->faq_id]);

    }

}

class plan_masterController extends DatabaseConnect{

    public function InsertPlanData(plan_masterModel $plan_masterModel){
        $con = $this->Db_Connect();
        $plan_check_query = "SELECT plan_title FROM plan_master WHERE plan_title = :plan_title";
        $plan_check_stmt = $con->prepare($plan_check_query);
        $plan_check_stmt->execute(['plan_title'=>$plan_masterModel->plan_title]);
    
        if($plan_check_stmt->rowCount() > 0 ){
            echo "<script>M.toast({html: 'Plan Already added'});script>";
        } else {
    
            $plan_insert_query = "INSERT INTO plan_master VALUES(NULL, :plan_title, :plan_price, :discount, :discraption, :quarter_time, :duration, :plan_status)";
            $plan_insert_stmt = $con->prepare($plan_insert_query);
            return $plan_insert_stmt->execute(['plan_title'=>$plan_masterModel->plan_title, 'plan_price'=>$plan_masterModel->plan_price, 'discount'=>$plan_masterModel->discount, 'discraption'=>$plan_masterModel->discraption, 'quarter_time'=>$plan_masterModel->quarter_time, 'duration'=>$plan_masterModel->duration, 'plan_status'=>$plan_masterModel->status]);
    
        }
    
    }
    
    public function ShowPlanData(plan_masterModel $plan_masterModel){
        $con = $this->Db_Connect();
        if($plan_masterModel->plan_id > 0)
        {
           $show_plan_query = "SELECT * FROM plan_master WHERE plan_id = :plan_id";
           $show_plan_stmt = $con->prepare($show_plan_query);
           $show_plan_stmt->execute(['plan_id'=>$plan_masterModel->plan_id]);
        }
        else
        {
            $show_plan_query = "SELECT * FROM plan_master";
            $show_plan_stmt = $con->prepare($show_plan_query);
            $show_plan_stmt->execute();
        }
       
        return $show_plan_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdatePlanMasterData(plan_masterModel $plan_masterModel){
        $con = $this->Db_Connect();
        $update_plan_query = "UPDATE plan_master SET plan_title = :plan_title, plan_price = :plan_price, discount = :discount, discraption = :discraption, quarter_time = :quarter_time, duration = :duration, `status` = :_status WHERE plan_id = :plan_id";
        
        $update_plan_stmt = $con->prepare($update_plan_query);
        $val = $update_plan_stmt->execute([
        'plan_title'=>$plan_masterModel->plan_title,
        'plan_price,'=>$plan_masterModel->plan_price,
        'discount'=>$plan_masterModel->discount,
        'discraption'=>$plan_masterModel->discraption,
        'quarter_time'=>$plan_masterModel->quarter_time,
        'duration'=>$plan_masterModel->duration,
        '_status'=>$plan_masterModel->status,
        'plan_id'=>$plan_masterModel->plan_id
        ]);
        return $val;
        
    }
    
    public function DeletePlan(plan_masterModel $plan_masterModel){
        $con = $this->Db_Connect();
        $plan_delete_query = "DELETE FROM plan_master WHERE plan_id = :plan_id";
        $plan_delete_stmt = $con->prepare($plan_delete_query);
        return $plan_delete_stmt->execute(['plan_id'=>$plan_masterModel->plan_id]);
    
    }
    
}

class commission_masterController extends DatabaseConnect{
        public function InsertCommissionData(commission_masterModel $commission_masterModel){
            $con = $this->Db_Connect();
            $commission_insert_query = "UPDATE commition_master SET commition = :commission WHERE com_id = 1";
            $commission_insert_stmt = $con->prepare($commission_insert_query);
            return $commission_insert_stmt->execute(['commission'=>$commission_masterModel->commission]);
    
        }
}

class packagetype_masterController extends DatabaseConnect{

    public function InsertPackageData(packagetype_masterModel $packagetype_masterModel){
        $con = $this->Db_Connect();
        $package_check_query = "SELECT package_type FROM package_type_master WHERE package_type_id = :package_type_id";
        $package_check_stmt = $con->prepare($package_check_query);
        $package_check_stmt->execute(['package_type_id'=>$packagetype_masterModel->package_type_id]);
    
        if($package_check_stmt->rowCount() > 0 ){
            echo "<script>M.toast({html: 'Package Already added'});script>";
        } else {
    
            $package_insert_query = "INSERT INTO package_type_master VALUES(NULL, :ur_id, :package_type)";
            $package_insert_stmt = $con->prepare($package_insert_query);
            return $package_insert_stmt->execute(['ur_id'=>$packagetype_masterModel->ur_id, 'package_type'=>$packagetype_masterModel->package_type]);
    
        }
    
    }
    
    public function ShowPackageData(packagetype_masterModel $packagetype_masterModel){
        $con = $this->Db_Connect();
        if($packagetype_masterModel->package_type_id > 0)
        {
           $show_package_query = "SELECT pt.*, ur.user_role FROM package_type_master as pt Inner Join user_role_master as ur ON pt.ur_id = ur.ur_id WHERE pt.package_type_id = :package_type_id";
           $show_package_stmt = $con->prepare($show_package_query);
           $show_package_stmt->execute(['package_type_id'=>$packagetype_masterModel->package_type_id]);
        }
        else
        {
            $show_package_query = "SELECT pt.*, ur.user_role FROM package_type_master as pt Inner Join user_role_master as ur ON pt.ur_id = ur.ur_id ";
            $show_package_stmt = $con->prepare($show_package_query);
            $show_package_stmt->execute();
        }
       
        return $show_package_stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function UpdatePackageData(packagetype_masterModel $packagetype_masterModel){
        $con = $this->Db_Connect();
        $update_package_query = "UPDATE package_type_master SET ur_id = :ur_id, package_type = :package_type WHERE package_type_id = :package_type_id";
        $update_package_stmt = $con->prepare($update_package_query);
        return $update_package_stmt->execute(['package_type_id'=>$packagetype_masterModel->package_type_id,'ur_id'=>$packagetype_masterModel->ur_id, 'package_type'=>$packagetype_masterModel->package_type]);
    }

    public function DeletePackage(packagetype_masterModel $packagetype_masterModel){
        $con = $this->Db_Connect();
        $package_delete_query = "DELETE FROM package_type_master WHERE package_type_id = :package_type_id";
        $package_delete_stmt = $con->prepare($package_delete_query);
        return $package_delete_stmt->execute(['package_type_id'=>$packagetype_masterModel->package_type_id]);
    
    }
    
}

class userDetails_masterController extends DatabaseConnect{

    public function InsertUserDetailsData(user_detailsmasterModel $user_detailsmasterModel){
        $con = $this->Db_Connect();
        $package_check_query = "SELECT package_type FROM package_type_master WHERE package_type_id = :package_type_id";
        $package_check_stmt = $con->prepare($package_check_query);
        $package_check_stmt->execute(['package_type_id'=>$packagetype_masterModel->package_type_id]);
    
        if($package_check_stmt->rowCount() > 0 ){
            echo "<script>M.toast({html: 'Package Already added'});script>";
        } else {
    
            $package_insert_query = "INSERT INTO package_type_master VALUES(NULL, :ur_id, :package_type)";
            $package_insert_stmt = $con->prepare($package_insert_query);
            return $package_insert_stmt->execute(['ur_id'=>$user_detailsmasterModel->ur_id, 'package_type'=>$user_detailsmasterModel->package_type]);
    
        }
    
    }
    
    public function ShowUserDetailsData(user_detailsmasterModel $user_detailsmasterModel){
        $con = $this->Db_Connect();
        if($user_detailsmasterModel->user_id > 0)
        {
           $show_userDetails_query = "SELECT um.*, ur.user_role FROM user_master as um Inner Join user_role_master as ur ON um.ur_id = ur.ur_id WHERE um.user_id = :user_id";
           $show_userDetails_stmt = $con->prepare($show_userDetails_query);
           $show_userDetails_stmt->execute(['user_id'=>$user_detailsmasterModel->user_id]);
        }
        else
        {
            $show_userDetails_query = "SELECT um.*, ur.user_role FROM user_master as um Inner Join user_role_master as ur ON um.ur_id = ur.ur_id";
            $show_userDetails_stmt = $con->prepare($show_userDetails_query);
            $show_userDetails_stmt->execute();
        }
       
        return $show_userDetails_stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function DeleteUserDetails(user_detailsmasterModel $user_detailsmasterModel){
        $con = $this->Db_Connect();
        $userDetails_delete_query = "DELETE FROM user_master WHERE user_id = :user_id";
        $userDetails_delete_stmt = $con->prepare($userDetails_delete_query);
        return $userDetails_delete_stmt->execute(['user_id'=>$user_detailsmasterModel->user_id]);
    
    }
    
}

class inquiryDetails_masterController extends DatabaseConnect{

    public function InsertInquiryData(inquiry_detailsmasterModel $inquiry_detailsmasterModel){
        $con = $this->Db_Connect();
        $inquiry_insert_query = "INSERT INTO inquiry_master VALUES(NULL, :name, :email, :message, NOW())";
        $inquiry_insert_stmt = $con->prepare($inquiry_insert_query);
        return $inquiry_insert_stmt->execute(['name'=>$inquiry_detailsmasterModel->name, 'email'=>$inquiry_detailsmasterModel->email, 'message'=>$inquiry_detailsmasterModel->message]);
    
    }
    
    public function ShowInquiryDetailsData(inquiry_detailsmasterModel $inquiry_detailsmasterModel){
        $con = $this->Db_Connect();
        if($inquiry_detailsmasterModel->inq_id > 0)
        {
           $show_inquiryDetails_query = "SELECT * FROM inquiry_master WHERE inq_id = :inq_id";
           $show_inquiryDetails_stmt = $con->prepare($show_inquiryDetails_query);
           $show_inquiryDetails_stmt->execute(['inq_id'=>$inquiry_detailsmasterModel->inq_id]);
        }
        else
        {
            $show_inquiryDetails_query = "SELECT * from inquiry_master";
            $show_inquiryDetails_stmt = $con->prepare($show_inquiryDetails_query);
            $show_inquiryDetails_stmt->execute();
        }
       
        return $show_inquiryDetails_stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function DeleteinquiryDetails(inquiry_detailsmasterModel $inquiry_detailsmasterModel){
        $con = $this->Db_Connect();
        $inquiryDetails_delete_query = "DELETE FROM inquiry_master WHERE inq_id = :inq_id";
        $inquiryDetails_delete_stmt = $con->prepare($inquiryDetails_delete_query);
        return $inquiryDetails_delete_stmt->execute(['inq_id'=>$inquiry_detailsmasterModel->inq_id]);
    
    }
    
}


// Tour Admin Controller
class tour_order_masterController extends DatabaseConnect{

    public function ShowTourOrderMenu(tour_order_masterModel $tour_ordermenu_masterMod){
        $con = $this->Db_Connect();
        if($tour_ordermenu_masterMod->order_id > 0)
        {
           $show_tourorder_query = "SELECT * FROM order_master WHERE order_id = :order_id";
           $show_tourorder_stmt = $con->prepare($show_tourorder_query);
           $show_tourorder_stmt->execute(['order_id'=>$tour_ordermenu_masterMod->order_id]);
        }
        else
        {
            $show_tourorder_query = "SELECT * from order_master";
            $show_tourorder_stmt = $con->prepare($show_tourorder_query);
            $show_tourorder_stmt->execute();
        }
       
        return $show_tourorder_stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class tour_package_masterController extends DatabaseConnect{

    public function InsertTourPackageData(tour_package_masterModel $tour_package_masterModel){
        $con = $this->Db_Connect();
        $city_check_query = "SELECT package_title FROM package_master WHERE package_id = :package_id";
        $city_check_stmt = $con->prepare($city_check_query);
        $city_check_stmt->execute(['package_id'=>$tour_package_masterModel->package_id]);

        if($city_check_stmt->rowCount() > 0){

            echo "<script>M.toast({html: 'Package already added'});</script>";

        } else {

            $tour_package_masterModel->user_id = $_SESSION['user'];
            $city_insert_query = "INSERT INTO package_master VALUES(NULL, :user_id, :package_type_id, :package_title,:package_price, :package_description, :dimage, :status)";
            $city_insert_stmt = $con->prepare($city_insert_query);
            return $city_insert_stmt->execute([
                'user_id'=>$tour_package_masterModel->user_id,
                'package_type_id'=>$tour_package_masterModel->package_type_id,
                'package_title'=>$tour_package_masterModel->package_title,
                'package_price'=>$tour_package_masterModel->package_price, 
                'package_description'=>$tour_package_masterModel->package_description,
                'dimage'=>$tour_package_masterModel->dimage,
                'status'=>$tour_package_masterModel->status]);

        }
    }
    
    public function ShowTourPackageData(tour_package_masterModel $tour_package_masterModel){
        $con = $this->Db_Connect();
        if($tour_package_masterModel->user_id > 0)
        {
            $show_package_query = "SELECT * FROM package_master Where user_id=:user_id"; 
            $show_package_stmt = $con->prepare($show_package_query);
            $show_package_stmt->execute(['user_id'=>$tour_package_masterModel->user_id]);
        }
        else
        {
            $show_package_query = "SELECT * FROM package_master";
            $show_package_stmt = $con->prepare($show_package_query);
            $show_package_stmt->execute();
        }
       
        return $show_package_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ShowTourPackageDescription(tour_package_masterModel $tour_package_masterModel){

        $con = $this->Db_Connect();
        $show_package_query = "SELECT * FROM package_master Where package_id = :package_id"; 
        $show_package_stmt = $con->prepare($show_package_query);
        $show_package_stmt->execute(['package_id'=>$tour_package_masterModel->package_id]);
        return $show_package_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateTourPackageData(tour_package_masterModel $tour_package_masterModel){
        $con = $this->Db_Connect();
        $update_city_query = "UPDATE package_master SET package_title = :package_title, package_price = :package_price, package_description = :package_description, dimage = :dimage, `status` = :_status WHERE package_id = :package_id";
        $update_city_stmt = $con->prepare($update_city_query);
        return $update_city_stmt->execute(['package_title'=>$tour_package_masterModel->package_title,'package_price'=>$tour_package_masterModel->package_price, 
        'package_description'=>$tour_package_masterModel->package_description,
        'dimage'=>$tour_package_masterModel->dimage,
        '_status'=>$tour_package_masterModel->status,
        'package_id'=>$tour_package_masterModel->package_id]);
    }

    public function AdminUpdatePackageData(tour_package_masterModel $tour_package_masterModel){
        $con = $this->Db_Connect();
        $update_city_query = "UPDATE package_master SET `status` = :_status WHERE package_id = :package_id";
        $update_city_stmt = $con->prepare($update_city_query);
        $update_city_stmt->execute([
        'package_id'=>$tour_package_masterModel->package_id, 
        '_status'=>$tour_package_masterModel->status]);
    }

    public function DeleteTourPackage(tour_package_masterModel $tour_package_masterModel){
        $con = $this->Db_Connect();
        $city_delete_query = "DELETE from package_master WHERE package_id = :package_id";
        $city_delete_stmt = $con->prepare($city_delete_query);
        return $city_delete_stmt->execute(['package_id'=>$tour_package_masterModel->package_id]);
    } 
    
}

class package_type_masterController extends DatabaseConnect{

    public function ShowPackagetypedata(packagetype_masterModel $packagetype_masterModel){

        $con = $this->Db_Connect();
        $show_package_query = "SELECT * FROM package_type_master"; 
        $show_package_stmt = $con->prepare($show_package_query);
        $show_package_stmt->execute();
        return $show_package_stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



class user_masterController extends DatabaseConnect{

    
    public function InsertRegistrationData(user_masterModel $user_master_Mod){
        $con = $this->Db_Connect();
        $email_check = "SELECT email FROM user_master Where email=:email";
        $email_stmt = $con->prepare($email_check);
        $email_stmt->execute(['email'=>$user_master_Mod->email]);
    
        
    
        if($email_stmt->rowCount() > 0){
            echo "<script>alert('Email already exist.')</script>";
        } else {
    
            
            $insert_query = "INSERT INTO user_master(ur_id, name, password, email, mobile, gender) VALUES(:ur_id, :name, :password, :email, :mobile,:gender);";
            $stmt = $con->prepare($insert_query);
            $stmt->execute(['ur_id'=>$user_master_Mod->ur_id,'name'=>$user_master_Mod->name, 'password'=>$user_master_Mod->password, 'email'=>$user_master_Mod->email, 'mobile'=>$user_master_Mod->mobile, 'gender'=>$user_master_Mod->gender]);
            $result = $con->lastInsertId();

            
            $insert_profile_query = "INSERT INTO user_profile_master(user_id) VALUES(:user_id)";
            $stmt_profile = $con->prepare($insert_profile_query);
            $val = $stmt_profile->execute(['user_id'=>$result]);
            
            $con = null;
            $stmt=null;
            $stmt_profile = null;
            return $val; 
        }
        
        
    }

   
    public function InsertOperatorRegistrationData(user_masterModel $user_master_Mod){
        $con = $this->Db_Connect();
        // Checks Email is already Exist in Database
        $email_check = "SELECT email FROM user_master Where email=:email";
        $email_stmt = $con->prepare($email_check);
        $email_stmt->execute(['email'=>$user_master_Mod->email]);
    
        
    
        if($email_stmt->rowCount() > 0){
            echo "<script>alert('Email already exist.')</script>";
        } else {
    
            // Insert Data in Database
            $insert_query = "INSERT INTO user_master(ur_id, name, password, email, mobile, gender) VALUES(:ur_id, :name, :password, :email, :mobile,:gender);";
            $stmt = $con->prepare($insert_query);
            $stmt->execute(['ur_id'=>$user_master_Mod->ur_id,'name'=>$user_master_Mod->name, 'password'=>$user_master_Mod->password, 'email'=>$user_master_Mod->email, 'mobile'=>$user_master_Mod->mobile, 'gender'=>$user_master_Mod->gender]);
            $result = $con->lastInsertId();

            
            $insert_profile_query = "INSERT INTO services_profile_master(user_id) VALUES(:user_id)";
            $stmt_profile = $con->prepare($insert_profile_query);
            $val = $stmt_profile->execute(['user_id'=>$result]);
            
            $con = null;
            $stmt=null;
            $stmt_profile = null;
            return $val; 
        }
        
        
    }
    
   
    public function Userlogin(user_masterModel $user_master_Mod){
        $con = $this->Db_Connect();
        $login_check_query = "SELECT * FROM user_master WHERE email = :email AND password = :password";
        $login_stmt = $con->prepare($login_check_query);
        $login_stmt->execute(['email'=>$user_master_Mod->email, 'password'=>$user_master_Mod->password]);
        $count = $login_stmt->rowCount();
        if($count > 0){
    
            $userName = $login_stmt->fetch(PDO::FETCH_ASSOC);
            return $userName['user_id']."|1|".$userName['ur_id'];
            
        }
        else
        {
            return "0|0";
        }
    
    }
    
    
    public function GetUserName(user_masterModel $user_master_Mod){
        $con = $this->Db_Connect();
        $user_master_Mod->user_id = $_SESSION['user'];
        $getName = "SELECT Name FROM user_master WHERE user_id = :id";
        $getName_stmt = $con->prepare($getName);
        //print_r($user_master_Mod);
        $getName_stmt->execute(['id'=>$user_master_Mod->user_id]);
        $userId = $getName_stmt->fetch(PDO::FETCH_ASSOC);
        return $userId['Name'];
    }

    public function UpdateUserProfile(user_masterModel $user_master_Mod){
        $con = $this->Db_Connect();
        $user_master_Mod->ur_id = 0;
        $user_master_Mod->user_id = $_SESSION['user'];
        $update_user_master_query = "UPDATE user_master SET Name = :name, Gender = :gender, mobile = :mobile WHERE user_id = :user_id";
        $update_user_stmt = $con->prepare($update_user_master_query);
        $update_user_stmt->execute(['user_id'=>$user_master_Mod->user_id,'name'=>$user_master_Mod->name, 'gender'=>$user_master_Mod->gender, 'mobile'=>$user_master_Mod->mobile]);

        $update_user_profile_query = "UPDATE user_profile_master SET dob = :dob, contact_no = :contact_no, address = :address, photo = :photo, state_id = :state_id, city_id = :city_id WHERE user_id = :user_id";
        $update_profile_stmt = $con->prepare($update_user_profile_query);
        return $update_profile_stmt->execute(['user_id'=>$user_master_Mod->user_id,'dob'=>$user_master_Mod->dob, 'contact_no'=>$user_master_Mod->contact_no, 'address'=>$user_master_Mod->address, 'photo'=>$user_master_Mod->photo, 'state_id'=>$user_master_Mod->state_id, 'city_id'=>$user_master_Mod->city_id]);
    }

    public function UpdateOperatorProfile(user_masterModel $user_master_Mod){
        $con = $this->Db_Connect();
        $user_master_Mod->user_id = $_SESSION['user'];
        $update_user_master_query = "UPDATE user_master SET Name = :name, email = :email, mobile = :mobile WHERE user_id = :user_id";
        $update_user_stmt = $con->prepare($update_user_master_query);
        $update_user_stmt->execute(['user_id'=>$user_master_Mod->user_id,'name'=>$user_master_Mod->name, 'email'=>$user_master_Mod->email, 'mobile'=>$user_master_Mod->mobile]);

        $update_user_profile_query = "UPDATE services_profile_master SET business_title = :business_title, manager_name = :manager_name, o_contect_no = :o_contect_no, reg_no =:reg_no, tin_no = :tin_no,  state_id = :state_id, city_id = :city_id, address = :address, pro_email = :pro_email, logo = :logo WHERE user_id = :user_id";
        $update_profile_stmt = $con->prepare($update_user_profile_query);
        return $update_profile_stmt->execute([
        'user_id'=>$user_master_Mod->user_id,
        'business_title'=>$user_master_Mod->business_title, 
        'manager_name'=>$user_master_Mod->manager_name, 
        'o_contect_no'=>$user_master_Mod->o_contect_no,
        'reg_no'=>$user_master_Mod->reg_no, 
        'tin_no'=>$user_master_Mod->tin_no,
        'state_id'=>$user_master_Mod->state_id,
        'city_id'=>$user_master_Mod->city_id,
        'address'=>$user_master_Mod->address,
        'pro_email'=>$user_master_Mod->pro_email,
        'logo'=>$user_master_Mod->photo
        ]);
    }

    public function UpdatePassword(user_masterModel $user_master_Mod){

        $con = $this->Db_Connect();
        $user_master_Mod->user_id = $_SESSION['user']; 
        $update_password_query = "SELECT password FROM user_master WHERE password = :password and user_id = :user_id";
        $update_password_stmt = $con->prepare($update_password_query);
        $update_password_stmt->execute(['password'=>$user_master_Mod->password, 'user_id'=>$user_master_Mod->user_id]);
        $data = $update_password_stmt->rowCount();
        if($data> 0){

        $con = $this->Db_Connect();
        $update_password_query = "UPDATE user_master SET password = :password WHERE user_id = :user_id";
        $update_password_stmt = $con->prepare($update_password_query);
        return $update_password_stmt->execute(['user_id'=>$user_master_Mod->user_id,'password'=>$user_master_Mod->name]);

        }
    }

    public function UserEmail(user_masterModel $user_master_Mod){
        
                $con = $this->Db_Connect();
                $show_user_query = "SELECT pro_email FROM services_profile_master WHERE user_id =:user_id";
                 $show_user_stmt = $con->prepare($show_user_query);
                 $show_user_stmt->execute(['user_id'=>$user_master_Mod->user_id]);
                return  $show_user_stmt->fetchColumn();
    }
    
}
    
class order_masterController extends DatabaseConnect{
   
    public function InsertOrder(order_masterModel $order_masterMod){
        $con = $this->Db_Connect();
        $order_insert_query = "INSERT INTO order_master VALUES(NULL, :user_id, :order_for, :order_for_id, :amount, payment_type, :paymanet_status, :odate, :order_status, :invoice)";
        $order_insert_stmt = $con->prepare($order_insert_query);
        return $order_insert_stmt->execute([
            'user_id'=>$order_masterMod->user_id, 
            'order_for'=>$order_masterMod->order_for, 
            'order_for_id'=>$order_masterMod->order_for_id, 
            'amount'=>$order_masterMod->amount, 
            'payment_type'=>$order_masterMod->payment_type, 
            'payment_status'=>$order_masterMod->payment_status,
            'odate'=> date('d/M/y'),  
            'order_status'=>$order_masterMod->order_status, 
            'invoice' =>$order_masterMod->invoice]);
        
        }

        public function ShowOrderData(order_masterModel $order_masterMod){
            $con = $this->Db_Connect();
            if($order_masterMod->order_id > 0){
                $show_order_query = "SELECT om.*, um.email FROM order_master as om LEFT OUTER JOIN user_master as um on om.user_id = um.user_id WHERE om.order_id = :order_id";
                $show_order_stmt = $con->prepare($show_order_query);
                $show_order_stmt->execute(['order_id'=>$order_masterMod->order_id]);
             } else {
                 $show_order_query = "SELECT om.*, um.email FROM order_master as om LEFT OUTER JOIN user_master as um on om.user_id = um.user_id";
                 $show_order_stmt = $con->prepare($show_order_query);
                 $show_order_stmt->execute();
             }
             return $show_order_stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function ShowCustomerOrder(order_masterModel $order_masterMod){
            $con = $this->Db_Connect();
            if($order_masterMod->user_id > 0){
                $show_order_query = "SELECT om.*, um.* FROM order_master as om INNER JOIN user_master as um ON om.user_id = um.user_id WHERE om.user_id = :user_id";
                $show_order_stmt = $con->prepare($show_order_query);
                $show_order_stmt->execute(['user_id'=>$order_masterMod->user_id]);
            }

            return $show_order_stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function  ShowPlanNameData(order_masterModel $order_masterMod){
            $con = $this->Db_Connect();
            
                $show_order_query = "SELECT plan_title FROM plan_master WHERE plan_id =:plan_id";
                 $show_order_stmt = $con->prepare($show_order_query);
                 $show_order_stmt->execute(['plan_id'=>$order_masterMod->order_for_id]);
                return  $show_order_stmt->fetchColumn();

            
        }

        public function  ShowOperatorNameData(order_masterModel $order_masterMod){
            $con = $this->Db_Connect();
            
                $show_order_query = "SELECT business_title FROM services_profile_master WHERE user_id =:user_id";
                 $show_order_stmt = $con->prepare($show_order_query);
                 $show_order_stmt->execute(['user_id'=>$order_masterMod->order_for_id]);
                 return  $show_order_stmt->fetchColumn();
                 
            
        }

        public function DeleteOrder(order_masterModel $order_masterModel){
            $con = $this->Db_Connect();
            $order_delete_query = "DELETE from order_master WHERE order_id = :order_id";
            $order_delete_stmt = $con->prepare($order_delete_query);
            return $order_delete_stmt->execute(['order_id'=>$order_masterModel->order_id]);
        }
    
}
    

?>


