<?php
   
    $uniacid = $_W['uniacid'];
    $fans = $_W['fans'];
    if(empty($fans['nickname'])){
	  load()->model('mc');
	  $fans = mc_oauth_userinfo();
    } 
    $openid = $fans['openid'];
    $sql = "select * from ".tablename('hao_water_setting')." where uniacid=".$_W['uniacid']." "; 
    $setting = pdo_fetch($sql);
    $member = pdo_fetch("SELECT * FROM ".tablename('hao_water_member')." WHERE openid = :openid AND uniacid = :uniacid LIMIT 1", array(':openid' => $openid,':uniacid' => $uniacid));
    if(!empty($member)){
    	include $this->template('person');
    }else{
    	include $this->template('register');
    }
     
?>