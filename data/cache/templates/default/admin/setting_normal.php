<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $__my=$this->MemberHandler->MemberFields; ?>
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $conf_charset; ?>" />
<link href="./templates/default/styles/admincp.css?v=build+20120428" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var thisSiteURL = '<?php echo $this->Config['site_url']; ?>/';
var thisTopicLength = '<?php echo $this->Config['topic_input_length']; ?>';
var thisMod = '<?php echo $this->Module; ?>';
var thisCode = '<?php echo $this->Code; ?>';
var thisFace = '<?php echo $__my['face_small']; ?>';
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
    var isQunClosed = false;
<?php } else { ?>var isQunClosed = true;
<?php } ?>
function faceError(imgObj)
{
    var errorSrc = '<?php echo $this->Config['site_url']; ?>/images/noavatar.gif';
    imgObj.src = errorSrc;
}
</script>
<script language="JavaScript" type="text/javascript" src="./templates/default/js/cookies.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/min.js?v=build+20120428"></script>
<script src="templates/default/./js/common.js?v=build+20120428" type="text/javascript"></script>
<script src="templates/default/./js/dialog.js?v=build+20120428" type="text/javascript"></script>
<script type="text/javascript" src="templates/default/./js/admin_script_common.js?v=build+20120428"></script>
<script type="text/javascript" src="./images/uploadify/jquery.uploadify.v2.1.4.min.js?v=build+20120428"></script>
<script language="JavaScript">
function checkalloption(form, value) {
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.value == value && e.type == 'radio' && e.disabled != true) {
            e.checked = true;
        }
    }
}
function checkallvalue(form, value, checkall) {
    var checkall = checkall ? checkall : 'chkall';
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.type == 'checkbox' && e.value == value) {
            e.checked = form.elements[checkall].checked;
        }
    }
}
function zoomtextarea(objname, zoom) {
    zoomsize = zoom ? 10 : -10;
    obj = $(objname);
    if(obj.rows + zoomsize > 0 && obj.cols + zoomsize * 3 > 0) {
        obj.rows += zoomsize;
        obj.cols += zoomsize * 3;
    }
}
function redirect(url) {
    window.location.replace(url);
}
function checkall(form, prefix, checkall) {
    var checkall = checkall ? checkall : 'chkall';
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.name != checkall && (!prefix || (prefix && e.name.match(prefix)))) {
            e.checked = form.elements[checkall].checked;
        }
    }
}
var collapsed = Cookies.getCookie('guanzhu_collapse');
function collapse_change(menucount) {
    if(document.getElementById('menu_' + menucount).style.display == 'none') {
        document.getElementById('menu_' + menucount).style.display = '';collapsed = collapsed.replace('[' + menucount + ']' , '');
        $('menuimg_' + menucount).src = './templates/default/images/admincp/menu_reduce.gif';
    } else {
        document.getElementById('menu_' + menucount).style.display = 'none';collapsed += '[' + menucount + ']';
        $('menuimg_' + menucount).src = './templates/default/images/admincp/menu_add.gif';
    }
    Cookies.setCookie('guanzhu_collapse', collapsed, 2592000);
}
function advance_search(o)
{
    o.innerHTML=$('advance_search').visible()?"高级搜索":"简单搜索";
    $('advance_search').toggle();
    return false;
}
</script>
</head>
<body>
<div id="show_message_area"></div>
<table width="100%" border="0" cellpadding="2" cellspacing="6" style="_margin-left:-10px; ">
<tr>
  <td><table width="100%" border="0" cellpadding="2" cellspacing="6">
    <tr>
      <td>
