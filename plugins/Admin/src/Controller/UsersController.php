<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Users Controller
 *
 *
 * @method \Admin\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function login() {
        if($this->request->is('post')) {
            $user = $this->Auth->identify();

            if($user) {
                $this->Auth->setUser($user);

                return $this->redirect(['controller' => 'Core', 'action' => 'indexCore']);
            }

            var_dump('Неправельний логін або пароль!!!');
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
