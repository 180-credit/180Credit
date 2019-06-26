<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-master/css/bootstrap-toggle.min.css">
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-master/js/bootstrap-toggle.min.js" type="text/javascript"></script>

<div class="container account-page">
			<div class="row justify-content-center my-5 py-5">
			<?php $this->load->view('templates/account_side_bar',array('c_view' => $_ci_view)); ?>
				<div class="col-md-7 shadow bg-white px-0">
					<div class="mb-3 card border-0">
						<div class="card-header bg-transparent">
							<h5 class="mb-0">My Account</h5>
						</div>
						<?php
							$user = $_SESSION['user'];
						?>
						<div class="card-body">
							<div class="row">
								<form id="account-edit" enctype="multipart/form-data" method="post" action="<?= base_url(); ?>account/store_user">
									<div class="col-md-4 pull-left">
										<div class="form-group text-center">
											<?php
												if(isset($user['profile_image'])){
													?>
														<img class="round" id='profile-image' width="150" height="150" src="<?= base_url().$user['profile_image']; ?>">
													<?php
												}
												else{
													?>
														<img class="round" id='profile-image' width="150" height="150" avatar="<?= ucfirst($user['firstName']).' '.ucfirst($user['lastName']) ?>">
													<?php
												}
											?>
										</div>
										<div class="form-group">
                                            <div class="full-width">
                                                <input type="file" id="profile-input" accept="image/*" name='profile_image' class="form-control form-input form-style-base">
                                                <input type="text" id="fake-input" accept="image/*" class="form-control form-input form-style-fake" placeholder="Choose your File" readonly>
                                                <span class="fa fa-upload input-place"></span>
                                            </div>
<!--											<input type="file" accept="image/*" name='profile_image'  class="form-control-file" id="profile-input">-->
										</div>
									</div>
									<input type="hidden" name="user_id" value="<?= $user['userId'] ?>">
									<div class="col-md-8 pull-left account-content-block">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="first_name">First Name</label>
												<input type="text" class="form-control" id="first_name" name="first_name" value="<?= ucfirst($user['firstName']) ?>" placeholder="First Name">
											</div>
											<div class="form-group col-md-6">
												<label>Last Name</label>
												<input type="text" class="form-control" id="last_name" name="last_name" value="<?= ucfirst($user['lastName']) ?>" placeholder="Last Name">
											</div>
											<div class="form-group col-md-12">
												<label for="email">Email address</label><?= $user['isEmailVerified'] == 1 ? '<span class="ml-2 verified-span"><i class="fas fa-check-circle mx-1"></i>verified</span>' :'<span class="ml-2 unverified-span"><i class="fas fa-times-circle mx-1"></i>Unverified</span>' ?>
												<input type="email" class="form-control" name="email" id="email" value="<?= $user['userEmail'] ?>" placeholder="Email address">
											</div>
                                            <?php
                                            if(isset($_SESSION['user']['180creditUserType']) && $_SESSION['user']['180creditUserType'] == '1') {
                                                ?>
                                                <div class="form-group col-md-12 acc-mail-content">
												<span class="d-block">Do you offer credit repair services?
													<input type="checkbox" name="isCreditRepairService"
                                                           value="1" <?= (isset($user['isCreditRepairService']) && $user['isCreditRepairService'] == 1 ? 'checked' : '') ?>  data-toggle="toggle">
												</span>
                                                    <span class="d-block">Do you offer services to the credit repair industry?
													<input type="checkbox" name="isCreditRepairIndustry"
                                                           value="1" <?= (isset($user['isCreditRepairIndustry']) && $user['isCreditRepairIndustry'] == 1 ? 'checked' : '') ?>  data-toggle="toggle"></span>
                                                </div>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <input type="hidden" name="isCreditRepairService" value="0" />
                                                <input type="hidden" name="isCreditRepairIndustry" value="0" />
                                                <?php
                                            }
                                            ?>
										</div>
										<button type="button" id="submit-account" class="btn btn-primary">Save</button>
										<a class="btn  btn btn-secondary" href="<?= base_url(); ?>my-account">Cancel</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#profile-image').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
    $('input[id=profile-input]').change(function() {
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });
	$("#profile-input").change(function() {
		readURL(this);
	});
    $(document).ready(function(){
        $("#account-edit").validate({
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
                            },
							userId:'<?= $user['userId'] ?>'
                        }
                    }
                },
                first_name:{
                    required: true
				},
				last_name:{
                    required: true
				},
				profile_image: {
					accept: "image/*"
				}

            },
			messages:{
                email :{
                    remote : "This email is already exists."
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "file") {
                    $($(element).parent("div").parent("div")).append(error);
                }else {
                    error.insertAfter(element);
                }
            }
        });
        $("#submit-account").click(function(){
            if($("#account-edit").valid()){
                $("#account-edit").submit();
            }
        })
    })
</script>