<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php __('Montreal-CAC.org: '); ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            echo $this->Html->meta('icon');
            echo $this->Html->script('jquery/jquery');
            echo $this->Html->script("jquery/jquery-ui.custom.min");

            echo $this->Html->css("reset");
            echo $this->Html->css("smoothness/jquery-ui-1.8.7.custom");
            echo $this->Html->css("960");
            echo $scripts_for_layout;
            echo $this->Html->css("mcac");
        ?>
    </head>
    <body>
        <div id="container" class="container_12">
            <div id="header" class="span12">
                <?php echo $this->element("header"); ?>
            </div>
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
            </div>
            <div id="footer" class="span12 top-border">
                <?php echo $this->element("footer"); ?>
            </div>
            <div id="debug">
                <?php echo $this->element('sql_dump'); ?>
                <?php echo $this->Js->writeBuffer(); ?>
            </div>
        </div>
    </body>
</html>
