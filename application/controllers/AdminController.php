<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    $this->load->model('BackEndModel', 'BackEndModel');
  }

  public function index()
  {


    $datos = array();

    $vista = array(
      'vista' => 'admin/index.php',
      'params' => $datos,
      'layout' => 'ly_admin.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view($vista);
  }

  public function registro()
  {


    $datos = array();

    $vista = array(
      'vista' => 'admin/new_autor.php',
      'params' => $datos,
      'layout' => 'ly_admin.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view($vista);
  }

  public function add_autor()
  {

    # Ponemos los datos que llegan en el post en formato array para pasarlo al modelo
    foreach ($_POST as $key => $value) {
      $datos[$key] = $value;
    }

    if (isset($datos['enabled'])) {
      $datos['enabled'] = 1;
    } else {
      $datos['enabled'] = 0;
    }

    $datos['password'] = md5($datos['password']);
    $this->BackEndModel->insert('authors', $datos);

    header("location: /list");
  }

  public function list()
  {

    $posts = $this->BackEndModel->ListPosts();


    $datos = array(
      'posts' => $posts,
    );

    $vista = array(
      'vista' => 'admin/index.php',
      'params' => $datos,
      'layout' => 'ly_home.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view($vista);
  }

  public function login()
  {
    if ($this->uri->segment(2) == !null && $this->uri->segment(2) == 'error') {

      $datos = array(
        'error' => "Usuario o contraseña invalidos"
      );
    } else {
      $datos = array();
    }

    $vista = array(
      'vista' => 'admin/login.php',
      'params' => $datos,
      'layout' => 'ly_admin.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view($vista);
  }

  public function login2()
  {
    # Tratamos los datos para pasarselos al modelo
    $datos['email'] = $_POST['email_login'];
    # Codificamos el password con MD5 porque asi esta codificado en la base de datos
    # (Se puede utilizar cualquier otra codificacion como sha1 o mezcla)
    $datos['password'] = md5($_POST['login_password']);

    # Enviamos los datos al modelo que hará la consulta  a la base de datos y nos devolvera un 
    # Array con los datos del usuario o un array vacio si no encuentra nada.

    $user = $this->BackEndModel->login($datos);

    # Miramos que ha devuelto el modelo
    if (empty($user)) {
      header("location: /login/error");
    } else {
      header("location: /list");
    }
  }

  public function new_post()
  {

    $authors = $this->BackEndModel->ListAuthors();

    $datos = array('authors' => $authors);

    $vista = array(
      'vista' => 'admin/new_post.php',
      'params' => $datos,
      'layout' => 'ly_home.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view($vista);
  }

  public function add()
  {

    # Ponemos los datos que llegan en el post en formato array para pasarlo al modelo
    foreach ($_POST as $key => $value) {
      $datos[$key] = $value;
    }

    if (isset($datos['enabled'])) {
      $datos['enabled'] = 1;
    } else {
      $datos['enabled'] = 0;
    }

    $this->BackEndModel->insert('posts', $datos);

    header("location: /list");
  }

  public function autores()
  {

    $authors = $this->BackEndModel->ListAuthors();

    $datos = array(
      'authors' => $authors
    );

    $vista = array(
      'vista' => 'admin/list_autores.php',
      'params' => $datos,
      'layout' => 'ly_home.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view($vista);
  }

  public function edit()
  {
    //debug( $this->uri);

    $post = $this->BackEndModel->ListOnePost($this->uri->segment(2));

    $authors = $this->BackEndModel->ListAuthors();


    $datos = array(
      'post' => $post['data'],
      'authors' => $authors,
    );

    $vista = array(
      'vista' => 'admin/edit_post.php',
      'params' => $datos,
      'layout' => 'ly_home.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view($vista);
  }

  public function update()
  {
    //debug ( $_POST);
    # Ponemos los datos que llegan en el post en formato array para pasarlo al modelo
    foreach ($_POST as $key => $value) {
      $datos[$key] = $value;
    }

    if (isset($datos['enabled'])) {
      $datos['enabled'] = 1;
    } else {
      $datos['enabled'] = 0;
    }


    $where['id'] = $datos['id'];
    unset($datos['id']);

    # Enviamos los datos al modelo para grabalos en base de datos.
    $this->BackEndModel->update('posts', $datos, $where);

    header("location: /list");
  }

  public function edit_autor()
  {
    $author = $this->BackEndModel->ListOneAuthor($this->uri->segment(2));

    $datos = array(
      'autor' => $author['data'],
    );

    $vista = array(
      'vista' => 'admin/edit_author.php',
      'params' => $datos,
      'layout' => 'ly_home.php',
      'titulo' => 'Prueba de controlador login',
    );

    $this->layouts->view($vista);
  }

  public function update_autor()
  {

    # Ponemos los datos que llegan en el post en formato array para pasarlo al modelo
    foreach ($_POST as $key => $value) {
      $datos[$key] = $value;
    }

    if (isset($datos['enabled'])) {
      $datos['enabled'] = 1;
    } else {
      $datos['enabled'] = 0;
    }


    $where['id'] = $datos['id'];
    unset($datos['id']);

    # Enviamos los datos al modelo para grabalos en base de datos.
    $this->BackEndModel->update('authors', $datos, $where);


    header("location: /autores");
  }

  public function delete()
  {

    $where['id'] = $this->uri->segment(2);

    $this->BackEndModel->delete('posts', $where);

    header("location: /list");
  }

  public function delete_author()
  {

    $where['id'] = $this->uri->segment(2);

    $this->BackEndModel->delete('authors', $where);

    header("location: /autores");
  }
}
