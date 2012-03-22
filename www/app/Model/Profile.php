<?php
App::uses("Model", "UserManagement.User", false);

class Profile extends AppModel {
	var $name = "Profile";
	var $belongsTo = "User";

	function normalize($string) {
		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
		$b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
		$string = utf8_decode($string);
		$string = strtr($string, utf8_decode($a), $b);
		$string = strtolower($string);
		return utf8_encode($string);
	}

	function beforeSave() {
		$this->data["Profile"]["search_name"] = $this->normalize($this->data["Profile"]["name"]);
		return true;
	}
}
