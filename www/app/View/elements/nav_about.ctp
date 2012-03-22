<div class="grid_4 nav-content-section">
    <?php 
    echo $this->Html->tag("h2", __("nav.about.title"));
    echo __("nav.about.description"); 
    ?>
</div>
<div class="prefix_4 grid_3 nav-content-section">
    <?php echo $this->Html->tag("h2", __("nav.about.learnmore")); ?>
    <ul>
        <?php
        echo $this->Html->tag("li",
                              $this->Html->link(__("Statement of Faith"),
                              __("nav.about.link.statementoffaith")));
        echo $this->Html->tag("li",
                              $this->Html->link(__("MCAC's 40-year History"),
                              __("nav.about.link.history")));
        echo $this->Html->tag("li",
                              $this->Html->link(__("Our Departments"),
                                                "/pages/depts"));
        echo $this->Html->tag("li",
                              $this->Html->link(__("Location & Time"),
                              __("nav.about.link.locationandtime")));
        ?>
    </ul>
</div>
