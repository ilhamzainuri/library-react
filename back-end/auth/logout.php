<?php
session_start();
session_destroy();

// redirect ke React Home
header("Location: https://ilhamlatihan.my.id/");
exit;
?>
