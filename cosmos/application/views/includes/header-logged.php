<header class="ease">
    <div class="contain">
        <div class="logo ease">
            <a href="<?= site_url()?>"><img src="<?= SITE_IMAGES.'/images/'.$site_settings->site_logo.'?v-'.$site_settings->site_version?>" alt="<?= $site_settings->site_name?>"></a>
        </div>
        <div class="toggle"><span></span></div>
        <div class="proIco dropDown">
            <div class="inside dropBtn">
                <div class="proName semi"><?= format_name($mem_data->mem_fname,$mem_data->mem_lname)?> <em>Profile</em></div>
                <div class="ico"><img src="<?= get_image_src($mem_data->mem_image, '50', true)?>" alt="<?= format_name($mem_data->mem_fname,$mem_data->mem_lname)?>"></div>
            </div>
            <ul class="proDrop dropCnt">
                <li class="mobile"><a href="<?= site_url('notifications')?>"><i class="fi-bell"></i><span>Notifications</span></a></li>
                <li><a href="<?= site_url('profile-settings')?>"><i class="fi-user-alt"></i><span>Profile Settings</span></a></li>
                <li class="mobile"><a href="<?= site_url('messages')?>"><i class="fi-envelope"></i><span>Messages</span></a></li>
                <?php if($this->session->mem_type=='player'):?>
                    <li><a href="<?= site_url('earnings') ?>"><i class="fi-dollar"></i><span>Earnings</span></a></li>
                    <li><a href="<?= site_url('bank-accounts') ?>"><i class="fi-credit-card-alt"></i><span>Bank Account</span></a></li>
                    <li><a href="<?= site_url('products') ?>"><i class="fi-grid"></i><span>My Products</span></a></li>
                <?php else:?>
                    <li><a href="<?= site_url('transactions') ?>"><i class="fi-credit-card"></i><span>Transactions</span></a></li>
                <?php endif?>
                <li><a href="<?= site_url('logout')?>"><i class="fi-power-switch"></i><span>Logout</span></a></li>
            </ul>
        </div>
        <div id="msgBtn" class="dropDown">
            <a href="<?= site_url('messages')?>">
                <i class="fi-envelope"></i>
                <?php if (count_new_msgs()>0): ?>
                    <span class="dot blue"></span>
                <?php endif ?>
            </a>
        </div>
        <div id="notiBtn" class="dropDown">
            <a href="<?= site_url('notifications')?>">
                <i class="fi-bell"></i>
                <?php if (count_new_header_notis()>0): ?>
                    <span class="dot red"></span>
                <?php endif ?>
            </a>
        </div>
        <nav class="ease">
            <ul id="nav">
                <?php if($this->session->mem_type=='player'):?>
                    <li class="<?php if($page=="dashboard"){echo 'active';} ?>">
                        <a href="<?= site_url('dashboard')?>">Dashboard</a>
                    </li>
                    <li class="<?php if($page=="jobs"){echo 'active';} ?>">
                        <a href="<?= site_url('jobs')?>">My Jobs</a>
                    </li>
                    <li class="<?php if($page=="orders"){echo 'active';} ?>">
                        <a href="<?= site_url('orders')?>">My Orders</a>
                    </li>
                <?php else:?>
                    <li class="<?php if($page=="dashboard"){echo 'active';} ?>">
                        <a href="<?= site_url('dashboard')?>">Dashboard</a>
                    </li>
                    <li class="<?php if($page=="bookings"){echo 'active';} ?>">
                        <a href="<?= site_url('bookings')?>">Bookings</a>
                    </li>
                    <li class="<?php if($page=="payment-methods"){echo 'active';} ?>">
                        <a href="<?= site_url('payment-methods')?>">Payment Method</a>
                    </li>
                <?php endif?>
            </ul>
        </nav>
    </div>
</header>
<!-- header -->


<div class="upperlay"></div>
<!-- <div id="pageloader">
    <span class="loader"></span>
</div> -->
<div class="pBar hidden"><span id="myBar" style="width:0%"></span></div>
<script type="text/javascript">
    $(function(){
        // header fix
        /* let offSet = $('body').offset().top;
        offSet = offSet + 5;
        $(window).scroll(function() {
            scrollPos = $(window).scrollTop();
            if (scrollPos >= offSet) {
                $('header').addClass('fix');
            } else {
                $('header').removeClass('fix');
            }
        }); */

        $(document).on('click','.notifiDrop>ul>li',function(){
            window.location=base_url+'notifications/1/'+$(this).data('store')
        })
        $(document).on('click','a.dropBtn>i.fi-bell',function(){
            $.post(base_url+'open-notifications',function(data){})
        })
    });
</script>
