<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
function area_config_to_json() {
    include(ROOT_PATH . 'setting/area.php');
    $json = "";
    foreach($config['area'] as $key=>$val) {
        $j = '';
        foreach($val as $k=>$v) {
            $j .= "'{$k}':'{$v}',";
        }
        $j = trim($j,' ,');
        $json .= "'{$key}':{'key':'{$key}','values':{{$j}}},";
    }
    $json = trim($json,',');
    $json = "{'请选择…':{'key':'0','defaultvalue' : '0','values':{'请选择…':'0'}},{$json}}";
    return $json;
}
?>