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
            <?php
            if(isset($error)){
                ?>
                <div class="alert alert-danger alert-dismissible mt-3">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $error ?>
                </div>
                <?php
            }
            if(isset($success)){
                ?>
                <div class="alert alert-success alert-dismissible mt-3">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $success ?>
                </div>
                <?php
            }
            ?>
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
                                <form id="filterForm">
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
                                            <button type="button" onclick="filterManagement.applyFilterData(1);" id="apply-filters" class="btn btn-primary text-white">Apply
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
                    <div class="card main_data_block">
                        <div class="card-header px-3">

                        </div>
                        <div class="card-body p-2 main_data">

                        </div>
                        <div class="pagination_block">

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>

</style>
<!-- Modal -->
<div class="modal exampleModal fade" id="profilePopup" role="dialog" aria-labelledby="exampleModal1Label" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="modal exampleModal fade" id="modelPrimium" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-modal="true">
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

<div class="modal exampleModal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-0 border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="login_form">
                    <div class="row justify-content-center my-3 py-3">
                        <div class="col-md-12">
                            <h4 class="text-center mb-3">Consumer access</h4>
                            <a onclick="return modalHandler.showRegistration();" class="btn btn-primary btn-block btn-icon envelope-btn position-relative btn-anchor"><i class="far fa-envelope"></i>Sign up with email</a>
                            <h6 class="text-center mt-3">or</h6>
                            <h5 class="text-center mb-4">Log in with email</h5>
                            <form autocomplete="off" id='consumer_form' method="post" action="<?= base_url(); ?>login/login_post" >
                                <input type="hidden" name="redirection_url" value="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="email address">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password">
                                </div>
                                <button type="button" id='submit-consumer' class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="register_form">
                    <div class="row justify-content-center my-3 py-3">
                        <div class="col-md-12">
                            <h4 class="mb-3">Create a consumer account</h4>
                            <p>Already have an account? <a href="javascript:;" onclick="return modalHandler.showLogin();" >Log in</a>.</p>
                            <form id="consumer_register_form" autocomplete="off" method="post" action="<?= base_url(); ?>login/signup_store">
                                <input type="hidden" name="redirection_url" value="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>">
                                <input type="hidden" name="user_type" value="2">
                                <div class="form-group">
                                    <label for="email">Enter your email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-row mt-4 mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="password">Create a password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="At least 8 charcters long">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="conf-password">Confirm password</label>
                                        <input type="password" class="form-control" name="conf_password" id="conf-password">
                                    </div>
                                    <label class="col-md-12 mt-3">Your Name</label>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="first_name" id="inputAddress1" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control"  name="last_name" id="inputAddress2" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" name="termscheck" class="form-check-input"  id="termscheck">
                                    <label class="form-check-label" for="termscheck">I have read and accept 180Credit’s <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></label>
                                </div>
                                <button type="button" id="submit-consumer_register" class="btn btn-primary btn-block">Save and continue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="wait" ><img src='<?php echo base_url(); ?>assets/images/loader.gif' /></div>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
