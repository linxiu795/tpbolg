<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//邮件发送function for phpMailer
function email($mailto, $nickname, $subject, $content)
{
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '18819396172@163.com';                 // SMTP username
        $mail->Password = 'unalyrutvgujbff1';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        $mail->CharSet = 'utf-8';

        //Recipients
        $mail->setFrom('18819396172@163.com', 'foxyi.top');
        $mail->addAddress($mailto, $nickname);
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;                                  //邮件标题
        $mail->Body    = $content;                                  //邮件正文

        return $mail->send();
    }catch (Exception $e) {
        exception($mail->ErrorInfo(), 1001);
    }
}

//把字符串转换为数组
function strToArray($data)
{
    return explode('|',$data);
}

//把span字符串替换成a
function replace($data)
{
    return str_replace('span', 'a', $data);
}

function arrayC($data)
{
    return implode('|', $data);
}


