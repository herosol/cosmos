<?php if ($this->uri->segment(3) == 'detail'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Booking Detail')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> <strong> Booking</strong> Detail</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/bookings'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <h3><i class="fa fa-bars"></i> Booking Detail </h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Booking No:</strong></td>
                        <td colspan="3"><?= num_size($row->id)?></td>
                    </tr>
                    <tr>
                        <td width="150"><strong>Player Name:</strong></td>
                        <td><?= ucwords($member->mem_fname.' '.$member->mem_lname)?></td>
                        <td width="150"><strong>Buyer Name:</strong></td>
                        <td><?= $row->mem_name?></td>
                    </tr>
                    <tr>
                        <td><strong>Type of work:</strong></td>
                        <td><?= $row->work_type?></td>
                        <td><strong>Date:</strong></td>
                        <td><?= format_date($row->start_date)?></td>
                    </tr>
                    <tr>
                        <td><strong>Number of hours:</strong></td>
                        <td><?= hours_format($row->hours)?></td>
                        <td><strong>Rate:</strong></td>
                        <td><?= format_amount($row->rate)?></td>
                    </tr>
                    <tr>
                        <td><strong>Hotel/stay covered:</strong></td>
                        <td><?= $row->hotel_expense == 1 ? 'Yes' : 'No'?></td>
                    </tr>
                </tbody>
            </table>
            <h4>Extras </h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="60">No.</th>
                        <th>Title</th>
                        <th width="150">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row->extras as $key => $extra): ?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td><?= $extra->title?></td>
                            <td class="price"><?= format_amount($extra->price)?></td>
                        </tr>
                    <?php endforeach ?>
                    <tr class="bold">
                        <td colspan="2" class="bold text-right">Total:</td>
                        <td class="price"><?= format_amount($row->amount)?></td>
                    </tr>
                    <tr class="bold">
                        <td colspan="2" class="bold text-right">Site Percentage:</td>
                        <td class="price"><?= $row->site_percentage?>%</td>
                    </tr>
                    <tr class="bold">
                        <td colspan="2" class="bold text-right">Player Earning:</td>
                        <td class="price"><?= format_amount($row->player_amount)?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php if($row->status == 2 && ($row->completed > 0 || $row->canceled == 1)):?>
            <div class="row col-md-12">
                <h3><i class="fa fa-list-alt"></i> Booking Completed </h3>
                <form action="" role="form" class="form-horizontal frmAjax" method="post" enctype="multipart/form-data">
                    <div class="alertMsg"></div>
                    <table class="table table-bordered">
                        <tbody>
                            <?php if ($row->canceled == 1): ?>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td><span class="miniLbl red">Canceled</span></td>

                                    <td><strong>Canceled By:</strong></td>
                                    <td><?= ucwords($canceled_by->mem_fname.' '.$canceled_by->mem_lname)?></td>

                                    <td><strong>Canceled Date:</strong></td>
                                    <td><?= format_date($row->final_date)?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($row->completed>0): ?>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td><?= get_completed_status($row->completed)?></td>
                                    <!-- <td><strong>On Location Date:</strong></td>
                                    <td><?= format_date($row->location_time, 'M d, Y h:i:s a')?></td> -->
                                </tr>
                                <?php if ($row->completed == 2): ?>
                                    <?php
                                        $review = get_mem_review($row->buyer_id, $row->id);
                                        $review_reply = get_reply($review->id);
                                    ?>
                                    <tr>
                                        <td><strong>Ratting:</strong></td>
                                        <td>
                                            <div class="rateYo" id="rating"data-rateyo-rating="<?= $review->rating?>"></div>
                                            <input type="hidden" name="rating" value="<?= $review->rating?>">
                                        </td>
                                        <td><strong>Date:</strong></td>
                                        <td><?= format_date($review->date)?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Comment:</strong></td>
                                        <td colspan="3">
                                            <p><?= $review->comment?></p>
                                            <?php if ($review_reply): ?>
                                                <p>&emsp;<?= $review_reply->comment?></p>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endif?>
                            <?php endif?>
                        </tbody>
                    </table>
                </form>
            </div>
        <?php endif?>
    </div>
    <script type="text/javascript">
        (function($){
            $(function(){
                $('.rateYo').rateYo({
                    fullStar: true,
                    normalFill: '#ddd',
                    ratedFill: '#f6a623',
                    starWidth: '14px',
                    spacing: '2px'
                });

                $(document).on("rateyo.set", '#rating', function(e, data) {
                    let rating = data.rating;
                    $('input[name="rating"]').val(rating);
                });
            })
        }(jQuery))
    </script>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Bookings Management')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-12">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <?php if ($this->uri->segment(4) > 0): ?><strong>" <?php echo ucwords($member_row->mem_fname.' '.$member_row->mem_lname); ?> "</strong> <?php endif; ?>Bookings</h2>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Buyer</th>
                <th>Player</th>
                <th>Date</th>
                <th>Total</th>
                <th>Site Percentage</th>
                <th>Player Earning</th>
                <th>Status</th>
                <th>Completed</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <!-- <td class="text-center"><?= ++$count; ?></td> -->
                        <td class="text-center"><?= $row->id; ?></td>
                        <td><b><a href="<?= site_url(ADMIN.'/buyers/manage/'.$row->buyer_id); ?>" target="_blank"><?= get_mem_name($row->buyer_id); ?></a></b></td>
                        <td><b><a href="<?= site_url(ADMIN.'/players/manage/'.$row->player_id); ?>" target="_blank"><?= get_mem_name($row->player_id); ?></a></b></td>
                        <td><?= format_date($row->date, 'M d, Y h:i:m a'); ?></td>
                        <td><?= format_amount($row->amount); ?></td>
                        <td><?= $row->site_percentage; ?>%</td>
                        <td><?= format_amount($row->player_amount); ?></td>
                        <td><?= get_booking_status($row->status); ?></td>
                        <td><?= get_completed_status($row->completed)?></td>
                        <td class="text-center">
                            <a href="<?= site_url(ADMIN.'/bookings/detail/'.$row->id); ?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif?>