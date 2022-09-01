    <div class="page-banner-area item-bg-login">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-banner-content">
                            <h2>Register <?php echo $this->uri->segment(3);  ?></h2>
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
                                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login">Daftar sebagai <?php echo $this->uri->segment(3);  ?></a>
                            </li>
    
                         
                        </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                           
                              <?php if (isset($message)) {
                                 echo '<div class="alert alert-danger" role="alert">';
                                 echo $message;
                                 echo '</div>';
                              }
                              ?>
                          
                            <div class="eeza-authentication-form">
                                <?php echo form_open("auth/register/".$this->uri->segment(3));?>
                                <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="exampleFormControlInput1" class="form-label"> <?php echo lang('create_user_fname_label');?></label>
                                           <?php echo form_input($first_name);?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                           <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label"> <?php echo lang('create_user_lname_label');?></label>
                                           <?php echo form_input($last_name);?>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="exampleFormControlInput1" class="form-label"> <?php echo lang('create_user_password_label');?></label>
                                           <?php echo form_input($password);?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                           <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label"> <?php echo lang('create_user_password_confirm_label');?></label>
                                           <?php echo form_input($password_confirm);?>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="exampleFormControlInput1" class="form-label"> <?php echo lang('create_user_email_label');?></label>
                                           <?php echo form_input($email);?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                           <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label"> <?php echo lang('create_user_phone_label');?></label>
                                           <?php echo form_input($phone);?>
                                        </div>
                                    </div>
                                </div>
                                  
                                   
    
                                    <button type="submit" class="default-btn">Register<i class="flaticon-send"></i></button>
                                    <hr>
                                  
                               <?php echo form_close();?>

                                <span class="sub-title"><span>Or</span></span>

                                <div class="login-with-account">
                                    <ul>
                                    
                                        <li><a href="<?php echo site_url("auth/login"); ?>" class="google">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>