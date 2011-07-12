<?php
App::import("Model", "Urg.Group");
class GroupSlugRoute extends CakeRoute {
    function parse($url) {
        $params = parent::parse($url);
        if (empty($params)) {
            return false;
        }
        $slugs = Cache::read('group_slugs');
        if (empty($slugs)) {
            $group = new Group();
            $groups = $group->find('all', array(
                'fields' => array('Group.slug'),
                'recursive' => -1
            ));
            $slugs = array_flip(Set::extract('/Group/slug', $groups));
            Cache::write('group_slugs', $slugs);
        }
        if (isset($slugs[$params['group_slug']])) {
            return $params;
        }
        return false;
    }
}
