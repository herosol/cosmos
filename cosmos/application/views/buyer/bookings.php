<!doctype html>
<html>
<head>
<title>My Bookings – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
<?php get_header(); ?>
<main>


<section id="dash">
    <div id="booking">
        <div class="contain">
            <div class="head">
                <h1 class="secHeading">My Bookings</h1>
                <ul class="nav nav-tabs semi">
                    <li class="active"><a data-toggle="tab" href="#All">All</a></li>
                    <li><a data-toggle="tab" href="#Completed">Completed</a></li>
                    <li><a data-toggle="tab" href="#Pending">Pending</a></li>
                    <!-- <li><a data-toggle="tab" href="#Canceled">Canceled</a></li> -->
                </ul>
            </div>
            <div class="tab-content">
                <div id="All" class="tab-pane fade in active">
                    <div class="inside">
                    </div>
                </div>
                <div id="Completed" class="tab-pane fade">
                    <div class="inside">
                    </div>
                </div>
                <div id="Pending" class="tab-pane fade">
                    <div class="inside">
                    </div>
                </div>
                <!-- <div id="Canceled" class="tab-pane fade">
                    <div class="inside">
                    </div>
                </div> -->
                <div class="appLoad"><div class="appLoader"><span class="spiner"></span></div></div>
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
<script type="text/javascript">
    $(function(){
        var hash = window.location.hash;
        hash && $('.nav.nav-tabs li a[href="' + hash + '"]').tab('show');
        get_records();
        $('.nav.nav-tabs li a').click(function(e) {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop();
            window.location.hash = this.hash;
            $('html,body').scrollTop(scrollmem);
            hash = this.hash;
            get_records()
        });

        function get_records(){
            store = hash.replace('#', '');
            if (store=='') {
                hash = '#All';
                store = 'All';
            }
            $(hash+' div.inside').html('');
            $('.appLoad').fadeIn('fast');

            $.ajax({
                url: base_url+'bookings',
                data : {'store':store},
                dataType: 'JSON',
                method: 'POST',
                success: function(res){
                    if(res.found){
                        reached = res.reached;
                        load = res.load;
                        $(hash+' div.inside').html(res.items);
                    }
                },
                error: function(res){
                    console.log(res);
                },
                complete: function(res){
                    setTimeout(function(){
                        $('.appLoad').hide();
                        $(hash+' div.inside>.jobBlk').removeClass('hidden');
                    },1500)
                }
            });
        }

        ajaxSearch = false;
        var load = 1;
        var reached = false;

        $(window).scroll(function() {   
            if($(window).scrollTop() + $(window).height() >= $(document).height()-10) {
                if(reached)
                    return;
                $('.appLoad').fadeIn();
                $.ajax({
                    url: base_url+'bookings',
                    data : {'store':store, 'load':load},
                    dataType: 'JSON',
                    method: 'POST',
                    success: function(res){
                        if(res.found){
                            reached = res.reached;
                            load = res.load;
                            $(hash+' div.inside').append(res.items);
                        }
                    },
                    error: function(rs){
                        console.log(rs);
                    },
                    complete: function(res){
                        setTimeout(function(){
                            $('.appLoad').hide();
                            $(hash+' div.inside>.jobBlk').removeClass('hidden');
                        },1500)
                    }
                })
            }
        });
        
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
                        let detail_popup = $(".popup[data-popup='view-detail']");
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

        <?php if ($this->session->mem_type=='buyer'):?>
            $(document).on('click', 'div[data-popup="view-detail"] .bkNow', function(e){
                e.preventDefault()
                if(ajaxSearch)
                    return;

                var btn=$(this);
                var payment_method=$('#payment_method').val();
                var promocode=$('#promocode').val();
                var store=btn.data('store');
                if (store=='' || payment_method=='' || payment_method==null)
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
                        ajaxSearch = false;
                        needToConfirm = false;
                    }
                })
            });
            $(document).on("rateyo.set", '#rating', function(e, data){
                let rating = data.rating;
                $('input[name="rating"]').val(rating);
            });
        <?php endif?>
        $(document).on('reset', 'div[data-popup="view-detail"] form.frmAjax', function(e){
            let pupUpCBtn = $(this).parents('._inner').find('.crosBtn');
            setTimeout(function(){
                pupUpCBtn.trigger('click');
            },500)
        });
    });
</script>
</body>
</html>