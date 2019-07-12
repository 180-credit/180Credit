<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/star-rating/css/star-rating.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/star-rating/themes/krajee-uni/theme.min.css">
<main class="specia-pro-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-3"><?= $user['firstName'] . " " . $user['lastName'] ?> - Send a message</h1>
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
                                            <button type="button" class="btn btn-primary"
                                                    onclick="window.location.href='<?= base_url() . 'view-specialist-profile/' . $user['firstName'] . "-" . $user['lastName'] ?>'">
                                                View full profile
                                            </button>
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
                                    <div class="media ">
                                        <div class="img-status">
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
                                            <span class="status online"></span>
                                            </div>
                                        <div class="media-body">
                                            <form id="message_form">
                                            <div class="form-group">
                                                <h7 class="txtarea-all-details">Use the form below to send Paul a message. We’ll notify you as soon as they respond!</h7>
                                                    <label for="contact_message" class="float-right" id="contact_message_lable">2000</label>
                                                    <textarea class="form-control" id="contact_message" name="contact_message" onkeyup="countTextWord(this)" rows="3"></textarea>
                                                    <div class="error contact_message_lable_error clr-red"></div>
                                                    </div>
                                                <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="prefer_on_phone" name="prefer_on_phone">
                                                <label class="custom-control-label" for="prefer_on_phone">I prefer that Paul responds to this message with a phone call. (optional)</label>
                                                </div>
                                                <div class="form-group cell-no" style="display: none;">
                                                    <input type="text" class="form-control" id="phone_no_message" name="phone_no_message" placeholder="US phone numbers only">
                                                    </div>
                                                <div class="best-call" style="display: none;">
                                                    <label>Best time to call:</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input " name="time_slot_message" id="customControlAutosizing2">
                                                        <label class="custom-control-label customControlAutosizing2" for="customControlAutosizing2">Morning (9-12) </label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="time_slot_message" id="customControlAutosizing3">
                                                        <label class="custom-control-label" for="customControlAutosizing3">Afternoon (12-4)</label>
                                                        </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="time_slot_message" id="customControlAutosizing4">
                                                        <label class="custom-control-label" for="customControlAutosizing4">Evening (5-9)</label>
                                                        </div>
                                                    </div>
                                                <button type="submit" id="submit-message_form" class="btn btn-primary">Save</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </form>
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
    $(document).ready(function () {
        // Configure/customize these variables.
        var showChar = 400;  // How many characters are shown by default
        var ellipsestext = "...";
        var moretext = "Show more";
        var lesstext = "Show less";


        $('.more').each(function () {
            var content = $(this).html();

            if (content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function () {
            if ($(this).hasClass("less")) {
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
    $('#prefer_on_phone').click(function () {
        if($(this).prop('checked') ==true){
            $(".cell-no").show();
            $(".best-call").show();
        }
        else
        {
            $(".cell-no").hide();
            $(".best-call").hide();
        }
    });
    $("#message_form").validate({
        rules: {
            // simple rule, converted to {required:true}
            // compound rule
            contact_message: {
                required: true
            },
            phone_no_message: {
                required: function (element) {
                    if ($("#prefer_on_phone").is(':checked')) {
                        return true;
                    } else {
                        return false;
                    }
                },
                number:true
            },
            time_slot_message: {
                required: function (element) {
                    if ($("#prefer_on_phone").is(':checked')) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") == "checkbox") {
                $($(element).parent("div").find("label")).append(error);
            }else {
                error.insertAfter(element);
            }
        }
    });
    $("#submit-message_form").click(function(){
        if($("#message_form").valid()){
            console.log("done");
            return false;
            // $("#consumer_form").submit();
        }
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