<?php if($__is_messager!=true) { ?>
        <div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
          <div style="float:left;"><a href="admin.php?mod=index&code=home">控制面板首页</a>&nbsp;&raquo;&nbsp;
<?php if($pluginconfig && $pluginname) { ?>
          <?php echo $pluginconfig; ?>&nbsp;&raquo;&nbsp;<?php echo $pluginname; ?>
          <?php } elseif($this->pluginconfig && $this->pluginname) { ?>  <?php echo $this->pluginconfig; ?>&nbsp;&raquo;&nbsp;<?php echo $this->pluginname; ?>
<?php } else { ?>  
<?php echo $this->actionName(); ?>
<?php } ?>
  </div>
<?php if($this->RoleActionId) { ?>
          <div style="float: right;"><a title="查看谁操作过这个页面" href="admin.php?mod=logs&role_action_id=<?php echo $this->RoleActionId; ?>"><b style="color:red">查看当前页操作记录</b></a></div>
<?php } ?>
        </div>
<?php } ?>
<?php $sub_menu_list = $_sub_menu_list?$_sub_menu_list:get_sub_menu(); ?>
<?php if($sub_menu_list) { ?>
<div class="nav3">
    <ul class="cc">
<?php if(is_array($sub_menu_list)) { foreach($sub_menu_list as $value) { ?>
<?php if($value['type'] == '1' && PLUGINDEVELOPER < 1)continue; ?>
<li 
<?php if($value['current']) { ?>
class="current"
<?php } ?>
>
<?php if($this->pluginid) { ?>
                <a href="<?php echo $value['link']; ?>&id=<?php echo $this->pluginid; ?>">
<?php } else { ?><a href="<?php echo $value['link']; ?>">
<?php } ?>
<?php echo $value['name']; ?></a>
            </li>
<?php } } ?>
</ul>
</div>
<?php } ?> <br />
<table cellspacing="1" cellpadding="4" width="100%" align="center"
    class="tableborder">
    <tr class="header">
        <td>要点提示</td>
    </tr>
    <tr>
        <td>
        <ul>
            <li>核心设置是指影响整个网站用户的设置，比如是否开启先审核后发布等；</li>
            <li>本页面的设置以及网站的数据库配置信息都保存在/setting/settings.php中。</li>
        </ul>
        </td>
    </tr>
