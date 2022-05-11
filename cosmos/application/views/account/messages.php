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
                        <!--
                        <ul class="frnds scrollbar">
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
                        </ul>
                        -->
                    </div>
                </div>

                <div class="col col2">
                    <div class="chatBlk relative">
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
                                <?php if ($this->session->mem_type == 'player'): ?>
                                    <button type="button" class="colorBtn upBtn request-booking"><i class="fi-pencil"></i></button>
                                <?php endif ?>
                                <textarea class="txtBox scrollbar"name="msg" id="msg" placeholder="Type a message..." onkeypress="textAreaAdjust(this)" autofocus=""></textarea>
                                <button type="button" class="colorBtn uploadAtt" id=""><i class="fi-paperclip"></i></button>
                                <button type="submit" class="colorBtn"><i class="fi-arrow-right"></i></button>
                                <div class="bTn text-right">
                                    <!-- <button type="button" class="webBtn smBtn popBtn pull-left" data-popup="request-booking"><?= $this->session->mem_type == 'player' ? 'Schedule Booking' : 'Request Booking'?></button> -->
                                </div>
                            </form>
                            <input type="file" name="attachments[]" class="chatAtt hide" multiple="multiple">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->mem_type == 'player'): ?>
            <div class="popup small-popup" data-popup="request-booking">
                <div class="tableDv">
                    <div class="tableCell">
                        <div class="contain">
                            <div class="_inner">
                                <div class="crosBtn"></div>
                                <h2>Detail of work</h2>
                                <form action="<?= site_url('chat-booking/'.$encoded_id)?>" method="post" autocomplete="off" id="frmBkng">
                                    <div class="txtGrp">
                                        <h4>Type of work</h4>
                                        <select name="work_type" id="work_type" class="txtBox" required="">
                                            <option value="Event Promotion">Event Promotion</option>
                                            <option value="Convention Appearance">Convention Appearance</option>
                                            <option value="Photoshoot">Photoshoot</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="txtGrp">
                                        <h4>Date</h4>
                                        <input type="text" name="date" id="date" class="txtBox datepicker" placeholder="" data-date-start-date="0d" required="">
                                    </div>
                                    <div class="txtGrp">
                                        <h4>Number of hours</h4>
                                        <input type="number" name="hours" id="hours" min="0" class="txtBox" placeholder="" required="">
                                    </div>
                                    <div class="txtGrp">
                                        <h4>Rate</h4>
                                        <input type="number" name="rate" id="rate" min="0" class="txtBox" placeholder="" required="">
                                    </div>
                                    <div class="lblBtn txtGrp">
                                        <input type="checkbox" name="hotel_expense" id="hotel_expense" value="1">
                                        <label for="hotel_expense">Hotel/stay covered</label>
                                    </div>
                                    <div class="txtGrp">
                                        <h4>Extras</h4>
                                        <div class="extraBlk">
                                            <div class="formRow row">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                    <input type="text" name="title[]" class="txtBox" placeholder="Title" required="">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <input type="text" name="price[]" class="txtBox" placeholder="Price" required="">
                                                </div>
                                            </div>
                                            <div class="btnBlk">
                                                <button type="button" class="delBtn red-color">Delete</button>
                                                <button type="button" class="addBtn green-color">Add New</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bTn text-center">
                                        <button type="submit" class="webBtn colorBtn">Submit <i class="spinner hidden"></i></button>
                                    </div>
                                    <div class="alertMsg"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif?>
        <div class="popup detail-pupup" data-popup="view-detail">
            <div class="tableDv">
                <div class="tableCell">
                    <div class="contain">
                        <div class="_inner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dash -->


