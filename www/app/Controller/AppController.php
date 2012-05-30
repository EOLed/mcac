<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
    var $components = array("Session", "Cookie");
    var $helpers = array("Js" => array("Jquery"), "Session", "Html", "Form", "Urg.SmartSnippet");
	
    function log($msg, $type = LOG_ERROR) {
    	$trace = debug_backtrace();
        parent::log("[" . $this->toString() . "::" . $trace[1]["function"] . "()] $msg", $type);
    }

    function beforeFilter() {
        parent::beforeFilter();
        CakeLog::write(LOG_DEBUG, "app controller beforeFilter(): " . Debugger::exportVar($this->request, 5));
        if (isset($this->params["lang"])) {
            $this->Session->write("Config.language", $this->params["lang"]);
            Configure::write("Config.language", $this->params["language"]);
            $this->log("setting language from param: " . $this->params["lang"]);
        } else if (!$this->Session->check("Config.language") && $this->Cookie->read("Config.language") != null) {
            $this->Session->write("Config.language", $this->Cookie->read("Config.language"));
            Configure::write("Config.language", $this->Cookie->read("Config.language"));
            $this->log("setting language from cookie: " . $this->Cookie->read("Config.language"));
        } else if (!$this->Session->check("Config.language") || $this->Session->read("Config.language") == "") {
            Configure::load("config");
            $default_lang = Configure::read("Language.default");
            $this->Session->write("Config.language", $default_lang);
            Configure::write("Config.language", $default_lang);
        }

        $this->Cookie->write("Config.language", $this->Session->read("Config.language"), false, "5 days");

        $this->log("THE LANGUAGE: " . $this->Session->read("Config.language"), LOG_DEBUG);
    }
}
