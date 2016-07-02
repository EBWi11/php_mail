<?php
require_once "email.class.php";
$email = $_GET['email'];
$code = $_GET['code'];
echo $email.",".$code;
        $smtpserver = "smtp.yeah.net";//SMTP服务器
        $smtpserverport =25;//SMTP服务器端口
        $smtpusermail = "";//SMTP服务器的用户邮箱
        $smtpemailto = $email;//发送给谁
        $smtpuser = "";//SMTP服务器的用户帐号
        $smtppass = "";//SMTP服务器的用户密码
        $mailtitle = "修改密码验证码";//邮件主题
        $mailcontent = "<h1>验证码为：".$code."</h1><br><hr><h3>验证码30分钟后过期</h3>";//邮件内容
        $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件

        $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp->debug = false;//是否显示发送的调试信息
        $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

        echo "<div style='width:300px; margin:36px auto;'>";
        if($state==""){
                echo "error!";
                echo "<a href='index.html'>点此返回</a>";
                exit();
        }
        echo "success";
        echo "<a href='index.html'>点此返回</a>";
        echo "</div>";
?>
