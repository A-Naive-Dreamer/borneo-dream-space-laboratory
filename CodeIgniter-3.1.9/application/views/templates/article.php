<?php
    echo '<h1>' .
            htmlspecialchars_decode($article['title']) .
        '</h1>' .
        '<br/>' .
            '<details>' .
                '<summary>' .
                    'Posted by ' .
                    htmlspecialchars_decode($author['name']) .
                '</summary>' .
                ' on ' .
                '<time datetime="' . htmlspecialchars_decode($article['updated_date']) . ' ' . htmlspecialchars_decode($article['updated_time']) . '">' .
                    htmlspecialchars_decode($article['updated_date']) .
                    ' at ' .
                    htmlspecialchars_decode($article['updated_time']) .
                '</time>' .
            '</details>';

    if($article['preview'] !== '') {
        echo '<img src="' . $article['preview'] . '" style="width: 80%;" />';
    }

    echo htmlspecialchars_decode($article['content']);
?>
