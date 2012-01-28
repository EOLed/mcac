<div class="grid_4 nav-content-section">
    <?php 
    echo $this->Html->tag("h2", __("nav.about.title", true));
    echo __("nav.about.description", true); 
    ?>
</div>
<div class="prefix_4 grid_3 nav-content-section">
    <?php echo $this->Html->tag("h2", __("nav.about.learnmore", true)); ?>
    <ul>
        <?php
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
</div>
