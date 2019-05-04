<div class="container login-btn-block">
    <div class="row justify-content-center my-5 py-5">
        <div class="col-md-6">
            <h4 class="text-center mb-3">Service Provider Access</h4>
            <p class="text-center">If you are a consumer looking for help and/or information, <a href="#">click here</a>.</p>
            <button type="button" class="btn btn-primary btn-block btn-icon google-btn position-relative">Continue with Google</button>
            <button type="button" class="btn btn-primary btn-block btn-icon fb-btn position-relative"><i class="fab fa-facebook-square"></i>Continue with Facebook</button>
            <a href="<?= base_url(); ?>login/signup_service_provider" class="btn btn-primary btn-block btn-icon envelope-btn position-relative btn-anchor"><i class="far fa-envelope"></i>Sign up with email</a>
            <h6 class="text-center mt-3">or</h6>
            <h5 class="text-center mb-4">Log in with email</h5>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <a class="text-center btn-block" href="#">Forgot your password?</a>
            </form>
        </div>
    </div>
</div>