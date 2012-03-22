<div id="logo" class="alpha grid_3">
    <?php echo $this->Html->link($this->Html->image("logo.png"), "/", array("alt"=>"Back to Home", "escape"=>false)); ?>
</div>
<div id="nav-pane" class="omega grid_6 suffix_3">
    <ul id="nav">
        <li id="locale">
            <span>
                <?php if ($this->Session->read("Config.language") == "eng") {
                    echo $this->Html->link(__("Chinese"), array("plugin" => "urg", "controller" => "users", "action" => "locale", "zh_CN"));
                } else {
                    echo $this->Html->link(__("English"), array("plugin" => "urg", "controller" => "users", "action" => "locale", "eng"));
                } ?>
            </span>
        </li>
        <li>
            <span><?php echo __("About Us"); ?></span>
            <div id="nav-about" class="nav-content">
                <?php echo $this->element("nav_about"); ?>
            </div>
        </li>
        <li>
            <span><?php echo __("Our Pastors"); ?></span>
            <div id="nav-pastors" class="nav-content">
                <?php echo $this->element("nav_pastors"); ?>
            </div>
        </li>
        <li>
            <span><?php echo __("Connect"); ?></span>
            <div id="nav-connect" class="nav-content">
                <?php echo $this->element("nav_connect"); ?>
            </div>
        </li>
    </ul>
</div>


<script type="text/javascript">
    $("#nav li").hover(
        function() { $(this).addClass("hover") }, 
        function() { $(this).removeClass("hover") }
    );
</script>
