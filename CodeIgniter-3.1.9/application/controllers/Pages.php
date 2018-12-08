<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pages extends CI_Controller {
        public $data = array();

        function __construct() {
            parent::__construct();
        }

        function _remap($method, $params = array()) {
            if($method === 'section') {
                if($params[0] === 'home') {
                    return call_user_func_array(array($this, 'home'), $params);
                } elseif($params[0] === 'admin') {
                    return call_user_func_array(array($this, 'admin'), $params);
                } elseif($params[0] === 'log_in') {
                    return call_user_func_array(array($this, 'log_in'), $params);
                } elseif($params[0] === 'try') {
                    return call_user_func_array(array($this, 'try'), $params);
                } else {
                    return call_user_func_array(array($this, $method), $params);
                }
            }

            show_404();
        }

        function try() {
            $this -> data['hash_1'] = $this -> session -> userdata();

            $this -> section('try');
        }

        function section($page = 'home') {
            if(!empty($page)) {
                $page = ucfirst(htmlspecialchars($page));

                $this -> data['title'] = $page;

                if(file_exists(APPPATH . 'views\\pages\\' . $page . '\\index.php')) {
                    $this -> load -> view('templates\\head-1.php', $this -> data);
                    $this -> load -> view('templates\\navbar.xml', $this -> data);
                    $this -> load -> view('templates\\header-1.php', $this -> data);
                    $this -> load -> view('pages\\' . $page . '\\index.php', $this -> data);
                    $this -> load -> view('templates\\pages.php', $this -> data);
                    $this -> load -> view('templates\\footer.xml', $this -> data);
                    $this -> load -> view('templates\\script-dependencies.php', $this -> data);
                } else {
                    show_404();
                }
            } else {
                show_404();
            }
        }

        function home() {
            $this -> data['articles'] = $this -> borneo -> get_articles();

            for($x = 0; $x < count($this -> data['articles']); ++$x) {
                $row = $this -> borneo -> get_author($this -> data['articles'][$x]['id_author']);

                $this -> data['articles'][$x]['author_name'] = $row['name'];
            }

            $this -> section('home');
        }

        function admin() {
            /*$hash_1 = $this -> session -> userdata('hash');
            $hash_2 = $this -> borneo -> get_hash();

            if($hash_1 === $hash_2) {
                $this -> data['articles'] = $this -> borneo -> get_articles();

                for($x = 0; $x < count($this -> data['articles']); ++$x) {
                    $row = $this -> borneo -> get_author($this -> data['articles'][$x]['id_author']);

                    $this -> data['articles'][$x]['author_name'] = $row['name'];
                }

                $this -> section('admin');
            }*/

            $this -> data['articles'] = $this -> borneo -> get_articles();

            for($x = 0; $x < count($this -> data['articles']); ++$x) {
                $row = $this -> borneo -> get_author($this -> data['articles'][$x]['id_author']);

                $this -> data['articles'][$x]['author_name'] = $row['name'];
            }

            $this -> section('admin');
        }

        function log_in() {
            /*$log_in_info = $this -> borneo -> log_in();

            if(!empty($log_in_info['id'])) {
                $this -> session -> set_userdata($log_in_info);

                header('Location: http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/pages/section/admin');
            }*/

            header('Location: http://localhost/borneo-dream-space-laboratory/CodeIgniter-3.1.9/index.php/pages/section/admin');
        }

        /*function log_out() {
            session_destroy();
        }*/
    }
