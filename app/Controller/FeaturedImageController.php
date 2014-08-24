<?php

//ini_set('max_execution_time', 300);
//ini_set('memory_limit', '-1');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');


class FeaturedImageController extends AppController {

    public $components = array('Paginator', 'Session');
    public $paginate = array(
        'limit' => 10
    );
    var $uses = array('FeaturedImage');

    public function index() {

        $this->set('FeaturedImage', $this->FeaturedImage->find('all'));
    }

}
