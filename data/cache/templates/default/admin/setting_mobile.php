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
        <td width="45%"><b>开启WAP手机访问:</b><br>
        选择“是”开启，前台页面底部会显示“手机访问”链接。</td>
        <td><?php echo $wap_radio; ?></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>开启WAP注册:</b><br>
        选择“是”开启，WAP注册功能。</td>
        <td><?php echo $open_wap_reg_radio; ?></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>WAP访问url地址:</b><br>
        默认为<?php echo $this->Config['site_url']; ?>/wap<br />
        如果在此指定二级域名，需要将域名解析到wap目录。</td>
        <td><input type="text" name="config[wap_url]"
            value="<?php echo $this->Config['wap_url']; ?>" size="50" /></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>3G访问url地址:</b><br>
        默认为<?php echo $this->Config['site_url']; ?>/mobile<br />
        如果在此指定二级域名，需要将域名解析到mobile目录。</td>
        <td><input type="text" name="config[mobile_url]"
            value="<?php echo $this->Config['mobile_url']; ?>" size="50" /></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>iPhone客户端</b>
        <br>
        如您网站已经拥有此客户端，请在右侧填写下载地址<br>
        <a href="http://cenwor.com/shop/brand.php?id=6" target=_blank><b style="color:red;">购买客户端商业授权，请点此</b></a>
        </td>
        <td><input type="text" name="config[iphone_download_url]" value="<?php echo $this->Config['iphone_download_url']; ?>" size="50" /></td>
    </tr>
    <tr class="altbg2">
        <td width="45%"><b>Android客户端</b>
        <br>
        如您网站已经拥有此客户端，请在右侧填写下载地址；<br>
        <a href="http://cenwor.com/shop/brand.php?id=6" target=_blank><b style="color:red;">购买客户端商业授权，请点此</b></a>
        </td>
        <td><input type="text" name="config[android_download_url]" value="<?php echo $this->Config['android_download_url']; ?>" size="50" /></td>
    </tr>
    <tr class="altbg1">
        <td width="45%"><b>手机短信</b><br>
        可实现短信发微博、有新微博接收通知、短信群发等
        </td>
        <td><a href="admin.php?mod=sms">请点击这里进行具体设置</a></td>
    </tr>
  </table>
<br>
<center><input type="submit" class="button"
    name="settingsubmit" value="提 交"></center>
<br>
</form>
<br>