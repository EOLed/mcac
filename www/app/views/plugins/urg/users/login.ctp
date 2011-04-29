<?php echo $this->Session->flash("auth") ?>

<div class="login">
    <?php echo $form->create("User", array("action"=>"login")) ?>
	    <p class="textbox">
	        <?php echo $form->input("User.username", array("label"=>__("Username", true))) ?>
	    </p>
	    <p class="textbox">
	        <?php echo $form->input("User.password", array("label"=>__("Password", true))) ?>
	    </p>
	    <?php echo $form->submit(__("Login", true)) ?>
    <?php echo $form->end() ?>
</div>

<script type="text/javascript">
    $($("#UserUsername").focus());
</script>
