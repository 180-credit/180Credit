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
								<li class="nav-item"><a data-toggle="tab" href="#tab-eg5-2" class="nav-link">My Fees</a></li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content">
								<div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
									<form>
										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Company Name</label>
													<input type="text" class="form-control" id="inputAnswer1">
												</div>
												<div class="form-group">
													<label>Street Address</label>
													<input type="text" class="form-control" id="inputAnswer2">
												</div>
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" id="inputAnswer3">
												</div>
												<div class="form-group">
													<label for="inputState">State</label>
													<select id="inputState" class="form-control">
														<option selected>Please Select...</option>
														<option>...</option>
													</select>
												</div>
												<div class="form-group">
													<label>Zip code</label>
													<input type="text" class="form-control" id="inputAnswer4">
												</div>
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" class="form-control" id="inputAnswer5">
												</div>
											</div>
											<div class="col-md-6 pl-md-4 chk-box-block">
												<label>Areas of Speciality...</label>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck1">
														<label class="form-check-label">Authorized User Accounts</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck2">
														<label class="form-check-label">Bankruptcy</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck3">
														<label class="form-check-label">Budget & Savings</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck4">
														<label class="form-check-label">Charge Offs</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck5">
														<label class="form-check-label">Collections</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck6">
														<label class="form-check-label">Consumer Credit Counseling</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck7">
														<label class="form-check-label">Credit Cards</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck8">
														<label class="form-check-label">Credit Inquiries</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck9">
														<label class="form-check-label">Credit Repair</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck10">
														<label class="form-check-label">Credit Repair Mistakes</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck11">
														<label class="form-check-label">Credit Reports</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck12">
														<label class="form-check-label">Credit Scores</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck13">
														<label class="form-check-label">Debt Consolidation</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck14">
														<label class="form-check-label">Debt Negotiation</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck15">
														<label class="form-check-label">Debt Validation</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck16">
														<label class="form-check-label">Identity Concerns</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck17">
														<label class="form-check-label">Judgements</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck18">
														<label class="form-check-label">Loan Preparation</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck19">
														<label class="form-check-label">Mortgages</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck20">
														<label class="form-check-label">Rapid Rescore</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck21">
														<label class="form-check-label">Statute of Limitation</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="gridCheck22">
														<label class="form-check-label">Student Loans</label>
													</div>
												</div>
											</div>
											<div class="col-md-10">
												<div class="form-group">
													<label>Website URL</label>
													<input type="text" class="form-control" id="inputAnswer6">
												</div>
												<div class="form-group">
													<label>Scheduling URL</label>
													<input type="text" class="form-control" id="inputAnswer7">
												</div>
												<div class="form-group">
													<label>Facebook URL</label>
													<input type="text" class="form-control" id="inputAnswer8">
												</div>
												<div class="form-group">
													<label>Twitter URL</label>
													<input type="text" class="form-control" id="inputAnswer9">
												</div>
												<div class="form-group">
													<label>YouTube URL</label>
													<input type="text" class="form-control" id="inputAnswer10">
												</div>
												<div class="form-group">
													<label>LinkedIn URL</label>
													<input type="text" class="form-control" id="inputAnswer11">
												</div>
												<div class="form-group">
													<label>Instagram URL</label>
													<input type="text" class="form-control" id="inputAnswer12">
												</div>
											</div>
										</div>
										<button type="submit" class="btn btn-primary">Save</button>
										<button type="button" class="btn btn-link">Cancel</button>
									</form>
								</div>
								<div class="tab-pane" id="tab-eg5-1" role="tabpanel">
									<div class="row">
										<div class="col-md-11 abt-us-tab">
											<form>
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Short description</label>
													<p>The short description is an abbreviated description of your company and/or services that is displayed in the search results.</p>
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
												</div>
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Example textarea</label>
													<p>Use this space to describe yourself and your business in detail.</p>
													<textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
												</div>
												<div class="form-group">
													<label>Additional business attributes</label>
													<p>Feel free to add any additional tags about your business you like.</p>
													<!-- <input type="text" class="form-control" id="inputAddress"> -->
													<div class="select2-outer-div">
														<select class="js-example-basic-multiple" name="states[]" multiple="multiple">
															<option value="AL">Alabama</option>
															<option value="WY">Wyoming</option>
														</select>
													</div>

												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="tab-pane fee-tab" id="tab-eg5-2" role="tabpanel">
									<form>
										<div class="switch-div">
											<h5 class="d-inline-block">Do you offer free consultations?</h5>
											<input type="checkbox" checked data-toggle="toggle">
										</div>
										<h5 class="mt-2">Fee Setup</h5>
										<h6>Add a new fee to my fee table</h6>
										<div class="form-row form-top-row">
											<div class="col-6">
												<label>Select a fee type</label>

												<div class="select2-outer-div">
													<select class="js-example-basic-multiple" name="states[]" multiple="multiple">
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>

											</div>
											<div class="col">
												<label>Amount</label>
												<input type="text" class="form-control">
											</div>
											<div class="col">
												<label>Billing</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-1 d-flex align-items-center justify-content-center">
												<i class="fas fa-plus-circle mt-4"></i>
											</div>
										</div>
										<p>NOTE: You can re-arrange the order of the items by dragging</p>
										<div class="fee-bottom-block">
											<div class="form-row">
												<div class="col">
													<div class="row no-gutters">
														<div class="col"><label>FREE 30 minute consultation</label></div>
														<div class="col-2"><label>$0</label></div>
													</div>
												</div>
												<div class="col-1 d-flex align-items-center justify-content-center">
													<i class="fas fa-minus-circle"></i>
												</div>
											</div>
											<div class="form-row">
												<div class="col">
													<div class="row no-gutters">
														<div class="col"><label>One-time application and setup fee</label></div>
														<div class="col-2"><label>$195</label></div>
													</div>
												</div>
												<div class="col-1 d-flex align-items-center justify-content-center">
													<i class="fas fa-minus-circle"></i>
												</div>
											</div>
											<div class="form-row">
												<div class="col">
													<div class="row no-gutters">
														<div class="col"><label>3 rounds of item disputes</label></div>
														<div class="col-2"><label>$30 Per Item</label></div>
													</div>
												</div>
												<div class="col-1 d-flex align-items-center justify-content-center">
													<i class="fas fa-minus-circle"></i>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>