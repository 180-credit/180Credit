<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-master/css/bootstrap-toggle.css">
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/awesomplete/awesomplete.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-master/js/bootstrap-toggle.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/awesomplete/awesomplete.min.js" async type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<div class="container account-page">
	<div class="row justify-content-center my-5 py-5">
		<?php $this->load->view('templates/account_side_bar',array('c_view' => $_ci_view)); ?>
		<div class="col-md-7 my-bis-pro shadow bg-white px-0">
			<div class="mb-3 card border-0">
				<div class="card-header bg-transparent d-md-flex pb-0">
					<h5 class="position-relative mb-0">My Business Profile</h5>
					<ul class="nav">
						<li class="nav-item"><a data-toggle="tab" href="#tab-eg5-0" class="active nav-link">My Company</a></li>
						<li class="nav-item"><a data-toggle="tab" href="#tab-eg5-1" class="nav-link">About Me</a></li>
						<?php
						if(isset($user_company_profile) && !empty($user_company_profile)){
							?>
								<li class="nav-item"><a data-toggle="tab" href="#tab-eg5-2" class="nav-link">My Fees</a></li>	
							<?php
						}
						?>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
							<form action="<?= base_url(); ?>account/store_business_profile" method="post" id='business_profile-edit'>
								<div class="form-row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Company Name</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->company_name) ? $user_company_profile->company_name : '' ?>" id="company_name" name="company_name">
										</div>
										<div class="form-group">
											<label>Street Address</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->address1) ? $user_company_profile->address1 : '' ?>" id="street_address" name="street_address">
										</div>
										<div class="form-group">
											<label>City</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->city) ? $user_company_profile->city : '' ?>" id="city" name="city">
										</div>
										<div class="form-group">
											<label for="state">State</label>
											<select id="state" name="state" class="form-control">
												<option disabled selected>Please Select...</option>
												<?php 
													foreach($states as $state){
														?>
														<option value="<?= $state->id ?>" <?= isset($user_company_profile->state_id) && $user_company_profile->state_id == $state->id ? 'selected' : '' ?> ><?= $state->name ?></option>
														<?php
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<label>Zip code</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->zip) ? $user_company_profile->zip : '' ?>" id="zip_code" name="zip_code">
										</div>
										<div class="form-group">
											<label>Phone Number</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->public_phone) ? $user_company_profile->public_phone : '' ?>" id="phone_number" name="phone_number">
										</div>
									</div>
									<div class="col-md-6 pl-md-4 chk-box-block">
										<label>Areas of Speciality...</label>
										<?php 
											foreach($areas_of_specialtys as $areasOfSpecialty){
												?>
													<div class="form-group">
														<div class="form-check">
															<input class="form-check-input areas_of_speciality_save" type="checkbox" <?= isset($areasOfSpecialty->area_of_specialty_id) ? 'checked':'' ?> value="<?= $areasOfSpecialty->id ?>" id="areas_of_speciality_<?= $areasOfSpecialty->id ?>">
															<label class="form-check-label"><?= $areasOfSpecialty->name ?></label>
														</div>
													</div>			
												<?php
											}
										?>
									</div>
									<div class="col-md-10">
										<div class="form-group">
											<label>Website URL</label>
											<input type="url" class="form-control" value="<?= isset($user_company_profile->website_url) ? $user_company_profile->website_url : '' ?>" id="website_url" name="website_url">
										</div>
										<div class="form-group">
											<label>Scheduling URL</label>
											<input type="url" class="form-control" value="<?= isset($user_company_profile->scheduling_url) ? $user_company_profile->scheduling_url : '' ?>" id="scheduling_url" name="scheduli  ng_url">
										</div>
										<div class="form-group">
											<label>Facebook URL</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->facebook_url) ? $user_company_profile->facebook_url : '' ?>" id="facebook_url" name="facebook_url">
										</div>
										<div class="form-group">
											<label>Twitter URL</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->twitter_url) ? $user_company_profile->twitter_url : '' ?>" id="twitter_url" name="twitter_url">
										</div>
										<div class="form-group">
											<label>YouTube URL</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->youtube_url) ? $user_company_profile->youtube_url : '' ?>" id="youtube_url" name="youtube_url">
										</div>
										<div class="form-group">
											<label>LinkedIn URL</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->linkedin_url) ? $user_company_profile->linkedin_url : '' ?>" id="linkedin_url" name="linkedin_url">
										</div>
										<div class="form-group">
											<label>Instagram URL</label>
											<input type="text" class="form-control" value="<?= isset($user_company_profile->instagram_url) ? $user_company_profile->instagram_url : '' ?>" id="instagram_url" name="instagram_url">
										</div>
									</div>
								</div>
								<button type="button" id="submit-business_profile" class="btn btn-primary">Save</button>
								<!-- <button type="button" class="btn btn-link">Cancel</button> -->
							</form>
						</div>
						<div class="tab-pane" id="tab-eg5-1" role="tabpanel">
							<div class="row">
								<div class="col-md-11 abt-us-tab">
									<form action="<?= base_url(); ?>account/save_about_me" method="post" id='business_profile-edit-about_me'>
										<div class="form-group">
											<label for="sort_description">Short description</label>
											<p>The short description is an abbreviated description of your company and/or services that is displayed in the search results.</p>
											<textarea class="form-control" id="sort_description" name="sort_description" rows="3"><?= isset($user_about_me->short_description) ? $user_about_me->short_description :'' ?></textarea>
										</div>
										<div class="form-group">
											<label for="long_description">Long description</label>
											<p>The long description is an abbreviated description of your company and/or services that is displayed in the search results.</p>
											<textarea class="form-control" id="long_description" name="long_description" rows="3"><?= isset($user_about_me->long_description) ? $user_about_me->long_description :'' ?></textarea>
										</div>
										<div class="form-group">
											<label>Additional business attributes</label>
											<p>Feel free to add any additional tags about your business you like.</p>
											<!-- <input type="text" class="form-control" id="inputAddress"> -->
											<div class="select2-outer-div">
												<input data-role="tagsinput" class='form-control' id="additional_attributes" value="<?= $tags ?>" name="additional_attributes" type="text">
											</div>

										</div>
										<button type="button" id="submit-business_profile-about_me" class="btn btn-primary">Save</button>
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane fee-tab" id="tab-eg5-2" role="tabpanel">
								<div class="switch-div">
									<h5 class="d-inline-block">Do you offer free consultations?</h5>
									<input type="checkbox" id="offer_free_consultations" value="1" <?= isset($user_company_profile->offersFreeConsultations) && $user_company_profile->offersFreeConsultations==1 ? 'checked' : '' ?>  data-toggle="toggle">
								</div>
								<h5 class="mt-2">Fee Setup</h5>
								<h6>Add a new fee to my fee table</h6>
								<form id='consultancy_form' method post>
									<div class="form-row form-top-row">
										<div class="col-5">
											<label>Select a fee type</label>
											<div class="select2-outer-div">
												<input class="awesomplete" id='consultancy_fee_type' name="consultancy_fee_type" class="form-control" list="mylist" />
												<datalist id="mylist">
													<?php
														foreach($load_fee_types as $load_fee_type){
														?>
															<option><?= $load_fee_type->feeTypeName ?></option>
														<?php
													}
													?>
												</datalist>
											</div>
										</div>
										<div class="col">
											<label>Amount</label>
											<input type="text" id='consultancy_amount' name="consultancy_amount" class="form-control" >
										</div>
										<div class="col">
											<label>Billing</label>
												<input class="awesomplete" id='consultancy_billing_type' name="consultancy_billing_type" class="form-control" list="mylist2" />
												<datalist id="mylist2">
													<?php
														foreach($load_billing_types as $load_billing_type){
														?>
															<option><?= $load_billing_type->billingTypeName ?></option>
														<?php
													}
													?>
												</datalist>
										</div>
										<div class="col-1 d-flex align-items-center justify-content-center">
											<button type="button" id="consultancy_submit" class="btn-transparent"><i class="fas fa-plus-circle mt-4" ></i></button>
										</div>
									</div>
								</form>
							<p>NOTE: You can re-arrange the order of the items by dragging</p>
							<div class="column">
								<div class="fee-bottom-block connected-sortable droppable-area1">
									<?php 
									foreach($user_fees as $user_fee){
										?>
										<div class="form-row draggable-item" data-id="<?= $user_fee->id ?>" id='fees_list_<?= $user_fee->id ?>'>
											<div class="col">
												<div class="row no-gutters">
													<div class="col"><label><?= $user_fee->feeTypeName ?></label></div>
													<div class="col-3"><label>$<?= $user_fee->amount ?>/<?= $user_fee->billingTypeName ?></label></div>
												</div>
											</div>
											<div class="col-1 d-flex align-items-center justify-content-center">
												<a data-id='<?= $user_fee->id ?>' class="remove_fees_data"><i class="fas fa-minus-circle" ></i></a>
											</div>
										</div>
										<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#business_profile-edit").validate({
            rules: {
                // simple rule, converted to {required:true}
                // compound rule
                company_name: {
                    required: true
                },
                street_address: {
                    required: true
                },
                city: {
                    required: true
                },
                state: {
                    required: true
                },
                zip_code: {
                    required: true,
                    number: true
                },
                phone_number: {
                    required: true,
                    number: true
                },
//                website_url: {
//                    required: true
//                },
//                scheduling_url: {
//                    required: true
//                },
//                facebook_url: {
//                    required: true
//                },
//                twitter_url: {
//                    required: true
//                },
//                youtube_url: {
//                    required: true
//                },
//                linkedin_url: {
//                    required: true
//                },
//                instagram_url: {
//                    required: true
//                }

            },
            messages: {
                email: {
                    remote: "This email is already exists."
                }
            }
        });

		$("#consultancy_form").validate({
            rules: {
                // simple rule, converted to {required:true}
                // compound rule
                consultancy_fee_type: {
                    required: true
                },
                consultancy_amount: {
                    required: true,
					number:true
                },
                consultancy_billing_type: {
                    required: true
				}
            }
        });
        $("#submit-business_profile").click(function () {
            if ($("#business_profile-edit").valid()) {
                $("#business_profile-edit").submit();
            }
        })

		$("#consultancy_submit").click(function(a){
			if ($("#consultancy_form").valid()) {
				$(a).prop('disabled',true);
				var consultancy_fee_type= $("#consultancy_fee_type").val();
				var consultancy_amount= $("#consultancy_amount").val();
				var consultancy_billing_type= $("#consultancy_billing_type").val();
				var data={
					consultancy_fee_type:consultancy_fee_type,
					consultancy_amount:consultancy_amount,
					consultancy_billing_type:consultancy_billing_type
				};
				$.post('<?= base_url() ?>/account/save_consultancy_fee',data,
				function(data){
					$('.fee-bottom-block').html(data);
					$(".remove_fees_data").click(function(){
						var fees_id = $(this).data("id");
						$.post('<?= base_url() ?>/account/remove_fees_data',{
							fees_id : fees_id
						},function(data){
							if(data){
								$('#fees_list_'+fees_id).remove();
							}
						});
					});
					$("#consultancy_form").trigger('reset');
					$(a).prop('disabled',false);
				});
			}
		});

		$(".areas_of_speciality_save").click(function(){
			var val = $(this).val();
			var is_checked = $(this).prop("checked");
			$.post('<?= base_url() ?>/account/save_area_of_speciality',{
				areas_of_speciality :val,
				is_checked : is_checked
			},function(data, status){
				
			});
		});

		$(".remove_fees_data").click(function(){
			var fees_id = $(this).data("id");
			$.post('<?= base_url() ?>/account/remove_fees_data',{
				fees_id : fees_id
			},function(data){
				if(data){
					$('#fees_list_'+fees_id).remove();
				}
			});
		});

		$("#offer_free_consultations").change(function(){
			var is_checked = $(this).prop("checked");
			$.post('<?= base_url() ?>/account/offer_free_consultations',{
				is_checked : is_checked
			},function(data, status){
				
			});
		});

		$("#submit-business_profile-about_me").click(function(){
			$('#business_profile-edit-about_me').submit();
		});
	})
	$( init );
	function init() {
		$( ".droppable-area1, .droppable-area2" ).sortable({
			connectWith: ".connected-sortable",
			stack: '.connected-sortable ul',
			update: function( ) {
				var idArray = [];
				$('.draggable-item').each(function () {
					idArray.push($(this).data('id'));
				});
				$.post('<?= base_url() ?>/account/update_sequence_fees',{
				fees_sequence : idArray
				},function(data){
					
				});
			}
		}).disableSelection();
	}

	$('#additional_attributes').on('itemRemoved', function(event) {
		// event.item: contains the item
		var tagName = event.item;
		$.post('<?= base_url() ?>/account/remove_attribute_tags',{
			tagName : tagName
		},function(data, status){
			
		});
	});
</script>