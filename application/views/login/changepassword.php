<main>
	<div class="container account-page">
		<div class="row justify-content-center my-5 py-5">
			<aside class="col-md-3 mb-4 mb-md-0">
				<div class="card p-0 border-0 bg-transparent">
					<h3 class="mb-4">Manage my account</h3>
					<div class="card-body p-0 border-0">
						<ul class="list-group">
							<li class="list-group-item border-0"><a href="my-account.html"><i class="fas fa-globe"></i>My Account</a></li>
							<li class="list-group-item border-0"><a href="my-bis-pro.html"><i class="fas fa-user"></i>My Business Profile</a></li>
							<li class="list-group-item border-0 active"><a href="my-pass-sec.html"><i class="fas fa-lock"></i>Password and Security</a></li>
						</ul>
					</div>
					</div>
			</aside>
			<div class="col-md-7 pass-sec-edit shadow bg-white px-0">
				<div class="mb-3 card border-0">
					<div class="card-header bg-transparent">
						<h5 class="mb-0">Password & Security</h5>
					</div>
					<div class="card-body">
						<form>
							<div class="form-row">
								<div class="col-md-5">
									<h6 class="mb-3">Change your password</h6>
									<div class="form-group">
										<label for="inputPassword4">Current Password</label>
										<input type="password" class="form-control" id="inputPassword4">
									</div>
									<div class="form-group">
										<label for="inputPassword4">New Password</label>
										<input type="password" class="form-control" id="inputPassword5">
										<p>Choose a strong, unique password that’s at least 8 characters long.</p>
									</div>
									<div class="form-group">
										<label for="inputPassword4">Confirm New Password</label>
										<input type="password" class="form-control" id="inputPassword6">
									</div>
								</div>
								<div class="col-md-7 pl-md-4">
									<h6 class="mb-3">Setup your security question (optional)</h6>
									<div class="form-group">
										<label for="inputState">Select a Security Question</label>
										<select id="inputState" class="form-control">
											<option selected>Please Select...</option>
											<option>...</option>
										</select>
										<p>Setting up a security question will assist in accessing your account if you forget your password.</p>
									</div>
									<div class="form-group">
										<label>Answer</label>
										<input type="text" class="form-control" id="inputAnswer">
									</div>
									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="gridCheck">
											<label class="form-check-label" for="gridCheck">
												I understand my account will be locked if I am unable to answer this question.
											</label>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Save</button>
									<button type="button" class="btn btn-link">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
		</div>
</main>