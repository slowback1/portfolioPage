<?php
    class Home {
        private $minLength;
        public function __construct($model){
            $this->model = $model;
            $f = "";
            //$this->minLength = $this->findMinLength();
            $s = "";
            foreach($this->model->skills as $sk => $ss) {
                $s = $s . $this->skillbox($ss, $sk); 
            }
            $this->build($s);
        }
        private function build($skills) {
            $lineHeight = 22 + (sizeof($this->model->skills) * 24) . "px";
            echo "<div class='main'><h1>Hello, I'm Andrew Wobeck</h1><p class='subtitle'>I am an aspiring Web Developer looking to start my career in the field. I currently live in Shawnee, Oklahoma, and am interested in positions in the Oklahoma City, Oklahoma area.</p>

            <h2>Skillset:</h2>
            <h3>How Many Projects I Have Built with Each Language, Framework, and Library</h3>
            <div class='skillsList'>
                <div class='skillBox' id='skillBoxHead'><p class='skillHead'></p><div class='skillGraph' id='skillGraphHead'><p class='graphHeadText' style='height: $lineHeight'>0</p><p class='graphHeadText' style='height: $lineHeight; margin-left: 35%;'>".floor($this->model->maxSkillCount / 2)."+</p><p class='graphHeadText' style='height: $lineHeight'>".$this->model->maxSkillCount."+</div></div>
                $skills
            </div>
            <h2>My Three Most Recent Projects:</h2>";

        }
        private function findMinLength() {
             return ((0.8 / $this->model->maxSkillCount)) * 100;
        }
        private function skillBox($count, $skill) {
            $widthValue = ((($count) / $this->model->maxSkillCount) * 100);// - (((0.8 / $this->model->maxSkillCount)) * 100);  -- this was an "equalizing" part that would help keep things in place.  the css flex-shrink and flex-grow properties do a way better job at this, so that's what's used now
            return "<div class = 'skillBox'><p class='skillHead'>$skill:</p><div class='skillGraph' style='width: $widthValue% '><div class='graphBar $skill'></div></div></div>";
        }
    }
?>