<div id='cssmenu'>
    <ul>
        <li> <?php echo $this->Html->link(__('Home'), array('controller' => 'users','action' => 'index')); ?></li>
        <li class="logoutMenu"> <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
    </ul>
</div>
<?php 
if ($fromtablename != "featured_image" ){
echo '<div>';
echo $this->Form->create('MoviesContent');
echo $this->Form->input('id',array('value' => $movie['MoviesContent']['id'], 'readonly' => 'readonly', 'type' => 'text'));
echo $this->Form->input('title',array('value' => $movie['MoviesContent']['title'], 'readonly' => 'readonly'));
echo $this->Form->hidden('target',array('value' => $fromtablename, 'display' => 'none'));
echo $this->Form->end('Save');
}
else {
 echo '<div>';
echo $this->Form->create('MoviesContent');
echo $this->Form->input('Upload Image',array('action' =>'/files/add','enctype'=>'multipart/form-data','method'=>'post'));
echo $this->Form->input('id',array('value' => $movie['MoviesContent']['id'], 'readonly' => 'readonly', 'type' => 'text'));
echo $this->Form->input('title',array('value' => $movie['MoviesContent']['title'], 'readonly' => 'readonly'));
echo $this->Form->hidden('target',array('value' => $fromtablename, 'display' => 'none'));
echo $this->Form->end('Save');
}
?>
<?php
if ($fromtablename == "movies_free") {
    $tableName = "Movies Free";
} else if ($fromtablename == "movies_hot") {
    $tableName = "Movies Hot";
} else if ($fromtablename == "movies_new") {
    $tableName = "Movies New";
} else if ($fromtablename == "featured_image") {  
    $tableName = "Featured Image";
}
?>
<div style="margin-top: 8%;margin-left: 33%;color: rgb(175, 10, 10);">
    Clicking submit will save the movie in  <?php echo $tableName; ?>
</div>