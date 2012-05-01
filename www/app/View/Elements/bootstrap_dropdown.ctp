<?php
/**
 * expected params:
 * $label = the label to display for the dropdown
 * $items = the items displayed when dropped down
 * 
 * optional params:
 * $class = the class associated to the dropdown button (ie. btn-mini, btn-large, btn-small)
 */

if (!isset($class))
    $class = ""; 
?>
<div class="btn-group">
    <a class="btn <?php echo $class; ?> dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $label; ?><span class="caret"></span></a>
    <ul class="dropdown-menu">
        <?php 
            foreach ($items as $item) {
                echo $this->Html->tag("li", $item, array("escape" => false));
            }
        ?>
    </ul>
</div>
