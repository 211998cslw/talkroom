<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	
    <link rel="stylesheet" href="css/style.css">
	
    <script src="js/form.js"></script>
	
</head>
<body>

    <div class="form" style="position:relative">
		
		<!--注册表单-->
        <div class="form_register" style="position:absolute">  
            <form action="doregister.php" method="post">
                <h1>注册表单</h1>
                <div class="form_item">
                    <label for="username">用户名：</label>
                    <input type="text" name="name" id="username" placeholder="请输入用户名" required >
                </div>
                <div class="form_item">
                    <label for="password">密码：</label>
                    <input type="password" name="pwd" id="password" placeholder="请输入密码名" required>
                </div>
                
                
                <div class="form_item">
                    <input type="submit" value="注册">
                </div>
            </form>
            <div class="info">已有账号？点击<span class="switch login_Btn">登录</span></div>
        </div>
		
		<!--登录表单-->
        <div class="form_login" style="height:0;">
			
			<form action="dologin.php">
				<h1>登录表单</h1>
				<div class="form_item" method="post">
					<label for="username">用户名：</label>
					<input type="text" name="name" id="username" placeholder="请输入用户名" required>
				</div>
				<div class="form_item">
					<label for="password">密码：</label>
					<input type="password" name="pwd" id="password" placeholder="请输入密码名" required>
				</div>
				<div class="form_item">
					<input type="submit" value="登录">
				</div>
			</form>
			<div class="info">没有账号？点击<span class="switch register_Btn">注册账号</span></div>
			
         </div>
        
    </div>
</body>
</html>