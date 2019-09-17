<?php
    class Controller {
        public $pageState;
        public $projects = array();
        public function __construct($model) {
            $this->model = $model;
            if(isset($_GET['page'])) {
                $this->pageState = $this->model->pages[$_GET['page']];
            } else {
                $this->pageState = 0;
            }
            $this->getProjects($this->pageState);
        }
        private function getQuery($stateEnum) {
            $sql;
            switch($stateEnum) {
                case 1:
                    $sql = "SELECT * FROM projects ORDER BY date DESC";
                    break;
                case 2:
                    $sql = "SELECT * FROM projects WHERE id=00000001 LIMIT 1";
                    break;
                case 0:
                default:
                    $sql = "SELECT * FROM projects ORDER BY date DESC LIMIT 3";
                    break;
            }
            return $sql;
        }
        private function getProjects($queryType) {
            //include dirname(__FILE__) . '../config/dbinfo.php';

            
            $conn = new mysqli("localhost", "root", "", "projects");
            if($conn->connect_error) {
                die("connection failed: " . $conn->connect_error);
            }
            $res = $conn->query($this->getQuery($this->pageState));
            if($res->num_rows > 0) {
                while($row = $res->fetch_assoc()) {
                    array_push($this->projects, [
                        "skills" => explode(",", $row['skills']),
                        "name" => $row['name'],
                        "description" => $row['description'],
                        "github" => $row['githubLink'],
                        "project" => $row['projectLink'],
                        "date" => $row['date']
                        ]);
                }
            }
        }
    }
?>