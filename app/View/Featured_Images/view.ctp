<div id='cssmenu'>
    <ul>
        <li> <?php echo $this->Html->link(__('Home'), array('action' => 'index')); ?></li>
        <li class="logoutMenu"> <?php echo $this->Html->link('Logout', array('controller' => 'featured_images', 'action' => 'logout')); ?></li>
    </ul>
</div>
<?php 
echo '<div>';


echo '<table id="user_table" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<th>Column</th>
							<th>Values</th>
						</tr>';

//echo $this->Form->input('FirstName');
echo "<tr><td class=\"columnName\">ID:</td><td class=\"userDetailsValues\">".$Featured_Image['Featured_Image']['id']."</td></tr>";
echo "<tr><td class=\"columnName\">Image_URL:</td><td class=\"userDetailsValues\">".$Featured_Image['Featured_Image']['img_url']."</td></tr>";
echo "<tr><td class=\"columnName\">Movie_ID:</td><td class=\"userDetailsValues\">".$Featured_Image['Featured_Image']['movie_id']."</td></tr>";