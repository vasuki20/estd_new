<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
App::uses('AppModel', 'Model');
 
/**
 * CakePHP Item
 * @author Teikpiew
 */
class MoviesFree extends AppModel {
 
    var $useDbConfig = 'contents';
    var $useTable = 'movies_free';
    var $primaryKey = 'id';
 
}


