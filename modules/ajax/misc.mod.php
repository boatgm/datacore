<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->initMemberHandler();
        $this->my = $this->MemberHandler->MemberFields;
        if (!MEMBER_ID && $this->Code != 'seccode') {
            js_alert_output("请先登录或者注册一个帐号");
        }
        $this->Execute();
    }
    function Execute()
    {
        switch($this->Code)
        {
            case 'fansgroup_select':
                $this->FansGroup_Select();
                break;
            case 'atuser':
                $this->AtUser();
                break;
            case 'tag':
                $this->Tag();
                break;
            case 'seccode':
                $this->Seccode();
                break;
            case 'publishbox':
                $this->PublishBox();
                break;
            case 'report':
                $this->Report();
                break;
            default:
                exit;
                break;
        }
        exit;
    }
    function FansGroup_Select()
    {
    }
    function AtUser()
    {
        $limit = intval($this->Get['limit']);
        $nickname = trim($this->Get['q']);
        if (empty($nickname)) {
            exit;
        }
        if (empty($limit)) {
            $limit = 10;
        }
        $order_sql = " ORDER BY fans_count DESC "; 
        $nickname = getSafeCode($nickname);    
        if ($nickname) {
            $where_sql = " ".build_like_query("nickname", $nickname)." ";
            $query = DB::query("SELECT nickname,uid 
                                FROM ".DB::table('members')." 
                                WHERE {$where_sql} 
                                $order_sql 
                                LIMIT {$limit} ");
            while ($value = DB::fetch($query)) {
                echo $value['nickname'].'|'.$value['uid']."\n";
            }
        }     
        exit;
    }
    function Tag()
    {
        $limit = intval($this->Get['limit']);
        $tag = trim($this->Get['q']);
        if (empty($tag)) {
            exit;
        }
        if (empty($limit)) {
            $limit = 10;
        }
        $order_sql = " ORDER BY total_count DESC "; 
        $tag = getSafeCode($tag);    
        if ($tag) {
            $where_sql = " ".build_like_query("name", $tag)." ";
            $query = DB::query("SELECT id,name  
                                FROM ".DB::table('tag')." 
                                WHERE {$where_sql} 
                                $order_sql 
                                LIMIT {$limit} ");
            while ($value = DB::fetch($query)) {
                echo $value['id'].'|'.$value['name']."\n";
            }
        }     
        exit;
    }
    function Seccode()
    {
        include(template('misc_seccode'));
    }
    function PublishBox()
    {
        $type = trim($this->Get['type']);
        $this->Code = $type;
        $member = jsg_member_info(MEMBER_ID);
        include(template('topic_publish_ajax'));
        exit;
    }
    function Report()
    {
        $tid = intval($this->Get['tid']);
        include(template('misc_report'));
    }
}
?>
