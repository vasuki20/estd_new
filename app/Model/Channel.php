
<?php
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
App::uses('AppModel', 'Model');
 
/**
 * CakePHP channel
 * @author Teikpiew
 */
class Channel extends AppModel {
    
   var $name = 'Channel' ;
   var $useDbConfig = 'yoonic';
//   public $hasMany = array( 'Movie' => array( 'className' => 'Movie', 'foreignKey' => 'channel_id') );
    
}