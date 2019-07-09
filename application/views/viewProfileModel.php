<style>
    #profilePopup .fixed_modal {
        position: fixed;
        top: -110px;
        width: 100%;
    }

    .tab-content.scroll-div {
        overflow-y: auto;
        height: 90vh;
    }
    
    @media (min-width: 1280px) {
        #profilePopup .fixed_modal {
            left: 0%;
        }
    }
    
    @media (min-width: 1360px) {
        #profilePopup .fixed_modal {
            left: 3%;
        }
    }
    
    @media (min-width: 1440px) {
        #profilePopup .fixed_modal {
            left: 6%;
        }
    }
    
    @media (min-width: 1920px) {
        #profilePopup .fixed_modal {
            left: 19%;
        }
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
                            <div class="card border-0 shadow_card bg-light">
                                <div class="card-body p-2">
                                    <div class="media">
                                        <div class="profile-user-img">
                                            <?php
                                            if (isset($user['profile_image'])) {
                                                ?>
                                                <img class="round align-self-start mr-3" id='profile-image' width="136"
                                                     height="136" src="<?= base_url() . $user['profile_image']; ?>">
                                                     <?php
                                                 } else {
                                                     ?>
                                                <img class="round align-self-start mr-3" id='profile-image' width="136"
                                                     height="136"
                                                     avatar="<?= ucfirst($user['firstName']) . ' ' . ucfirst($user['lastName']) ?>">
                                                     <?php
                                                 }
                                                 ?>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0"><?= $user['firstName'] . " " . $user['lastName'] ?></h5>
                                            <?php
                                            if(isset($userProfile->reviewCount) && $userProfile->reviewCount != 0){
                                                ?>
                                                <div class="review-block">
															<span class="rating-block">
                                                                <?php
                                                                for ($i=1;$i <= 5 ; $i++){
                                                                    ?>
                                                                    <i class="<?= ($i<=$userProfile->avgRating ? 'fas' : 'far') ?> fa-star"></i>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </span>
                                                    <span><?= $userProfile->reviewCount ?> Reviews</span>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <div class="profile-add mt-2">
                                                <h6 class="mb-1"><?= isset($userProfile->company_name) ? $userProfile->company_name : '' ?></h6>
                                                <p><?= isset($userProfile->city) ? $userProfile->city : '' ?>, <?= isset($userProfile->state_abbr) ? $userProfile->state_abbr : '' ?></p>
                                            </div>
                                            <button type="button" class="btn btn-primary"><i
                                                    class="fas fa-envelope"></i>Send a Message
                                            </button>
                                        </div>
                                    </div>
                                    <div class="profile-bottom p-3">
                                        <div class="profile-bot-top d-flex justify-content-between">
                                            <div class="pro-midd-left">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="text-uppercase"><i class="fas fa-wifi"></i>Online</li>
                                                    <li class="text-capitalize"><i class="fas fa-bookmark"></i>Unsave
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prof-midd-right">
                                                <ul class="list-unstyled mb-0">
                                                    <li><?= isset($userProfile->offersFreeConsultations) && $userProfile->offersFreeConsultations == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle clr-red"></i>' ?>
                                                        Free consultations
                                                    </li>
                                                    <?php
                                                    if (!empty($userProfile->scheduling_url)) {
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo $userProfile->scheduling_url; ?>"><i
                                                                    class="far fa-calendar-alt"></i>Schedule an
                                                                appointment</a></li>
                                                        <?php
                                                    }
                                                    if (!empty($userProfile->public_phone)) {
                                                        ?>
                                                        <li>
                                                            <i class="fas fa-phone"></i><?= $userProfile->public_phone ?>
                                                        </li>
                                                        <?php
                                                    }
                                                    if (!empty($userProfile->website_url)) {
                                                        ?>
                                                        <li><a href="<?php echo $userProfile->website_url; ?>"><i
                                                                    class="fas fa-external-link-alt"></i>Website</a>
                                                        </li>
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
                                        <a class="nav-link" href="#About" aria-selected="true"><span>About</span></a>
                                    </li>
                                    <li class="nav-item fees_tab">
                                        <a class="nav-link" href="#Fees" aria-selected="false"><span>Fees</span></a>
                                    </li>
                                    <li class="nav-item contact_tab">
                                        <a class="nav-link" href="#Contact"
                                           aria-selected="false"><span>Contact</span></a>
                                    </li>
                                    <li class="nav-item review_tab">
                                        <a class="nav-link" href="#Reviews"
                                           aria-selected="false"><span>Reviews</span></a>
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
                                                <h6 class="mb-3 mt-4"><?= isset($userProfile->short_description) ? $userProfile->short_description : '' ?></h6>
                                                <p><?= isset($userProfile->long_description) ? $userProfile->long_description : '' ?></p>
                                                <h6 class="font-italic">Areas of expertise...</h6>
                                                <div class=" area-of-expertise-block d-inline-block">
                                                    <ul class="list-unstyled mb-0">
                                                        <?php
                                                        foreach ($userAreasOfSpecialty as $userArea) {
                                                            if (!empty($userArea->area_of_specialty_id) && $userArea->area_of_specialty_id != "") {
                                                                ?>
                                                                <li><i class="fas fa-circle"></i><?= $userArea->name ?>
                                                                </li>
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
                                                        <div><span>Accepts:</span>Cash, Check, Visa, Mastercard and
                                                            Discover
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 payments-block-bottom">
                                                        <?php
                                                        foreach ($userFees as $userFee) {
                                                            ?>
                                                            <div class="d-flex justify-content-between">
                                                                <label><?= $userFee->feeTypeName ?>
                                                                    / <?= $userFee->billingTypeName ?></label>
                                                                <span>$<?= $userFee->amount ?></span></div>
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
                                                                <iframe width="335" height="300" id="gmap_canvas"
                                                                        src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                                        frameborder="0" scrolling="no" marginheight="0"
                                                                        marginwidth="0"></iframe>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 map-right-block">
                                                            <div class="addres-block">
                                                                <?= isset($userCompanyProfile->address1) ? "<label>{$userCompanyProfile->address1}</label>" : '' ?>
                                                                <?= isset($userProfile->city) ? "<label>{$userProfile->city},</label>":'' ?><?= isset($userProfile->state_name) ? "<label>{$userProfile->state_name}</label>":'' ?>
                                                                <?= isset($userCompanyProfile->public_phone) ? "<label><b>{$userCompanyProfile->public_phone}</b></label>" : '' ?>
                                                            </div>
                                                            <div class="social-block">
                                                                <ul class="list-unstyled mb-0">
                                                                    <?php
                                                                    if (!empty($userProfile->facebook_url) || $userProfile->facebook_url != "") {
                                                                        ?>
                                                                        <li>
                                                                            <a href="<?= $userProfile->facebook_url ?>"><i
                                                                                    class="fab fa-facebook-square"></i></a>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                    if (!empty($userProfile->twitter_url) || $userProfile->twitter_url != "") {
                                                                        ?>
                                                                        <li>
                                                                            <a href="<?= $userProfile->twitter_url ?>"><i
                                                                                    class="fab fa-twitter-square"></i></a>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                    if (!empty($userProfile->linkedin_url) || $userProfile->linkedin_url != "") {
                                                                        ?>
                                                                        <li>
                                                                            <a href="<?= $userProfile->linkedin_url ?>"><i
                                                                                    class="fab fa-linkedin"></i></a>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                    if (!empty($userProfile->instagram_url) || $userProfile->instagram_url != "") {
                                                                        ?>
                                                                        <li>
                                                                            <a href="<?= $userProfile->instagram_url ?>"><i
                                                                                    class="fab fa-instagram"></i></a>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <?php
                                                            if (!empty($userProfile->website_url) || $userProfile->website_url != "") {
                                                                ?>
                                                                <div class="site-link-block">
                                                                    <span class="btn-block">Website</span>
                                                                    <span class="btn-block mt-0"><a
                                                                            href="<?= $userProfile->website_url ?>"><?= $userProfile->website_url ?></a></span>
                                                                </div>
                                                                <?php
                                                            }
                                                            if (!empty($userProfile->public_phone) || $userProfile->public_phone != "") {
                                                                ?>
                                                                <div class="map-button-block">
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-block">Send <?= ucfirst($user['firstName']) ?> a message
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-block">
                                                                        Call <?= $userProfile->public_phone ?></button>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-3 review-block" id="Reviews">
                                            <div class="card-body" id="contact-tab3">
                                                <div class="col-md-12 review-block-top d-block d-sm-flex justify-content-between align-items-center">
                                                    <div class="d-block d-sm-flex align-items-center">
                                                        <h5 class="m-0">Reviews</h5>
                                                        <?php
                                                        if(isset($userProfile->reviewCount) && $userProfile->reviewCount != 0){
                                                            ?>
                                                            <div class="ml-4 review-star-text">
                                                                    <span class="rating-block mr-3">
                                                                        <?php
                                                                        for ($i=1;$i <= 5 ; $i++){
                                                                            ?>
                                                                            <i class="<?= ($i<=$userProfile->avgRating ? 'fas' : 'far') ?> fa-star"></i>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </span>
                                                                <span>see all <?= $userProfile->reviewCount ?> reviews</span>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                    if(isset($_SESSION['user']['userId']) && $_SESSION['user']['180creditUserType'] == 2 && $userProfile->reviewId == 0){
                                                        ?>
                                                        <div class="button-block">
                                                            <button type="button" class="btn btn-secondary" onclick="viewProfileModalHandler.openReviewModal('<?= $user['userId']; ?>','<?= $user['firstName'].' '.$user['lastName']; ?>')"><?= isset($userProfile->reviewCount) && $userProfile->reviewCount != 0 ? 'Leave a review' : 'Be the first to leave a review'; ?></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                                if($userProfile->reviewCount != 0){
                                                    ?>
                                                    <div class="col-md-12 review-block-bottom">
                                                        <?php
                                                        foreach ($reviewAllDetails as $reviewDetail){
                                                            if($reviewDetail->review_type == 1){
                                                                ?>
                                                                <div class="row my-3">
                                                                    <div class="col-md-3 review-left review-inner-block">
                                                                        <span class="rating-block">
                                                                            <?php
                                                                            for ($i=1;$i <= 5 ; $i++){
                                                                                ?>
                                                                                <i class="<?= ($i<=$reviewDetail->rating ? 'fas' : 'far') ?> fa-star"></i>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </span>
                                                                        <div>
                                                                            <ul class="list-unstyled mb-0">
                                                                                <li>By <span><?= ucfirst($reviewDetail->firstName).' '.ucfirst($reviewDetail->lastName[0]).'.' ?></span></li>
                                                                                <li><?= date('F j, Y',strtotime($reviewDetail->created_on)) ?></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-9 review-right review-inner-block">
                                                                        <h5><?= $reviewDetail->headline ?></h5>
                                                                        <p class="more"><?= $reviewDetail->description ?></p>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="col-md-12 review-block-bottom">
                                                        <p class="text-center">There is no review.</p>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="card mt-3 endorsements-block"  id="QA">
                                            <div class="card-body" id="contact-tab4">
                                                <div class="col-md-12 top-block d-block d-sm-flex justify-content-between align-items-center p-0">
                                                    <h5 class="m-0">Professional endorsements</h5>
                                                    <?php
                                                    if(isset($userProfile->endorsementCount) && $userProfile->endorsementCount != 0){
                                                        ?>
                                                        <div class="ml-4">
                                                            (<span>read all <?= $userProfile->endorsementCount ?> endorsements</span>)
                                                        </div>
                                                        <?php
                                                    }
                                                    if(isset($_SESSION['user']['userId']) && $_SESSION['user']['180creditUserType'] == 1  && $userProfile->endorsementId == 0){
                                                        ?>
                                                        <div class="button-block">
                                                            <button type="button" class="btn btn-secondary" onclick="viewProfileModalHandler.openEndorseModal('<?= $user['userId']; ?>','<?= $user['firstName'].' '.$user['lastName']; ?>')"><?= isset($userProfile->endorsementCount) && $userProfile->endorsementCount != 0 ? 'Endorse '.$user['firstName'] : 'Be the first to endorse '.$user['firstName']; ?></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-12 bottom-block p-0">
                                                    <?php
                                                    if(isset($userProfile->endorsementCount) && $userProfile->endorsementCount != 0){
                                                        foreach ($reviewAllDetails as $reviewDetail){
                                                            if($reviewDetail->review_type == 2){
                                                                ?>
                                                                <div class="row my-3">
                                                                    <div class="col-md-3 endorsements-left endorsements-inner-block">
                                                                        <div>
                                                                            <?php
                                                                            if(isset($user['profile_image'])){
                                                                                ?>
                                                                                <img class="align-self-start mr-3 round" id='profile-image' width="136" height="136" src="<?= base_url().$reviewDetail->profile_image; ?>">
                                                                                <?php
                                                                            }
                                                                            else{
                                                                                ?>
                                                                                <img class="align-self-start mr-3 round" id='profile-image' width="136" height="136" avatar="<?= ucfirst($reviewDetail->firstName).' '.ucfirst($reviewDetail->lastName) ?>">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-9 endorsements-right endorsements-inner-block">
                                                                        <div class="d-flex">
                                                                            <h6><a href="<?= base_url().'view-specialist-profile/'.ucfirst($reviewDetail->firstName).'-'.ucfirst($reviewDetail->lastName);  ?>"><?= ucfirst($reviewDetail->firstName).' '.ucfirst($reviewDetail->lastName) ?></a></h6> <span class="ml-2">on <?= date('F j, Y',strtotime($reviewDetail->created_on)) ?></span>
                                                                        </div>
                                                                        <p class="more"><?= $reviewDetail->description ?></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    }else{
                                                        ?>
                                                        <div class="col-md-12 review-block-bottom">
                                                            <p class="text-center">There is no professional endorsements.</p>
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
            </div>
        </div>
    </div>
</main>
<div class="modal exampleModal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-0 border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-migrate-git.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.sticky.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/sticky-sidebar.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.js"></script>
<script>

   $('.home_tab').click(function () {
        scrollTo("about-block");
        $(this).addClass("active");
   });

   $('.fees_tab').click(function () {
        scrollTo("fee-payments-block");
        $(this).addClass("active");
   });

   $('.contact_tab').click(function () {
        scrollTo("map-block");
        $(this).addClass("active");
   });

   $('.review_tab').click(function () {
        scrollTo("reviews-block");
        $(this).addClass("active");
   });

   $('.qa_tab').click(function () {
        scrollTo("endorsements-block");
        $(this).addClass("active");
   });
   $(document).ready(function() {
       // Configure/customize these variables.
       var showChar = 400;  // How many characters are shown by default
       var ellipsestext = "...";
       var moretext = "Show more";
       var lesstext = "Show less";


       $('.more').each(function() {
           var content = $(this).html();

           if(content.length > showChar) {

               var c = content.substr(0, showChar);
               var h = content.substr(showChar, content.length - showChar);

               var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

               $(this).html(html);
           }

       });

       $(".morelink").click(function(){
           if($(this).hasClass("less")) {
               $(this).removeClass("less");
               $(this).html(moretext);
           } else {
               $(this).addClass("less");
               $(this).html(lesstext);
           }
           $(this).parent().prev().toggle();
           $(this).prev().toggle();
           return false;
       });
   });
   var viewProfileModalHandler = {
       openReviewModal : function (userId,name) {
           var html = '<div class="media">\n' +
               '                    <div class="media-body">\n' +
               '                        <div class="popup-head">\n' +
               '                            <h5 class="mt-0">Leave a review for '+ name +'</h5>\n' +
               '                        </div>\n' +
               '                        <form id="review_form" method="post">\n' +
               '                            <div class="form-group" >\n' +
               '                                <h6><b>Overall rating</b></h6>' +
               '                                <div style="display:inline-block;" id="rateYo"></div>\n' +
               '<input type="hidden" name="rating" id="rating_input"/><input type="hidden" name="rating_for" id="rating_for" value="'+userId+'" />\n' +
               '                            </div>\n' +
               '                            <div class="form-group" >\n' +
               '                                <h6><b>Add a headline</b></h6>' +
               '                                <input type="text" class="form-control" id="review_headline" name="review_headline" placeholder="">\n' +
               '                            </div>\n' +
               '                            <div class="form-group">\n' +
               '                                <h6 class="txtarea-all-details"><b>Wright your review</b></h6>' +
               '                                <label for="contact_message" id="contact_message_lable">2000</label>\n' +
               '                                <textarea class="form-control" id="contact_message" name="wright_review" onkeyup="countTextWord(this)" rows="3"></textarea>\n' +
               '<div class="error contact_message_lable_error clr-red"></div>' +
               '                            </div>\n' +
               '                            <button type="submit" id="submit-message_form" class="btn btn-primary">Submit review</button>\n' +
               '                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>\n' +
               '                        </form>\n' +
               '                    </div>\n' +
               '                </div>';


           $('#btn-rating-input').on('click', function () {
               $inp.rating('refresh', {
                   showClear: true,
                   disabled: !$inp.attr('disabled')
               });
           });

           $('#modalReview .modal-body').html(html);
           $('#modalReview').modal('show');
           $('#modalReview').on('shown.bs.modal', function() {
               $("#rateYo").rateYo({
                   halfStar:false,
                   fullStar: true,
                   onSet: function (rating, rateYoInstance) {
                       rating = Math.ceil(rating);
                       $('#rating_input').val(rating);//setting up rating value to hidden field
                   }
               });
               $("#review_form").validate({
                   rules: {
                       // simple rule, converted to {required:true}
                       // compound rule
                       review_headline: {
                           required: true
                       },
                       wright_review: {
                           required: true
                       }
                   }
               });
               $("#review_form").submit(function (e) {
                   if($("#review_form").valid()){
                       e.preventDefault();
                       // $("#review_form").submit();
                       $.post('<?php echo base_url(); ?>home/review_details_save',$("#review_form").serialize(),function (result) {
                           if(result){
                               viewProfileModalHandler.openSaveReviewModal(name);
                           }
                       })
                   }
               });
           });
       },
       openEndorseModal : function (userId,name) {
           var html = '<div class="media">\n' +
               '                    <div class="media-body">\n' +
               '                        <div class="popup-head">\n' +
               '                            <h5 class="mt-0">Leave a review for '+ name +'</h5>\n' +
               '                        </div>\n' +
               '                        <form id="review_form" method="post">\n' +
               '                            <div class="form-group">\n' +
               '<input type="hidden" name="rating_for" id="rating_for" value="'+userId+'" />' +
               '                                <h6 class="txtarea-all-details"><b>Wright your endorsement</b></h6>' +
               '                                <label for="contact_message" id="contact_message_lable">2000</label>\n' +
               '                                <textarea class="form-control" id="contact_message" name="wright_review" onkeyup="countTextWord(this)" rows="3"></textarea>\n' +
               '<div class="error contact_message_lable_error clr-red"></div>' +
               '                            </div>\n' +
               '                            <button type="submit" id="submit-message_form" class="btn btn-primary">Submit endorsement</button>\n' +
               '                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>\n' +
               '                        </form>\n' +
               '                    </div>\n' +
               '                </div>';
           $('#modalReview .modal-body').html(html);
           $('#modalReview').modal('show');
           $('#modalReview').on('shown.bs.modal', function() {
               $("#review_form").validate({
                   rules: {
                       // simple rule, converted to {required:true}
                       // compound rule
                       review_headline: {
                           required: true
                       },
                       wright_review: {
                           required: true
                       }
                   }
               });
               $("#review_form").submit(function (e) {
                   if($("#review_form").valid()){
                       // $("#review_form").submit();
                       e.preventDefault();
                       // $("#review_form").submit();
                       $.post('<?php echo base_url(); ?>home/endorse_details_save',$("#review_form").serialize(),function (result) {
                           if(result){
                               viewProfileModalHandler.openSaveEndorseModal(name);
                           }
                       })
                   }
               });
           });
       },
       openSaveReviewModal : function (name) {
           var html = '<div class="media">\n' +
               '                    <div class="media-body">\n' +
               '                        <div class="popup-head text-center">\n' +
               '                            <h5 class="mt-0">Thank you, your review for '+ name +' has been submitted!</h5>\n' +
               '                            <p class="text-justify mb-1">' +
               'Although we do not censor reviews, all submissions are reviewed by our customer service team to ensure that inappropriate content and/or spam is not submitted.</p><p class="text-justify mb-1">Please allow up to 24 hours for your review to be posted publicly.</p>' +
               '                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>\n' +
               '                        </div>\n' +
               '                    </div>\n' +
               '                </div>';
           $('#modalReview .modal-body').html(html);
       },
       openSaveEndorseModal : function (name) {
           var html = '<div class="media">\n' +
               '                    <div class="media-body">\n' +
               '                        <div class="popup-head text-center">\n' +
               '                            <h5 class="mt-0">Thank you, your endorsement for '+ name +' has been submitted!</h5>\n' +
               '                            <p class="text-justify mb-1">' +
               'Although we do not censor endorsement, all submissions are reviewed by our customer service team to ensure that inappropriate content and/or spam is not submitted.</p><p class="text-justify mb-1">Please allow up to 24 hours for your endorsement to be posted publicly.</p>' +
               '                            <button type="button" class="btn btn-primary text-center" data-dismiss="modal">Close</button>\n' +
               '                        </div>\n' +
               '                    </div>\n' +
               '                </div>';
           $('#modalReview .modal-body').html(html);
       }
   };
   function scrollTo(id)
    {
        $('.modal').animate({scrollTop: $("."+id).offset().top},'slow');
        $("#myTab li").removeClass("active");
    }
//    $('.modal').scroll(function () {
//        var sideBarHeight = $('#sticky_sidebar').offset();
//        if (sideBarHeight.top < 250) {
//            $('.modal-dialog').addClass('fixed_modal');
//            $('.tab-content').addClass('scroll-div');
//        }
//    });
//
//    $('.tab-content').scroll(function () {
//        var offsetHighlightVal = 300;
//        var tabContentHeight = $(".about-block").offset();
//        console.log(tabContentHeight.top);
//        if (tabContentHeight.top > 70) {
//            $('.modal-dialog').removeClass('fixed_modal');
//            $('.tab-content').removeClass('scroll-div');
//        }
//        var feepaymentHeight = $(".fee-payments-block").offset();
//        var mapHeight = $(".map-block").offset();
//        var reviewHeight = $(".reviews-block").offset();
//        var qaHeight = $(".endorsements-block").offset();
//
//        if (feepaymentHeight.top < offsetHighlightVal) {
//            $('.nav-item.active').each(function () {
//                $(this).removeClass('active');
//            });
//            $('.fees_tab').addClass('active');
//
//            if (qaHeight.top < offsetHighlightVal) {
//                $('.nav-item.active').each(function () {
//                    $(this).removeClass('active');
//                });
//                $('.qa_tab').addClass('active');
//            } else if (reviewHeight.top < offsetHighlightVal) {
//                $('.nav-item.active').each(function () {
//                    $(this).removeClass('active');
//                });
//                $('.review_tab').addClass('active');
//
//            } else if (mapHeight.top < offsetHighlightVal) {
//                $('.nav-item.active').each(function () {
//                    $(this).removeClass('active');
//                });
//                $('.contact_tab').addClass('active');
//            }
//        } else {
//            $('.nav-item.active').each(function () {
//                $(this).removeClass('active');
//            });
//            $('.home_tab').addClass('active');
//        }
//    });
</script>
