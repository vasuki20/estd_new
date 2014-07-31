
<!doctype html>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="script.js"></script>
        <title>CSS MenuMaker</title>
    </head>
    <body>

        <div id='cssmenu'>

            <ul>
                <?php
                if ($Role['Role'] == 'Admin') {
                    echo "<li >".$this->Html->link(__('Add User'), array('action' => 'add'))."</li>";
                }
                ?>

                <li> <?php echo $this->Html->link(__('Reporting'), array('action' => 'report')); ?></li>

            </ul>
        </div>

    </body>
    <html>


        <div id="logoutBtn" style="float: right;">
            <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
        </div>


        <?php
        echo $this->Form->create('User');
        echo '<div id="searchText" style="width: 20%;float: right;margin: 0;padding: 0;">';
        echo $this->Form->input('SearchParam');
        echo '</div>';
        echo '<div id="searchBtn" style="float: right;margin: 0;padding: 0;margin-right: 60px;">';
        echo $this->Form->end('Search');
        echo '</div>';
        ?>

        <table>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>emailID</th>
                <th>password</th>
                <th>contactno</th>
                <th>Telconame</th>
                <th>IsActive</th>
                <th>Created_date</th>
                <th>Modified_date</th>
                <th>Edit</th>
                <?php
                if ($Role['Role'] == 'Admin') {
                    echo '<th>Delete</th>';
                }
                ?>
            </tr>
            <!-- Here is where we loop through our $posts array, printing out post info -->
            <?php foreach ($Users as $User): ?>
                <tr>
                    <td>
                        <?php
                        echo $this->Html->link
                                (
                                $User['u']['id'], array('controller' => 'Users',
                            'action' => 'view', $User['u']['id']
                                )
                        );
                        ?>
                    </td>
                    <td><?php echo $User['r']['Role']; ?></td>
                    <td><?php echo $User['u']['FirstName']; ?></td>
                    <td><?php echo $User['u']['LastName']; ?></td>
                    <td><?php echo $User['u']['emailId']; ?></td>
                    <td><?php echo $User['u']['password']; ?></td>
                    <td><?php echo $User['u']['contactno']; ?></td>
                    <td><?php echo $User['t']['Telconame']; ?></td>
                    <td><?php echo $User['i']['IsActive']; ?></td>
                    <td><?php echo $User['u']['created']; ?></td>
                    <td><?php echo $User['u']['modified']; ?></td>
                    <td>
                        <?php
                        echo $this->Html->link(
                                'Edit', array('action' => 'edit', $User['u']['id'])
                        );
                        ?>
                    </td>
                    <td>

                        <?php
                        if ($Role['Role'] == 'Admin') {
                            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $User['u']['id']), null, __('Are you sure you want to delete # %s?', $User['u']['id']));
                        }
                        ?>

                    </td>

                </tr>

            <?php endforeach; ?>
            <?php unset($User); ?>
        </table>





