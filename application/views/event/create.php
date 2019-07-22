<div class="container search-result">
    <div class="events-section ">
        <div class="breadcum ">
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>events">Events</a></li>
                <li><a href="javascript:">create</a></li>
            </ul>
        </div>
        <div class="content-area-event mt-2 row shadow">
            <div class="col-8">
                <div class="left-side">
                    <h1>Create Event</h1>
                    <div class=" pb-2 ">
                        <div class="about-block p-2">
                            <form id="event_form" method="post" action="<?= base_url(); ?>events/store_event" enctype="multipart/form-data">
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Event type</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" checked name="event_type"
                                                       id="physical" value="1">
                                                <label class="form-check-label" for="physical">Physical</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="event_type"
                                                       id="virtual_online" value="2">
                                                <label class="form-check-label"
                                                       for="virtual_online">Virtual/Online</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <label for="event_title" class="col-sm-2 col-form-label">Event title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="event_title" name="event_title"
                                               placeholder="Event title">
                                    </div>
                                </div>
                                <div class="form-group evnt_type_block row show">
                                    <label for="input_venue" class="col-sm-2 col-form-label">Venue</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input_venue" name="venue" placeholder="Venue">
                                    </div>
                                </div>
                                <div class="form-group evnt_type_block row show">
                                    <label for="input_address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id="input_address"
                                               placeholder="Enter your address" onFocus="geolocate()">
                                        <input class="field" type="hidden" name="city" id="locality" />
                                        <input class="field" type="hidden" name="state" id="administrative_area_level_1" />
                                        <input class="field" type="hidden" name="postal_code" id="postal_code" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input_address" class="col-sm-2 col-form-label">Date & time</label>
                                    <div class="col-sm-10 row">
                                        <div class='col-md-9'>
                                            <div class=" form-group">
                                                <div class='input-group date' id='datetimepicker6'>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="datetimes" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-3'>
                                            <select class="form-control" name="timezone">
                                                <option value="EST">EST</option>
                                                <option value="CST">CST</option>
                                                <option value="MST">MST</option>
                                                <option value="PST">PST</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input_upload_image" class="col-sm-2 col-form-label">Upload image</label>
                                    <div class="col-sm-10 row">
                                        <div class='col-md-4'>
                                            <div class=" form-group">
                                                <div class="img-preview-div img-thumbnail">
                                                    <img width="147px" height="118px" id="image-preview" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-8'>
                                            <p>Your image must be JPG, GIF, or PNG and cannot exceed 2MB.<br>It will be resized to a width of 450px.</p>
                                            <div class="full-width">
                                                <input type="file" id="profile-input" accept="image/*" name="profile_image" class="form-control form-input form-style-base">
                                                <input type="text" id="fake-input" accept="image/*" class="form-control form-input form-style-fake" placeholder="Choose your File" readonly="">
                                                <span class="fa fa-upload input-place"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input_event_description" class="col-sm-2 col-form-label">Event
                                        description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="input_event_description"
                                                  name="event_description" placeholder="Event description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input_cost" class="col-sm-2 col-form-label">Cost</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input_cost" name="cost" placeholder="Cost">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input_site_link" class="col-sm-2 col-form-label">Site Link</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" id="input_site_link" name="site_link"
                                               placeholder="Site Link">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" id="submit-event_form" class="btn btn-primary">Submit event</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="right-sidebar">
                    <h2 class="h2-with-bottom">Featured specialists near Cherry Hill, NJ</h2>
                    <img src="<?= base_url(); ?>assets/images/featured2.png" class="width-20-rem mb-2"><br><img
                            src="<?= base_url(); ?>assets/images/featured.png" class="width-20-rem mb-2">

                    <h2 class="h2-with-bottom mt-2">Latest News</h2>

                    <img class="width-20-rem" src="<?= base_url(); ?>assets/images/articlesidebar3.png">
                    <hr>
                    <img class="width-20-rem" src="<?= base_url(); ?>assets/images/articlesidebar2.png">
                    <hr>
                    <img class="width-20-rem" src="<?= base_url(); ?>assets/images/articlesidebar4.png">

                    <h2 class="h2-with-bottom mt-1">Trending Topics</h2>

                    <div style="padding-left: 15px; font-size: .9em;">

                        <li><a href="#">Authorized User Accounts</a><a> (7)<br>
                            </a></li>
                        <li><a href="#">Bankruptcy</a><a> (12)<br>
                            </a></li>
                        <li><a href="#">Budget &amp; Savings</a><a> (32)<br>
                            </a></li>
                        <li><a href="#">Charge Offs</a><a> (12)<br>
                            </a></li>
                        <li><a href="#">Collections</a><a> (25)<br>
                            </a></li>
                        <li><a href="#">Consumer Credit Counseling</a><a> (16)<br>
                            </a></li>
                        <li><a href="#">Credit Cards</a><a> (2)<br>
                            </a></li>
                        <li><a href="#">Credit Inquiries</a><a> (17)<br>
                            </a></li>
                        <li><a href="#">Credit Repair</a><a> (11)<br>
                            </a></li>
                        <li><a href="#">Credit Repair Mistakes</a><a> (9)<br>
                            </a></li>
                        <li><a href="#">Credit Reports</a><a> (24)<br>
                            </a></li>
                        <li><a href="#">Credit Scores</a><a> (8)<br>
                            </a></li>
                        <li><a href="#">Debt Consolidation</a><a> (2)<br>
                            </a></li>
                        <li><a href="#">Debt Negotiation</a><a> (6)<br>
                            </a></li>
                        <li><a href="#">Debt Validation</a><a> (14)<br>
                            </a></li>
                        <li><a href="#">Identity Concerns</a><a> (9)<br>
                            </a></li>
                        <li><a href="#">Judgements</a><a> (31)<br>
                            </a></li>
                        <li><a href="#">Loan Preparation</a><a> (12)<br>
                            </a></li>
                        <li><a href="#">Mortgages</a><a> (5)<br>
                            </a></li>
                        <li><a href="#">Rapid Rescore</a><a> (9)<br>
                            </a></li>
                        <li><a href="#">Statute of Limitation</a><a> (10)<br>
                            </a></li>
                        <li><a href="#">Student Loans</a><a> (19)<br>
                            </a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" />

