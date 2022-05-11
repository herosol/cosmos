<?php if ($this->uri->segment(3) == 'owner-manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Owner Testimonial')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Owner Testimonial</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/testimonials/owners'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmTestimonial" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label"> Name</label>
                        <input type="text" name="name" value="<?php if (isset($row->name)) echo $row->name; ?>" class="form-control" autofocus required>
                    </div>
                    <div class="col-md-4">
                            <label class="control-label"> Rating</label>
                            <select name="rating" id="rating" class="form-control" required="">
                                <?php foreach (range(1, 5) as $i): ?>
                                <option value="<?= $i?>" <?php
                                if (isset($row->rating) && $i == $row->rating) {
                                    echo 'selected';
                                }
                                ?>><?= $i?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    <!-- <div class="col-md-6">
                        <label class="control-label"> About</label>
                        <input type="text" name="about" value="<?php if (isset($row->about)) echo $row->about; ?>" class="form-control" required>
                    </div> -->
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label">  Text</label>
                        <textarea  name="text" rows="8" class="form-control" required><?= $row->text ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class = "col-md-12">
                        <img src = "<?= get_site_image_src('testimonials',$row->image,'thumb_',true); ?>" height = "80"><br>
                        <input type = "file" name = "image" id = "image" class = "form-control file2 inline btn btn-primary" data-label = "<i class='fa fa-upload'></i> Browse" />
                        <div><br />
                            <small style = "color:#F00;">* Best resolution is <strong>600 x 600</strong>.</small><br />
                            <small style = " color:#F00;">* Allowed formats are <strong>JPG | JPEG | PNG</strong>.</small><br>
                            <small style = "color:#F00;">* Image size maximum <strong>2MB</strong> allowed.</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">                
                    <hr class="hr-short">
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Owners Testimonials')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Owners Testimonials</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/testimonials/owner-manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="10%">Photo</th>
                <th>Testimonial</th>
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
                                <img src = "<?= get_site_image_src('testimonials',$row->image,'thumb_',true); ?>" height = "60">
                            </div>
                        </td>
                        <td><b><?= $row->name; ?></b></br>&emsp;<?= short_text($row->text); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/testimonials/owner-manage/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/testimonials/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>