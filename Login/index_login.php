<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
     <form class="form-container" action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
       <div class="user-name-container">
         <label class="label-user-name" >User Name</label><br>
         <input class="input-user-name" type="text" name="uname" placeholder="Nome de Usuário">
       </div>
       
       <div class="password-container">
         <label class="label-user-password">Password</label><br>
         <input class="input-password" type="password" name="password" placeholder="Senha">
       </div>
       
     	<button class="button-login" type="submit">Login</button>
     </form>
</body>
</html>