<?php
session_start();
session_destroy();

// redirect ke React Home
header("Location: http://localhost:5173/");
exit;
?>
