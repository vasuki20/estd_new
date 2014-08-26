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
                <li> <?php echo $this->Html->link(__('Home'), array('controller' => 'users', 'action' => 'index')); ?></li>

                <li class="logoutMenu"> <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>

            </ul>
        </div>

    </body>
    <html>

        <?php
        echo $this->Form->create('MoviesContent');
        echo '<div><div id="searchText" style="width: 40%;float:left;margin-top: 3px;margin-left: 70px;">';
        echo $this->Form->input('SearchParam');
        echo '</div>';
        echo '<div id="searchBtn" style="float: left;clear: none;padding: 0;">';
        echo $this->Form->end('Search');
        echo '</div></div>';
        ?>
        <?php
        if ($fromtablename == "movies_free") {
            $tableName = "Movies Free";
            $controller = "MoviesFree";
            $action = "displaymoviesfree";
        } else if ($fromtablename == "movies_hot") {
            $tableName = "Movies Hot";
            $controller = "MoviesHot";
            $action = "displaymovieshot";
        } else if ($fromtablename == "movies_new") {
            $tableName = "Movies New";
            $controller = "MoviesNew";
            $action = "displaymoviesnew";
        }
          else if ($fromtablename == "featured_image") {
            $tableName = "Featured Image";
            $controller = "FeaturedImage";
            $action = "displayfeaturedimage";
        }
        ?>
        <!-- Back to home -->
        <div style="margin-top: 8%;color: rgb(175, 10, 10);">
        <?php echo $this->Html->link('Back To ' . $controller, array('controller' => $controller, 'action' => $action)); ?>
        </div>
        <div style="margin-left: 33%;color: rgb(175, 10, 10);">
            Please select a movie to insert in  <?php echo $tableName; ?> table
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Select</th>
            </tr>
            <!-- Here is where we loop through our $posts array, printing out post info -->

<?php foreach ($movies as $movie): ?>

                <tr>
                    <td><?php echo $movie['MoviesContent']['id']; ?></td>
                    <td><?php echo $movie['MoviesContent']['title']; ?></td>
                    <td>
    <?php
    echo $this->Html->link('Select', array('controller' => 'MoviesContent', 'action' => 'select', $movie['MoviesContent']['id'], $fromtablename));
    ?>
                    </td>

                </tr>
              

                    <?php endforeach; ?>
<?php unset($movies); ?>
        </table>

            <?php
// Shows the next and previous links
            echo '<div id="prev_btn">';
            echo $this->Paginator->prev(
                    '« Previous', null, null, array('class' => 'disabled')
            );
            echo '</div>';
            echo '<div id="page_numbers">';
// Shows the page numbers
            echo $this->Paginator->numbers();
            echo '</div>';
            echo '<div id="next_btn">';

            echo $this->Paginator->next(
                    'Next »', null, null, array('class' => 'disabled')
            );
            echo '</div>';
            ?>



