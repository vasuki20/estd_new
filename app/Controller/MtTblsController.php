<?php
class MtTblsController  extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {

		$this->set('MtTbls', $this->MtTbl->find('all', array(
    'limit' => 3,
	'recursive' => 1,
    'order' => 'MtTbl.created DESC',
)));
    }

	public function add() {
        if ($this->request->is('post')) {
            $this->MtTbl->create();
			$this->log($this->request->data, 'debug');
            if ($this->MtTbl->save($this->request->data)) {
                $this->Session->setFlash(__('Your MtTbl has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your MtTbl.'));
        }
    }
	
	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->MtTbl->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->MtTbl->id = $id;
        if ($this->MtTbl->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}
}
?>