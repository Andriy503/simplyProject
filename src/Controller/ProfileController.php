<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Profile Controller
 *
 *
 * @method \App\Model\Entity\Profile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfileController extends AppController
{
    public function index() {
        $user = $this->Auth->user();
        
        $this->set(compact('user'));
    }
}
