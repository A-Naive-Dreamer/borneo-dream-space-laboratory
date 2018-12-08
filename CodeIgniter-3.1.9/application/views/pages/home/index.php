<?php
    foreach($articles as $article):
?>
        <div class="articles">
            <h1><?php echo $article['title']; ?></h1>
            <img src="<?php echo $article['preview']; ?>">
            <div>
                <?php
                    if(strlen($article['content']) > 100) {
                        echo substr($article['content'], 0, 100);
                    } else {
                        echo '<details open="true" style="color: #008080;">' .
                                '<summary>' .
                                    'Posted by ' .
                                    htmlspecialchars_decode($article['author_name']) .
                                '</summary>' .
                                ' on ' .
                                '<time datetime="' . htmlspecialchars_decode($article['created_date']) . ' ' . htmlspecialchars_decode($article['created_time']) . '">' .
                                    htmlspecialchars_decode($article['created_date']) .
                                    ' at ' .
                                    htmlspecialchars_decode($article['created_time']) .
                                '</time>' .
                            '</details>'.
                            '<br/>' .
                            htmlspecialchars($article['content']);

                    }
                ?>
            </div>
            <br/>
            <a style="color: red; font-weight: 700; text-align: right;" href="<?php echo 'http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/id/' . $article['id'] ?>">
                Baca lebih lanjut...
            </a>
        </div>
<?php
    endforeach;
?>
