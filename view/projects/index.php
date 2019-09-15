<?php
class Projects {
    public function __construct() {
        $this->build();
    }
    private function build() {
        echo "<script>document.title = 'Projects | Andrew Wobeck'; </script>";
        echo "<div class='main'><h2 class='projectsHeader'>Projects Directory</h2><div class='projects'>";
    }    
}
?>