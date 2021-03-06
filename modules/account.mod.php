<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{    
    var $ID = '';
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->ID = (int) ($this->Post['id'] ? $this->Post['id'] : $this->Get['id']);
        $this->Execute();
    }
    function Execute()
    {
        ob_start();        
        switch ($this->Code) 
        {
            ;
            default:
                $this->Main();
        }
        $body=ob_get_clean();
        $this->ShowBody($body);
    }
    function Main()
    {
        $act_list = array();  
        $act_list['qqwb'] = '腾讯微博';        
        $act_list['sina'] = '新浪微博';
        $act_list['yy'] = 'YY帐号';
        $act_list['renren'] = '人人帐号';
        $act_list['kaixin'] = '开心帐号';
        if($this->Config['fjau_enable']) {
            $act_list['fjau'] = 'FJAU帐号';
        }
        $act = isset($act_list[$this->Code]) ? $this->Code : 'qqwb';
        $this->Code = $act;
        if('qqwb' == $act)
        {
            $qqwb_init = qqwb_init($this->Config);
            if($qqwb_init)
            {
                Load::lib('form');
                $FormHandler = new FormHandler();
                $qqwb = ConfigHandler::get('qqwb');
                $qqwb_bind_info = qqwb_bind_info(MEMBER_ID);
                if($qqwb_bind_info)
                {
                    if($qqwb['is_synctopic_toweibo'])
                    {
                        $synctoqq_radio = $FormHandler->YesNoRadio('synctoqq',(int) $qqwb_bind_info['synctoqq']);
                    }                
                }
            }
            ;
        }
        elseif ('sina' == $act)
        {
            $profile_bind_message = '';
            $xwb_start_file = ROOT_PATH . 'include/xwb/sina.php';
            if (!is_file($xwb_start_file))
            {
                $profile_bind_message = '&#25554;&#20214;&#25991;&#20214;&#20002;&#22833;&#65292;&#26080;&#27861;&#21551;&#21160;&#65281;';
            }
            else
            {
                require($xwb_start_file);
                $profile_bind_message = '<a href="javascript:XWBcontrol.bind()">&#22914;&#26524;&#30475;&#19981;&#21040;&#26032;&#28010;&#24494;&#21338;&#32465;&#23450;&#35774;&#32622;&#31383;&#21475;&#65292;&#35831;&#28857;&#20987;&#36825;&#37324;&#21551;&#21160;&#12290;</a>';
                $GLOBALS['xwb_tips_type'] = 'bind';
                $profile_bind_message .= jsg_sina_footer();
            }
            ;
        }
        elseif ('yy' == $act)
        {
            $yy_init = yy_init($this->Config);
            if($yy_init)
            {
                $yy_bind_info = yy_bind_info(MEMBER_ID);
            }
            ;
        }
        elseif ('renren' == $act)
        {
            $renren_init = renren_init($this->Config);
            if($renren_init)
            {
                $renren_bind_info = renren_bind_info(MEMBER_ID);
            }
            ;
        }
        elseif ('kaixin' == $act)
        {
            $kaixin_init = kaixin_init($this->Config);
            if($kaixin_init)
            {
                $kaixin_bind_info = kaixin_bind_info(MEMBER_ID);
            }
            ;
        }
        elseif ('fjau' == $act)
        {
            $fjau_init = fjau_init($this->Config);
            if($fjau_init)
            {
                $fjau_bind_info = fjau_bind_info(MEMBER_ID);
            }
            ;
        }
        else 
        {
            ;
        }
        $this->Title = $act_list[$act];
        include($this->TemplateHandler->Template('account_main'));
    }
}
?>
