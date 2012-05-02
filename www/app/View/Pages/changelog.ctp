<div id="changelog" class="row">
    <div class="span6">
        <h1>
            <?php echo __("Version History @ MCAC", true); ?><br/>
            <small><a href="http://www.am05.com/tag/montreal-cac-org">Dev Blog</a> | <a href="http://github.com/achan/mcac">GitHub</a></small>
        </h1>
        <?php
        Configure::load("config");
        echo $this->Markdown->html(file_get_contents(Configure::read("General.changelog")));
        ?>
    </div>
</div>
