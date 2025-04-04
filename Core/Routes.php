<?php
  foreach ($_SERVER as $key=>$value) {
    echo '<p>'.$key.': '.$value.'</p>';
  }
  $test1 = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
  if ($test1 == HOME_URI) {
    echo '<h1>Домашний каталог</h1>';
  }

  $base_name = 'start';

  $model_name = 'Model_'.$base_name;
  if (file_exists('./Models/'.$model_name.'.php')) {
    echo 'Model file exists: '.'./Models/'.$model_name.".php<br>";
    require_once('./Models/'.$model_name.'.php');
  } else {
    echo 'Cann\' find model file exists: '.'./Models/'.$model_name.'.php';
  }

  $controller_name = 'Controller_'.$base_name;
  if (file_exists('./Controllers/'.$controller_name.'.php')) {
    echo 'Controller file exists: "'.'./Controllers/'.$controller_name.'.php"';
    require_once('./Controllers/'.$controller_name.'.php');
  }

  $controller = new $controller_name;
  if (method_exists($controller, 'Show_any')) {
    echo 'Method exists';
    $controller->Show_any() ;
  }
  
  $requestPath = explode('/', $_SERVER['REQUEST_URI']);
  header('Location: '.$_SERVER['REQUEST_URI']);

?>