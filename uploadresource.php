<?php

  /*
  The contents of this should only be used for TeachingCS. Please do not duplicate any of this code without the author(s) permission.
  Author: Munir Safi
  */

  $title = 'TeachingCS - Upload a Resource';
  require_once('header.php');


  if (login_check($mysqli) == true) { ?>

    <div id="form">
      <div id="background"></div>
      <div class="whitespace"></div>
      <div id="largeform">
        <form method="post" enctype="multipart/form-data" action="/uploadresource/">
          <h1>Upload a Resource</h1>
          <input type="file" name="files[]" multiple="" />
          <input type="text" class="norm" name="name" id="name" placeholder="Resource Title" autocomplete="off"/>

          <select id="standard" name="standard" class="norm">
            <option selected disabled>Please select a standard</option>
            <option value="ap">AP CS Principles</option>
            <option value="csta">CSTA 2016 Standards (Interim)</option>
            <option value="indiana">Indiana Standards</option>
          </select>

          <select id="grade" name="grade" class="norm left">
            <option selected disabled>Please select a grade</option>
            <option value="practices" class="ap">Practices</option>
            <option value="concepts" class="ap">Concepts</option>
            <option value="k-2" class="csta">K-2</option>
            <option value="3-5" class="csta">3-5</option>
            <option value="6-8" class="csta">6-8</option>
            <option value="9-10" class="csta">9-10</option>
            <option value="11-12" class="csta">11-12</option>
            <option value="k-2" class="indiana">K-2</option>
            <option value="3-5" class="indiana">3-5</option>
            <option value="6-8" class="indiana">6-8</option>
          </select>

          <select id="type" name="resourcetype" class="norm right">
            <option selected disabled>Please select a resource type</option>
            <option value="assessment">Assessment</option>
            <option vlaue="activity">Activity/Exercise</option>
            <option value="lesson">Lesson Plan</option>
            <option value="project">Project</option>
          </select>

          <select id="method" name="method" class="norm left">
            <option selected disabled>Please select an instructional method</option>
            <option va>Assessment</option>
            <option>Case-based Learning</option>
            <option>Lecture</option>
            <option>Media Computation</option>
            <option>Pair Programming</option>
            <option>Peer Instruction</option>
            <option>Problem-based Learning</option>
            <option>Project-based Learning</option>
            <option>Role Play</option>
          </select>

          <select id="framework" name="framework" class="norm right">
            <option selected disabled>Please select a concept</option>
            <option value="connecting-computing" class="app">Connecting Computing</option>
            <option value="creating-computational-artifacts" class="app">Creating Computational Artifacts</option>
            <option value="abstracting" class="app">Abstracting</option>
            <option value="analyzing-problems-and-artifacts" class="app">Analyzing Problems and Artifacts</option>
            <option value="communication" class="app">Communicating</option>
            <option value="collaborating" class="app">Collaborating</option>
            <option value="creativity" class="apc">Creativity</option>
            <option value="data-and-information" class="apc">Data and Information</option>
            <option value="programming" class="apc">Programming</option>
            <option value="the-internet" class="apc">The Internet</option>
            <option value="alogirthms-and-programs" class="csta">Algorithms and Programs</option>
            <option value="computing-systems" class="csta">Computing Systems</option>
            <option value="data-and-analysis" class="csta">Data and Analysis</option>
            <option value="impacts-of-computing" class="csta">Impacts of Computing</option>
            <option value="networks-and-the-internet" class="csta">Networks and the Internet</option>
            <option value="data-and-information-di" class="indiana">Data and Information (DI)</option>
            <option value="computing-devices-and-systems" class="indiana">Computing Devices and Systems (CD)</option>
            <option value="programs-and-algorithms-pa" class="indiana">Programs and Algorithms (PA)</option>
            <option value="networking-and-communication-nc" class="indiana">Networking and Communication (NC)</option>
            <option value="impact-and-culture-ic" class="indiana">Impact and Culture (IC)</option>
          </select>

          <select id="region" name="region" class="norm">
            <option selected disabled>Please select the state in which your resource best fits the curriculum</option>
            <option value="ALL">All</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
          </select>

          <select name="language" id="language" class="norm left">
            <option selected disabled>Please select a programming language</option>
            <option value="na">Not programming related</option>
            <option value="blockly">Blockly</option>
            <option value="csunpl">Cs Unplugged</option>
            <option value="c++">C++</option>
            <option value="java">Java</option>
            <option value="javascript">Javascript</option>
            <option value="php">PHP</option>
            <option value="python">Python</option>
            <option value="ruby">Ruby</option>
            <option value="scheme">Scheme</option>
            <option value="scratch">Scratch</option>
            <option value="vb">Visual Basic</option>
          </select>

          <select name="subject" id="subject" class="norm right">
            <option selected disabled>Please select a relevent subject</option>
            <option value="arts">Arts</option>
            <option value="candv">Civics and Government</option>
            <option value="cs">Computer Science</option>
            <option value="econ">Economics</option>
            <option value="langs">Foreign Languages</option>
            <option value="handg">History and Geography</option>
            <option value="larts">Language Arts</option>
            <option value="math">Mathematics</option>
            <option value="science">Science</option>
          </select>

          <textarea class="norm" name="shortdesc" style="height: 150px;" placeholder="Please type in a brief description of the resource you are uploading."></textarea>
          <textarea class="norm" name="longdesc" style="height: 500px;" placeholder="Please type in a long, detailed description of the resource you are uploading."></textarea>
          <input type="submit" class="submit" name="submit" value="Upload" id="uploadsubmit" />
        </form>
      </div>
    </div>
    <?php

        if(isset($_POST['submit'])) {

          // Grab all the variables
          // We'll be creating a unique ID for each resource, so we can match up the resource file
          // to the actual resource entry in the resource table
          $uniqid = round(microtime(true)) . random_string(20);
          $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
          $standard = filter_input(INPUT_POST, 'standard', FILTER_SANITIZE_STRING);
          $grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING);
          $resourcetype = filter_input(INPUT_POST, 'resourcetype', FILTER_SANITIZE_STRING);
          $method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_STRING);
          $framework = filter_input(INPUT_POST, 'framework', FILTER_SANITIZE_STRING);
          $region = filter_input(INPUT_POST, 'region', FILTER_SANITIZE_STRING);
          $language = filter_input(INPUT_POST, 'language', FILTER_SANITIZE_STRING);
          $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
          $shortdesc = filter_input(INPUT_POST, 'shortdesc', FILTER_SANITIZE_STRING);
          $longdesc = filter_input(INPUT_POST, 'longdesc', FILTER_SANITIZE_STRING);

          // Create a unique folder to hold our resources
          $structure = "./resources/" . $uniqid;
          if(!mkdir($structure, 0777, true)) {
            die('Failed to create a folder for the uploaded resources');
          }

          // Count # of uploaded files in array
          $total = count($_FILES['files']['name']);

          // Loop through each file
          for($i = 0; $i < $total; $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['files']['tmp_name'][$i];

            //Make sure we have a filepath
            if ($tmpFilePath != ""){
              //Setup our new file path
              $newFilePath = "./resources/" . $uniqid . "/" . $_FILES['files']['name'][$i];
              $ext = pathinfo($newFilePath, PATHINFO_EXTENSION);

              //Upload the file into the temp dir
              if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                // Insert the file info into the resources_file table
                if ($insert_file = $mysqli->prepare("INSERT INTO resources_file (uniqid, type, file) VALUES (?, ?, ?)")) {
                    $insert_file->bind_param('sss', $uniqid, $ext, $_FILES['files']['name'][$i]);

                    // throw an error if there's an issue with the insert
                    if (! $insert_file->execute()) {
                        header('Location: ../error.php?err=Registration failure: INSERT');
                    }
                }
              }
            }
          }

          // Insert the uploader info
          if ($insert_uploader = $mysqli->prepare("INSERT INTO resources_uploader (username, uniqid) VALUES (?, ?)")) {
              $insert_uploader->bind_param('ss', $_SESSION["username"], $uniqid);

              // throw an error if there's an issue with the insert
              if (! $insert_uploader->execute()) {
                  header('Location: ../error.php?err=Registration failure: INSERT');
              }
          }

          // Insert the new RESOURCE into the database
          if ($insert_stmt = $mysqli->prepare("INSERT INTO resources (name, uniqid, gradelevel, standard, concept, subject, state, language, method, shortdesc, longdesc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
              $insert_stmt->bind_param('sssssssssss', $name, $uniqid, $grade, $standard, $framework, $subject, $region, $language, $method, $shortdesc, $longdesc);

              // Kill the script if there's an issue with the insert
              if (! $insert_stmt->execute()) {
                  die('Failed to insert the resource into the database...');
              }
          }


        }
        // not logged in, return to homepage
      } else {
        header('Location: /');
        exit;
      }
      require('footer.php');
?>
