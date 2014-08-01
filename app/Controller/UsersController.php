<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersController extends AppController {

    public $helpers = array('Html', 'Form');

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->set('authUser', $this->Auth->user());
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $Role = AuthComponent::user('Role');
        $this->log($Role['Role'], 'debug');

        $this->set('Role', $Role);

        $queryString = 'select u.id, r.Role, u.FirstName, u.LastName,u.username, u.emailId, u.password, u.contactno, t.Telconame, i.IsActive, u.created, u.modified
from users u, Roles r, IsActives i, telconames t 
where u.role=r.id and u.isactive=i.id and u.telconame=t.id and ("' . $Role['Role'] . '"="Admin" or u.id=' . AuthComponent::user('id') . ') ORDER BY created DESC';
        $this->log($queryString, 'debug');
        $this->set('Users', $this->User->query($queryString));
        if ($this->request->is('post')) {
            $this->log($this->request->data['User']['SearchParam'], 'debug');
            if ($this->request->data) {
                $searchParam = $this->request->data['User']['SearchParam'];
                $searchQuery = "select u.id, r.Role, u.FirstName, u.LastName,u.username, u.emailId, u.password, u.contactno, t.Telconame, i.IsActive, u.created, u.modified
from users u, Roles r, IsActives i, telconames t 
where u.role=r.id and u.isactive=i.id and u.telconame=t.id and (u.id like '%$searchParam%' or u.FirstName like '%$searchParam%' or u.lastname like '%$searchParam%' or u.emailid like '%$searchParam%'"
                        . " or t.telconame like '%$searchParam%' or r.role like '%$searchParam%' or i.isActive like '%$searchParam%')" . 'and ("' . $Role['Role'] . '"="Admin" or u.id=' . AuthComponent::user('id') . ') ORDER BY created DESC';
                $this->log($searchQuery, 'debug');
                $this->set('Users', $this->User->query($searchQuery));
            } else {
                $this->Session->setFlash(__('Invalid Request'));
            }
        }
    }

    public function add() {
        $this->set('Telconame', $this->User->Telconame->find('list', array('fields' => array('Telconame'))));
        $this->set('Role', $this->User->Role->find('list', array('fields' => array('Role'))));
        $this->set('Isactive', $this->User->Isactive->find('list', array('fields' => array('Isactive'))));
        if ($this->request->is('post')) {
            $this->User->create();
            $this->log($this->request->data, 'debug');
            if ($this->User->save($this->request->data)) {
                echo '$this->request->data';
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
//        $adminRoles = $this->Role->find('all');
//        $isactives = $this->Isactive->find('all');
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $User = $this->User->findById($id);
        if (!$User) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('User', $User);
    }

    public function edit($id = null) {
        $Role = AuthComponent::user('Role');
        $this->log($Role['Role'], 'debug');

        $this->set('CurrentRole', $Role);
        $this->set('Telconame', $this->User->Telconame->find('list', array('fields' => array('Telconame'))));
        $this->set('Role', $this->User->Role->find('list', array('fields' => array('Role'))));
        $this->set('Isactive', $this->User->Isactive->find('list', array('fields' => array('Isactive'))));
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete($id) {
        print_r('Inside delete');
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }


        if ($this->User->delete($id)) {
            $this->Session->setFlash(
                    __('The post with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }

}

?>