<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('event_description');
    CKEDITOR.editorConfig = function (config) {
        config.language = 'es';
        config.uiColor = '#F7B42C';
        config.height = 300;
        config.toolbarCanCollapse = true;
    };
    $(function() {
        $('input[name="datetimes"]').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M-DD-YYYY hh:mm A'
            }
        });
    });
</script>
<script>
    // This sample uses the Autocomplete widget to help the user select a
    // place, then it retrieves the address components associated with that
    // place, and then it populates the form fields with those details.
    // This sample requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    var componentForm = {
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        postal_code: 'short_name'
    };
    function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('input_address'), {types: ['geocode']});

        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields(['address_component']);

        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle(
                    {center: geolocation, radius: position.coords.accuracy});
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('input[id=profile-input]').change(function() {
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });
    $("#profile-input").change(function() {
        readURL(this);
    });
    $("input[name='event_type']").click(function() {
        var event_type = $(this).val();
        if(event_type == 2){
            $(".evnt_type_block").hide();
        }else {
            $(".evnt_type_block").show();
        }
    });
    $("#event_form").validate({
        rules: {
            // simple rule, converted to {required:true}
            // compound rule
            event_type: {
                required: true
            },
            event_title: {
                required: true
            },
            event_description: {
                required: true
            },
            cost: {
                required: true,
                number:true
            },
            site_link: {
                required: true,
                url: true
            },
            profile_image: {
                required:true,
                accept: "image/*"
            },
            venue: {
                required: function (element) {
                    if ($("#physical").is(':checked')) {
                        return true;
                    } else {
                        return false;
                    }
                },
            },
            address: {
                required: function (element) {
                    if ($("#physical").is(':checked')) {
                        return true;
                    } else {
                        return false;
                    }
                },
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") == "file") {
                $($(element).parent("div").parent("div")).append(error);
            }else {
                error.insertAfter(element);
            }
        }
    });
    $("#submit-event_form").click(function(){
        if($("#event_form").valid()){
            return true;
            // $("#consumer_form").submit();
        }else {
            return false;
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-bNe4Ja6029gIBQMc0sCkLzwm-gF1xwQ&libraries=places&callback=initAutocomplete"
        async defer></script>