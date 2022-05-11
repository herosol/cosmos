<!doctype html>
<html>
<head>
<title>Inbox – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="inbox">
        <div class="contain">
            <div class="flexRow flex">
                <div class="col col1">
                    <div class="barBlk relative">
                        <!-- <div class="srchMsngr">
                            <input type="text" id="srchFrnd" placeholder="Search" class="txtBox">
                            <button type="button"><i class="fi-search"></i></button>
                        </div> -->
                        <h3 class="color">My Chat List</h3>
                        <ul class="frnds scrollbar">
                            <?php if (count($msg_header)<1): ?>
                                <li data-chat="">
                                    No chat available
                                </li>
                            <?php endif ?>
                            <?php foreach ($msg_header as $key => $head_msg): ?>
                                <li data-chat="<?= doEncode($head_msg->mem_one==$this->session->mem_id?$head_msg->mem_two:$head_msg->mem_one)?>"<?=$sender_row->mem_id==$head_msg->mem_one || $sender_row->mem_id==$head_msg->mem_two?' class="active"':'';?>>
                                    <div class="inner<?= (!in_array($sender_row->mem_id,array($head_msg->mem_one,$head_msg->mem_two)) && $head_msg->msg_row->status=='new' && $head_msg->msg_row->sender_id<>$this->session->mem_id)?' sms':''?>">
                                        <div class="ico"><img src="<?= get_image_src(get_mem_image($head_msg->mem_one==$this->session->mem_id?$head_msg->mem_two:$head_msg->mem_one),50,true)?>" alt=""></div>
                                        <div class="txt">
                                            <h5><?= get_mem_name($head_msg->mem_one==$this->session->mem_id?$head_msg->mem_two:$head_msg->mem_one)?></h5>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <!-- <ul class="frnds scrollbar">
                            <li data-chat="person1" class="active">
                                <div class="inner sms">
                                    <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg') ?>" alt=""></div>
                                    <div class="txt">
                                        <h5>Chris Gale</h5>
                                        <div class="cntnt">Celestial bodies that capture</div>
                                        <div class="time">12 minutes</div>
                                    </div>
                                </div>
                            </li>
                            <li data-chat="person2">
                                <div class="inner">
                                    <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg') ?>" alt=""></div>
                                    <div class="txt">
                                        <h5>Jennifer Kem</h5>
                                        <div class="cntnt">Celestial bodies that capture</div>
                                        <div class="time">12 minutes</div>
                                    </div>
                                </div>
                            </li>
                            <li data-chat="person3">
                                <div class="inner sms">
                                    <div class="ico"><img src="<?= base_url('assets/images/users/4.jpg') ?>" alt=""></div>
                                    <div class="txt">
                                        <h5>John Wick</h5>
                                        <div class="cntnt">Celestial bodies that capture</div>
                                        <div class="time">12 minutes</div>
                                    </div>
                                </div>
                            </li>
                            <li data-chat="person4">
                                <div class="inner">
                                    <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg') ?>" alt=""></div>
                                    <div class="txt">
                                        <h5>Sofia Safinaz</h5>
                                        <div class="cntnt">Celestial bodies that capture</div>
                                        <div class="time">12 minutes</div>
                                    </div>
                                </div>
                            </li>
                            <li data-chat="person5">
                                <div class="inner">
                                    <div class="ico"><img src="<?= base_url('assets/images/users/7.jpg') ?>" alt=""></div>
                                    <div class="txt">
                                        <h5>James Smith</h5>
                                        <div class="cntnt">Celestial bodies that capture</div>
                                        <div class="time">12 minutes</div>
                                    </div>
                                </div>
                            </li>
                            <li data-chat="person6">
                                <div class="inner">
                                    <div class="ico"><img src="<?= base_url('assets/images/users/8.jpg') ?>" alt=""></div>
                                    <div class="txt">
                                        <h5>Alina Gill</h5>
                                        <div class="cntnt">Celestial bodies that capture</div>
                                        <div class="time">12 minutes</div>
                                    </div>
                                </div>
                            </li>
                            <li data-chat="person7">
                                <div class="inner sms">
                                    <div class="ico"><img src="<?= base_url('assets/images/users/7.jpg') ?>" alt=""></div>
                                    <div class="txt">
                                        <h5>Michael Jexon</h5>
                                        <div class="cntnt">Celestial bodies that capture</div>
                                        <div class="time">12 minutes</div>
                                    </div>
                                </div>
                            </li>
                            <li data-chat="person8">
                                <div class="inner">
                                    <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg') ?>" alt=""></div>
                                    <div class="txt">
                                        <h5>Sonatham King</h5>
                                        <div class="cntnt">Celestial bodies that capture</div>
                                        <div class="time">12 minutes</div>
                                    </div>
                                </div>
                            </li>
                        </ul> -->
                    </div>
                </div>

                <div class="col col2">
                    <!-- <div class="chatBlk relative">
                        <div class="chatPerson">
                            <div class="backBtn"><a href="javascript:void(0)"><i class="fi-arrow-left"></i></a></div>
                            <div class="ico"><img src="<?= get_image_src($sender_row->mem_image, 50, true)?>" alt=""></div>
                            <h3><?= ucwords($sender_row->mem_fname.' '.$sender_row->mem_lname)?></h3>
                        </div>
                        <div class="chat scrollbar active" data-chat="person1">
                            <?php if(count($msgs_rows)<1):?>
                                <p class="text-center">No message available</p>
                            <?php endif?>
                            <?php foreach ($msgs_rows as $key => $msg_row): ?>
                                <?php if($msg_row->msg_type=='booking'):?>
                                    <?= $msg_row->booking->txt?>
                                    <?php continue?>
                                <?php endif?>
                                <?php if($msg_row->sender_id==$this->session->mem_id):?>
                                    <div class="buble me">
                                        <div class="ico"><img src="<?= get_image_src($mem_data->mem_image,50,true)?>" alt=""></div>
                                        <div class="cntnt">
                                            <div class="time"><?= format_date($msg_row->time,'h:i a - F d, Y')?></div>
                                            <?=nl2br($msg_row->msg)?>
                                            <?php if(count($msg_row->attachments)>0):?>
                                                <div class="atch">
                                                    <?php foreach($msg_row->attachments as $index=> $attch):?>
                                                        <span><a href="<?= SITE_VPATH.'attachments/'.$attch->attachment?>" target="_blank"><i class="fi-link"></i> <?= $attch->att_name?></a></span>
                                                    <?php endforeach?>
                                                </div>
                                            <?php endif?>
                                        </div>
                                    </div>
                                <?php else:?>
                                    <div class="buble you">
                                        <div class="ico"><img src="<?= get_image_src($sender_row->mem_image,50,true)?>" alt=""></div>
                                        <div class="cntnt">
                                            <div class="time"><?= format_date($msg_row->time,'h:i a - F d, Y')?></div>
                                            <?= nl2br($msg_row->msg)?>
                                            <?php if(count($msg_row->attachments)>0):?>
                                                <div class="atch">
                                                    <?php foreach($msg_row->attachments as $index=> $attch):?>
                                                        <span><a href="<?= SITE_VPATH.'attachments/'.$attch->attachment?>" target="_blank"><i class="fi-link"></i>  <?= $attch->att_name?></a></span>
                                                    <?php endforeach?>
                                                </div>
                                            <?php endif?>
                                        </div>
                                    </div>
                                <?php endif?>
                            <?php endforeach ?>
                        </div>
                        <div class="write">
                            <form class="relative" id="frmChat">
                                <div class="filesAtch"></div>
                                <div class="inBlk">
                                    <textarea class="txtBox scrollbar"name="msg" id="msg" placeholder="Type a message..." onkeypress="textAreaAdjust(this)" autofocus=""></textarea>
                                    <button type="submit" class="colorBtn"><i class="fi-arrow-right"></i></button>
                                    <button type="button" class="colorBtn uploadAtt" id=""><i class="fi-link"></i></button>
                                </div>
                                <div class="bTn text-right clearfix">
                                    <button type="button" class="webBtn smBtn popBtn pull-left" data-popup="request-booking"><?= $this->session->mem_type == 'player' ? 'Schedule Booking' : 'Request Booking'?></button>
                                </div>
                            </form>
                            <input type="file" name="attachments[]" class="chatAtt hide" multiple="multiple">
                        </div>

                    </div> -->
                    <div class="chatBlk relative">
                        <div class="chatPerson">
                            <div class="backBtn"><a href="javascript:void(0)"><i class="fi-arrow-left"></i></a></div>
                            <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                            <h3>Barbara Jones</h3>
                        </div>
                        <div class="chat scrollbar active" data-chat="person1">
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Hello</div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">it's me.</div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I was wondering...</div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="blk" data-popup="invoice">Jennifer K sent an invoice
                                <span class="date">click to view</span>
                            </a>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Hello, can you hear me? </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I'm in California dreaming</div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">About who we used to be. </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Are you serious?</div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">When we were younger and free... </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I've forgotten how it felt before </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Holisticly productize full tested relationships rather next generation mindshare. Compell productivate extensive and flexible imperative. Seamless for transform out of-the-box channels through of client focused process.</div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Are you serious?</div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">When we were younger and free... </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I've forgotten how it felt before </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Holisticly productize full tested relationships rather next generation mindshare. Compell productivate extensive and flexible imperative. Seamless for transform out of-the-box channels through of client focused process.</div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Hymm ok.</div>
                                </div>
                            </div>
                        </div>
                        <div class="chat scrollbar" data-chat="person2">
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Hello, can you hear me? </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I'm in California dreaming </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">... about who we used to be. </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Are you serious? </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">When we were younger and free... </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I've forgotten how it felt before </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">... about who we used to be. </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Are you serious?</div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">When we were younger and free... </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/2.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I've forgotten how it felt before</div>
                                </div>
                            </div>
                        </div>
                        <div class="chat scrollbar" data-chat="person3">
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Hey human! </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Umm... Someone took a shit in the hallway. </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">... what. </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Are you serious? </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I mean... </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">It's not that bad... </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/3.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">But we're probably gonna need a new carpet.</div>
                                </div>
                            </div>
                        </div>
                        <div class="chat scrollbar" data-chat="person4">
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Hey human! </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Umm... Someone took a shit in the hallway. </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/4.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">... what. </div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/4.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">Are you serious? </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">I mean... </div>
                                </div>
                            </div>
                            <div class="buble me">
                                <div class="ico"><img src="<?= base_url('assets/images/users/1.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">It's not that bad... </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat scrollbar" data-chat="person5">
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">What's up</div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">What's up</div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">What's up</div>
                                </div>
                            </div>
                            <div class="buble you">
                                <div class="ico"><img src="<?= base_url('assets/images/users/5.jpg')?>" alt=""></div>
                                <div class="txt">
                                    <div class="time">11:59 am</div>
                                    <div class="cntnt">What's up for the third time like is you bling bitch</div>
                                </div>
                            </div>
                        </div>
                        <div class="chat scrollbar" data-chat="person6"></div>
                        <div class="chat scrollbar" data-chat="person7"></div>
                        <div class="chat scrollbar" data-chat="person8"></div>
                        <div class="write">
                            <div class="filesAtch">
                                <span><i class="fi-cross-circle"></i> words <em></em></span>
                                <span class="fail"><i class="fi-cross-circle"></i> words <em></em></span>
                            </div>
                            <form class="relative">
                                <button type="button" class="colorBtn upBtn popBtn" data-popup="upload-files" title="Upload Files"><i class="fi-link"></i></button>
                                <textarea class="txtBox" placeholder="Type a message..." onkeypress="textAreaAdjust(this)"></textarea>
                                <!-- <input type="file" id="uploadFile" name="uploadFile" class="uploadFile" data-file=""> -->
                                <button type="submit" class="colorBtn"><i class="fi-arrow-right"></i></button>
                                <!-- <button type="button" class="colorBtn uploadImg" data-image-src=""><i class="fi-link"></i></button> -->
                                <div class="bTn text-right">
                                    <!-- <button type="button" class="webBtn smBtn uploadImg" data-image-src=""></button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup small-popup" data-popup="upload-files">
        <div class="tableDv">
            <div class="tableCell">
                <div class="contain">
                    <div class="_inner">
                        <div class="crosBtn"></div>
                        <h2>Detail of work</h2>
                        <form action="" method="post">
                            <div class="txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Title">
                            </div>
                            <div class="txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Days">
                            </div>
                            <div class="txtGrp">
                                <input type="text" name="" id="" class="txtBox" placeholder="Cost">
                            </div>
                            <div class="txtGrp">
                                <textarea name="" id="" class="txtBox" placeholder="Description"></textarea>
                            </div>
                            <div class="bTn text-center">
                                <button type="submit" class="webBtn colorBtn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dash -->


