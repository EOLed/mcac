<div class="grid_12 nav-content-section">
    <h2><?php echo __("Our Pastors") ?></h2>
    <ul>
    <?php 
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Jonathan Kaan"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "jkaan")));
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Thomas Chan"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "tchan")));
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Terry Yeung"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "tyueng")));
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Ian Ho"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "iho")));
        echo $this->Html->tag("li", $this->Html->link(__("Rev. Marshall Davis"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "mdavis")));
    ?>
    </ul>
</div>
