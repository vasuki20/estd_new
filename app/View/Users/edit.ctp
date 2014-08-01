<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<div id="logoutBtn" style="float: right;">
    <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
</div>

<?php
echo $this->Form->create('User');
 if ($Role['Role'] != 'Admin') {
   echo $this->Form->input('Role', array("options" => $Role, 'type'=>'hidden', 'disabled' => 'disabled'));  
 }
echo $this->Form->input('FirstName');
echo $this->Form->input('LastName');
echo $this->Form->input('username');
echo $this->Form->input('emailId');
echo $this->Form->input('password');
echo $this->Form->input('contactno');
echo $this->Form->input('Telconame', array("options" => $Telconame));
echo $this->Form->input('IsActive', array("options" => $Isactive));
echo $this->Form->end('Save Post');
?>
