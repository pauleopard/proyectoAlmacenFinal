<?php 
/**
* 
*/
class LoginModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function signIn($Usuario)
  {
    $Usuario = $this->db->real_escape_string($Usuario);
    $sql = "SELECT Usuario, Clave FROM Usuario WHERE Usuario = '{$Usuario}'";
    return $this->db->query($sql);
  }
}