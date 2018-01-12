<html>
<head>
	<title>Test Mail</title>
</head>
<body>
	<p>Dear {{ $name }},</p>
	<p>Thank you for registering to our platform. To confirm your email address, please click on the link below.</p>
	<p>  {{URL::to('/')."/verify_email?token=".$confirmation_code }}</p>
	<p>Regards,</p>
	<p>Team Elite</p>
</body>
</html>