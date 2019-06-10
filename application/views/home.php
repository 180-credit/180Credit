<!--<link href="--><?php //echo base_url(); ?><!--assets/plugins/jquery-typeahead/jquery.typeahead.min.css" rel="stylesheet" media="screen"/>-->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- How Can We Help Block Starts -->
<section class="main-slider-block position-relative">
    <div class="owl-carousel owl-theme main-slider">
        <div class="item">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/main1.jpg" title="main1" alt="main1"
                             class="img-res"></a>
        </div>
        <div class="item">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/main2.jpg" title="main2" alt="main2"
                             class="img-res"></a>
        </div>
        <div class="item">
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/main3.jpg" title="main3" alt="main3"
                             class="img-res"></a>
        </div>
    </div>
    <div class="main-slider-tab-content position-absolute">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <h1 class="text-white">Credit problems? </br>Experienced specialists are ready to help</h1>
                    <div class="main-slider-tab rounded p-3">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item mr-3">
                                <a class="nav-link active rounded-0 px-0  text-white" id="pills-home-tab"
                                   data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                   aria-selected="true">Find a specialist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 px-0  text-white" id="pills-profile-tab" data-toggle="pill"
                                   href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Get
                                    advice</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane specialist-tab fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-search"></i>
                                            </div>
                                            <input class="form-control" id="exampleInputEmail1" name="specialist" type="text" placeholder="Enter topic or specialist name" autocomplete="off">
                                            <!--                                             placeholder="Enter Specialist Name"-->
                                        </div>
                                    </div>
                                    <div class="form-group mx-2">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-map-signs"></i>
                                            </div>
                                            <input class="form-control" id="exampleInputEmail2" name="location-map" type="text" placeholder="Enter city, state or zip code" autocomplete="off">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary text-white">Search</button>
                                </form>
                            </div>
                            <div class="tab-pane advice-tab fade" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">
                                <form class="form-inline">
                                    <div class="form-group mr-2">
                                        <input type="email" class="form-control" id="exampleInputEmail3"
                                               placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-primary text-white">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main Slider Ends -->

<!-- How Can We Help Block Starts -->
<section class="how-can-we-help mt-4 pb-4">
    <div class="container">
        <h5 class="text-center text-uppercase mb-5">How Can We Help? Use Our Services To
            <span> Solve Your Problem </span> Or <span>Promote Your Business</span></h5>
        <div class="row help-top-row">
            <div class="col-md-6 d-flex">
                <img src="<?php echo base_url(); ?>assets/images/help1.png" title="help1" alt="help1" class="img-res">
                <div class="right-content ml-3">
                    <h4>Search for help</h4>
                    <p>Search our database of thousands of credit
                        repair professionals and review their profiles
                        to find the best match for your situation.</p>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <img src="<?php echo base_url(); ?>assets/images/help2.png" title="help2" alt="help2" class="img-res">
                <div class="right-content ml-3">
                    <h4>Live Interactive Chat</h4>
                    <p>Chat live 24/7 with credit repair specialists
                        who are online and ready to help. </p>
                </div>
            </div>
        </div>
        <div class="row help-center-row mt-4">
            <div class="col-md-6 d-flex">
                <div class="right-content text-right mr-3">
                    <h4>Free Q&A</h4>
                    <p>Ask questions and receive free advice and
                        answers from our industry professionals</p>
                </div>
                <img src="<?php echo base_url(); ?>assets/images/help4.png" title="help4" alt="help4" class="img-res">
            </div>
            <div class="col-md-6 d-flex">
                <div class="right-content text-right mr-3">
                    <h4>Increase Your Knowledge</h4>
                    <p>Our vast array of articles, written by industry
                        leaders, wil help you keep you on track.</p>
                </div>
                <img src="<?php echo base_url(); ?>assets/images/help3.png" title="help3" alt="help3" class="img-res">
            </div>
        </div>
        <div class="row help-bottom-row mt-4">
            <div class="col-md-12 d-flex">
                <img src="<?php echo base_url(); ?>assets/images/help5.png" title="help5" alt="help5" class="img-res">
                <div class="right-content ml-3">
                    <h4>Are you a credit repair specialist or do you provide services to the industry?</h4>
                    <p>Create a free account and put your business in front of thousands of daily consumers in need of
                        your help.
                        If you provide services to the industry such as outsourcing, business automation, software,
                        merchant services, etc.,
                        our industry marketplace gets your business noticed by credit repair professionals who need your
                        services.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .select2-highlighted .movie-synopsis {
        font-size: .8em;
        color: #eee;
    }

    .bigdrop.select2-container .select2-results {
        max-height: 300px;
    }

    .bigdrop .select2-results {
        max-height: 300px;
    }
</style>
<!-- How Can We Help Block Ends -->
<!--  [Owl Carousel Js] Starts -->
<script src="<?php echo base_url(); ?>assets/plugins/owlcarousel/owl.carousel.min.js" type="text/javascript"></script>
<script>
    /*----------------- Main Slider Owl Carousel Js Starts -----------------*/
    $('.main-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        autoplay: true,
        autoplayTimeout: 3000,
        items: 1
    })
    /*----------------- Main Slider Owl Carousel Js Ends -----------------*/
</script>
<!--  [Owl Carousel Js] Ends -->

<!--  [Script Section] Ends -->
<script>
    var areaOfSpecialist = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        identify: function(obj) { return obj.name; },
        local:<?= $area_of_specialist ?>
    });

    var specialist = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        identify: function(obj) { return obj.name; },
        local: <?= $user_areas_of_specialty ?>
    });
    function nflTeamsWithDefaults(q, sync) {
        if (q === '') {
            sync(areaOfSpecialist.get(<?= $defaultArea ?>));
        }

        else {
            areaOfSpecialist.search(q, sync);
        }
    }

    $('#exampleInputEmail1').typeahead({
            minLength: 0,
            highlight: true
        },
        {
            name: 'specialist',
            display: 'name',
            source: nflTeamsWithDefaults,
            templates: {
                header: '<h4 class="head-dropdown">Area of specialist</h4>'
            }
        },
        {
            name: 'specialist',
            display: 'name',
            source: specialist,
            templates: {
                header: '<h4 class="head-dropdown">Specialist</h4>'
            }
        });
    var zipcodes = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        identify: function(obj) { return obj.name; },
        remote:{
            url: 'home/getZipCodes',
            replace: function(url, query) {
                return url + "?q=" + query;
            },
            ajax : {
                beforeSend: function(jqXhr, settings){
                    settings.data = $.param({q: queryInput.val()})
                },
                type: "GET"

            }
            /*filter: function (zipcodes) {
                // Map the remote source JSON array to a JavaScript object array
                return $.map(zipcodes.results, function (zipcodes) {
                    return {
                        value: zipcodes.name
                    };
                });
            }*/
        }
    });

    // Initialize the Bloodhound suggestion engine
    zipcodes.initialize();
    $('#exampleInputEmail2').typeahead({
            minLength: 3,
            highlight: true
        },
        {
            display: 'name',
            source: zipcodes.ttAdapter()
        });
</script>