<script>
    $('#specialities-dropdown').select2();
    $('#tags-dropdown').select2();
    <?php
        if(isset($_SESSION['user'])){
            $user = json_encode($_SESSION['user']);
            echo 'var user = JSON.parse(\''.$user.'\');';
        }
        else{
            echo 'var user = {};';
        }
    ?>
    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
    var currentUrl = window.location.href;
    var HistoryState = {};
    function showProfileModel(name){
        // if(user.userId){
            $('#profilePopup').modal('show');
            $('#profilePopup .modal-body').load('<?php echo base_url(); ?>view-specialist-profile/'+name+'?onlyHtml=true',function () {
                // Cache selectors
                var topMenu = $("#myTab"),
                    topMenuHeight = 245,
                    // All list items
                    menuItems = topMenu.find("a");

                // Bind click handler to menu items
                // so we can get a fancy scroll animation
                menuItems.click(function(e){
                    var href = $(this).attr("href"),
                        offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
                    $('#profilePopup .modal-body').stop().animate({
                        scrollTop: offsetTop
                    }, 850);
                    e.preventDefault();
                });
                LetterAvatar.transform();
            });
            var param = encodeURI(name);
            history.pushState(HistoryState, "User_profile",  "<?php echo base_url(); ?>view-specialist-profile/" + param);
        /*}
        else {
            modalHandler.showLogin();
        }*/
    }
    $('#profilePopup').on('hidden.bs.modal', function () {
        history.replaceState(HistoryState, "User_profile", currentUrl);
    })

    function jsUcfirst(string)
    {
        return string.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
    }
    function countChars(obj){
        document.getElementById("exampleFormControlTextarea1").innerHTML = obj.value.length+' characters';
    }
    var filterManagement ={
        applyCardHeader : function(data){
            let html = 'Displaying ';
            if(data.page == 1){
                html += '1-';
            }else {
                console.log(data.page,data.limit);
                html += (((data.page - 1) * data.limit) + 1)+'-';
            }
            html += (((data.page - 1) * data.limit) + data.paginationData.length )+' of '+data.total+' specialists found';
            return html;
        },
        applyHtmlData : function (data) {
            let html = '';
            if(data.paginationData.length){
                $.each(data.paginationData,function (k,v) {
                    html +='<div class="search-result-block">\n' +
                        '    <div class="premium-listing p-2">\n' +
                        '        <div class="media">\n' +
                        '            <a onclick="showProfileModel('+ ("'"+v.firstName+'-'+v.lastName+"'") + ')">';
                        if(v.profile_image){
                            html += '                <img class="round mr-3"  width="136" height="136" src="<?= base_url(); ?>'+v.profile_image+'">';
                        } else {
                            html += '                <img class="round mr-3" width="136" height="136" avatar="'+(jsUcfirst(v.firstName)+' '+jsUcfirst(v.lastName))+'">';
                        }
                    html += '            </a>\n' +
                        '            <div class="media-body">\n' +
                        '                <div class="row">\n' +
                        '                    <div class="col-md-6 puser-left">\n' +
                        '                        <h6><a  class="user_name" onclick="showProfileModel('+ ("'"+v.firstName+'-'+v.lastName+"'") + ')">'+(jsUcfirst(v.firstName)+' '+jsUcfirst(v.lastName))+'</a></h6>\n' +
                        '                        <div class="user-address">\n' +
                        '                            <h6 class="mb-0">'+jsUcfirst(v.company_name)+'</h6>\n' +
                        '                            <span>'+jsUcfirst(v.city)+', '+jsUcfirst(v.abbr)+'</span>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                    <div class="col-md-6 puser-right">\n' +
                        '                        <div class="puser-right-left">\n' +
                        '                            <div class="rating no-rating">\n' +
                        '                                    <span class="stars">\n' +
                        '                                        <ul class="list-unstyled">\n' +
                        '                                            <li><i class="fas fa-star"></i></li>\n' +
                        '                                            <li><i class="fas fa-star"></i></li>\n' +
                        '                                            <li><i class="fas fa-star"></i></li>\n' +
                        '                                            <li><i class="fas fa-star"></i></li>\n' +
                        '                                            <li><i class="fas fa-star"></i></li>\n' +
                        '                                        </ul>\n' +
                        '                                    </span>\n' +
                        '                                <span>32 reviewes</span>\n' +
                        '                            </div>\n' +
                        '                            <span><i class="fas fa-'+(v.offersFreeConsultations == 1 ? 'check-circle' : 'times-circle clr-red')+'"></i>Free consultations</span>\n' +
                        '                        </div>\n' +
                        '                        <div class="puser-right-right">\n' +
                        '                            <i class="far fa-heart"></i>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                    <div class="col-md-12 description">\n' +
                        '                        <p>'+v.short_description+'</p>\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '        </div>';
                        if (v.isPremium == 1){
                            html += '        <div class="pre-list-footer">\n' +
                                '                <div class="social-block">\n' +
                                '                    <ul class="list-unstyled">';
                            if(v.facebook_url && v.facebook_url != ''){
                                html +='<li><a class="fb" target="_blank" href="'+v.facebook_url+'"><i class="fab fa-facebook-square"></i></a></li>';
                            }
                            if(v.twitter_url && v.twitter_url != ''){
                                html +='<li><a class="twitter" target="_blank"  href="'+v.twitter_url+'"><i class="fab fa-twitter-square"></i></a></li>';
                            }
                            if(v.linkedin_url && v.linkedin_url != ''){
                                html +='<li><a class="link" target="_blank"  href="'+v.linkedin_url+'"><i class="fab fa-linkedin"></i></a></li>';
                            }
                            if(v.instagram_url && v.instagram_url != ''){
                                html +='<li><a class="insta" target="_blank"  href="'+v.instagram_url+'"><i class="fab fa-instagram"></i></a></li>';
                            }
                            html +='</ul>\n' +
                                '                </div>\n' +
                                '                <div class="appoiment-ul">\n' +
                                '                    <ul class="list-unstyled">';
                            if(v.scheduling_url && v.scheduling_url != '') {
                                html += '<li><a target="_blank"  href="'+v.scheduling_url+'"><i class="fas fa-calendar-alt"></i>Appointment</a></li>';
                            }
                            if(v.public_phone && v.public_phone != '') {
                                html += '<li><a href="javascript:;"><i class="fas fa-phone"></i>'+v.public_phone+'</a></li>';
                            }
                            if(v.website_url && v.website_url != '') {
                                html += '<li><a  target="_blank"  href="'+v.website_url+'"><i class="fas fa-external-link-alt"></i>Website</a></li>';
                            }
                            html +='</ul>\n' +
                                '                </div>\n' +
                                '                <div class="button-block">\n' +
                                '                    <button type="button" class="btn btn-primary modelPrimiumBtn">\n' +
                                '                        <i class="fas fa-envelope"></i>Message\n' +
                                '                    </button>\n' +
                                '                </div>\n' +
                                '            </div>';
                        }
                        html += '    </div>\n' +
                        '</div>';
                });
            }
            return html;
        },
        applyHtmlPagination : function (data) {
            let html = '<ul class="pagination pagination-sm justify-content-center">\n' +
                '    <li class="page-item '+ (data.page <= 1 ? 'disabled' : '' ) +'">\n' +
                '        <a onclick="filterManagement.applyFilterData(1);" class="page-link" href="javascript:;"><<</a>\n' +
                '    </li>\n' +
                '    <li class="page-item '+ (data.page <= 1 ? 'disabled' : '' ) +'">\n' +
                '        <a onclick="filterManagement.applyFilterData(1);" class="page-link" href="javascript:;"><</a>\n' +
                '    </li>';
                let i = data.start;
                for (i; i <= data.end; i++ ){
                    html += '<li class="page-item '+ (i == data.page ? 'active' : '') +'">\n' +
                        '<a '+ (i != data.page ? 'onclick="filterManagement.applyFilterData('+i+');"' : '') +' class="page-link" href="javascript:;">'+i+'</a>\n' +
                        '</li>\n';
                }
                html +='    <li class="page-item '+(data.page >= data.total_pages ? 'disabled' : '')+'">\n' +
                '        <a class="page-link" onclick="filterManagement.applyFilterData('+(parseInt(data.page) + 1)+');" href="javascript:;">></a>\n' +
                '    </li>\n' +
                '    <li class="page-item '+(data.page >= data.total_pages ? 'disabled' : '')+'">\n' +
                '        <a class="page-link" onclick="filterManagement.applyFilterData('+data.end +');" href="javascript:;">>></a>\n' +
                '    </li>\n' +
                '</ul>';

                return html;

        },
        applyFilterData : function (page) {
            var filterData = $('#filterForm').serialize();
            filterData=filterData+'&page='+page;
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>home/searchList',
                dataType: 'json',
                data:filterData,
                success: function(data)
                {
                    $('.main_data_block .card-header').html(filterManagement.applyCardHeader(data));
                    $('.main_data').html(filterManagement.applyHtmlData(data));
                    if(data.end != 0) {
                        $('.pagination_block').html(filterManagement.applyHtmlPagination(data));
                    } else {
                        $('.pagination_block').html('');
                    }
                    $('.modelPrimiumBtn').click(function (a) {
                        if(user.userId){
                            modalHandler.showPrimumButton(this);
                        }else {
                            modalHandler.showLogin();
                        }
                    });
                    LetterAvatar.transform();

                },
                error: function(e)
                {
                    alert(e.message);
                }
            });
        }
    };

    var modalHandler = {
        showLogin : function () {
            $('#loginModel').modal('show')
            $('#login_form').show();
            $('#register_form').hide();
            $("#consumer_form").trigger("reset");
            $("#consumer_form").trigger("reset");
            var validator = $("#consumer_form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password:{
                        required: true,
                        minlength:8
                    }

                }
            });
            validator.resetForm();
            $("#submit-consumer").click(function(){
                if($("#consumer_form").valid()){
                    $("#consumer_form").submit();
                }
            })

            $('#consumer_form input').keypress(function (e) {
                if (e.which == 13) {
                    if($("#consumer_form").valid()){
                        $("#consumer_form").submit();
                    }
                    return false;
                }
            });
        },
        showRegistration:function () {
            $('#login_form').hide();
            $('#register_form').show();
            $("#consumer_register_form").trigger("reset");
            var validator = $("#consumer_register_form").validate({
                rules: {
                    // simple rule, converted to {required:true}
                    // compound rule
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "<?= base_url(); ?>login/user_exists",
                            type: "post",
                            data: {
                                email: function()
                                {
                                    return $('#email').val();
                                }
                            }
                        }
                    },
                    password:{
                        required: true,
                        minlength:8
                    },
                    conf_password: {
                        equalTo: "#password"
                    },
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    termscheck: {
                        required: true,
                    }

                },
                messages:{
                    email :{
                        remote : "This email is already exists."
                    }
                },
                errorPlacement: function (error, element) {
                    if (element.attr("type") == "checkbox") {
                        console.log($(element).parent("div").find("label"));
                        $($(element).parent("div").find("label")).append(error);
                    }else {
                        error.insertAfter(element);
                    }
                }
            });
            validator.resetForm();
            $("#submit-consumer_register").click(function(){
                if($("#consumer_register_form").valid()){
                    $("#consumer_register_form").submit();
                }
            })
        },
        showPrimumButton:function (a) {
            var parentNode = $($(a).parents('.premium-listing.p-2'));
            var img = $(parentNode).find('.round.mr-3').attr('src');
            var name = $(parentNode).find('.media-body .puser-left a.user_name').text();
            var html = '<div class="media">\n' +
                '                    <div class="img-status">\n' +
                '                        <img src="'+ img +'" class="round mr-3" alt="img">\n' +
                '                        <span class="status online"></span>\n' +
                '                    </div>\n' +
                '                    <div class="media-body">\n' +
                '                        <div class="popup-head">\n' +
                '                            <h5 class="mt-0">'+ name +' - Send a Message</h5>\n' +
                '                            <p>Use the form below to send Paul a message. We’ll notify you as soon as they respond! </p>\n' +
                '                        </div>\n' +
                '                        <form id="message_form">\n' +
                '                            <div class="form-group">\n' +
                '                                <label for="contact_message" id="contact_message_lable">2000</label>\n' +
                '                                <textarea class="form-control" id="contact_message" name="contact_message" onkeyup="countTextWord(this)" rows="3"></textarea>\n' +
                '<div class="error contact_message_lable_error clr-red"></div>' +
                '                            </div>\n' +
                '\n' +
                '                            <div class="custom-control custom-checkbox">\n' +
                '                                <input type="checkbox" class="custom-control-input" id="prefer_on_phone" name="prefer_on_phone">\n' +
                '                                <label class="custom-control-label" for="prefer_on_phone">I prefer that Paul responds to this message with a phone call. (optional)</label>\n' +
                '                            </div>\n' +
                '                            <div class="form-group cell-no" style="display: none;">\n' +
                '                                <input type="text" class="form-control" id="phone_no_message" name="phone_no_message" placeholder="US phone numbers only">\n' +
                '                            </div>\n' +
                '                            <div class="best-call" style="display: none;">\n' +
                '                                <label>Best time to call:</label>\n' +
                '                                <div class="custom-control custom-checkbox">\n' +
                '                                    <input type="checkbox" class="custom-control-input " name="time_slot_message" id="customControlAutosizing2">\n' +
                '                                    <label class="custom-control-label customControlAutosizing2" for="customControlAutosizing2">Morning (9-12) </label>\n' +
                '                                </div>\n' +
                '                                <div class="custom-control custom-checkbox">\n' +
                '                                    <input type="checkbox" class="custom-control-input" name="time_slot_message" id="customControlAutosizing3">\n' +
                '                                    <label class="custom-control-label" for="customControlAutosizing3">Afternoon (12-4)</label>\n' +
                '                                </div>\n' +
                '                                <div class="custom-control custom-checkbox">\n' +
                '                                    <input type="checkbox" class="custom-control-input" name="time_slot_message" id="customControlAutosizing4">\n' +
                '                                    <label class="custom-control-label" for="customControlAutosizing4">Evening (5-9)</label>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '\n' +
                '                            <!-- i am not robot starts  -->\n' +
                '\n' +
                '                            <!-- i am not robot ends  -->\n' +
                '                            <button type="submit" id="submit-message_form" class="btn btn-primary">Save</button>\n' +
                '                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>\n' +
                '                        </form>\n' +
                '                    </div>\n' +
                '                </div>';

            $('#modelPrimium').find('.modal-body').html(html);
            $('#modelPrimium').modal('show');
            
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
            })
        }
    }
    function countTextWord(a){
        var txtlennospace = 2000 - $(a).val().replace(/\s+/g, '').length;
        if(txtlennospace < 0){
            $('.contact_message_lable_error').text('Max length '+2000+' characters only!');
            $('#submit-message_form').prop('disabled','disabled');
            $('#contact_message_lable').text(0);
        }
        else {
            $('.contact_message_lable_error').text('');
            $('#submit-message_form').prop('disabled',false);
            $('#contact_message_lable').text(txtlennospace);
        }
    }

    $(document).ready(function () {
        filterManagement.applyFilterData(1);
    })
</script>