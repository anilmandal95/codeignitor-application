<?= $this->extend('public_layout')?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <div class="card mt-2 bg-secondary">
                <div class="card-body">
                     <h2>Create new account</h2>
                     <?php $session = session(); ?>
                     <?php if(!is_null($session->getFlashdata('success_message'))) : ?>
                        <div class="alert alert-success">
                        <?= $session->getFlashdata('success_message');?>
                        </div>
                     <?php endif ?>
                        <form action="<?= base_url('register')?>" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                        <span>
                            <?php
                               if(isset($validation)){
                                   if($validation->hasError("username")){
                                       ?>
                                       <p class="text-danger">
                                           <?php echo $validation->getError("username"); ?>
                                       </p>
                                       <?php
                                   }
                               }
                            ?>
                        </span> 
                        </div>
                        <div class="mb-2">
                        <label for="username">Email</label>
                        <input type="email" class="form-control" name="email">
                        <span>
                            <?php
                               if(isset($validation)){
                                   if($validation->hasError("email")){
                                       ?>
                                       <p class="text-danger">
                                           <?php echo $validation->getError("email"); ?>
                                       </p>
                                       <?php
                                   }
                               }
                            ?>
                        </span>     
                        </div>
                        <div class="mb-2">
                        <label for="username">Mobile</label>
                        <input type="text" class="form-control" name="mobile">
                        <span>
                            <?php
                               if(isset($validation)){
                                   if($validation->hasError("mobile")){
                                       ?>
                                       <p class="text-danger">
                                           <?php echo $validation->getError("mobile"); ?>
                                       </p>
                                       <?php
                                   }
                               }
                            ?>
                        </span>  
                        </div>
                        <div class="mb-2">
                        <label for="username">Password</label>
                        <input type="text" class="form-control" name="password">
                        <span>
                            <?php
                               if(isset($validation)){
                                   if($validation->hasError("password")){
                                       ?>
                                       <p class="text-danger">
                                           <?php echo $validation->getError("password"); ?>
                                       </p>
                                       <?php
                                   }
                               }
                            ?>
                        </span>  
                        </div>
                        <div class="mb-2">
                        <label for="username">Profile</label>
                        <input type="file" class="form-control" name="userfile">
                        <span>
                            <?php
                               if(isset($validation)){
                                   if($validation->hasError("userfile")){
                                       ?>
                                       <p class="text-danger">
                                           <?php echo $validation->getError("userfile"); ?>
                                       </p>
                                       <?php
                                   }
                               }
                            ?>
                        </span> 
                        </div>
                        <div class="mb-2 text-center">
                            <input type="submit" value="Register" name="register" class="btn btn-primary">
                        </div>
                    </form>
                    <a href="<?=base_url()?>user/login">Already have an account?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection()?>