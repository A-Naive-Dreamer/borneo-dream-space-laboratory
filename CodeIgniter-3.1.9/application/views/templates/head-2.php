<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="Id">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            <?php
                echo $article['title'];
            ?>
        </title>
        <link rel="stylesheet" type="text/css" href="http://localhost/borneo-dream-space-laboratory/stylesheets/style-1.css" />
    </head>
    <body onload="setPages();">
