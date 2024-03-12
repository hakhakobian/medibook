<?php
require __DIR__ . "/inc/bootstrap.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
// Register REST routes.
if ( (isset($uri[3]) && in_array($uri[3], ENDPOINTS)) ) {
  require PROJECT_ROOT_PATH . "/controller/DataController.php";
  // Resource path.
  $path = ucfirst(rtrim($uri[3], 's'));
  $controller = new DataController($path);

  // Choose the method depends on the necessary data.
  $requestMethod = strtoupper($_SERVER["REQUEST_METHOD"]);
  if ( !isset($uri[4]) ) {
    if ( $requestMethod == 'POST' ) {
      $method = "setItem";
      $controller->{$method}();
    }
    elseif ( $requestMethod == 'GET' ) {
      $method = "getItems";
      $controller->{$method}();
    }
  }
  else {
    if ( $requestMethod == 'GET' ) {
      $method = "getItem";
      $id = (int) $uri[4];
      $controller->{$method}($id);
    }
    elseif ( $requestMethod == 'DELETE' ) {
      $method = "deleteItem";
      $id1 = (int) $uri[4];
      $id2 = isset($uri[5]) ? (int) $uri[5] : 0;
      $controller->{$method}(array($id1, $id2));
    }
  }
  exit();
}
/**
 * GET/SET by endpoint.
 *
 * @param $endpoint
 * @param $post_data
 *
 * @return mixed
 */
function get_data( $endpoint, $method = "GET", $post_data = FALSE ) {
  $requestUri = REQEST_URI . $endpoint;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_URL, $requestUri);
  if ( $post_data ) {
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  }
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
  $result = curl_exec($ch);
  curl_close($ch);

  return json_decode($result, TRUE);
}
