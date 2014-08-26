<?php
class FeaturedImageController extends AppController {

    public $components = array('Paginator', 'Session');
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'FeaturedImage.id' => 'asc'
        )
    );
    var $uses = array('FeaturedImage');

    public function displayfeaturedimage() {
        $this->Paginator->settings = $this->paginate;
// query database and sort results
        //$data = $this->Movie->find('all', array('limit' => 100));
        $data = $this->Paginator->paginate('FeaturedImage');
        // Search Action// 
        $this->set('movies', $data);

// get a count from the database
        $count = $this->FeaturedImage->find('count');
        $this->set('count', $count);
    }
    

}

?>