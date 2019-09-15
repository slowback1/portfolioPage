<?php
    class Footer {
        public function __construct() {
            return;
        }
        public function build() {
            return "
            <footer>
                <div class='copyright'>
                    &copy;".strftime("%Y")." Andrew Wobeck
                </div>
                <div class='links'>
                    <a href='https://github.com/slowback1'><i class='fab fa-github' aria-hidden='true'></i></a>
                    <a href='https://www.linkedin.com/in/andrew-wobeck-ab513916a/'><i class='fab fa-linkedin-in'></i></a>
                </div>
            </footer>
            <script src='scripts/canvas.js'></script>
            ";
        }
    }
?>
