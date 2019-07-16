<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/star-rating/css/star-rating.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/star-rating/themes/krajee-uni/theme.min.css">
<main class="specia-pro-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-3"><?= $user['firstName'] . " " . $user['lastName'] ?> - Leave an endorsement</h1>
                <div class="row sidebar_stop">
                    <div class="col-md-4 left-col-block" id="sticky_sidebar">
                        <div class="sidebar__inner">
                            <div class="card border-0 shadow_card bg-light">
                                <div class="card-body p-2 btn-default border-r-1">
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
                                            <?php
                                            if (isset($userProfile->reviewCount) && $userProfile->reviewCount != 0) {
                                                ?>
                                                <div class="review-block">
															<span class="rating-block">
                                                                <?php
                                                                for ($i = 1; $i <= 5; $i++) {
                                                                    ?>
                                                                    <i class="<?= ($i <= $userProfile->avgRating ? 'fas' : 'far') ?> fa-star"></i>
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
                                                <p><?= isset($userProfile->city) ? $userProfile->city : '' ?>
                                                    , <?= isset($userProfile->state_abbr) ? $userProfile->state_abbr : '' ?></p>
                                            </div>
                                            <a href="<?= base_url() . 'view-specialist-profile/' . $user['firstName'] . "-" . $user['lastName'] ?>">
                                                View full profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 right-col-block mb-5">
                        <div class="card border-0 shadow_card bg-light" id="sticky_main_panel">
                            <div class="card-body p-0">
                                <div class="tab-content bg-light p-2" id="myTabContent">
                                    <div class="media">
                                        <div class="media-body ">
                                            <div class="card about-block p-2">
                                                <?php
                                                if (isset($not_able_to_review) && $not_able_to_review == true) {
                                                    ?>
                                                    <div class="popup-head">
                                                        <h5 class="mt-0">You can't give a endorsement.</h5>
                                                    </div>
                                                    <?php
                                                } elseif (isset($userProfile->endorsementId) && $userProfile->endorsementId != 0) {
                                                    ?>
                                                    <div class="popup-head">
                                                        <h5 class="mt-0">You have already given endorsement
                                                            to <?= ucfirst($user['firstName']) ?>.</h5>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <form id="review_form" method="post" action="<?= base_url() ?>home/endorse_details_save">
                                                        <div class="form-group">
                                                            <input type="hidden" name="rating_for" id="rating_for"
                                                                   value="<?= $user['userId'] ?>"/>
                                                            <input type="hidden" name="is_page" value="true" />
                                                            <h6 class="txtarea-all-details"><b>Write your
                                                                    endorsement</b></h6>
                                                            <label for="contact_message" class="float-right"
                                                                   id="contact_message_lable">2000</label>
                                                            <textarea class="form-control" id="contact_message"
                                                                      name="wright_review"
                                                                      onkeyup="countTextWord(this)" rows="3"></textarea>
                                                            <div class="error contact_message_lable_error clr-red"></div>
                                                        </div>
                                                        <button type="submit" id="submit-message_form"
                                                                class="btn btn-primary">
                                                            Submit endorsement
                                                        </button>
                                                    </form>
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
</main>
<script>
    <?php
    $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    ?>
    $("#review_form").validate({
        rules: {
            wright_review: {
                required: true
            }
        }
    });
    $("#review_form").submit(function (e) {
        if ($("#review_form").valid()) {
            return true;
        }
        return false;
    });

    function countTextWord(a) {
        var txtlennospace = 2000 - $(a).val().replace(/\s+/g, '').length;
        if (txtlennospace < 0) {
            $('.contact_message_lable_error').text('Max length ' + 2000 + ' characters only!');
            $('#submit-message_form').prop('disabled', 'disabled');
            $('#contact_message_lable').text(0);
        } else {
            $('.contact_message_lable_error').text('');
            $('#submit-message_form').prop('disabled', false);
            $('#contact_message_lable').text(txtlennospace);
        }
    }
</script>
<!--  [Script Section] Ends -->