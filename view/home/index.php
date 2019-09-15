<?php
    class Home {
        private $minLength;
        public function __construct($model){
            $this->model = $model;
            $f = "";
            $this->minLength = $this->findMinLength();
            foreach($this->model->frontendSkills as $fk => $fs) {
                $f = $f . $this->skillBox($fs, $fk);
            }
            $b = "";
            foreach($this->model->backendSkills as $bk => $bs) {
                $b = $b . $this->skillBox($bs, $bk);
            }
            $o = "";
            foreach($this->model->otherSkills as $ok => $os) {
                $o = $o . $this->skillBox($os, $ok);
            }
            $this->build($f, $b, $o);
        }
        private function build($fSkills, $bSkills, $oSkills) {

            echo "<div class='main'><h1>Hello, I'm Andrew Wobeck</h1><p class='subtitle'>I am an aspiring Web Developer looking to jumpstart my career. I currently live in Shawnee, Oklahoma, and am interested in positions in the Oklahoma City, Oklahoma area.</p>

            <h2>Skills:</h2>
            
            <h4>Front-end:</h4>
            <div class='skillsList'>
                $fSkills
            </div>
            <h4>Back-end:</h4>
            <div class='skillsList'>
                $bSkills
            </div>
            <h4>Other:</h4>
            <div class='skillsList'>
                $oSkills
            </div>
            <h2>My Three Most Recent Projects:</h2>";

        }
        private function findMinLength() {
             return ((0.8 / $this->model->maxSkillCount)) * 100;
        }
        private function skillBox($count, $skill) {
            $widthValue = ($count / $this->model->maxSkillCount) * 100 - $this->minLength;
            return "<div class = 'skillBox'><p class='skillHead'>$skill:</p><div class='skillGraph' style='width: $widthValue% '><div class='graphBar $skill'></div></div></div>";
        }
    }
?>
