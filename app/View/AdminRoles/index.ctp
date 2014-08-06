<div class="adminRoles index">
	<h2><?php echo __('Admin Roles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('access');?></th>
			<th><?php echo $this->Paginator->sort('date_created');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('date_modified');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($adminRoles as $adminRole): ?>
	<tr>
		<td><?php echo h($adminRole['AdminRole']['id']); ?>&nbsp;</td>
		<td><?php echo h($adminRole['AdminRole']['role']); ?>&nbsp;</td>
		<td><?php echo h($adminRole['AdminRole']['access']); ?>&nbsp;</td>
		<td><?php echo h($adminRole['AdminRole']['date_created']); ?>&nbsp;</td>
		<td><?php echo h($adminRole['AdminRole']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($adminRole['AdminRole']['date_modified']); ?>&nbsp;</td>
		<td><?php echo h($adminRole['AdminRole']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $adminRole['AdminRole']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $adminRole['AdminRole']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $adminRole['AdminRole']['id']), null, __('Are you sure you want to delete # %s?', $adminRole['AdminRole']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Admin Role'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Admins'), array('controller' => 'admins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admin'), array('controller' => 'admins', 'action' => 'add')); ?> </li>
	</ul>
</div>
