<div class="container search-result">
    <div class="events-section ">
        <div class="breadcum ">
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>events">Events</a></li>
                <li><a class="active" href="javascript:"><?= $event_details->eventTitle ?></a></li>
            </ul>
        </div>
        <div class="content-area-event mt-2 row shadow">
            <div class="col-8">
                <div class="left-side row">
                    <div class="col-md-12">
                        <h1><?= $event_details->eventTitle ?></h1>
                        <?php
                        if($event_details->imageURL != ''){
                            ?>
                            <img class="img-fluid" src="<?php echo base_url().$event_details->imageURL; ?>" style="padding-bottom: 20px; ">
                            <?php
                        }else{
                            ?>
                            <img src="<?php echo base_url().'assets/images/default.png'; ?>" style="padding-bottom: 20px; ">
                            <?php
                        }
                        ?>

                    </div>
                    <table class="ml-3" border="0">

                        <?php
                            if($event_details->eventType == 1){
                                ?>
                                <tr>
                                    <td valign="top">When:</td>
                                    <td><?php
                                        echo date('F dS',strtotime($event_details->startDate)).' - '.date('dS m,Y',strtotime($event_details->endDate));
                                        ?><br></td>
                                </tr>
                                <tr>
                                    <td valign="top">Where:</td>
                                    <td><?= $event_details->venueStreetAddress; ?>, <br><?= $event_details->venueCity; ?>, <?= $event_details->venueStateAbbr; ?>, <?= $event_details->venuePostalCode; ?><br></td>
                                </tr>
                                <?php
                            }

                        ?>
                        <tr>
                            <td valign="top">Cost:</td>
                            <td>$<?= $event_details->eventCost; ?><br></td>
                        </tr>
                        <tr>
                            <td valign="top">Details:</td>
                            <td> <?= $event_details->eventDescription; ?></td>
                        </tr>
                        <tr>
                            <td ></td>
                            <td>For more information, visit: <a href="<?= $event_details->eventURL; ?>"><?= $event_details->eventURL; ?></a><br></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Posted by: <?= $event_details->submittedByUserName ?>  &nbsp;&nbsp;&nbsp; <?= date('m/d/Y @ h:m a',strtotime($event_details->createdOn)) ?> &nbsp;&nbsp; <!--<button type="button" onclick="#" class="btn btn-primary">Approve</button>--></td>
                        </tr>
                    </table>
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