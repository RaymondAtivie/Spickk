
<!-- Include slider -->
<script src="<?php echo base_url() ?>assets/js/jquery.event.move.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.mixitup.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/responsive-slider.js"></script>
<script src="<?php echo base_url() ?>assets/js/responsive-calendar.js"></script>
<script src="<?php echo base_url() ?>assets/libs/lightbox/js/lightbox-2.6.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/reduce-menu.js"></script>
<script src="<?php echo base_url() ?>assets/js/match-height.js"></script>
<script src="<?php echo base_url() ?>assets/js/holder.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-tagsinput.js"></script>
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