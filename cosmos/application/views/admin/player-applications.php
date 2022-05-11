<?php if ($this->uri->segment(3) == 'view'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'View Cosplayer Applications')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> View <strong>Cosplayer Applications</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/player-applications'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">

                <div class="col-md-12">
                    <h3><i class="fa fa-bars"></i> Profile Detail</h3>
                    <hr class="hr-short">
                    <?php if (isset($row->mem_fname)):?>
                        <div style="font-size: 13px"><b>Member Since:</b> <small> <?= format_date($row->mem_date); ?></small></div>
                        <div style="font-size: 13px"><b>Last Login:</b> <small> <?= format_date($row->mem_last_login,'M d Y h:i:s A'); ?></small></div>
                    <?php endif?>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label" for="mem_email">Email <span class="symbol required">*</span></label>
                            <input type="text" name="mem_email" value="<?php if (isset($row->mem_email)) echo $row->mem_email; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="mem_phone"> Phone Number <span class="symbol required">*</span></label>
                            <input type="text" name="mem_phone" value="<?php if (isset($row->mem_phone)) echo $row->mem_phone; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label" for="mem_fname"> First Name <span class="symbol required">*</span></label>
                            <input type="text" name="mem_fname" value="<?php if (isset($row->mem_fname)) echo $row->mem_fname; ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="mem_lname"> Last Name <span class="symbol required">*</span></label>
                            <input type="text" name="mem_lname" value="<?php if (isset($row->mem_lname)) echo $row->mem_lname; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label" for="mem_profile_heading"> Nickname</label>
                            <input type="text" name="mem_profile_heading" value="<?php if (isset($row->mem_profile_heading)) echo $row->mem_profile_heading; ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="mem_dob"> Date Of Birth</label>
                            <input type="text" name="mem_dob" value="<?php if (isset($row->mem_dob)) echo format_date($row->mem_dob,'m/d/Y'); ?>" class="form-control datepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label" for="mem_rate"> Rate</label>
                            <input type="text" name="mem_rate" value="<?php if (isset($row->mem_rate)) echo $row->mem_rate; ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="mem_address1"> Address</label>
                            <input type="text" name="mem_address1" value="<?php if (isset($row->mem_address1)) echo $row->mem_address1; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label" for="mem_city"> City</label>
                            <input type="text" name="mem_city" value="<?php if (isset($row->mem_city)) echo $row->mem_city; ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="mem_zip"> Zip Code</label>
                            <input type="text" name="mem_zip" value="<?php if (isset($row->mem_zip)) echo $row->mem_zip; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label" for="mem_country_id"> Country</label>
                            <select id="mem_country_id" name="mem_country_id" class="form-control">
                                <option value="">Please select Country</option>
                                <?= get_countries_options('id', $row->mem_country_id);?>
                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"> Hear About us?</label>
                            <input type="text" name="mem_hear_about" value="<?php if (isset($row->mem_hear_about)) echo $row->mem_hear_about; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label" for="mem_fb_link"> Facebook</label>
                            <input type="text" name="mem_fb_link" id="mem_fb_link" value="<?php if (isset($row->mem_fb_link)) echo $row->mem_fb_link; ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="mem_instagram_link"> Instagram</label>
                            <input type="text" name="mem_instagram_link" id="mem_instagram_link" value="<?php if (isset($row->mem_instagram_link)) echo $row->mem_instagram_link; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">Profile Bio</label>
                            <textarea name="mem_about" id="mem_about" rows="4" class="form-control ckeditor"><?=$row->mem_about; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class = "col-md-6">
                            <label class="control-label"> Profile Image <span class="symbol required">*</span></label><br>
                            <img src = "<?= get_image_src($row->mem_image,150,true); ?>" height = "80"><br>
                            <input type = "file" name = "mem_image" id = "mem_image" class = "form-control file2 inline btn btn-primary" data-label = "<i class='fa fa-upload'></i> Browse" />
                            <div><br />
                                <small style = "color:#F00;">* Best resolution is <strong>600 x 600</strong>.</small><br />
                                <small style = " color:#F00;">* Allowed formats are <strong>JPG | JPEG | PNG</strong>.</small><br>
                                <small style = "color:#F00;">* Image size maximum <strong>2MB</strong> allowed.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    
                    <div class="clearfix"></div>
                        
                    <div class="col-md-12">                
                        <hr class="hr-short">
                        <div class="form-group text-right">
                            <div class="col-md-12">
                                <!-- <a href="<?= site_url(ADMIN.'/player-applications/declince/'.$row->mem_id); ?>" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to decline it ?')"><i class="fa fa-times"></i> Decline</a> -->
                                <!-- <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Approve</button> -->
                                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Approve</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <!-- <input type="file" id="uploadFile" name="uploadFile" accept="image/*" class="uploadFile" data-file=""> -->
            <div class="clearfix"></div>
        </div>
        <script type="text/javascript">
            (function($){
                $(function(){
                     /*$('.timepicker').timepicker({
                        template: false,
                        showInputs: false,
                        defaultTime: false,
                        minuteStep: 5
                    });*/
                    
                    $(document).on('change', '.selectLst > label input[type="checkbox"]', function() {
                        let checkbox = '';
                        if (this.checked && this.value=='none')
                            $(this).parents('.selectLst').find('input[type="checkbox"]').not($(this)).prop('checked', false);
                        else
                            $(this).parents('.selectLst').find('input[type="checkbox"]:last').prop('checked', false);

                        $(this).parents('.selectLst').find('input[type="checkbox"]:checked').each(function( index ) {
                            checkbox += $( this ).val() +',';
                        });
                        checkbox = checkbox.slice(0, -1);
                        $(this).parents('.selectLst').find('input[type="hidden"]').val(checkbox);
                    });
                })
            }(jQuery))
        </script>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Cosplayer Applications')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Manage <strong>Cosplayer Applications</strong></h2>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="60px">Photo</th>
                <th width="20%">Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Last Login</th>
                <th class="text-center">Application Status</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td class="text-center">
                            <div class="icoRound">
                                <img src = "<?= get_image_src($row->mem_image,50,true); ?>" height = "60">
                            </div>
                        </td>
                        <td><b><a href="<?= profile_url($row->mem_id,$row->mem_fname . ' ' . $row->mem_lname)?>" target="_blank"><?= $row->mem_fname . ' ' . $row->mem_lname; ?></a></b></td>
                        <td><?= $row->mem_email; ?></td>
                        <td><?= $row->mem_phone; ?></td>
                        <td><?= format_date($row->mem_last_login,'M d Y h:i:s A'); ?></td>
                        <td class="text-center"><?= get_application_status($row->mem_player_verified); ?></td>
                        
                        <td class="text-center">
                            <a href="<?= site_url(ADMIN.'/player-applications/view/'.$row->mem_id); ?>" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>