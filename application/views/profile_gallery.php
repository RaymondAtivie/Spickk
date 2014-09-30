<style>
    .img {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/lightBox.css" />
<script src="<?php echo base_url() ?>assets/js/lightBox.js"></script>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#gallery" role="tab" data-toggle="tab"><h3>Gallery</h3></a></li>
                    <li><a href="#albums" role="tab" data-toggle="tab"><h3>Albums</h3></a></li>
                    <li><a href="#about" role="tab" data-toggle="tab"><h3>About</h3></a></li>
                    <li><a href="#fav" role="tab" data-toggle="tab"><h3>Collection <i style="color: gold" class="fa fa-star"></i> <?php echo $user->numFavs() ?></h3></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="gallery">
                        <br />
                        <div class="row">
                            <div class='col-md-12'>
                                <?php if (is_array($user_images)) { ?>
                                    <?php foreach ($user_images as $image) { ?>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 0px 4px 10px 4px">
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
                                                       alt="<?php echo $image->title ?>
                                                       <br />
                                                       <button title='Like' onclick='likeImage(<?php echo $image->id ?>);' id='btnLike' class='btn btn-default btn-xs'><i class='fa fa-thumbs-up'></i></button>
                                                       <button title='Add to collection' class='btn btn-default btn-xs'><i class='fa fa-star'></i></button>
                                                       ">
                                                        <i class="fa fa-search-plus"></i>&nbsp;&nbsp;
                                                    </a><br />
                                                    <small><span class="label label-success"><?php echo $image->getImageUser()->getCategory() ?></span></small>

                                                </div>

                                            </div>
                                        </div> 
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="alert alert-info">No images have been added</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="albums">
                        <br />
                        <div class="row">
                            <?php for ($i = 0; $i < 7; $i++) { ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="http://placehold.it/320x200" class="albumimg" rel="id<?php echo $i ?>" alt="The Image">
                                        <div class="caption" id="id<?php echo $i ?>caption">
                                            <h3>Thumbnail label</h3>
                                            <p>This is a description</p>
                                            <p>
                                                <a href="#" class="btn btn-primary" role="button">View</a> 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="about">
                        <br />
                        <div class='row'>
                            <div class='col-md-6'>
                                <h3>Name</h3>
                                <p>Raymond Ativie</p>
                                <h3>Name</h3>
                                <p>Raymond Ativie</p>
                                <h3>Name</h3>
                                <p>Raymond Ativie</p>
                                <h3>Name</h3>
                                <p>Raymond Ativie</p>
                            </div>
                            <div class='col-md-6'>
                                <h3>Name</h3>
                                <p>Raymond Ativie</p>
                                <h3>Name</h3>
                                <p>Raymond Ativie</p>
                                <h3>Name</h3>
                                <p>Raymond Ativie</p>
                                <h3>Name</h3>
                                <p>Raymond Ativie</p>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane active" id="fav">
                        <br />
                        <div class="row">
                            <div class='col-md-12'>
                                <?php if (is_array($userFavImages)) { ?>
                                    <?php foreach ($userFavImages as $image) { ?>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 0px 4px 10px 4px">
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
                                                            <a href="<?php echo base_url("profile/page/" . $image->getImageUser()->username) ?>">
                                                                <?php echo $image->getImageUser()->firstname . " " . $image->getImageUser()->lastname; ?>
                                                            </a>
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
                                <?php } else { ?>
                                    <div class="alert alert-info">No images have been added to this collection</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class='col-md-2'>
                <img src="holder.js/195x500/text:Advertise HERE" />
            </div>
        </div>


    </div>
</section>
<script>
    function likeImage(image_id) {           
        var url = "";
        console.log(this);
        if (like === "Like") {
            url = "<?php echo base_url("image/likeImage") ?>/";
        } else {
            url = "<?php echo base_url("image/unLikeImage") ?>/";
        }
        alert(url);
        $.get(url + image_id, function (data, status) {
            console.log("Data: " + data + " -- Status: " + status);
            alert(status+" "+data);
            if (status === "success" && data === "1") {
//                if (like === "Like") {
//                    $("#btnLike").addClass("btn-success");
//                    $("#btnLike").removeClass("btn-default");
//                    $("#btnLike").attr({"title": "Unlike"});
//                } else {
//                    $("#btnLike").addClass("btn-default");
//                    $("#btnLike").removeClass("btn-success");
//                    $("#btnLike").attr({"title": "Like"});
//                }
            }
        });
    }

    $(document).ready(function () {
        $(".albumimg").mouseover(function () {
            var rel = $(this).attr("rel");
            $("#" + rel + "caption").fadeIn(300);
        });

        $(".caption").mouseleave(function () {
            $(this).fadeOut(200);
        });

        $(".img-popover").popover();



        $('html, body').animate({
            scrollTop: $('#cur').offset().top - 50
        }, 'slow');
    });
</script>