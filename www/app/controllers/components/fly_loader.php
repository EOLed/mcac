<?php
class FlyLoaderComponent extends Object {
    var $controller = null;

    var $COMPONENT_TYPE = "Component";
    var $HELPER_TYPE = "Helper";
    var $BEHAVIOR_TYPE = "Behavior";
        
    function initialize(&$controller) {
        // saving the controller reference for later use
        $this->controller =& $controller;
    }
                                
    function load($type, $name) {
        App::import($type, $name);

        if ($type == $COMPONENT_TYPE) {
            $component2 = $name.'Component';
            $component =& new $component2(null);
                    
            if (method_exists($component, 'initialize')) {
                $component->initialize($this->controller);
            }
                        
            if (method_exists($component, 'startup')) {
                $component->startup($this->controller);
            }
                    
            $this->controller->{$name} = &$component;
        } else if ($type == $HELPER_TYPE) {
            $this->helpers[] = $name;
        } else if ($type == $BEHAVIOR_TYPE) {
            $this->Behaviors->attach($name);
        }
    }

    function unload($type, $name) {
        if ($type == $BEHAVIOR_TYPE) {
            $this->Behaviors->detach($name);
        }
    }
}
