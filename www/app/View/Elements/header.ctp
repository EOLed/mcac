<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <?php echo $this->Html->link(__("Montreal Chinese Alliance Church", true),
                                         "/",
                                         array("class" => "brand hidden-phone")) ?>
            <?php echo $this->Html->link(__("MCAC", true),
                                         "/",
                                         array("class" => "brand visible-phone")) ?>
            <?php echo $this->Html->link($this->Html->image("logo-cma.png"),
                                         "/",
                                         array("escape" => false,
                                               "id" => "logo",
                                               "class" => "brand visible-phone")); ?>

            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li>
                        <?php echo $this->Html->link($this->Html->image("logo-cma.png"),
                                                     "/",
                                                     array("escape" => false,
                                                           "id" => "logo",
                                                           "class" => "hidden-phone")); ?>
                    </li>
                    <li><?php echo $this->element("nav_connect"); ?></li>
                    <li><?php echo $this->element("nav_pastors"); ?></li>
                    <li><?php echo $this->element("nav_about"); ?></li>
                    <?php if ($this->Session->read("Config.language") != "eng") { ?>
                    <li><?php echo $this->element("nav_church_activities"); ?></li>
                    <li><?php echo $this->element("nav_news"); ?></li>
                    <?php } ?>
                    
                    <li class="divider-vertical"></li>
                    <li>
                        <?php if ($this->Session->read("Config.language") == "eng") {
                            echo $this->Html->link(__("Chinese", true), array("plugin" => "urg", "controller" => "users", "action" => "locale", "zh_CN"));
                        } else {
                            echo $this->Html->link(__("English", true), array("plugin" => "urg", "controller" => "users", "action" => "locale", "eng"));
                        } ?>
                    </li>
                    <li><?php echo $this->element("nav_login"); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="header" class="visible-desktop">
</div>

<script type="text/javascript">
$('.dropdown-toggle').dropdown();
</script>
