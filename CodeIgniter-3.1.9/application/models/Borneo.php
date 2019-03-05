<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Borneo extends CI_Model {
        function get_article(int $id = 1): array {
            $this -> load -> database();

            $query = "SELECT * FROM `articles` WHERE `id` = " . $this -> db -> escape($id) . ";";
            $query = $this -> db -> query($query);

            $article = $query -> row_array();

            $query -> free_result();

            $article['readers'] = ++$article['readers'];

            $query = "UPDATE `articles` SET `readers` = " . $article['readers'] . ";";
            $query = $this -> db -> simple_query($query);

            $this -> db -> close();

            return $article;
        }

        function delete_article(int $id = 1) {
            $this -> load -> database();

            $query = "DELETE FROM `comments` WHERE `article_id` = " . $this -> db -> escape($id) . ";";
            $this -> db -> simple_query($query);

            $query = "DELETE FROM `articles` WHERE `id` = " . $this -> db -> escape($id) . ";";
            $this -> db -> simple_query($query);

            $this -> db -> close();
        }

        function get_new_articles(): array {
            $this -> load -> database();

            $query = "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 0, 5;";
            $query = $this -> db -> query($query);

            $new_articles = $query -> result_array();

            $query -> free_result();

            for($x = 0; $x < count($new_articles); ++$x) {
                $row = $this -> get_author($new_articles[$x]['id_author']);

                $new_articles[$x]['author_name'] = $row['name'];
            }


            $this -> db -> close();

            return $new_articles;
        }

        function get_articles(): array {
            $this -> load -> database();

            $query = "SELECT * FROM `articles` ORDER BY `id` DESC;";
            $query = $this -> db -> query($query);

            $articles = $query -> result_array();

            $this -> db -> close();

            return $articles;
        }

        function get_author(int $id = 1): array {
            $this -> load -> database();

            $query = "SELECT * FROM `authors` WHERE `id` = " . $this -> db -> escape($id) . ";";
            $query = $this -> db -> query($query);

            $this -> db -> close();

            return $query -> row_array();
        }

        function get_comments(int $id = 1): array {
            $this -> load -> database();

            $query = "SELECT * FROM `comments` WHERE `article_id` = " . $this -> db -> escape($id) . " ORDER BY `created_date` DESC, `created_time` DESC;";
            $query = $this -> db -> query($query);

            $this -> db -> close();

            return $query -> result_array();
        }

        function insert_comment() {
            $this -> load -> database();

            $commentator_picture = $this -> input -> post('commentator_picture');
            $name = $this -> input -> post('name');
            $e_mail = $this -> input -> post('e_mail');
            $comment = $this -> input -> post('comment');
            $article_id = $this -> input -> post('article_id');

            $query = "INSERT INTO `comments` VALUES(NULL, '" . $this -> db -> escape_str($name) . "', '" . $this -> db -> escape_str($commentator_picture) . "', '" .
                $this -> db -> escape_str($e_mail) . "', '" . $this -> db -> escape_str($comment) . "', 0, 0, " . $this -> db -> escape($article_id) .
                ', CURRENT_DATE, CURRENT_TIME);';
            $query = $this -> db -> simple_query($query);

            $this -> db -> close();
        }

        function like_comment(int $comment_id = 1): int {
            $this -> load -> database();

            $query = "SELECT `likes` FROM `comments` WHERE `id` = " . $this -> db -> escape($comment_id) . ";";
            $query = $this -> db -> query($query);

            $comment = $query -> row_array();

            $query -> free_result();

            $comment['likes'] = ++$comment['likes'];

            $query = "UPDATE `comments` SET `likes` = " . $comment['likes'] . " WHERE `id` = " . $this -> db -> escape($comment_id) . ";";
            $query = $this -> db -> simple_query($query);

            $this -> db -> close();

            return $comment['likes'];
        }

        function dislike_comment(int $comment_id = 1): int {
            $this -> load -> database();

            $query = "SELECT `dislikes` FROM `comments` WHERE `id` = " . $this -> db -> escape($comment_id) . ";";
            $query = $this -> db -> query($query);

            $comment = $query -> row_array();

            $query -> free_result();

            $comment['dislikes'] = ++$comment['dislikes'];

            $query = "UPDATE `comments` SET `dislikes` = " . $comment['dislikes'] . " WHERE `id` = " . $this -> db -> escape($comment_id) . ";";
            $query = $this -> db -> simple_query($query);

            $this -> db -> close();

            return $comment['dislikes'];
        }

        function like_article(int $article_id = 1): int {
            $this -> load -> database();

            $query = "SELECT `likes` FROM `articles` WHERE `id` = " . $this -> db -> escape($article_id) . ";";
            $query = $this -> db -> query($query);

            $article = $query -> row_array();

            $query -> free_result();

            $article['likes'] = ++$article['likes'];

            $query = "UPDATE `articles` SET `likes` = " . $article['likes'] . " WHERE `id` = " . $this -> db -> escape($article_id) . ";";
            $query = $this -> db -> simple_query($query);

            $this -> db -> close();

            return $article['likes'];
        }

        function dislike_article(int $article_id = 1): int {
            $this -> load -> database();

            $query = "SELECT `dislikes` FROM `articles` WHERE `id` = " . $this -> db -> escape($article_id) . ";";
            $query = $this -> db -> query($query);

            $article = $query -> row_array();

            $query -> free_result();

            $article['dislikes'] = ++$article['dislikes'];

            $query = "UPDATE `articles` SET `dislikes` = " . $article['dislikes'] . " WHERE `id` = " . $this -> db -> escape($article_id) . ";";
            $query = $this -> db -> simple_query($query);

            $this -> db -> close();

            return $article['dislikes'];
        }

        function update_article(string $preview = '') {
            $this -> load -> database();

            $article_id = $this -> input -> post('article_id');
            $title = $this -> input -> post('title');
            $preview = 'http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/media/pictures/' . $preview;
            $content = $this -> input -> post('content');

            $query = "UPDATE `articles` SET `title` = '" . $this -> db -> escape_str($title) . "', `preview` = '" . $this -> db -> escape_str($preview) . "', " .
                "`$content` = '" . $this -> db -> escape_str($content) . "' WHERE `id` = " . $this -> db -> escape($article_id) . ";";
            $query = $this -> db -> simple_query($query);

            $this -> db -> close();
        }

        function insert_article(string $preview = '') {
            $this -> load -> database();

            $title = $this -> input -> post('title');
            $preview = 'http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/media/pictures/' . $preview;
            $content = $this -> input -> post('content');

            $query = "INSERT INTO `articles` VALUES(NULL, '" . $this -> db -> escape_str($title) . "', '" . $this -> db -> escape_str($preview) . "', '" .
                $this -> db -> escape_str($content) . "', '', 1, 0, 0, 0, CURRENT_DATE, CURRENT_TIME, CURRENT_DATE, CURRENT_TIME);";
            $query = $this -> db -> simple_query($query);

            $this -> db -> close();
        }

        function get_max_id(): int {
            $this -> load -> database();

            $query = "SELECT `id` FROM `articles` ORDER BY `id` DESC LIMIT 1;";
            $query = $this -> db -> query($query);

            $row = $query -> row_array();

            $this -> db -> close();

            return $row['id'];
        }

        function log_in(): array {
            $this -> load -> database();

            $username = $this -> input -> post('username');
            $e_mail = $this -> input -> post('e_mail');
            $password = $this -> input -> post('password');

            $query = "SELECT `id`, `username` FROM `authors` WHERE `username` = '" . $this -> db -> escape_str($username) . "';";
            $query = $this -> db -> query($query);

            $row_1 = $query -> row_array();

            if($query -> num_rows() > 0) {
                $query -> free_result();

                $query = "SELECT `email` FROM `authors` WHERE `email` = '" . $this -> db -> escape_str($e_mail) . "';";
                $query = $this -> db -> query($query);

                $row_2 = $query -> row_array();

                if($query -> num_rows() > 0) {
                    $this -> db -> free_result();

                    $query = "SELECT `password` FROM `authors` WHERE `password` = '" . $this -> db -> escape_str($password) . "';";
                    $query = $this -> db -> query($query);

                    $row_3 = $query -> row_array();

                    if($query -> num_rows() > 0) {
                        $this -> db -> close();

                        return array(
                            'id' => $row_1['id'],
                            'hash' => hash('sha256', $row_1['username'] . $row_2['email'] . $row_3['password'])
                        );
                    }
                }
            }

            $this -> db -> close();

            return FALSE;
        }

        function get_hash(int $id = 1): string {
            $this -> load -> database();

            $query = "SELECT `username`, `email`, `password` FROM `authors` WHERE `id` = " . $this -> db -> escape($id) . ";";
            $query = $this -> db -> query($query);

            $row = $query -> row_array();

            $this -> db -> close();

            return hash('sha256', $row['username'] . $row['email'] . $row['password']);
        }
    }
