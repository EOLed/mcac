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
                    <?php if ($this->Session->read("Config.language") == "eng") { ?>
                    <li><?php echo $this->element("nav_connect"); ?></li>
                    <li><?php echo $this->element("nav_pastors"); ?></li>
                    <li><?php echo $this->element("nav_about"); ?></li>
                    <?php } else { ?>
                    <li><?php echo $this->Html->link(__('Main'), "/") ?></li>
                    <li><?php echo $this->Html->link(__('About Us'), array("plugin" => "urg_post",
                                                                           "controller"=>"posts", 
                                                                           "action"=>"view", 
                                                                           1047,
                                                                           '關於我們')) ?></li>
                    <li><?php echo $this->Html->link(__('Ministries'), array("plugin" => "urg_post",
                                                                             "controller"=>"posts", 
                                                                             "action"=>"view", 
                                                                             1048,
                                                                             "教會事工")) ?></li>
                    <li><?php echo $this->Html->link(__('News'), array("plugin" => "urg_post",
                                                                       "controller"=>"posts", 
                                                                       "action"=>"view", 
                                                                       1049,
                                                                       "教會消息")) ?></li>
                    <li><?php echo $this->Html->link(__('Contact Us'), array("plugin" => "urg_post",
                                                                             "controller"=>"posts", 
                                                                             "action"=>"view", 
                                                                             1050,
                                                                             "聯絡我們")) ?></li>
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
