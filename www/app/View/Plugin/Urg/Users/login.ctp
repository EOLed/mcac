<div class="row">
    <?php echo $this->Session->flash("auth") ?>

    <div class="span6 login">
        <?php echo $this->Form->create("User", array("action"=>"login")) ?>
            <p class="textbox">
                <?php echo $this->Form->input("User.username", array("label"=>__("Username", true))) ?>
            </p>
            <p class="textbox">
                <?php echo $this->Form->input("User.password", array("label"=>__("Password", true))) ?>
            </p>
            <?php echo $this->Form->submit(__("Login", true)) ?>
        <?php echo $this->Form->end() ?>
    </div>
</div>

<script type="text/javascript">
    $($("#UserUsername").focus());
</script>
