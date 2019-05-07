<div class="container account-page">
			<div class="row justify-content-center my-5 py-5">
			<?php $this->load->view('templates/account_side_bar',array('c_view' => $_ci_view)); ?>
				<div class="col-md-7 shadow bg-white px-0">
					<div class="mb-3 card border-0">
						<div class="card-header bg-transparent">
							<h5 class="position-relative mb-0">My Account<a href="<?= base_url().'my-account/edit'; ?>"><i class="fas fa-pencil-alt"></i></a></h5>
						</div>
						<div class="card-body">
							<div class="row">
                                <?php 
                                    $user = $_SESSION['user'];
                                ?>
								<div class="col-md-3">
								<?php 
									if(isset($user['profile_image'])){
										?>
											<img class="round" id='profile-image' width="120" height="120" src="<?= base_url().$user['profile_image']; ?>">
										<?php
									}
									else{
										?>
											<img class="round" id='profile-image' width="120" height="120" avatar="<?= ucfirst($user['firstName']).' '.ucfirst($user['lastName']) ?>">
										<?php	
									}
								?>
                                <!-- <img src="assets/images/apic.jpg" title="apic" alt="apic" class="img-res"> -->
								</div>
								<div class="col-md-9 account-content-block">
									<h5 class="mt-0"><?= ucfirst($user['firstName']).' '.ucfirst($user['lastName']) ?></h5>
									<div class="acc-mail">
										<p class="d-inline-block"><?= $user['userEmail'] ?></p><?= $user['isEmailVerified'] == 1 ? '<span class="ml-2 verified-span"><i class="fas fa-check-circle mx-1"></i>Verified</span>' : '<span class="ml-2 unverified-span"><i class="fas fa-times-circle mx-1"></i>Unverified</span>' ?>
									</div>
									<div class="acc-mail-content">
										<span class="d-block"><?= (isset($user['isCreditRepairService']) && $user['isCreditRepairService'] == 1  ? '<i class="fas fa-check-circle mr-2"></i>' : '<i class="fas fa-times-circle mr-2"></i>') ?>Offers credit repair services</span>
										<span class="d-block"><?= (isset($user['isCreditRepairIndustry']) && $user['isCreditRepairIndustry'] == 1  ? '<i class="fas fa-check-circle mr-2"></i>' : '<i class="fas fa-times-circle mr-2"></i>') ?>Does not offer services to the industry</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>