<?php 
session_start();
unset($_SESSION['admin']);
header('Location: index_.php');
// 返回原先訪問頁面