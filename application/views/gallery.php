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
    <div class="container-fluid">
        <!--<h1><span>Gallery</span></h1>-->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/lightBox.css" />
        <script src="<?php echo base_url() ?>assets/js/lightBox.js"></script>
        <div class="row">
            <div class='col-md-12 col-lg-10 col-lg-offset-1 col-md-offset-0'>                

                <?php foreach ($user_images as $image) { ?>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3" style="padding: 0px 4px 10px 4px">
                        <div class="imageSub img-popover thumbnail info-thumbnail background-clouds color-text" >
                            <a href="<?php echo base_url("gallery/image") . "/" . $image->id; ?>">
                                <img class="img" src="<?php echo base_url() ?>collection/thumb_400_square/<?php echo $image->file ?>" alt="<?php echo $image->title ?>" />
                            </a>                            
                        </div>
                        <div>

                            <div style="display: inline-block; float: left">
                                <b style="font-size: 17px"><?php echo $image->title ?></b><br />
                                <small>
                                    <span style="font-size: 15px">
                                        <?php echo $image->getImageUser()->firstname . " " . $image->getImageUser()->lastname; ?>
                                    </span>
                                </small> 

                            </div>
                            <div style="float: right; display: inline-block;text-align: right">                                
                                <a href="<?php echo base_url() ?>collection/thumb_1000x/<?php echo $image->file ?>" 
                                   data-imagelightbox="s" style="color: black; font-size: 15px" title="Quick view" 
                                   alt="<?php echo $image->title ?>">
                                    <i class="fa fa-search-plus"></i>&nbsp;&nbsp;
                                </a><br />
                                <small><span class="label label-success"><?php echo $image->getImageUser()->getCategory() ?></span></small>

                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>

            <!--            <div class='col-md-2'>
                            <img src='http://placehold.it/195x500&text=ADVERTISMENT+HERE' />
                        </div>-->
        </div>
    </div>
</section>