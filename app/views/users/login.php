<?php
 require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5 text-center mb-5">
            <h4 class="text-capitalize">create account</h4>
            <p>please fill out to register with us</p>
            <?php flash('register_success')?>
            <form action="<?php echo URLROOT;?>/users/login" method="post">
               
                <div class="form-group">
                    <label for="name">Email <sup>*</sup></label>
                    <input type="text" name="email"
                        class="form-control <?php echo(!empty($data['email_err'])) ? 'is-invalid':'';?> form-control"
                        value="<?php echo $data['email'];?>">
                    <span class="invalid-feedback"><?php echo $data['email_err'];?></span>

                </div>
                <div class="form-group">
                    <label for="name">Password<sup>*</sup></label>
                    <input type="password" name="password"
                        class="form-control <?php echo(!empty($data['password_err'])) ? 'is-invalid':'';?> form-control"
                        value="<?php echo $data['password'];?>">
                    <span class="invalid-feedback"><?php echo $data['password_err'];?></span>

                </div>
               
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-block btn-success" onclick="myhome()">
                    </div>


                    <div class="col">
                        <a href="<?php echo URLROOT?>/users/register" class="btn btn-light btn-block">No account?
                            Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>