<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo __("Church Activities", true) ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php 
        echo $this->Html->tag("li", $this->Html->link(__("Sunday School", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "sundayschool")));
        echo $this->Html->tag("li", $this->Html->link(__("Prayer Meeting", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "prayermeeting")));
        echo $this->Html->tag("li", $this->Html->link(__("Fellowships", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "fellowships")));
        echo $this->Html->tag("li", $this->Html->link(__("Caring Mission", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "caring")));
        echo $this->Html->tag("li", $this->Html->link(__("Outreach", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "outreach")));
    ?>
    </ul>
</li>


