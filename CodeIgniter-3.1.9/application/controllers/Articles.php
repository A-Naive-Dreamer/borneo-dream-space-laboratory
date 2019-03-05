<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Articles extends CI_Controller {
        public $data = array();

        function __construct() {
            parent::__construct();

            $this -> load -> helper(array(
                'form',
                'url'
            ));
            $this -> load -> library('form_validation');
            $this -> load -> model('borneo');
        }

        function id(int $article_id = 1) {
            $this -> data['article_id'] = $article_id;

            if(!empty($this -> data['article_id'])) {
                $this -> data['article'] = $this -> borneo -> get_article($this -> data['article_id']);
                $this -> data['new_articles'] = $this -> borneo -> get_new_articles();
                $this -> data['author'] = $this -> borneo -> get_author($this -> data['article']['id_author']);
                $this -> data['comments'] = $this -> borneo -> get_comments($this -> data['article_id']);

                if(count($this -> data) > 0) {
                    $this -> load -> view('templates\\head-2.php', $this -> data);
                    $this -> load -> view('templates\\navbar.xml', $this -> data);
                    $this -> load -> view('templates\\header-2.php', $this -> data);
                    $this -> load -> view('templates\\article.php', $this -> data);
                    $this -> load -> view('templates\\sidebar.php', $this -> data);
                    $this -> load -> view('templates\\comment-form.php', $this -> data);
                    $this -> load -> view('templates\\comments.php', $this -> data);
                    $this -> load -> view('templates\\footer.xml', $this -> data);
                    $this -> load -> view('templates\\script-dependencies.php', $this -> data);
                } else {
                    show_404();
                }
            } else {
                show_404();
            }
        }

        function send(string $form_type = 'comment', int $article_id = 1) {
            if($form_type === 'comment') {
                $this -> borneo -> insert_comment();
                header('Location: http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/articles/id/' . $article_id);
            }
        }

        function valid_name(string $name) {
            if(preg_match('/^[a-Z0-9]+$/', $name) === 1) {
                return TRUE;
            }

            $this -> form_validation -> set_message(
                'valid_name',
                '{field} hanya boleh terdiri dari huruf dan angka!'
            );

            return FALSE;
        }

        function like_comment(int $article_id, int $comment_id) {
            $like = $this -> borneo -> like_comment($comment_id);

            echo $like;
        }

        function dislike_comment(int $article_id, int $comment_id) {
            $dislike = $this -> borneo -> dislike_comment($comment_id);

            echo $dislike;
        }

        function like_article(int $article_id) {
            echo $this -> borneo -> like_article($article_id);
        }

        function dislike_article(int $article_id) {
            echo $this -> borneo -> dislike_article($article_id);
        }

        function create() {
            $file_name = $this -> borneo -> get_max_id();

            ++$file_name;

            $config = array(
                'upload_path' => './media/pictures',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => $file_name,
                'file_ext_tolower' => TRUE,
                'overwrite' => FALSE,
                'max_size' => 1024,
                'remove_spaces' => TRUE
            );

            $this -> load -> library('upload', $config);

            if(!$this -> upload -> do_upload('preview')) {
                $error = array(
                    'error' => $this -> upload -> display_errors()
                );

                $this -> load -> view('pages/upload-form/index.php', $error);
            } else {
                $this -> data['preview'] = $this -> upload -> data('file_name');
                $this -> borneo -> insert_article($this -> data['preview']);
            }

            header('Location: http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/pages/home');
        }

        function update(int $article_id) {
            $this -> data['type'] = 'page';
            $this -> data['title'] = 'admin';
            $this -> data['article'] = $this -> borneo -> get_article($article_id);

            $this -> load -> view('templates/head-1.php', $this -> data);
            $this -> load -> view('templates/navbar.xml', $this -> data);
            $this -> load -> view('templates/header-1.php', $this -> data);
            $this -> load -> view('pages/update/index.php', $this -> data);
            $this -> load -> view('templates/pages.php', $this -> data);
            $this -> load -> view('templates/footer.xml', $this -> data);
            $this -> load -> view('templates/script-dependencies.php', $this -> data);
        }

        function update_2(int $article_id) {
            $config = array(
                'upload_path' => './media/pictures',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => $article_id,
                'file_ext_tolower' => TRUE,
                'overwrite' => FALSE,
                'max_size' => 1024,
                'remove_spaces' => true
            );

            $this -> load -> library('upload', $config);

            if(!$this -> upload -> do_upload('preview')) {
                $error = array(
                    'error' => $this -> upload -> display_errors()
                );

                $this -> load -> view('pages/upload-form/index.php', $error);
            } else {
                $this -> data['preview'] = $this -> upload -> data('file_name');
                $this -> borneo -> update($this -> data['preview']);
            }
        }
    }
