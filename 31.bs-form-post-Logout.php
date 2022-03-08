<?php 
session_start();
unset($_SESSION['user']);
unset($_SESSION['user_ar']);
// header('Location: ./31.bs-form-post-LoginForm.php');
header('Location: '. $_SERVER['HTTP_REFERER']);
// 返回原先訪問頁面