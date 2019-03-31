<?php
    class Functions{
        public static function redirect($url) {
            header("Location: " . BASELANDING . "pages/" . $url);
        }
    }
?>
