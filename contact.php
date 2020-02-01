<?php 

if(isset($_POST['submit'])){

  $inquiry_detailsmasterModel = new inquiry_detailsmasterModel();
  $controller = new inquiryDetails_masterController();

  $inquiry_detailsmasterModel->name = $_POST['name'];
  $inquiry_detailsmasterModel->email = $_POST['email'];
  $inquiry_detailsmasterModel->message = $_POST['message'];


  if(!empty($inquiry_detailsmasterModel->name) && !empty($inquiry_detailsmasterModel->email && !empty($inquiry_detailsmasterModel->message))){

    if($controller->InsertInquiryData($inquiry_detailsmasterModel)){

      echo "<script>M.toast({html: 'Inquiry Send'});</script>";
      echo "<script>M.toast({html: 'We will Contact Your Soon'});</script>";

    } else {
      echo "<script>M.toast({html: 'Error while sending Inquiry'});</script>";
    }
  }

}

?>


    <section class="contact-section">
        <div class="contact-bg-img">
          <img src="img/diff_medium.png" alt="Contact Background Image">
        </div>
        <div class="container">
          <div class="contact-heading">
            <h2>Contact us</h2>
          </div>
          <div class="contact-form">
            <form action="">
              <div class="row">
                <div class="col m12 contact-field">
                  <h3>Hi, My name is </h3>
                  <div class="input-field inline">
                    <input id="name" type="text" placeholder="John Doe" name="name">
                  </div>
                  <span>&#xb7;</span>
                </div>
              </div>
              <div class="row">
                <div class="col m12 contact-field">
                  <h3>I am looking for a help with a </h3>
                  <div class="input-field inline">
                    <textarea class="materialize-textarea" placeholder="Booking, Trip etc" name="message"></textarea>
                  </div>
                  <span>&#xb7;</span>
                </div>
              </div>
              <div class="row">
                <div class="col m12 contact-field">
                  <h3>Please contact me at </h3>
                  <div class="input-field inline">
                    <input id="name" type="text" placeholder="contact@example.com" name="email">
                  </div>
                  <span>&#xb7;</span>
                </div>
              </div>
              <div class="row">
                <div class="col m12 contact-field">
                  <h3>Thank You!!</h3>
                </div>
              </div>
              <div class="row">
                <div class="m12 submit-btn">
                  <input type="submit" value="Submit" class="contact-submit" name="submit">
                </div>
              </div>
              <div class="contact-detail">
                <div class="row">
                  <div class="col m6">
                    <div class="email-detail">
                      <img src="img/icon/conversation.png" alt="Email Address">
                      <span>contact@locomotion.com</span>
                    </div>
                  </div>
                  <div class="col m6">
                    <div class="number-detail">
                      <img src="img/icon/contact.png" alt="Contact Number">
                      <span>+91987654321</span>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          
        </div>
    </section>

  