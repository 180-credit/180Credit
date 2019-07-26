<footer class="pt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-sm-5">
					<h5 class="text-uppercase text-white"><?= lang('quick_link'); ?></h5>
					<ul class="list-unstyled mb-0">
						<li> <a href="#"><?= lang('find_a_specialist_near_you'); ?></a></li>
						<li> <a href="#"><?= lang('free_questions_and_answers'); ?></a></li>
						<li> <a href="#"><?= lang('latest_news_and_articles'); ?></a></li>
					</ul>
				</div>
				<div class="col-md-4 mb-sm-5">
                    <h5 class="text-uppercase text-white"><?= lang('upcoming_events'); ?></h5>
                    <ul class="list-unstyled mb-0">
                        <?php
                        foreach ($upcoming_events as $upcoming_event){
                            ?>
                            <li> <a href="<?= base_url('event-details/'.$upcoming_event->id) ?>"><?= $upcoming_event->eventTitle ?> - <?= date('M d',strtotime($upcoming_event->startDate))." - ".date('dS',strtotime($upcoming_event->startDate)) ?></a> </li>
                            <?php
                        }
                        ?>
                        <li><a href="<?= base_url('events') ?>"><?= lang('view_all_upcoming_events'); ?></a></li>
                    </ul>
				</div>
				<div class="col-md-4 mb-sm-5">
					<h5 class="text-uppercase text-white"><?= lang('resources'); ?></h5>
					<ul class="list-unstyled mb-0">
						<li> <a href="#"><?= lang('upcoming_industry_events'); ?></a> </li>
                        <li> <a href="#"><?= lang('free_questions_and_answers'); ?></a></li>
                        <li> <a href="#"><?= lang('latest_news_and_articles'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-bottom py-3 mt-5">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="footer-logo">
							<a href="#"><img src="<?php echo base_url(); ?>assets/images/footer-logo.png" title="footer-logo" alt="footer-logo" class="img-res"></a>
						</div>
						<div class="footer-links">
							<ul class="list-unstyled mb-0 mt-2">
								<li><a href="#"><?= lang('contact'); ?></a></li>
								<li><a href="#"><?= lang('terms_of_use'); ?></a></li>
								<li><a href="#"><?= lang('privacy_policy'); ?></a></li>
								<li><a href="#"><?= lang('community_guidelines'); ?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="social-links mt-3">
							<ul class="list-unstyled mb-0">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>










	<!--  [Script Section] Starts -->

	<!--  Required JS [Bootstrap Js] Starts -->
	
	<script src="<?php echo base_url(); ?>assets/js/popper.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Required JS [Bootstrap Js] Ends -->

	<!--  [Script Section] Ends -->
<?php
    if (isset($_SESSION['user']['userId'])){
        ?>
            <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
            <script>
                var OneSignal = window.OneSignal || [];
                OneSignal.push(["init", {
                    appId: "<?php echo ONESIGNAL_APPID; ?>",
                    subdomainName: 'push',
                    autoRegister: true,
                    promptOptions: {
                        /* These prompt options values configure both the HTTP prompt and the HTTP popup. */
                        /* actionMessage limited to 90 characters */
                        actionMessage: "Test Message",
                        /* acceptButtonText limited to 15 characters */
                        acceptButtonText: "Test btn",
                        /* cancelButtonText limited to 15 characters */
                        cancelButtonText: "Test cancel"
                    }
                }]);
                /*function subscribe() {
                    // OneSignal.push(["registerForPushNotifications"]);
                    OneSignal.push(["registerForPushNotifications"]);
                    event.preventDefault();
                }
                function unsubscribe(){
                    OneSignal.setSubscription(true);
                }*/
                var OneSignal = OneSignal || [];
                OneSignal.push(function(e) {
                    /* These examples are all valid */
                    // Occurs when the user's subscription changes to a new value.
                    OneSignal.on('subscriptionChange', function (isSubscribed) {
                        if(isSubscribed){
                            OneSignal.sendTag("user_id",<?= $_SESSION['user']['userId'] ?>);
                            <?php
                                if($_SESSION['user']['180creditUserType'] == 1){
                                    ?>
                                    OneSignal.sendTag("user_type","specialists");
                                    <?php
                                }
                                elseif ($_SESSION['user']['180creditUserType'] == 2){
                                    ?>
                                    OneSignal.sendTag("user_type","consumers");
                                    <?php
                                }
                            ?>
                        }
                        OneSignal.getUserId(function(userId) {
                            $.post('<?= base_url('login/enableSubscription') ?>',{ is_subscribed : isSubscribed, player_id : userId },function (result) {
                                console.log(result);
                            });
                        });
                    });
                    var isPushSupported = OneSignal.isPushNotificationsSupported();
                    if (isPushSupported)
                    {
                        // Push notifications are supported
                        OneSignal.isPushNotificationsEnabled().then(function(isEnabled)
                        {
                            if (!isEnabled)
                            {
                                OneSignal.showHttpPrompt();
                            }
                        });
                    }
                });
            </script>
        <?php
    }
?>
</body>

</html>
