            </article>
            <aside>
                <div class="list">
                    <div class="title">
                        Artikel Terbaru
                    </div>
                    <nav class="articles">
                        <?php
                            for($x = 0; $x < count($new_articles); ++$x) {
                                echo '<hr/>' .
                                    '<h2 style="font-size: 1.5em; font-weight: 700; text-align: center">' .
                                        $new_articles[$x]['title'] .
                                    '</h2>' .
                                    '<img src="' . $new_articles[$x]['preview'] . '" style="width: 80%;" />' .
                                    '<details open="true" style="color: #008080;">' .
                                        '<summary>' .
                                            'Posted by ' . htmlspecialchars_decode($new_articles[$x]['author_name']) .
                                        '</summary>' .
                                        ' on ' .
                                        '<time datetime="' . htmlspecialchars_decode($new_articles[$x]['created_date']) . ' ' .
                                            htmlspecialchars_decode($new_articles[$x]['created_time']) . '">' .
                                            htmlspecialchars_decode($new_articles[$x]['created_date']) .
                                            ' at ' .
                                            htmlspecialchars_decode($new_articles[$x]['created_time']) .
                                        '</time>' .
                                    '</details>'.
                                    '<br/>' .
                                    '<a style="color: #ff0000; font-weight: 700; text-align: right;" ' .
                                        'href="http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/id/' . $new_articles[$x]['id'] . '">' .
                                        'Baca lebih lanjut...' .
                                    '</a>' .
                                    '<br/>';
                            }
                        ?>
                    </nav>
                </div>
            </aside>
            <div style="clear: both;">
            </div>
            <div id="article-statistic">
                <button class="count" type="button" onmouseover="change1(this)"
                    onclick="<?php echo 'likeArticle(' . $article['id'] . ')'; ?>" onmouseleave="change2(this)">
                    <img src="http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/buttons/like-2.png" />
                </button>
                <span id="like-article">
                    <?php
                        echo $article['likes'];
                    ?>
                </span>
                &nbsp;Likes
                <button class="count" type="button" onmouseover="change3(this)"
                    onclick="<?php echo 'dislikeArticle(' . $article['id'] . ')'; ?>" onmouseleave="change4(this)">
                    <img src="http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/buttons/dislike-2.png">
                </button>
                <span id="dislike-article">
                    <?php
                        echo $article['dislikes'];
                    ?>
                </span>
                &nbsp;Dislikes
                <button class="count" type="button" disabled="disabled">
                    <img src="http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/buttons/view-2.png">
                </button>
                <span>
                    <?php
                        echo $article['readers'];
                    ?>
                </span>
                &nbsp;Readers
            </div>
        </section>
