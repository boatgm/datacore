<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
$GLOBALS['jsg_schedule'] = array();
$GLOBALS['schedule_html'] = '';
function schedule_add($vars, $type='', $uid=0)
{
    $datas = array('uid'=> max(0, (int) ($uid ? $uid : MEMBER_ID)),'type'=>$type,'vars'=>base64_encode(serialize(array('vars'=>$vars))),);    
    $schedule_id = DB::insert('schedule',$datas,true);
    _schedule_create($schedule_id);
    return $schedule_id;
}
function schedule_get($id,$del=true)
{
    $return = array();
    $id = (is_numeric($id) ? $id : 0);
    if($id > 0)
    {
        $row = DB::fetch_first("select * from ".DB::table('schedule')." where `id`='$id'");
        if($row)
        {
            if($del)
            {
                schedule_del($id);
            }
            if($row['vars'])
            {
                $vars = unserialize(base64_decode($row['vars']));
                if($vars)
                {
                    $row['vars'] = $vars['vars'];
                }
                else
                {
                    $row['vars'] = array();
                }
            }                
            $return = $row;
        }
    }
    return $return;
}
function schedule_del($id)
{
    $return = false;
    $id = (is_numeric($id) ? $id : 0);
    if($id > 0)
    {
        $return = DB::delete('schedule',"`id`='$id'");
        _schedule_destory($id);
    }
    return $return;
}
function schedule_html($id=0)
{
    $return = '';
    $jsg_schedules = array();    
    if($id > 0)
    {
        $jsg_schedules[$id] = $id;
    }
    else
    {
        if($GLOBALS['jsg_schedule'])
        {
            $jsg_schedules = (array) $GLOBALS['jsg_schedule'];
        }        
        if(($_jsg_schedules = jsg_getcookie('jsg_schedule')) && ($__jsg_schedules = explode(",",$_jsg_schedules)))
        {
            $__jsg_schedules = (array) $__jsg_schedules;
            foreach($__jsg_schedules as $id)
            {
                $jsg_schedules[$id] = $id;
            }
        }
        _schedule_destory();
    }
        if(!$GLOBALS['__jsg_schedules'])
    {        
        $query = DB::query("select `id` from ".TABLE_PREFIX."schedule order by `id` desc limit 100");
        while($row = DB::fetch($query))
        {
            $jsg_schedules[$row['id']] = $row['id'];
        }
    }
    if($jsg_schedules)
    {
        settype($jsg_schedules,'array');        
        $sys_config = ConfigHandler::get();
        $html = '';    
        foreach($jsg_schedules as $id)
        {
            $id = (is_numeric($id) ? $id : 0);
            if($id > 0 && !isset($GLOBALS['__jsg_schedules'][$id]))
            {
                $GLOBALS['__jsg_schedules'][$id] = $id;
                $url = "{$sys_config['site_url']}/ajax.php?mod=schedule&code=execute&id=$id";
                $html .= "<img src='{$url}' border='0' width='0' height='0' />";
            }
        }    
        if($html)
        {
            $return = "<span style='display:none;'>{$html}</span>";
        }
    }
    return $return;
}
function _schedule_create($id)
{
    if(!isset($GLOBALS['jsg_schedule'][$id]))
    {
        $GLOBALS['jsg_schedule'][$id] = $id;
        _schedule_setcookie();
        $GLOBALS['schedule_html'] .= schedule_html($id);
    }
}
function _schedule_destory($id=0)
{
    if($id > 0)
    {
        unset($GLOBALS['jsg_schedule'][$id]);
    }
    else
    {
        unset($GLOBALS['jsg_schedule']);
    }
    _schedule_setcookie();
}
function _schedule_setcookie()
{
    $_jsg_schedule = '';
    if($GLOBALS['jsg_schedule'])
    {
        $_jsg_schedule = implode(",",$GLOBALS['jsg_schedule']);
    }    
    jsg_setcookie("jsg_schedule",$_jsg_schedule,($_jsg_schedule ? 600 : -86400000));
    _schedule_config($_jsg_schedule);
}
function _schedule_config($jsg_schedule=0)
{
    $jsg_schedule = ($jsg_schedule ? 1 : 0);
    $GLOBALS['jsg_schedule_mark'] = $jsg_schedule;
    }
?>