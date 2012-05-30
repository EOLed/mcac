<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- default.ctp -->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php __('Montreal Chinese Alliance Church &raquo; ', true); ?><?php echo $title_for_layout; ?></title>
        <link rel="icon" type="image/png" href="<?php echo $this->Html->url("/favicon.png"); ?>" />
        <?php
            echo $this->Html->meta(array("name"=>"viewport", "content"=>"width=device-width, initial-scale=1.0, user-scalable=no"));
            echo $this->fetch("meta");
            Configure::load("config");
            if (Configure::read("General.cdn") === true) {
                echo $this->Html->script("https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js");
                echo $this->Html->script("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js");
                echo $this->Html->css("http://fonts.googleapis.com/css?family=Antic+Slab|Patua+One|Lato:100,100italic,light,lightitalic,regular,regularitalic,bold,bolditalic,900,900italic|Droid+Serif:regular,italic,bold,bolditalic|Arvo:regular,italic,bold,bolditalic");
            } else {
                echo $this->Html->script('jquery/jquery.min');
                echo $this->Html->script("jquery/jquery-ui.custom.min");
            }

            echo $this->Html->script("bootstrap-transition");
            echo $this->Html->script("bootstrap-collapse");
            echo $this->Html->script("bootstrap-dropdown");

            if (Configure::read("debug") > 0) {
                echo $this->Html->script("jquery/andy.jqdebugger.min");
            }

            echo $this->Html->css("reset");
            echo $this->Html->css("smoothness/jquery-ui-1.8.7.custom");
            echo $this->Html->css("bootstrap");
            echo $this->Html->css("bootstrap-responsive");
            echo $this->fetch("script");
            echo $this->fetch("css");
            echo $this->Html->css("mcac");
        ?>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-28737715-1']);
            _gaq.push(['_setDomainName', 'montreal-cac.org']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>
    <body>
        <?php echo $this->element("header"); ?>
        <div id="container" class="container">
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch("content"); ?>
            </div>
        </div>
        <div id="footer" class="top-border">
                <?php echo $this->element("footer"); ?>
        </div>
        <script type="text/javascript">
            retries = 0;
            $("img").error(function() {
                if (retries > 20) {
                    d = new Date();
                    $(this).attr("src", $(this).attr("src") + "?"+ d.getTime());
                    retries++;
                } else {
                    $(this).remove();
                }
            });
        </script>
    </body>
</html>
<!-- end default.ctp -->
