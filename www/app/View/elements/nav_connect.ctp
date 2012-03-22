<div class="grid_4 nav-content-section" style="z-index: 10">
    <?php 
    echo $this->Html->tag("h2", __("nav.connect.title"));
    echo __("nav.connect.description"); 
    ?>
</div>
<div class="prefix_4 grid_3 nav-content-section" style="z-index: 5">
    <?php echo $this->Html->tag("h2", __("Chinese Communities")); ?>
    <ul>
        <?php
        echo $this->Html->tag("li",
                $this->Html->link(__("Hang-Oi (Elderly)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "hangoi")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Jien Jin (Elderly)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "jienjin")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Canaan (Elderly)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "canaan")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Zion (Adults)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "zion")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Mandarin (Adults)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "mandarin")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Betha (Married)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "betha")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Elisha (Career)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "elisha")));
        echo $this->Html->tag("li",
                $this->Html->link(__("David (High School)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "david")));
        ?>
    </ul>
</div>
<div class="prefix_7 grid_3 suffix_2 nav-content-section" style="z-index: 3">
    <?php echo $this->Html->tag("h2", __("English Communities")); ?>
    <ul>
        <?php
        echo $this->Html->tag("li",
                $this->Html->link(__("Jacob (Family)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "jacob")));
        echo $this->Html->tag("li",
                $this->Html->link(__("AE (Career)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "ae")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Bethany (College/University)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "bethanies")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Timothy (High School/CEGEP1)"), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "timothies")));
        ?>
    </ul>
</div>

