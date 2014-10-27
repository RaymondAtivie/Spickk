<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align: center">

            <div class="page-header">
                <h1>
                    <?php echo $album->name ?> (<?php echo $album->numImages ?>)
                </h1>
                <span><?php echo $album->description ?></span>
            </div>
            BY
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 nobm" >            
            <div class="row">
                <div class="col-md-4">
                    <img width="80%" src="<?php echo base_url() . "collection/profile/" . $albumOwner->profile_img ?>" />
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <h2>
                            <a href="<?php echo base_url()."profile/page/".$albumOwner->username ?>">
                                <?php echo $albumOwner->firstname . " " . $albumOwner->lastname ?>
                            </a>

                            <?php if ($this->loggedIn) { ?>
                                <?php
                                if ($this->userObj->id != $albumOwner->id) {
                                    if ($this->userObj->isFollowing($albumOwner->id)) {
                                        $y = "hidden";
                                        $n = "";
                                    } else {
                                        $y = "";
                                        $n = "hidden";
                                    }
                                    ?>
                                    <button type="button" rel="<?php echo $albumOwner->id ?>" class="btn btn-default pull-right <?php echo $y ?>" id="followBtn" >Follow</button>
                                    <button type="button" rel="<?php echo $albumOwner->id ?>" class="btn btn-success pull-right <?php echo $n ?>" id="followingBtn" >Following</button>
                                    <!--<button type="button" class="btn btn-danger hidden" id="unfollowBtn" >Unfollow</button>-->
                                <?php } ?>  
                            <?php }else{ ?>
                                    <a href="<?php echo base_url("login/mustLogin/follow") ?>" class="btn btn-default pull-right">Follow</a>
                            <?php } ?>
                        </h2>

                    </div>
                    <div class="row">
                        <h3 class="label label-info"><?php echo $albumOwner->getCategory() ?></h3>
                    </div>
                </div>
            </div>          
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
    });
</script>