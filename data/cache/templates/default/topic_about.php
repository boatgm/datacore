<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $__my=$this->MemberHandler->MemberFields; ?>
<base href="<?php echo $this->Config['site_url']; ?>/" />
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $conf_charset; ?>" />
<title><?php echo $this->Title; ?> - <?php echo $this->Config['site_name']; ?>(<?php echo $this->Config['site_domain']; ?>)<?php echo $this->Config['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->MetaKeywords; ?>,<?php echo $this->Config['site_name']; ?><?php echo $this->Config['meta_keywords']; ?>" />
<meta name="Description" content="<?php echo $this->MetaDescription; ?>,<?php echo $this->Config['site_notice']; ?><?php echo $this->Config['meta_description']; ?>" />
<link rel="shortcut icon" href="templates/default/images/favicon.ico" >
<link href="templates/default/styles/main.css?v=build+20120428" rel="stylesheet" type="text/css" />
<?php if($this->Config['qun_theme_id']) { ?>
<link href="templates/default/qunstyles/<?php echo $this->Config['qun_theme_id']; ?>.css" rel="stylesheet" type="text/css" /><?php } elseif($this->Config['theme_id']) { ?><link href="theme/<?php echo $this->Config['theme_id']; ?>/theme.css?v=<?php echo SYS_BUILD; ?>" rel="stylesheet" type="text/css" />
<?php } ?>
<style type="text/css">
<?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>; }
<?php } ?>
<?php if($this->Config['theme_bg_color']) { ?>
body{ background-color:<?php echo $this->Config['theme_bg_color']; ?>; }
<?php } ?>
<?php if($this->Config['theme_bg_image']) { ?>
body{ background-image:url(<?php echo $this->Config['theme_bg_image']; ?>); }
<?php } ?>
<?php if($this->Config['theme_bg_position']) { ?>
body{ background-position:<?php echo $this->Config['theme_bg_position']; ?>; }
<?php } ?>
<?php if($this->Config['theme_bg_repeat']) { ?>
body{ background-repeat:<?php echo $this->Config['theme_bg_repeat']; ?>; }
<?php } ?>
<?php if($this->Config['theme_bg_fixed']) { ?>
body{ background-attachment:<?php echo $this->Config['theme_bg_fixed']; ?>; }
<?php } ?>
<?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>; }
<?php } ?>
<?php if($this->Config['theme_link_color']) { ?>
a:link{ color:<?php echo $this->Config['theme_link_color']; ?>; }
<?php } ?>
a.artZoom{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLink { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }
a.artZoom2{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
a.artZoom3{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLink3 { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }
a.artZoomAll{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLinkAll { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }
</style>
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
<script type="text/javascript">var __ALERT__='<?php echo $this->Config['verify_alert']; ?>';</script>
<script type="text/javascript" src="templates/default/js/min.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/common.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/topicManage.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/rotate.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/dialog.js?v=build+20120428" id="dialog_js"></script>
<script type="text/javascript" src="templates/default/js/lang.js?v=build+20120428"></script>
<script type="text/javascript" src="images/uploadify/jquery.uploadify.v2.1.4.min.js?v=build+20120428"></script>
<?php if(in_array($this->Code, array("follow","fans"))) { ?>
<script type="text/javascript" src="templates/default/js/relation.js?v=build+20120428"></script>
<?php } ?>
<?php if($this->Get['mod']=="vote") { ?>
<script type="text/javascript" src="templates/default/js/vote.js?v=build+20120428"></script>
<?php } ?>
<?php if($this->Get['mod']=="qun") { ?>
<script type="text/javascript" src="templates/default/js/qun.js?v=build+20120428"></script>
<?php } ?>
<!--[if IE 6]>
<script type="text/javascript" src="templates/default/js/DD_belatedPNG_0.0.8a-min.js?v=build+20120428" ></script>
<script type="text/javascript">DD_belatedPNG.fix('.header,.pweibo,.boxRNav2 li,.boxRNav2 li a');   </script>
<![endif]-->   
</head>
<?php echo $additional_str; ?>
<body>
<?php if(MEMBER_ID) { ?>
<?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
<?php $t_col_header ='t_col_header';  $t_col_logo ='t_col_logo'; $t_col_main='t_col_main'; $t_col_main_side='t_col_main_side'; $t_col_foot='t_col_foot'; $t_col_backTop='t_col_backTop'; $t_col_main_rn='t_col_main_rn'; $t_col_main_lb='t_col_main_lb'; $t_col_tagBox='t_col_tagBox';$bL_info_three='bL_info_three';  ?>
<?php } ?>
<?php if($member['open_extra'] and MEMBER_ID != $member['uid']) { ?>
<?php $t_col_header ='t_col_header';  $t_col_logo ='t_col_logo'; $t_col_main='t_col_main'; $t_col_main_side='t_col_main_side'; $t_col_foot='t_col_foot'; $t_col_backTop='t_col_backTop'; $t_col_main_rn='t_col_main_rn'; $t_col_main_lb='t_col_main_lb'; $t_col_tagBox='t_col_tagBox';$bL_info_three='bL_info_three';  ?>
<?php } ?>
<?php } ?>
<div class="header">
<div class="headerNav <?php echo $t_col_header; ?>">
    <ul class="hleft">
    <li class="logo2"><a href="index.php" title="<?php echo $this->Config['site_name']; ?>"></a></li>
<?php $navigation_config=ConfigHandler::get('navigation');global $rewriteHandler; ?>
<?php if(is_array($navigation_config['list'])) { foreach($navigation_config['list'] as $_v) { ?>
<?php if($_v['avaliable'] == 1) { ?>
        <script type="text/javascript">
        $(document).ready(function(){
            $(".t_c<?php echo $_v['code']; ?>").mouseover(function(){$(".t_c<?php echo $_v['code']; ?>_box").show();$(".t_c<?php echo $_v['code']; ?>").addClass("on");});
            $(".t_c<?php echo $_v['code']; ?>").mouseout(function(){$(".t_c<?php echo $_v['code']; ?>_box").hide();$(".t_c<?php echo $_v['code']; ?>").removeClass("on");});
            $(".t_c2").mouseover(function(){$(".t_c2_box").show();$(".t_c2").addClass("on");});
            $(".t_c2").mouseout(function(){$(".t_c2_box").hide();$(".t_c2").removeClass("on");});
            $(".t_c4").mouseover(function(){$(".t_c4_box").show();$(".t_c4").addClass("on");});
            $(".t_c4").mouseout(function(){$(".t_c4_box").hide();$(".t_c4").removeClass("on");});
            $(".t_c5").mouseover(function(){$(".t_c5_box").show();$(".t_c5").addClass("on");});
            $(".t_c5").mouseout(function(){$(".t_c5_box").hide();$(".t_c5").removeClass("on");});
            $(".t_c6").mouseover(function(){$(".t_c6_box").show();$(".t_c6").addClass("on");});
            $(".t_c6").mouseout(function(){$(".t_c6_box").hide();$(".t_c6").removeClass("on");});
        });
        </script>
<?php if($rewriteHandler)$_v['url']=$rewriteHandler->formatURL($_v['url']); ?>
<li class="t_c<?php echo $_v['code']; ?>"><a href="<?php echo $_v['url']; ?>" target="<?php echo $_v['target']; ?>" title="<?php echo $_v['name']; ?>"><?php echo $_v['name']; ?></a>
<?php if(!empty($_v['type_list'])  && $_v['avaliable'] == 1) { ?>
        <ul class="t_c1_box t_c<?php echo $_v['code']; ?>_box" style="display:none;">
<?php if(is_array($_v['type_list'])) { foreach($_v['type_list'] as $val) { ?>
<?php if($val['name']  && $val['avaliable'] == 1) { ?>
<?php if($rewriteHandler)$val['url']=$rewriteHandler->formatURL($val['url']); ?>
 <li><a href="<?php echo $val['url']; ?>" target="<?php echo $val['target']; ?>"><?php echo $val['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php if(!empty($navigation_config['pluginmenu']) && $_v['code'] == 'app') { ?>
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 1) { ?>
<?php if($rewriteHandler)$pmenu['url']=$rewriteHandler->formatURL($pmenu['url']); ?>
 <li><a href="<?php echo $pmenu['url']; ?>" target="<?php echo $pmenu['target']; ?>"><?php echo $pmenu['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php } } ?>
<?php } ?>
 </ul>
<?php } ?>
</li>
<?php } ?>
<?php } } ?>
<li class="sweibo">
        <div class="searchTool">
          <form method="get" action="#" name="headSearchForm" id="headSearchForm" onsubmit="return headDoSearch();">
            <input id="headSearchType" name="searchType" type="hidden" value="userSearch">
            <div class="selSearch">
              <div class="nowSearch" id="headSlected" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');">用户</div>
              <div class="btnSel"><a href="#" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');"></a></div>
              <div class="clear"></div>
              <ul class="selOption" id="headSel" style="display:none;">
                <li><a href="#" onclick="return search_show('head','userSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">用户</a></li>
                <li><a href="#" onclick="return search_show('head','tagSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">话题</a></li>
                <li><a href="#" onclick="return search_show('head','topicSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">微博</a></li>
<?php $vote_setting = ConfigHandler::get('vote'); ?>
<?php if($vote_setting['vote_open']) { ?>
                <li><a href="#" onclick="return search_show('head','voteSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">投票</a></li>
<?php } ?>
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
                <li><a href="#" onclick="return search_show('head','qunSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">微群</a></li>
<?php } ?>
  </ul>
            </div>
            <input class="txtSearch" id="headq" name="headSearchValue" type="text" value="请输入关键字" onfocus="this.value=''"/>
            <div class="btnSearch"> <a href="#" onclick="javascript:return headDoSearch();"><span class="lbl"></span></a></div>
          </form>
        </div>
        </li>
    </ul>
    <ul class="hright">
      <li class="pweibo" style="cursor:pointer;" onclick="showMainPublishBox();" title="发微博">发博
      <input type="hidden" name="check_PublishBox_uid" id="check_PublishBox_uid"  value="<?php echo MEMBER_ID; ?>"/>
      <input type="hidden" id="verify" name="verify" value="<?php echo $this->Config['verify']; ?>">
      </li>
<?php if(MEMBER_ID > 0) { ?>
      <li class="t_c4"><a href="index.php" title="<?php echo $this->Config['site_name']; ?>">我的首页</a>
        <ul class="t_c4_box">
<?php if($this->Config['qun_setting']['qun_open']) { ?>
          <li><a href="index.php?mod=topic&code=qun">我的微群
<?php if($__my['qun_new']>0) { ?>
<span>+<?php echo $__my['qun_new']; ?></span>
<?php } ?>
</a></li>
<?php } ?>
  <li><a href="index.php?mod=topic&code=tag">关注话题
<?php if($__my['topic_new']>0) { ?>
<span>+<?php echo $__my['topic_new']; ?></span>
<?php } ?>
</a></li>
<?php if($this->Config['dzbbs_enable'] || ($this->Config['phpwind_enable'] && $this->Config['pwbbs_enable'])) { ?>
          <li><a href="index.php?mod=topic&code=bbs">我的论坛</a></li>
<?php } ?>
<?php if(($this->Config['dedecms_enable'] == 1)) { ?>
          <li><a href="index.php?mod=topic&code=cms">我的资讯</a></li>
<?php } ?>
  <li><a href="index.php?mod=topic&code=recd">官方推荐</a></li>
          <li><a href="index.php?mod=topic&code=myfavorite">我的收藏</a></li>
        </ul>
      </li>
      <li class="t_c2"><a title="<?php echo MEMBER_NICKNAME; ?>" href="index.php?mod=<?php echo MEMBER_NAME; ?>"><?php echo MEMBER_NICKNAME; ?></a>
        <ul class="t_c2_box">
          <li><a href="index.php?mod=<?php echo MEMBER_NAME; ?>&type=hot_reply">被热评的</a></li>
          <li><a href="index.php?mod=<?php echo MEMBER_NAME; ?>&type=hot_forward">被热转的</a></li>
          <li><a href="index.php?mod=topic&code=myfavorite">我收藏的</a></li>
          <li><a href="index.php?mod=<?php echo MEMBER_NAME; ?>&type=my_verify">待审核的</a></li>
        </ul>
      </li>
      <li class="t_c6">消息
        <ul class="t_c6_box">
          <li><a href="index.php?mod=topic&code=mycomment">评论我的
<?php if($__my['comment_new']>0) { ?>
<span>+<?php echo $__my['comment_new']; ?></span>
<?php } ?>
</a></li>
          <li><a href="index.php?mod=topic&code=myat">@我的
<?php if($__my['at_new']>0) { ?>
<span>+<?php echo $__my['at_new']; ?></span>
<?php } ?>
</a></li>
          <li><a href="index.php?mod=pm&code=list">私信我的
<?php if($__my['newpm']>0) { ?>
<span>+<?php echo $__my['newpm']; ?></span>
<?php } ?>
</a></li>
          <li><a href="index.php?mod=<?php echo $__my['username']; ?>&code=fans">关注我的
<?php if($__my['fans_new']>0) { ?>
<span>+<?php echo $__my['fans_new']; ?></span>
<?php } ?>
</a></li>
          <li><a href="index.php?mod=topic&code=favoritemy">收藏我的
<?php if($__my['favoritemy_new']>0) { ?>
<span>+<?php echo $__my['favoritemy_new']; ?></span>
<?php } ?>
</a></li>
        </ul>
      </li>
      <li class="t_c5">帐号
      <ul class="t_c5_box">
      <li><a href="index.php?mod=settings">资料设置</a></li>
      <li><a href="index.php?mod=settings&code=face">修改头像</a></li>
      <li><a href="index.php?mod=settings&code=secret">修改密码</a></li>
      <li><a href="index.php?mod=account">账户绑定</a></li>
      <li><a href="index.php?mod=other&code=wap">手机</a></li>
      <li><a href="index.php?mod=skin">换肤</a></li>
      <li><a href="index.php?mod=profile&code=invite">邀请关注</a></li>
<?php if($params['code'] == 'myhome') { ?>
      <li>
      <span id="web_list_type_<?php echo MEMBER_ID; ?>">
      <input type="hidden" id="web_style" name="web_style" value="<?php echo MEMBER_STYLE_THREE_TOL; ?>"/>
<?php if (MEMBER_STYLE_THREE_TOL == 1) $ajax_list = 'right'; else $ajax_list = 'left'; ?>
  <a href="javascript:void(0);" title="推荐三栏，导航更清晰" onclick="web_list_type(<?php echo MEMBER_ID; ?>,'web_style','<?php echo $params['code']; ?>','<?php echo $ajax_list; ?>','<?php echo $member['uid']; ?>'); return false;">
<?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
换为两栏
<?php } else { ?>换为三栏
<?php } ?>
</a> 
      <input type="hidden" name='hid_type' id='hid_type' value='<?php echo $type; ?>'>
      </span>
      </li>     
<?php } ?>
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
      <li><a href="admin.php" target=_blank>后台管理</a></li>
<?php } ?>
  <li><a href="<?php echo $this->Config['site_url']; ?>/index.php?mod=login&code=logout" rel="nofollow">退出</a> </li>
      </ul>
      </li>
<?php } else { ?>  <li><a href="javascript:viod(0)" rel="nofollow" title="登录即可分享新鲜事" onclick="ShowLoginDialog(); return false;">快捷登录</a></li>
<?php } ?>
</ul>
  </div>
</div>
<div class="logow <?php echo $t_col_logo; ?>">
<?php if(MEMBER_ID>0) { ?>
<?php if($__my['comment_new']>0 || $__my['fans_new']>0 || $__my['at_new']>0 || $__my['newpm']>0 || $__my['favoritemy_new']>0 || $__my['vote_new']>0 || $__my['qun_new']>0 || $__my['event_new']>0 || $__my['topic_new']>0 || $__my['event_post_new']>0 || $__my['fenlei_post_new']>0) { ?>
<?php $__tagBoxStyle='display:block;visibility:visible;'; ?>
<?php } else { ?><?php $__tagBoxStyle='display:none;visibility:hidden;'; ?>
<?php } ?>
<!--#if NEDU#-->
<?php if(defined('NEDU_MOYO')) { ?>
<?php if(nlogic('notify')->ups_haved()) { ?>
<?php $__tagBoxStyle='display:block;visibility:visible;'; ?>
<?php } ?>
<?php } ?>
<!--#endif#-->
    <script type="text/javascript">
        function tagBox_close()
        {
            var obj = document.getElementById("tagBox_<?php echo MEMBER_ID; ?>");
            obj.style.visibility = "hidden";
        }
    </script>
    <div class="tagBox <?php echo $t_col_tagBox; ?>" id="tagBox_<?php echo MEMBER_ID; ?>" style="<?php echo $__tagBoxStyle; ?>">
        <div id="tagBoxContent_<?php echo MEMBER_ID; ?>">
        <ul>
<?php if($__my['newpm']>0) { ?>
          <li><a href="index.php?mod=pm&code=list"><?php echo $__my['newpm']; ?>条新私信，查看</a></li>
<?php } ?>
<?php if($__my['comment_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=mycomment"><?php echo $__my['comment_new']; ?>条新评论，查看</a></li>
<?php } ?>
<?php if($__my['fans_new']>0) { ?>
          <li><a href="index.php?mod=<?php echo $__my['username']; ?>&code=fans"><?php echo $__my['fans_new']; ?>人关注了我，查看</a></li>
<?php } ?>
<?php if($__my['at_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=myat"><?php echo $__my['at_new']; ?>人@提到我，查看</a></li>
<?php } ?>
<?php if($__my['favoritemy_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=favoritemy"><?php echo $__my['favoritemy_new']; ?>人收藏了我的，查看</a></li>
<?php } ?>
<?php if($__my['vote_new']>0) { ?>
          <li><a href="index.php?mod=<?php echo $__my['uid']; ?>&type=vote&filter=new_update">投票新增<?php echo $__my['vote_new']; ?>人参与，查看</a></li>
<?php } ?>
<?php if($__my['qun_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=qun">微群新增<?php echo $__my['qun_new']; ?>条内容，查看</a></li>
<?php } ?>
<?php if($__my['event_new']>0) { ?>
          <li><a href="index.php?mod=<?php echo $__my['uid']; ?>&type=event&filter=new_update">活动新增<?php echo $__my['event_new']; ?>人报名，查看</a></li>
<?php } ?>
<?php if($__my['topic_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=tag">话题新增<?php echo $__my['topic_new']; ?>条微博，查看</a></li>
<?php } ?>
<?php if($__my['event_post_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=other&view=event">新增<?php echo $__my['event_post_new']; ?>个关注的活动，查看</a></li>
<?php } ?>
<?php if($__my['fenlei_post_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=other&view=fenlei">新增<?php echo $__my['fenlei_post_new']; ?>个关注的分类信息，查看</a></li>
<?php } ?>
  <!--#if NEDU#-->
<?php if(defined('NEDU_MOYO')) { ?>
             <?php echo nlogic('notify')->ups_tips_html();; ?>  
<?php } ?>
  <!--#endif#-->
        </ul>
        </div>
        <div class="tagBox_del"><a href="javascript:tagBox_close();" title="关闭" javascript:void(0)><img src="templates/default/images/imgdel.gif" /></a></div>
    </div>
<?php } ?>
</div>
<div class="changeTheme"><a href="index.php?mod=skin" title="更换皮肤" javascript:void(0)></a></div>
<div class="main t_col_main">
<!--此处三栏-->
<div class="t_col_main_si t_col_main_side">
  <div class="t_col_main_fl">
    <div id="topic_index_left_ajax_list">
      <!--网站开启三栏后 显示左边  关于我的信息-->
<div class="t_col_main_ln <?php echo $t_col_main_lb; ?>">
<script type="text/javascript">
    $(document).ready(function(){
        $(".member_exp").mouseover(function(){$(".member_exp_c").show();});
        $(".member_exp").mouseout(function(){$(".member_exp_c").hide();});
        $("#m_avatar2").mouseover(function(){$(".avatar_tips").show();});
        $("#m_avatar2").mouseout(function(){$(".avatar_tips").hide();});
    });
</script>
<!--用户头像等信息-->
<?php if($my_member || $member) { ?>
<?php $_mymember = $my_member ? $my_member : $member ?>
<div class="sideBox" style="margin:0; padding:0;">
        <div class="avatar2" id="m_avatar2">
        <p class="avatar2_i"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['username']; ?>"><img src="<?php echo $_mymember['face_original']; ?>" alt="<?php echo $_mymember['nickname']; ?>" onerror="javascript:faceError(this);" /></a></p>
<?php if(MEMBER_ID == $_mymember['uid']) { ?>
<p class="avatar_tips"><a id="avatar_upload" href="index.php?mod=settings&code=face">上传头像</a></p>
<?php } ?>
</div>
        <div class="avatar2_info">
        <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="@<?php echo $_mymember['nickname']; ?>"><b><?php echo $_mymember['nickname']; ?></b></a><?php echo $_mymember['validate_html']; ?></p>
        <p>
<?php if($this->Config['level_radio']) { ?>
<?php if($this->Config['topic_level_radio']) { ?>
          <span class="wb_l_level" style="margin:0;">
            <a class="ico_level wbL<?php echo $_mymember['level']; ?>" title="点击查看微博等级"  href="index.php?mod=settings&code=exp" target="_blank"><?php echo $_mymember['level']; ?></a>
          </span>
<?php } ?>
<?php } ?>
<?php if($_mymember['credits']) { ?>
积分：<a title="点击查看我的积分" href="index.php?mod=settings&code=extcredits"><b><?php echo $_mymember['credits']; ?></b></a>
<?php } ?>
</p>
        <p style="width:132px; height:20px; overflow:hidden;">
<?php $member_signature = cut_str($_mymember['signature'],20); ?>
<?php if($_mymember['uid'] == MEMBER_ID ) { ?>
            <a href="javascript:viod(0);" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature'); return false;" >
            <span ectype="user_signature_ajax_left_<?php echo $_mymember['uid']; ?>">
                <span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
(<?php echo $member_signature; ?>)
<?php } else { ?>编辑个人签名
<?php } ?>
</span>
            </span>
            </a>
<?php } else { ?><span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
<?php if('admin' == MEMBER_ROLE_TYPE) { ?>
                <a href="javascript:void(0);" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature');" title="点击修改个人签名">
                <em ectype="user_signature_ajax_<?php echo $_mymember['uid']; ?>">(<?php echo $member_signature; ?>)</em>
                </a>
<?php } ?>
<?php } ?>
</span>
<?php } ?>
</p>
        <?php echo $this->hookall_temp['global_user_extra1']; ?>
        <?php echo $this->hookall_temp['global_user_extra2']; ?>
        <?php echo $this->hookall_temp['global_user_extra3']; ?>
        </div>
   </div>
    <div class="sideBox">
    <div class="user_atten">
        <div class="person_atten_l">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的"><?php echo $_mymember['follow_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的">关注</a> </p>
        </div>
        <div class="person_atten_l">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的"><?php echo $_mymember['fans_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的">粉丝</a> </p>
        </div>
        <div class="person_atten_r">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的微博"><?php echo $_mymember['topic_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的微博">微博</a> </p>
        </div>
     </div>
        <?php echo $this->hookall_temp['global_user_extra4']; ?>
    </div>
<?php } ?>
<!------用户头像等信息------->
<!------用户勋章信息------->
<script type="text/javascript">
$(document).ready(function(){
    $(".sina_weibo").mouseover(function(){$(".sina_weibo_c").show();});
    $(".sina_weibo").mouseout(function(){$(".sina_weibo_c").hide();});
    $(".qqwb").mouseover(function(){$(".qqwb_c").show();});
    $(".qqwb").mouseout(function(){$(".qqwb_c").hide();});
    $(".qqim").mouseover(function(){$(".qqim_c").show();});
    $(".qqim").mouseout(function(){$(".qqim_c").hide();});
    $(".tel").mouseover(function(){$(".tel_c").show();});
    $(".tel").mouseout(function(){$(".tel_c").hide();});
<?php if(is_array($medal_list)) { foreach($medal_list as $v) { ?>
        $(".medal_<?php echo $v['id']; ?>").mouseover(function(){$(".medal_c_<?php echo $v['id']; ?>").show();});
        $(".medal_<?php echo $v['id']; ?>").mouseout(function(){$(".medal_c_<?php echo $v['id']; ?>").hide();});
<?php } } ?>
});
</script>
<ul class="Vimg">
<?php if('tag'!=$this->Get['mod'] || $_mymember['style_three_tol'] == 1) { ?>
<?php if($this->Config['sina_enable'] && sina_weibo_init($this->Config)) { ?>
    <li class="sina_weibo">
<?php echo sina_weibo_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="sina_weibo_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/M_sina.gif"></div>
                    <div class="med_intro">
                        <p>新浪微博</p>
                         绑定后，可以使用新浪微博帐号进行登录，在本站发的微博可以同步发到新浪微博<br />
<?php $sina_return  = sina_weibo_has_bind($member['uid']); ?>
<?php if(!$sina_return) { ?>
                        <a href="index.php?mod=account&code=sina">绑定新浪微博</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>        
    </li>
<?php } ?>
<?php if($this->Config['qqwb_enable'] && qqwb_init($this->Config)) { ?>
    <li class="qqwb">
<?php echo qqwb_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="qqwb_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/qqwb.png"></div>
                    <div class="med_intro">
                        <p>腾讯微博</p>
                         绑定后，可以使用腾讯微博帐号进行登录，在本站发的微博可以同步发到腾讯微博<br />
<?php $qqwb_return  = qqwb_bind_icon($member['uid']); ?>
<?php if(!$qqwb_return) { ?>
                        <a href="index.php?mod=account&code=qqwb">绑定腾讯微博</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php if($this->Config['imjiqiren_enable'] && imjiqiren_init($this->Config)) { ?>
    <li class="qqim">
<?php echo imjiqiren_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="qqim_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/M_qq.gif"></div>
                    <div class="med_intro">
                    <p>QQ机器人</p>
                    用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知<br />
<?php $imjiqiren_return  = imjiqiren_has_bind($member['uid']); ?>
<?php if(!$imjiqiren_return) { ?>
                    <a href="index.php?mod=tools&code=imjiqiren">绑定QQ机器人</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php if($this->Config['sms_enable'] && sms_init($this->Config)) { ?>
    <li class="tel">
<?php echo sms_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="tel_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/Tel.gif"></div>
                    <div class="med_intro">
                    <p>手机短信</p>
                    用自己的手机发微博、通过手机签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知<br />
<?php $sms_return  = sms_has_bind($_mymember['uid']); ?>
<?php if(!$sms_return) { ?>
                    <a href="index.php?mod=other&code=sms">绑定手机短信</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php } ?>
<?php if($member['validate'] || $medal_list) { ?>
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
<?php $medal_type = unserialize($val['conditions']); ?>
<li class="medal_<?php echo $val['id']; ?>"><a href="index.php?mod=other&code=medal" target="_blank"><img src="<?php echo $val['medal_img']; ?>"/></a> &nbsp; 
        <div class="medal_c medal_c_<?php echo $val['id']; ?>">
            <div class="VM_box">
                <div class="VM_top">
                <div class="med_img"><img src="<?php echo $val['medal_img']; ?>"/></div>
                    <div class="med_intro">
                    <p><?php echo $val['medal_name']; ?></p>
                    <?php echo $val['medal_depict']; ?> <br />
<?php if(MEMBER_ID != $member['uid']) { ?>
(他于：<?php echo $val['dateline']; ?> 获得) <br />
<?php if($medal_type['type'] == 'topic') { ?>
                    <a href="index.php?mod=topic&code=myhome" target="_blank">我要发微博</a> |<?php } elseif($medal_type['type'] == 'reply') { ?><a href="index.php?mod=topic&code=new" target="_blank">我要发评论</a> |<?php } elseif($medal_type['type'] == 'tag') { ?><a href="index.php?mod=tag&code=<?php echo $medal_type['tagname']; ?>" target="_blank">我要发话题</a> |<?php } elseif($medal_type['type'] == 'invite') { ?><a href="index.php?mod=profile&code=invite" target="_blank">马上去邀请好友</a> |<?php } elseif($medal_type['type'] == 'shoudong') { ?>管理员手动发放  |    
<?php } ?>
<?php } else { ?>(我于：<?php echo $val['dateline']; ?> 获得) <br />
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } } ?>
<?php } ?>
<?php if($this->Config['yy_enable'] && yy_init($this->Config)) { ?>
    <li class="yy">
<?php echo yy_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['renren_enable'] && renren_init($this->Config)) { ?>
    <li class="renren">
<?php echo renren_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['kaixin_enable'] && kaixin_init($this->Config)) { ?>
    <li class="kaixin">
<?php echo kaixin_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['fjau_enable'] && fjau_init($this->Config)) { ?>
    <li class="fjau">
<?php echo fjau_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
</ul>   
<?php if(MEMBER_ID == $_mymember['uid'] ) { ?>
      <div class="blackBox"></div>
      <ul class="boxRNav2">
<?php if(in_array($this->Code,array('myhome','tag','groupview','qun','cms','bbs','recd'))) $current_myhome = 'current' ?>
<?php if('myat'== $this->Code) $current_myat = 'current' ?>
<?php if('mycomment'== $this->Code) $current_mycomment = 'current' ?>
<?php if('myfavorite'== $this->Code) $current_myfavorite = 'current' ?>
        <li class="index <?php echo $current_myhome; ?>"> 
          <a href="index.php?mod=topic&code=myhome" hidefocus="true" title="我的首页">我的首页</a>
        </li>
        <li class="about <?php echo $current_myat; ?>"> 
          <a href="index.php?mod=topic&code=myat" hidefocus="true" title="提到我的">提到我的</a>
        </li>
        <li class="letter <?php echo $current_mycomment; ?>"> 
          <a href="index.php?mod=topic&code=mycomment" hidefocus="true" title="评论我的">评论我的</a>
        </li>
        <li class="myfav <?php echo $current_myfavorite; ?>"> 
          <a href="index.php?mod=topic&code=myfavorite" hidefocus="true" title="我的收藏">我的收藏</a>
        </li>
      </ul>
<?php } ?>
      <div class="blackBox"></div>
        <ul class="boxRNav2">
<?php if(MEMBER_ID == $_mymember['uid']) $_my = '我'; elseif(1==$_mymember['gender']) $_my = '他';else $_my = '她'; ?>
<?php if('myblog'== $params['code'] && !$type) $current_myblog = 'current' ?>
<?php if('myblog'== $params['code'] && 'pic' == $type) $current_pic = 'current' ?>
<?php if('myblog'== $params['code'] && 'video' == $type) $current_video = 'current' ?>
<?php if('myblog'== $params['code'] && 'music' == $type) $current_music = 'current' ?>
<?php if('myblog'== $params['code'] && 'attach' == $type) $current_attach = 'current' ?>
<?php if('myblog'== $params['code'] && 'my_reply' == $type) $current_my_reply = 'current' ?>
<?php if('myblog'== $params['code'] && 'vote' == $type) $current_vote = 'current' ?>
<?php if('myblog'== $params['code'] && 'event' == $type) $current_event = 'current' ?>
<li class="mypub <?php echo $current_myblog; ?>"> 
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>" hidefocus="true" title="<?php echo $_my; ?>的微博"><?php echo $_my; ?>的微博</a>
        </li>
        <li class="mycomment <?php echo $current_my_reply; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=my_reply" hidefocus="true" title="<?php echo $_my; ?>的图片"><?php echo $_my; ?>的评论</a>
        </li>
        <li class="mypic <?php echo $current_pic; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=pic" hidefocus="true" title="<?php echo $_my; ?>的图片"><?php echo $_my; ?>的图片</a>
        </li>
        <li class="myvoid <?php echo $current_video; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=video" hidefocus="true" title="<?php echo $_my; ?>的视频"><?php echo $_my; ?>的视频</a>
        </li>
        <li class="mymusic <?php echo $current_music; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=music" hidefocus="true" title="<?php echo $_my; ?>的音乐"><?php echo $_my; ?>的音乐</a>
        </li>
        <li class="myatt <?php echo $current_attach; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=attach" hidefocus="true" title="<?php echo $_my; ?>的附件"><?php echo $_my; ?>的附件</a>
        </li>
<?php if($this->Config['vote_open']) { ?>
        <li class="myvote <?php echo $current_vote; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=vote" hidefocus="true" title="<?php echo $_my; ?>的投票"><?php echo $_my; ?>的投票</a>
        </li>
<?php } ?>
<?php if($this->Config['event_open']) { ?>
        <li class="myact <?php echo $current_event; ?>">
           <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=event" hidefocus="true" title="<?php echo $_my; ?>的活动"><?php echo $_my; ?>的活动</a>
        </li>
<?php } ?>
<?php $navigation_config=ConfigHandler::get('navigation') ?>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 3) { ?>
<?php if('topic'==$this->require) { ?>
          <li class="mypub current">
<?php } else { ?>  <li class="mypub">
<?php } ?>
  <a href="<?php echo $pmenu['url']; ?>&require=topic" hidefocus="true" title="<?php echo $pmenu['name']; ?>"><?php echo $pmenu['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php } } ?>
<?php } ?>
      </ul>
      <div class="blackBox2"></div>
</div>
    </div>
  </div>
</div>
<!--此处三栏-->
<div style="width:800px; float:left">
  <div class="main_t" style="float:left; margin:5px 0 5px 22px;"><span><?php echo $this->Title; ?></span></div>
  <div class="A_box">
    <div class="A_boxl">
      <div class="Listmain">
        <div class="feedCell" style="padding-top:0;">
          <div>
<?php if('about'==$this->
            Code) { ?>
            <?php echo $this->InfoConfig['about']; ?>
            <?php } elseif('contact'==$this->
            Code) { ?>            <?php echo $this->InfoConfig['contact']; ?>
<?php } else { ?>            <?php echo $this->InfoConfig['joins']; ?>
<?php } ?>
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
            <div class="tagg4 atgg">
            本行信息仅管理员可见：
            上述内容可在<a href="admin.php?mod=web_info" target=_blank>后台：全局设置：关于我们等</a>中修改
            </div>
<?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="A_boxr">
      <ul class="A_boxrl">
        <li><a href="index.php?mod=other&code=about">关于我们</a></li>
        <li><a href="index.php?mod=other&code=contact">联系我们</a></li>
        <li><a href="index.php?mod=other&code=joins">加入我们</a></li>
        <li><a href="index.php?mod=tag&code=意见反馈">意见反馈</a></li>
      </ul>
    </div>
  </div>
</div></div><script type="text/javascript" src="templates/default/js/jsgst.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/jsgst_autocomplete.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/ai.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/combobox.js?v=build+20120428"></script>
<!-- JS消息提示层 show_message('发布成功') -->
<div id="show_message_area"></div>
<?php echo $this->js_show_msg(); ?>
<?php echo $GLOBALS['schedule_html']; ?>
<?php if($GLOBALS['jsg_schedule_mark'] || jsg_getcookie('jsg_schedule')) echo jsg_schedule(); ?>
<!-- Ajax端内容返回 -->
<div id="ajax_output_area"></div>
<?php if(MEMBER_ID ==0) { ?>
<style type="text/css">
.bottomLinks{width:930px;}
.bottomLinks .bL_info{width:180px;}
</style>
<?php } ?>
<div class="bottomLinks_R">
<div class="bottomLinks <?php echo $t_col_foot; ?> bottomLinks_reg">
<div class="bL_List">
<div class="bL_info bL_io1 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">找感兴趣的人</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=people">名人堂</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=media">媒体汇</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=topic&code=top">排行榜</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=profile&code=maybe_friend" rel="nofollow">猜你喜欢的</a></li>
        </ul>
    </div>
    <div class="bL_info bL_io2 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">精彩内容</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=live">微直播</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=talk">微访谈</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=topic&code=new">最新微博</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=topic&code=recd">官方推荐</a></li>
        </ul>
    </div>
    <div class="bL_info bL_io3 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">热门应用</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=show&code=show">微博秀</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=topic&code=photo">图片墙</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=wall&code=control">上墙</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=tools&code=qmd">图片签名档</a></li>
        </ul>
    </div>
    <div class="bL_info bL_io4 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">手机舆情</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=wap">WAP访问</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=mobile" target=_blank>3G网页</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=android">android客户端</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=iphone">iphone客户端</a></li>
        </ul>
    </div>
    <div class="bL_info bL_io5 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">关于我们</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=contact">联系我们</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=vip_intro">申请V认证</a></li>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 2) { ?>
            <li><a href="<?php echo $pmenu['url']; ?>" target="<?php echo $pmenu['target']; ?>"><?php echo $pmenu['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php } } ?>
<?php } ?>
<li><?php echo $this->Config['tongji']; ?></li>
            <li class="MIB_linkar">
                <a href="http://www.miibeian.gov.cn/" target="_blank" title="网站备案" rel="nofollow"><?php echo $this->Config['icp']; ?></a></li>
            <!-- <li class="MIB_linkar">
                <a href="index.php?mod=other&code=notice" target="_blank" title="网站公告" rel="nofollow">网站公告</a></li> -->
            <li class="MIB_linkar">
<?php $__server_execute_time = round(microtime(true) - $GLOBALS['_J']['time_start'], 5) . " Second "; ?>
<?php $__gzip_tips = ((defined('GZIP') && GZIP) ? "&nbsp;Gzip Enable." : "Gzip Disable."); ?>
<span title="<?php echo $__server_execute_time; ?>,<?php echo $__gzip_tips; ?>">网页执行信息</span>
                <?php echo upsCtrl()->Comlic(); ?></li>
            <li></li>
        </ul>
    </div>
</div>
</div></div>
<script type="text/javascript">
$(document).ready(function(){
$('.goTop').click(function(e){
e.stopPropagation();
$('html, body').animate({scrollTop: 0},300);
backTop();
return false;
});
});
</script>
<div id="backtop" class="backTop"><a href="/#" class="goTop" title="返回顶部"></a></div>
<script type="text/javascript">
window.onscroll=backTop;
function backTop(){
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollTop==0){
   document.getElementById('backtop').style.display="none";
   }else{
   document.getElementById('backtop').style.display="block";
    }
  }
backTop();
</script>
</body>
</html>
<?php echo $GLOBALS['iframe']; ?>