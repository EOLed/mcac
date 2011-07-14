<?php
App::import('Lib', 'routes/GroupSlugRoute');
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('plugin' => 'urg', 
                               'controller' => 'groups', 
                               'action' => 'view', 
                               'mcac'));
	
    Router::connect('/logout', array('controller' => 'users', 
                                     'action' => 'logout', 
                                     'plugin' => 'urg', 
                                     'home'));
    
    Router::connect('/login', array('controller' => 'users', 
                                    'action' => 'login', 
                                    'plugin' => 'urg', 
                                    'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

    Router::connect("/:group_slug", 
                    array("plugin" => "urg", "controller" => "groups", "action" => "view"), 
                    array("routeClass" => "GroupSlugRoute"));

    $langs = "en|ch";

    Router::connect("/:lang/:group_slug", 
                    array("plugin" => "urg", "controller" => "groups", "action" => "view"), 
                    array("routeClass" => "GroupSlugRoute"));

    Router::connect("/groups/:action/*",
                    array("plugin" => "urg", "controller" => "groups", "action" =>"index"));

    Router::connect("/:lang/groups/:action/*", 
                    array("controller" => "groups", "plugin" => "urg"), 
                    array("lang" => $langs));

    Router::connect("/:lang/posts/:action/*", 
                    array("controller" => "posts", "plugin" => "urg_post"), 
                    array("lang" => $langs));

    Router::connect("/:lang/subscriptions/:action/*", 
                    array("controller" => "subscriptions", "plugin" => "urg_subscription"), 
                    array("lang" => $langs));

