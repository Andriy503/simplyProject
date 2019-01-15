<?php

namespace Admin\Controller;

use Cake\Event\Event;
use Cake\Controller\Controller;

// use App\Controller\AppController as BaseController;
// class AppController extends BaseController

class AppController extends Controller
{
    protected $_authConfig = [
       // 'authorize' => ['Controller'],
       'authenticate' => [
            'Form' => [
                'fields' => [
                    'username' => 'email',
                    'password' => 'password'
                ],
                'userModel' => 'Admin.AdminUsers'
            ]
        ],
        'loginAction' => [
        	'plugin' => 'Admin',
            'controller' => 'Users',
            'action' => 'login'
        ],
        'storage' => [
            'className' => 'Session',
            'key' => 'Auth.AdminUser'
        ],
        'unauthorizedRedirect' => false
    ];

	public function initialize() {
		parent::initialize();

        $this->loadComponent('Flash');
		$this->loadComponent('Auth', $this->_authConfig);
	}
}
