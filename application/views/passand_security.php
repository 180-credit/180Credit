<main>
	<div class="container account-page">
		<div class="row justify-content-center my-5 py-5">
			<?php $this->load->view('left'); ?>
			<div class="col-md-7 shadow bg-white px-0">
				<div class="mb-3 card border-0">
					<div class="card-header bg-transparent">
						<h5 class="position-relative mb-0">Password & Security<a href="my-pass-sec-edit.html"><i class="fas fa-pencil-alt"></i></a></h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 account-content-block">
								<div class="acc-pass-sec-content">
									<div class="d-block pass-block">
										<div class="media">
											<i class="fas fa-check-circle mr-2"></i>
											<div class="media-body">
												<h6>Password has been set</h6>
												<p>Choose a strong, unique password that’s at least 8 characters long.</p>
											</div>
										</div>
									</div>
									<div class="d-block sec-block">
										<div class="media">
											<i class="fas fa-times-circle mr-2"></i>
											<div class="media-body">
												<h6>Security question has not been enabled</h6>
												<p>Confirm your identity with a question only you know the answer to..</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>