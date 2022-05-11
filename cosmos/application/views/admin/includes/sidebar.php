<div class="sidebar-menu">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="<?=site_url(ADMIN.'/dashboard')?>">
                    <img src="<?= SITE_IMAGES.'/images/'.$adminsite_setting->site_logo ?>" width="120" alt="">
                </a>
            </div>
            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu">
            <li class="opened <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/dashboard') ?>">
                    <i class="entypo-gauge"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <!-- <?php if(is_admin()):?>
            <li class="opened <?= ($this->uri->segment(2) == 'sub-admin') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/sub-admin') ?>">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    <span class="title">Sub Admin</span>
                </a>
            </li>
            <?php endif?> -->
            <?php if(access(1)):?>
            <li class="opened <?= ($this->uri->segment(2) == 'buyers') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/buyers') ?>">
                    <i class="entypo-user"></i>
                    <span class="title">Buyers </span>
                </a>
            </li>
            <?php endif?>
            <?php if(access(2)):?>
                <?php $player_application_count = count_player_applications();?>
                <?php //$reported_profiles_count = count_reported_profiles();?>
                <li class=" <?= (in_array($this->uri->segment(2), array('players', 'player-applications'))) ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="entypo-comment"></i>
                        <span class="title">Cosplayer Management</span>
                        <?php if ($player_application_count+$reported_profiles_count>0): ?>
                            <span class="badge"><?= $player_application_count+$reported_profiles_count?></span>
                        <?php endif ?>
                    </a>
                    <ul>
                        <li class="<?= ($this->uri->segment(2) == 'players' && !in_array($this->uri->segment(3), array('reported-profiles', 'player-registrations'))) ? 'active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/players') ?>">
                                <i class="entypo-user"></i>
                                <span class="title">Cosplayers </span>
                            </a>
                        </li>
                        <li class="<?= ($this->uri->segment(2) == 'player-applications') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/player-applications') ?>">
                                <i class="entypo-user"></i>
                                <span class="title">Cosplayer Applications </span>
                                <?php if ($player_application_count>0): ?>
                                    <span class="badge"><?= $player_application_count?></span>
                                <?php endif ?>
                            </a>
                        </li>
                        <li class="<?= ($this->uri->segment(3) == 'player-registrations') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/players/player-registrations') ?>">
                                <i class="entypo-user"></i>
                                <span class="title">Cosplayer Registrations </span>
                            </a>
                        </li>
                        <!-- <li class="<?= ($this->uri->segment(3) == 'reported-profiles') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/players/reported-profiles') ?>">
                                <i class="entypo-users"></i>
                                <span class="title">Reported Profiles</span>
                                <?php if ($reported_profiles_count>0): ?>
                                    <span class="badge"><?= $reported_profiles_count?></span>
                                <?php endif ?>
                            </a>
                        </li> -->
                    </ul>
                </li>
            <?php endif?>
            <li class="opened <?= ($this->uri->segment(2) == 'bookings') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/bookings') ?>">
                    <i class="fa fa-th-list"></i>
                    <span class="title">Bookings </span>
                </a>
            </li>
            <li class="opened <?= ($this->uri->segment(2) == 'characters') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/characters') ?>">
                    <i class="fa fa-th"></i>
                    <span class="title">Characters </span>
                </a>
            </li>
            <!-- <li class="opened <?= ($this->uri->segment(2) == 'policies') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/policies') ?>">
                    <i class="fa fa-th"></i>
                    <span class="title">Policies </span>
                </a>
            </li>
            <li class="opened <?= ($this->uri->segment(2) == 'questions') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/questions') ?>">
                    <i class="fa fa-th"></i>
                    <span class="title">Questions </span>
                </a>
            </li> -->
            <!-- <li class="opened <?= ($this->uri->segment(2) == 'jobs') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/jobs') ?>">
                    <i class="fa fa-th"></i>
                    <span class="title">Jobs </span>
                </a>
            </li>
            <li class="opened <?= ($this->uri->segment(2) == 'promocodes') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/promocodes') ?>">
                    <i class="fa fa-ticket"></i>
                    <span class="title">Promo Codes</span>
                </a>
            </li>
            <?php if(access(5)):?>
            <li class="opened <?= ($this->uri->segment(2) == 'chat') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/chat') ?>">
                    <i class="fa fa-comments"></i>
                    <span class="title">Chat Management</span>
                </a>
            </li> -->
            <?php endif?>
            <!--
            <li class=" <?= ($this->uri->segment(2) == 'comments') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="entypo-comment"></i>
                    <span class="title">Comments Management</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(3) == 'reported') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/comments/reported') ?>">
                            <i class="entypo-comment"></i>
                            <span class="title">Reported Comments</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'review') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/comments/review') ?>">
                            <i class="entypo-comment"></i>
                            <span class="title">Review Comments</span>
                        </a>
                    </li>
                </ul>
            </li>
             -->
            
            <!-- <li class="opened <?= ($this->uri->segment(2) == 'transactions') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/transactions') ?>">
                    <i class="fa fa-money"></i>
                    <span class="title">Transactions</span>
                </a>
            </li> -->
            
            <li class="opened <?= ($this->uri->segment(2) == 'withdrawals' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/withdrawals') ?>">
                    <i class="fa fa-money"></i>
                    <span class="title">Withdrawals</span>
                </a>
            </li>
            <li class="opened <?= ($this->uri->segment(2) == 'withdrawals' && $this->uri->segment(3) == 'requests') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/withdrawals/requests') ?>">
                    <i class="fa fa-money"></i>
                    <span class="title">Withdrawal Requests</span>
                    <?php $withdraw_count=count_panding_withdraws();?>
                    <?php if ($withdraw_count>0): ?>
                        <span class="badge"><?=$withdraw_count?></span>
                    <?php endif ?>
                </a>
            </li>
            <?php if(access(6)):?>
                <li class=" <?= ($this->uri->segment(2) == 'blog') ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">Blog Management</span>
                    </a>
                    <ul>
                        <li class=" <?= in_array($this->uri->segment(3), array('manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/blog') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Blog Articles</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'blog/categories') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/blog/categories') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif?>
            <?php if(access(6)):?>
                <li class="opened <?= ($this->uri->segment(2) == 'press') ? 'active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/press') ?>">
                        <i class="fa fa-th-list"></i>
                        <span class="title">Press Room</span>
                    </a>
                </li>
            <?php endif?>
            <?php if(access(6)):?>
                <li class=" <?= ($this->uri->segment(2) == 'resources') ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">Cosplayer Resource Management</span>
                    </a>
                    <ul>
                        <li class=" <?= ($this->uri->segment(3) == 'resources') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/resources') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Cosplayer Resource</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(3) == 'resources/categories') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/resources/categories') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif?>
            <!-- <?php if(access(6)):?>
                <li class=" <?= ($this->uri->segment(2) == 'help') ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">Help Management</span>
                    </a>
                    <ul>
                        <li class=" <?= ($this->uri->segment(2) == 'help') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/help') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Help</span>
                            </a>
                        </li>
                        <li class=" <?= ($this->uri->segment(2) == 'help/categories') ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/help/categories') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif?> -->
            <?php if(access(6)):?>
            <li class="opened <?= ($this->uri->segment(2) == 'founders') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/founders') ?>">
                    <i class="fa fa-th-list"></i>
                    <span class="title">Founders</span>
                </a>
            </li>
            <?php endif?>
            <?php if(access(7)):?>
            <!-- <li class="opened <?= ($this->uri->segment(2) == 'faq') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/faq') ?>">
                    <i class="fa fa-th-list"></i>
                    <span class="title">FAQ's</span>
                </a>
            </li> -->
            <?php endif?>
            <!-- <?php if(access(7)):?>
                <li class=" <?= ($this->uri->segment(2) == 'testimonials') ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">Testimonials Management</span>
                    </a>
                    <ul>
                        <li class=" <?= in_array($this->uri->segment(3), array('owners', 'owner-manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/testimonials/owners') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Owner Testimonials</span>
                            </a>
                        </li>
                        <li class=" <?= in_array($this->uri->segment(3), array('sitters', 'sitter-manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/testimonials/sitters') ?>">
                                <i class="fa fa-th-list"></i>
                                <span class="title">Sitter Testimonials</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif?> -->
            <?php if(access(7)):?>
                <!-- <li class=" <?= in_array($this->uri->segment(2), array('cities', 'states')) ? ' opened  active' : '' ?>">
                    <a href="javascript:void(0)">
                        <i class="fa fa-th"></i>
                        <span class="title">City/State Management</span>
                    </a>
                    <ul>
                        <li class=" <?= in_array($this->uri->segment(3), array('cities', 'manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/cities') ?>">
                                <i class="fa fa-th-large"></i>
                                <span class="title">Cites</span>
                            </a>
                        </li>
                        <li class=" <?= in_array($this->uri->segment(3), array('states', 'manage')) ? ' active' : '' ?>">
                            <a href="<?= site_url(ADMIN.'/states') ?>">
                                <i class="fa fa-th-large"></i>
                                <span class="title">States</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif?>-->
            <?php if(access(7)):?>
            <li class="opened <?= ($this->uri->segment(2) == 'newsletter') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/newsletter') ?>">
                    <i class="fa fa-file"></i>
                    <span class="title">Newsletter</span>
                </a>
            </li>
            <?php endif?>
            <?php if(access(8)):?>
            <li class=" <?= ($this->uri->segment(2) == 'sitecontent' || $this->uri->segment(2) == 'preferences') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-pagelines  "></i>
                    <span class="title">Manage Pages</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(3) == 'login') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/login') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Login</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'signup') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/signup') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Sign up</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'player-signup') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/player-signup') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Cosplayer Sign up</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'forgot') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/forgot') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Forgot Password</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'reset') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/reset') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Reset Password</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'phone-verify') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/phone-verify') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Phone Verification</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'email-verify') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/email-verify') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Email Verification</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'become-cosplayer') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/become-cosplayer') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Become Cosplayer</span>
                        </a>
                    </li>
                    <!-- 
                    <li class=" <?= ($this->uri->segment(3) == 'services') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/services') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Our Services</span>
                        </a>
                    </li><li class=" <?= ($this->uri->segment(3) == 'bannerimage') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/preferences/bannerimage') ?>">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Banner Image</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'footer-section') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/preferences/footer-section') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Footer Section</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'sitter_guidelines') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/sitter_guidelines') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Sitter Guidelines</span>
                        </a>
                    </li>
                     -->
                    <li class=" <?= ($this->uri->segment(3) == 'home') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/home') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'about') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/about') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">About</span>
                        </a>
                    </li>
                    <!-- 
                    <li class=" <?= ($this->uri->segment(3) == 'membership') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/membership') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Membership</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'safety') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/safety') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Safety</span>
                        </a>
                    </li>
                    -->
                    <li class=" <?= ($this->uri->segment(3) == 'player_resources') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/player_resources') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Resources</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'guarantee') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/guarantee') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Cosmos Guarantee</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'reservation_protection') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/reservation_protection') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Reservation Protection</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'contact') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/contact') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Contact Us</span>
                        </a>
                    </li>
                    <!-- <li class=" <?= ($this->uri->segment(3) == 'advertise') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/advertise') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Advertise with us</span>
                        </a>
                    </li> -->
                    <li class=" <?= ($this->uri->segment(3) == 'blog') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/blog') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Our Blog</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'press') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/press') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Press Rroom</span>
                        </a>
                    </li>
                    <!-- 
                    <li class=" <?= ($this->uri->segment(3) == 'help') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/help') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Help</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'search') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/search') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Search Page</span>
                        </a>
                    </li>
                     -->
                    <li class=" <?= ($this->uri->segment(3) == 'cookie_policy') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/cookie_policy') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Cookie Policy</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'privacy_policy') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/privacy_policy') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Privacy Policy</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'terms_conditions') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/terms_conditions') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Terms & conditions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif?>
            <?php if(is_admin()):?>
            
            <!-- <li class="opened <?= ($this->uri->segment(2) == 'texts') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN) ?>/texts">
                    <i class="fa fa-cog"></i>
                    <span class="title">Site Texts</span>
                </a>
            </li> -->
            <li class="opened <?= ($this->uri->segment(2) == 'settings' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/settings') ?>">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Site Settings</span>
                </a>
            </li>
            <?php endif?>
            <li class="opened">
                <a href="<?= site_url(ADMIN.'/settings/change') ?>">
                    <i class="fa fa-lock"></i>
                    <span class="title">Change Password</span>
                </a>
            </li>
        </ul>
    </div>
</div>