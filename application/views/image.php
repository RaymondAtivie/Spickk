<style>
    .btnClicked{
        background-color: goldenrod;
    }
</style>
<div class='background-clouds'>
    <div class="container" style='padding-top: 20px; padding-bottom: 10px'>
        <div class="row">
            <div class="col-md-4 col-sm-6" style='margin-bottom: 0px'>
                <div class="media">
                    <a class="thumbnail pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/120x70&text=profile+picture">
                    </a>
                    <div class="media-body">
                        <h3 class="media-heading"><b><?php echo $image->title ?></b></h3>
                        <h4 class="media-heading"><a href="<?php echo base_url("profile/page") . "/" . $image->getImageUser()->username; ?>"><?php echo $image->getImageUser()->firstname . " " . $image->getImageUser()->lastname; ?></a></h4>
                        <p><span class="label label-info"><?php echo $image->getImageUser()->getCategory() ?></span> </p>
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-sm-2">
                <?php if ($this->loggedIn) { ?>
                    <?php
                    if ($this->userObj->id != $image->getImageUser()->id) {
                        if ($this->userObj->isFollowing($image->getImageUser()->id)) {
                            $y = "hidden";
                            $n = "";
                        } else {
                            $y = "";
                            $n = "hidden";
                        }
                        ?>
                        <button type="button" rel="<?php echo $image->getImageUser()->id ?>" class="btn btn-default <?php echo $y ?>" id="followBtn" >Follow</button>
                        <button type="button" rel="<?php echo $image->getImageUser()->id ?>" class="btn btn-success <?php echo $n ?>" id="followingBtn" >Following</button>
                        <!--<button type="button" class="btn btn-danger hidden" id="unfollowBtn" >Unfollow</button>-->
                    <?php } ?>  
                <?php } ?>  
            </div>

            <div class='col-md-2 col-md-offset-2 col-sm-2'>
                <table border=0 >
                    <tr>
                        <td style='text-align: right'><b>2132</b></td>
                        <td>&nbsp;&nbsp;Views</td>
                    </tr>
                    <tr>
                        <td style='text-align: right'><b><?php echo $image->numLikes() ?></b></td>
                        <td>&nbsp;&nbsp;Likes</td>
                    </tr>
                    <tr>
                        <td style='text-align: right'><b><?php echo $image->numFavs() ?></b></td>
                        <td>&nbsp;&nbsp;Favorites</td>
                    </tr>
                </table>
            </div>
            <div class='col-md-2 col-sm-2'>                
                <p>
                    <?php
                    if ($this->loggedIn) {
                        if ($this->userObj->id != $image->getImageUser()->id) {
                            if (!$this->userObj->isLikedImage($image->id)) {
                                ?>
                                <button title='Like' id="btnLike" rel="<?php echo $image->id ?>" type="button" class="btn btn-default btn-lg btn3d"><span class="fa fa-thumbs-up"></span></button>
                            <?php } else { ?>
                                <button title='Unlike' id="btnLike" rel="<?php echo $image->id ?>" type="button" class="btn btn-success btn-lg btn3d"><span class="fa fa-thumbs-up"></span></button>
                                <?php
                            }
                        }
                        ?>
                        <?php if (!$this->userObj->isFavedImage($image->id)) { ?>
                            <button title='Favorite' id="btnFav" rel="<?php echo $image->id ?>" type="button" class="btn btn-default btn-lg btn3d"><span class="fa fa-star"></span></button>
                        <?php } else { ?>
                            <button title='Unfavorite' id="btnFav" rel="<?php echo $image->id ?>" type="button" class="btn btn-success btn-lg btn3d"><span class="fa fa-star"></span></button>
                        <?php } ?>
                    <?php } ?>

                    <button title='Zoom' type="button" class="btn btn-primary btn-lg btn3d"><span class="fa fa-search"></span></button>
                </p>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style='padding-top: 10px'>
    <div class='row-fluid'>
        <div class='col-md-10 col-md-offset-1' style="text-align: center">
            <img class="img" src='<?php echo base_url() . "collection/original/" . $image->file ?>' style='max-width: 100%; min-width: 50%' />
        </div>
    </div>
</div>
<hr />

<div class="container">
    <div class='row'>
        <div class='col-md-7'>
            <h4>Description</h4>
            <p><?php echo $image->description ?></p>
            <small><b>Uploaded</b>: <?php echo $image->date_time ?></small>
        </div>

        <div class='col-md-5'>
            <h4>Tags</h4>
            <?php foreach ($image->getImageTags() as $tag) { ?>
                <span class="label label-primary"><?php echo $tag ?></span>
            <?php } ?>
        </div>        
    </div>
</div>

<hr />

