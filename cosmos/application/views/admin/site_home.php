<?php echo getBredcrum(ADMIN, array('#' => 'Home Page')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Home Page</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <!--        <a href="<?php echo base_url('admin/services'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>-->
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
            <h3> Main Banner</h3>
            <div class="form-group">
                <div class="col-md-4">
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
                <!-- <div class="col-md-8">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_detail" class="control-label"> Short Detail <span class="symbol required">*</span></label>
                            <textarea name="banner_detail" rows="2" class="form-control" ><?= $row['banner_detail'] ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_search_heading" class="control-label"> Search Heading <span class="symbol required">*</span></label>
                            <input type="text" name="banner_search_heading" id="banner_search_heading" value="<?= $row['banner_search_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_button_text" class="control-label"> Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="banner_button_text" id="banner_button_text" value="<?= $row['banner_button_text'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div> -->
            </div>

            <h3>Special Cosplayer Section</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="star_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                    <input type="text" name="star_heading" value="<?= $row['star_heading'] ?>" class="form-control" required>
                </div>
            </div>

            <h3>MarketPlace Section</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="marketplace_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                    <input type="text" name="marketplace_heading" id="marketplace_heading" value="<?= $row['marketplace_heading'] ?>" class="form-control" required>
                </div>
            </div>


            <h3>Highlights Section</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="highlights_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                    <input type="text" name="highlights_heading" value="<?= $row['highlights_heading'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <?php for($i = 1; $i <= 4; $i++):?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="panel panel-primary" data-collapsed="0">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                           Image<?= $i?>
                                        </div>
                                        <div class="panel-options">
                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                <img src="<?= !empty($row['highlights_image'.$i]) ? get_site_image_src("images/", $row['highlights_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="highlights_image<?=$i?>" accept="image/*" <?php if(empty($row['highlights_image'.$i])){echo 'required=""';}?>>
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-primary" data-collapsed="0">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                           Icon<?= $i?>
                                        </div>
                                        <div class="panel-options">
                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                <img src="<?= !empty($row['highlights_icon_image'.$i]) ? get_site_image_src("images/", $row['highlights_icon_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="highlights_icon_image<?=$i?>" accept="image/*" <?php if(empty($row['highlights_icon_image'.$i])){echo 'required=""';}?>>
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="highlights_heading<?=$i?>" class="control-label"> Heading<?= $i?> <span class="symbol required">*</span></label>
                                <input type="text" name="highlights_heading<?=$i?>" id="highlights_heading<?=$i?>" value="<?= $row['highlights_heading'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="highlights_text<?=$i?>" class="control-label"> Detail<?= $i?> <span class="symbol required">*</span></label>
                                <textarea name="highlights_text<?=$i?>" for="highlights_text<?=$i?>" rows="4" class="form-control" ><?= $row['highlights_text'.$i] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endfor?>
            </div>

            <h3>How it works Section</h3>
            <div class="form-group">
                <div class="col-md-4">
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
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="how_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="how_heading" value="<?= $row['how_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="how_short_desc" class="control-label"> Short Description <span class="symbol required">*</span></label>
                            <textarea name="how_short_desc" id="how_short_desc" rows="6" class="form-control" required=""><?= $row['how_short_desc'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?php for($i = 1; $i <= 3; $i++):?>
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

            <h3>Perfect Match Section</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="match_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="match_heading" value="<?= $row['match_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="match_short_desc" class="control-label"> Short Description <span class="symbol required">*</span></label>
                            <textarea name="match_short_desc" id="match_short_desc" rows="6" class="form-control" required=""><?= $row['match_short_desc'] ?></textarea>
                        </div>
                    </div>
                </div>
                <?php for($i=1; $i<=2; $i++):?>
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
                                                <img src="<?= !empty($row['match_image'.$i]) ? get_site_image_src("images/", $row['match_image'.$i]) : 'http://placehold.it/3000x1000' ?>" alt="--">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="match_image<?=$i?>" accept="image/*" <?php if(empty($row['match_image'.$i])){echo 'required=""';}?>>
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="match_text<?=$i?>" class="control-label"> Detail <span class="symbol required">*</span></label>
                                <textarea name="match_text<?=$i?>" for="match_text<?=$i?>" rows="4" class="form-control" ><?= $row['match_text'.$i] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endfor?>
            </div>

            <h3>Cities Section</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="cities_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                    <input type="text" name="cities_heading" value="<?= $row['cities_heading'] ?>" class="form-control" required>
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
</div>