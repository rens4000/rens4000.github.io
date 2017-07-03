<?
header('Content-Type: text/html; charset=utf-8');
$host = $_SERVER['HTTP_HOST'];
setlocale(LC_TIME, "nl_NL.utf8");
date_default_timezone_set('Europe/Amsterdam');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Welkom bij <? print $host; ?>!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://www.main-hosting.com/hostinger/welcome/css/site.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
    <div id="content">
        <div class="header">
            <a id="logo" href="http://www.hostinger.com/"><img src="http://www.main-hosting.com/hostinger/welcome/images/logo.png" alt="Web hosting" /></a>
        </div>
        <div class="content">
            <h1>Je account is aangemaakt!</h1>
            <p>Website <strong><? print $host; ?></strong> is succesvol op de server geïnstalleerd! Verwijder <strong>default.php</strong> van de <strong>public_html</strong> map en upload je website via FTP of een Bestandsbeheerder.</p>
            <div class="clear"></div>
        </div>
        <div class="footer"></div>
        <div class="clear"></div>
    </div>
    <div id="footer">
        <div class="links">
            <a href="http://www.hostinger.nl/web-hosting" target="_blank">Web Hosting</a>
            <span class="pipe">|</span>
            <a href="http://www.hostinger.nl/gratis-hosting" target="_blank">Gratis Hosting</a>
            <span class="pipe">|</span>
            <a href="http://www.hostinger.nl/forum" target="_blank">Support Forum</a>
            <span class="pipe">|</span>
            <a href="http://cpanel.hostinger.nl/" target="_blank">Client Login</a>
        </div>
        <div class="copyright">Hostinger Nederland &copy; <? print date('Y'); ?>. All rights reserved</div>
        <div class="social-icons">
            <a href="http://www.facebook.com/Hostinger.nl"><img src="http://www.main-hosting.com/hostinger/welcome/images/fb.gif" /></a>
            <a href="https://twitter.com/HostingerCOM"><img src="http://www.main-hosting.com/hostinger/welcome/images/twitter.gif" /></a>
        </div>
    </div>
</div>
</body>
</html>