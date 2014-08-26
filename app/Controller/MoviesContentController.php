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
    var $uses = array('MoviesContent', 'MoviesFree', 'MoviesNew', 'MoviesHot', 'FeaturedImage');
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

    public function select($id = NULL, $fromtablename = NULL) {
        $error=0;
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
                'movie_id' => $this->request->data['MoviesContent']['id']
            );
            if ($this->request->data['MoviesContent']['target'] == "movies_free") {
                $this->MoviesFree->create();
                $this->MoviesFree->save($movieData);
                $redirectController = 'MoviesFree';
                $redirectAction = 'displaymoviesfree';
                $redirectMsg = 'Movie added succefully to MovieFree table';
            } else if ($this->request->data['MoviesContent']['target'] == "movies_hot") {
                $this->MoviesHot->create();
                $this->MoviesHot->save($movieData);
                $redirectController = 'MoviesHot';
                $redirectAction = 'displaymovieshot';
                $redirectMsg = 'Movie added succefully to MovieHot table';
            } else if ($this->request->data['MoviesContent']['target'] == "movies_new") {
                $this->MoviesNew->create();
                $this->MoviesNew->save($movieData);
                $redirectController = 'MoviesNew';
                $redirectAction = 'displaymoviesnew';
                $redirectMsg = 'Movie added succefully to MovieNew table';
            } else if ($this->request->data['MoviesContent']['target'] == "featured_image") {
                
                /*
                 *Uploading image to the server 
                 */
                
                if ($this->data['MoviesContent']['image']) {
                    $image = $this->data['MoviesContent']['image'];
                    //allowed image types
                    $imageTypes = array("image/gif", "image/jpeg", "image/png", "image/pjpeg", "image/x-png");
                    //upload folder - make sure to create one in webroot
                    $uploadFolder = "uploadimage";
                    //full path to upload folder
                    $uploadPath = "/Users/Karthik/Desktop/" . $uploadFolder;


                    //check if image type fits one of allowed types
                    foreach ($imageTypes as $type) {
                        if ($type == $image['type']) {
                            //check if there wasn't errors uploading file on serwer
                            if ($image['error'] == 0) {
                                //image file name
                                $imageName = $image['name'];
                                //check if file exists in upload folder
                                if (file_exists($uploadPath . '/' . $imageName)) {
                                    //create full filename with timestamp
                                    $imageName = date('His') . $imageName;
                                }
                                //create full path with image name
                                $full_image_path = $uploadPath . '/' . $imageName;
                                $this->log($full_image_path, 'debug');
                                $this->log($imageName, 'debug');
                                //upload image to upload folder
                                if (move_uploaded_file($image['tmp_name'], $full_image_path)) {
                                    $this->Session->setFlash('File saved successfully');
                                    $this->set('imageName', $imageName);
                                } else {
                                    $redirectMsg='There was a problem uploading file. Please try again.';
                                    $error=1;
                                }
                            } else {
                                $redirectMsg='Error uploading file.';
                                $error=1;
                            }
                            break;
                        } else {
                            $redirectMsg='Unacceptable file type';
                            $error=1;
                        }
                    }
                }
                else
                {
                    $redirectMsg='Please select a file';
                    $error=1;
                }

                /*
                 * End of image upload
                 */
                
                if($error!=1)
                {
                    $movieData = array(
                        'movie_id' => $this->request->data['MoviesContent']['id'],
                        'img_url' => $this->request->data['MoviesContent']['image']
                    );
                    $this->FeaturedImage->create();
                    $this->FeaturedImage->save($movieData);
                    $redirectMsg = 'Movie added succefully to FeaturedImage table';
                    $this->Session->setFlash(__($redirectMsg));
                    return;
                }
                $redirectController = 'FeaturedImage';
                $redirectAction = 'displayfeaturedimage';
                
                
            }
            $this->Session->setFlash(__($redirectMsg));
            return $this->redirect(array('controller' => $redirectController, 'action' => $redirectAction));
        }

        // set the variable to display the query results
        $this->set('movie', $data);
        $this->set('fromtablename', $fromtablename);
    }

}

?>
