    <style>
        .page-banner-area.item-bg-login {
          background-image: url(<?php echo base_url('assets/frontend'); ?>/images/page-banner/forgot_banner.jpg);
        }
    </style>
    <div class="page-banner-area item-bg-login">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-banner-content">
                            <h2>Lupa Password</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner Area -->

        <!-- Start Profile Authentication Area -->
        <div class="profile-authentication-area ptb-100">
            <div class="container">
                <div class="profile-authentication-tabs">
                    <div class="authentication-tabs-list">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></a>
                            </li>
    
                         
                        </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                           
                              <?php if (isset($message)) {
                                 echo $message;
                              }
                              ?>
                          
                            <div class="eeza-authentication-form">
                             <?php echo form_open("auth/forgot_password");?>
                                    <div class="form-group">
                                         <label for="exampleFormControlInput1" class="form-label"> Email</label>
                                       <?php echo form_input($identity);?>
                                    </div>
    
    
                                    <button type="submit" class="default-btn">Submit<i class="flaticon-send"></i></button>
                                    <hr>
                                  
                               <?php echo form_close();?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>