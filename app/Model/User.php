<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class User extends AppModel {

    public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'Role',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Isactive' => array(
            'className' => 'IsActive',
            'foreignKey' => 'IsActive',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Telconame' => array(
            'className' => 'TelcoName',
            'foreignKey' => 'TelcoName',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}

?>