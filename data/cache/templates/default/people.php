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
<script>
function ajax_category(list_type,id)
{    
    var ajax_url = '';
    ajax_url = "ajax.php?mod=validate&code=category";
    var post = {
        list_type:list_type,
        id:id
    };
    var myAjax=$.post(
    ajax_url,
    post,
    function(d){
        if(d){
            //alert(d);
            $('#validate_list').html(d);
        }
    });
    return false;
}
</script>
<div class="setframe">
<!--此处三栏-->
<?php if(MEMBER_ID ==0) { ?>
<div class="inventLine2"> 
  <div class="atxt">
    <p class="p_2">微博是现在最酷、最火的沟通交流工具，可以随时随地分享新鲜事，与朋友保持联络。</p> 
    <p class="p_3">10秒注册微博就可通过网页、手机、客户端随时随地分享新鲜事、关注所需的最新消息！</p>
  </div>
  <div class="abtn">
    <a href="index.php?mod=member&code&uid=<?php echo $member['uid']; ?>"><img src="templates/default/images/regbtn.gif"></a>
    <p>已有帐号，<a href="javascript:void(0);" onclick="ShowLoginDialog(); return false;">请点此登录</a></p>
  </div> 
</div>
<?php } ?>
<div class="W_main_l">
  <div class="left_nav">
    <h4>广场</h4>
<?php $new_class=('new'==$this->Code && $this->Get['type']!='pic')?"tago":"tagn"; ?>
<?php $pic_class=('new'==$this->Code && 'pic'==$this->Get['type'])?"tago":"tagn"; ?>
<?php $tc_class=('tc'==$this->Code)?"tago":"tagn"; ?>
<?php $newreply_class=('newreply'==$this->Code)?"tago":"tagn"; ?>
<?php $hotforward_class=('hotforward'==$this->Code)?"tago":"tagn"; ?>
<?php $hotreply_class=('hotreply'==$this->Code)?"tago":"tagn"; ?>
<?php $top_class=('top'==$this->Code)?"tago":"tagn"; ?>
<?php $tag_class=('tag'==$this->Code)?"tago":"tagn"; ?>
<?php $media_class=('media'==$this->Code || 'media_more'==$this->Code)?"tago":"tagn"; ?>
<?php $people_class=(in_array($this->Code,array('people','view','province','city')))?"tago":"tagn"; ?>
    <ul class="topic_New">    
    <li class="<?php echo $tc_class; ?> new_tc"><a href="index.php?mod=topic&code=tc">同城微博</a></li>
    <li class="<?php echo $new_class; ?> new_new"><a href="index.php?mod=topic&code=new">
<?php if($this->Config['only_show_vip_topic']) { ?>
最新V博
<?php } else { ?>最新微博
<?php } ?>
</a></li>
    <li class="<?php echo $pic_class; ?> new_photo"><a href="index.php?mod=topic&code=photo">图片墙</a></li>
    <li class="<?php echo $newreply_class; ?> new_newreply"><a href="index.php?mod=topic&code=newreply">最新评论</a></li>
    <li class="<?php echo $hotforward_class; ?> new_forword"><a href="index.php?mod=topic&code=hotforward">热门转发</a></li>
    <li class="<?php echo $hotreply_class; ?> new_hotreply"><a href="index.php?mod=topic&code=hotreply">热门评论</a></li>
    <li class="<?php echo $top_class; ?> new_top"><a href="index.php?mod=topic&code=top" title="查看和关注微博达人">达人榜</a></li>
    <li class="<?php echo $tag_class; ?> new_keyword"><a href="index.php?mod=tag" title="寻找和关注话题">话题榜</a></li>
    <li class="<?php echo $media_class; ?> new_media"><a href="index.php?mod=other&code=media" title="查看名人或媒体">媒体汇</a></li>
    <li class="<?php echo $people_class; ?> new_Masters"><a href="index.php?mod=people" title="查看名人堂">名人堂</a></li>
    </ul>
  </div>
</div>
<!--此处三栏-->
<div class="main3Box_m HotW ">
  <div class="Hotwarp eventB">
<?php if($member_list) { ?>
    <div class="people_l">
    <div class="main_t"><span>名人堂推荐用户</span></div>
    <div class="people_l_b"> 
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
            <li alt="<?php echo $val['vip_info']; ?>" title="<?php echo $val['vip_info']; ?>">
<?php if($val['uid'] != MEMBER_ID) { ?>
                <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/>
<?php } else { ?><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);"/>
<?php } ?>
<span class="nm"><?php echo $val['nickname']; ?></span>
            </li>
            <div id="user_<?php echo $val['uid']; ?>_user"></div>
<?php } } ?>
</div>
    </div>
<?php } ?>
<div id="ajaxcontent" class="people_l">
    <div class="main_t"><span>V认证用户微博</span></div>
<?php if(is_array($topics)) { foreach($topics as $val) { ?>
      <div class="indexrow" id="topic_list_<?php echo $val['tid']; ?>">
        <div class="feedCell" style="width:540px; overflow:hidden">
          <div class="avatar"><a href="index.php?mod=<?php echo $val['username']; ?>"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" /></a></div>
          <div class="Contant">
            <div class="oriTxt">
              <p><a title="<?php echo $val['username']; ?>" href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a><?php echo $val['validate_html']; ?>: <span><?php echo $val['content']; ?></span></p>
            </div>
            <div class="from"> 
            <div class="mycome">
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
</div>
            <span style="float:right;"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>"><?php echo $val['dateline']; ?></a></span>
            </div>
         </div>
        </div>
        <div class="mBlog_linedot" style="width:540px; overflow:hidden"></div>
      </div>
<?php } } ?>
</div>
    <div class="topL2">
      <div class="Tnav">
        <div class="Pname">人气排行榜</div>
      </div>
      <ul class="toplu">
<?php if(is_array($hot_members_list)) { foreach($hot_members_list as $val) { ?>
        <li>
          <div class="daren">
            <div class="daren2">  
<?php if($val['uid'] != MEMBER_ID) { ?>
                <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_r_users',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/>
<?php } else { ?><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);"/>
<?php } ?>
    </div>
            <div id="user_<?php echo $val['uid']; ?>_r_users" class="layS4"></div>
            <div class="daren3">
              <p><a target="_blank" href="index.php?mod=<?php echo $val['uid']; ?>"><?php echo $val['nickname']; ?></a> <?php echo $val['validate_html']; ?></p>
              <p><?php echo $val['province']; ?>&nbsp;<?php echo $val['city']; ?></p>
            </div>
          </div>
        </li>
<?php } } ?>
  </ul>
    </div>
</div>
<!--右侧-->
<div class="Hotright">
 <div class="peopleSide">
 <div class="eventBVip"><a title="取得认证，获得推荐" href="index.php?mod=other&code=vip_intro"><img src="templates/default/images/quare/btn_rf.gif"></a></div>
<?php if($category_list) { ?>
<?php if(is_array($category_list)) { foreach($category_list as $clist) { ?>
      <div class="rightBox_t"><a class="peopleSidea" href="javascript:viod(0);" onclick="ajax_category('category',<?php echo $clist['id']; ?>); return false;" ><?php echo $clist['category_name']; ?></a><span class="set_tag"></span></div>
<?php } } ?>
<?php } ?>
<div class="rightBox_t"><a class="peopleSidea" href="javascript:viod(0);" onclick="ajax_category('province'); return false;"  >按地区分类</a><span class="set_tag"></span></div>
    <div id="validate_list"></div>
  </div>
</div>
</div>
</div><script type="text/javascript" src="templates/default/js/jsgst.js?v=build+20120428"></script>
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