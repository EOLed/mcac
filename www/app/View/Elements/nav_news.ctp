<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo __("News", true) ?> <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php 
        echo $this->Html->tag("li", $this->Html->link(__("Duty Schedule", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "duty")));
        echo $this->Html->tag("li", $this->Html->link(__("Forms", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "forms")));
    ?>
    </ul>
</li>

