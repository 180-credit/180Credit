
<div class="container login-btn-block">
    <div class="row justify-content-center my-5 py-5">
        <div class="col-md-6">
            <h4 class="mb-3">Create a consumer account</h4>
            <p class="mb-2">If you offer credit repair and/or industry related services, <a href="#">click here</a>.</p>
            <p>Already have an account? <a href="<?= base_url(); ?>login/login_consumer">Log in</a>.</p>
            <form id="consumer_form" autocomplete="off" method="post" action="<?= base_url(); ?>login/signup_store">
                <input type="hidden" name="user_type" value="2">
                <div class="form-group">
                    <label for="email">Enter your email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-row mt-4 mb-3">
                    <div class="form-group col-md-6">
                        <label for="password">Create a password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="At least 8 charcters long">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="conf-password">Confirm password</label>
                        <input type="password" class="form-control" name="conf_password" id="conf-password">
                    </div>
                    <label class="col-md-12 mt-3">Your Name</label>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="first_name" id="inputAddress1" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control"  name="last_name" id="inputAddress2" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="termscheck" class="form-check-input"  id="termscheck">
                    <label class="form-check-label" for="termscheck">I have read and accept 180Credit’s <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></label>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="keep_login" value="1" class="form-check-input" id="keepcheck">
                    <label class="form-check-label" for="keepcheck">Keep me logged in</label>
                </div>
                <button type="button" id="submit-consumer" class="btn btn-primary btn-block">Save and continue</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#consumer_form").validate({
            rules: {
                // simple rule, converted to {required:true}
                // compound rule
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?= base_url(); ?>login/user_exists",
                        type: "post",
                        data: {
                            email: function()
                            {
                                return $('#email').val();
                            }
                        }
                    }
                },
                password:{
                    required: true,
                    minlength:8
                },
                conf_password: {
                   equalTo: "#password"
                },
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                termscheck: {
                    required: true,
                }

            },
            messages:{
                email :{
                    remote : "This email is already exists."
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "checkbox") {
                    console.log($(element).parent("div").find("label"));
                    $($(element).parent("div").find("label")).append(error);
                }else {
                    error.insertAfter(element);
                }
            }
        });
        $("#submit-consumer").click(function(){
            console.log($("#consumer_form").valid());
            if($("#consumer_form").valid()){
                $("#consumer_form").submit();
            }
        })
    })
</script>