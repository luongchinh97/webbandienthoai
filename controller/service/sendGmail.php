<?php
    include "static/PHPMailer/class.smtp.php";
    include "static/PHPMailer/class.phpmailer.php"; 
	function sendGmail($title, $content, $nTo, $mTo){
	    $nFrom = "HomeShop.com";    //mail duoc gui tu dau, thuong de ten cong ty ban
	    $mFrom = 'chinh12091997@gmail.com';  //dia chi email cua ban 
	    $mPass = 'chinhdzvc8464';       //mat khau email cua ban
	    $nTo = $nTo; //Ten nguoi nhan
	    $mTo = $mTo;   //dia chi nhan mail
	    $mail = new PHPMailer();
	    $body = $content;   // Noi dung email
	    $title = $title;   //Tieu de gui mail
	    $mail->IsSMTP();             
	    $mail->CharSet  = "utf-8";
	    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
	    $mail->SMTPAuth   = true;    // enable SMTP authentication
	    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
	    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
	    $mail->Port       = 465;         // cong gui mail de nguyen
	    // xong phan cau hinh bat dau phan gui mail
	    $mail->Username   = $mFrom;  // khai bao dia chi email
	    $mail->Password   = $mPass;              // khai bao mat khau
	    $mail->SetFrom($mFrom, $nFrom);
	    $mail->AddReplyTo('chinh12091997@gmail.com', 'HomeShop.com'); //khi nguoi dung phan hoi se duoc gui den email nay
	    $mail->Subject    = $title;// tieu de email 
	    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
	    $mail->AddAddress($mTo, $nTo);
	    // thuc thi lenh gui mail 
	    $mail->Send();
	}
?>