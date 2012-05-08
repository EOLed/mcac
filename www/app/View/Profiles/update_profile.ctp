<div class="row">
    <div class="span12">
        <?php echo $this->Form->create("Profile", array("class" => "form-horizontal")); ?>
        <fieldset>
            <legend><?php echo __("My Profile"); ?></legend>
            <?php
            echo $this->Form->hidden("Profile.id");
            echo $this->Form->hidden("User.id");
            echo $this->TwitterBootstrap->input("User.username", array("readonly" => "readonly"));
            echo $this->TwitterBootstrap->input("name");
            echo $this->TwitterBootstrap->input("email");
            echo $this->TwitterBootstrap->input("locale", array("class" => "span2", "options" => $locales));
            ?>
            <div class="row" id="change-password">
                <div class="offset2 span10 margin-bottom">
                    <a href="#">Change your password</a>
                    <span id="change-password-cancel" style="display: none"> &middot; <a href="#">Cancel</a></span>
                </div>
            </div>
            <div id="change-password-form" style="display: none">
                <?php
                echo $this->TwitterBootstrap->input("User.old_password", array("value" => "", 
                                                                               "class" => "span2",
                                                                               "type" => "password"));
                echo $this->TwitterBootstrap->input("User.password", array("value" => "", 
                                                                           "class" => "span2"));
                echo $this->TwitterBootstrap->input("User.confirm_password", 
                                                    array("value" => "", 
                                                          "class" => "span2",
                                                          "type" => "password"));
                ?>
            </div>
        </fieldset>
        <div class="form-actions">
            <?php echo $this->TwitterBootstrap->button("Save", array("style" => "primary")); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<script type="text/javascript">
    $("#ProfileUpdateProfileForm").submit(function() {
        
    });

    $("#change-password").click(function() {
        $("#change-password-form").fadeToggle("fast", "swing", function() {
            if (!$("#change-password-form").is(":visible")) {
                $("#UserOldPassword").val("");
                $("#UserPassword").val("");
                $("#UserConfirmPassword").val("");
            }
        });
        $("#change-password-cancel").toggle();
    });
</script>
