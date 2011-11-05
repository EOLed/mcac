<div id="logo" class="alpha grid_3">
    <?php echo $this->Html->link($this->Html->image("logo.png"), "/", array("alt"=>"Back to Home", "escape"=>false)); ?>
</div>
<div id="nav-pane" class="omega grid_6 suffix_3">
    <ul id="nav">
        <li id="locale">
            <span>
                <?php if ($this->Session->read("Config.language") == "eng") {
                    echo $this->Html->link(__("Chinese", true), array("plugin" => "urg", "controller" => "users", "action" => "locale", "zh_CN"));
                } else {
                    echo $this->Html->link(__("English", true), array("plugin" => "urg", "controller" => "users", "action" => "locale", "eng"));
                } ?>
            </span>
        </li>
        <li>
            <span><?php echo __("About Us", true); ?></span>
            <div id="nav-about">This is the about page</div>
        </li>
        <li>
            <span><?php echo __("Our Pastors", true); ?></span>
            <div id="nav-pastors">
                <ul>
                    <li><?php echo $this->Html->link(__("Rev. Jonathan Kaan", true), "/jkaan") ?></li>
                    <li><?php echo $this->Html->link(__("Rev. Thomas Chan", true), "/tchan") ?></li>
                    <li><?php echo $this->Html->link(__("Rev. Terry Yeung", true), "/tyeung") ?></li>
                    <li><?php echo $this->Html->link(__("Rev. Ian Ho", true), "/iho") ?></li>
                    <li><?php echo $this->Html->link(__("Pastor Davis Marshall", true), "/mdavis") ?></li>
                </ul>
            </div>
        </li>
        <li>
            <span><?php echo __("Connect", true); ?></span>
            <div id="nav-connect">connect with us!</div>
        </li>
    </ul>
</div>


<script type="text/javascript">
    $("#nav li").hover(
        function() { $(this).addClass("hover") }, 
        function() { $(this).removeClass("hover") }
    );
</script>
