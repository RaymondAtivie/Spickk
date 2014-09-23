<style>
    .img {
        cursor: pointer;
    }
</style>
<!-- Breadcrumbs - START -->
<div class="background-clouds breadcrumbs-container">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.html">Flow</a></li>
            <li><a class="lictive" href="index.html">Following</a></li>
            <li><a href="index.html">Activity</a></li>
        </ol>
    </div>
</div>
<!-- Breadcrumbs - END -->
<section>
    <div class="container">
        <!--<h1><span>Gallery</span></h1>-->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/lightBox.css" />
        <script src="<?php echo base_url() ?>assets/js/lightBox.js"></script>
        <div class="row">
            <div class='col-md-10'>                

                <?php foreach ($user_images as $image) { ?>
                    <div class="col-xs-6 col-sm-4 col-md-4">
                        <div class="imageSub img-popover thumbnail info-thumbnail background-clouds color-text" >
                            <a href="<?php echo base_url("gallery/image")."/".$image->id; ?>">
                                <img class="round img" src="<?php echo base_url() ?>collection/thumb_300_square/<?php echo $image->file ?>" alt="<?php echo $image->title ?>" />
                            </a>
                            <div class="blackbg"></div>
                            <div class="label" style="display: inline-block; float: left">
                                <?php echo $image->title ?><br />
                                <small>
                                    <?php echo $image->getImageUser()->firstname . " " . $image->getImageUser()->lastname; ?>
                                    <span class="label label-success"><?php echo $image->getImageUser()->getCategory() ?></span>
                                </small> 

                            </div>
                            <div class="label" style="float: right; display: inline-block;text-align: right">                                
                                <a href="<?php echo base_url() ?>collection/thumb_600x/<?php echo $image->file ?>" 
                                   data-imagelightbox="s" style="color: white; font-size: 15px" title="Quick view" 
                                   alt="<?php echo $image->title ?>">
                                    <i class="fa fa-search-plus"></i>&nbsp;&nbsp;
                                </a>
                            </div>
                        </div>                                       
                    </div>
                <?php } ?>
            </div>

            <div class='col-md-2'>
                <img src='http://placehold.it/195x500&text=ADVERTISMENT+HERE' />
            </div>
        </div>
    </div>
</section>