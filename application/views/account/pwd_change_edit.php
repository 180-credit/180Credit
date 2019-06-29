<div class="container account-page">
    <div class="row justify-content-center my-5 py-5">
        <?php $this->load->view('templates/account_side_bar', array('c_view' => $_ci_view)); ?>
        <div class="col-md-7 shadow bg-white px-0">
            <div class="mb-3 card border-0 pass-sec-edit">
                <div class="card-header bg-transparent">
                    <h5 class="mb-0">Password &amp; Security</h5>
                </div>
                <div class="card-body p-4">

                    <div class="form-row">
                        <div class="col-md-5">
                            <form id="change_password_form" action="<?= base_url(); ?>account/change_password_change" method="post">
                                <h6 class="mb-3">Change your password</h6>
                                <?php
                                if (!empty($_SESSION['user']['userPassword'])){
                                    ?>
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control" required name="current_password"
                                               id="current_password">
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                    <p>Choose a strong, unique password that’s at least 8 characters long.</p>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm">Confirm New Password</label>
                                    <input type="password" class="form-control" id="password_confirm"
                                           name="password_confirm">
                                </div>
                                <button type="submit" id="submit-change_password_form" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </form>
                        </div>
                        <div class="col-md-7 pl-md-4">
                            <form id="setupQuestionForm" action="<?= base_url(); ?>account/change_password_change_question" method="post">
                                <h6 class="mb-3">Setup your security question (optional)</h6>
                                <?php
                                if (isset($_SESSION['user']['question']) && !empty($_SESSION['user']['question'])) {
                                    ?>
                                    <div class="form-group">
                                        <label><?= $_SESSION['user']['question'] ?></label>
                                        <input type="text" class="form-control" id="old_answer" required name="old_answer">
                                        <p>Before you can set a new security question, you’ll have to answer your
                                            current
                                            one correctly.</p>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label for="question">New Question</label>
                                    <select id="question" name="question" class="form-control">
                                        <option selected="" disabled>Please Select...</option>
                                        <option>What is your mother's maiden name?</option>
                                        <option>What is the first name of your childhood best friend?</option>
                                        <option>What is the name of the street you grew up on?</option>
                                        <option>What is the make and model of your favorite car?</option>
                                        <option>What was your first pet's name?</option>
                                        <option>What is the name of your favorite movie?</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <input type="text" class="form-control" id="question_answer" name="question_answer">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_accept_condition" id="is_accept_condition">
                                        <label class="form-check-label" for="is_accept_condition">
                                            I understand my account will be locked if I am unable to answer this
                                            question.
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" id="submit-setupQuestionForm" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#change_password_form").validate({
            rules: {
                // simple rule, converted to {required:true}
                // compound rule
                current_password:{
                    minlength:8,
                    remote: {
                        url: "<?= base_url(); ?>account/checkPassword",
                        type: "post"
                    }
                },
                new_password:{
                    required: true,
                    minlength:8
                },
                password_confirm: {
                    equalTo: "#new_password"
                },

            },
            messages:{
                current_password :{
                    remote : "Current password is not match."
                }
            }
        });
        $("#submit-change_password_form").click(function(){
            if($("#change_password_form").valid()){
                $("#change_password_form").submit();
            }
        });


        $("#setupQuestionForm").validate({
            rules: {
                // simple rule, converted to {required:true}
                // compound rule
                old_answer:{
                    remote: {
                        url: "<?= base_url(); ?>account/checkOldAnswer",
                        type: "post"
                    }
                },
                question:{
                    required: true
                },
                question_answer:{
                    required: true
                },
                is_accept_condition: {
                    required: true,
                }

            },
            messages:{
                old_answer :{
                    remote : "Old answer is not match."
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "checkbox") {
                    console.log($(element).parent("div").find("label"));
                    $($(element).parent("div")).append(error);
                }else {
                    error.insertAfter(element);
                }
            }
        });
        $("#submit-setupQuestionForm").click(function(){
            if($("#setupQuestionForm").valid()){
                $("#setupQuestionForm").submit();
            }
        })
    })
</script>