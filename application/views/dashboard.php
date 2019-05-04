<main>
	<div class="container account-page">
		<div class="row justify-content-center my-5 py-5">
			<?php $this->load->view('left'); ?>
			<div class="col-md-7 shadow bg-white px-0">
				<div class="mb-3 card border-0">
					<div class="card-header bg-transparent">
						<h5 class="position-relative mb-0">My Account<a href="my-edit.html"><i class="fas fa-pencil-alt"></i></a></h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-3">
								<img src="<?= base_url(); ?>assets/images/apic.jpg" title="apic" alt="apic" class="img-res">
							</div>
							<div class="col-md-9 account-content-block">
								<h5 class="mt-0">Jonathan Mc Mahon</h5>
								<div class="acc-mail">
									<p class="d-inline-block">jmcmahon@creditrescue.com</p><span class="ml-2 verified-span"><i class="fas fa-check-circle mx-1"></i>verified</span>
								</div>
								<div class="acc-mail-content">
									<span class="d-block"><i class="fas fa-check-circle mr-2"></i>Offers credit repair services</span>
									<span class="d-block"><i class="fas fa-times-circle mr-2"></i>Does not offer services to the industry</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<main>