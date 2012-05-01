<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo __("Connect", true) ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
        <?php
        echo $this->Html->tag("li", __("nav.connect.title", true), array("class" => "dropdown-label-header"));
        echo $this->Html->tag("li", __("nav.connect.description", true), array("class" => "dropdown-label"));
        echo $this->Html->tag("li", __("Chinese Communities", true), array("class" => "dropdown-label-header"));
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
                                                                       "david"), array("class" => "dropdown-last")));

        echo $this->Html->tag("li", __("English Communities", true), array("class" => "dropdown-label-header")); 
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
</li>
