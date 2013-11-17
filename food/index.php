<?php
include "header.php";
?>

			<div id="map-canvas-wrap">
								<div class="map-filter animated fadeInUp">
					<form class="live-map" method="post" action="http://demo.astoundify.com/jobify/job/user-experience-designer-lead-systems-analyst/">
						<div class="search_jobs">
							
							<div class="search_keywords">
								<label for="search_keywords">Keywords</label>
								<input type="text" name="search_keywords" id="search_keywords" placeholder="All Jobs" />
							</div>
							<div class="search_location">
								<label for="search_location">Location</label>
								<input type="text" name="search_location" id="search_location" placeholder="Any Location" />
							</div>
															<div class="search_category">
									<label for="search_category">Category</label>
									<select name="search_category" id="search_category">
										<option value="">All Job Categories</option>
																					<option value="design">Design</option>
																					<option value="developement">Developement</option>
																			</select>
								</div>
							
								<input type="submit" name="submit" value="Search" />
						</div>
					</form>
				</div>
				
				<div id="map-canvas"></div>	
			</div>
			
<?php

include "footer.php";
?>
