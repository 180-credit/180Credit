<div class="container search-result">
    <div class="row events-section ">
        <div class="breadcum ">
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
        <div class="content-area-event mt-2 row shadow">
            <div class="col-8">
                <div class="left-side">
                    <h1>Upcoming Events...</h1>
                    <div class="col-md-12 brd-bottom pb-2 ">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="event_type">Event type: </label>
                                <select class="form-control ml-1">
                                    <option>All events</option>
                                    <option>Virtual/Online</option>
                                    <option>Physical</option>
                                </select>
                                <label for="event_type" class=" ml-3">Search: </label>
                                <input type="password" placeholder="Search" class="form-control" id="pwd">
                                <button type="button" class="btn btn-primary ml-3">Filter</button>
                                <button type="button" onclick="window.location.href='<?= base_url(); ?>events/create'"
                                        class="btn btn-primary ml-3">Submit an event
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 ">
                        <?php
                        foreach ($event_details as $event_detail) {
                            ?>
                        <div class="main_data_block">
                            <div class="search-result-block mt-2">
                                <div class="premium-listing p-2">
                                    <div class="media">
                                        <?php
                                        if($event_detail->imageURL != ''){
                                            ?>
                                            <a > <img class="mr-3" width="136" height="136" src="<?= base_url().$event_detail->imageURL ?>" alt="<?= $event_detail->eventTitle ?>"></a>
                                            <?php
                                        }else{
                                            ?>
                                                <a > <img class="mr-3" width="136" height="136" src="<?= base_url().'assets/images/default.png' ?>" alt="<?= $event_detail->eventTitle ?>"></a>
                                            <?php
                                        }
                                        ?>
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-md-12 description">
                                                    <h6><?= $event_detail->eventTitle ?></h6>
                                                    <p><?= $event_detail->venueName ?></p>
                                                    <p><b>Event Type:</b> <?php
                                                            if($event_detail->eventType == 1){
                                                                echo 'Physical';
                                                            }else{
                                                                echo 'Virtual/Online';
                                                            }
                                                        ?>&nbsp;&nbsp;&nbsp;&nbsp;<b>Cost:</b> $<?= $event_detail->eventCost; ?>

                                                        <br>
                                                        <?php
                                                            echo date('dS m,Y',strtotime($event_detail->startDate)).' - '.date('dS m,Y',strtotime($event_detail->endDate));
                                                        ?>
                                                    </p>

                                                </div>
                                                <div class="col-md-9 puser-left">
                                                    <div class="user-address">
                                                        <span><?= $event_detail->venueCity ?>,  <?= $event_detail->venueStateAbbr ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 puser-right">
                                                    <button type="button" onclick="window.location.href='<?= base_url().'event-details/'.$event_detail->id ?>'" class="btn btn-primary ml-3 text-right">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php
                        }
                        ?>
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