</table>
<form method="post"  name="config[settings]" action="<?php echo $action; ?>" enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/><a name="基本设置"></a>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr class="header">
        <td colspan="2">核心设置</td>
    </tr>
    <tr class="altbg1">
        <td><b>公共页面仅显示V认证用户的微博:</b><br>
          <span class="smalltxt">公共页面指游客首页、广场的最新微博、同城微博、图片墙、最新评论、热门转发、热门评论；<br />选择是，将仅显示V认证用户的微博，减少垃圾信息干扰。</span>
        </td>
        <td><?php echo $only_show_vip_topic; ?></td>
    </tr>
    <tr class="altbg2">
        <td><b>非V认证用户发言限制:</b><br>
          <span class="smalltxt">选择“禁止发言”，只有已通过V认证的用户才能发微博；</span><br>
          <span class="smalltxt">选择“进入待审核”，非V认证的用户发微博自动进入待审核状态；</span>
        </td>
        <td>
            <input id="config[topic_vip])_1" class="radio" type="radio" value="1" name="config[topic_vip])" <?php echo $topic_only_vip_checked['1']; ?>>
            <label for="config[topic_vip])_1">禁止发言</label>
            <input id="config[topic_vip])_2" class="radio" type="radio" value="2" name="config[topic_vip])" <?php echo $topic_only_vip_checked['2']; ?>>
            <label for="config[topic_vip])_2">进入待审核</label>
            <input id="config[topic_vip])_0" class="radio" type="radio" value="0" name="config[topic_vip])" <?php echo $topic_only_vip_checked['0']; ?>>
            <label for="config[topic_vip])_0">不限制</label>
        </td>
    </tr>
    <tr class="altbg1">
        <td><b>开启微博内容先审后发:</b><br>
        <span class="smalltxt">选择“是”，前台所有用户锁发微博必须经过管理员审核通过后才可以对外显示；<br />
        用户在“我的微博”可以看到自己发布的待审核的微博信息。</span></td>
        <td><?php echo $verify_radio; ?></td>
    </tr>
    <tr class="altbg2">
        <td><b>有待审核通知管理员:</b><br>
        <span class="smalltxt">当您在此处填写了内容时，系统自动以初始帐号给管理员发私信，告知有审核内容；
            <br/>填写管理员昵称，多个管理员用"|"隔开;
            <br>为方便管理，请尽量不要以初始帐号作为审核管理员</span></td>
        <td><input type="text" name="config[notice_to_admin]" value="<?php echo $this->Config['notice_to_admin']; ?>" size="50" ></td>
    </tr>
    <tr class="altbg1">
        <td><b>进入待审核提示:</b><br>
        <span class="smalltxt">选择“是”开启，用户发微博内容进入审核状态时，显示提示信息；<br />
        选择“否”，跳过信息提示</span></td>
        <td><?php echo $alert_radio; ?></td>
    </tr>
    <tr class="altbg2">
        <td><b>开启签名审核:</b><br>
        <span class="smalltxt">选择“是”开启，前台所有用户编辑签名必须经过管理员审核通过后才可以对外显示；<br />
        未经审核以及审核未通过时，显示用户原有签名;</span></td>
        <td><?php echo $sign_verify_radio; ?></td>
    </tr>
    <tr class="altbg1">
        <td><b>开启头像审核:</b><br>
        <span class="smalltxt">选择“是”开启，前台所有用户改变头像必须经过管理员审核通过后才可以对外显示；<br />
        未经审核以及审核未通过时，显示用户原有头像或默认头像;<br>
        注：开启UC整合将不进行审核操作。</span></td>
        <td><?php echo $face_verify_radio; ?></td>
    </tr>
    <tr class="altbg2">
        <td><b>开启微群站外调用:</b><br>
        <span class="smalltxt">选择“是”开启，微群站外调用；<br />
        </span></td>
        <td><?php echo $widget_radio; ?></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>临时关闭前台访问时的提示:</b><br>
        <span class="smalltxt">当您在此处填写了内容时，系统自动关闭网站前台的访问，并提示此内容</span></td>
        <td><textarea cols="50" rows="2" name="site_enable"><?php echo $site_enable; ?></textarea>
        </td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>发布框默认显示话题:</b><br>
        <span class="smalltxt">如果设置此项，则在微博发布框中会显示这里设置的内容，比如“#意见反馈#”<br>
        主要用于引导用户发布相关的微博内容。</span></td>
        <td><input type="text" name="config[today_topic]"
            value="<?php echo $this->Config['today_topic']; ?>" /></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>用户关注数限制:</b><br>
        <span class="smalltxt">设置用户能最多能关注的用户数量，默认为2000个用户；<BR>
        在此可设置关注用户的最大数量，为空或者0时不限制用户关注数；为提高系统效率，强烈建议设置在2000以内。</span></td>
        <td><input type="text" name="config[follow_limit]"
            value="<?php echo $this->Config['follow_limit']; ?>" size="5" /></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>微博内容长度限制:</b><br>
        <span class="smalltxt">设置在微博输入框中可输入的内容长度，默认为1000个字符；<BR>
        在此可设置个性长度，为空或者0时不限制输入长度。</span></td>
        <td><input type="text" name="config[topic_input_length]"
            value="<?php echo $this->Config['topic_input_length']; ?>" size="5" /></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>微博默认显示长度:</b><br>
        <span class="smalltxt">设置微博内容默认显示长度，默认140个字符，最长不能超过200个字符；<BR>
        超过指定长度的内容，系统自动加上“查看全文”链接。</span></td>
        <td><input type="text" name="config[topic_cut_length]"
            value="<?php echo $this->Config['topic_cut_length']; ?>" size="5" /></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>微博可编辑时间:</b><br>
        <span class="smalltxt">设置微博发布后多少时间内允许用户编辑修改（被转发、评论后自动禁止编辑）；<BR>
        管理员不受此设置限制，可在任何时间修改任何微博内容。</span></td>
        <td><input type="text" name="config[topic_modify_time]"
            value="<?php echo $this->Config['topic_modify_time']; ?>" size="5" /> / 分钟</td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>关闭后台密码二次验证:</b><br>
        <span class="smalltxt">
        选择是，那么管理员前台登录后，访问admin.php进入后台时，无需再次输入密码；<br>
        选择“否”，进入后台需再次输入密码进行验证（为了后台安全，建议选择“否”）</span></td>
        <td><?php echo $close_second_verify_enable_radio; ?></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b><span>开启视频站内播放</span>:</b><br>
        选择“是”开启，用户分享的视频链接地址将可在站内直接播放。<br />
        选择“否”系统只在站内显示视频页面标题和URL地址。</td>
        <td><?php echo $video_radio; ?></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b><span>注册需选择所在区域</span>:</b><br>
        选择“是”，注册时显示区域选项，建议选是，方便查找同城用户。</td>
        <td><?php echo $open_city_radio; ?></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b><span>显示个人签名</span>:</b><br>
        选择“是”，在微博列表中显示签名。 选择“否”，则只在个人页面中显示。</td>
        <td><?php echo $open_signature_radio; ?><br />
        </td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b><span>是否显示LV等级图标</span>:</b><br>
        选择“是”在网站中显示等级图标；选择”否“ 则网站不显示等级图标。</td>
        <td><br />
        <?php echo $open_level_radio; ?></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b><span>是否在微博中显示LV等级</span>:</b><br>选择“是”在我的微博中显示在昵称后面，选择”否“则不在微博中显示。</td>
        <td><br />
        <?php echo $open_topic_level_radio; ?></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>微博列表中是否显示“关注用户”按钮:</b><br>
        选择是，会在微博列表的用户头像下出现关注按钮，方便关注</td>
        <td><?php echo $is_topic_user_follow; ?></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b><span>微博列表最多显示多少分页</span>？</b><br>
        分页过多的页面会影响系统效率，建议设置为300以内比较合适，0为不限制。</td>
        <td><input name="config[total_page_default]" type="text"
            id="config[total_page_default]" value="<?php echo $this->Config['total_page_default']; ?>"
            size="5" /> 页 &nbsp;</td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b><span>我的首页显示多长时间内的微博</span>？</b><br>
        内容很多时列出所有的微博会影响系统效率，<br />
        设为60天以内的微博比较合适，0为不限制。</td>
        <td><input name="config[topic_myhome_time_limit]" type="text"
            id="config[topic_myhome_time_limit]"
            value="<?php echo $this->Config['topic_myhome_time_limit']; ?>" size="5" /> 天
        </td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b><span>发布内容间隔时间</span>:</b><br>
        此设置用于限制恶意刷屏；<BR>
        比如设置为5秒，则5秒内不能连续发内容。</td>
        <td><input name="config[lastpost_time]" type="text"
            id="config[lastpost_time]" value="<?php echo $this->Config['lastpost_time']; ?>" size="5" />
        /秒</td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b><span>我的首页自动查询新微博的时间</span>:</b><br>
        如设置为45秒，系统会每隔45秒，自动去服务器查询是否有新发的微博；<br>
        时间过短会影响服务器性能；关闭此功能请设为0秒。</td>
        <td><input name="config[ajax_topic_time]" type="text"
            id="config[ajax_topic_time]" value="<?php echo $this->Config['ajax_topic_time']; ?>" size="5" />
        秒</td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b><span>开启匿名举报</span>:</b><br>
        “开启”，则游客有举报权限，“不开启”则注册会员才能举报；（<span>默认为关闭</span>）</td>
        <td><?php echo $open_report; ?>&nbsp;&nbsp;</td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>服务器时区设置:</b><br>
        <span class="smalltxt">根据服务器的时区进行配置，国内服务器一般为 GMT +08:00</span></td>
        <td><?php echo $timezone_select; ?></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>网站名称:</b><br>
        <span class="smalltxt">网站的名称在每个页面的标题处会显示</span></td>
        <td><input type="text" size="30" name="config[site_name]"
            value="<?php echo $this->Config['site_name']; ?>"></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>网站主域名:</b><br>
        <span class="smalltxt">供系统底层使用，默认设置好的，不建议修改；<br>
        如确实需修改，请通过ftp修改setting目录下settings.php文件site_domain变量值；</span></td>
        <td><input readonly style="color: gray;" type="text" size="30"
            name="config[site_domain]" value="<?php echo $this->Config['site_domain']; ?>"></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>多域名访问支持:</b><br>
        <span class="smalltxt">如果您网站需要通过多个域名来访问，请在右边设置；
        <br>默认为空，一行填写一个域名</span></td>
        <td><img src="./templates/default/images/admincp/zoomin.gif"
            onmouseover="this.style.cursor='pointer'"
            onclick="zoomtextarea('config[extra_domain]', 1)"> <img
            src="./templates/default/images/admincp/zoomout.gif"
            onmouseover="this.style.cursor='pointer'"
            onclick="zoomtextarea('config[extra_domain]', 0)"> <br />
        <textarea cols="48" rows="4" name="config[extra_domain]"><?php echo $this->Config['extra_domain']; ?></textarea>
        </td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>网站url地址:</b><br>
        <span class="smalltxt">为防止搜索引擎重复收录，系统将限定网址以此url为基准；<BR>
        不建议修改；如确实需修改，请通过ftp修改setting目录下settings.php文件site_url变量值</span></td>
        <td><input readonly style="color: gray;" type="text" size="30"
            name="config[site_url]" value="<?php echo $this->Config['site_url']; ?>"></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>管理员常用Email（重要）:</b><br>
        <span class="smalltxt">系统给用户发邮件时将使用此域名，并且网站数据库错误信息也会发到此Email</span></td>
        <td><input type="text" size="30" name="config[site_admin_email]"
            value="<?php echo $this->Config['site_admin_email']; ?>"></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>开启页面 Gzip 压缩:</b><br>
        <span class="smalltxt">选“是”启用gzip压缩，可加快网页传输速度；<BR>
        开启前请确认服务器PHP为4.x以上版本，且开启Zlib模块。</span></td>
        <td><?php echo $gzip_radio; ?></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><a name="beian"></a> <b>网站备案号码:</b><br>
        <span class="smalltxt">如果网站已备案，在此输入您的备案号；<BR>
        填写后，会在每个页面底部显示 ICP 备案信息</span></td>
        <td><input type="text" size="30" name="config[icp]"
            value="<?php echo $this->Config['icp']; ?>"></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>网站版权或联系信息:</b><br>
        <span class="smalltxt">此处支持HTML代码，不用可以留空；<BR>
        可以在此声明网站的版权信息，也可以填写联系信息等
        </span></td>
        <td><img src="./templates/default/images/admincp/zoomin.gif"
            onmouseover="this.style.cursor='pointer'"
            onclick="zoomtextarea('config[copyright]', 1)"> <img
            src="./templates/default/images/admincp/zoomout.gif"
            onmouseover="this.style.cursor='pointer'"
            onclick="zoomtextarea('config[copyright]', 0)"> <br />
        <textarea cols="48" rows="4" name="config[copyright]"></textarea>
        </td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>访问统计代码:</b><br>
        <span class="smalltxt">可将第三方提供的网站访问统计HTML代码，直接粘贴到此次即可统计全站<br>
        </span></td>
        <td><img src="./templates/default/images/admincp/zoomin.gif"
            onmouseover="this.style.cursor='pointer'"
            onclick="zoomtextarea('config[tongji]', 1)"> <img
            src="./templates/default/images/admincp/zoomout.gif"
            onmouseover="this.style.cursor='pointer'"
            onclick="zoomtextarea('config[tongji]', 0)"> <br />
        <textarea cols="48" rows="4" name="config[tongji]"><?php echo $this->Config['tongji']; ?></textarea>
        </td>
    </tr>
