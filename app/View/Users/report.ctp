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
                <li class = active> <?php echo $this->Html->link(__('Daily Report'), array('action' => 'index')); ?></li>
                <?php echo "<li >".$this->Html->link(__('Weekly Report'), array('action' => 'add'))."</li>";?></li>
                <?php echo "<li >".$this->Html->link(__('Monthly Report'), array('action' => 'add'))."</li>";?></li>
                