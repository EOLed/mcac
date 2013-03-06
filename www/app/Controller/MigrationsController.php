<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('UrgAppController', 'Urg.Controller');
/**
 * Profiles Controller
 *
 * @property Profile $Profile
 */
App::uses("GroupsModel", "Urg.Model");
class MigrationsController extends UrgAppController {
  public $uses = null;

  public $cache = array();

  public function migrate() {
    echo "\n\n\n\n\n";
    $this->cleanup();
/*    $this->create_group("Sunday School", "sundayschool", "mcac-ministries", true);
    $this->create_home_group("Youth I", "youth1", "englishsundayschool");
    $this->create_group("Menu", "mcac-menu", "mcac");*/

    $this->Widget->create();
    $side_panel = $this->Widget->findById(29);
    $mcac_group = $this->Group->findById(64);
    $side_panel["Widget"]["group_id"] = $mcac_group["Group"]["id"];
    $side_panel["Widget"]["placement"] = 'side';
    $options = json_decode($side_panel["Widget"]["options"], true);
    $options["zh_CN"]["post_id"] = 63;
    $side_panel["Widget"]["options"] = json_encode($options);
    $this->Widget->save($side_panel);

    $this->Widget->create();
    $banner = $this->Widget->findById(7);
    $options = array("post_id" => 1152);
    $banner["Widget"]["options"] = json_encode($options);
    $this->Widget->save($banner);

    $this->Widget->create();
    $announcements = $this->Widget->findById(35);
    $announcements["Widget"]["placement"] = 'col-0|0';
    $this->Widget->save($announcements);

    $this->Widget->create();
    $row2Options = json_decode('{"eng":{"group_id":${group_id},"columns":{"col-0":"span4","col-1":"span4", "col-2":"span4"}}, "zh_CN":{"group_id":${group_id},"columns":{"col-0":"span5","ch-col-1":"span5 offset2"}}}', true);
    $options = array("eng" => array("group_id" => "@group_id",
                                    "layout" => array("header" => array("banner" => "span9", "side" => "span3"), 
                                                      "titleRow" => array("title" => "span12 page-title"),
                                                      "content" => array("col0" => "span4", "col1" => "span4", "col2" => "span4"))),
                     "zh_CN" => array("group_id" => "@group_id",
                                      "layout" => array("header" => array("banner" => "span12"),
                                                        "titleRow" => array("title" => "span12 page-title"),
                                                        "content" => array("col0" => "span5", "chcol1" => "span5 offset2"))));
    $this->create_widget("Urg.I18nPageLayout", 'mcac', "/urg/groups/view", "layout", $options);
    $this->create_widget("Urg.GroupTitle", 'mcac', "/urg/groups/view", "title", array("group_id" => "@group_id"));
    $this->Widget->delete(101);

    $this->Widget->updateAll(array('Widget.placement' => "'col0|0'"), 
                             array('Widget.placement' => 'col-0|0'));
    $this->Widget->updateAll(array('Widget.placement' => "'col0|1'"), 
                             array('Widget.placement' => 'col-0|1'));
    $this->Widget->updateAll(array('Widget.placement' => "'col0|2'"), 
                             array('Widget.placement' => 'col-0|2'));
    $this->Widget->updateAll(array('Widget.placement' => "'col0|3'"), 
                             array('Widget.placement' => 'col-0|3'));
    $this->Widget->updateAll(array('Widget.placement' => "'col0|4'"), 
                             array('Widget.placement' => 'col-0|4'));
    $this->Widget->updateAll(array('Widget.placement' => "'col1|0'"), 
                             array('Widget.placement' => 'col-1|0'));
    $this->Widget->updateAll(array('Widget.placement' => "'col1|1'"), 
                             array('Widget.placement' => 'col-1|1'));
    $this->Widget->updateAll(array('Widget.placement' => "'col2|0'"), 
                             array('Widget.placement' => 'col-2|0'));
    $this->Widget->updateAll(array('Widget.placement' => "'col2|1'"), 
                             array('Widget.placement' => 'col-2|1'));
    $this->Widget->updateAll(array('Widget.placement' => "'chcol1|0'"), 
                             array('Widget.placement' => 'ch-col-1|0'));

    $oldWidgets = $this->Widget->find('all', array('conditions' => array('Widget.options LIKE' => "%col-%")));
    
    foreach ($oldWidgets as $widget) {
      $widget["Widget"]["options"] = str_replace("col-", "col", $widget["Widget"]["options"]);
      $this->Widget->create();
      $this->Widget->save($widget);
    }

    $oldWidgets = $this->Widget->find('all', array('conditions' => array('Widget.name' => "Urg.ColumnLayout")));
    foreach ($oldWidgets as $widget) {
      $this->Widget->create();
      $options = $widget["Widget"]["options"];
      $new_options = array("header" => array("banner" => "span9", "side" => "span3"),
                           "titleRow" => array("title" => "span12"),
                           "content" => array("col0" => "span4", "col1" => "span4", "col2" => "span4"));
      $widget["Widget"]["name"] = "Urg.PageLayout";
      $widget["Widget"]["options"] = json_encode($new_options);
      $this->Widget->save($widget);
    }
    

    Cache::clear(false);
  }

