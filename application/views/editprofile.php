<main>
	<div class="container account-page">
		<div class="row justify-content-center my-5 py-5">
			<?php $this->load->view('left'); ?>
			<div class="col-md-7 shadow bg-white px-0">
				<div class="mb-3 card border-0">
					<div class="card-header bg-transparent">
						<h5 class="mb-0">My Account</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<form>
									<img src="<?= base_url(); ?>assets/images/apic.jpg" title="apic" alt="apic" class="img-res mb-3">
									<div class="form-group">
										<input type="file" class="form-control-file" id="exampleFormControlFile1">
									</div>
								</form>
							</div>
							<div class="col-md-8 account-content-block">
								<form>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">First Name</label>
											<input type="text" class="form-control" id="fname" placeholder="First Name">
										</div>
										<div class="form-group col-md-6">
											<label>Last Name</label>
											<input type="text" class="form-control" id="lname" placeholder="Last Name">
										</div>
										<div class="form-group col-md-12">
											<label for="inputEmail4">Email address</label><span class="ml-2 verified-span"><i class="fas fa-check-circle mx-1"></i>verified</span>
											<input type="email" class="form-control" id="inputEmail4" placeholder="Email address">
										</div>
										<div class="form-group col-md-12 acc-mail-content">
											<span class="d-block">Do you offer credit repair services?
												<input type="checkbox" checked data-toggle="toggle">
											</span>
											<span class="d-block">Do you offer services to the credit repair industry?
												<input type="checkbox" checked data-toggle="toggle"></span>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Save</button>
									<button type="submit" class="btn  btn-link">Cancel</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<main>