<!-- <script type="text/javascript">
    $(function(){
        $(document).on('click', '#inbox .barBlk .frnds > li', function(){
            if ($(this).hasClass('.active')){
                return false;
            } else {
                var chat = $(this).attr('data-chat');
                $('#inbox .chat').removeClass('active');
                $('#inbox .frnds li').removeClass('active');
                $(this).addClass('active');
                $('#inbox .chat[data-chat = ' + chat + ']').addClass('active');
            }
        });
        $(document).on('click', '#inbox .frnds li', function() {
            $('#inbox .chatBlk').addClass('active');
        });
        $(document).on('click', '#inbox .chatPerson .backBtn', function(){
            $('#inbox .chatBlk').removeClass('active');
        });
    });
    function textAreaAdjust(o) {
        o.style.height = '1px';
        o.style.height = (25 + o.scrollHeight) + 'px';
    }
</script> -->
</main>
<?php $this->load->view('includes/footer');?>
<!--<script type="text/javascript">
            $(function(){
                $(document).on('click', '.srchMsngr > button[type="button"] > i.fi-cross', function () {
                    $(this).attr('class','fi-search');
                    $('ul.frnds>li').removeClass('hidden');
                    $('#srchFrnd').val('');
                })
                $(document).on('input', '#srchFrnd', function () {
                    var icon=$('.srchMsngr > button[type="button"] > i');
                    var keyword = $(this).val().toLowerCase();
                    var count = 0;
                    if(keyword.length==0){
                        icon.attr('class','fi-search')
                        $('ul.frnds>li').removeClass('hidden');
                        return false;
                    }
                    icon.attr('class','fi-cross')
                    $('ul.frnds>li>p.name').each(function () {
                        var str = $(this).text().toLowerCase();

                        if (str.indexOf(keyword) >= 0) {
                            $(this).parent('li').removeClass('hidden');
                        } else {
                            $(this).parent('li').addClass('hidden');
                        }
                    });
                });
                $('.chat').scrollTop($('.chat').prop("scrollHeight"));
                var store='<?= $encoded_id?>';

                <?php if($is_push==''):?>
                    window.history.pushState({}, "", base_url+"messages/"+store);
                <?php endif?>

                $(document).on('submit','#frmChat',function(e){
                    e.preventDefault();
                    if(store=="" || sndMsg==false){
                        return false;
                    }

                    var chtBtn=$(this).find("button[type='submit']");
                    var chtBx=$(this).find("textarea");
                    if(chtBx.val()=='' && $("input[name='attachs[]']").length<1){
                        chtBx.focus();
                        return false;
                    }
                    chtBtn.attr("disabled", true);
                    needToConfirm = true;

                    var frm=this;
                    var frmData=new FormData(frm);
                    frmData.append('store',store)
                    chtBx.attr("disabled", true);

                    $.ajax({
                        url: "<?=site_url('send-msg')?>",
                        data: frmData,
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        method: 'POST',
                        success: function( data ){
                            console.log(data);
                            if(data.status>0){
                                $('.chat>p').remove();
                                $('.chat').append(data.msg);
                                var frnd_order=$('.frnds >li[data-chat="'+store+'"]').index();
                                if(frnd_order>0){
                                    $(".frnds >li:eq(0)").before($(".frnds >li:eq("+frnd_order+")"));
                                }
                                $('.frnds >li[data-chat="'+store+'"]').find('.preview').html(data.sidemsg);
                                $('.frnds >li[data-chat="'+store+'"]').find('.time').html(data.time);

                                $(frm).find("input[name='attachs[]']").remove();
                                frm.reset();
                                $('.uploadFile').val();
                                $('.filesAtch').html('');

                            }
                            else
                                alert(data.msg);
                        },
                        complete: function(){
                            needToConfirm = false;
                            chtBtn.attr("disabled", false);
                            chtBx.attr("disabled", false);
                            chtBx.focus();
                            $('.chat').scrollTop($('.chat').prop("scrollHeight"));
                        }
                    })
                })
                
                
                ajaxSearch=false;
                
        /*$(document).on('keydown',"textarea[name='msg']",function(e){
            if (e.keyCode === 13 && e.ctrlKey) {
                $(this).val(function(i,val){
                    return val + "\n";
                });
            }
            else if (e.keyCode === 13 && !e.ctrlKey) {
                e.preventDefault();
                $('#frmChat').submit();

            } 
        })*/
        $(document).on('keydown',"textarea[name='msg']",function(e){
            if (e.keyCode === 13 && (e.ctrlKey || e.shiftKey)) {
                var val = this.value;
                if (typeof this.selectionStart == "number" && typeof this.selectionEnd == "number") {
                    var start = this.selectionStart;
                    this.value = val.slice(0, start) + "\n" + val.slice(this.selectionEnd);
                    this.selectionStart = this.selectionEnd = start + 1;
                } else if (document.selection && document.selection.createRange) {
                    this.focus();
                    var range = document.selection.createRange();
                    range.text = "\r\n";
                    range.collapse(false);
                    range.select();
                }
                return false;
            }else if (e.keyCode === 13 && !e.ctrlKey && !e.shiftKey) {
                e.preventDefault();
                $(this).parents('form#frmChat').submit();
            }
        })

        setInterval(function(){
            $.ajax({
                method: "POST",
                url: "<?=site_url('get-chat')?>",
                dataType: 'json',
                data:{'store':store},
                success: function( data ){
                    if(data.status>0){
                        $('.chat>p').remove();
                        if(data.msg && data.msg!=''){
                            $('.chat').append(data.msg);

                            var frnd_order=$('.frnds >li[data-chat="'+store+'"]').index();
                            if(frnd_order>0){
                                $(".frnds >li:eq(0)").before($(".frnds >li:eq("+frnd_order+")"));
                            }
                            
                            $('.chat').scrollTop($('.chat').prop("scrollHeight"));
                        }

                        /*$('.frnds >li[data-chat="'+store+'"]').find('.preview').html(data.sidemsg);
                        $('.frnds >li[data-chat="'+store+'"]').find('.time').html(data.time);*/

                    }
                    else
                        alert(data.msg);
                    // console.log(data);
                },
                complete: function(data){
                }
            })
        }, 3000);
    })
</script>-->
</body>
</html>