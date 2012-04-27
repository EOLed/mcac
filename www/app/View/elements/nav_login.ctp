<?php $logged_in = CakeSession::read("User") != null; ?>
<li class="dropdown">
    <?php 
    if ($logged_in) {
        echo $this->Html->link(__("Logout", true),
                               array("plugin" => "urg", "controller"=>"users", "action"=>"logout"));
    } else {
        echo $this->Html->link(__("Login", true) . $this->Html->tag("b", "", array("class" => "caret")),
                               "#", 
                               array("class" => "dropdown-toggle", 
                                     "data-toggle" => "dropdown",
                                     "escape" => false));
        ?>
        <ul class="dropdown-menu" id="login-menu">
            <li>
                <?php echo $this->Form->create("User", array("action"=>"login", "class"=>"form-inline")) ?> 
                    <input type="text" class="input-small" placeholder="Username" name="data[User][username]" id="UserUsername">
                    <input type="password" class="input-small" placeholder="Password" name="data[User][password]" id="UserPassword">
                    <input type="submit" class="btn" value="<?php echo __("Login"); ?>" />
                </form>
            </li>
        </ul>
        <?php
    }
     ?> 
</li>
