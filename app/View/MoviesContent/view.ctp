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
            <h3> Content Management </h3>
            <ul>
                
                <li> <?php echo $this->Html->link(__('Home'), array('controller' => 'users', 'action' => 'index')); ?></li>
            <li class = "active"> <?php echo $this->Html->link(__('Movies Free'), array('controller' => 'MoviesFree', 'action' => 'view')); ?></li>
            <li> <?php echo $this->Html->link(__('Movies hot'), array('controller' => 'MoviesHot', 'action' => 'displaymovieshot')); ?></li>
            <li> <?php echo $this->Html->link(__('Movies New'), array('controller' => 'MoviesNew', 'action' => 'displaymoviesnew')); ?></li>
            <li> <?php echo $this->Html->link(__('Featured Image'), array('controller' => 'FeaturedImage', 'action' => 'displayfeaturedimage')); ?></li>
            <li class="logoutMenu"> <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
                <li class="logoutMenu"> <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>

            </ul>
        </div>

    </body>
    </html>