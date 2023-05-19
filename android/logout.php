<?php session_start(); 
session_destroy();
session_unset();
    

echo "Proccessing..
<script>setTimeout(location='index.php',1000);</script>
"?>
