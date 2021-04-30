<?php
//chamando o Core
require_once('core/Core.php');

require_once('lib/Database/Connection.php');

//chamando os Controllers
require_once('controller/HomeController.php');
require_once('controller/ErrorController.php');

//chamando as Models
require_once('model/Product.php');

//pegando o template
$tempTemplate = file_get_contents('./template/template.html');

//passando url para o Core, e armazenando o retorno da funcao start em uma variavel
ob_start();
$core = new Core;
$core->start($_GET);

$controllerReturn = ob_get_contents();
ob_end_clean();

$template = str_replace('{{content}}', $controllerReturn, $tempTemplate);

echo $template;
