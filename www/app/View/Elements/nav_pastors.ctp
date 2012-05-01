<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo __("Our Pastors", true) ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php 
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Jonathan Kaan", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "jkaan")));
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Thomas Chan", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "tchan")));
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Terry Yeung", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "tyueng")));
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Ian Ho", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "iho")));
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Marshall Davis", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "mdavis")));
    ?>
    </ul>
</li>
