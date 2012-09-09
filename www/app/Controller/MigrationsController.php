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
    $this->create_group("Sunday School", "sundayschool", "mcac-ministries", true);
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
    $this->create_group("Menu", "mcac-menu", "mcac");

    $options = array("group_id" => "@group_id", 
                     "columns" => array("col-0" => "span5", "col-1" => "span5 offset1"));
    $this->create_widget("Urg.ColumnLayout", "sundayschool", "/urg/groups/view", "layout", $options);
    $this->setupSundaySchoolGroup("sundayschool", "chinesesundayschool", 0);
    $this->setupSundaySchoolGroup("sundayschool", "englishsundayschool", 1);

    $this->setupPrayerMeetingGroup();

    $options = array("group_id" => "@group_id", 
                     "columns" => array("col-0" => "span5", "col-1" => "span5 offset1"));
    $this->create_widget("Urg.ColumnLayout", "fellowships", "/urg/groups/view", "layout", $options);
    $this->setupSundaySchoolGroup("fellowships", "fellowships-ch", 0);
    $this->setupSundaySchoolGroup("fellowships", "fellowships-en", 1);

    $this->setupMenu();
  }

  private function setupMenu() {
    $options = array("post_id" => "@post_id");
    $this->create_widget("UrgPost.PostTitle", "mcac-menu", "/urg_post/posts/view", "title", $options);
    $options = array("group_id" => "@group_id", "columns" => array("col-0" => "span12"));
    $this->create_widget("Urg.ColumnLayout", "mcac-menu", "/urg_post/posts/view", "layout", $options);

    $content = "信仰
簡介
教牧同工
牧者的話
教會架構";
    echo $this->create_post("mcac-menu", "關於我們", "關於我們", $content);
    $content = "[主日學](/sundayschool)
[祈禱會](/prayermeeting)
[團契](/fellowships)
[關懷事工](/caring)
[外展宣教](/missions)";
    echo $this->create_post("mcac-menu", "教會事工", "教會事工", $content);
    echo $this->create_post("mcac-menu", "教會消息", "教會消息", "[特別聚會](/)
[講道重溫](/sermons)
[事工分配](/duty)
行事曆
[分類表格](/forms)"); 
    echo $this->create_post("mcac-menu", "聯絡我們", "聯絡我們", "[地圖](http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Montreal+Chinese+Alliance+Church,+13,+Rue+Finchley,+Hampstead,+QC+H3X+2Z4,+Canada&aq=0&sll=37.0625,-95.677068&sspn=33.847644,79.013672&ie=UTF8&hq=Montreal+Chinese+Alliance+Church,&hnear=13+Rue+Finchley,+Hampstead,+Communaut%C3%A9-Urbaine-de-Montr%C3%A9al,+Qu%C3%A9bec+H3X+2Z6,+Canada&ll=45.480069,-73.633461&spn=0.006936,0.01929&z=16&iwloc=A)

地址電話:
13 Finchley
Hampstead, Quebec
H3X 2Z4
514-482-2703

電郵: [contact@mtlcac.org](mailto:contact@mtlcac.org)");
  }

  private function cleanup() {
    $this->loadModel("Urg.Group");
    $this->loadModel("Urg.Post");
    $this->loadModel("Urg.Widget");
    
    $this->Widget->deleteAll(array("Widget.group_id >=" => 144));
    $this->Post->deleteAll(array("Post.group_id >=" => 144));
    $this->Group->deleteAll(array("Group.id >=" => 144));

    $fellowship_group = $this->fetch_group_by_slug("fellowships");
    $layout_widget = $this->Widget->find("first", 
                                         array("conditions" => array("group_id" => $fellowship_group["Group"]["id"], 
                                                                     "placement" => "layout")));
    $this->Widget->deleteAll(array("group_id" => $fellowship_group["Group"]["id"]));

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
