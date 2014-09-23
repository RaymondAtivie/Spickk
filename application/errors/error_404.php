
<!DOCTYPE html>
<html>
    <head>
        <title>Spickk Gallery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="http://localhost/spickk/assets/cdn/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!--<link href="http://localhost/spickk/assets/cdn/font-awesome.min.css" rel="stylesheet">-->
        <link href="http://localhost/spickk/assets/css/neat-blue.css" rel="stylesheet" media="screen" id="neat-stylesheet">
        <link href="http://localhost/spickk/assets/libs/lightbox/css/lightbox.css" rel="stylesheet" type="text/css">
        
        <link href="http://localhost/spickk/assets/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
        
        <link href="http://localhost/spickk/assets/css/custom.css" rel="stylesheet" type="text/css">

        <!-- Use google font -->
        <!--<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,300italic,400italic,700italic|Lustria" rel="stylesheet" type="text/css" />-->
        <link href="http://localhost/spickk/assets/cdn/fonts.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body><div id="nav-wrapper" class="background-white color-black" style="margin-bottom: 75px">
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
                <a class="navbar-brand" href="http://localhost/spickk/"><img src="http://localhost/spickk/assets/img/logo.png" alt="logo">Spickk</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://localhost/spickk/gallery">Gallery</a></li>                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost/spickk/profile">Photographer</a></li>
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

                    <li class="dropdown">
                        <a title="Upload" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cloud-upload"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form role="form">
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title">
                                    </div>
                                     <div class="form-group">
                                         <textarea class="form-control" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Tags(comma seperated)">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Publish
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-default">Upload</button>
                                    <span class="color-white"><a href="http://localhost/spickk/upload" class="btn btn-link pull-right">Bulk Upload</a></span>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a title="Search" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-search"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form class="form-inline" role="form">
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-lock"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form role="form">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Username or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-default">Login</button>
                                    <span class="color-white"><button type="button" class="btn btn-link pull-right">Register</button></span>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li><a href="http://localhost/spickk/login">Sign up</a></li>     

                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div><section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="http-error">
                    <p class="text-center http-error-number color-lead">
                        404.
                    </p>
                    <p class="text-center">
                        That's embarrassing, it seems you've reached a dead end.
                    </p>
                    <p class="text-center">
                        <span class="fa fa-frown-o icon-image color-lead"></span>
                    </p>
                    <p class="text-center">
                        This page doesn't exist. how did you get here?
                    </p>
                </div>
            </div>
        </div>
    </div>
</section><footer style="bottom: 0px; position: static; width: 100%" class="background-midnight-blue color-white">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="row">
                    <div class="col-md-12" style="text-align: center">
                        <a href="http://spickk.com">Spickk.com</a> &copy; 2014 
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="http://localhost/spickk/assets/cdn/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->
<script src="http://localhost/spickk/assets/cdn/bootstrap.min.js"></script>

<!-- Include slider -->
<script src="http://localhost/spickk/assets/js/jquery.event.move.js"></script>
<script src="http://localhost/spickk/assets/js/jquery.mixitup.min.js"></script>
<script src="http://localhost/spickk/assets/js/responsive-slider.js"></script>
<script src="http://localhost/spickk/assets/js/responsive-calendar.js"></script>
<script src="http://localhost/spickk/assets/libs/lightbox/js/lightbox-2.6.min.js"></script>
<script src="http://localhost/spickk/assets/js/reduce-menu.js"></script>
<script src="http://localhost/spickk/assets/js/match-height.js"></script>
<script src="http://localhost/spickk/assets/js/holder.js"></script>
<script src="http://localhost/spickk/assets/js/bootstrap-tagsinput.js"></script>
<!--<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>-->

<script type="text/javascript">
    $(document).ready(function() {
        $(document).mousemove(function(e) {
            TweenLite.to($('body'),
                    .5,
                    {css:
                                {
                                    backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px"
                                }
                    });
        });
    });

    $(document).ready(function() {

        $(".albumimg").mouseover(function() {
            var rel = $(this).attr("rel");
            $("#" + rel + "caption").fadeIn(300);
        });

        $(".caption").mouseleave(function() {
            $(this).fadeOut(200);
        });

        $('*[data-poload]').bind('click', function() {
            var e = $(this);
            console.log(e);
            e.unbind('click');
            $.get(e.data('poload'), function(d) {
                console.log(d);
                e.popover({html: true, content: d}).popover('show');
            });
        });



        $('html, body').animate({
            scrollTop: $('#cur').offset().top - 50
        }, 'slow');

        $('.responsive-calendar').responsiveCalendar({
            time: '2013-05',
            events: {
                "2013-05-30": {"number": 5, "badgeClass": "background-turquoise", "url": "http://w3widgets.com/responsive-slider"},
                "2013-05-26": {"number": 1, "badgeClass": "background-turquoise", "url": "http://w3widgets.com"},
                "2013-05-03": {"number": 1, "badgeClass": "background-pomegranate"},
                "2013-05-12": {}}
        });

        $('#mixit').mixitup();
    });

    $(window).load(function() {
        if ($(window).width() > 767) {
            matchHeight($('.info-thumbnail .caption .description'), 3);
        }

        $(window).on('resize', function() {
            if ($(window).width() > 767) {
                $('.info-thumbnail .caption .description').height('auto');
                matchHeight($('.info-thumbnail .caption .description'), 3);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        var $btnSets = $('#responsive'),
                $btnLinks = $btnSets.find('a');

        $btnLinks.click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.user-menu>div.user-menu-content").removeClass("active");
            $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
        });
    });

    $(document).ready(function() {
        $("[rel='tooltip']").tooltip();

        $('.view').hover(
                function() {
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function() {
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }
        );
    });
</script>
</body>
</html>