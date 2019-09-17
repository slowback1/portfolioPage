<?php
    class Model {
        public $test = "hello world";
        public $footer;
        public $header;
        public $metadata;
        public $maxSkillCount = 1;
        public $frontendSkills = array();
        public $backendSkills = array();
        public $otherSkills = array();
        public $skills = array();
        public $pages = [
            "home" => 0,
            "projects" => 1
        ];
        public function __construct() {
            include_once dirname(__FILE__) . '/templates/header.php';
            include_once dirname(__FILE__) . '/templates/footer.php';
            include_once dirname(__FILE__) . '/templates/metadata.php';
            $h = new Header();
            $f = new Footer();
            $m = new Metadata();
            $this->header = $h->build();
            $this->footer = $f->build();
            $this->metadata = $m->build();
            $this->readSkills();
            arsort($this->frontendSkills);
            arsort($this->backendSkills);
            arsort($this->otherSkills);
            arsort($this->skills);
        }
        private function readSkills() {
            //include dirname(__FILE__) . '../config/dbinfo_prod.php';
            //skills I currently have, plus skills I might learn in the future.  Not a conclusive list.  0 is backend, 1 is frontend, 2 is other.
            $skillsArr = array(
                "php" => 0,
                "mysql" => 0,
                "mongodb" => 0,
                "sql" => 0,
                "html" => 1,
                "css" => 1,
                "scss" => 1,
                "javascript" => 1,
                "node" => 0,
                "react" => 1,
                "mvc" => 2,
                "git" => 2,
                "photoshop" => 2,
                "wordpress" => 2,
                "laravel" => 0,
                "angular" => 1,
                "vue" => 1,
                "express" => 0,
                "jquery" => 1,
                "es6" => 1,
                "asp.net" => 0,
                "meteorjs" => 2,
                "cakephp" => 0,
                "rubyonrails" => 0,
                "bootstrap" => 1,
                "sass" => 1,
                "less" => 1,
                "typescript" => 2,
                "npm" => 0,
                "jest" => 2,
                "jasmine" => 2,
                "enzyme" => 2,
                "flux" => 1,
                "redux" => 1,
                "mobx" => 1,
                "webpack" => 2,
                "svg" => 1,
                "d3" => 1,
                "python" => 0,
                "symfony" => 0,
                "c#" => 0,
                ".net" => 0,
                "go" => 0,
                "oracle" => 0,
                "mariadb" => 0,
                "oracle" => 0,
                "redis" => 0,
            );
            $conn = new mysqli("localhost", "root", "", "projects");
            if($conn->connect_error) {
                die("connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT skills FROM projects";
            $res = $conn->query($sql);
            if($res->num_rows > 0) {
                while($row = $res->fetch_assoc()) {
                    $skills = explode(",", $row['skills']);
                    foreach($skills as $skill) {
                        
                        
                        $skill = trim(strtolower($skill));
                        if(array_key_exists($skill, $this->skills)) {
                            $this->skills[$skill] += 1;
                            if($this->skills[$skill] > $this->maxSkillCount) {
                                $this->skills[$skill] = $this->maxSkillCount;
                            }
                        } else {
                            $this->skills[$skill] = 1;
                        }
                        switch($skillsArr[$skill]) {
                            case 0:
                                if(array_key_exists($skill, $this->backendSkills)) {
                                    $this->backendSkills[$skill] += 1;
                                    if($this->backendSkills[$skill] > $this->maxSkillCount) {
                                        $this->backendSkills[$skill] = $this->maxSkillCount;
                                    }
                                } else {
                                    $this->backendSkills[$skill] = 1;
                                }
                                break;
                            case 1:
                                if(array_key_exists($skill, $this->frontendSkills)) {
                                    $this->frontendSkills[$skill] += 1;
                                    if($this->frontendSkills[$skill] > $this->maxSkillCount) {
                                        $this->maxSkillCount = $this->frontendSkills[$skill];
                                    }
                                } else {
                                    $this->frontendSkills[$skill] = 1;
                                }
                                break;
                            case 2:
                            default:
                                if(array_key_exists($skill, $this->otherSkills)) {
                                    $this->otherSkills[$skill] += 1;
                                    if($this->otherSkills[$skill] > $this->maxSkillCount) {
                                        $this->otherSkills[$skill] = $this->maxSkillCount;
                                    }
                                } else {
                                    $this->otherSkills[$skill] = 1;
                                }
                                break;
                        }
                        
                    }
                }
            } 
        }
    }
?>