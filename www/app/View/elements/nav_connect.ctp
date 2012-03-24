<div class="grid_4 nav-content-section" style="z-index: 10">
    <?php 
    echo $this->Html->tag("h2", __("nav.connect.title", true));
    echo __("nav.connect.description", true); 
    ?>
</div>
<div class="prefix_4 grid_3 nav-content-section" style="z-index: 5">
    <?php echo $this->Html->tag("h2", __("Chinese Communities", true)); ?>
    <ul>
        <?php
        echo $this->Html->tag("li",
                $this->Html->link(__("Hang-Oi (Elderly)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "hangoi")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Jien Jin (Elderly)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "jienjin")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Canaan (Elderly)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "canaan")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Zion (Adults)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "zion")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Mandarin (Adults)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "mandarin")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Betha (Married)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "betha")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Elisha (Career)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "elisha")));
        echo $this->Html->tag("li",
                $this->Html->link(__("David (High School)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "david")));
        ?>
    </ul>
</div>
<div class="prefix_7 grid_3 suffix_2 nav-content-section" style="z-index: 3">
    <?php echo $this->Html->tag("h2", __("English Communities", true)); ?>
    <ul>
        <?php
        echo $this->Html->tag("li",
                $this->Html->link(__("Jacob (Family)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "jacob")));
        echo $this->Html->tag("li",
                $this->Html->link(__("AE (Career)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "ae")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Bethany (College/University)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "bethanies")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Timothy (High School/CEGEP1)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "timothies")));
        ?>
    </ul>
</div>

