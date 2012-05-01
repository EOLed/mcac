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
    $login_form = $this->Form->create("User", array("action"=>"login", "class"=>"form-inline"));
    $login_form .= $this->Form->input("User.username", array("placeholder" => __("Username", true),
                                                             "class" => "input-small",
                                                             "div" => false,
                                                             "label" => false)) . " ";
    $login_form .= $this->Form->input("User.password", array("placeholder" => __("Password", true),
                                                             "class" => "input-small",
                                                             "div" => false,
                                                             "label" => false));
    $login_form .=  $this->Form->end(array("label" => __("Login", true),
                                           "class" => "btn btn-inverse",
                                           "div" => false));

    $account_item .=  $this->Html->tag("ul", 
                                       $this->Html->tag("li", $login_form, array("escape" => false)),
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
    
    $logout_item = $this->Html->tag("li", $this->Html->link(__("Logout", true), 
                                                            array("plugin" => "urg",
                                                                  "controller" => "users",
                                                                  "action" => "logout")));
    $account_item .= $this->Html->tag("ul", $logout_item, array("escape" => false, "class" => "dropdown-menu"));
}

echo $this->Html->tag("li", $account_item, array("class" => "dropdown", "escape" => false));
?> 
