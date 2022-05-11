<!doctype html>
<html>
<head>
<title>Add New Product – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header(); ?>
<main>


<section id="dash">
    <div id="products">
        <div class="contain">
            <form action="" method="post">
                <div class="head">
                    <h1 class="secHeading">Add New Product</h1>
                </div>
                <div class="formRow row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                        <h4>Product Title</h4>
                        <input type="text" name="" id="" class="txtBox" placeholder="Product Title">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                        <h4>Main Category</h4>
                        <select name="" id="" class="txtBox selectpicker">
                            <option value="">Select</option>
                            <option value="">Category 1</option>
                            <option value="">Category 2</option>
                            <option value="">Category 3</option>
                            <option value="">Category 4</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                        <h4>Sub Category</h4>
                        <select name="" id="" class="txtBox selectpicker">
                            <option value="">Select</option>
                            <option value="">Category 1</option>
                            <option value="">Category 2</option>
                            <option value="">Category 3</option>
                            <option value="">Category 4</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                        <h4>Featured Photo <a href="javascript:void(0)" class="delBtn">Delete</a></h4>
                        <button type="button" class="txtBox uploadmlImg" data-image-src="member">Select photo</button>
                        <div class="upLoadBlk txtBox">
                            <div class="image icon"><img src="<?= base_url('assets/images/store/1.jpg')?>" alt=""></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                        <h4>Upload Product Photos <a href="javascript:void(0)" class="delBtn">Delete all</a></h4>
                        <button type="button" class="txtBox uploadmlImg" data-image-src="member">Select photos</button>
                        <div class="upLoadBlk txtBox">
                            <div class="inside scrollbar">
                                <ul class="imgLst flex">
                                    <li>
                                        <div class="image"><img src="<?= base_url('assets/images/store/1.jpg')?>" alt=""><div class="closeBtn"></div></div>
                                    </li>
                                    <li>
                                        <div class="image"><img src="<?= base_url('assets/images/store/2.jpg')?>" alt=""><div class="closeBtn"></div></div>
                                    </li>
                                    <li>
                                        <div class="image"><img src="<?= base_url('assets/images/store/3.jpg')?>" alt=""><div class="closeBtn"></div></div>
                                    </li>
                                    <li>
                                        <div class="image"><img src="<?= base_url('assets/images/store/4.jpg')?>" alt=""><div class="closeBtn"></div></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                        <h4>Description</h4>
                        <textarea name="" id="product_desc" class="txtBox ck-editor5" placeholder="Write something about product"></textarea>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                        <h4>Return Policy</h4>
                        <textarea name="" id="return_policy" class="txtBox ck-editor5" placeholder="Write your return policy"></textarea>
                    </div>
                </div>
                <div class="bTn text-center">
                    <button type="submit" class="webBtn colorBtn">Submit <i class="fi-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- dash -->


<script type="text/javascript" src="<?= base_url('assets/js/ckeditor5.js')?>"></script>
<script type="text/javascript">
    ClassicEditor
	.create(document.querySelector('#product_desc'), {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                '|',
                'blockQuote',
                'undo',
                'redo'
            ]
        }
    })
	.then(editor => {
		console.log('Editor was initialized', editor);
	})
	.catch( err => {
		console.error(err.stack);
	});
    ClassicEditor
	.create(document.querySelector('#return_policy'), {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                '|',
                'blockQuote',
                'undo',
                'redo'
            ]
        }
    })
	.then(editor => {
		console.log('Editor was initialized', editor);
	})
	.catch( err => {
		console.error(err.stack);
	});
</script>
</main>
<?php $this->load->view('includes/footer');?>
</body>
</html>