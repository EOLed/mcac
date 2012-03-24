<div class="grid_12 nav-content-section">
    <h2><?php echo __("Our Pastors", true) ?></h2>
    <ul>
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
</div>
