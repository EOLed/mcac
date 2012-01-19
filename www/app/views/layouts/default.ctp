<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php __('Montreal Chinese Alliance Church &raquo;'); ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            echo $this->Html->meta('icon');

            if (Configure::read("General.cdn") === true) {
                echo $this->Html->script("https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js");
                echo $this->Html->script("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js");
                echo $this->Html->css("http://fonts.googleapis.com/css?family=Lato:100,100italic,light,lightitalic,regular,regularitalic,bold,bolditalic,900,900italic|Droid+Serif:regular,italic,bold,bolditalic|Arvo:regular,italic,bold,bolditalic");
            } else {
                echo $this->Html->script('jquery/jquery');
                echo $this->Html->script("jquery/jquery-ui.custom.min");
            }

            if (Configure::read("debug") > 0) {
                echo $this->Html->script("jquery/andy.jqdebugger.min");
            }

            echo $this->Html->css("reset");
            echo $this->Html->css("smoothness/jquery-ui-1.8.7.custom");
            echo $this->Html->css("960");
            echo $scripts_for_layout;
            echo $this->Html->css("mcac");
        ?>
    </head>
    <body>
        <div id="container" class="container_12">
            <div id="header" class="grid_12">
                <?php echo $this->element("header"); ?>
            </div>
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
            </div>
            <div id="footer" class="grid_12 top-border">
                <?php echo $this->element("footer"); ?>
            </div>
            <div id="debug" class="grid_12" style="display: none">
                <?php echo $this->element('sql_dump'); ?>
                <?php echo $this->Js->writeBuffer(); ?>
            </div>
        </div>
    </body>
</html>
