<div class="container login-btn-block">
    <div class="row justify-content-center my-5 py-5">
        <div class="col-md-6">
            <h4 class="text-center mb-3">Service Provider Access</h4>
            <p class="text-center">If you are a consumer looking for help and/or information, <a href="#">click here</a>.</p>
            <button type="button" onclick="location.href = '<?= $google_login_url ?>';" class="btn btn-primary btn-block btn-icon google-btn position-relative">Continue with Google</button>
            <button type="button" onclick="location.href = '<?= $facebook_login_url ?>';" class="btn btn-primary btn-block btn-icon fb-btn position-relative"><i class="fab fa-facebook-square"></i>Continue with Facebook</button>
            <a href="<?= base_url(); ?>service-provider/register" class="btn btn-primary btn-block btn-icon envelope-btn position-relative btn-anchor"><i class="far fa-envelope"></i>Sign up with email</a>
            <h6 class="text-center mt-3">or</h6>
            <h5 class="text-center mb-4">Log in with email</h5>
            <form  action="<?= base_url(); ?>login/login_post" autocomplete="off" id='provider_form' method="post">
                <?php
                if (isset($error)) {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $error ?>
                    </div>
                    <?php
                }
                if(isset($success)){
                    ?>
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $success ?>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <input type="email" class="form-control" name='email' id="exampleInputEmail1" placeholder="email address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name='password' id="exampleInputPassword1" placeholder="password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
                </div>
                <button type="button" id='submit-provider' class="btn btn-primary btn-block">Login</button>
                <a class="text-center btn-block" href="#">Forgot your password?</a>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#provider_form").validate({
            rules: {
                // simple rule, converted to {required:true}
                // compound rule
                email: {
                    required: true,
                    email: true
                },
                password:{
                    required: true,
                    minlength:8
                }

            }
        });
        $("#submit-provider").click(function(){
            if($("#provider_form").valid()){
                $("#provider_form").submit();
            }
        });
        $('#provider_form input').keypress(function (e) {
        if (e.which == 13) {
            if($("#provider_form").valid()){
                $("#provider_form").submit();
            }
            return false;
        }
        });
    })
</script>