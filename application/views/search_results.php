<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.css">
<div class="container search-result">
    <div class="row">
        <div class="col-md-12 breadcum">
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <?php
                $dataToSearch = $_GET;
                if (!empty($dataToSearch)) {
                    ?>
                    <li><a href="<?php echo base_url(); ?>/search">Search Specialist</a></li>
                    <li><a class="active" href="javascript:">Credit repair</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="javascript:">Search Specialist</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="col-md-12">
            <h1>Searching Credit Repair</h1>
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
                                        <li><a class="status-onoff online" href="#"><i
                                                        class="fas fa-wifi"></i>online</a>
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
                            <div class="col-md-7 float-left">
                                <h3>Filters</h3>
                            </div>
                            <div class="col-md-5 float-left text-right align-content-center">
                                <?php
                                if (isset($specialist) || isset($amenities) || isset($location) || isset($search) || isset($is_online) || isset($offer_free_consultations)) {
                                    ?>
                                    <h5 class="mt-2"><a href="<?php echo base_url(); ?>search">Clear all</a></h5>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="filter-content">
                                <form method="get" action="<?php echo base_url(); ?>search" >
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6 class="title">Specialities</h6>
                                            <select multiple id="specialities-dropdown" name="specialities[]">
                                                <?php
                                                foreach ($areas_of_specialties as $specialty) {
                                                    ?>
                                                    <option <?= isset($specialities) && in_array($specialty->name,$specialities) ? 'selected' : '' ?>
                                                    value="<?= $specialty->name ?>"><?= $specialty->name ?></option><?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6 class="title">Amenities </h6>
                                            <select multiple id="tags-dropdown" name="amenities[]">
                                                <?php
                                                foreach ($load_all_tags as $loadAllTag) {
                                                    ?>
                                                    <option <?= isset($amenities) && in_array($loadAllTag->tagName,$amenities) ? 'selected' : '' ?>
                                                    value="<?= $loadAllTag->tagName ?>"><?= $loadAllTag->tagName ?></option><?php
                                                }
                                                ?>
                                            </select>
                                            <!--                                        <input type="text" class="form-control" id="Check1">-->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6 class="title">Location </h6>
                                            <input type="text" class="form-control" name="location" id="location"
                                                   value="<?= isset($location) ? $location : '' ?>">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6 class="title">Search string </h6>
                                            <input type="text" class="form-control"  id="search-string" name="search" value="<?= $search ?>">
                                        </div>
                                    </div>
                                    <span class="clearfix"></span>
                                    <div class="card-body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="is_online"
                                                   name="is_online" <?= isset($is_online) ? 'checked' : '' ?> value="1">
                                            <label class="custom-control-label" for="is_online">Online only</label>
                                        </div> <!-- form-check.// -->

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="offer_free_consultations" <?= isset($offer_free_consultations) ? 'checked' : '' ?>
                                                   id="offer_free_consultations" value="1">
                                            <label class="custom-control-label" for="offer_free_consultations">Offer free
                                                consultations</label>
                                        </div> <!-- form-check.// -->
                                    </div> <!-- card-body.// -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <select class="form-control" name="limit">
                                                <?php
                                                $pageLimit = array(2,20, 50, 100, 500);
                                                foreach ($pageLimit as $limitVal) {

                                                    ?>
                                                    <option <?= isset($limit) && $limit == $limitVal ? 'selected' : !isset($limit) && $limitVal == '20' ? 'selected' : '' ?>
                                                            value="<?= $limitVal ?>"><?= $limitVal ?> results per page
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <button type="submit" id="apply-filters" class="btn btn-primary text-white">Apply
                                                Filters
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 right-bottom pl-md-1">
                    <div class="card">
                        <div class="card-header px-3">
                            Displaying <?php
                            if($page == 1){
                                echo 1;
                            }else{
                                echo (($page-1) * $limit) + 1;
                            }
                            ?>-<?php
                            echo count($paginationData)
                            ?> of <?= $total ?> specialists found
                        </div>
                        <div class="card-body p-2">
                            <?php
                            foreach ($paginationData as $user){
                                ?>
                                    <div class="search-result-block">
                                        <div class="premium-listing p-2">
                                            <div class="media">
                                                <?php
                                                if(isset($user->profile_image)){
                                                    ?>
                                                    <img class="round mr-3"  width="136" height="136" src="<?= base_url().$user->profile_image; ?>">
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <img class="round mr-3" width="136" height="136" avatar="<?= ucfirst($user->firstName).' '.ucfirst($user->lastName) ?>">
                                                    <?php
                                                }
                                                ?>
<!--                                                <img alt="premium user" class="mr-3" src="assets/images/head-shot.png">-->
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-md-6 puser-left">
                                                            <h6><?= ucfirst($user->firstName).' '.ucfirst($user->lastName) ?></h6>
                                                            <div class="user-address">
                                                                <h6 class="mb-0"><?= ucfirst($user->company_name) ?></h6>
                                                                <span><?= ucfirst($user->city) ?>, <?= ucfirst($user->abbr) ?></span>
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
                                                                <span><i class="fas fa-<?= $user->offersFreeConsultations == 1 ? 'check-circle' : 'times-circle clr-red' ?>"></i>Free consultations</span>
                                                            </div>
                                                            <div class="puser-right-right">
                                                                <i class="far fa-heart"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 description">
                                                            <p><?= $user->short_description  ?></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if ($user->isPremium == 1){
                                                ?>
                                                <div class="pre-list-footer">
                                                    <div class="social-block">
                                                        <ul class="list-unstyled">
                                                            <?php
                                                            if(isset($user->facebook_url)){
                                                                ?>
                                                                <li><a class="fb" target="_blank" href="<?= $user->facebook_url ?>"><i class="fab fa-facebook-square"></i></a></li>
                                                                <?php
                                                            }
                                                            if(isset($user->twitter_url)) {
                                                                ?>
                                                                <li><a class="twitter" target="_blank"  href="<?= $user->twitter_url ?>"><i
                                                                                class="fab fa-twitter-square"></i></a></li>
                                                                <?php
                                                            }
                                                            if(isset($user->linkedin_url)) {
                                                                ?>
                                                                <li><a class="link" target="_blank"  href="<?= $user->linkedin_url ?>"><i class="fab fa-linkedin"></i></a>
                                                                </li>
                                                                <?php
                                                            }
                                                            if(isset($user->instagram_url)) {
                                                                ?>
                                                                <li><a class="insta" target="_blank"  href="<?= $user->instagram_url ?>"><i class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <div class="appoiment-ul">
                                                        <ul class="list-unstyled">
                                                            <?php
                                                            if(isset($user->scheduling_url)) {
                                                                ?>
                                                                <li><a target="_blank"  href="<?= $user->scheduling_url ?>"><i class="fas fa-calendar-alt"></i>Appointment</a>
                                                                </li>
                                                                <?php
                                                            }
                                                            if(isset($user->public_phone)) {
                                                                ?>
                                                                <li><a href="javascript:;"><i class="fas fa-phone"></i>(215) 987-2765</a></li>
                                                                <?php
                                                            }
                                                            if(isset($user->website_url)) {
                                                                ?>
                                                                <li><a  target="_blank"  href="<?= $user->website_url ?>"><i class="fas fa-external-link-alt"></i>Website</a>
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <div class="button-block">
                                                        <button class="btn btn-primary" type="button"><i
                                                                    class="fas fa-envelope"></i>Message
                                                        </button>
                                                    </div>

                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php


                        if($total_pages > 1) { ?>
                            <ul class="pagination pagination-sm justify-content-center">
                                <!-- Link of the first page -->
                                <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
                                    <a class='page-link' href='<?= $pagination_url ?>&page=1'><<</a>
                                </li>
                                <!-- Link of the previous page -->
                                <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
                                    <a class='page-link' href='<?= $pagination_url ?>&page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
                                </li>
                                <!-- Links of the pages with page number -->
                                <?php for($i=$start; $i<=$end; $i++) {
                                    ?>
                                    <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
                                        <a class='page-link' href='<?= $pagination_url ?>&page=<?php echo $i;?>'><?php echo $i;?></a>
                                    </li>
                                <?php } ?>
                                <!-- Link of the next page -->
                                <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
                                    <a class='page-link' href='<?= $pagination_url ?>&page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
                                </li>
                                <!-- Link of the last page -->
                                <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
                                    <a class='page-link' href='<?= $pagination_url ?>&page=<?php echo $total_pages;?>'>>>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
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