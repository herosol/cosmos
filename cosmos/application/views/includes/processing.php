<?php
/*$setting = array(
    "website_name" => "Paypal Payment",
    "url" => "http://herosolutions.com.pk/sarim/handyman/",                         // set your website url here
    "notify_url" => "http://localhost/paypal/handle.php",        // set url where paypal will send response
    "return_url" => "http://localhost/paypal/",                  // set url where user will return from paypal
    "cancel_url" => "http://localhost/paypal/",                  // set url where user will return after canceling payment
    "sandbox" => true,                                          // For testing set true and for live set false
    "sandbox_paypal" => "herosolutions-facilitator@yahoo.com", // set your paypal test email here
    "live_paypal" => "herosolutions@yahoo.com"                 // set your live email here
);*/


/*$post = array(
    "item_name" => "Paypal Payment",  //  Item name that will be displayed in paypal page
    "currency" => "USD",        //  payment currency
    "amount" => "5",            //  payment amount
    "custom" => '123'           //  your customer or order id (You will receive this in response after successfull payment.)
);*/

if (!empty($setting['live_paypal']) && !empty($post['item_name']) && !empty($post['amount']) && !empty($post['custom'])) {
    // die("here");
    ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Redirecting to Paypal...</title>
        </head>
        <body onLoad="document.getElementById('frmpay').submit()">
        <center>Redirecting to Paypal...</center>
        <?php if ($setting['sandbox'] == true): ?>
            <form name="frmpay" id="frmpay" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <?php else: ?>
            <form name="frmpay" id="frmpay" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <?php endif; ?>
                <input type="hidden" name="cmd" value="_xclick">
                <?php if ($setting['sandbox'] == true): ?>
                    <input type="hidden" name="business" value="<?php echo trim($setting['sandbox_paypal']); ?>">
                <?php else: ?>
                    <input type="hidden" name="business" value="<?php echo trim($setting['live_paypal']); ?>">
                <?php endif; ?>
                <input type="hidden" name="item_name" value="<?php echo $post['item_name']; ?>">
                <input type="hidden" name="currency_code" value="<?php echo $post['currency']; ?>">
                <input type="hidden" name="amount" value="<?php echo floatval($post['amount']); ?>">
                <input type="hidden" name="custom" value="<?php echo $post['custom']; ?>">
                <input type="hidden" name="notify_url" value="<?php echo $setting['notify_url']; ?>">
                <input type="hidden" name="cancel_return" value="<?php echo $setting['cancel_url']; ?>">
                <input type="hidden" name="return" value="<?php echo $setting['return_url']; ?>">
            </form>
            <script type="text/javascript">document.getElementById('frmpay').submit();</script>
        </body>
    </html>
    <?php
}else {
    ?><script type="text/javascript">
        //document.location = '<?php echo $setting['url']; ?>';</script><?php
}
?>