<?php 
//include("db_connect.php");

session_start();

function Db_Connect(){

    $host = 'localhost';
    $user = 'pradhuman';
    $password = '12345';
    $dbname = 'locomotion_db';
    $charset = 'utf8mb4';

    
 try{

    // Set Data Source Name
    $dsn = 'mysql:host='.$host .';'.'dbname='.$dbname.';charset='.$charset;
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;

    } catch(PDOExpection $e){
         echo "Connection Failed :- ".$e->getMessage();
     }

}



if(isset($_REQUEST['method'])){
    $action = $_REQUEST['method'];

    switch ($action) {
        case 'editCityData':
              editCityData();
              break;

        case 'editStateData':
              editStateData();
              break;

        case 'editRoleMaster':
              editRoleMaster();
              break;

        case 'editPlanMaster':
              editPlanMaster();
              break;

        case 'editFaqMaster':
              editFaqMaster();
              break;

        case 'editPackageTypeMaster':
              editPackageTypeMaster();
              break;

        case 'editTripMaster':
              editTripMaster();
              break;

        case 'editTourPackageMaster':
              editTourPackageMaster();
              break;
              
        case 'editUserprofileMaster':
            editUserprofileMaster();
              break;    
              
        case 'editOperatorprofileMaster':
              editOperatorprofileMaster();
              break;  
    }
}


// *******************************


 function editCityData(){
    $id= $_REQUEST['editid'];
    $query = "Select * from city_master Where city_id Like :city_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['city_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function editStateData(){
    $id= $_REQUEST['editid'];
    $query = "Select * from state_master Where state_id Like :state_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['state_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function editRoleMaster(){
    $id= $_REQUEST['editid'];
    $query = "Select * from user_role_master Where ur_id Like :ur_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['ur_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function editPlanMaster(){
    $id= $_REQUEST['editid'];
    $query = "Select * from plan_master Where plan_id Like :plan_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['plan_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function editFaqMaster(){
    $id= $_REQUEST['editid'];
    $query = "Select * from faq_master Where faq_id Like :faq_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['faq_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function editPackageTypeMaster(){
    $id= $_REQUEST['editid'];
    $query = "Select * from package_type_master Where package_type_id Like :package_type_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['package_type_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function editTripMaster(){
    $id= $_REQUEST['editid'];
    $query = "Select * from destination_master Where dm_id Like :dm_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['dm_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

// Tour Admin 
function editTourPackageMaster(){
    $id= $_REQUEST['editid'];
    $query = "Select * from package_master Where package_id Like :package_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['package_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

// Customer Admin
function editUserprofileMaster(){
    $id= $_REQUEST['editid'];
    $query = "SELECT um.*, up.* FROM `user_master`as um Left Outer JOIN user_profile_master as up ON um.user_id = up.user_id WHERE um.user_id = :user_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['user_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function editOperatorprofileMaster(){
    $id= $_REQUEST['editid'];
    $query = "SELECT um.*, up.* FROM `user_master`as um Left Outer JOIN services_profile_master as up ON um.user_id = up.user_id WHERE um.user_id = :user_id";
    $stmt = Db_connect()->prepare($query);
    $stmt->execute(['user_id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
?>