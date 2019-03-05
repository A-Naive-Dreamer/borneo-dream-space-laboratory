        <div id="comments">
            <?php
                if(count($comments) > 0) {
                    $x = 0;

                    foreach($comments as $comment) {
                        echo '<table>' .
                                '<tbody>' .
                                    '<tr>' .
                                        '<td class="image">' .
                                            '<div class="description">' .
                                                '<img src="' . $comment['author_picture'] . '" width="100" height="100" />' .
                                                '<br/>' .
                                                '<span>' .
                                                    $comment['name'] .
                                                '</span>' .
                                            '</div>' .
                                        '</td>' .
                                        '<td class="comment-box">' .
                                            '<div class="comment">' .
                                                '<time datetime="' . $comment['created_date'] . ' ' . $comment['created_time'] . '">' .
                                                    'Pada ' . $comment['created_date'] . ', ' . $comment['created_time'] .
                                                '</time>' .
                                                '<hr/>' .
                                                '<div class="chat">' .
                                                    $comment['name'] .
                                                    ' Berkomentar: ' .
                                                    '<br/>' .
                                                    '&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;' .
                                                    $comment['comment'] .
                                                    '&rdquo;' .
                                                '</div>' .
                                                '<hr/>' .
                                                '<div class="statistic">' .
                                                    '<button class="count" type="button" data-ng-mouseover="change1($event)" data-ng-click="likeComment(' . $article['id'] . ', ' .
                                                        $comment['id'] . ', ' . $x . ')" data-ng-mouseleave="change2($event)">' .
                                                        '<img src="http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/buttons/like-2.png" />' .
                                                    '</button>' .
                                                    '<span id="like-' . $x . '"> ' .
                                                        $comment['likes'] .
                                                    '</span>' .
                                                    ' Like' .
                                                    '<button class="count" type="button" data-ng-mouseover="change3($event)" data-ng-click="dislikeComment(' . $article['id'] . ', ' .
                                                        $comment['id'] . ', ' . $x . ')" data-ng-mouseleave="change4($event)">' .
                                                        '<img src="http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/buttons/dislike-2.png">' .
                                                    '</button>' .
                                                    '<span id="dislike-' . $x . '">' .
                                                        ' ' . $comment['dislikes'] .
                                                    '</span>' .
                                                    ' Dislike' .
                                                '</div>' .
                                            '</div>' .
                                        '</td>' .
                                    '</tr>' .
                                '</tbody>' .
                            '</table>';
                    }
                }
            ?>
        </div>
