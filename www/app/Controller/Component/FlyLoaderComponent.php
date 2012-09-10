<?php
class FlyLoaderComponent extends Component {
    var $controller = null;

    var $COMPONENT_TYPE = "Component";
    var $HELPER_TYPE = "Helper";
    var $BEHAVIOR_TYPE = "Behavior";
        
    function initialize(Controller $controller) {
        // saving the controller reference for later use
        $this->controller = $controller;
    }
                                
    function load($type, $abs_name) {
        $settings = array();
        if (is_array($abs_name)) {
            $keys = array_keys($abs_name);

            foreach ($keys as $key) {
                $settings = $abs_name[$key];
                $settings["enabled"] = true;
                $abs_name = $key;

                break;
            }
        }

        if (App::import($type, $abs_name)) {
            $name = $this->get_name($abs_name);

            if ($type == $this->COMPONENT_TYPE) {
                /*$component2 = $name.'Component';
                $component =& new $component2(null);
                        
                if (method_exists($component, 'initialize')) {
                    $component->initialize($this->controller, $settings);
                }
                            
                if (method_exists($component, 'startup')) {
                    $component->startup($this->controller);
                }
                        
                $this->controller->{$name} = &$component;*/
                $this->controller->{$name} = $this->controller->Components->load($name, $settings);
                $this->controller->{$name}->initialize($this->controller);
            } else if ($type == $this->HELPER_TYPE) {
                CakeLog::write("debug", "loading helper: $name");
                $this->controller->helpers[] = $name;
            } else if ($type == $this->BEHAVIOR_TYPE) {
                CakeLog::write("debug", "loading behavior: $name");
                $this->controller->Behaviors->attach($name);
            }
        } else {
            $name = false;
        }

        return $name;
    }

    function get_name($name) {
        $pos = strrpos($name, ".");

        if ($pos !== false)
            $name = substr($name, $pos + 1); 
        
        return $name;
    }

    function unload($type, $name) {
        if ($type == $this->BEHAVIOR_TYPE) {
            $this->controller->Behaviors->detach($name);
        }
    }
}
