<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Add/Update Package')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Add/Update <strong>Package</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url(ADMIN . '/packages'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="title" class="control-label"> Title <span class="symbol required">*</span></label>
                        <input type="text" name="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="type" class="control-label"> User Type <span class="symbol required">*</span></label>
                        <select id="type" name="type" class="form-control">
                            <option value="owner"<?= ('owner'==$row->type?' selected':'')?>>Pet Owner</option>
                            <option value="sitter"<?= ('sitter'==$row->type?' selected':'')?>>Pet Sitter</option>
                        </select>
                    </div>
                    <div class="col-md-2 strPkg<?= !$row || $row->type=='owner'?' hidden':''?>">
                        <label for="membership" class="control-label"> Membership <span class="symbol required">*</span></label>
                        <select id="membership" name="membership" class="form-control">
                            <option value="0"<?= ('0'==$row->membership?' selected':'')?>>No</option>
                            <option value="1"<?= ('1'==$row->membership?' selected':'')?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-2 strPkg<?= !$row || $row->type=='owner'?' hidden':''?>">
                        <label for="one_time" class="control-label"> One Time <span class="symbol required">*</span></label>
                        <select id="one_time" name="one_time" class="form-control">
                            <option value="0"<?= ('0'==$row->one_time?' selected':'')?>>No</option>
                            <option value="1"<?= ('1'==$row->one_time?' selected':'')?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-2 strPkg<?= !$row || $row->type=='owner'?' hidden':''?>">
                        <label for="price" class="control-label"> One Time Price <span class="symbol required">*</span></label>
                        <input type="number" step="0.1" name="price" value="<?php if (isset($row->price)) echo $row->price; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-2 rcPrc<?= $row && $row->one_time==1?' hidden':''?>">
                        <label for="monthly_price" class="control-label"> Monthly Price <span class="symbol required">*</span></label>
                        <input type="number" step="0.1" name="monthly_price" value="<?php if (isset($row->monthly_price)) echo $row->monthly_price; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-2 rcPrc<?= $row && $row->one_time==1?' hidden':''?>">
                        <label for="yearly_price" class="control-label"> Yearly Price <span class="symbol required">*</span></label>
                        <input type="number" step="0.1" name="yearly_price" value="<?php if (isset($row->yearly_price)) echo $row->yearly_price; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-2<?= !$row || $row->type=='owner'?'':' hidden'?>" id="dvcPrcFld">
                        <label for="device_price" class="control-label"> Device Price </label>
                        <input type="number" step="0.1" name="device_price" value="<?php if (isset($row->device_price)) echo $row->device_price; ?>" class="form-control">
                    </div>
                    <div class="col-md-6 rcPrc<?= $row && $row->one_time==1?' hidden':''?>">
                        <label for="monthly_subscription_id" class="control-label"> Stripe Monthly Subscription ID </label>
                        <input type="text" name="monthly_subscription_id" value="<?php if (isset($row->monthly_subscription_id)) echo $row->monthly_subscription_id; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 rcPrc<?= $row && $row->one_time==1?' hidden':''?>">
                        <label for="yearly_subscription_id" class="control-label"> Stripe Yearly Subscription ID </label>
                        <input type="text" name="yearly_subscription_id" value="<?php if (isset($row->yearly_subscription_id)) echo $row->yearly_subscription_id; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="overview" class="control-label"> Overview</label>
                        <input type="text" name="overview" value="<?php if (isset($row->overview)) echo $row->overview; ?>" class="form-control">
                    </div>
                </div>
                <div id="lstItems">
                <?php 
                $detail = unserialize($row->detail);
                $count = !empty($row) && count($detail)>0?count($detail):2;
                ?>
                <?php for ($i = 1; $i <= $count; $i++): ?>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="list_item[<?= $i?>]" class="control-label"> List Item<?= $i?> <span class="symbol required">*</span></label>
                            <textarea  name="list_item[<?= $i?>]" id="list_item[<?= $i?>]" rows="2" class="form-control" required><?php if (isset($detail[$i]->list_item)) echo $detail[$i]->list_item; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="list_item_tip[<?= $i?>]" class="control-label"> List Item Tip<?= $i?> </label>
                            <textarea  name="list_item_tip[<?= $i?>]" id="list_item_tip[<?= $i?>]" rows="2" class="form-control"><?php if (isset($detail[$i]->list_item_tip)) echo $detail[$i]->list_item_tip; ?></textarea>
                        </div>
                    </div>
                <?php endfor ?>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-danger" id="rmvItem"><i class="fa fa-times-circle"></i></button>
                    <button type="button" class="btn btn-success" id="addItem"><i class="fa fa-plus-circle"></i></button>
                </div>
                <!-- 
                <div class="form-group">
                    <div class = "col-md-6">
                        <img src = "<?=  get_site_image_src("packages",$row->image); ?>" height = "80"><br>
                        <input type = "file" name = "image" id = "image" class = "form-control file2 inline btn btn-primary" data-label = "<i class='fa fa-upload'></i> Browse" />
                        <div><br />
                            <small style = "color:#F00;">* Best resolution is <strong>600 x 600</strong>.</small><br />
                            <small style = " color:#F00;">* Allowed formats are <strong>JPG | JPEG | PNG | SVG</strong>.</small><br>
                            <small style = "color:#F00;">* Image size maximum <strong>2MB</strong> allowed.</small>
                        </div>
                    </div>
                </div>
                 -->
                <hr>
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
    <script type="text/javascript">
        (function($){
            $(function(){
                $(document).on('click', '#rmvItem', function(e){
                    e.preventDefault();
                    if (confirm('are you sure')) {
                        let total_items = $('#lstItems').find('div.form-group').length;
                        if (total_items == 1) {
                            alert('List Item reached minimum limit!');
                            return false;
                        }
                        else
                            $('#lstItems').find('div.form-group:last').remove();
                    }
                })

                $(document).on('click', '#addItem', function(e){
                    e.preventDefault();
                    let total_items = $('#lstItems').find('div.form-group').length + 1;
                    $('#lstItems').append(`<div class="form-group">
                        <div class="col-md-6">
                            <label for="list_item[`+total_items+`]" class="control-label"> List Item`+total_items+` <span class="symbol required">*</span></label>
                            <textarea  name="list_item[`+total_items+`]" id="list_item[`+total_items+`]" rows="2" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="list_item_tip[`+total_items+`]" class="control-label"> List Item Tip`+total_items+` </label>
                            <textarea  name="list_item_tip[`+total_items+`]" id="list_item_tip[`+total_items+`]" rows="2" class="form-control"></textarea>
                        </div>
                    </div>`);
                })

                $(document).on('change', '#type', function(e){
                    e.preventDefault();
                    if (this.value == 'owner'){
                        $('#dvcPrcFld').removeClass('hidden');
                        $('.strPkg').addClass('hidden');
                        $('.rcPrc').removeClass('hidden');
                    }
                    else{
                        $('#dvcPrcFld').addClass('hidden');
                        $('.strPkg').removeClass('hidden');
                    }
                });

                $(document).on('change', '#one_time', function(e){
                    e.preventDefault();
                    if (this.value == 1)
                        $('.rcPrc').addClass('hidden');
                    else
                        $('.rcPrc').removeClass('hidden');
                });
                
            })
        }(jQuery))
    </script>
<?php else: ?>
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Manage Packages')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Manage <strong>Packages</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url(ADMIN . '/packages/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <!-- <th width="10%">Photo</th> -->
                <th width="20%">Name</th>
                <th>Overview</th>
                <th width="10%">User Type</th>
                <th width="10%">One Time</th>
                <th width="12%">One Time Price</th>
                <th width="10%">Monthly Price</th>
                <th width="10%">Yearly Price</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $key => $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= $key+1; ?></td>
                        <!-- 
                        <td class="text-center"><img src = "<?=  get_site_image_src("packages/",$row->image); ?>" height = "60"></td>
                         -->
                        <td><?= $row->title ?></td>
                        <td><?= $row->overview; ?></td>
                        <td>Pet <?= $row->type ?> </td>
                        <td><?= get_yes_no($row->one_time) ?> </td>
                        <td><?= format_amount($row->price); ?></td>
                        <td><?= format_amount($row->monthly_price); ?></td>
                        <td><?= format_amount($row->yearly_price); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/packages/manage/'.$row->id); ?>">Edit</a></li>
                                    <?php if(access(10)):?>
                                        <li><a href="<?= site_url(ADMIN.'/packages/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                    <?php endif?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>