<!--
<script type="text/javascript">
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
</script>
-->
</main>
<?php $this->load->view('includes/footer');?>
<script type="text/javascript">
        $(function(){
            $(document).on('click', '.request-booking', function() {
                $('.extraBlk').find('.formRow').remove();
                $('body').addClass('flow');
                $('.popup[data-popup="request-booking"]').fadeIn().find('select:first').focus().end().find('form').find('div.alertMsg').html('').end().get(0).reset();
            });

            $(document).on('click', '#dash .extraBlk .addBtn', function() {
                $(this).parents('.btnBlk:first').before(`
                    <div class="formRow row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="title[]" class="txtBox" placeholder="Title" required="">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <input type="text" name="price[]" class="txtBox" placeholder="Price" required="">
                        </div>
                    </div>`);
            });

            $(document).on('click', '#dash .extraBlk .delBtn', function() {
                let blk = $(this).parents('.extraBlk').find('.formRow:last');
                // $(this).parents('form:first').append(`<input type="hidden" name="del_opts[]" value="${blk.find('input[type="hidden"]').val()}">`);
                blk.remove();
            });


            $(document).on('click', '.srchMsngr > button[type="button"] > i.fi-cross', function () {
                $(this).attr('class','fi-search');
                $('ul.frnds>li').removeClass('hidden');
                $('#srchFrnd').val('');
            });
            $(document).on('input', '#srchFrnd', function () {
                var icon=$('.srchMsngr > button[type="button"] > i');
                var keyword = $(this).val().toLowerCase();
                var count = 0;
                if(keyword.length == 0) {
                    icon.attr('class', 'fi-search')
                    $('ul.frnds>li').removeClass('hidden');
                    return false;
                }
                icon.attr('class', 'fi-cross')
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

            <?php if($is_push == ''):?>
                window.history.pushState({}, "", base_url+"messages/"+store);
            <?php endif?>

            $(document).on('submit', '#frmChat', function(e) {
                e.preventDefault();
                if(store == "" || sndMsg == false) {
                    return false;
                }

                var chtBtn = $(this).find("button[type='submit']");
                var chtBx = $(this).find("textarea");
                if(chtBx.val() == '' && $("input[name='attachs[]']").length < 1){
                    chtBx.focus();
                    return false;
                }
                chtBtn.attr("disabled", true);
                needToConfirm = true;

                var frm = this;
                var frmData = new FormData(frm);
                frmData.append('store', store)
                chtBx.attr("disabled", true);

                $.ajax({
                    url: "<?= site_url('send-msg')?>",
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
                


            $(document).on('submit','#frmBkng',function(e){
                e.preventDefault();
                needToConfirm = true;
                var frmbtn = $(this).find("button[type='submit']");
                var frmIcon = $(this).find("button[type='submit'] i.fa-spinner");
                var frmMsg = $(this).find("div.alertMsg:first");
                var frm = this;

                // frmbtn.attr("disabled", true);
                frmMsg.hide();
                frmIcon.removeClass("hidden");
                $.ajax({
                    url: $(this).attr('action'),
                    data : new FormData(frm),
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    method: 'POST',

                    error: function (rs) {
                        console.log(rs);
                    },
                    success: function (rs) {
                        console.log(rs);
                        if (rs.status == 1) {
                            $.ajax({
                                url: base_url+'send-noti-msg',
                                data : {'store':store,'booking':rs.booking<?= $this->session->mem_type=='player'?",'type':'tt'":''?>},
                                dataType: 'JSON',
                                method: 'POST',
                                success: function (res) {

                                    $('.chat>p').remove();
                                    $('.chat').append(res.msg);
                                    var frnd_order = $('.frnds >li[data-chat="'+store+'"]').index();
                                    if(frnd_order>0){
                                        $(".frnds >li:eq(0)").before($(".frnds >li:eq("+frnd_order+")"));
                                    }
                                    setTimeout(function () {
                                        frmbtn.attr("disabled", false);
                                        frmIcon.addClass("hidden");
                                        frm.reset();
                                        $('.popup[data-popup= "request-booking"] .crosBtn').trigger('click');
                                        $('.chat').scrollTop($('.chat').prop("scrollHeight"));
                                    }, 3000);
                                }
                            })
                        } else {
                            frmMsg.html(rs.msg).slideDown(500);
                            if(rs.scroll_to_msg)
                                $('html, body').animate({ scrollTop: frmMsg.offset().top-300}, 'slow');
                            setTimeout(function () {
                                frmbtn.attr("disabled", false);
                                frmIcon.addClass("hidden");
                            }, 1500);
                        }
                    },
                    complete: function (rs) {
                        needToConfirm = false;
                    }
                });
            });
            <?php if ($this->session->mem_type=='buyer'): ?>
                $(document).on('click', 'div[data-popup="view-detail"] .bkNow', function(e){
                    e.preventDefault()

                    var btn=$(this);
                    var payment_method=$('#payment_method').val();
                    var promocode=$('#promocode').val();
                    var store=btn.data('store');
                    if (store=='' || payment_method=='')
                        return false;
                    needToConfirm = true;

                    btn.attr("disabled", true);
                    btn.find("i.fa-spinner").removeClass('hidden');
                    $('div[data-popup="view-detail"] .alertMsg:first').html('');
                    $.ajax({
                        url: base_url+'/book-now',
                        data : {'store':store,'payment_method':payment_method,'promocode':promocode,'payment_type':'saved-card'},
                        dataType: 'JSON',
                        method: 'POST',
                        success: function (rs) {
                            setTimeout(function(){
                                if(rs.status===1){
                                    btn.parents('div._inner').append(rs.data);
                                    btn.parents('.svdCards').remove();
                                    $('div[data-popup="view-detail"] .alertMsg:first, div[data-popup="view-detail"] form').remove();
                                }
                                else{
                                    $('div[data-popup="view-detail"] .alertMsg:first').html(rs.msg)
                                    btn.attr("disabled", false);
                                    btn.find("i.fa-spinner").addClass('hidden');
                                }
                            },1000)
                        },
                        error: function(rs){
                            console.log(rs);
                        },
                        complete: function (rs) {
                            needToConfirm = false;
                        }
                    })
                })
                $(document).on('submit', 'div[data-popup="view-detail"] form.frmCreditCard', function(e){
                    e.preventDefault()
                    var frmbtn=$(this).find("button[type='submit']");
                    var frmIcon=frmbtn.find("i.fa-spinner");
                    var frmMsg=$(this).find("div.alertMsg:first");
                    var frm=this;

                    var store=frmbtn.data('store');
                    if (store=='')
                        return false;
                    needToConfirm = true;

                    frmbtn.attr("disabled", true);
                    frmIcon.removeClass("hidden");
                    frmMsg.html('');

                    var formData = new FormData(frm);
                    formData.append('store', store);
                    $.ajax({
                        url: base_url+'/book-now',
                        data : formData,
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        method: 'POST',
                        success: function (rs) {
                            setTimeout(function(){
                                if(rs.status===1){
                                    frmbtn.parents('div._inner').append(rs.data);
                                    frmbtn.parents('.svdCards').remove();
                                    $(frm).remove();
                                }
                                else{
                                    frmMsg.html(rs.msg)
                                    frmbtn.attr("disabled", false);
                                    frmbtn.find("i.fa-spinner").addClass('hidden');
                                }
                            },1000)
                        },
                        error: function(rs){
                            console.log(rs);
                        },
                        complete: function (rs) {
                            needToConfirm = false;
                        }
                    })
                })
                $(document).on('click', 'div[data-popup="view-detail"] .addCard,div[data-popup="view-detail"]  .cnclBtnNCard', function(){
                    $('div[data-popup="view-detail"] form,div[data-popup="view-detail"]  .svdCards').slideToggle();
                });
            <?php endif?>
            ajaxSearch=false;
            <?php if ($this->session->mem_type=='tutor'): ?>
                $(document).on('click','div[data-popup="view-detail"] a.actn-btn',function(e){
                    e.preventDefault()
                    if(ajaxSearch)
                        return;
                    ajaxSearch=true;
                    var btn=$(this);
                    var rdstore=btn.data('store');
                    var link=btn.data('link');
                    if (rdstore=='' || link=='')
                        return false;
                    if (btn.data("disabled"))
                        return false;
                    if (link=='reject-booking-request')
                     if(!confirm('Are you sure ?'))
                        return false;
                    needToConfirm = true;


                    btn.data("disabled", "disabled");
                    btn.find("i.fa-spinner").removeClass('hidden');
                    $.ajax({
                        url: base_url+'/'+link,
                        data : {'store':rdstore},
                        dataType: 'JSON',
                        method: 'POST',
                        success: function (rs) {
                            if(rs.status===1){
                                $.ajax({
                                    url: base_url+'send-noti-msg',
                                    data : {'store':store,'booking':rdstore},
                                    dataType: 'JSON',
                                    method: 'POST',
                                    success: function (res) {
                                        if(res.status==1){

                                            btn.parents('div.bTn').after(rs.data);
                                            btn.parents('div.bTn').remove();
                                /*setTimeout(function () {
                                    $('div[data-popup="view-detail"] .crosBtn').trigger('click');
                                }, 1500);*/

                            }
                        },
                        error: function(res){
                            console.log(res);
                        },
                    })
                            }
                            else
                                alert('Something went wrong!')
                        },
                        error: function(rs){
                            console.log(rs);
                        },
                        complete: function (rs) {
                            ajaxSearch=false;
                            needToConfirm = false;
                        }
                    })
                })
            <?php endif?>
        $(document).on('click','a.view-detail',function(e){
            e.preventDefault()
            if(ajaxSearch)
                return;
            ajaxSearch=true;
            needToConfirm = true;
            var btn=$(this);
            var rdStore=btn.data('store');
            var link=btn.data('link');
            if (rdStore=='' || link=='')
                return false;

            var image = $(this).attr('data-image');
            var name = $(this).attr('data-name');
            var mem_id = $(this).attr('data-mem');

            $.ajax({
                url: base_url+'/'+link,
                data : {'store':rdStore, 'image': image, 'name': name, 'mem_id': mem_id},
                dataType: 'JSON',
                method: 'POST',
                success: function (rs) {
                    if(rs.status===1){
                        $('body').addClass('flow');
                        var detail_popup=$(".popup[data-popup='view-detail']");
                        detail_popup.find('._inner').html(rs.data);
                        refresh_rateYo();
                        refresh_selectpicker();
                        detail_popup.fadeIn();
                    }
                    else
                        alert('Something went wrong!')
                },
                error: function(rs){
                    console.log(rs);
                },
                complete: function (rs) {
                    ajaxSearch=false;
                    needToConfirm = false;
                }
            })
        })


                
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
</script>
</body>
</html>