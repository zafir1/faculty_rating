<?php
	function change_profile_image($user_id,$file_temp,$file_extn)
	{
		//$file_name = substr(md5($user_id+time()),0,10).'.'.$file_extn;
		$file_path = 'images/profile/'.substr(md5($user_id+time()),0,10).'.'.$file_extn;
		move_uploaded_file($file_temp,$file_path);
		//echo("UPDATE `users` SET `profile` = '". mysql_real_escape_string($file_path) ."' WHERE `user_id` = WHERE `user_id` = ".(int)$user_id);
		mysql_query("UPDATE `users` SET `profile` = '". mysql_real_escape_string($file_path) ."' WHERE `user_id` = ".(int)$user_id);
		
		
		
	}
	function mail_users($subject,$body)
	{
		$query = mysql_query("SELECT `email`, `first_name` FROM `users` WHERE `allow_email` = 1");
		while(($row = mysql_fetch_assoc($query)) !== false)
		{
			email($row['email'], $subject, "Hello ".$row['first_name'].", \n\n ".$body);
		}
	}
	
	function has_access($user_id,$type)
	{
		$user_id = (int)$user_id;
		
		return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_id` = $user_id AND `type` = $type"), 0) == 1) ? true : false;
		
		//echo mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_id` = $user_id AND `type` = 1"), 0);
		
		
		
		
		/*$query = "SELECT COUNT(`user_id`) FROM `users` WHERE `user_id` = $user_id AND `type` = 1";
		
		echo (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_id` = $user_id AND `type` = 1"), 0) == 1)? "admin" : "not_admin";
		die();
		/*$query = "SELECT COUNT(`user_id`) FROM `users` WHERE `user_id` = $user_id AND `type` = 1";
		$query = mysql_query($query);
		return (mysql_result($query,0) ? true : false);*/
	}
	
	function activate($email,$email_code)
	{
		$email = mysql_real_escape_string($email);
		$email_code = mysql_real_escape_string($email_code);
		$query = "SELECT COUNT('user_id') FROM users WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = 0";
		if(mysql_result(mysql_query($query),0) == 1)
		{
			mysql_query("UPDATE `users` SET `active` = 1 WHERE `email` = '$email'");
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function recover($mode, $email)
	{
		$mode = sanitize($mode);
		$email = sanitize($email);
		$user_data = user_data(user_id_from_email($email),'first_name','username');
		if($mode == 'username')
		{
			email($email, "Your username ", "Hello ".$user_data['first_name']." \n\n Your username is ".$user_data['username']." \n\n   ~ onlinehit");
		}
		else if($mode == 'password')
		{
			echo "This time we are working here for password recovery option.";
		}
			
	}
	
	function update_user($update_data)
	{
		array_walk($update_data, 'array_sanitize');
		foreach($update_data as $field=>$data)
		{
			$update[] = "`".$field."`"." = '".$data."'";
		}
		echo implode(", ", $update)."<br><br>";
		
		/*echo "UPDATE `users` SET ".implode(", ", $update)." WHERE `user_id` = ".$_SESSION['user_id']."";
		die();*/
		
		mysql_query("UPDATE `users` SET ".implode(", ", $update)." WHERE `user_id` = ".$_SESSION['user_id']."") or die(mysql_error());
		
		
	}
	function change_password($user_id, $password)
	{
		$user_id = (int)$user_id;
		$password = md5($password);
		$query = "UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id";
		echo $query;
		mysql_query($query);
	}

	function register_user($register_data)
	{	
		array_walk($register_data, 'array_sanitize');
		$register_data['password'] = md5($register_data['password']);
		$fields = implode(",",array_keys($register_data));
		$data = "'".implode("','",$register_data)."'";
		
		/*$fields = '`'.implode("`, `",array_keys($register_data)).'`';
		$data = '`'.implode("`, `",$register_data).'`';
		$query = "INSERT INTO ' lr'.'users' ($fields) VALUES ($data)";*/
		
		$query = "INSERT INTO users ($fields) VALUES ($data)";
		mysql_query($query);
		
		email($register_data['email'], 'Activate your account', "Hello ".$register_data['first_name'].",\n\nYou need to activate your account, So use the below link:\n\n http://onlinehit.tk/lr/activate.php?email=". $register_data['email'] ."&email_code=". $register_data['email_code'] ." \n\n ~Onlinehit.tk");
	}

	function users_count()
	{
		$query = mysql_query("SELECT COUNT('users') FROM users WHERE active=1");
		$query = mysql_result($query,0);
		return $query;
	}

	function user_data($user_id)
	{
		$data = array();
		$user_id = (int)$user_id;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		
		if($func_get_args > 1)
		{
			unset($func_get_args[0]);
			$fields = implode(',', $func_get_args);
			$data = mysql_fetch_assoc(mysql_query("SELECT ".$fields. " FROM users WHERE user_id = ".$user_id));
			return $data;
		}
		
		/*echo $func_num_args;
		
		
		/*if($func_num_args > 1)
		{
			unset($func_get_args[0]);
			$fields = implode('`,`',$func_get_args);
			echo "SELECT $fields FROM `users` WHERE `user_id` = $user_id<br>";
			
			$data = mysql_fetch_assoc( mysql_query("SELECT '$fields' FROM `users` WHERE `user_id` = '$user_id'"));
			print_r($data);
			die();
			return $data;
		}*/
	}
	
	function logged_in()
	{
		return isset($_SESSION['user_id']) ? true : false;
	}
	function user_exist($username)
	{
		$username = sanitize($username);
		if($query = mysql_query("SELECT COUNT(`user_id`) FROM users WHERE username = '$username'"))
		{
			return (mysql_result($query,0) == 1) ? true:false;
		}
		
	}
	function mail_exist($email)
	{
		$email = sanitize($email);
		if($query = mysql_query("SELECT COUNT(email) FROM users WHERE email = '$email'"))
		{
			return (mysql_result($query,0) >= 1) ? true:false;
		}
		
	}
	
	function user_active($username)
	{
		$username = sanitize($username);
		if($query = mysql_query("SELECT `active` FROM users WHERE username = '$username'"))
		{
			return (mysql_result($query,0) == 1) ? true:false;
		}
	}
	
	function user_id_from_username($username)
	{
		$username = sanitize($username);
		$query = "SELECT `user_id` FROM `users` WHERE `username` = '$username'";
		$query = mysql_query($query);
		return mysql_result($query,0,'user_id');
	}
	
	function user_id_from_email($email)
	{
		$email = sanitize($email);
		$query = "SELECT `user_id` FROM `users` WHERE `email` = '$email'";
		$query = mysql_query($query);
		return mysql_result($query,0,'user_id');
	}
	
	function login($username,$password)
	{
		$user_id = user_id_from_username($username);
		$username = sanitize($username);
		$password = md5($password);
		$query = "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
		return (mysql_result(mysql_query($query),0) == 1) ? $user_id : false;
		
	}
?>