<?php
error_reporting(0);
define('P_W','admincp');
define('ROOT_PATH',dirname(__FILE__));
define('R_P',ROOT_PATH.'/');
define('D_P',R_P);
require_once(R_P.'setting/settings.php');
if($config['phpwind_enable'] && @file_exists(R_P.'setting/phpwind.php')){
    include_once(R_P.'setting/phpwind.php');
    define('PW_KEY',$config['phpwind']['pw_key']);
    define('PW_APIID',$config['phpwind']['pw_app_id']);
    define('PW_API',$config['phpwind']['pw_api']);
    define('PW_CHARSET',$config['phpwind']['pw_charset']);
} else {
    exit('pw_api is invalid');
}
require_once(R_P.'api/pw_api/security.php');
require_once(R_P.'api/pw_api/pw_common.php');
require_once(R_P.'api/pw_api/class_base.php');
$api = new api_client();
$response = $api->run($_POST + $_GET);
if ($response) {
    echo $api->dataFormat($response);
}
?>
