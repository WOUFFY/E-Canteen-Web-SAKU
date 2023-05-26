<?php
    session_start();
    session_destroy();
    echo '<script>window.location="loginpage_saku.php"</script>';
?>