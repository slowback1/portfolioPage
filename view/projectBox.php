<?php
    class ProjectBox {
        //project is an indexed array
        // skills => array
        //name => string
        // description => string
        //github => string
        //project => string
        //date => timestamp
        //returns a string of html
        function __construct($project) {
            $name = $project['name'];
            $date = $project['date'];
            $github = $project['github'];
            $link = $project['project'];
            $description = $project['description'];
            $skills = $project['skills'];
            echo "
            <div class='projectBox'>
                <h3>$name - ". $this->formatDate($date) . "</h3><div class='pBoxLinks'>
                ".$this->buildLink($github, "GitHub Link").$this->buildLink($link, "Project Link")."
                </div><p>$description</p>
                <div class='tooltipsList'><h4>Skills:</h4>".$this->buildSkills($skills)."
            </div></div>
            ";
        }
        //skills is an array of strings
        //returns a string of html
        private function buildSkills($skills) {
            $result = "";
            foreach($skills as $skill) {
                $skillName = trim($skill);
                switch ($skillName) {
                    case "javascript":
                        $skillName = "js";
                        break;
                    case "express":
                        $skillName = "exp";
                        break;
                    case "python":
                        $skillName = "py";
                        break;
                    case "mysql":
                        $skillName = "sql";
                        break;
                    default:
                        break;
                }
                $result = $result . "<div class='tooltip $skill'><p class='skillText'>$skillName</p><span class='tooltiptext'>$skill</span></div>";
            }
            return $result;
        }
        //checks if link exists, builds html if it is
        private function buildLink($link, $type) {
            return ($link == "") ? "" : "<a href='$link'>$type</a>";
        }
        //takes date from format YYYY-MM-DD to [NAME OF MONTH] YYYY
        private function formatDate($date) {
            $months = array(
                "01" => "January",
                "02" => "Febuary",
                "03" => "March",
                "04" => "April",
                "05" => "May",
                "06" => "June",
                "07" => "July",
                "08" => "August",
                "09" => "September",
                "10" => "October",
                "11" => "November",
                "12" => "December"
            );
            $year = substr($date, 0,4);
            $month = $months[substr($date,5,2)];
            return $month . " " . $year;
        }
    }
?>