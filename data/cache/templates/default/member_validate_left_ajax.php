<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
<?php if($code == 'validate_remark') { ?>
    <!--用户认证 专题简介-->
<?php if($remark_enable) { ?>
    <div class="SC">
      <h3>媒体简介<a class="btn SC_benzhouremen" href="javascript:void(0)"></a></h3>
      <ul class="FTL SC_benzhouremen_box">
       <li><?php echo $remark_content; ?></li>
      </ul>
    </div>
<?php } ?>
<?php } elseif($code == 'validate_cement') { ?><!--用户认证 专题 公告-->
<?php if($cement_enable) { ?>
    <div class="SC">
      <h3>公告<a class="btn SC_benzhouremen" href="javascript:void(0)"></a></h3>
      <ul class="FTL SC_benzhouremen_box">
       <li><?php echo $cement_content; ?></li>
      </ul>
    </div>
<?php } ?>
<?php } elseif($code == 'validate_link') { ?><!--用户认证 专题 友情链接-->
<?php if($link_enable) { ?>
    <div class="SC">
      <h3>友情链接<a class="btn SC_benzhouremen" href="javascript:void(0)"></a></h3>
      <ul class="FTL SC_benzhouremen_box">
<?php if($link['title_1']) { ?>
<li><a href="<?php echo $link['url_1']; ?>" target="_blank"><?php echo $link['title_1']; ?></a></li><br />
<?php } ?>
<?php if($link['title_2']) { ?>
<li><a href="<?php echo $link['url_2']; ?>" target="_blank"><?php echo $link['title_2']; ?></a></li><br />
<?php } ?>
<?php if($link['title_3']) { ?>
<li><a href="<?php echo $link['url_3']; ?>" target="_blank"><?php echo $link['title_3']; ?></a></li><br />
<?php } ?>
<?php if($link['title_4']) { ?>
<li><a href="<?php echo $link['url_4']; ?>" target="_blank"><?php echo $link['title_4']; ?></a></li><br />
<?php } ?>
<?php if($link['title_5']) { ?>
<li><a href="<?php echo $link['url_5']; ?>" target="_blank"><?php echo $link['title_5']; ?></a></li>
<?php } ?>
      </ul>
    </div>
<?php } ?>
<?php } elseif($code == 'validate_video') { ?>
<?php if($video_list) { ?>
      <div class="SC">
      <h3>视频</h3>
      <h3>
<?php if($video_title) { ?>
<span title="<?php echo $_title; ?>"><?php echo $video_title; ?></span>
<?php } ?>
</h3>
      <ul class="FTL">
<?php if(is_array($video_list)) { foreach($video_list as $val) { ?>
        <li>
          <div class="feedUservideo"><a id="a<?php echo $val['vid']; ?>" onClick="javascript:showFlash('<?php echo $val['host']; ?>', '<?php echo $val['id']; ?>', this, '<?php echo $val['vid']; ?>','<?php echo $val['url']; ?>',1);" >
            <div id="play_<?php echo $val['vid']; ?>" class="vP"></div>
<?php if($val['image_src']) { ?>
            <img src="<?php echo $val['image_src']; ?>" style="border:none" />
<?php } else { ?>            <img src="images/feedvideoplay.gif"  />
<?php } ?>
            </a></div>
          <br />
        </li>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#a<?php echo $val['vid']; ?>').click();
            });                
        </script>
<?php } } ?>
      </ul>
    </div>