<style>
    [class*="col-"] {
        margin-bottom: 0px;
    }
    .carousel {
        margin-bottom: 0;
        padding: 0 40px 30px 40px;
    }
    /* Reposition the controls slightly */
    .carousel-control {
        left: -12px;
    }
    .carousel-control.right {
        right: -12px;
    }
    /* Changes the position of the indicators */
    .carousel-indicators {
        right: 50%;
        top: auto;
        bottom: 0px;
        margin-right: -19px;
    }
    /* Changes the colour of the indicators */
    .carousel-indicators li {
        background: #c0c0c0;
    }
    .carousel-indicators .active {
        background: #333333;
    }
    .carousel-control.left, .carousel-control.right{
        font-weight: bold;
        color: black;
        padding-top: 20px;
        font-size: 40px;
        background-image: none;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h3><span class="fa fa-comment-o"></span> Comments: 4 <sup></sup></h3>
            <?php $this->handler->msgBox() ?>
            <form method="POST" action="<?php echo base_url("image/commentImage") ?>">
                <?php if (!$this->loggedIn) { ?>
                    <input type="hidden" name="guestComment" value="<?php echo "yes" ?>" />
                <?php } ?>
                <input type="hidden" name="image_id" value="<?php echo $image->id ?>" />
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-2">
                            <img src='http://placehold.it/300&text=IMASGE' style='width: 100%' />
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <?php if (!$this->loggedIn) { ?>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="guest_fullname" placeholder="Full Name" />
                                        <small class="text-info"><label><input class="" type="checkbox" name="anon" /> post as anonymous</label></small>
                                    </div>  <br />
                                <?php } ?>

                                <div class="col-md-12">  
                                    <textarea class="form-control" name="comment" placeholder="Share you comments" style="resize: none; height: 80px"></textarea>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button title='Comment' type="submit" class="btn btn-primary btn-lg btn3d"><span class="fa fa-paper-plane-o"></span></button>
                        </div>
                    </div>
                </div>
            </form>

            <hr />

            <ul class="media-list">
                <?php foreach ($image->getComments() as $comment) { ?>
                    <li class="media blog-entry">
                        <div class="pull-left">
                            <img class="media-object" src="http://placehold.it/75" alt="...">
                        </div>
                        <div class="media-body">
                            <div class="blog-entry-content">
                                <?php if (isset($comment['username'])) { ?>
                                    <h4>
                                        <a href="<?php echo base_url("profile/page") . "/" . $comment['username']; ?>"><?php echo $comment['fullname'] ?></a>
                                    </h4>
                                <?php } else { ?>
                                    <h4><?php echo $comment['fullname'] ?></h4>
                                <?php } ?>

                                <div class="date"><?php echo $comment['date_time'] ?> mins ago</div>
                                <div class="content">
                                    <p><?php echo $comment['comment'] ?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">

                    <h3>Other Photos by Jofn Doe</h3>

                    <div class="well"> 
                        <div id="myCarousel" class="carousel slide">

                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="row">
                                        <?php for ($i = 0; $i < 3; $i++) { ?>
                                            <div class="col-md-4"><a href="#x" ><img src="http://placehold.it/450" alt="Image" style="max-width:100%;" /></a></div>
                                        <?php } ?>
                                    </div><!--/row-fluid-->
                                </div><!--/item-->

                                <?php for ($i = 0; $i < 2; $i++) { ?>
                                    <div class="item">
                                        <div class="row">
                                            <?php for ($i = 0; $i < 3; $i++) { ?>
                                                <div class="col-md-4"><a href="#x" ><img src="http://placehold.it/450" alt="Image" style="max-width:100%;" /></a></div>
                                            <?php } ?>
                                        </div><!--/row-fluid-->
                                    </div><!--/item-->
                                <?php } ?>

                            </div><!--/carousel-inner-->

                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                        </div><!--/myCarousel-->

                    </div><!--/well-->   
                </div>
            </div>
            <img src="http://placehold.it/480x500&text=480+Ad+Space" />
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $("#followingBtn").hover(
                function () {
                    $(this).removeClass("btn-success");
                    $(this).addClass("btn-danger");
                    $(this).text("Unfollow");
                },
                function () {
                    $(this).addClass("btn-success");
                    $(this).removeClass("btn-danger");
                    $(this).text("Following");
                }
        );


        $("#followingBtn").click(function () {
            var following_id = $(this).attr("rel");
            $.get("<?php echo base_url("profile/unfollowUser") ?>/" + following_id, function (data, status) {
                console.log("Data: " + data + " -- Status: " + status);
                if (status === "success" && data === "1") {
                    $("#followingBtn").addClass("hidden");
                    $("#followBtn").removeClass("hidden");
                }
            });
        });

        $("#followBtn").click(function () {
            var follow_id = $(this).attr("rel");
            $.get("<?php echo base_url("profile/followUser") ?>/" + follow_id, function (data, status) {
                console.log("Data: " + data + " -- Status: " + status);
                if (status === "success" && data === "1") {
                    $("#followBtn").addClass("hidden");
                    $("#followingBtn").removeClass("hidden");
                }
            });
        });



        $("#btnLike").click(function () {
            var image_id = $(this).attr("rel");
            var like = $(this).attr("title");
            var url = "";
            if (like === "Like") {
                url = "<?php echo base_url("image/likeImage") ?>/";
            } else {
                url = "<?php echo base_url("image/unLikeImage") ?>/";
            }
            $.get(url + image_id, function (data, status) {
                console.log("Data: " + data + " -- Status: " + status);
                if (status === "success" && data === "1") {
                    if (like === "Like") {
                        $("#btnLike").addClass("btn-success");
                        $("#btnLike").removeClass("btn-default");
                        $("#btnLike").attr({"title": "Unlike"});
                    } else {
                        $("#btnLike").addClass("btn-default");
                        $("#btnLike").removeClass("btn-success");
                        $("#btnLike").attr({"title": "Like"});
                    }
                }
            });
        });

        $("#btnFav").click(function () {
            var image_id = $(this).attr("rel");
            var like = $(this).attr("title");
            var url = "";
            if (like === "Favorite") {
                url = "<?php echo base_url("image/favImage") ?>/";
            } else {
                url = "<?php echo base_url("image/unFavImage") ?>/";
            }
            $.get(url + image_id, function (data, status) {
                console.log("Data: " + data + " -- Status: " + status);
                if (status === "success" && data === "1") {
                    if (like === "Favorite") {
                        $("#btnFav").addClass("btn-success");
                        $("#btnFav").removeClass("btn-default");
                        $("#btnFav").attr({"title": "Unfavorite"});
                    } else {
                        $("#btnFav").addClass("btn-default");
                        $("#btnFav").removeClass("btn-success");
                        $("#btnFav").attr({"title": "Favorite"});
                    }
                }
            });
        });

    });
</script>