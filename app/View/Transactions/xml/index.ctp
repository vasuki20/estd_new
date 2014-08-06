<div class="transactions index">
	<h2><?php echo __('Transactions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('transaction_type');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('application_id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('product_type');?></th>
			<th><?php echo $this->Paginator->sort('amount');?></th>
			<th><?php echo $this->Paginator->sort('telco_id');?></th>
			<th><?php echo $this->Paginator->sort('vendor_txn_id');?></th>
			<th><?php echo $this->Paginator->sort('response_code');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('date_created');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th><?php echo $this->Paginator->sort('date_modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($transactions as $transaction): ?>
	<tr>
		<td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['transaction_type']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['application_id']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['product_id']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['product_type']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['amount']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transaction['Telco']['id'], array('controller' => 'telcos', 'action' => 'view', $transaction['Telco']['id'])); ?>
		</td>
		<td><?php echo h($transaction['Transaction']['vendor_txn_id']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['response_code']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['date_created']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['date_modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transaction['Transaction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), null, __('Are you sure you want to delete # %s?', $transaction['Transaction']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Telcos'), array('controller' => 'telcos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telco'), array('controller' => 'telcos', 'action' => 'add')); ?> </li>
	</ul>
</div>
