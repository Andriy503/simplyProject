<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Core Controller
 *
 *
 * @method \Admin\Model\Entity\Core[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoreController extends AppController
{
    public function initialize() {
        parent::initialize();

        $this->loadModel('Users');
        $this->loadModel('Admin.AdminUsers');
    }

    public function indexCore() {
        $users = $this->Users->find() ->all();
        $admin = $this->Auth->user();

        $this->set(compact([
            'users',
            'admin'
        ]));
    }

    public function deleteUser($id) {
        $this->autoRender = false;
        $this->_actionUser($id, 'is_deleted', true);

        return $this->redirect('/admin');
    }

    public function restoreUser($id) {
        $this->autoRender = false;
        $this->_actionUser($id, 'is_deleted', false);

        return $this->redirect('/admin');
    }

    public function bannedUser($id) {
        $this->autoRender = false;
        $this->_actionUser($id, 'is_banned', true);

        return $this->redirect('/admin');        
    }

    public function unBannedUser($id) {
        $this->autoRender = false;
        $this->_actionUser($id, 'is_banned', false);

        return $this->redirect('/admin');
    }

    public function _actionUser($id, $field, $value) {
        if(!isset($id) || !is_numeric($id)) {
            return false;
        }

        $user = $this->Users->get($id);
        $user[$field] = $value;

        if($this->Users->save($user)) {
            return true;
        }

        return false;
    }

    public function edit($id) {
        $user = $this->Users->get($id);

        $this->set(compact('user'));
    }

    public function editProfile() {
        $params = $this->request->getData();
        $user = $this->Users->get($params['id']);

        unset($params['id']);

        if(!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) {
            var_dump('Ви ввели не коректний email!');

            return;
        }

        if(empty($params['password'])) {
            unset($params['password']);
        }

        $editUser = $this->Users->patchEntity($user, $params);

        if(count($editUser->getErrors())) {
            var_dump($editUser->getErrors());

            return;
        }

        if($this->Users->save($editUser)) {
            return $this->redirect('/admin');
        }
    }
}
