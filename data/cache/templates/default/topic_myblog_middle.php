<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><div class="mainL">
<?php $__my_link_='index.php?mod='.$member['username'];$__my_link_=get_invite_url($__my_link_,$this->Config['site_url']); ?>
<div class="member_list_top">
       <div class="left_user_info">
          <div class="avatar2_info">
          <style type="text/css">
          .member_list_top p.left_t_nick_name{ width:540px;}
          .member_list_top p.left_t2{ width:540px;}
          .add_mail, .blacklist, .dialogue{ padding:30px 0 5px;}
          </style>
             <p class="left_t_nick_name">
             <strong title="<?php echo $member['nickname']; ?>"><?php echo $member['nickname']; ?><?php echo $member['validate_html']; ?> </strong>
             <a href="javascript:void(0)" onclick="follower_choose(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>','at','');">(@<?php echo $member['nickname']; ?>)</a>
              <!--备注-->
              <span id="remarklist_<?php echo $member['uid']; ?>"><?php echo $buddys['remark']; ?></span>
              <!--备注-->
<?php if($member['gender'] == 1) { ?>
              <img src="templates/default/images/user.gif"  title="男"/>
<?php } else { ?>  <img src="templates/default/images/user_female.gif"  title="女"/>
<?php } ?>
              </p>
             <p class="left_t2"><a href="index.php?mod=<?php echo $member['username']; ?>"><?php echo $__my_link_; ?></a></p>
<?php if($member['invite_uid']) { ?>
            <p class="left_t2">推荐人：
<?php $_invite_member=jsg_member_info($member['invite_uid']); ?>
<a href="index.php?mod=<?php echo $_invite_member['username']; ?>"><span title="推荐人：<?php echo $_invite_member['nickname']; ?>"><?php echo $_invite_member['nickname']; ?></span></a></p>
<?php } ?>
<!-- 关注 拉黑 等操作选项-->
<?php if(MEMBER_ID && MEMBER_ID!=$member['uid']) { ?>
                <div id="topic_index_blacklist_<?php echo $member['uid']; ?>">
<?php if($member['uid'] == $list_blacklist['touid']) { ?>
                        <div class="blacklist">
                            他在你的黑名单里 <a href="javascript:void(0)" onclick="follower_choose(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>','del','topic_black_ajax');"> [取消拉黑] </a>
                        </div>
<?php } else { ?><div class="dialogue">
                         <?php echo $member['follow_html']; ?>
                         <span>
                             | <a href="javascript:void(0)" onclick="follower_choose(<?php echo $member['uid']; ?>,'','lahei','topic_black_ajax');">拉黑</a> |
                         <!--判断是否是好友-->
<?php if($buddys) { ?>
                             <a href="javascript:void(0)" onclick="get_group_choose(<?php echo $member['uid']; ?>);">分组</a> |
                             <a href="javascript:void(0)" onclick="get_remark(<?php echo $member['uid']; ?>);return false;">备注</a> |
                             <a href="javascript:void(0)" onclick="follower_choose(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>','buddys','');">推荐给朋友</a> |
<?php } ?>
                             <a href="javascript:void(0)" onclick="PmSend(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>');return false;" >私信</a>
                         <!--判断是否是好友-->
                         </span>
<?php if(MEMBER_ID>0 && 'admin'==MEMBER_ROLE_TYPE && MEMBER_ID!=$member['uid']) { ?>
                <div style="float:right;">
                  <!--<a href="index.php?mod=member&code=delete&id=<?php echo $member['uid']; ?>" onclick="return confirm('确认删除该用户？');"><font color="red">删除该用户</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;-->
                  <a href="admin.php?mod=member&code=dosearch&uid=<?php echo $member['uid']; ?>" target="_blank"><font color="red">删除该用户</font></a>&nbsp;|&nbsp;
                  <a href="javascript:void(0);" onclick="force_out(<?php echo $member['uid']; ?>);"><font color="red">封杀</font></a>&nbsp;|&nbsp;
                  <a href="javascript:void(0);" onclick="force_ip('<?php echo $member['lastip']; ?>');"><font color="red">封IP</font></a>
                </div>
<?php } ?>
                        </div>
                        <div id="Pmsend_to_user_area"></div>
                        <div id="alert_follower_menu_<?php echo $member['uid']; ?>"></div>
                        <span id="button_<?php echo $member['uid']; ?>" onclick="get_group_choose(<?php echo $member['uid']; ?>);"></span>
                        <div id="global_select_<?php echo $member['uid']; ?>" class="alertBox" style="display:none"></div>
                        <div id="get_remark_<?php echo $member['uid']; ?>" ></div>
<?php } ?>
</div> 
<?php } ?>
            <?php echo $this->hookall_temp['global_usernav_extra1']; ?>
            </div>
       </div>
    </div>
<div style="width:540px; margin:0 auto 8px; overflow:hidden">
<script language="Javascript">
function listTopic( s , lh ) {    
    var s = 'undefined' == typeof(s) ? 0 : s;
    var lh = 'undefined' == typeof(lh) ? 1 : lh;
    if(lh) {
        window.location.hash="#listTopicArea";
    }
    $("#listTopicMsgArea").html("<div><center><span class='loading'>内容正在加载中，请稍候……</span></center></div>");
    var myAjax = $.post(
        "ajax.php?mod=topic&code=list",
        {
<?php if(is_array($params)) { foreach($params as $k => $v) { ?>
<?php echo $k; ?>:"<?php echo $v; ?>",
<?php } } ?>
start:s
        },
        function (d) {
            $("#listTopicMsgArea").html('');
            $("#listTopicArea").html(d);            
        }
    ); 
}
</script>
</div>
 <div class="listBox">
