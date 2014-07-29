// app/Controller/VendeesController.php

<?php

class VendeesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->Vendee->recursive = 0;
        $this->set('vendees', $this->paginate());
    }

    public function view($id = null) {
        $this->Vendee->id = $id;
        if (!$this->Vendee->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('vendee', $this->Vendee->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Vendee->create();
            if ($this->Vendee->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->Vendee->id = $id;
        if (!$this->Vendee->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Vendee->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Vendee->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Vendee->id = $id;
        if (!$this->Vendee->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Vendee->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
?>
