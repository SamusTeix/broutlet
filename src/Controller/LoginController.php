<?php

namespace App\Controller;

use App\Controller\AppController;

class LoginController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid email or password, try again'));
        }
    }

    public function logout()
    {
        $this->Flash->success(__('You have been logged out.'));
        return $this->redirect($this->Auth->logout());
    }
}
