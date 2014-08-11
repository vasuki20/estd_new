<h1>List of <?php echo $count ?> Movies</h1>
<?php //echo $this->Html->link('Add Movie', array('controller' => 'movies', 'action' => 'add')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Channel</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($movies as $movie): ?>
        <tr>
            <td><?php echo h($movie['Movie']['id']); ?></td>
            <td>
                <?php echo $this->Html->link($movie['Movie']['title'], array('controller' => 'movies', 'action' => 'view', $movie['Movie']['id']));
                ?>
            </td>
            <td>
                <?php
                echo $movie['Channel']['name'];
                ?>
            </td>
            <td>
                <?php
                if ($movie['Movie']['published'] == 0) {
                    $status = 'Unpublished';
                } else {
                    $status = 'Published';
                }
                echo $status;
                ?>
            </td>
            <td>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $movie['Movie']['id']));
                ?> | 
                <?php
                echo $this->Form->postLink('Delete', array('action' => 'delete', $movie['Movie']['id']), array('confirm' => 'Are you sure you want to delete movie, ' . $movie['Movie']['title'] . '?'));
                ?>       
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php unset($movie); ?>