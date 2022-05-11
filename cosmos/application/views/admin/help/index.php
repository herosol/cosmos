<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Add/Update Help')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Add/Update <strong>Help</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url(ADMIN . '/help'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="title" class="control-label"> Article Title <span class="symbol required">*</span></label>
                        <input type="text" name="title" id="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="cat_id" class="control-label"> Category <span class="symbol required">*</span></label>
                        <select id="cat_id" name="cat_id" class="form-control">
                            <?php foreach ($categories as $key => $cat): ?>
                                <option value="<?= $cat->id?>"<?= ($cat->id==$row->cat_id?' selected':'')?>><?= $cat->title?> (Pet <?= $cat->help_type?>)</option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="is_book_now" class="control-label"> Book Now <span class="symbol required">*</span></label>
                        <select id="is_book_now" name="is_book_now" class="form-control">
                            <option value="0"<?= ('0'==$row->is_book_now?' selected':'')?>>No</option>
                            <option value="1"<?= ('1'==$row->is_book_now?' selected':'')?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="meta_description" class="control-label"> Meta Description <span class="symbol required">*</span></label>
                        <textarea name="meta_description" id="meta_description" class="form-control" rows="5" required=""><?= $row->meta_description ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="meta_keywords" class="control-label"> Meta Keywords <span class="symbol required">*</span></label>
                        <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5" required=""><?= $row->meta_keywords ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea  name="detail" id="detail" rows="8" class="form-control ckeditor" required><?php if (isset($row->detail)) echo $row->detail; ?></textarea>
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
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Manage Help')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Manage <strong>Help</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url(ADMIN . '/help/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Title</th>
                <th width="20%">Category</th>
                <th width="12%" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): ?>
                <?php foreach ($rows as $key => $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= $key+1; ?></td>
                        <td><?= $row->title ?></td>
                        <td><?= get_cat_name($row->cat_id); ?>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/help/manage/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/help/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>