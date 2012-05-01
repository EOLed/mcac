<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo __("About Us", true) ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php
        echo $this->Html->tag("li", __("nav.about.title", true), array("class" => "dropdown-label-header"));
        echo $this->Html->tag("li", __("nav.about.description", true), array("class" => "dropdown-label"));
        echo $this->Html->tag("li", __("nav.about.learnmore", true), array("class" => "dropdown-label-header"));
        echo $this->Html->tag("li",
                              $this->Html->link(__("Statement of Faith", true),
                              __("nav.about.link.statementoffaith", true)));
        echo $this->Html->tag("li",
                              $this->Html->link(__("MCAC's 40-year History", true),
                              __("nav.about.link.history", true)));
        echo $this->Html->tag("li",
                              $this->Html->link(__("Our Departments", true),
                                                "/pages/depts"));
        echo $this->Html->tag("li",
                              $this->Html->link(__("Location & Time", true),
                              __("nav.about.link.locationandtime", true)));
    ?>
    </ul>
</li>
