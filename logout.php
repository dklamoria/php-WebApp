<?php
session_start();
?>
<?php
session_unset();
session_destroy();
echo"<script>location='home.php'</script>";
exit();
?>