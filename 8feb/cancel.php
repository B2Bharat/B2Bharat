<?php
include "../admin/AMframe/config.php";
$username=$_SESSION['pay_username'];
?>

<html>
<head>
<title>Ticket cancelled</title>
<script>
	var redir = setTimeout(function(){window.location='<?=$siteurl;?>';},3000);
</script>
</head>
<body>
<?php
echo "<h1>Welcome, $username</h1>";
echo "<h1>Payment Canceled</h1>";
?>
<br>
<small>You will be redirect to the home page in 3 seconds</small>
</body>
<html>