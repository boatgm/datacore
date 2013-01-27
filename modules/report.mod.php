<?php
if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->Execute();
    }
    function Execute()
    {
        switch($this->Code)
        {    
            case 'do':
                $this->DoReport();
                break;
            default:
                $this->Main();
                break;
        }
    }
    function Main()
    {
        $url = urlencode(getSafeCode(urldecode($this->Get['url'])));
        $report_config = ConfigHandler::get('report');
        include($this->TemplateHandler->Template('report.inc'));
    }
    function DoReport()
    {
        $url = get_param('url');
        $report_url = get_param('report_url');
        $url = getSafeCode(urldecode(urldecode(($url ? $url : $report_url))));        
        $data = array(
            'uid' => MEMBER_ID,
            'username' => MEMBER_NAME,
            'ip' => client_ip(),
            'reason' => (int) get_param('report_reason'),
            'content' => strip_tags(get_param('report_content')),
            'url' => strip_tags(urldecode($url)),
            'dateline' => time(),
        );
        $this->DatabaseHandler->SetTable(TABLE_PREFIX . 'report');
        $result = $this->DatabaseHandler->Insert($data);
        $this->Messager("举报成功");
    }
}
?>
