<?php
$logged_user = CakeSession::read("User"); 
$caret = $this->Html->tag("b", "", array("class" => "caret"));
$account_item = null;

if ($logged_user == null) {
    $account_item = $this->Html->link(__("Login", true) . $caret,
                           "#", 
                           array("class" => "dropdown-toggle", 
                                 "data-toggle" => "dropdown",
                                 "escape" => false));
    $login_form = $this->Form->create("User", array("url" => array("plugin" => "urg",
                                                                   "controller" => "users",
                                                                   "action"=>"login")));
    $username = $this->Form->input("User.username", array("placeholder" => __("Username", true),
                                                             "div" => false,
                                                             "label" => false));
    $password = $this->Form->input("User.password", array("placeholder" => __("Password", true),
                                                             "div" => false,
                                                             "label" => false));
    $login_button =  $this->Form->submit(__("Login", true),
                                         array("class" => "btn btn-inverse",
                                               "div" => false));
    $login_form .= $this->Html->div("control-group", $this->Html->div("controls", $username));
    $login_form .= $this->Html->div("control-group", $this->Html->div("controls", $password . " " . $login_button));
    $login_form .= $this->Form->end();

    $registration_enabled = Configure::read("User.registrationEnabled");

    $register_form_item = "";
    if ($registration_enabled) {
        $register_label = $this->Html->tag("li", 
                                           __("Don't have an account?", true), 
                                           array("class" => "dropdown-label-header"));
        $register_form = $this->Form->create("Profile", 
                                             array("url" => array("controller" => "profiles",
                                                                  "action" => "register",
                                                                  "plugin" => false)));

        $register_button =  $this->Form->submit(__("Sign Up", true),
                                                array("class" => "btn btn-inverse", "div" => false));

        $register_form .= $this->Html->div("control-group", $this->Html->div("controls", $username));
        $register_form .= $this->Html->div("control-group", 
                                           $this->Html->div("controls", $password . " " . $register_button));
        $register_form .= $this->Form->end();

        $register_form_item = $register_label . $this->Html->tag("li", $register_form, array("escape" => false));
    }

    $login_form_item = $this->Html->tag("li", $login_form, array("escape" => false));

    $account_item .=  $this->Html->tag("ul", $login_form_item . $register_form_item,
                                       array("escape" => false,
                                             "class" => "dropdown-menu",
                                             "id" => "login-menu"));
} else {
    $username_label = $this->Html->tag("strong", $logged_user["User"]["username"]);
    $account_item = $this->Html->link($username_label . " " . $caret,
                                      "#", 
                                      array("class" => "dropdown-toggle", 
                                            "data-toggle" => "dropdown",
                                            "escape" => false,
                                            "id" => "account-username"));
    
    $profile_item = $this->Html->tag("li", $this->Html->link(__("My profile"),
                                                             array("controller" => "profiles",
                                                                   "action" => "update_profile",
                                                                   "plugin" => false)));
    $logout_item = $this->Html->tag("li", $this->Html->link(__("Logout", true), 
                                                            array("plugin" => "urg",
                                                                  "controller" => "users",
                                                                  "action" => "logout")));
    $account_item .= $this->Html->tag("ul", 
                                      $profile_item . $logout_item, 
                                      array("escape" => false, 
                                            "class" => "dropdown-menu"));
}

echo $this->Html->tag("li", $account_item, array("class" => "dropdown", "escape" => false));
?> 
