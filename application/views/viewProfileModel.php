<style>
    #profilePopup .fixed_modal {
        position: fixed;
        top: -17%;
        left: 7%;
    }
    .tab-content.scroll-div {
        overflow-y: auto;
        height: 90vh;
    }
</style>

<main class="specia-pro-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-3">Pennsylvania - Philadelphia - <?= $user['firstName'] . " " . $user['lastName'] ?></h1>
                <div class="row sidebar_stop">
                    <div class="col-md-4 left-col-block" id="sticky_sidebar">
                        <div class="sidebar__inner">
                            <div class="card border-0 shadow_card bg-light" >
                                <div class="card-body p-2">
                                    <div class="media">
                                        <div class="profile-user-img">
                                            <?php
                                            if (isset($user['profile_image'])) {
                                                ?>
                                                <img class="round align-self-start mr-3" id='profile-image' width="136" height="136" src="<?= base_url() . $user['profile_image']; ?>">
                                                <?php
                                            } else {
                                                ?>
                                                <img class="round align-self-start mr-3" id='profile-image' width="136" height="136" avatar="<?= ucfirst($user['firstName']) . ' ' . ucfirst($user['lastName']) ?>">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0"><?= $user['firstName'] . " " . $user['lastName'] ?></h5>
                                            <div class="review-block">
                                                <span class="rating-block">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </span>
                                                <span class="review-txt">32 Reviews</span>
                                            </div>
                                            <div class="profile-add mt-2">
                                                <h6 class="mb-1"><?= isset($userCompanyProfile->company_name) ? $userCompanyProfile->company_name:'' ?></h6>
                                                <p><?= isset($userCompanyProfile->city) ? $userCompanyProfile->city : '' ?></p>
                                            </div>
                                            <button type="button" class="btn btn-primary"><i class="fas fa-envelope"></i>Send a Message</button>
                                        </div>
                                    </div>
                                    <div class="profile-bottom p-3">
                                        <div class="profile-bot-top d-flex justify-content-between">
                                            <div class="pro-midd-left">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="text-uppercase"><i class="fas fa-wifi"></i>Online</li>
                                                    <li class="text-capitalize"><i class="fas fa-bookmark"></i>Unsave</li>
                                                </ul>
                                            </div>
                                            <div class="prof-midd-right">
                                                <ul class="list-unstyled mb-0">
                                                    <li><?= $userCompanyProfile->offersFreeConsultations == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle clr-red"></i>' ?>Free consultations</li>
                                                    <li><?= isset($userCompanyProfile->offersFreeConsultations) && $userCompanyProfile->offersFreeConsultations== 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle clr-red"></i>' ?>Free consultations</li>
                                                    <?php
                                                    if (!empty($userCompanyProfile->scheduling_url)) {
                                                        ?>
                                                        <li><a href="<?php echo $userCompanyProfile->scheduling_url; ?>"><i class="far fa-calendar-alt"></i>Schedule an appointment</a></li>
                                                        <?php
                                                    }
                                                    if (!empty($userCompanyProfile->public_phone)) {
                                                        ?>
                                                        <li><i class="fas fa-phone"></i><?= $userCompanyProfile->public_phone ?></li>
                                                        <?php
                                                    }
                                                    if (!empty($userCompanyProfile->website_url)) {
                                                        ?>
                                                        <li><a href="<?php echo $userCompanyProfile->website_url; ?>"><i class="fas fa-external-link-alt"></i>Website</a></li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-bot-botom mt-3">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                foreach ($userTags as $userTag) {
                                                    ?>
                                                    <li><?= $userTag->tagname ?></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 right-col-block mb-5" id="sticky_sidebar_maincontent">
                        <div class="card border-0 shadow_card bg-light" id="sticky_main_panel">
                            <div class="card-body p-0">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item home_tab active">
                                        <a class="nav-link" href="#About"  aria-selected="true"><span>About</span></a>
                                    </li>
                                    <li class="nav-item fees_tab">
                                        <a class="nav-link" href="#Fees"  aria-selected="false"><span>Fees</span></a>
                                    </li>
                                    <li class="nav-item contact_tab">
                                        <a class="nav-link" href="#Contact" aria-selected="false"><span>Contact</span></a>
                                    </li>
                                    <li class="nav-item review_tab">
                                        <a class="nav-link" href="#Reviews" aria-selected="false"><span>Reviews</span></a>
                                    </li>
                                    <li class="nav-item qa_tab">
                                        <a class="nav-link" href="#QA" aria-selected="false"><span>Q&A</span></a>
                                    </li>
                                </ul>
                                <div class="tab-content bg-light p-4" id="myTabContent">
                                    <div class="tab-pane fade show active" id="About">
                                        <div class="card about-block">
                                            <div class="card-body p-3 block-right-one" id="home-tab">
                                                <h5>About <?= ucfirst($user['firstName']) ?></h5>
                                                <h6 class="mb-3 mt-4"><?= isset($userAboutMe->short_description) ? $userAboutMe->short_description : '' ?></h6>
                                                <p><?= isset($userAboutMe->long_description) ? $userAboutMe->long_description:'' ?></p>
                                                <h6 class="font-italic">Areas of expertise...</h6>
                                                <div class=" area-of-expertise-block d-inline-block">
                                                    <ul class="list-unstyled mb-0">
                                                        <?php
                                                        foreach ($userAreasOfSpecialty as $userArea) {
                                                            if (!empty($userArea->area_of_specialty_id) && $userArea->area_of_specialty_id != "") {
                                                                ?>
                                                                <li><i class="fas fa-circle"></i><?= $userArea->name ?></li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                        <!--<li><i class="fas fa-circle"></i>Credit Repair</li>
                                        <li><i class="fas fa-circle"></i>Student Loans</li>
                                        <li><i class="fas fa-circle"></i>Debt Consolidation</li>
                                        <li><i class="fas fa-circle"></i>Consumer Credit Counseling</li>
                                        <li><i class="fas fa-circle"></i>Collections</li>
                                        <li><i class="fas fa-circle"></i>Charge Offs</li>-->
                                                    </ul>
                                                </div>
                                                <!--<div class="d-inline-block">
                                                    <ul class="list-unstyled mb-0">
                                                        <li><i class="fas fa-circle"></i>Credit Repair</li>
                                                        <li><i class="fas fa-circle"></i>Student Loans</li>
                                                        <li><i class="fas fa-circle"></i>Debt Consolidation</li>
                                                        <li><i class="fas fa-circle"></i>Consumer Credit Counseling</li>
                                                        <li><i class="fas fa-circle"></i>Collections</li>
                                                        <li><i class="fas fa-circle"></i>Charge Offs</li>
                                                    </ul>
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="card mt-3 fee-payments-block" id="Fees">
                                            <div class="card-body p-3" id="contact-tab">
                                                <div class="row">
                                                    <div class="col-md-11 head-top d-flex justify-content-between">
                                                        <h5>Fees and payments</h5>
                                                        <div><span>Accepts:</span>Cash, Check, Visa, Mastercard and Discover</div>
                                                    </div>
                                                    <div class="col-md-10 payments-block-bottom">
                                                        <?php
                                                        foreach ($userFees as $userFee) {
                                                            ?>
                                                            <div class="d-flex justify-content-between"><label><?= $userFee->feeTypeName ?> / <?= $userFee->billingTypeName ?></label> <span>$<?= $userFee->amount ?></span></div>
                                                            <?php
                                                        }
                                                        ?>
                                                <!--<div class="d-flex justify-content-between"><label>Credit Analysis / 30 Minute Consultation</label> <span>Free</span></div>
                                                <div class="d-flex justify-content-between"><label>Signup and audit fee</label> <span>$129.00</span></div>
                                                <div class="d-flex justify-content-between"><label>Collections: Per item - Per bureau</label> <span>$50.00</span></div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-3 map-block" id="Contact">
                                            <div class="card-body" id="contact-tab2">
                                                <div class="col-md-12 p-0">
                                                    <h5>Contact Pauline</h5>
                                                </div>
                                                <div class="col-md-12 p-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="gmap_canvas">
                                                                <iframe width="335" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 map-right-block">
                                                            <div class="addres-block">
                                                                <?= isset($userCompanyProfile->address1) ? "<label>{$userCompanyProfile->address1}</label>":'' ?>
                                                                <?= isset($userCompanyProfile->city) ? "<label>{$userCompanyProfile->city}</label>":'' ?>
                                                                <?= isset($userCompanyProfile->public_phone) ? "<label><b>{$userCompanyProfile->public_phone}</b></label>":'' ?>
                                                            </div>
                                                            <div class="social-block">
                                                                <ul class="list-unstyled mb-0">
                                                                    <?php
                                                                    if (!empty($userCompanyProfile->facebook_url) || $userCompanyProfile->facebook_url != "") {
                                                                        ?>
                                                                        <li><a href="<?= $userCompanyProfile->facebook_url ?>"><i class="fab fa-facebook-square"></i></a></li>
                                                                        <?php
                                                                    }
                                                                    if (!empty($userCompanyProfile->twitter_url) || $userCompanyProfile->twitter_url != "") {
                                                                        ?>
                                                                        <li><a href="<?= $userCompanyProfile->twitter_url ?>"><i class="fab fa-twitter-square"></i></a></li>
                                                                        <?php
                                                                    }
                                                                    if (!empty($userCompanyProfile->linkedin_url) || $userCompanyProfile->linkedin_url != "") {
                                                                        ?>
                                                                        <li><a href="<?= $userCompanyProfile->linkedin_url ?>"><i class="fab fa-linkedin"></i></a></li>
                                                                        <?php
                                                                    }
                                                                    if (!empty($userCompanyProfile->instagram_url) || $userCompanyProfile->instagram_url != "") {
                                                                        ?>
                                                                        <li><a href="<?= $userCompanyProfile->instagram_url ?>"><i class="fab fa-instagram"></i></a></li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <?php
                                                            if (!empty($userCompanyProfile->website_url) || $userCompanyProfile->website_url != "") {
                                                                ?>
                                                                <div class="site-link-block">
                                                                    <span class="btn-block">Website</span>
                                                                    <span class="btn-block mt-0"><a href="<?= $userCompanyProfile->website_url ?>"><?= $userCompanyProfile->website_url ?></a></span>
                                                                </div>
                                                                <?php
                                                            }
                                                            if (!empty($userCompanyProfile->public_phone) || $userCompanyProfile->public_phone != "") {
                                                                ?>
                                                                <div class="map-button-block">
                                                                    <button type="button" class="btn btn-primary btn-block">Send Pauline a message</button>
                                                                    <button type="button" class="btn btn-primary btn-block">Call <?= $userCompanyProfile->public_phone ?></button>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-3 reviews-block" id="Reviews">
                                            <div class="card-body" id="contact-tab3">
                                                <div class="col-md-12 review-block-top d-block d-sm-flex justify-content-between align-items-center">
                                                    <div class="d-block d-sm-flex align-items-center">
                                                        <h5 class="m-0">Reviews</h5>
                                                        <div class="ml-4 review-star-text">
                                                            <span class="rating-block mr-3">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </span>
                                                            <span>see all 32 reviews</span>
                                                        </div>
                                                    </div>
                                                    <div class="button-block">
                                                        <button type="button" class="btn btn-secondary">Leave a review</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 review-block-bottom">
                                                    <div class="row">
                                                        <div class="col-md-3 review-left review-inner-block">
                                                            <span class="rating-block">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </span>
                                                            <div>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li>By <span>Raymond C.</span></li>
                                                                    <li><span>Atlanta, GA</span></li>
                                                                    <li>February 1, 2019</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 review-right review-inner-block">
                                                            <h5>Excellent response and service!</h5>
                                                            <p>Ron helped my family with a NJ State Tax Audit. He was able to settle the case
                                                                for almost half of the State's Audit . This was a seven figure audit that lasted
                                                                for over 5 years. He was extremely knowledgeable and professional. He was
                                                                also very patient with all parties involved to get the case settled in a fair ...<a href="#">more</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-3 endorsements-block" id="QA">
                                            <div class="card-body" id="contact-tab4">
                                                <div class="col-md-12 top-block d-block d-sm-flex justify-content-between align-items-center p-0">
                                                    <h5 class="m-0">Professional endorsements</h5>
                                                    <div class="ml-4">
                                                        (<span>read all 6 endorsements</span>)
                                                    </div>
                                                    <div class="button-block">
                                                        <button type="button" class="btn btn-secondary">Endorse Pauline</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 bottom-block p-0">
                                                    <div class="row">
                                                        <div class="col-md-3 endorsements-left endorsements-inner-block">
                                                            <div>
                                                                <img src="<?php echo base_url(); ?>assets/images/head-shot.jpg" class="align-self-start mr-3" alt="...">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 endorsements-right endorsements-inner-block">
                                                            <div class="d-flex">
                                                                <h6><a href="#">Raymond McMillan</a></h6> <span class="ml-2">on February 1, 2019</span>
                                                            </div>
                                                            <p>Seymour has always been a fierce and public advocate for the financially
                                                                destitute. While as a debt collection attorney, that often pit us at odds, we
                                                                were always civil, professional and creative. I endorse him as an advocate
                                                                and an important tool to those who feel they have no more options financially.
                                                                <a href="#">more</a>
                                                            </p>
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
    </div>
</main>
<script src="https://code.jquery.com/jquery-migrate-git.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.sticky.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/sticky-sidebar.js" type="text/javascript"></script>
<script>
    $('.modal').scroll(function () {
        var sideBarHeight = $('#sticky_sidebar').offset();
        if (sideBarHeight.top < 250) {
            $('.modal-dialog').addClass('fixed_modal');
            $('.tab-content').addClass('scroll-div');
        }
    });
    
    $('.tab-content').scroll(function () {
        var offsetHighlightVal = 300; 
        var tabContentHeight = $(".about-block").offset();
        if (tabContentHeight.top > 270) {
            $('.modal-dialog').removeClass('fixed_modal');
            $('.tab-content').removeClass('scroll-div');
        }
        var feepaymentHeight = $(".fee-payments-block").offset();
        var mapHeight = $(".map-block").offset();
        var reviewHeight = $(".reviews-block").offset();
        var qaHeight = $(".endorsements-block").offset();
        
        if (feepaymentHeight.top < offsetHighlightVal) {
            $('.nav-item.active').each(function () {
                $(this).removeClass('active');
            });
            $('.fees_tab').addClass('active');
            
            if (qaHeight.top < offsetHighlightVal) {
                $('.nav-item.active').each(function () {
                    $(this).removeClass('active');
                });
                $('.qa_tab').addClass('active');
            } else if (reviewHeight.top < offsetHighlightVal) {
                $('.nav-item.active').each(function () {
                    $(this).removeClass('active');
                });
                $('.review_tab').addClass('active');
                
            } else if (mapHeight.top < offsetHighlightVal) {
                $('.nav-item.active').each(function () {
                    $(this).removeClass('active');
                });
                $('.contact_tab').addClass('active');
            }
        } else {
            $('.nav-item.active').each(function () {
                $(this).removeClass('active');
            });
            $('.home_tab').addClass('active');
        }
    });
</script>
