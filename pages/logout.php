<?php
session_destroy();
header("Location:index.php?page=login_admin");
exit();
?>