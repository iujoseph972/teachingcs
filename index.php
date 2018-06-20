<?php
	$title = 'TeachingCS - A Collective of Educational Materials for Computer Science Educators';
	require('header.php');
?>
  <section id="header">

		<div id="overlay-form">
			<ul>
				<li><select id="standard" name="standard">
					<option selected disabled>Please Select a Standard</option>
					<option value="ap">AP CS Principles</option>
					<option value="csta">CSTA 2016 Standards (Interim)</option>
					<option value="indiana">Indiana Standards</option>
					<!-- <option value="iste">ISTE-Standards for Computer Science Educators</option> -->
				</select></li>
				<li><select id="grade" name="grade">
					<option selected disabled class="label">Please Select a Grade</option>
					<option value="practices" class="ap">Practices</option>
					<option value="concepts" class="ap">Concepts</option>
					<option value="k-2csta" class="csta">K-2</option>
					<option value="3-5csta" class="csta">3-5</option>
					<option value="6-8csta" class="csta">6-8</option>
					<option value="9-10csta" class="csta">9-10</option>
					<option value="11-12csta" class="csta">11-12</option>
					<option value="k-2indiana" class="indiana">K-2</option>
					<option value="3-5indiana" class="indiana">3-5</option>
					<option value="6-8indiana" class="indiana">6-8</option>
					<!-- <option value="koco" class="iste">Knowledge of Content</option>
					<option value="etls" class="iste">Effective Teaching & Learning Strategies</option>
					<option value="elev" class="iste">Effective Learning Environments</option>
					<option value="epks" class="iste">Effective Professional Knowledge and Skills</option> -->
				</select></li>
				<li><select id="concept" name="concept">
					<option selected disabled class="label">Please Select a Concept</option>
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
					<!-- <option value="data-representation-and-abstraction" class="iste">Data Representation and Abstraction</option>
					<option value="design-develop-and-test-algorithms" class="iste">Design, Develop, and Test Algorithms</option>
					<option value="kdds" class="iste">Knowledge of Digital Devices, Systems, and Networks</option>
					<option value="rpim" class="iste">Role CS Plays and Its Impact in the Modern World</option>
					<option value="ptcs" class="iste">Plan and Teach CS Lessons/Units</option>
					<option value="dete" class="iste">Design Effective Teaching and Learning Environments</option>
					<option value="opdl" class="iste">Ongoing Professional Development and Life-long Learning</option> -->
					<option value="data-and-information" class="indiana">Data and Information (DI)</option>
					<option value="computing-devices-and-systems" class="indiana">Computing Devices and Systems (CD)</option>
					<option value="programs-and-algorithms" class="indiana">Programs and Algorithms (PA)</option>
					<option value="networking-and-communication" class="indiana">Networking and Communication (NC)</option>
					<option value="impact-and-culture" class="indiana">Impact and Culture (IC)</option>
				</select></li>
				<li>
					<div id="homesearch" class="search" name="search">Search</div>
				</li>
			</ul>
		</div>

		<div id="scrolldown">
			Scroll down for more information
			<div id="scrollarrow">
			</div>
		</div>

		<div id="overlay">
		</div>

  </section>

	<div class="wrapper content">
		<div id="featured">
			<h1>Featured Resources</h1>
			<div class="item">
				<div class="resource">
					<div class="img"></div>
					<div class="info">
						<div class="resourcetitle">This is a sample resource</div>
						<div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus quibusdam tempora perferendis, neque error enim. Neque vel a fugiat facere repellendus mollitia delectus numquam corrupti itaque est dignissimos, perspiciatis placeat! Molestias impedit officia cum quae laborum facere dolor dicta fugit veniam ratione, exercitationem sit ullam adipisci saepe nostrum. Deleniti, libero.</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="resource">
					<div class="img"></div>
					<div class="info">
						<div class="resourcetitle">This is a sample resource</div>
						<div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus quibusdam tempora perferendis, neque error enim. Neque vel a fugiat facere repellendus mollitia delectus numquam corrupti itaque est dignissimos, perspiciatis placeat! Molestias impedit officia cum quae laborum facere dolor dicta fugit veniam ratione, exercitationem sit ullam adipisci saepe nostrum. Deleniti, libero.</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="resource">
					<div class="img"></div>
					<div class="info">
						<div class="resourcetitle">This is a sample resource</div>
						<div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus quibusdam tempora perferendis, neque error enim. Neque vel a fugiat facere repellendus mollitia delectus numquam corrupti itaque est dignissimos, perspiciatis placeat! Molestias impedit officia cum quae laborum facere dolor dicta fugit veniam ratione, exercitationem sit ullam adipisci saepe nostrum. Deleniti, libero.</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/index.js"></script>
<?php
	require('footer.php');
?>
