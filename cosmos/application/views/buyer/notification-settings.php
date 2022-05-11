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
                                <h4>Booking Request</h4>
                                <p>Notify me when sitter responds to my Booking request.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_res_booking" id="email_res_booking" value="1"<?= !empty($mem_data->email_res_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Booking Confirmed</h4>
                                <p>Send me an email when the sitter accepts my booking request.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_accept_booking" id="email_accept_booking" value="1"<?= !empty($mem_data->email_accept_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Check ins / Delivery</h4>
                                <p>Send me an email when the sitter checks in and delivers the job.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_checkin" id="email_checkin" value="1"<?= !empty($mem_data->email_checkin)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Booking Cancelled</h4>
                                <p>Send me an email when the booking has been cancelled.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="email_cancel_booking" id="email_cancel_booking" value="1"<?= !empty($mem_data->email_cancel_booking)?' checked=""':'' ?>>
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
                                <h4>Booking Request</h4>
                                <p>Notify me via text when sitter responds to my Booking request.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_res_booking" id="mobile_res_booking" value="1"<?= !empty($mem_data->mobile_res_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Booking Confirmed</h4>
                                <p>Send me a text when the sitter accepts my booking request.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_accept_booking" id="mobile_accept_booking" value="1"<?= !empty($mem_data->mobile_accept_booking)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Check ins / Delivery</h4>
                                <p>Send me a text when the sitter checks in and delivers the job.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_checkin" id="mobile_checkin" value="1"<?= !empty($mem_data->mobile_checkin)?' checked=""':'' ?>>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="txt">
                                <h4>Booking Cancelled</h4>
                                <p>Send me a text when the booking has been cancelled.</p>
                            </div>
                            <div class="switchBtn">
                                <input type="checkbox" name="mobile_cancel_booking" id="mobile_cancel_booking" value="1"<?= !empty($mem_data->mobile_cancel_booking)?' checked=""':'' ?>>
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