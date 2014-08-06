<!-- File: /app/View/Posts/add.ctp -->

<div id='cssmenu'>
    <ul>
        <li> <?php echo $this->Html->link(__('Home'), array('action' => 'index')); ?></li>
        <li class = active > <?php echo $this->Html->link(__('Edit User'), array('action' => 'edit')); ?></li>
    </ul>
</div>

<div id="logoutBtn" style="float: right;">
    <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
</div>

<?php
echo $this->Form->create('User');

if ($CurrentRole['Role'] != 'Admin') {
    echo $this->Form->input('Role', array('options' => $Role, 'disabled' => true));
} else {
    echo $this->Form->input('Role', array("options" => $Role));
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

