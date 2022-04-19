<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->model('PostModel', 'PostModel');
  }

  public function index()
  {

    $posts = $this->PostModel->lists_all_posts();

    $datos = array(
      'posts' => $posts,
    );

    $vista = array(
      'vista' => 'web/index.php',
      'params' => $datos,
      'layout' => 'ly_blog.php',
      'titulo' => 'Título del blog',
    );

    $this->layouts->view($vista);
  }

  public function post()
  {

    $post_id = $this->uri->segment(2);
    $post = $this->PostModel->lists_one_posts($post_id);


    $datos = array(
      'post' => $post
    );

    $vista = array(
      'vista' => 'web/post.php',
      'params' => $datos,
      'layout' => 'ly_blog.php',
      'titulo' => 'Prueba de controlador',
    );

    $this->layouts->view($vista);
  }

  public function author()
  {

    $author_id = $this->uri->segment(2);
    $posts = $this->PostModel->lists_all_posts_by_author($author_id);

    $datos = array(
      'posts' => $posts
    );

    $vista = array(
      'vista' => 'web/author.php',
      'params' => $datos,
      'layout' => 'ly_blog.php',
      'titulo' => 'Prueba de controlador',
    );

    $this->layouts->view($vista);
  }
}
