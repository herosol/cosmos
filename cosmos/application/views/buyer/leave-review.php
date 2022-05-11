<!-- <div class="crosBtn"></div>
<h2>Leave Feedback</h2> -->

<form action="<?= site_url('complete-booking')?>" method="post" autocomplete="off" class="frmAjax">
    <input type="hidden" name="store" value="<?= $encoded_id?>">
    <div class="txtGrp">
        <?php if ($this->session->mem_type=='player'): ?>
            <h4>Respond to review</h4>
        <?php endif ?>
        <?php if ($this->session->mem_type=='buyer'): ?>
            <h4>Leave Rating now</h4>
        <?php endif ?>
        <div class="row formRow">
            <?php if ($this->session->mem_type=='buyer'): ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                    <div class="rateYo" id="rating"></div>
                    <input type="hidden" name="rating" value="0">
                </div>
            <?php endif ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                <textarea name="cmnt" id="cmnt" class="txtBox" placeholder="Comment" required=""></textarea>
            </div>
        </div>
    </div>
    <!-- <div class="bTn text-center">
        <button type="submit" class="webBtn colorBtn">Submit <i class="spinner hidden"></i></button>
    </div> -->
    <div class="bTn text-center">
        <?php if ($this->session->mem_type == 'player' || ($this->session->mem_type == 'buyer' && $row->completed != 1)): ?>
            <a href="javascript:void(0)" class="webBtn  cnclBtn mActn-btn" data-store="<?= $encoded_id?>" data-link="booking-detail">Go Back <i class="spinner hidden"></i></a>
        <?php endif ?>
        <button type="submit" class="webBtn colorBtn">Submit <i class="spinner hidden"></i></button>
    </div>
    <div class="alertMsg" style="display: none;"></div>
</form>