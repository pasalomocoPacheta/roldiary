<?php

// https://es.stackoverflow.com/questions/91530/como-manejar-rutas-de-archivos-php

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/WEB');
define('CONTROLLER_PATH', ROOT_PATH.'/controller/');
define('MODEL_PATH', ROOT_PATH.'/model/');
define('VIEW_PATH', ROOT_PATH.'/view/');

// Aquí van todos los directorios de las vistas.
// Para llamar a un archivo en concreto se haría del siguiente modo:
// En el archivo en concreto, se incluye el directorio raíz seguido del directorio de las vistas necesario
// include_once ($_SERVER['DOCUMENT_ROOT'].'/WEB/dirs.php');
// include (ADMIN_PATH."pruebaAdmin.php");
// Aquí llamarías al archivo pruebaAdmin.php situado dentro del directorio admin, que a su vez está en el directorio de view

define('ADMIN_PATH', VIEW_PATH.'admin/');
define('CSS_PATH', VIEW_PATH.'css/');
define('FORMULARIOS_PATH', VIEW_PATH.'formularios/');
define('IMG_PATH', VIEW_PATH.'img/');
define('INDEXHTML_PATH', VIEW_PATH.'indexHTML/');
define('JQUERY_PATH', VIEW_PATH.'jquery/');
define('NAV_PATH', VIEW_PATH.'nav/');
define('TABLAS_PATH', VIEW_PATH.'tablas/');
define('FOOTER_PATH', VIEW_PATH.'footer/');
define('HEADER_PATH', VIEW_PATH.'header/');
define('PERSONAJES_PATH', VIEW_PATH.'personajes/');
define('ANECDOTAS_PATH', VIEW_PATH.'anecdotas/');
define('NAVIGATIONPANE_PATH', VIEW_PATH.'navigationPane/');




?>