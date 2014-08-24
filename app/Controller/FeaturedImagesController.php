<?php
class FeaturedImages extends AppController {
    
    var $name = 'Featured_Images';

    var $uses = array("Featured_Image");
    public $helpers = array('Html', 'Form');
    
    public function index() {
         $this->FeaturedImage->useDbConfig = 'contents';
        $this->set('featuredimages', $this->FeaturedImage->find('all'));
        
        $this->log($this->FeaturedImage, 'debug');
        
       // echo "$featured_image";
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $featuredimage = $this->FeaturedImage->findById($id);
        if (!$featuredimage) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('featuredimage', $featuredimage);
    }
}

?>