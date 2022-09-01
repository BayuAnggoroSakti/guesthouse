    <div class="page-banner-area item-bg-login">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-banner-content">
                            <h2>Reset Password</h2>
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
                                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login"><?php echo lang('reset_password_heading');?></a>
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
                             <?php echo form_open('auth/reset_password/' . $code);?>
                                    <div class="form-group">
                                         <label for="exampleFormControlInput1" class="form-label"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
                                       <?php echo form_input($new_password);?>
                                    </div>
                                       <div class="form-group">
                                         <label for="exampleFormControlInput1" class="form-label"><?php echo lang('reset_password_new_password_confirm_label')?></label>
                                       <?php echo form_input($new_password_confirm);?>
                                    </div>
                                    <?php echo form_input($user_id);?>
                                    <?php echo form_hidden($csrf); ?>
                                    <button type="submit" class="default-btn">Submit<i class="flaticon-send"></i></button>
                                    <hr>
                                  
                               <?php echo form_close();?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>