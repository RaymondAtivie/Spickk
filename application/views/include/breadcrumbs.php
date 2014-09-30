
<?php

function echoA($d, $c) {
    if ($d == $c) {
        return "lictive";
    } else {
        return false;
    }
}
?>
<!-- Breadcrumbs - START -->
<div class="background-clouds breadcrumbs-container">
    <div class="container">
        <ol class="breadcrumb">
            <li><a class="<?php echo echoA("flow", $c); ?>" href="<?php echo base_url("gallery") ?>">Flow</a></li>
            <?php if($this->loggedIn){ ?>
            <li><a class="<?php echo echoA("following", $c); ?>" href="<?php echo base_url("gallery/following") ?>">Following</a></li>
            <?php } ?>
            <li><a class="<?php echo echoA("activity", $c); ?>" href="index.html">Activity</a></li>
        </ol>
    </div>
</div>
<!-- Breadcrumbs - END -->