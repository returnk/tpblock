<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 应用的公共文件
function mailto($to, $title, $content)
{
    // 实例化PHPMailer核心类
    $mail = new PHPMailer(true);
    try {
        // 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        $mail->SMTPDebug = 1;
        // 使用smtp鉴权方式发送邮件
        $mail->isSMTP();
        // 链接qq域名邮箱的服务器地址
        $mail->Host = 'smtp.163.com';
        // smtp需要鉴权 这个必须是true
        $mail->SMTPAuth = true;
        // smtp登录的账号 QQ邮箱即可
        $mail->Username = 'leruge@163.com';
        // smtp登录的密码 使用生成的授权码
        $mail->Password = 'Ail57511';
        // 设置使用ssl加密方式登录鉴权
        $mail->SMTPSecure = 'ssl';
        // 设置ssl连接smtp服务器的远程服务器端口号
        $mail->Port = 465;
        // 设置发送的邮件的编码
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('leruge@163.com', 'eshuo');
        // 设置收件人邮箱地址
        $mail->addAddress($to);
        // 邮件正文是否为html编码 注意此处是一个方法
        $mail->isHTML(true);
        $mail->Subject = $title; // 邮件标题
        $mail->Body    = $content; // 邮件内容
        return $mail->send();
    } catch (Exception $e) {
        exception($mail->ErrorInfo, 1001);
    }
}
// 字符串转数组
function strToArray($data)
{
    return explode('|',$data);
}