<?php } ?>
<?php } elseif($code == 'validate_vote') { ?>
<?php if($vote) { ?>
    <script type="text/javascript" src="templates/default/js/vote.js?v=build+20120428"></script>
    <form id="vote_form" action="ajax.php?mod=vote&code=vote&vid=<?php echo $vote['vid']; ?>&from=topic" method="post" name="vote_form">
    <div class="SC">
      <h3>投票<a class="btn SC_benzhouremen" href="javascript:void(0)"></a></h3>
       <ul class="FTL SC_benzhouremen_box">
         <li><a href="index.php?mod=vote&code=view&vid=<?php echo $vote['vid']; ?>" target="_blank"><?php echo $vote['subject']; ?></a></li><br />
        <P><li>参与人数：<?php echo $vote['voter_num']; ?></li><P>
      </ul>
      <ul class="poll_item_list">
<?php $bcid = rand(0, 19); ?>
<?php if(is_array($option)) { foreach($option as $key => $val) { ?>
<li>
            <div>
                <label><input type="<?php echo $vote['input_type']; ?>" name="option[]" value="<?php echo $val['oid']; ?>" 
<?php if($vote['multiple']) { ?>
onclick="checkSelect(this.checked)"
<?php } ?>
><?php echo $val['option']; ?></label>
<?php if($bcid>19) { ?>
<?php $bcid=$bcid-19 ?>
<?php } ?>
<div class="bar_bg bc_<?php echo $bcid; ?>">
                    <div class="bar_left"></div>
                    <div class="bar_middle" len="<?php echo $val['width']; ?>px" style="width: <?php echo $val['width']; ?>px"></div>
                    <div class="bar_right"></div>
                </div>
<?php $bcid++; ?>
<!--<div class="poll_percent"><?php echo $val['vote_num']; ?> (<?php echo $val['percent']; ?>%)</div>-->        
                <div class="clear"></div>
            </div>
        </li>
<?php } } ?>
        <li>发起时间：<?php echo $vote['datelines']; ?></li>     
      </ul>
      <ul class="FTL SC_benzhouremen_box">
         <li>
<?php if($allowedvote && !$hasvoted) { ?>
           <input type="button" name="Submit" class="vote_btn" onclick="vote();" />
<?php } else { ?>  <input type="submit" class="shareI" id="save" value="已投票"  disabled="disabled"/>
<?php } ?>
     </li>
      </ul>
    </div>
    </form>
<script type="text/javascript">
    var __Bar_Name__ = 'bar_<?php echo $tid; ?>_';
    function $$$(id)
    {
        return document.getElementById(id);
    }
<?php if(!$hasvoted) { ?>
    var maxSelect = <?php echo $vote['maxchoice']; ?>;
    var alreadySelect = 0;
    function checkSelect(sel)
    {
        if(sel) {
            alreadySelect++;
            if(alreadySelect == maxSelect) {
                var oObj = document.getElementsByName("option[]");
                for(i=0; i < oObj.length; i++) {
                    if(!oObj[i].checked) {
                        oObj[i].disabled = true;
                    }
                }
            }
        } else {
            alreadySelect--;
            if(alreadySelect < maxSelect) {
                var oObj = document.getElementsByName("option[]");
                for(i=0; i < oObj.length; i++) {
                    if(oObj[i].disabled) {
                        oObj[i].disabled = false;
                    }
                }
            }
        }
    }
<?php } ?>
//效查
    var optionNum = 
<?php echo count($option) ?>
;
    var maxLength = [0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12,13,14,15,16,17,18,19];
    var timer;
    var length = 0;
    for(i = 0; i < optionNum; i++)
    {
        if ($$$(__Bar_Name__ + i)) {
            maxLength[i] = $$$(__Bar_Name__ + i).getAttribute('len');
        }
    }
    timer = setInterval(function(){
        setLength();
    }, 40);
    function setLength(){
        for (i = 0; i < optionNum; i++)
        {
            if ($$$(__Bar_Name__ + i)) {
                if (length - 1 >= maxLength[i]) {
                    $$$(__Bar_Name__ + i).style.width = maxLength[i] + "px";
                } else {
                    $$$(__Bar_Name__ + i).style.width = length + "px";
                }
                length = length + 1;
                if (length > 300) {
                    clearInterval(timer);
                }
            }
        }
    }
</script>
<?php } ?>
<!--ajax 认证分类,地区显示--><?php } elseif($code == 'category') { ?><div>
        <ul>
        <!--分类-->
<?php if(is_array($category_list)) { foreach($category_list as $val) { ?>
                <li><a href="index.php?mod=people&code=view&ids=<?php echo $val['id']; ?>"><?php echo $val['category_name']; ?></a></li>
<?php } } ?>
</ul>
    </div><?php } elseif($code == 'province') { ?><div>
        <ul>
        <!--地区-->
<?php if(is_array($province)) { foreach($province as $val) { ?>
<?php if($proviect_id) { ?>
                    <li><a href="index.php?mod=people&code=city&pid=<?php echo $proviect_id; ?>&cid=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></li>
<?php } else { ?><li><a href="index.php?mod=people&code=province&pid=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></li>
<?php } ?>
<?php } } ?>
</ul>
    </div>
    <!--<a href="index.php?mod=people&code=province&pid=<?php echo $val['id']; ?>">-->
<?php } ?>
<?php if($ajax_code == 'ajax_vote') { ?>
    <!--ajax显示投票-->
        <div class="mWarp" style="padding:10px; width:550px;">
        <link href="templates/default/styles/vote.css?v=build+20120428" rel="stylesheet" type="text/css" />
        <!--投票介绍 Begin--> 
        <div id="vote_desc_wp" class="vote_viewT">
            <div class="vote_viewR"  style="width:340px;">
            <p>
            <span><strong><?php echo $vote['subject']; ?></strong>
<?php if($vote['multiple']) { ?>
                (最多可选<?php echo $vote['maxchoice']; ?>项)
<?php } else { ?>(单选)
<?php } ?>
</span>
<?php if(!$vote['is_view'] && !$hasvoted) { ?>
                <span>
                    (投票后可见)
                </span>
<?php } ?>
<div class="vote_num2"><b><?php echo $vote['voter_num']; ?></b></div></span>
            </p>
            <p>
            <span class="vote_date">有效期：
<?php echo my_date_format($vote['dateline'], 'Y年m月d日 H:i') ?>
&nbsp;--&nbsp;
<?php echo my_date_format($vote['expiration'], 'Y年m月d日 H:i') ?>
</span>
            </p>
            </div>
            <div class="clear"></div>
        </div>
        <!--投票介绍 End-->
        <div>
        <!--投票选项 Begin-->
<?php if($vote['message']) { ?>
<p class="poll_depiction"><?php echo $vote['message']; ?></p>
<?php } ?>
<form name="vote_form" method="post" action="ajax.php?mod=vote&code=vote&vid=<?php echo $vote['vid']; ?>&from=topic" id="vote_form">
                <!--投票选项 Begin--><!--投票选项 Begin-->
<ol class="poll_item_list">
    <!--投票在topic列表中使用时要用到tid-->
<?php if(!isset($tid))$tid=0; ?>
<?php $bcid = rand(0, 19); ?>
<?php if(is_array($option)) { foreach($option as $key => $val) { ?>
<li>
            <div class="poll_item_list_check">
<?php if($allowedvote && !$hasvoted) { ?>
            <input type="<?php echo $vote['input_type']; ?>" name="option[]" value="<?php echo $val['oid']; ?>" 
<?php if($vote['multiple']) { ?>
onclick="checkSelect(this.checked)"
<?php } ?>
/>
<?php } ?>
            <label class="poll_item"><?php echo $val['option']; ?></label>
            </div>
<?php if($bcid>19) { ?>
<?php $bcid=$bcid-19 ?>
<?php } ?>
<div class="bar_bg bc_<?php echo $bcid; ?>">
                <div class="bar_left"></div>
                <div class="bar_middle" id="bar_<?php echo $tid; ?>_<?php echo $key; ?>" len="<?php echo $val['width']; ?>"></div>
                <div class="bar_right"></div>
            </div>
<?php $bcid++; ?>
<div class="poll_percent"><?php echo $val['vote_num']; ?> (<?php echo $val['percent']; ?>%)</div>
    </li>
<?php } } ?>
</ol>
<!--投票选项 End-->
<script type="text/javascript">
    var __Bar_Name__ = 'bar_<?php echo $tid; ?>_';
    function $$$(id)
    {
        return document.getElementById(id);
    }
<?php if(!$hasvoted) { ?>
    var maxSelect = <?php echo $vote['maxchoice']; ?>;
    var alreadySelect = 0;
    function checkSelect(sel)
    {
        if(sel) {
            alreadySelect++;
            if(alreadySelect == maxSelect) {
                var oObj = document.getElementsByName("option[]");
                for(i=0; i < oObj.length; i++) {
                    if(!oObj[i].checked) {
                        oObj[i].disabled = true;
                    }
                }
            }
        } else {
            alreadySelect--;
            if(alreadySelect < maxSelect) {
                var oObj = document.getElementsByName("option[]");
                for(i=0; i < oObj.length; i++) {
                    if(oObj[i].disabled) {
                        oObj[i].disabled = false;
                    }
                }
            }
        }
    }
<?php } ?>
//效查
    var optionNum = 
<?php echo count($option) ?>
;
    var maxLength = [0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12,13,14,15,16,17,18,19];
    var timer;
    var length = 0;
    for(i = 0; i < optionNum; i++)
    {
        if ($$$(__Bar_Name__ + i)) {
            maxLength[i] = $$$(__Bar_Name__ + i).getAttribute('len');
        }
    }
    timer = setInterval(function(){
        setLength();
    }, 40);
    function setLength(){
        for (i = 0; i < optionNum; i++)
        {
            if ($$$(__Bar_Name__ + i)) {
                if (length - 1 >= maxLength[i]) {
                    $$$(__Bar_Name__ + i).style.width = maxLength[i] + "px";
                } else {
                    $$$(__Bar_Name__ + i).style.width = length + "px";
                }
                length = length + 1;
                if (length > 300) {
                    clearInterval(timer);
                }
            }
        }
    }
</script>
                <!--投票选项 End-->
<?php if(MEMBER_ID>0) { ?>
                    <div class="poll_submit" style=" width:540px; text-align:right; padding:0">
<?php if($allowedvote && !$hasvoted) { ?>
                        <input type="hidden" name="votesubmit" value="true" />
                        <span style="width:100px;">
                            <input type="checkbox" name="toweibo" id="toweibo_view" value="1" style="vertical-align:middle" checked="checked">
                            <label for="toweibo_view">分享到微博</label>
                        </span> 
                        <span style="width:100px;">
                            <input type="checkbox" name="anonymous" id="anonymous_view" value="1" style="vertical-align:middle;">
                            <label for="anonymous_view">匿名</label>
                        </span> 
                        <input type="button" class="vote_btn" id="save" value="" onclick="vote();"/>
<?php } else { ?><input type="submit" class="shareI" id="save" value="已投票"  disabled="disabled"/>
<?php } ?>
</div>
<?php } ?>
</form>
        <!--投票选项 End-->
        </div>
        </div>
        <script language="javascript">
            setDialogTitle('<?php echo $this->Get['handle_key']; ?>', "投票");
        </script>
        <script>
function vote()
{
    var post_data = $('#vote_form').serialize();
    var action = $('#vote_form').attr("action");
    if (action) {
        $.post(
            action, 
            post_data, 
            function(r){
                if (!is_json(r)) {
                        var handle_key = 'vote_success_share';
                        showDialog(handle_key, 'local', '评论一下', {html:r}, 500);
                        $('#topic_simple_close_btn').click(
                            function() {
                                closeDialog(handle_key);
                                location.reload();
                            }
                        );
                        $('#topic_simple_share_btn').click(
                            function () {
                                var response = function() {
                                    location.reload();
                                }
                                publishSimpleTopic($('#topic_simple_content').val(), 'vote', $("#topic_simple_item_id").val(), {response:response,topic_type:$('#topic_simple_type').val()});
                                //publishSimpleTopic($('#topic_simple_content').val(), '', 0, {response:response});
                            }
                        );
                } else {
                    var json = eval('('+r.toString()+')');
                    if (json.done) {
                        location.reload();
                    } else {
                        MessageBox('warning', json.msg);
                    }
                }
            }
        );
    }
}
        </script>
    <!--ajax显示投票-->
<?php } ?>