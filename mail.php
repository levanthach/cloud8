<?php 
require_once "PHPMailer/PHPMailerAutoload.php";
if(isset($_POST['send']))
{
	  //#1
	$name = $_POST['full-name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$target = $_POST['target'];
	$join = $_POST['res'];
	  //#2
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = 'lethach150699@gmail.com';
	$mail->Password = 'nmgwvpjarpkdlemu';
	$mail->FromName = "Cloud8 - Made in Viet Nam";

	//#3
	$mail->isHTML(true); // Set email format to HTML
	$mail->addAddress("cloud8.hostingday.2013@gmail.com");
	$mail->Subject = "Registration";
	$mail->Body = " <b>Họ tên:</b> $name <br>  
					<b>Email:</b> $email <br>
					<b>Số điện thoại:</b> $phone <br>
					<b>Mục tiêu tham gia:</b> $target <br>
					<b>Tham gia Cloud8 Night:</b> $join";
	  //#4
	if (!$mail->send()) {
		$error = "Lỗi: " . $mail->ErrorInfo;
		echo '<p>'.$error.'</p>';
	}
	else {
		echo "<script type='text/javascript' charset='utf-8'> alert('Đăng ký thành công'); window.location.replace('/cloud8');</script>";  
	}
}
else{
	echo '<p>Vui lòng nhập dữ liệu</p>';
}
?>
