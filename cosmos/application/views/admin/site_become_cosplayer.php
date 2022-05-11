<?php echo getBredcrum(ADMIN, array('#' => 'Become Cosplayer Page')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Become Cosplayer Page</strong></h2>
    </div>
    <div class="col-md-6 text-right">

    </div>
</div>
<div>
    <hr>
    <div class="clearfix"></div>
    <div class="panel-body">
        <form role="form"  method="post" class="form-horizontal form-groups-bordered validate" novalidate="novalidate" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-12">
                    <label for="page_title" class="control-label"> Page Title <span class="symbol required">*</span></label>
                    <input type="text" name="page_title" id="page_title" value="<?= $row['page_title'] ?>" class="form-control" autofocus required>
                </div>
                <div class="col-md-6">
                    <label for="meta_description" class="control-label"> Meta Description <span class="symbol required">*</span></label>
                    <textarea name="meta_description" id="meta_description" class="form-control" rows="5" required=""><?= $row['meta_description'] ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="meta_keywords" class="control-label"> Meta Keywords <span class="symbol required">*</span></label>
                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5" required=""><?= $row['meta_keywords'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-7">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="heading" value="<?= $row['heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="short_desc" class="control-label"> Short Description <span class="symbol required">*</span></label>
                            <textarea name="short_desc" id="short_desc" class="form-control" required=""><?= $row['short_desc'] ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="button_text" class="control-label"> Short Description <span class="symbol required">*</span></label>
                            <input type="text" name="button_text" value="<?= $row['button_text'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Image
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= !empty($row['image1']) ? get_site_image_src("images/", $row['image1']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image1" accept="image/*" <?php if(empty($row['image1'])){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>How it works Section</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="how_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="how_heading" value="<?= $row['how_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="short_desc" class="control-label"> Short Description <span class="symbol required">*</span></label>
                            <textarea name="how_short_desc" id="how_short_desc" rows="6" class="form-control" required=""><?= $row['how_short_desc'] ?></textarea>
                        </div>
                    </div>
                </div>
                <?php for($i=1;$i<=3;$i++):?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="panel panel-primary" data-collapsed="0">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            Image
                                        </div>
                                        <div class="panel-options">
                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                <img src="<?= !empty($row['how_image'.$i]) ? get_site_image_src("images/", $row['how_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="how_image<?=$i?>" accept="image/*" <?php if(empty($row['how_image'.$i])){echo 'required=""';}?>>
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="how_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="how_heading<?=$i?>" id="how_heading<?=$i?>" value="<?= $row['how_heading'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="how_text<?=$i?>" class="control-label"> Detail <span class="symbol required">*</span></label>
                                <textarea name="how_text<?=$i?>" for="how_text<?=$i?>" rows="4" class="form-control" ><?= $row['how_text'.$i] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endfor?>
            </div>
            <!-- <div class="form-group">
                <div class="col-md-5">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Testimonial Banner
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= !empty($row['image2']) ? get_site_image_src("images/", $row['image2']) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image2" accept="image/*" <?php if(empty($row['image2'])){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="form-group">
                <div class="col-sm-6 ">
                    <label for="left_txt" class="control-label "> left Section</label>
                    <textarea name="left_txt" rows="6" class="form-control ckeditor" ><?= $row['left_txt'] ?></textarea>
                </div>
                <div class="col-sm-6 ">
                    <label for="right_txt" class="control-label "> right Section</label>
                    <textarea name="right_txt" rows="6" class="form-control ckeditor" ><?= $row['right_txt'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-2 control-label "></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
</div>