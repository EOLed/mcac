<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('AppController', 'Controller');
/**
 * Profiles Controller
 *
 * @property Profile $Profile
 */
class ProfilesController extends AppController {
    public $helpers = array("Form", "Html", "Session", "TwitterBootstrap.TwitterBootstrap");


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->set('profile', $this->Profile->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		}
		$users = $this->Profile->User->find('list');
		$this->set(compact('users'));
	}

    public function migrate() {
        $users = $this->Profile->User->find("all");
        Configure::load("config");
        $default_locale = Configure::read("Language.default");
        foreach ($users as $user) {
            if ($this->Profile->findByUserId($user["User"]["id"]) !== false) {
                $this->Profile->create();
                $data["Profile"]["user_id"] = $user["User"]["id"];
                $data["Profile"]["locale"] = $default_locale;
                $this->Profile->save($data);
            }
        }

        $this->redirect(array("action" => "index"));
    }

    public function update_profile() {
        $logged_user = $this->Session->read("User");
        $username = $logged_user["User"]["username"];
		if ($this->request->is('post') || $this->request->is('put')) {
            $old_password = $this->request->data["User"]["old_password"];
            $new_password = $this->request->data["User"]["password"];
            $confirm_password = $this->request->data["User"]["confirm_password"];

            if ($old_password != "" || $new_password != "") {
                $errors = false;
                if (AuthComponent::password($old_password) != $logged_user["User"]["password"]) {
                    $this->Session->setFlash(__("Please enter your current password before " .
                                                "changing your password."));
                    $errors = true;
                }

                if ($errors) {
                    $this->set("locales", $this->__build_language_drop_down());
                    return;
                }
            }
        }
        $this->__edit($username, array("update_profile"));
    }
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($username) {
        $this->__edit($username);
	}

    public function __edit($username, $redirect = array("action" => "index")) {
        $profile = $this->Profile->find("first", array("conditions" => array("User.username" => $username)));
        $id = $profile["Profile"]["id"];
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            $password = $this->request->data["User"]["password"];
            $changed_password = strlen($password) > 0;
            $valid_password = $password == $this->request->data["User"]["confirm_password"];

            if (!$changed_password) {
                $this->Profile->unbindModel(array("belongsTo" => array("User")));
                $this->request->data["Profile"]["user_id"] = $this->request->data["User"]["id"];
                CakeLog::write(LOG_DEBUG, "updating user... no password change.");
            }

            CakeLog::write(LOG_DEBUG, "user's new profile: " . Debugger::exportVar($this->request->data, 5));
            if ((!$changed_password || $valid_password) && $this->Profile->saveAll($this->request->data)) {
                $logged_user = $this->Session->read("User");
                if ($logged_user["User"]["id"] == $this->request->data["User"]["id"]) {
                    $this->Session->write("User", $this->Profile->User->findById($logged_user["User"]["id"]));
                    CakeLog::write(LOG_DEBUG, "new user in session: " . Debugger::exportVar($this->Session->read("User"),5));
                }
				$this->Session->setFlash(__('The profile has been saved'));
				$this->redirect($redirect);
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Profile->findById($id);
		}
		$users = $this->Profile->User->find('list');

        $this->set("locales", $this->__build_language_drop_down());
		$this->set(compact('users'));
    }

    private function __build_language_drop_down() {
        Configure::load("config");
        $languages = Configure::read("Language.all");
        $language_options = array();
        foreach ($languages as $language) {
            $language_options[$language] = __($language);
        }

        return $language_options;
    }

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->Profile->delete()) {
			$this->Session->setFlash(__('Profile deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Profile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
