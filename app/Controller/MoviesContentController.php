<?php

//ini_set('max_execution_time', 300);
//ini_set('memory_limit', '-1');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

class MoviesContentController extends AppController {

    public $components = array('Paginator', 'Session');
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'MoviesContent.Title' => 'asc'
        )
    );
    var $uses = array('MoviesContent','MoviesFree','MoviesNew','MoviesHot','FeaturedImage');

    public function displaymovies($fromtablename) {
        $this->Paginator->settings = $this->paginate;
// query database and sort results
        //$data = $this->Movie->find('all', array('limit' => 100));
        $data = $this->Paginator->paginate('MoviesContent');
        // Search Action// 
        if ($this->request->is('post')) {
            if ($this->request->data) {
                $this->log($this->request->data['MoviesContent']['SearchParam'], 'debug');
                $searchParam = $this->request->data['MoviesContent']['SearchParam'];
                $this->Paginator->settings = array(
                'conditions' => array('MoviesContent.title LIKE' => '%' . $searchParam . '%'),
                'limit' => 10);
                $data = $this->Paginator->paginate('MoviesContent');
            } else {
                $this->Session->setFlash(__('Invalid Request'));
            }
        }

        $this->set('movies', $data);

// get a count from the database
        $count = $this->MoviesContent->find('count');
        $this->set('count', $count);
        $this->set('fromtablename', $fromtablename);
    }
    
    public function select($id = NULL, $fromtablename=NULL) {
        if (!$id) {
            throw new NotFoundException(__("ID was not set."));
        }

        // search the database based on the id (primary key) of the item 
        $data = $this->MoviesContent->findById($id);

        if (!$data) {
            throw new NotFoundException(__("ID was not in the Database."));
        }
        if ($this->request->is('post')) {
            $redirectController;
            $redirectAction;
            $redirectMsg;
            $movieData;
            $this->log($this->request->data, 'debug');
            $movieData = array(
                'movie_id' => $this->request->data['MoviesContent']['id'],
            );
            if ($this->request->data['MoviesContent']['target'] == "movies_free") {
                $this->MoviesFree->create();
                $this->MoviesFree->save($movieData);
                $redirectController='MoviesFree';
                $redirectAction='displaymoviesfree';
                $redirectMsg='Movie added succefully to MovieFree table';
            } else if ($this->request->data['MoviesContent']['target'] == "movies_hot") {
                $this->MoviesHot->create();
                $this->MoviesHot->save($movieData);
                $redirectController='MoviesHot';
                $redirectAction='displaymovieshot';
                $redirectMsg='Movie added succefully to MovieHot table';
            } else if ($this->request->data['MoviesContent']['target'] == "movies_new") {
                $this->MoviesNew->create();
                $this->MoviesNew->save($movieData);
                $redirectController='MoviesNew';
                $redirectAction='displaymoviesnew';
                $redirectMsg='Movie added succefully to MovieNew table';
            }
            else if ($this->request->data['MoviesContent']['target'] == "featured_image") {
                $this->FeaturedImage->create();
                $this->FeaturedImage->save($movieData);
                $redirectController='FeaturedImage';
                $redirectAction='displayfeaturedimage';
                $redirectMsg='Movie added succefully to FeaturedImage table';
            }
            $this->Session->setFlash(__($redirectMsg));
            return $this->redirect(array('controller' => $redirectController,'action' => $redirectAction));
        }

        // set the variable to display the query results
        $this->set('movie', $data);
        $this->set('fromtablename', $fromtablename);
    }
    
    public function submit($id = NULL, $fromtablename=NULL) {
        if (!$id) {
            throw new NotFoundException(__("ID was not set."));
        }

        // search the database based on the id (primary key) of the item 
        $data = $this->MoviesContent->findById($id);
        if (!$data) {
            throw new NotFoundException(__("ID was not in the Database."));
        }
        if ($this->request->is('post')) {
            $this->log($this->request->data, 'debug');
            $movieData = array(
                'name' => '$name',
                'city' => '$city'
            );
//            $this->MoviesNew->create();
//            if ($this->MoviesNew->save($this->request->data)) {
//                echo '$this->request->data';
//                $this->Session->setFlash(__('Your User has been saved.'));
//                return $this->redirect(array('MoviesNew' => 'displaymoviesnew'));
//            }
//            $this->Session->setFlash(__('Unable to add your User.'));
        }

        // set the variable to display the query results
        $this->set('movie', $data);
        $this->set('fromtablename', $fromtablename);
    }
    
        public function add() {
        $message = "Notification: New report submitted!";
        $this->set('Telconame', $this->User->Telconame->find('list', array('fields' => array('Telconame'))));
        $this->set('Role', $this->User->Role->find('list', array('fields' => array('Role'))));
        $this->set('Isactive', $this->User->Isactive->find('list', array('fields' => array('Isactive'))));
        if ($this->request->is('post')) {
            $this->User->create();
            $this->log($this->request->data, 'debug');
            if ($this->User->save($this->request->data)) {
                echo '$this->request->data';
                $this->Session->setFlash(__('Your User has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your User.'));
        }
//        $adminRoles = $this->Role->find('all');
//        $isactives = $this->Isactive->find('all');
    }

}

?>
