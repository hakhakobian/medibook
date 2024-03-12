<?php
class DataController extends BaseController {
  private $model;

  public function __construct($path) {
    $this->model = $path;
    require_once PROJECT_ROOT_PATH . "/model/" . $this->model . "Model.php";
  }

  /**
   * Return items for the specific path.
   *
   * @return void
   */
  public function getItems( ) {
    $strErrorDesc = '';
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $arrQueryStringParams = $this->getQueryStringParams();
    if ( strtoupper($requestMethod) == 'GET' ) {
      try {
        $modelClass = $this->model . "Model";
        $dataModel = new $modelClass();
        $intLimit = 10;
        if ( isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit'] ) {
          $intLimit = $arrQueryStringParams['limit'];
        }
        $responseData = json_encode($dataModel->getList($intLimit));
      }
      catch ( Error $e ) {
        $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
      }
    }
    else {
      $strErrorDesc = 'Method not supported';
      $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
    }
    if ( !$strErrorDesc ) {
      $this->sendOutput($responseData, array( 'Content-Type: application/json', 'HTTP/1.1 200 OK' ));
    }
    else {
      $this->sendOutput(json_encode(array( 'error' => $strErrorDesc )), array(
        'Content-Type: application/json',
        $strErrorHeader,
      ));
    }
  }

  /**
   * Return item for the specific path by ID.
   *
   * @param $id
   *
   * @return void
   */
  public function getItem( $id ) {
    $strErrorDesc = '';
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if ( strtoupper($requestMethod) == 'GET' ) {
      try {
        $modelClass = $this->model . "Model";
        $dataModel = new $modelClass();
        $responseData = json_encode($dataModel->getItem($id));
      }
      catch ( Error $e ) {
        $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
      }
    }
    else {
      $strErrorDesc = 'Method not supported';
      $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
    }
    if ( !$strErrorDesc ) {
      $this->sendOutput($responseData, array( 'Content-Type: application/json', 'HTTP/1.1 200 OK' ));
    }
    else {
      $this->sendOutput(json_encode(array( 'error' => $strErrorDesc )), array(
        'Content-Type: application/json',
        $strErrorHeader,
      ));
    }
  }

  /**
   * Save the given data and return the item's data.
   *
   * @return void
   */
  public function setItem() {
    $strErrorDesc = '';
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if ( strtoupper($requestMethod) == 'POST' ) {
      try {
        $modelClass = $this->model . "Model";
        $dataModel = new $modelClass();
        $responseData = json_encode($dataModel->setItem());
      }
      catch ( Error $e ) {
        $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
      }
    }
    else {
      $strErrorDesc = 'Method not supported';
      $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
    }
    if ( !$strErrorDesc ) {
      $this->sendOutput($responseData, array( 'Content-Type: application/json', 'HTTP/1.1 200 OK' ));
    }
    else {
      $this->sendOutput(json_encode(array( 'error' => $strErrorDesc )), array(
        'Content-Type: application/json',
        $strErrorHeader,
      ));
    }
  }

  /**
   * Save the given data and return the item's data.
   *
   * @return void
   */
  public function deleteItem($ids) {
    $strErrorDesc = '';
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if ( strtoupper($requestMethod) == 'DELETE' ) {
      try {
        $modelClass = $this->model . "Model";
        $dataModel = new $modelClass();
        $responseData = json_encode($dataModel->deleteItem($ids));
      }
      catch ( Error $e ) {
        $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
      }
    }
    else {
      $strErrorDesc = 'Method not supported';
      $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
    }
    if ( !$strErrorDesc ) {
      $this->sendOutput($responseData, array( 'Content-Type: application/json', 'HTTP/1.1 200 OK' ));
    }
    else {
      $this->sendOutput(json_encode(array( 'error' => $strErrorDesc )), array(
        'Content-Type: application/json',
        $strErrorHeader,
      ));
    }
  }
}