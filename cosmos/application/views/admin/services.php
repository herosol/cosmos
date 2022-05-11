<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Update Service')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Update <strong>Service</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/services'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="title" class="control-label"> Title <span class="symbol required">*</span></label>
                        <input type="text" name="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" required autofocus>
                    </div>
                    <div class="col-md-2">
                        <label for="default_price" class="control-label"> Deault Price <span class="symbol required">*</span></label>
                        <input type="number" step="0.1" name="default_price" value="<?php if (isset($row->default_price)) echo $row->default_price; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label for="price_label" class="control-label"> Price Label <span class="symbol required">*</span></label>
                        <input type="text" name="price_label" value="<?php if (isset($row->price_label)) echo $row->price_label; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label for="highest_earning" class="control-label"> Highest Earning <span class="symbol required">*</span></label>
                        <select id="highest_earning" name="highest_earning" class="form-control">
                            <option value="0"<?= (0==$row->highest_earning?' selected':'')?>>No</option>
                            <option value="1"<?= ('1'==$row->highest_earning?' selected':'')?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="overview" class="control-label"> Overview <span class="symbol required">*</span></label>
                        <input type="text" name="overview" id="overview" value="<?php if (isset($row->overview)) echo $row->overview; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="home_overview" class="control-label"> Home Overview <span class="symbol required">*</span></label>
                        <input type="text" name="home_overview" id="home_overview" value="<?php if (isset($row->home_overview)) echo $row->home_overview; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea  name="detail" rows="8" class="form-control ckeditor" required><?php if (isset($row->detail)) echo $row->detail; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="price_overview" class="control-label"> Price Overview <span class="symbol required">*</span></label>
                        <input type="text" name="price_overview" value="<?php if (isset($row->price_overview)) echo $row->price_overview; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="price_detail" class="control-label"> Price Detail <span class="symbol required">*</span></label>
                        <textarea  name="price_detail" rows="8" class="form-control ckeditor" required><?php if (isset($row->price_detail)) echo $row->price_detail; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class = "col-md-6">
                        <img src = "<?=  get_site_image_src("services",$row->image); ?>" height = "80"><br>
                        <input type = "file" name = "image" id = "image" class = "form-control file2 inline btn btn-primary" data-label = "<i class='fa fa-upload'></i> Browse" />
                        <div><br />
                            <small style = "color:#F00;">* Best resolution is <strong>600 x 600</strong>.</small><br />
                            <small style = " color:#F00;">* Allowed formats are <strong>JPG | JPEG | PNG | SVG</strong>.</small><br>
                            <small style = "color:#F00;">* Image size maximum <strong>2MB</strong> allowed.</small>
                        </div>
                    </div>
                </div>
                
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
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Services')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Manage <strong>Services</strong></h2>
        </div>
        <!-- 
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/services/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
         -->
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="10%">Photo</th>
                <th width="20%">Name</th>
                <th>Overview</th>
                <th width="12%">Default Price</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $key => $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= $key+1; ?></td>
                        <td class="text-center"><img src = "<?=  get_site_image_src("services",$row->image); ?>" height = "60"></td>
                        <td><?= $row->title ?></td>
                        <td><?= $row->overview; ?></td>
                        <td><?= format_amount($row->default_price); ?>/<?= $row->price_label?></td>
                        <td class="text-center">
                            <a href="<?= site_url(ADMIN.'/services/manage/'.$row->id); ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <!-- 
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/services/manage/'.$row->id); ?>">Edit</a></li>
                                    <?php if(access(10)):?>
                                        <li><a href="<?= site_url(ADMIN.'/services/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                    <?php endif?>
                                </ul>
                            </div>
                        </td>
                         -->
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>