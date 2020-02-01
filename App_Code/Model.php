<?php 

class user_masterModel {
    public $user_id = 0;
    public $ur_id=0;
    public $name="";
    public $gender="";
    public $mobile="";
    public $email="";
    public $password="";
    public $verification_code="";
    public $status="";
    public $r_date="";
    public $dob=0;
    public $contact_no="";
    public $address="";
    public $photo="";
    public $state_id=0;
    public $city_id=0;
    public $business_title="";
    public $manager_name = "";
    public $o_contect_no=0;
    public $reg_no=0;
    public $tin_no=0;
    public $pro_email="";
}

class state_masterModel{
    public $state_id=0;
    public $state="";
    
}
class city_masterModel{
    public $city_id=0;
    public $state_id=0;
    public $city="";
    
}

class trip_Gallery_masterModel{
    public $destination_id=0;
    public $destinationMaster_id=0;
    public $destination_img="";
}

class trip_master_masterModel{
    public $destination_id=0;
    public $destination_name="";
    public $destination_description="";
    public $destination_logo="";
    public $destination_bannar_img="";
}

class role_masterModel{
    public $ur_id=0;
    public $user_role="";
}
class faq_masterModel{
    public $faq_id=0;
    public $faq_que="";
    public $faq_ans="";
}

class plan_masterModel{
    public $plan_id=0;
    public $plan_title="";
    public $plan_price=0;
    public $discount=0;
    public $discraption="";
    public $quarter_time="";
    public $duration=0;
    public $status="";

}

class commission_masterModel{
    public $com_id=0;
    public $commission=0;
}

class packagetype_masterModel{
    public $package_type_id=0;
    public $ur_id=0;
    public $package_type="";
}

class user_detailsmasterModel{
    public $user_id=0;
    public $ur_id=0;
    public $name="";
    public $gender="";
    public $mob_number=0;
    public $email="";
    public $status="";
}

class inquiry_detailsmasterModel{
    public $inq_id=0;
    public $name="";
    public $email="";
    public $message="";
    public $date=0;
}


// Tour Master Model
class tour_order_masterModel{
    public $order_id=0;
    public $user_id=0;
    public $order_for="";
    public $order_for_id=0;
    public $amount=0;
    public $payment_type="";
    public $payment_status ="";
    public $order_date="";
    public $order_status="";
}

class tour_package_masterModel{
    public $package_id=0;
    public $user_id=0;
    public $package_type_id="";
    public $package_title=0;
    public $package_price=0;
    public $package_description="";
    public $dimage ="";
    public $status="";
}

// Hotel Master Model
class order_masterModel{
    public $order_id=0;
    public $user_id=0;
    public $order_for="";
    public $order_for_id=0;
    public $amount=0;
    public $payment_type="";
    public $payment_status ="";
    public $order_date="";
    public $order_status="";
    public $invoice=0;

}

?>