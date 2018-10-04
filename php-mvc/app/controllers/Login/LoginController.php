<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Login controller
*/
class LoginController extends Controller
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
  }

  public function exec()
  {
    $this->render(__CLASS__);
  }

  public function signin($request_params)
  {
    if($this->verify($request_params))
      return $this->renderErrorMessage('El usuario y clave son obligatorios');

    $result = $this->model->signIn($request_params['Usuario']);

    if(!$result->num_rows)
      return $this->renderErrorMessage("El usuario {$request_params['Usuario']} no fue encontrado");

    $result = $result->fetch_object();

    if(!password_verify($request_params['Clave'], $result->Clave))
      return $this->renderErrorMessage('La clave es incorrecta');

    $this->session->init();
    $this->session->add('Usuario', $result->Usuario);
    header('location: /php-mvc/main');
  }

  private function verify($request_params)
  {
    return empty($request_params['Usuario']) OR empty($request_params['Clave']);
  }

  private function renderErrorMessage($message)
  {
    $params = array('error_message' => $message);
    $this->render(__CLASS__, $params);
  }

}