<?php if($img_arr) { ?>
    <div class="listBoxNav">
      <li style="float:left; font-weight:600; color:#333;">&nbsp;个人最新图片</li>
      <ul class="imglist" style="width:540px; overflow:hidden;">
<?php if(is_array($img_arr)) { foreach($img_arr as $val) { ?>
        <li id="<?php echo $val['id']; ?>"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>"><img src="<?php echo $val['image_small']; ?>" width="76px" height="76px"></a></li>
<?php } } ?>
  </ul>
    </div>
<?php } ?>
  <div class="listBoxNav">
       <div class="nleftL3">
<?php if(MEMBER_ID == $member['uid']) $_my = '我'; elseif(1==$member['gender']) $_my = '他';else $_my = '她'; ?>
<?php if('my_reply' == $type) { ?>
        <li>
<?php if(MEMBER_ID == $member['uid']) { ?>
<span><a href="index.php?mod=topic&code=mycomment">评论我的</a></span>
<?php } ?>
    <span class="current"><a href="index.php?mod=<?php echo $member['username']; ?>&type=my_reply"><?php echo $_my; ?>评论的</a></span></li> 
        <?php } elseif('pic' == $type) { ?><?php } elseif('video' == $type) { ?><!--<li style="float:left;">
        <span class="<?php echo $video; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=video"><?php echo $_my; ?>的视频 </a></span>&nbsp;|&nbsp;
        <span class="<?php echo $follow_video; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=video&follow=1"><?php echo $_my; ?>关注人的视频</a></span></li>--><?php } elseif('music' == $type) { ?>   
<?php if($this->Get['follow']) $follow_music = "current2"; else $music = "current" ?>
<li>
        <span class="<?php echo $music; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=music"><?php echo $_my; ?>的音乐 </a></span>
        <span class="<?php echo $follow_music; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=music&follow=1"><?php echo $_my; ?>关注人的音乐</a></span></li> <?php } elseif('attach' == $type) { ?>   
<?php if($this->Get['follow']) $follow_attach = "current2"; else $attach = "current" ?>
<li>
        <span class="<?php echo $attach; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=attach"><?php echo $_my; ?>的附件 </a></span>
        <span class="<?php echo $follow_attach; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=attach&follow=1"><?php echo $_my; ?>关注人的附件</a></span></li> 
<?php } else { ?><li>
<?php if('my_reply' == $this->Get['type']) $reply = 'current';
        elseif('my_verify' == $this->Get['type']) $verify = 'current';
        elseif('hot_reply' == $this->Get['type']) $hot_reply = 'current';
        elseif('hot_forward' == $this->Get['type']) $hot_forward = 'current';
        else $main_class = 'current'; ?>
<span class="<?php echo $main_class; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>"><?php echo $_my; ?>的微博</a></span>
        <span class="<?php echo $hot_reply; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=hot_reply">本月热评</a></span>
        <span class="<?php echo $hot_forward; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=hot_forward">本月热转</a></span>
        <span class="<?php echo $verify; ?>"><a href="index.php?mod=<?php echo $member['username']; ?>&type=my_verify">等待审核</a></span>
        </li>
<?php } ?>
<?php echo $this->hookall_temp['global_index_extra2']; ?>
       </div>
       </div>
     <div id="ajax_reminded"></div>
     <div id="listTopicMsgArea"></div>
      <div id="listTopicArea">
          <!--微博列表 Begin--><div class="Listmain">
    <div class="mBlog_linedot"></div>
<?php if($topic_list) { ?>
<?php if('favoritemy'==$this->Code) { ?>
                <!--收藏我的列表 Begin-->
<?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?>
<?php $counts++; ?>
<script type="text/javascript">
                        $(document).ready(function(){
                            var objStr = "#topic_lists_<?php echo $val['tid']; ?>";
                            $(objStr).mouseover(function(){$(objStr + " i").show();});
                            $(objStr).mouseout(function(){$(objStr + " i").hide();});
                        });
                    </script>
                    <div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>"><div class="avatar">
    <a href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>">
        <img onerror="javascript:faceError(this);" src="<?php echo $favorite_members[$val['fuid']]['face']; ?>" />
    </a>
</div>
<div class="Contant">
    <div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden;">
        <div class="oriTxt">
            <p>
                <a title="<?php echo $val['username']; ?>" href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>">                                                 <?php echo $favorite_members[$val['fuid']]['nickname']; ?>
                </a>
                <?php echo $favorite_members[$val['fuid']]['validate_html']; ?>：
                <span style="color:#666; font-size:12px;">收藏于<?php echo $val['favorite_time']; ?></span>
            </p>
            <span>
            <a href="index.php?mod=<?php echo $val['username']; ?>">
              <?php echo $val['nickname']; ?>
            </a><?php echo $val['validate_html']; ?>:<?php echo $val['content']; ?>
            </span>
<?php if($val['attachid'] && $val['attach_list']) { ?>
<?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>">
<?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?>
    <li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" />
    <div class="attachList_att">
    <p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
    &nbsp;（<?php echo $iv['attach_size']; ?>）</p>
    <p class="attachList_att_doc"><a href="javascript:void(0);"
        onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>
    </div>
    </li>
<?php } } ?>
</ul>
<?php } ?>
<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $val['image_key']; ?>">
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
    <li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
        rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $val['image_key']; ?>"><img
        src="<?php echo $iv['image_small']; ?>" /></a>
    <div class="artZoomBox" style="display: none;">
    <div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
        title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
        href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
    <a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img
     src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
    </li>
