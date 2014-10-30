<div id="nav-wrapper" class="background-white color-black" style="margin-bottom: 75px">
    <nav id="mainMenu" class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar background-lead"></span>
                    <span class="icon-bar background-lead"></span>
                    <span class="icon-bar background-lead"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="logo">Spickk</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a title="Search" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-search"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form class="form-inline" action="<?php echo base_url("gallery/search") ?>" method="POST" role="form">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control">
                                        <select class="form-control">
                                            <option>d</option>
                                            <option>d</option>
                                        </select>
                                        <input type="text" name="search" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url() ?>gallery">Gallery</a></li>                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url() ?>profile/page/raymondativie">Photographer</a></li>
                            <li><a href="entry-list.html">Fashion Designer</a></li>
                            <li><a href="entry-list.html">Model</a></li>
                            <li><a href="entry-list.html">MAke-up Artist</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="entry-list.html">Popular</a></li>
                            <li><a href="entry.html">Latest</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url("upload") ?>" ><span class="fa fa-cloud-upload"></span>&nbsp; Upload</a>
                    </li>
                    <?php if ($this->session->userdata("logged_in") != "yes") { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-lock"></span>&nbsp; Login</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="<?php echo base_url("login/signin") ?>" method="POST" role="form">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username or Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-default">Login</button>
                                        <span class="color-white"><button type="button" class="btn btn-link pull-right">Sign Up</button></span>
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li><a href="<?php echo base_url() ?>login">Sign up</a></li>     
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->userObj->firstname ?> <?php echo $this->userObj->lastname ?> &nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() ?>profile/page/<?php echo $this->userObj->username ?>"><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
                                <li><a href="#"><i class="fa fa-cog"></i>&nbsp; Settings</a></li>
                                <li><a href="<?php echo base_url("login/logout") ?>"><i class="fa fa-lock"></i>&nbsp; Logout</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if ($this->session->userdata("logged_in") == "yes") { ?>
                        <style>
                            .mylistitem a{
                                display: inline !important;
                                padding: 0px !important;
                            }
                            .mylistitem i{
                                color: white;
                                padding-right: 3px;
                            }
                            .mylistitem{
                                padding: 5px 15px;
                            }
                        </style>
                        <li class="dropdown">
                            <a title="Notifications" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-globe"></span></a>
                            <ul class="list-group dropdown-menu" style="width: 350px" >
                                <?php foreach ($this->dataH['notifs'] as $notif) { ?>

                                    <a href="<?php echo $notif['link'] ?>" class="list-group-item mylistitem">
                                        <?php
                                        if ($notif['action'] == 'like') {
                                            $act = "heart-o";
                                        } elseif ($notif['action'] == 'follow') {
                                            $act = "plus";
                                        } elseif ($notif['action'] == 'collection') {
                                            $act = "star-o";
                                        } elseif ($notif['action'] == 'comment') {
                                            $act = "comment-o";
                                        } else {
                                            $act = "";
                                        }
                                        ?>
                                        <?php
                                        if ($notif['type'] == 'photo') {
                                            $icon = "photo";
                                        } else {
                                            $icon = "user";
                                        }
                                        ?>
                                        <i class="fa fa-<?php echo $act ?> coral"></i> <i class="fa fa-<?php echo $icon ?> coral"></i> 
                                        <?php echo $notif['text'] ?>
                                    </a>

                                <?php } ?>
                                <a href="" class="list-group-item">See more</a>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>