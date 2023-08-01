<?php
class SessionUtils {
    public static function checkSessionTimeout($timeout = 1200) {
        if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $timeout) {
            session_unset();
            session_destroy();
            header('Location: ./index.php');
            exit;
        }

        $_SESSION['last_activity'] = time();
    }
}
?>