<?php 
require_once 'db.php';
session_start();
function verifica() {
    if(isset($_SESSION['username'])) {
        return $_SESSION['username'];
    }else 
        return 0;
}
?>