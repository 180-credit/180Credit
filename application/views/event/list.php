<div class="container search-result">
    <div class="row events-section ">
        <div class="breadcum ">
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a class="active" href="javascript:">Events Specialist</a></li>
            </ul>
        </div>
        <div class="content-area-event mt-2 row shadow">
            <div class="col-8">
                <div class="left-side row">
                    <div class="col-md-9">
                        <h1>Upcoming Events</h1>
                    </div>
                    <div class="col-md-3 mt-3">
                        <?php
                        if (isset($_SESSION['user']) && (isset($_SESSION['user']['180creditUserType']) && $_SESSION['user']['180creditUserType'] == 1 )) {
                            ?>
                            <button type="button" onclick="window.location.href='<?= base_url(); ?>events/create'" class="btn btn-primary ml-1">Submit an event</button>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="brd-bottom pb-2 col-md-12">
                        <form class="form-inline" id="filterForm">
                            <div class="form-group">
                                <label for="event_type">Event type: </label>
                                <select class="form-control ml-1" name="event_type">
                                    <option value="0">All events</option>
                                    <option value="1">Physical Location</option>
                                    <option value="2">Virtual/Online</option>
                                </select>
                                <label for="event_type" class=" ml-3">Search: </label>
                                <input type="text" placeholder="Search" name="event_search" class="form-control" id="pwd">
                                <button type="button" onclick="filterManagement.applyFilterData(1);" class="btn btn-primary ml-3">Filter</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="main_data_block">
                        </div>
                        <div class="pagination_block mt-2">

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
<div class="modal exampleModal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-0 border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="media">
                    <div class="media-body">
                        <div class="popup-head text-center">
                            <h5 class="mt-0">Thank you, your event has been submitted!</h5>
                            <p class="text-justify mb-1">
                                All events are reviewed by our moderators before public posting. Please allow 12-24 hours for your submission to be reviewed and approved. We will send you a notification once your event is live.
                            </p>
                            <button type="button" class="btn btn-primary text-center" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="wait" ><img src='<?php echo base_url(); ?>assets/images/loader.gif' /></div>
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/daterangepicker/moment.min.js"></script>
<?php
if(isset($_SESSION['success'])){
    ?>
    <script>
        $(document).ready(function () {
            $("#modalReview").modal('show');
        });
    </script>
    <?php
}
?>

<script>
    function jsUcfirst(string)
    {
        return string.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
    }
    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
    var filterManagement ={
        applyHtmlData : function (data) {
            let html = '';
            if(data.paginationData.length){
                $.each(data.paginationData,function (k,v) {
                    html +='<div class="search-result-block mt-2">\n' +
                        '    <div class="premium-listing p-2">\n' +
                        '        <div class="media">\n' +
                        '            <a>';
                    if(v.imageURL != ''){
                        html += '                <img class="mr-3"  width="136" height="136" src="<?= base_url(); ?>'+v.imageURL+'">';
                    } else {
                        html += '                <img class="mr-3" width="136" height="136" src="<?= base_url().'assets/images/default.png' ?>">';
                    }
                    html += '            </a>\n' +
                        '            <div class="media-body">\n' +
                        '                <div class="row">\n' +
                        '                    <div class="col-md-12 description">\n' +
                        '<h6>'+jsUcfirst(v.eventTitle)+'</h6>' +
                        '<p>'+jsUcfirst(v.venueName)+'</p>' +
                        '                        <p><b>Event Type:</b> '+(v.eventType == 1 ? 'Physical location':'Virtual/Online')+'' +
                        '&nbsp;&nbsp;&nbsp;<b>Cost:</b> '+v.eventCost +
                        '</p>';
                        if(v.startDate && v.endDate){
                            html +=moment(v.startDate).format('Do MMMM, YYYY')+' - '+moment(v.endDate).format('Do MMMM, YYYY');
                        }
                    html +='</div>\n' +
                        '<div class="col-md-9 puser-left"><div class="user-address">';
                    if(v.venueCity && v.venueStateAbbr){
                        html += '<span>'+v.venueCity+', '+v.venueStateAbbr+'</span>' ;
                    }
                    html += '</div></div>' +
                        '<div class="col-md-3 puser-right">' +
                        '<button type="button" onclick="window.location.href=\'<?= base_url().'event-details/' ?>'+v.id+'\'" class="btn btn-primary ml-3 text-right">Details</button>' +
                        '</div>' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '        </div>';
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
                url: '<?php echo base_url(); ?>events/load_ajax_data',
                dataType: 'json',
                data:filterData,
                success: function(data)
                {
                    $('.main_data_block').html(filterManagement.applyHtmlData(data));
                    if(data.end != 0) {
                        $('.pagination_block').html(filterManagement.applyHtmlPagination(data));
                    } else {
                        $('.pagination_block').html('');
                    }
                },
                error: function(e)
                {
                    alert(e.message);
                }
            });
        }
    };
    $(document).ready(function () {
        filterManagement.applyFilterData(1);
    })
</script>
<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d35f8b8cdce3fb1">

</script>