  private function enhance_sermons() {
    $this->loadModel("Urg.Group");
    $this->Group->updateAll(array('Group.slug' => "'series'", 'Group.home' => 0), array('Group.id' => 80));
    $this->create_group("Sermons", "sermons", "mcac", true);
    $series_group = $this->Group->findById(80);
    $series_group["Group"]["parent_id"] = $this->Group->findBySlug("sermons")["Group"]["id"];
    $this->Group->save($series_group);
    $this->create_widget("Urg.ColumnLayout", 
                         "sermons", 
                         "/urg/groups/view", 
                         "layout", 
                         array("group_id" => "@group_id", "columns" => array("col-0" => "span12")));
    $this->create_widget("UrgSermon.SermonTiles", 
                         "sermons", 
                         "/urg/groups/view", 
                         "col-0|0", 
                         null);
  }

  private function cleanup() {
    $this->loadModel("Urg.Group");
    $this->loadModel("Urg.Post");
    $this->loadModel("Urg.Widget");
    
    $this->Widget->deleteAll(array("Widget.id >" => 710));
    $this->Post->deleteAll(array("Post.id >" => 1152));
    $this->Group->deleteAll(array("Group.id >" => 458));
  }

  private function create_home_group($name, $slug, $parent_slug) {
    $group_id = $this->create_group($name, $slug, $parent_slug, true);
    $news_group_id = $this->create_group("Newsletter", "$slug-news", $slug);
    $schedule_id = $this->create_group("Schedule", "$slug-schedule", $slug);
    $english_about_id = $this->create_post("mcac-about", "$name (English)", "$slug-about-en");
    $chinese_about_id = $this->create_post("mcac-about", "$name (Chinese)", "$slug-about-ch");

    // newsletter section
    $options = array("group_slug" => "$slug-news",
                     "title" => "Interested?",
                     "message" => "Sign up below to receive period updates!");
    $this->create_widget("UrgSubscription.Subscribe", $slug, "/urg/groups/view", "col-0|0", $options);
    $options = array("post_id" => "@post_id",
                     "reply_to" => array("email" => array("model" => "Profile", "field" => "email"),
                                         "name" => array("model" => "Profile", "field" => "name")));
    $this->create_widget("UrgSubscription.NotifySubscribers", 
                         "$slug-news", 
                         "/urg_post/posts/add", 
                         "backend", 
                         $options);

    // about section
    $options = array("eng" => array("post_id" => $english_about_id, "title" => false),
                     "zh_CN" => array("post_id" => $chinese_about_id, "title" => false));
    $this->create_widget("UrgPost.I18nPostContent", $slug, "/urg/groups/view", "col-0|1", $options);

    // recent activity section
    $options = array("group_slug" => $slug, "show_thumbs" => true);
    $this->create_widget("UrgPost.RecentActivity", $slug, "/urg/groups/view", "col-1|0", $options);

    $options = array("group_id" => "@group_id"); 
    $this->create_widget("UrgPost.UpcomingEvents", $slug, "/urg/groups/view", "col-2|0", $options);

    $options = array("group_id" => "@group_id", 
                     "columns" => array("col-0" => "span4", "col-1" => "span4", "col-2" => "span4"));
    $this->create_widget("Urg.ColumnLayout", $slug, "/urg/groups/view", "layout", $options);
  }

  private function create_widget($name, $group_slug, $action, $placement, $options) {
    $group = $this->fetch_group_by_slug($group_slug);

    $this->Widget->create();
    $data = array();
    $data["Widget"]["name"] = $name;
    $data["Widget"]["group_id"] = $group["Group"]["id"];
    $data["Widget"]["action"] = $action;
    $data["Widget"]["placement"] = $placement;
    if ($options != null)
      $data["Widget"]["options"] = str_replace("\"@group_id\"", 
                                               "\${group_id}",
                                               str_replace("\"@post_id\"", "\${post_id}", json_encode($options)));
    $this->Widget->save($data);
  }

  private function create_post($group_slug, $title, $slug, $content = null) {
    CakeLog::write(LOG_DEBUG,"creating post /$slug...");

    if ($content == null) {
      $content = "This is placeholder text for $title. Please update as soon as possible.";
    }

    $post_group = $this->fetch_group_by_slug($group_slug);

    $this->loadModel("Urg.SequenceId");
    $this->Post->create();
    $data = array();
    $data["Post"]["id"] = intval($this->SequenceId->next($this->Post->useTable));
    $data["Post"]["group_id"] = $post_group["Group"]["id"];
    $data["Post"]["title"] = $title;
    $data["Post"]["slug"] = $slug;
    $data["Post"]["content"] = $content;
    $logged_user = $this->Session->read("User");
    $data["Post"]["user_id"] = $logged_user["User"]["id"];
    $data["Post"]["publish_timestamp"] = mktime();

    $this->Post->save($data);
    CakeLog::write(LOG_DEBUG, "post saved: " . Debugger::exportVar($data, 3));
    return $this->Post->id;
  }

  private function fetch_group_by_slug($slug) {
    $group = null;
    if (isset($cache["Group"][$slug])) {
      $group = $cache["Group"][$slug];
    } else {
      $group = $this->Group->findBySlug($slug);
    }

    return $group;
  }

  private function create_group($name, $slug, $parent_slug, $home = false, $description = null) {
    $this->Group->create();
    $data["Group"]["name"] = $name;
    $data["Group"]["slug"] = $slug;
    $data["Group"]["home"] = $home;
    $parent_group = $this->fetch_group_by_slug($parent_slug);
    $data["Group"]["parent_id"] = $parent_group["Group"]["id"];
    $this->Group->save($data);
    return $this->Group->id;
  }
}