</table>
<br>
<center><input type="submit" class="button"
    name="settingsubmit" value="提 交"></center>
<br>
<?php if(0) { ?>
 <a name="防刷设置"></a>
<table cellspacing="1" cellpadding="4" width="100%" align="center"
    class="tableborder">
    <tr class="header">
        <td colspan="2">防刷设置</td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>防治刷屏:</b><br>
        <span class="smalltxt">防刷时间设置为“0”时，防治刷屏取消，单位为秒。 </span></td>
        <td><input type="text" size="30"
            name="config[refresh_prevent_time]"
            value="<?php echo $this->Config['refresh_prevent_time']; ?>"></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>刷屏几次封IP:</b><br>
        <span class="smalltxt">当用户刷屏几次后，系统自动将其IP给封掉。 </span></td>
        <td><input type="text" size="30"
            name="config[refresh_times_banned_ip]"
            value="<?php echo $this->Config['refresh_times_banned_ip']; ?>"></td>
    </tr>
</table>
<br>
<center><input type="submit" class="button"
    name="settingsubmit" value="提 交"></center>
<br>
<div style="display: none;"><a name="Cookie 选项"></a>
<table cellspacing="1" cellpadding="4" width="100%" align="center"
    class="tableborder">
    <tr class="header">
        <td colspan="2">Cookie 选项：<U>下面任何内容都不需要修改；除非你很清楚，否则请不要修改，会导致无法登录</U>！</td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>Cookie前缀:</b><br>
        <span class="smalltxt">便于清楚区分 cookies, 请设置cookie前缀. 仅能使用字母或者数字</span></td>
        <td><input type="text" size="30" name="config[cookie_prefix]"
            value="<?php echo $this->Config['cookie_prefix']; ?>"></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>Cookie路径:</b><br>
        <span class="smalltxt">cookie使用的路径 ( 本地地址则留空 ). </span></td>
        <td><input type="text" size="30" name="config[cookie_path]"
            value="<?php echo $this->Config['cookie_path']; ?>"></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>Cookie域名:</b><br>
        <span class="smalltxt">可留空，表示cookie是用于那个域名的. ( 例如:
        “.example.com”，域名前有个点）</span></td>
        <td><input type="text" size="30" name="config[cookie_domain]"
            value="<?php echo $this->Config['cookie_domain']; ?>"></td>
    </tr>
</table>
<br>
<center><input type="submit" class="button"
    name="settingsubmit" value="提 交"></center>
<br>
</div>
<?php } ?>
</form>
<br>