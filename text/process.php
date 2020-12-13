<?php
	$username = $_POST['username'];//获取login.php中提交的用户名
	$password = $_POST['password'];//获取login.php中提交的密码
	
	$con=mysqli_connect("localhost","root","");
	//连接本地数据库，我的MySQL的用户名是root,没有密码
	
	mysqli_select_db($con,"login");//在所有的数据库中选择叫 login 的数据库
	$result = mysqli_query($con,"select * from users where username = '$username' and password ='$password'") or die("Failed to query database ".mysql_error());
	//在 login 数据库下的 user 表单下查询所有的用户名和密码，否则die，报错 
	$row = mysqli_fetch_array($result);//值传给数组
	if($row['username']===$username && $row['password'] ===$password){
		echo "login success!!! Welcome ".$row['username'];
		//如果有用户名和密码匹配，则echo
	}else{
		echo "Failed to login!";
	}
?>