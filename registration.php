<?php 



if(isset($_POST['btnRegister'])){

  $user_master_Mod = new user_masterModel();
  $user_master_Mod->Name = $_POST['name']." ".$_POST['lname'];
  $user_master_Mod->password = $_POST['pass'];
  $user_master_Mod->email = $_POST['email'];
  $user_master_Mod->mobile = $_POST['number'];
  $user_master_Mod->Gender = $_POST['rdo'];
  
  $obj = new user_masterController();
  if($obj->InsertRegistrationData($user_master_Mod))
  {
      echo "<script>alert('Successfully Store Your Data.')</script>";
  }
  else{
    echo "<script>alert('Unsuccessfully Store Your Data.')</script>";
  }
  
}






?>

<!--Start of Form Control-->

  <section id="form-fill">
    <div class="container">
            <div class="heading-text">
                <h3>Resgistration</h3>
              </div>
          
            <div class="row">
              <div class="reg-form">
                <div class="col m6">
                  <div class="input-field">
                    <input type="text" name="name" id="name">
                    <label for="name">Your Name</label>
                  </div>
                </div>
                <div class="col m6">
                  <div class="input-field">
                    <input type="text" name="lname" id="lname">
                    <label for="lname">LastName</label>
                  </div>
                </div>
                <div class="col m6">
                  <div class="input-field">
                    <input type="email" name="email" id="email" class="validate">
                    <label for="email">Email </label>
                    <span class="helper-text" data-error="Not valid Email" data-success="Valid Email"></span>
                  </div>
                </div>
                <div class="col m6">
                        <div class="input-field">
                          <div class="gender-radio">
                            <label for="">Gender :-</label>
                          </div>
                          <div class="gender-radio">
                              <p>
                                  <label>
                                    <input name="rdo" type="radio" value="Male" class="with-gap" checked />
                                    <span>Male</span>
                                  </label>
                                </p>
                            </div>
                            <div class="gender-radio">
                                <p>
                                    <label>
                                      <input name="rdo" type="radio" value="Female" class="with-gap"/>
                                      <span>Female</span>
                                    </label>
                                  </p>
                            </div>
                        </div>
                        <span style="display:inline-block;"></span>
                      </div>
                <div class="col m6">
                    <div class="input-field">
                      <input type="password" name="pass" id="pass">
                      <label for="pass">Password</label>
                    </div>
                  </div>
                  <div class="col m6">
                      <div class="input-field">
                        <input type="text" name="number" id="number">
                        <label for="number">Mobile</label>
                      </div>
                    </div>
                    <div class="col m12">
                          <div class="heading-text">
                            <div class="input-field">
                                <button class="btn waves-effect waves-light" type="submit" name="btnRegister">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                          </div>
                        </div>
              </div>
            </div>
      
    </div>
  </section>

  
   <!--End of Form Control--> 