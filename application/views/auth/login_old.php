    <div class="page-banner-area item-bg-login">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-banner-content">
                            <h2>Login User</h2>
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
                                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login">Silahkan Login</a>
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
                                <?php echo form_open("auth/login");?>
                                    <div class="form-group">
                                         <label for="exampleFormControlInput1" class="form-label"> Username / Email</label>
                                       <?php echo form_input($identity);?>
                                    </div>
    
                                    <div class="form-group">
                                         <label for="exampleFormControlInput1" class="form-label"> Password</label>
                                          <?php echo form_input($password);?>
                                    </div>
    
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                            <p>
                                                <?php echo form_checkbox('remember', '1', FALSE, 'id="test1"');?>
                                                <label for="test1"><?php echo lang('login_remember_label');?></label>
                                                 
                                                   
                                            </p>
                                        </div>
    
                                        <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                                            <a href="<?php echo site_url('auth/forgot_password'); ?>" class="lost-your-password"><?php echo lang('login_forgot_password');?></a>
                                        </div>
                                    </div>
    
                                    <button type="submit" class="default-btn"><?php echo lang('login_submit_btn'); ?><i class="flaticon-send"></i></button>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                             <div class="login-with-account">
                                                <ul>
                                                <li><a href="<?php echo site_url('auth/register/owner'); ?>" class="facebook">Mendaftar sebagai Owner</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="login-with-account">
                                                <ul>
                                                <li><a href="<?php echo site_url('auth/register/kontraktor'); ?>" class="facebook">Mendaftar sebagai Kontraktor </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                   
                               <?php echo form_close();?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>