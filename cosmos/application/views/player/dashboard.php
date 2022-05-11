<!doctype html>
<html>
<head>
<title>Dashboard - <?=$site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="dashboard">
        <div class="contain">
            <?= showMsg()?>
            <div class="head">
                <h1 class="secHeading">Dashboard</h1>
            </div>
            <div class="blk topBlk">
                <div class="icoBlk">
                    <div class="ico"><img src="<?= get_image_src($mem_data->mem_image,'150',true)?>" alt="<?= format_name($mem_data->mem_fname,$mem_data->mem_lname)?>"></div>
                    <h3>Welcome back, <?= $mem_data->mem_fname?>! <span class="regular">Nice to see you again.</span></h3>
                </div>
                <ul class="blkLst text-center">
                    <li>
                        <div class="price_bold"><?= $total_completed_vacays?></div>
                        <strong>Completed Vacays</strong>
                    </li>
                    <li>
                        <div class="price_bold"><?= format_amount($total_earning)?></div>
                        <strong>Total Earned</strong>
                    </li>
                    <li>
                        <div class="price_bold"><?= $avg_mem_rating?>/5</div>
                        <strong>Reviews <em>(<?= $review_count?>)</em></strong>
                    </li>
                </ul>
            </div>
            <?php if (!empty($pkg_row) && empty($pkg_row->one_time)): ?>
                <div class="blk mshipBlk" style="display: none !important;">
                    <div class="txt">
                        <h4 class="color">Membership</h4>
                        <!-- <p>Note: If you cancel membership, your profile will not appear in search results.</p> -->
                    </div>
                    <div class="switchBtn">
                        <input type="checkbox" name="membership" id="membership"<?= !empty($mem_data->mem_membership_auto)?' checked=""':''?>>
                    </div>
                </div>
            <?php endif ?>
            <div class="head">
                <h1 class="secHeading">My Jobs</h1>
            </div>
            <div class="inside">
                <?php if (count($bookings)<1): ?>
                    <div class="semi color">No job available</div>
                <?php endif?>
                <?php foreach ($bookings as $key => $booking): ?>
                    <div class="jobBlk">
                        <ul class="lst">
                            <li>
                                <div class="icoBlk">
                                    <div class="ico"><img src="<?= get_image_src($booking->mem_image, 300, true)?>" alt="<?= $booking->mem_name?>"></div>
                                    <div class="name"><?= $booking->mem_name?> <em><?= $booking->work_type?></em></div>
                                </div>
                            </li>
                            <li class="price_bold"><?= format_amount($booking->amount)?></li>
                            <li class="date"><?= format_date($booking->start_date)?></li>
                            <li><?= get_confirmed_status($booking)?></li>
                        </ul>
                        <a href="javascript:void(0)" class="view-detail" data-link="<?= ($booking->status == 2 ? "booking-detail" : "get-request-detail")?>" data-store="<?= $booking->encoded_id?>"></a>
                    </div>
                <?php endforeach ?>
            </div>

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
    </div>
</section>
<!-- dash -->


</main>
<?php $this->load->view('includes/footer');?>
<?php //if (!empty($pkg_row) && empty($pkg_row->one_time)): ?>
<script type="text/javascript">
    $(function() {
        /*$(document).on('click', '#membership', function() {
            if (!this.checked)
                return confirm('Are you sure, You want to cancel?');
        })
        $(document).on('change', '#membership', function() {
            let membership = this.checked;
            $.post(base_url+'save-membership', {'membership':membership},function(rs){})
        })
*/
        ajaxSearch = false;
        
        $(document).on('click', 'a.view-detail', function(e) {
            e.preventDefault();
            if(ajaxSearch)
                return;
            let btn = $(this);
            let store = btn.data('store');
            let link = btn.data('link');
            if (store == '' || link == '')
                return false;
            needToConfirm = true;
            $.ajax({
                url: base_url+link,
                data : {'store':store},
                dataType: 'JSON',
                method: 'POST',
                success: function (rs) {
                    if(rs.status===1){
                        btn.find('span').remove();
                        $('body').addClass('flow');
                        let detail_popup=$(".popup[data-popup='view-detail']");
                        detail_popup.find('._inner').html(rs.data);
                        refresh_rateYo();
                        refresh_timepicker();
                        refresh_datepicker();
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
                    ajaxSearch = false;
                    needToConfirm = false;
                }
            });
        });

        $(document).on('click','a.mActn-btn',function(e) {
            e.preventDefault();
            if(ajaxSearch)
                return;
            let btn = $(this);
            let store = btn.data('store');
            let link=btn.data('link');
            if (store == '' || link == '')
                return false;
            if (btn.data("disabled"))
                return false;
            needToConfirm = true;

            btn.attr("disabled", true);
            btn.find("i.fa-spinner").removeClass('hidden');

            $.ajax({
                url: base_url+'/'+link,
                data : {'store':store},
                dataType: 'JSON',
                method: 'POST',
                success: function (rs) {
                    if(rs.status === 1){
                        setTimeout(function(){
                            let detail_popup = $(".popup[data-popup='view-detail']");
                            detail_popup.find('._inner').html(rs.data);
                            refresh_rateYo();
                            refresh_timepicker();
                            refresh_datepicker();
                        },1000)
                    }
                    else
                        alert('Something went wrong!')
                },
                error: function(rs){
                    console.log(rs);
                },
                complete: function (rs) {
                    ajaxSearch = false;
                    needToConfirm = false;
                }
            })
        });
        
        $(document).on('reset', 'div[data-popup="view-detail"] form.frmAjax', function(e){
            let pupUpCBtn = $(this).parents('._inner').find('.crosBtn');
            setTimeout(function(){
                pupUpCBtn.trigger('click');
            },500)
        });
    });
</script>
<?php// endif?>
</body>
</html>