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
    $this->enhance_sermons();
/*    $this->create_group("Sunday School", "sundayschool", "mcac-ministries", true);
    $this->create_group("Chinese Sunday School", "chinesesundayschool", "sundayschool", true);
    $this->create_group("English Sunday School", "englishsundayschool", "sundayschool", true);
    $this->create_home_group("Youth I", "youth1", "englishsundayschool");
    $this->create_home_group("Youth II", "youth2", "englishsundayschool");
    $this->create_home_group("Children's Sunday School", "childrensundayschool", "englishsundayschool");
    $this->create_home_group("Adult", "adultsundayschool", "englishsundayschool");
    $this->create_group("Prayer Meeting", "prayermeeting", "mcac-ministries", true);
    $this->create_home_group("Prayer Meeting English", "prayermeeting-en", "prayermeeting");
    $this->create_home_group("Prayer Meeting Chinese", "prayermeeting-ch", "prayermeeting");
    $this->create_group("English Fellowships", "fellowships-en", "fellowships", true); 
    $this->create_group("Chinese Fellowships", "fellowships-ch", "fellowships", true); 
    $this->create_home_group("Caring", "caring", "mcac-ministries"); 
    $this->create_home_group("Mission", "mission", "mcac-ministries"); 
    $this->create_home_group("Duty", "duty", "mcac-ministries"); 
    $this->create_group("Menu", "mcac-menu", "mcac");*/
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
    
    $this->Widget->deleteAll(array("Widget.group_id >=" => 455));
    $this->Post->deleteAll(array("Post.group_id >=" => 455));
    $this->Group->deleteAll(array("Group.id >=" => 455));
  }

  private function setupPrayerMeetingGroup() {
    $slug = "prayermeeting";
    // newsletter section
    $options = array("eng" => array("group_slug" => "$slug-en-news",
                                    "title" => "Interested?",
                                    "message" => "Sign up below to receive period updates!"),
                     "zh_CN" => array("group_slug" => "$slug-ch-news",
                                    "title" => "Interested?",
                                    "message" => "(Chinese) Sign up below to receive period updates!"));
    $this->create_widget("UrgSubscription.I18nSubscribe", $slug, "/urg/groups/view", "col-0|0", $options);
    $options = array("post_id" => "@post_id",
                     "reply_to" => array("email" => array("model" => "Profile", "field" => "email"),
                                         "name" => array("model" => "Profile", "field" => "name")));
    $this->create_widget("UrgSubscription.NotifySubscribers", 
                         "$slug-en-news", 
                         "/urg_post/posts/add", 
                         "backend", 
                         $options);
    $this->create_widget("UrgSubscription.NotifySubscribers", 
                         "$slug-ch-news", 
                         "/urg_post/posts/add", 
                         "backend", 
                         $options);

    // about section
    $english_about_id = $this->create_post("mcac-about", "Prayer Meeting (English)", "$slug-about-en");
    $chinese_about_id = $this->create_post("mcac-about", "Prayer Meeting (Chinese)", "$slug-about-ch");
    $options = array("eng" => array("post_id" => $english_about_id, "title" => false),
                     "zh_CN" => array("post_id" => $chinese_about_id, "title" => false));
    $this->create_widget("UrgPost.I18nPostContent", $slug, "/urg/groups/view", "col-0|1", $options);

    // recent activity section
    $options = array("eng" => array("group_slug" => "$slug-en", "show_thumbs" => true),
                     "zh_CN" => array("group_slug" => "$slug-ch", "show_thumbs" => true));
    $this->create_widget("UrgPost.I18nRecentActivity", $slug, "/urg/groups/view", "col-1|0", $options);

    $options = array("eng" => array("group_slug" => "$slug-en"), "zh_CN" => array("group_slug" => "$slug-ch")); 
    $this->create_widget("UrgPost.I18nUpcomingEvents", $slug, "/urg/groups/view", "col-2|0", $options);

    $options = array("group_id" => "@group_id", 
                     "columns" => array("col-0" => "span4", "col-1" => "span4", "col-2" => "span4"));
    $this->create_widget("Urg.ColumnLayout", $slug, "/urg/groups/view", "layout", $options);
  }

  private function setupSundaySchoolGroup($parent_slug, $slug, $col) {
    $sundayschool = $this->fetch_group_by_slug($parent_slug);
    $ss_slug = $sundayschool["Group"]["slug"];
    $group = $this->fetch_group_by_slug($slug);
    $about_id = $this->create_post("mcac-about", $group["Group"]["name"], "$slug-about");
    $options = array("post_id" => $about_id, "title" => false);
    $this->create_widget("UrgPost.PostContent", $ss_slug, "/urg/groups/view", "col-$col|0", $options);

    $options = array("group_slug" => $slug, "show_thumbs" => true);
    $this->create_widget("UrgPost.RecentActivity", $ss_slug, "/urg/groups/view", "col-$col|1", $options);
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
