<!doctype html>
<html>
<head>
<title>Notification Settings – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
<?php get_header(); ?>
<main>


<section id="dash">
    <div id="notification">
    	<div class="contain">
            <div class="head">
                <h1 class="secHeading">Notification Settings</h1>
            </div>
            <form action="" method="post" autocomplete="off" class="frmAjax">
                <div class="blk">
                    <div class="_header">
                        <h3>Email Notifications</h3>
                    </div>
                    <div class="notiBlk">
                        <div class="inner">
                            <div class="txt">
                                <h4>New Message</h4>
                                <p>Send me an email when I get a new message.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_new_message" id="email_new_message" value="1"<?= !empty($mem_data->email_new_message)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>New Booking Request</h4>
                                <p>Send me an email when I get a new booking request.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_new_booking" id="email_new_booking" value="1"<?= !empty($mem_data->email_new_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Booking Confirmed</h4>
                                <p>Send me an email when the booking has been paid and confirmed.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_confirm_booking" id="email_confirm_booking" value="1"<?= !empty($mem_data->email_confirm_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Job Cancellation</h4>
                                <p>Send me an email when a job has been cancelled.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_cancel_booking" id="email_cancel_booking" value="1"<?= !empty($mem_data->email_cancel_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Calendar Update</h4>
                                <p>Remind me to update my calendar.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_calendar" id="email_calendar" value="1"<?= !empty($mem_data->email_calendar)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Marketing Emails</h4>
                                <p>Receive marketing emails from PFSC.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_marketing" id="email_marketing" value="1"<?= !empty($mem_data->email_marketing)?' checked=""':'' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blk">
                    <div class="_header">
                        <h3>Mobile Notifications</h3>
                    </div>
                    <div class="notiBlk">
                        <div class="inner">
                            <div class="txt">
                                <h4>New Message</h4>
                                <p>Send me a text when I get a new message.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_new_message" id="mobile_new_message" value="1"<?= !empty($mem_data->mobile_new_message)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>New Booking Request</h4>
                                <p>Send me a text when I get a new booking request.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_new_booking" id="mobile_new_booking" value="1"<?= !empty($mem_data->mobile_new_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Booking Confirmed</h4>
                                <p>Send me a text when the booking has been paid and confirmed.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_confirm_booking" id="mobile_confirm_booking" value="1"<?= !empty($mem_data->mobile_confirm_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Job Cancellation</h4>
                                <p>Send me a text when a job has been cancelled.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_cancel_booking" id="mobile_cancel_booking" value="1"<?= !empty($mem_data->mobile_cancel_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Calendar Update</h4>
                                <p>Remind me to update my calendar.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_calendar" id="mobile_calendar" value="1"<?= !empty($mem_data->mobile_calendar)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Marketing Emails</h4>
                                <p>Receive marketing emails from PFSC.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_marketing" id="mobile_marketing" value="1"<?= !empty($mem_data->mobile_marketing)?' checked=""':'' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bTn text-center">
                    <!-- <button type="reset" class="webBtn">Cancel</button> -->
                    <button type="submit" class="webBtn colorBtn">Save <i class="spinner hidden"></i></button>
                </div>
                <div class="alertMsg" style="display: none;"></div>
            </form>
    	</div>
    </div>
</section>
<!-- dash -->


</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>