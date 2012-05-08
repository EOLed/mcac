<div class="row">
    <div class="span6">
        <?php echo $this->Form->create("Profile", array("class" => "form-horizontal")); ?>
        <fieldset>
            <legend><?php echo __("Edit Profile"); ?></legend>
            <?php
            echo $this->Form->hidden("user_id");
            echo $this->TwitterBootstrap->input("User.username", array("disabled" => true));
            echo $this->TwitterBootstrap->input("name");
            echo $this->TwitterBootstrap->input("email");
            echo $this->TwitterBootstrap->input("locale", array("class" => "span2"));
            ?>
        </fieldset>
        <div class="form-actions">
            <?php echo $this->TwitterBootstrap->button("Save", array("style" => "primary")); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
