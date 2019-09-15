<?php
    class View {
        public function __construct($model, $controller) {
            $this->model = $model;
            $this->controller = $controller;
            include_once './home/index.php';
            include_once './projects/index.php';
            $this->build();
        }
        private function build() {
            include './projectBox.php';
            echo $this->model->metadata;
            echo "<canvas id='dotCan'>Your browser does not support canvas.</canvas>";
            echo "<div class='wrapper'>";
            echo $this->model->header;
            //both projects and home classes will echo html to form the "before project boxes" part of their respective pages
            if($this->controller->pageState == 1) {
                new Projects();
            } else {
                new Home($this->model);
            }
            foreach($this->controller->projects as $project) {
                new ProjectBox($project);
            }
            echo "</div>";
            echo $this->model->footer;
            echo "</div>";

        }
    }
?>