<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../../../../yii/framework/yiit.php';
require_once($yiit);

$config=Yii::getPathOfAlias('application').'/config/main.php';
switch (getenv('APPLICATION_ENV')){
    case "dev":
         $config='../config/mode_development.php';
        // remove the following lines when in production mode
        defined('YII_DEBUG') or define('YII_DEBUG',true);
        // specify how many levels of call stack should be shown in each log message
        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
        break;
 
    case "test":
        // remove the following lines when in production mode
        defined('YII_DEBUG') or define('YII_DEBUG',true);
        // specify how many levels of call stack should be shown in each log message
        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
        $config='../config/mode_test.php';
        break;
		
	case "prod":
        // remove the following lines when in production mode
        defined('YII_DEBUG') or define('YII_DEBUG',false);
        // specify how many levels of call stack should be shown in each log message
        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',0);
        $config='../config/mode_production.php';
        break;
    default:
    		die('APPLICATION_ENV inválido');
    	break;
}

require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
