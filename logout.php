<?php
ob_start();
session_start();
session_destroy();
header('Location: '. '/');
exit();
ob_end_flush();
?>