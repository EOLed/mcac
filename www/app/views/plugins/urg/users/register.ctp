<?php echo $this->Session->flash("auth") ?>

<div class="login">
    <?php echo $this->Form->create("User", array("action"=>"register")) ?>
        <?php echo $this->Form->input("User.username", array("label"=>__("Username", true))) ?>
        <?php echo $this->Form->input("User.password", array("label"=>__("Password", true))) ?>
        <?php echo $this->Form->password("User.confirm") ?>
        
        <?php echo $this->Form->input("Profile.name", array("label"=>__("Name", true))) ?>
        <?php echo $this->Form->input("Profile.email", array("label"=>__("E-mail", true))) ?>
        <?php echo $this->Form->input("Profile.dob", array("label"=>__("Date of Birth", true))) ?>
	    <?php echo $this->Form->submit(__("Register", true)) ?>
    <?php echo $this->Form->end() ?>
</div>
