<?= $this->extend('public_layout')?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <div class="card mt-2 bg-secondary">
                <div class="card-body">
                <h2>Login to account</h2>
                <?php $session = session(); ?>
                     <?php if(!is_null($session->getFlashdata('failed_message'))) : ?>
                        <div class="alert alert-danger">
                        <?= $session->getFlashdata('failed_message');?>
                        </div>
                     <?php endif ?>
                    <form action="<?= base_url('login')?>" method="post">
                        <div class="mb-2">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username">
                            <span>
                                <?php
                                if(isset($validation)){
                                    if($validation->hasError('username')){
                                     ?>
                                     <p class="text-danger">
                                        <?php echo $validation->getError('username');?>
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
                                    if ($validation->hasError('password')) {
                                        ?>
                                        <p class="text-danger">
                                            <?php echo  $validation->getError('password');?>
                                        </p>
                                        <?php
                                    }
                                }
                                ?>
                            </span>
                        </div>
                        <div class="mb-2 text-center">
                            <input type="submit" class="btn btn-primary" name="login" value="Login">
                        </div>
                    </form>
                    <a href="<?=base_url()?>user/registration">Does't have an account?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection()?>