<div class="customers form">
<h1>Customers</h1>
<table>
    <thead>
		<tr>
			<th><?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
			<th><?php echo $this->Paginator->sort('username', 'Username');?>  </th>
			<th><?php echo $this->Paginator->sort('email', 'E-Mail');?></th>
			<th><?php echo $this->Paginator->sort('created', 'Created');?></th>
			<th><?php echo $this->Paginator->sort('modified','Last Update');?></th>
			<th><?php echo $this->Paginator->sort('role','Role');?></th>
			<th><?php echo $this->Paginator->sort('status','Status');?></th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>	
                 <?php print_r($customers); ?>
		<?php $count=0; ?>
		<?php foreach($customers as $customer): ?>				
		<?php $count ++;?>
		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
		<?php endif; ?>
			<td><?php echo $this->Form->checkbox('Customer.id.'.$customer['Customer']['id']); ?></td>
			<td><?php echo $this->Html->link( $customer['Customer']['username']  ,   array('action'=>'edit', $customer['Customer']['id']),array('escape' => false) );?></td>
			<td style="text-align: center;"><?php echo $customer['Customer']['email']; ?></td>
			<td style="text-align: center;"><?php echo $this->Time->niceShort($customer['Customer']['created']); ?></td>
			<td style="text-align: center;"><?php echo $this->Time->niceShort($customer['Customer']['modified']); ?></td>
			<td style="text-align: center;"><?php echo $customer['Customer']['role']; ?></td>
			<td style="text-align: center;"><?php echo $customer['Customer']['status']; ?></td>
			<td >
			<?php echo $this->Html->link(    "Edit",   array('action'=>'edit', $customer['Customer']['id']) ); ?> | 
			<?php
				if( $customer['Customer']['status'] != 0){ 
					echo $this->Html->link(    "Delete", array('action'=>'delete', $customer['Customer']['id']));}else{
					echo $this->Html->link(    "Re-Activate", array('action'=>'activate', $customer['Customer']['id']));
					}
			?>
			</td>
		</tr>
                
		<?php endforeach; ?>
		<?php unset($customer); ?>
	</tbody>
</table>
<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>				
<?php echo $this->Html->link( "Add A New User.",   array('action'=>'add'),array('escape' => false) ); ?>
<br/>
<?php 
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>