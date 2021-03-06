<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostModel extends CI_Model
{
  # Variable donde se guarda la conexión a la base de datos
  private $db = null;

  function __construct()
  {

    parent::__construct();

    # Cargamos la conexión a la base de datos
    $this->db = $this->load->database('default', true);

  }

   # Ejecuta consultas y devuelte los resultados en un array
  public function ExecuteArrayResults( $sql)
  {
    $query = $this->db->query( $sql);
    $rows = $query->result_array();
    $query->free_result();

    return ( $rows);
  }

  public function ExecuteResultsParamsArray( $sql, $params)
  {

    $query = $this->db->query( $sql, $params);
    $rows['data'] = $query->result_array();
    $query->free_result();

    return ( $rows);

  }

  public function lists_all_posts()
  {

    $sql = "Select p.*, a.display_name 
      From posts as p
      left join authors as a  On p.author_id = a.id
      where p.enabled = 1 order by p.created desc limit 10";
    return ( $this->ExecuteArrayResults( $sql ));

  }

  public function lists_one_posts( $post_id)
  {

    $sql = "Select p.*, a.display_name 
      From posts as p
      inner join authors as a  On p.author_id = a.id
      where p.id = " . $post_id;
    return ( $this->ExecuteArrayResults( $sql ));

  }

  public function lists_all_posts_by_author( $author_id)
  {

    $sql = "Select p.*, a.display_name 
      From posts as p
      inner join authors as a  On p.author_id = a.id
      where p.enabled = 1 And p.author_id = ".$author_id." order by p.created desc";
    return ( $this->ExecuteArrayResults( $sql ));

  }

}