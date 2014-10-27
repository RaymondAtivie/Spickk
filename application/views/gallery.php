<style>
    .img {
        cursor: pointer;
    }
    .post-box {
        margin: 0px 0px 0px 0px;
    }
    
    .bottom-curve{        
        border-bottom-left-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
        -webkit-border-bottom-left-radius: 5px !important;
        -webkit-border-bottom-right-radius: 5px !important;
    }
    
    .top-curve{        
        border-radius: 10px;
        -webkit-border-radius: 10px;
    }

</style>

<section>

    <div class="container-fluid">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/lightBox.css" />
        <script src="<?php echo base_url() ?>assets/js/lightBox.js"></script>
        <div class="row">
            <div class='col-md-12 col-lg-10 col-lg-offset-1 col-md-offset-0'>       
                <h1><span>Gallery</span></h1>
                <?php if (!$user_images) { ?>
                    <div class="alert alert-info alert-lg">
                        No images to display
                    </div>
                <?php } else { ?>
                    <div class="continer">
                        <div class="masonry">
                           
                            <?php foreach ($user_images as $image) { ?>
                                <div class="post-box col-xs-12 col-sm-4 col-md-3 col-lg-3" style="padding: 0px 4px 10px 4px">
                                    <div class="imageSub img-popover thumbnail info-thumbnail background-clouds color-text" >
                                        <a href="<?php echo base_url("gallery/image") . "/" . $image->id; ?>">
                                            <img class="img img-responsive" src="<?php echo base_url() ?>collection/thumb_600x/<?php echo $image->file ?>" alt="<?php echo $image->title ?>" />
                                        </a>                            
                                    </div>

                                    <div class="bottom-curve" style="background-color: #f2f2f2; padding: 0px 5px 5px 5px">

                                        <div class="nobm">
                                            <b class="truncate" style="font-size: 17px; display: inline-block; width: 65%" title="<?php echo $image->title ?>"><?php echo $image->title ?></b>

                                            <a href="<?php echo base_url() ?>collection/thumb_1000x/<?php echo $image->file ?>" 
                                               data-imagelightbox="s" style="color: black; font-size: 15px; float: right" title="Quick view" 
                                               alt="<?php echo $image->title ?>">
                                                <i class="fa fa-search-plus"></i>&nbsp;&nbsp;
                                            </a>
                                        </div>

                                        <div>
                                            <small>
                                                <span style="font-size: 15px">
                                                    <a href="<?php echo base_url("profile/page/" . $image->getImageUser()->username) ?>">
                                                        <?php echo $image->getImageUser()->firstname . " " . $image->getImageUser()->lastname; ?>
                                                    </a>
                                                </span>
                                            </small> 
                                            <small style="float: right"><span class="label label-success"><?php echo $image->getImageUser()->getCategory() ?></span></small>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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

<script src="<?php echo base_url() ?>assets/js/masonry.js"></script>
<script src="<?php echo base_url() ?>assets/js/imagesloaded.js"></script>
<script>
    $(document).ready(function () {
        var container = document.querySelector('.masonry');

        imagesLoaded(container, function () {
            var msnry = new Masonry(container, {
                // options
                itemSelector: '.post-box',
                columnWidth: '.post-box'
            });
        });


//        var $container = $('.masonry');
//
//        $container.masonry({
//            itemSelector: '.post-box',
//            columnWidth: '.post-box'
//        });
    });
</script>