<?php } } ?>
</ul>
<?php } ?>
<!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->
<!--投票 Begin-->
<?php if($val['is_vote'] > 0) { ?>
<?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>">
    <li><a href="javascript:;"
        onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img
        src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $val['vote_key']; ?>" style="display: none;">
<div class="blogTxt">
<div class="top"></div>
<div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"></div>
<div class="bottom"></div>
</div>
</div>
<?php } ?>
<!--投票 End-->
<?php if($val['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo"><a
    onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');">
<div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img
    src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $val['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>
<?php if($val['musicid']) { ?>
<?php if($val['xiami_id']) { ?>
<div class="feedUserImg"><embed width="257" height="33"
    wmode="transparent" type="application/x-shockwave-flash"
    src="http://www.xiami.com/widget/0_<?php echo $val['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $val['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐"
    onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');"
    style="cursor: pointer; border: none;" /></div>
<?php } ?>
<?php } ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script>
<?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?>
<?php if(('mycomment'==$this->Code || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?>
<p class="feedP">回复{<a
    href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>"><?php echo $parent_list[$pid]['nickname']; ?>：</a><span><?php echo $parent_list[$pid]['content']; ?></span>}</p>
<?php } ?>
<?php if(!$topic_view) { ?>
<?php $pt=$parent_list[$tpid]; ?>
<div class="blogTxt">
<div class="top"></div>
<div class="mid">
<?php if($pt) { ?>
 <span> <a
    href="index.php?mod=<?php echo $pt['username']; ?>"
    onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);"
    onmouseout="clear_user_choose();"> <?php echo $pt['nickname']; ?> </a>
<?php echo $pt['validate_html']; ?> : <!--悬浮头像、弹出对话框--> <span
    id="user_<?php echo $val['tid']; ?>_reply_user"></span> <!--悬浮头像、弹出对话框--> </span> 
<?php $TPT_ = $TPT_ ? $TPT_ : 'TPT_'; ?>
<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"><?php echo $pt['content']; ?></span> <span
    id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span> 
<?php if($pt['longtextid'] > 0) { ?>
<span> <a href="javascript:;"
    onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', this, '<?php echo $TPT_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a>
</span> 
<?php } ?>
<?php if($pt['attachid'] && $pt['attach_list']) { ?>
<table class="attachst" style="width:440px;">
<?php if(is_array($pt['attach_list'])) { foreach($pt['attach_list'] as $iv) { ?>
    <tr>
        <td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td>
        <td class="attachst_att">
        <p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
        <p class="attachList_att_doc"><a href="javascript:void(0);"
        onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>
        </td>
    </tr>
<?php } } ?>
</table>
<?php } ?>
<?php if($pt['imageid'] && $pt['image_list']) { ?>
<?php $pt['image_key']=$pt['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $pt['image_key']; ?>">
<?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?>
    <li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
        rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $pt['image_key']; ?>"><img
        src="<?php echo $iv['image_small']; ?>" /></a>
    <div class="artZoomBox" style="display:none;">
    <div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
        title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
        href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
    <a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
    </li>
<?php } } ?>
</ul>
<?php } ?>
 <!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->
<!--投票 Begin--> 
<?php if($pt['is_vote'] > 0) { ?>
<?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>">
<li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $__vote_key; ?>" style="display: none;">
<div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div>
</div>
<?php } ?>
 <!--投票 End--> 
<?php if($pt['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo">
<a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');">
<div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $pt['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>
<?php if($pt['musicid']) { ?>
<?php if($pt['xiami_id']) { ?>
<div class="feedUserImg">
<embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $pt['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $pt['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div>
<?php } ?>
<?php } ?>
<div style="width:400px; float:left; padding:5px 0; margin:0;">
<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
<a onclick="get_forward_choose(<?php echo $tpid; ?>);return false;"href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;
<?php echo $pt['from_html']; ?></div>
<?php } else { ?> 
<?php $val['reply_disable']=0; ?>
<p><span>原始微博已删除</span></p>
<?php } ?>
</div>
<div class="bottom"></div>
</div>
<?php } ?>
<?php } ?>
        </div>
        <div class="from">
            <span class="option"></span> 
            <span class="mycome"></span> 
        </div>
    </div>
    <div id="reply_area_<?php echo $val['tid']; ?>"></div>
    <!--编辑微博-->
    <div id="modify_topic_<?php echo $val['tid']; ?>"></div>
    <!--编辑微博-->
</div>
<div class="mBlog_linedot"></div>    
                    </div>
<?php } } ?>
          <!--收藏我的列表 End-->
<?php } else { ?>      <!--微博列表 Begin-->
<?php if($this->Code=='bbs' || $this->Code=='cms') { ?>
                    <script type="text/javascript">
                    function item_longtext(pidval){
                    var full_id = 'c_' + pidval + '_full';
                    var short_id = 'c_' + pidval + '_short';
                    var link_id = 'linktext_' + pidval;
                    if (document.getElementById(full_id).style.display == 'none'){
                    document.getElementById(full_id).style.display = 'block';
                    document.getElementById(short_id).style.display = 'none';
                    document.getElementById(link_id).innerHTML = '收起全文';
                    }else{
                    document.getElementById(full_id).style.display = 'none';
                    document.getElementById(short_id).style.display = 'block';
                    document.getElementById(link_id).innerHTML = '查看全文';
                    }
                    }
                    </script>
<?php } ?>
<?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?>
<?php $counts++; ?>
<div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>">
<?php if($this->Config['ad_enable']) { ?>
<?php if($counts == 3 && $this->Config['ad']['ad_list']['group_myhome']['middle_center']) { ?>
                            <div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_center']; ?></div>
<?php } ?>
<?php if($counts == 10 && $this->Config['ad']['ad_list']['group_myhome']['middle_center1']) { ?>
                            <div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_center1']; ?></div>
<?php } ?>
<?php } ?>
<?php if($this->Code=='bbs') { ?>
<?php if($val['uid']) { ?>
<div class="wb_l_face">
<div class="avatar">
<?php if($this->Code != '') { ?>
<?php if(MEMBER_ID != $val['uid']) { ?>
    <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();">
        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    </a>
<?php } else { ?>        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
<?php } ?>
<?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } ?>
<?php if($this->Config['is_topic_user_follow']) { ?>
<?php echo $val['follow_html']; ?>
<?php } ?>
</div>
<?php if($val['user_css']) { ?>
<p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p>
<?php } ?>
</div>
<!--悬浮头像、弹出对话框-->
<div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div>
<!--悬浮头像、弹出对话框-->
<!--私信对话框-->
<div id="Pmsend_to_user_area" style="width:430px;" style="display:none"></div>
<!--私信对话框-->
<!--AT、拉黑对话框-->
<div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--AT、拉黑对话框-->
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div>
<!--分组对话框-->
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div>
<!--分组对话框-->
<!--备注对话框-->
<div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--备注对话框-->
<!--微博内容中 @用户 悬浮提示-->
<div id="at_<?php echo $val['tid']; ?>_user" class="at_style" style="display:none;"></div>
<!--微博内容中 @用户 悬浮提示-->
<?php } else { ?><div class="wb_l_face"><div class="avatar"><img src="<?php echo $val['face']; ?>" title="未在微博登录的论坛用户" onerror="javascript:faceError(this);" /></div></div>
<?php } ?>
<div class="Contant">
    <div style="_overflow:hidden">
        <div class="oriTxt">
            <p class="utitle">
<?php if($val['uid']) { ?>
<span class="un">
<a title="查看<?php echo $val['nickname']; ?>的微博" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a class="ico_level wbL<?php echo $val['level']; ?>" title="点击查看微博等级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>
<?php } else { ?><span class="un"><a title="未在微博登录的论坛用户" href="javascript:;" ><?php echo $val['nickname']; ?></a></span>
<?php } ?>
<span class="ut"><a href="<?php echo $val['bbsurl']; ?>" target="_blank"><?php echo $val['dateline']; ?></a></span>
            </p>
<?php if($val['title']) { ?>
            <p><b><?php echo $val['title']; ?></b></p>
<?php } ?>
<span id="c_<?php echo $val['pid']; ?>_short"><?php echo $val['content']; ?></span>
            <span id="c_<?php echo $val['pid']; ?>_full" style="display:none;"><?php echo $val['content_full']; ?></span>
<?php if($val['longtext']) { ?>
                <span>
                <a id="linktext_<?php echo $val['pid']; ?>" href="javascript:;" onclick="item_longtext('<?php echo $val['pid']; ?>');return false;">查看全文</a>
                </span>
<?php } ?>
<?php if($val['first'] == 0) { ?>
            <div class="blogTxt">
                <div class="top"></div>
                <div class="mid">
<?php if($val['tuid']) { ?>
                    <span>
                    <a href="index.php?mod=<?php echo $val['t_username']; ?>" onmouseover="get_user_choose(<?php echo $val['tuid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();"><?php echo $val['t_nickname']; ?></a><?php echo $val['t_validate_html']; ?> : 
                    <!--悬浮头像、弹出对话框-->
                    <span id="user_<?php echo $val['tid']; ?>_reply_user"></span>
                    <!--悬浮头像、弹出对话框-->
                    </span>
<?php } else { ?><span><a title="未在微博登录的论坛用户" href="javascript:;"><?php echo $val['t_nickname']; ?></a>: </span>
<?php } ?>
<span><?php echo $val['t_title']; ?></span>
                    <div>发布于：<?php echo $val['t_dateline']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $val['bbsurl']; ?>" target="_blank">回帖(<?php echo $val['replys']; ?>)</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $val['lasturl']; ?>" target="_blank"><?php echo $val['lastpost']; ?></a></div>
                </div>
                <div class="bottom"></div>
            </div>
            <div class="from"><div class="option"><ul><li></li></ul></div><div class="mycome">来自<a href="<?php echo $val['forumurl']; ?>" target="_blank">论坛 - <?php echo $val['forumtitle']; ?></a></div></div>
<?php } else { ?><div class="from"><div class="option"><ul><li><span>
<?php if($val['replys']) { ?>
            <a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" onclick="replyTopic(<?php echo $val['rid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,0,{item:'bbs'});return false;">回帖 (<?php echo $val['replys']; ?>)</a></span></li><li><span><a href="<?php echo $val['lasturl']; ?>" target="_blank"><?php echo $val['lastpost']; ?></a>
<?php } else { ?>回帖 (<?php echo $val['replys']; ?>)&nbsp;&nbsp;</span></li><li><span><?php echo $val['lastpost']; ?>
<?php } ?>
</span></li></ul></div><div class="mycome">来自<a href="<?php echo $val['forumurl']; ?>" target="_blank">论坛 - <?php echo $val['forumtitle']; ?></a></div></div>
<?php } ?>
</div>
    </div>
    <div id="reply_area_<?php echo $val['tid']; ?>"></div>
</div>
<div class="mBlog_linedot"></div><?php } elseif($this->Code=='cms') { ?>
<?php if($val['uid']) { ?>
<div class="wb_l_face">
<div class="avatar">
<?php if($this->Code != '') { ?>
<?php if(MEMBER_ID != $val['uid']) { ?>
    <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();">
        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    </a>
<?php } else { ?>        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
<?php } ?>
<?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } ?>
<?php if($this->Config['is_topic_user_follow']) { ?>
<?php echo $val['follow_html']; ?>
<?php } ?>
</div>
<?php if($val['user_css']) { ?>
<p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p>
<?php } ?>
</div>
<!--悬浮头像、弹出对话框-->
<div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div>
<!--悬浮头像、弹出对话框-->
<!--私信对话框-->
<div id="Pmsend_to_user_area" style="width:430px;" style="display:none"></div>
<!--私信对话框-->
<!--AT、拉黑对话框-->
<div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--AT、拉黑对话框-->
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div>
<!--分组对话框-->
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div>
<!--分组对话框-->
<!--备注对话框-->
<div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--备注对话框-->
<!--微博内容中 @用户 悬浮提示-->
<div id="at_<?php echo $val['tid']; ?>_user" class="at_style" style="display:none;"></div>
<!--微博内容中 @用户 悬浮提示-->
<?php } else { ?><div class="wb_l_face"><div class="avatar"><img src="<?php echo $val['face']; ?>" title="未在微博登录的网站用户" onerror="javascript:faceError(this);" /></div></div>
<?php } ?>
<div class="Contant">
    <div style="_overflow:hidden">
        <div class="oriTxt">
            <p class="utitle">
<?php if($val['uid']) { ?>
<span class="un">
<a title="查看<?php echo $val['nickname']; ?>的微博" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a class="ico_level wbL<?php echo $val['level']; ?>" title="点击查看微博等级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>
<?php } else { ?><span class="un"><a title="未在微博登录的网站用户" href="javascript:;" ><?php echo $val['nickname']; ?></a></span>
<?php } ?>
<span class="ut"><a href="<?php echo $val['cmsurl']; ?>" target="_blank"><?php echo $val['dateline']; ?></a></span>
            </p>
<?php if($val['title']) { ?>
            <p>〖<?php echo $val['title']; ?>〗</p>
<?php } ?>
<span id="c_<?php echo $val['pid']; ?>_short"><?php echo $val['content']; ?></span>
            <span id="c_<?php echo $val['pid']; ?>_full" style="display:none;"><?php echo $val['content_full']; ?></span>
<?php if($val['longtext']) { ?>
                <span>
                <a id="linktext_<?php echo $val['pid']; ?>" href="javascript:;" onclick="item_longtext('<?php echo $val['pid']; ?>');return false;">查看全文</a>
                </span>
<?php } ?>
<div class="from"><div class="option"><ul><li><span>
<?php if($val['replys']) { ?>
            <a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" onclick="replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,0,{item:'cms'});return false;">评论 (<?php echo $val['replys']; ?>)</a></span></li><li><span><a href="<?php echo $val['replyurl']; ?>" target="_blank"><?php echo $val['replytime']; ?></a>
<?php } else { ?>评论 (<?php echo $val['replys']; ?>)&nbsp;&nbsp;</span></li><li><span><?php echo $val['replytime']; ?>
<?php } ?>
</span></li></ul></div><div class="mycome">来自<a href="<?php echo $val['typeurl']; ?>" target="_blank">网站 - <?php echo $val['typetitle']; ?></a></div></div>
        </div>
    </div>
    <div id="reply_area_<?php echo $val['tid']; ?>"></div>
</div>
<div class="mBlog_linedot"></div>
<?php } else { ?>
<?php $talkanswerid = ''; ?>
<div class="wb_l_face">
<div class="avatar">
<?php if($this->Code != '') { ?>
<?php if(MEMBER_ID != $val['uid']) { ?>
    <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();">
        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    </a>
<?php } else { ?>        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
<?php } ?>
<?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } ?>
<?php if($this->Config['is_topic_user_follow']) { ?>
<?php echo $val['follow_html']; ?>
<?php } ?>
</div>
<?php if($val['user_css']) { ?>
<p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p>
<?php } ?>
</div>
<!--悬浮头像、弹出对话框-->
<div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div>
<!--悬浮头像、弹出对话框-->
<!--私信对话框-->
<div id="Pmsend_to_user_area" style="width:430px;" style="display:none"></div>
<!--私信对话框-->
<!--AT、拉黑对话框-->
<div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--AT、拉黑对话框-->
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div>
<!--分组对话框-->
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div>
<!--分组对话框-->
<!--备注对话框-->
<div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--备注对话框-->
<!--微博内容中 @用户 悬浮提示-->
<div id="at_<?php echo $val['tid']; ?>_user" class="at_style" style="display:none;"></div>
<!--微博内容中 @用户 悬浮提示-->
<div class="Contant">
    <div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden">
        <div class="oriTxt">
<?php if('myfavorite'==$this->Code && $val['favorite_time']) { ?>
                <p style="color:#666; font-size:12px;">收藏于：<?php echo $val['favorite_time']; ?></p>
<?php } ?>
            <p class="utitle">
                <!--个人签名文件--><span class="un">
<a title="查看<?php echo $val['nickname']; ?>的微博" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a class="ico_level wbL<?php echo $val['level']; ?>" title="点击查看微博等级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>
                <!--个人签名文件-->
                <span class="ut"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank"><?php echo $val['dateline']; ?> </a></span>
            </p>
            <span id="topic_content_<?php echo $val['tid']; ?>_short"><?php echo $val['content']; ?></span>
            <span id="topic_content_<?php echo $val['tid']; ?>_full"></span>
<?php if($val['longtextid'] > 0) { ?>
                <span>
                <a href="javascript:;" onclick="view_longtext('<?php echo $val['longtextid']; ?>', '<?php echo $val['tid']; ?>', this);return false;">查看全文</a>
                </span>
<?php } ?>
<?php if($val['attachid'] && $val['attach_list']) { ?>
<?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>">
<?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?>
    <li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" />
    <div class="attachList_att">
    <p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
    &nbsp;（<?php echo $iv['attach_size']; ?>）</p>
    <p class="attachList_att_doc"><a href="javascript:void(0);"
        onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>
    </div>
    </li>
<?php } } ?>
</ul>
<?php } ?>
<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $val['image_key']; ?>">
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
    <li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
        rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $val['image_key']; ?>"><img
        src="<?php echo $iv['image_small']; ?>" /></a>
    <div class="artZoomBox" style="display: none;">
    <div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
        title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
        href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
    <a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img
     src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
    </li>
<?php } } ?>
</ul>
<?php } ?>
<!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->
<!--投票 Begin-->
<?php if($val['is_vote'] > 0) { ?>
<?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>">
    <li><a href="javascript:;"
        onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img
        src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $val['vote_key']; ?>" style="display: none;">
<div class="blogTxt">
<div class="top"></div>
<div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"></div>
<div class="bottom"></div>
</div>
</div>
<?php } ?>
<!--投票 End-->
<?php if($val['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo"><a
    onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');">
<div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img
    src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $val['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>
<?php if($val['musicid']) { ?>
<?php if($val['xiami_id']) { ?>
<div class="feedUserImg"><embed width="257" height="33"
    wmode="transparent" type="application/x-shockwave-flash"
    src="http://www.xiami.com/widget/0_<?php echo $val['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $val['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐"
    onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');"
    style="cursor: pointer; border: none;" /></div>
<?php } ?>
<?php } ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script>
<?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?>
<?php if(('mycomment'==$this->Code || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?>
<p class="feedP">回复{<a
    href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>"><?php echo $parent_list[$pid]['nickname']; ?>：</a><span><?php echo $parent_list[$pid]['content']; ?></span>}</p>
<?php } ?>
<?php if(!$topic_view) { ?>
<?php $pt=$parent_list[$tpid]; ?>
<div class="blogTxt">
<div class="top"></div>
<div class="mid">
<?php if($pt) { ?>
 <span> <a
    href="index.php?mod=<?php echo $pt['username']; ?>"
    onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);"
    onmouseout="clear_user_choose();"> <?php echo $pt['nickname']; ?> </a>
<?php echo $pt['validate_html']; ?> : <!--悬浮头像、弹出对话框--> <span
    id="user_<?php echo $val['tid']; ?>_reply_user"></span> <!--悬浮头像、弹出对话框--> </span> 
<?php $TPT_ = $TPT_ ? $TPT_ : 'TPT_'; ?>
<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"><?php echo $pt['content']; ?></span> <span
    id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span> 
<?php if($pt['longtextid'] > 0) { ?>
<span> <a href="javascript:;"
    onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', this, '<?php echo $TPT_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a>
</span> 
<?php } ?>
<?php if($pt['attachid'] && $pt['attach_list']) { ?>
<table class="attachst" style="width:440px;">
<?php if(is_array($pt['attach_list'])) { foreach($pt['attach_list'] as $iv) { ?>
    <tr>
        <td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td>
        <td class="attachst_att">
        <p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
        <p class="attachList_att_doc"><a href="javascript:void(0);"
        onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>
        </td>
    </tr>
<?php } } ?>
</table>
<?php } ?>
<?php if($pt['imageid'] && $pt['image_list']) { ?>
<?php $pt['image_key']=$pt['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $pt['image_key']; ?>">
<?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?>
    <li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
        rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $pt['image_key']; ?>"><img
        src="<?php echo $iv['image_small']; ?>" /></a>
    <div class="artZoomBox" style="display:none;">
    <div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
        title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
        href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
    <a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
    </li>
<?php } } ?>
</ul>
<?php } ?>
 <!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->
<!--投票 Begin--> 
<?php if($pt['is_vote'] > 0) { ?>
<?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>">
<li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $__vote_key; ?>" style="display: none;">
<div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div>
</div>
<?php } ?>
 <!--投票 End--> 
<?php if($pt['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo">
<a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');">
<div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $pt['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>
<?php if($pt['musicid']) { ?>
<?php if($pt['xiami_id']) { ?>
<div class="feedUserImg">
<embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $pt['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $pt['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div>
<?php } ?>
<?php } ?>
<div style="width:400px; float:left; padding:5px 0; margin:0;">
<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
<a onclick="get_forward_choose(<?php echo $tpid; ?>);return false;"href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;
<?php echo $pt['from_html']; ?></div>
<?php } else { ?> 
<?php $val['reply_disable']=0; ?>
<p><span>原始微博已删除</span></p>
<?php } ?>
</div>
<div class="bottom"></div>
</div>
<?php } ?>
<?php } ?>
<?php if($this->Module=='qun') { ?>
              <script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>
<?php if($this->Config['qun_attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?>
<div class="from"> 
<div class="option"> 
<ul>
<?php if(MEMBER_ID>0) { ?>
<li>
<!--转发的判断 Begin-->
<?php if($val['managetype'] != 2) { ?>
<span>
<a href="javascript:void(0);" onclick="
<?php if($allow_list_manage) { ?>
get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>, {appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>',noReply:1});
<?php } else { ?>get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>);
<?php } ?>
" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
     </span>
<?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span>
<?php } ?>
<!--转发的判断 End-->
</li>
<li class="o_line_l">|</li>
<li>
<?php if(!$val['reply_disable'] && $val['managetype'] != 2) { ?>
<span>
<a href="javascript:void(0)" onclick="
<?php if($allow_list_manage) { ?>
replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',1,<?php echo $allow_attach; ?>,{appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>'});
<?php } else { ?>replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,<?php echo $allow_attach; ?>);
<?php } ?>
return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a>
</span>
<?php } else { ?><span>评论</span>
<?php } ?>
</li>
<li class="o_line_l">|</li>
<li id="topic_lists_<?php echo $val['tid']; ?>_a" class="mobox"><a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
<div id="topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if(MEMBER_ID>0) { ?>
<?php if('myfavorite'==$this->
Code) { ?>
 <span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a></span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a></span> 
<?php } ?>
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
<a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a>
<?php } ?>
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a>
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
        <a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>'});return false;">推荐</a>
    <!--推荐开始 End-->
<?php } ?>
</div>
</li>
<?php } ?>
</ul>
</div> 
<div class="mycome">
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
</div> 
</div>
<?php } else { ?><script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>
<?php if($this->Config['attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?>
<div class="from"> 
<div class="option">
<!--不是群内成员无法对群内的微博进行操作-->
<ul>
<?php if($this->Get['mod'] == 'talk' &&  $val['reply_ok']) { ?>
<li><span id="answer_<?php echo $val['tid']; ?>" class="talkreply" onclick="showMainPublishBox('answer','talk','<?php echo $talk['lid']; ?>','<?php echo $val['tid']; ?>','<?php echo $val['uid']; ?>');return false;">回答</span></li><li class="o_line_l">|</li>
<?php } ?>
<?php if($this->Get['type'] != 'my_verify') { ?>
<?php $tpid=$val['top_parent_id']; if ($tpid&&$parent_list[$tpid]) $root_type=$parent_list[$tpid]['type']; ?>
<?php if((!isset($root_type)) || (isset($root_type) && in_array($root_type, get_topic_type('forward')))) { ?>
    <li>
      <!--转发的判断 Begin-->
<?php if((in_array($val['type'], get_topic_type('forward')) || $this->Module=='qun') && $val['managetype'] != 2) { ?>
<?php $not_allow_forward=0; ?>
<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
            <a href="javascript:void(0);" onclick="get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>);" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
        </span>
<?php } else { ?> 
<?php $not_allow_forward=1; ?>
<?php if(isset($val['fansgroup'])) { ?>
      <span><?php echo $val['fansgroup']; ?></span>
<?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span>
<?php } ?>
<?php } ?>
 <!--转发的判断 End-->
    </li>
    <li class="o_line_l">|</li>
<?php } else { ?><?php $not_allow_forward=1; ?>
<?php } ?>
<li>
<?php if(!$val['reply_disable'] && $val['managetype'] != 2) { ?>
    <span>
        <a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
 onclick="replyTopic(<?php echo $val['tid']; ?>,'<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',<?php echo $not_allow_forward; ?>,<?php echo $allow_attach; ?>);return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a>
        </span>
<?php } else { ?> <span>评论</span>
<?php } ?>
</li>
    <li class="o_line_l">|</li>
    <li id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a" class="mobox">
        <a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
        <div id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if('myfavorite'==$this->Code) { ?>
                <span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
                    <a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a>
                </span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID < 1) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
                    <a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a>
                </span> 
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
            <span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
><a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a></span>
<?php } ?>
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
                        <a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a>
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
                    <a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>','tag_id':'<?php echo $tag_id; ?>'});return false;">推荐</a>
                <!--推荐开始 End-->
<?php } ?>
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
                <a onclick="force_out(<?php echo $val['uid']; ?>);" href="javascript:void(0);">封杀</a>
                <a onclick="force_ip('<?php echo $val['postip']; ?>');" href="javascript:void(0);">封IP</a>
<?php } ?>
</div>
    </li>
<?php } else { ?><li id="topic_lists_<?php echo $val['id']; ?>_a" class="mobox">
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
  <a href="javascript:void(0)" onclick="deleteVerify(<?php echo $val['id']; ?>,'<?php echo $eid; ?>_<?php echo $val['id']; ?>');return false;">删除</a>
<?php } ?>
</li>
<?php } ?>
</ul>
</div> 
<div class="mycome">
<!-- <a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>"><?php echo $val['dateline']; ?></a>  -->
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra3']; ?>
</div>
<?php echo $this->hookall_temp['global_topiclist_extra4']; ?>
</div>
<?php } ?>
</div>
    </div>
    <div id="reply_area_<?php echo $val['tid']; ?>"></div>
    <div id="modify_topic_<?php echo $val['tid']; ?>"></div>
    <div id="forward_menu_<?php echo $val['tid']; ?>" class="Fbox"></div>
</div>
<?php if(!$no_mBlog_linedot2) { ?>
    <div class="mBlog_linedot"></div>
<?php } ?>
<?php } ?>
</div>
<?php } } ?>
<!--微博列表 End-->
<?php } ?>
<?php if($page_arr['html']) { ?>
          <div class="pageStyle">
            <li><?php echo $page_arr['html']; ?></li>
          </div>
<?php } ?>
<?php } else { ?>
<?php if('bbs' == $this->Code || 'cms' == $this->Code) { ?>
    <br>暂时没有可显示的内容
<?php } else { ?><br>分类下暂时没有发布微博。
<?php } ?>
<?php } ?>
<?php if('groupview'== $this->Code && $counts <=0) { ?>
           <BR />
            "<strong><?php echo $groupname; ?></strong>" 分组下的用户暂时没有发布微博。
<?php } ?>
<?php if($counts <=5) { ?>
          <div id="topic_list_<?php echo $counts; ?>">
<?php if('myat'== $this->
            Code) { ?>
 <BR />
            这里会显示含有"@<?php echo MEMBER_NICKNAME; ?>"的微博。<BR />
            <BR />
            <span>@昵称 </span>技巧：注意昵称后面有“空格”，可以理解为向某人说，被@昵称 提到的人如果在系统中存在，那么TA就可在其个人首页“@提到我的”的栏目中看到你发布的内容。
            <?php } elseif('mycomment' == $this->
            Code) { ?> <BR />
            <BR />
            <BR />
            这里会显示他人对你微博所做的评论。<BR />
            <BR />
            <A HREF="index.php?mod=<?php echo $member['username']; ?>&code=fans" title="关注<?php echo $member['nickname']; ?>的">关注你的</A>人越多，就会有越多人参与你分享内容的讨论，尝试通过<A HREF="index.php?mod=profile&code=invite">邀请好友</A>来让更多人关注你；<BR /><?php } elseif('tocomment' == $this->Code) { ?> <BR />
            <BR />
            <BR />
            这里会显示你对他人微博所做的评论。<BR />
            <BR />
            <?php } elseif('myfavorite' == $this->
            Code) { ?> <BR />
            这里会显示你所收藏的微博。<BR />
            <BR />
            在登录状态下，每个微博的下方都有一个收藏连接，点击即可自动完成收藏，然后你就可以在这里看到了。你可以访问<A HREF="index.php?mod=topic&code=hot">热门微博</A>来发现有收藏价值的内容；<BR />
            <?php } elseif('favoritemy' == $this->
            Code) { ?> <BR />
            这里会显示谁收藏了你的微博。<BR />
            <BR />
            赶快分享些有价值的新鲜事吧，当有人收藏后，你就会在这里看到。<BR /><?php } elseif('myhome' == $this->Code ) { ?><BR /><BR />
            这里显示我和我关注人的微博。<BR /><BR />
            关注你喜欢的人，你就可以在这看到他们分享的内容，尝试通过<A HREF="index.php?mod=topic&code=top">达人榜</A>、<A HREF="index.php?mod=profile&code=search">找人</A>选择用户加关注；<BR /><?php } elseif('tag' == $this->Code ) { ?><BR /><BR />
            这里显示我关注话题的相关微博。<BR /><BR />
            对你感兴趣的话题进行关注，就可以在这里直接查看相关微博，还可以结识有共同话题的人，尝试通过<A HREF="index.php?mod=tag">话题榜</A> 选择话题关注；<BR /><?php } elseif('event' == $view ) { ?><BR />
            这里显示我关注活动的相关微博。<BR />
            对你感兴趣的活动进行关注，就可以在这里直接查看相关微博，还可以结识有共同话题的人。<BR /><?php } elseif('qun' == $this->Code ) { ?><BR /><BR />
            这里显示我加入的群相关的微博。<BR /><BR />
            加入你感兴趣的群，就可以在这里直接查看相关微博，还可以结识有共同话题的人。<a href="index.php?mod=qun" target="_blank">去群里逛逛吧~~</a><BR /><?php } elseif('recd' == $this->Code ) { ?><BR /><BR />
            这里显示推荐的微博。<BR /><BR /><?php } elseif('cms' == $this->Code ) { ?><BR /><BR />
            这里显示来自<a href="<?php echo $cms_url; ?>" target="_blank">网站资讯</a>的内容。<BR /><BR />
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
            前提条件是：微博必须整合了DedeCMS系统。<BR /><BR />
<?php } ?>
<?php } elseif('bbs' == $this->Code ) { ?><BR /><BR />
<?php if($this->Config['dzbbs_enable']) { ?>
            这里显示来自<a href="<?php echo $bbs_url; ?>" target="_blank">论坛</a>的帖子。<BR /><BR />
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
            前提条件是：微博必须整合了Ucenter系统和Discuz论坛。<BR /><BR />
<?php } ?>
<?php } elseif($this->Config['phpwind_enable']) { ?>这里显示来自<a href="<?php echo $bbs_url; ?>" target="_blank">论坛</a>的帖子。<BR /><BR />
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
            前提条件是：微博必须整合了PhpWind论坛，且同时开启了调用phpwind论坛帖子。<BR /><BR />
<?php } ?>
<?php } ?>
<?php } elseif('fenlei' == $view ) { ?><BR />
            这里显示我关注分类的相关微博。<BR />
            对你感兴趣的分类进行关注，就可以在这里直接查看相关微博。<BR />    
<?php } ?>
          </div>
<?php } ?>
        </div>
<?php echo $this->js_show_msg(); ?>
        <!--微博列表 End-->
      </div>
    </div>
  </div>