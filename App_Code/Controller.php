<?php
include("db_connect.php");
include("Model.php");

class user_masterController extends DatabaseConnect{

    // Insertion Function (Registration Form)
    public function InsertRegistrationData(user_masterModel $user_master_Mod){

        // Checks Email is already Exist in Database
        $email_check = "SELECT email FROM user_master Where email=:email";
        $email_stmt = $this->Db_Connect()->prepare($email_check);
        $email_stmt->execute(['email'=>$user_master_Mod->email]);

        

        if($email_stmt->rowCount() > 0){
            echo "<script>alert('Email already exist.')</script>";
        } else {

            // Insert Data in Database

            $insert_query = "INSERT INTO user_master(name, password, email, mobile, gender) VALUES(:name, :password, :email, :mobile,:gender)";
            $stmt = $this->Db_connect()->prepare($insert_query);
            return  $stmt->execute(['name'=>$user_master_Mod->Name, 'password'=>$user_master_Mod->password, 'email'=>$user_master_Mod->email, 'mobile'=>$user_master_Mod->mobile, 'gender'=>$user_master_Mod->Gender]);
            
        }
        
        
    }

    // Login Function (Login Form)
    public function Userlogin(user_masterModel $user_master_Mod){
        
        $login_check_query = "SELECT * FROM user_master WHERE email = :email AND password = :password";
        $login_stmt = $this->Db_Connect()->prepare($login_check_query);
        // print_r($user_master_Mod);
        $login_stmt->execute(['email'=>$user_master_Mod->email, 'password'=>$user_master_Mod->password]);
        $count = $login_stmt->rowCount();
        if($count > 0){

            $userName = $login_stmt->fetch(PDO::FETCH_ASSOC);
            return $userName['user_id']."|1".$userName['ur_id'];
            
        }
        else
        {
            return "0|0";
        }

    }

    // Get UserName from DataBase & Store the Name 
    public function GetUserName(user_masterModel $user_master_Mod){
        $getName = "SELECT Name FROM user_master WHERE user_id = :id";
        $getName_stmt = $this->Db_Connect()->prepare($getName);
        //print_r($user_master_Mod);
        $getName_stmt->execute(['id'=>$user_master_Mod->user_id]);
        $userId = $getName_stmt->fetch(PDO::FETCH_ASSOC);
        return $userId['Name'];
    }



  
}





?>