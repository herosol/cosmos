<!doctype html>
<html>
<head>
    <title><?= !empty($site_content['page_title'])?$site_content['page_title'].' - ':'Membership Levels - '?><?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="membership">
        <div class="blocks company">
            <div class="contain">
                <?= showMsg()?>
                <div class="flexRow flex">
                    <div class="col col1">
                        <div class="content">
                            <h1 class="secHeading"><?= $site_content['first_left_heading']?></h1>
                            <p class="pre"><?= $site_content['first_left_detail']?></p>
                        </div>
                    </div>
                    <div class="col col2">
                        <div class="planBlk basic selected smBlk">
                            <h2 class="regular color2"><?= $site_content['first_right_heading']?></h2>
                            <?= $site_content['first_right_detail']?>
                            <div class="imgLst">
                                <img src="<?= base_url('assets/images/half_dot_left.svg')?>" alt="">
                                <img src="<?= base_url('assets/images/half_dot_right.svg')?>" alt="">
                                <img src="<?= base_url('assets/images/dot_bottom.svg')?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blocks plans">
            <div class="contain">
                <h1 class="secHeading text-center"><?= $site_content['second_heading']?></h1>
                <ul class="lst flex">
                    <?php foreach ($packages as $key => $pkg): ?>
                        <li>
                            <div class="planBlk basic<?= $mem_data->mem_package_id==$pkg->id?' selected':''?>">
                                <div class="type semi"><?= $pkg->title?></div>
                                <div class="price">$<?= $pkg->monthly_price?><em>/Month</em> <small>$<?=$pkg->yearly_price?>/Year<?= $pkg->device_price>0?' + Device cost':''?></small></div>
                                <!-- <?= $pkg->overview?> -->
                                <ul class="list">
                                    <?php
                                    $detail = unserialize($pkg->detail);
                                    ?>
                                    <?php for ($i = 1; $i <= count($detail); $i++): ?>
                                        <li><?= $detail[$i]->list_item?>
                                            <?php if (isset($detail[$i]->list_item_tip) && !empty($detail[$i]->list_item_tip)): ?>
                                                <span class="info">
                                                    <i class="fi-question-circle"></i>
                                                    <div class="infoIn">
                                                        <p class="semi"><?= $detail[$i]->list_item_tip?></p>
                                                    </div>
                                                </span>
                                            <?php endif ?>
                                        </li>
                                    <?php endfor ?>
                                </ul>
                                <div class="bTn">
                                    <?php if ($mem_data->mem_package_id==$pkg->id): ?>
                                        <?php if ($mem_data->mem_pkg_status==2): ?>
                                            <a href="<?= site_url('pay-package/'.$pkg->id)?>">Expired </a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)">Selected </a>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <a href="<?= site_url('pay-package/'.$pkg->id)?>"><?= empty($mem_data->mem_package_id)?'Get started':'Change Package'?> <i class="fi-arrow-right"></i></a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
                <?php if (!empty($mem_data->mem_membership_auto)): ?>
                    <p class="text-center"><a href="javasctipt:void(0)" id="cncl-membership">Cancel your membership</a></p>
                <?php endif ?>
            </div>
            <!-- 
            <div class="head">
                <h1 class="secHeading">Membership Levels</h1>
            </div>
            <div class="blk">
                <div class="blockLst">
                    <table>
                        <thead>
                            <tr>
                                <th>Levels</th>
                                <th>Basic <div class="price">$0</div></th>
                                <th>Gold <div class="price">$15/m $162/y</div></th>
                                <th>Silver <div class="price">$10/m $108/y</div></th>
                                <th>Bronze <div class="price">$6/m $65/y</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Network Access
                                    <span class="info">
                                        <i class="fi-question-circle"></i>
                                        <div class="infoIn">
                                            <p class="semi">Your content must contain the following:</p>
                                            <ol class="_list2">
                                                <li>Line 1</li>
                                                <li>Line 2</li>
                                            </ol>
                                        </div>
                                    </span>
                                </td>
                                <td class="cross">&#10005;</td>
                                <td class="cross">&#10005;</td>
                                <td class="tick">&#10003;</td>
                                <td class="tick">&#10003;</td>
                            </tr>
                            <tr>
                                <td>PFSC 0 Deductible Insurance
                                    <span class="info">
                                        <i class="fi-question-circle"></i>
                                        <div class="infoIn">
                                            <p class="semi">Your content must contain the following:</p>
                                            <ol class="_list2">
                                                <li>Line 1</li>
                                                <li>Line 2</li>
                                            </ol>
                                        </div>
                                    </span>
                                </td>
                                <td class="cross">&#10005;</td>
                                <td class="tick">&#10003;</td>
                                <td class="cross">&#10005;</td>
                                <td class="tick">&#10003;</td>
                            </tr>
                            <tr>
                                <td>Round the Clock
                                    <span class="info">
                                        <i class="fi-question-circle"></i>
                                        <div class="infoIn">
                                            <p class="semi">Your content must contain the following:</p>
                                            <ol class="_list2">
                                                <li>Line 1</li>
                                                <li>Line 2</li>
                                            </ol>
                                        </div>
                                    </span>
                                </td>
                                <td class="tick">&#10003;</td>
                                <td class="tick">&#10003;</td>
                                <td class="tick">&#10003;</td>
                                <td class="cross">&#10005;</td>
                            </tr>
                            <tr>
                                <td>20% Discount
                                    <span class="info">
                                        <i class="fi-question-circle"></i>
                                        <div class="infoIn">
                                            <p class="semi">Your content must contain the following:</p>
                                            <ol class="_list2">
                                                <li>Line 1</li>
                                                <li>Line 2</li>
                                            </ol>
                                        </div>
                                    </span>
                                </td>
                                <td class="tick">&#10003;</td>
                                <td class="tick">&#10003;</td>
                                <td class="tick">&#10003;</td>
                                <td class="tick">&#10003;</td>
                            </tr>
                            <tr>
                                <td>Plus Device Cost
                                    <span class="info">
                                        <i class="fi-question-circle"></i>
                                        <div class="infoIn">
                                            <p class="semi">Your content must contain the following:</p>
                                            <ol class="_list2">
                                                <li>Line 1</li>
                                                <li>Line 2</li>
                                            </ol>
                                        </div>
                                    </span>
                                </td>
                                <td class="tick">&#10003;</td>
                                <td class="cross">&#10005;</td>
                                <td class="tick">&#10003;</td>
                                <td class="tick">&#10003;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
             -->
        </div>
    </div>
</section>
<!-- dash -->


</main>
<?php $this->load->view('includes/footer');?>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '#cncl-membership', function() {
            if(confirm('Are you sure, You want to cancel?')){
                let $this = $(this);
                $this.attr('disabled', true);
                $.post(base_url+'cancel-membership', function(rs){
                    $this.attr('disabled', false);
                    $this.remove();
                })
            };
        })
    });
</script>
</body>
</html>