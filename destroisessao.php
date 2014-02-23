<?php
session_start();
session_destroy();
unset($_SESSION);


?>
<script>
        location.href="index.php";
</script>