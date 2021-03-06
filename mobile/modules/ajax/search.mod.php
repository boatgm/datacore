<?php
if (!defined('IN_DATACORE')) {
    exit('Access Denied');
}
class ModuleObject extends MasterObject
{
    var $ShowConfig;
    var $CacheConfig;
    var $TopicLogic;
    var $MblogLogic;
    var $ID = '';
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->ID = (int) ($this->Post['id'] ? $this->Post['id'] : $this->Get['id']);
        Mobile::logic('mblog');
        $this->MblogLogic = new MblogLogic();
        $this->CacheConfig = ConfigHandler::get('cache');
                $this->ShowConfig = ConfigHandler::get('show');
                Mobile::is_login();
        $this->Execute();
    }
    function Execute()
    {
        ob_start();
        switch($this->Code)
        {
            case 'topic':
                $this->searchTopic();
                break;
            case 'user':
                $this->searchUser();
                break;            
            default:
                exit();
                break;
        }
        $body=ob_get_clean();
        echo $body;
    }
        function searchTopic() 
    {
        $this->Title = "";
        $this->Get['limit'] = Mobile::config("perpage_mblog");
        $keyword = addslashes($this->Get['q']);
        $ret =    $this->MblogLogic->search($this->Get);
        $error_code = 0;
        if (is_array($ret)) {
            $topic_list = $ret['topic_list'];
            $ret['list_count'] = count($topic_list);
            Mobile::output($ret);
        } else {
            $msg = '';
            if ($ret == 400) {
                $msg = 'No Data';
            }
            Mobile::error("No Data", $ret);
        }
    }
        function searchUser()
    {
        Mobile::logic('member');
        $MemberLogic = new MemberLogic();
        $q = trim($this->Get['q']);
        if (empty($q)) {
            Mobile::error("No Data", 400);
        }
        $param = array(
            'limit' => Mobile::config("perpage_member"),
            'nickname' => $q,
            'max_id' => $this->Get['max_id'],
        );
        $ret = $MemberLogic->getMemberList($param);
        if (is_array($ret)) {
            Mobile::output($ret);
        } else {
            Mobile::error("No Data", $ret);
        }
    }
}
?>