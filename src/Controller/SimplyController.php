<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Simply Controller
 *
 *
 * @method \App\Model\Entity\Simply[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SimplyController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow(['registration']);

        $this->loadModel('Users');
    }

    public function index() {
        $user = $this->Auth->user();

        $this->set(compact('user'));
    }

    public function login() {
        $this->autoRender = false;
        $this->render('index');

        if($this->request->is('post')) {
            $user = $this->Users->find()
                ->where([
                    'email' => $this->request->getData('email')
                ])
                ->first();

            if(
                !$user ||
                !((new DefaultPasswordHasher())
                    ->check($this->request->getData('password', false), $user->password))
            ) {
                $message = 'Incorrect email or password!';
                
                var_dump($message);

                return;
            }

            if($user->is_deleted) {
                $message = 'This user can not be authorized!';

                var_dump($message);

                return;
            }

            if($user->is_banned) {
                $message = 'This user banned by administrator!';

                var_dump($message);

                return;
            }

            $indentifyUser = $this->Auth->identify();

            if($indentifyUser) {
                $this->Auth->setUser($indentifyUser);

                return $this->redirect(['controller' => 'simply']);
            }

            return false;
        }
    }

    public function logout() {
        $this->Flash->success('Logout success');
        return $this->redirect($this->Auth->logout());
    }

    public function registration() {
        $this->autoRender = false;

        $user = $this->request->getData();
        $userData = [];

        if($user['password_sign_up'] !== $user['confirm_password_sign_up']) {
            var_dump('Паролі не співпадають!');

            return;
        }

        if(!filter_var($user['email_sign_up'], FILTER_VALIDATE_EMAIL)) {
            var_dump('Ви ввели не коректний email!');

            return;
        }

        $userData['full_name'] = $user['full_name_sign_up'];
        $userData['email'] = $user['email_sign_up'];
        $userData['password'] = $user['password_sign_up'];

        $new_user = $this->Users->newEntity($userData);

        if(!$this->Users->save($new_user)) {
            echo "<pre>";
            var_dump($new_user->getErrors());

            return;
        }

        $this->Auth->setUser($new_user);


        return $this->redirect('/');
    }

    function test() {
        $this->Flash->success('This was successful');
    }
}
