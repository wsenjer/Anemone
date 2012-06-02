<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ar" lang="ar">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>لوحة التحكم - {$action}</title>
	<script src="{$BASE_URL}resources/js/jquery-1.7.1.min.js"></script>
	<link rel="stylesheet" href="{$BASE_URL}resources/admin/css/goadmin.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
	
</head>

<body>
    <!-- Header -->
	<div id="header">
    
        <!-- Salutation -->
        <p id="hello">
        
        
        مرحبا بك في لوحة تحكم قايمة
        </p>
        <!-- End Of Salutation -->
        
        <!-- Logout -->
        <p id="logout">
        <a href="{$BASE_URL}admincp/logout">تسجيل الخروج</a>
        </p>
        <!-- End Of Logout -->
        
    </div>
    <!-- End Of Header -->
    
    <!-- Messages Wrapper -->
   <!-- <div id="msgs-wrapper">
        <div class="error">رسالة خطأ</div>
        <div class="info">معلومة</div>
        <div class="warn">رسالة تنبيهية</div>
    </div>-->
    <!-- End Of Wrapper -->
    
    <!-- Wrapper -->
    <div id="wrapper">
        
   <div id="msgs-wrapper">
        <div class="{$message_type}">{$message}</div>
   </div>