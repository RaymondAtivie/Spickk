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
                        <h4 class="media-heading"><?php echo $image->getImageUser()->firstname . " " . $image->getImageUser()->lastname; ?></h4>
                        <p><span class="label label-info"><?php echo $image->getImageUser()->getCategory() ?></span> </p>
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-sm-2">
                <button title='Follow' type="button" class="btn btn-primary btn-md btn3d">Follow</button>
            </div>

            <div class='col-md-2 col-md-offset-2 col-sm-2'>
                <table border=0 >
                    <tr>
                        <td style='text-align: right'><b>2132</b></td>
                        <td>&nbsp;&nbsp;Views</td>
                    </tr>
                    <tr>
                        <td style='text-align: right'><b>122</b></td>
                        <td>&nbsp;&nbsp;Likes</td>
                    </tr>
                    <tr>
                        <td style='text-align: right'><b>1234</b></td>
                        <td>&nbsp;&nbsp;Favorites</td>
                    </tr>
                </table>
            </div>
            <div class='col-md-2 col-sm-2'>                
                <p>
                    <button title='Like' type="button" class="btn btn-primary btn-lg btn3d"><span class="fa fa-thumbs-up"></span></button>
                    <button title='Favorite' type="button" class="btn btn-danger btn-lg btn3d"><span class="fa fa-star"></span></button>
                    <button title='Favorite' type="button" class="btn btn-success btn-lg btn3d"><span class="fa fa-search"></span></button>
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

            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-2">
                        <img src='http://placehold.it/300&text=IMASGE' style='width: 100%' />
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" placeholder="Share you comments" style="resize: none; height: 90px"></textarea>
                    </div>
                    <div class="col-md-2">
                        <button title='Comment' type="button" class="btn btn-primary btn-lg btn3d"><span class="fa fa-paper-plane-o"></span></button>
                    </div>
                </div>
            </div>

            <hr />

            <ul class="media-list">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <li class="media blog-entry">
                        <div class="pull-left">
                            <img class="media-object" src="http://placehold.it/75" alt="...">
                        </div>
                        <div class="media-body">
                            <div class="blog-entry-content">
                                <h4>First Last Name</h4>
                                <div class="date">48 mins ago</div>
                                <div class="content">
                                    <p>Sed porta ac ipsum ut mollis. Integer id vestibulum dui, at dapibus orci. Nunc adipiscing, orci sit amet ultricies sagittis, arcu orci feugiat lorem, nec feugiat magna erat id lectus. </p>
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