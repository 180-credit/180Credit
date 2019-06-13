<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.css" >
<div class="container search-result">
    <div class="row">
        <div class="col-md-12 breadcum">
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <?php
                $dataToSearch = $_GET;
                if(!empty($dataToSearch)){
                    ?>
                    <li><a href="<?php echo base_url(); ?>/search">Search Specialist</a></li>
                    <li><a class="active" href="javascript:;"><?= implode(', ',$dataToSearch) ?></a></li>
                    <?php
                }
                else{
                    ?>
                        <li><a href="javascript:;">Search Specialist</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="col-md-12">
            <h1>Searching Credit Repair in <?= implode(', ',$dataToSearch) ?></h1>
            <div class="sponsored-ad-block">
                <div class="row">
                    <div class="col-md-6 pr-md-1">
                        <div class="sponsored-user p-2">
                            <div class="media">
                                <img alt="premium user" class="mr-3" src="assets/images/head-shot.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-6 puser-left">
                                            <h6>John McDyer</h6>
                                            <div class="user-address">
                                                <h6 class="mb-0">Credit Savers, LLC</h6>
                                                <span>Westchester, PA</span>
                                            </div>
                                            <div class="rating yes-rating my-1">
														<span class="stars">
															<ul class="list-unstyled">
																<li><i class="fas fa-times"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</span>
                                                <span>2 reviews</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 puser-right">
                                            <div class="puser-right-left">
                                                <div class="sponsered">sponsered</div>
                                                <div class="cell-no">(215) 987-2765</div>
                                                <span><i class="fas fa-check-circle"></i>Free consultations</span>
                                            </div>

                                        </div>
                                        <div class="col-md-12 description">
                                            <p>Let the Philly Credit Mechanic help improve your credit scores. Our
                                                credit repair services can help you get in the.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="pre-list-footer">

                                <div class="sedul-ul">
                                    <ul class="list-unstyled">
                                        <li><a class="status-onoff" href="#"><i class="fas fa-wifi"></i>Offline</a>
                                        </li>
                                        <li><a href="#"><i class="fas fa-calendar-alt"></i>(215) 987-2765</a></li>

                                    </ul>
                                </div>
                                <div class="button-block">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-envelope"></i>Message
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 pl-md-1">
                        <div class="sponsored-user p-2">
                            <div class="media">
                                <img alt="premium user" class="mr-3" src="assets/images/head-shot.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm-6 puser-left">
                                            <h6>John McDyer</h6>
                                            <div class="user-address">
                                                <h6 class="mb-0">Credit Savers, LLC</h6>
                                                <span>Westchester, PA</span>
                                            </div>
                                            <div class="rating yes-rating my-1">
														<span class="stars">
															<ul class="list-unstyled">
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</span>
                                                <span>2 reviews</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 puser-right">
                                            <div class="puser-right-left">
                                                <div class="sponsered">sponsered</div>
                                                <div class="cell-no">(215) 987-2765</div>
                                                <span><i class="fas fa-check-circle"></i>Free consultations</span>
                                            </div>

                                        </div>
                                        <div class="col-md-12 description">
                                            <p>Let the Philly Credit Mechanic help improve your credit scores. Our
                                                credit repair services can help you get in the.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="pre-list-footer">

                                <div class="sedul-ul">
                                    <ul class="list-unstyled">
                                        <li><a class="status-onoff online" href="#"><i class="fas fa-wifi"></i>online</a>
                                        </li>
                                        <li><a href="#"><i class="fas fa-calendar-alt"></i>(215) 987-2765</a></li>

                                    </ul>
                                </div>
                                <div class="button-block">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-envelope"></i>Message
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row search-result-bottom mt-2">
                <div class="col-md-4 left-bottom pr-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h3>Filters</h3>
                        </div>
                        <div class="card-body">
                            <div class="filter-content">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h6 class="title">Specialities</h6>
                                        <select multiple id="specialities-dropdown">
                                            <?php
                                                foreach ($areas_of_specialties as $specialty){
                                                    ?><option <?= isset($_GET['specialist']) &&  $_GET['specialist'] == $specialty->name ? 'selected' :  '' ?> value="<?= $specialty->name ?>"><?= $specialty->name ?></option><?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <h6 class="title">Amenities </h6>
                                        <select multiple id="tags-dropdown">
                                        <?php
                                        foreach ($load_all_tags as $loadAllTag){
                                            ?><option <?= isset($_GET['tags']) &&  $_GET['tags'] == $loadAllTag->tagName ? 'selected' :  '' ?> value="<?= $loadAllTag->tagName ?>"><?= $loadAllTag->tagName ?></option><?php
                                        }
                                        ?>
                                        </select>
<!--                                        <input type="text" class="form-control" id="Check1">-->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <h6 class="title">Location </h6>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <h6 class="title">Search string </h6>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <span class="clearfix"></span>
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Check1">
                                        <label class="custom-control-label" for="Check1">Online only</label>
                                    </div> <!-- form-check.// -->

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Check2">
                                        <label class="custom-control-label" for="Check2">Offer free consultations</label>
                                    </div> <!-- form-check.// -->
                                </div> <!-- card-body.// -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <?php
                                                $pageLimit = array(20,50,100,500);
                                                foreach ($pageLimit as $limit){
                                                    ?>
                                                    <option <?= isset($_GET['limit']) &&  $_GET['limit'] == $limit ? 'selected' :  $limit=='20' ? 'selected' : '' ?> value="<?= $limit ?>"><?= $limit ?> results per page</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <button type="button" id="home-search" class="btn btn-primary text-white">Apply Filters</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 right-bottom pl-md-1">
                    <div class="card">
                        <div class="card-header px-3">
                            Displaying 1-20 of 154 specialists found
                        </div>
                        <div class="card-body p-2">
                            <div class="search-result-block">
                                <div class="premium-listing p-2">
                                    <div class="media">
                                        <img alt="premium user" class="mr-3" src="assets/images/head-shot.png">
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-md-6 puser-left">
                                                    <h6>John McDyer</h6>
                                                    <div class="user-address">
                                                        <h6 class="mb-0">Credit Savers, LLC</h6>
                                                        <span>Westchester, PA</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 puser-right">
                                                    <div class="puser-right-left">
                                                        <div class="rating no-rating">
																	<span class="stars">
																		<ul class="list-unstyled">
																			<li><i class="fas fa-star"></i></li>
																			<li><i class="fas fa-star"></i></li>
																			<li><i class="fas fa-star"></i></li>
																			<li><i class="fas fa-star"></i></li>
																			<li><i class="fas fa-star"></i></li>
																		</ul>
																	</span>
                                                            <span>32 reviewes</span>
                                                        </div>
                                                        <span><i class="fas fa-check-circle"></i>Free consultations</span>
                                                    </div>
                                                    <div class="puser-right-right">
                                                        <i class="far fa-heart"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 description">
                                                    <p>Let the Philly Credit Mechanic help improve your credit
                                                        scores. Our credit repair services can help you get in the.
                                                        Let the Philly Credit Mechanic help improve your credit
                                                        scores. Our credit repair services can help you get in
                                                        the.</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="search-result-block">
                                <div class="premium-listing p-2">
                                    <div class="media">
                                        <img alt="premium user" class="mr-3"
                                             src="assets/images/premium-listing.png">
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-md-6 puser-left">
                                                    <h6>John McDyer</h6>
                                                    <div class="user-address">
                                                        <h6 class="mb-0">Credit Savers, LLC</h6>
                                                        <span>Westchester, PA</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 puser-right">
                                                    <div class="puser-right-left">
                                                        <div class="rating no-rating"><span>Not yet reviewed</span>
                                                        </div>
                                                        <span><i class="fas fa-check-circle"></i>Free consultations</span>
                                                    </div>
                                                    <div class="puser-right-right fill-heart">
                                                        <i class="fas fa-heart"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 description">
                                                    <p>Let the Philly Credit Mechanic help improve your credit
                                                        scores. Our credit repair services can help you get in the
                                                        <b>700 Club</b>.</p>
                                                    <span>Contact us today to learn more.</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="pre-list-footer">
                                        <div class="social-block">
                                            <ul class="list-unstyled">
                                                <li><a class="fb" href="#"><i
                                                            class="fab fa-facebook-square"></i></a></li>
                                                <li><a class="twitter" href="#"><i
                                                            class="fab fa-twitter-square"></i></a></li>
                                                <li><a class="link" href="#"><i class="fab fa-linkedin"></i></a>
                                                </li>
                                                <li><a class="insta" href="#"><i class="fab fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="appoiment-ul">
                                            <ul class="list-unstyled">
                                                <li><a href="#"><i class="fas fa-calendar-alt"></i>Appointment</a>
                                                </li>
                                                <li><a href="#"><i class="fas fa-phone"></i>(215) 987-2765</a></li>
                                                <li><a href="#"><i class="fas fa-external-link-alt"></i>Website</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="button-block">
                                            <button class="btn btn-primary" type="button"><i
                                                    class="fas fa-envelope"></i>Message
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="search-result-block">
                                <div class="premium-listing p-2">
                                    <div class="media">
                                        <img alt="premium user" class="mr-3" src="assets/images/head-shot.png">
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-md-6 puser-left">
                                                    <h6>John McDyer</h6>
                                                    <div class="user-address">
                                                        <h6 class="mb-0">Credit Savers, LLC</h6>
                                                        <span>Westchester, PA</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 puser-right">
                                                    <div class="puser-right-left">
                                                        <div class="rating no-rating">
																	<span class="stars">
																		<ul class="list-unstyled">
																			<li><i class="fas fa-star"></i></li>
																			<li><i class="fas fa-star"></i></li>
																			<li><i class="fas fa-star"></i></li>
																			<li><i class="fas fa-star"></i></li>
																			<li><i class="fas fa-star"></i></li>
																		</ul>
																	</span>
                                                            <span>32 reviewes</span>
                                                        </div>
                                                        <span><i class="fas fa-check-circle"></i>Free consultations</span>
                                                    </div>
                                                    <div class="puser-right-right">
                                                        <i class="far fa-heart"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 description">
                                                    <p>Let the Philly Credit Mechanic help improve your credit
                                                        scores.
                                                        Our credit repair services can help you get in the.Let the
                                                        Philly Credit Mechanic help improve your credit scores. Our
                                                        credit repair services can help you get in the.</p>

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
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<script>
    $('#specialities-dropdown').select2();
    $('#tags-dropdown').select2();
</script>