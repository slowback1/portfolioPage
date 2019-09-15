<?php
    class Header {
        public function __construct() {
            return;
        }
        public function build() {
            return "
            <nav>
                <a href='./index.php?page=home'><i class='fa fa-home'></i></a>
                <a href='./index.php?page=projects'>Projects Directory</a>
            </nav>
            ";
        }
    }
?>
    