<?php

//ini_set('max_execution_time', 300);
//ini_set('memory_limit', '-1');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

class MoviesNewController extends AppController {

    public $components = array('Paginator', 'Session');
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'MoviesNew.id' => 'asc'
        )
    );
    var $uses = array('MoviesNew');

    public function displaymoviesnew() {
        $this->Paginator->settings = $this->paginate;
// query database and sort results
        //$data = $this->Movie->find('all', array('limit' => 100));
        $data = $this->Paginator->paginate('MoviesNew');
        // Search Action// 
        $this->set('movies', $data);

// get a count from the database
        $count = $this->MoviesNew->find('count');
        $this->set('count', $count);
    }
    

}

?>
