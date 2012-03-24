<div id="logo" class="alpha grid_2">
    <?php echo $this->Html->image("logo.png"); ?>
</div>
<div id="banner" class="omega grid_10">
    <ul id="banner-list">
        <?php
        if (isset($banners)) {
            foreach ($banners as $banner) {
                echo $this->Html->tag("li", $this->Html->image($banner));
            }
        }
        ?>
    </ul>
</div>

