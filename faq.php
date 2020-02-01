
    
    <!-- Start of FAQ's Section -->

    <section class="faq_section">
        <img src="img/Help.png" alt="FAQ Background Page">
            <div class="faq container">
                <div class="faq_content">
                    <div class="faq_header">
                        <h2>Help Center</h2>
                    </div>
                    <div class="faq_para">
                        <div class="row">
                        <?php 
                        $faq_masterModel = new faq_masterModel();
                        $controller = new faq_masterController();
                        $data = $controller->ShowFaqData($faq_masterModel);
                        $count=1;
                        foreach($data as $result) :
                        ?>
                          <div class="col m6">
                            <div class="faq-data">
                           <b><span><?php echo $count++;?>.</span><?php echo $result['faq_que'];?></b>
                           <p><?php echo $result['faq_ans'];?></p>
                          </div>
                          </div>
                        <?php endforeach;?>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    