<!-- page footer -->
			<footer class="page-footer">
				<a href="#" id="top-link" class="top-link"><i class="fa fa-angle-double-up"></i></a>
				
				<div class="grid-row">
					<div class="grid-col grid-col-3">
						<!-- last news -->
						<section class="widget-alt last-news">
							<div class="widget-icon"></div>
							<div class="widget-title">EMS</div>
							<ul>
								<li>Emergency Medical Services is an full service online pharmacy in Pakistan with home delivery service offers 2 hours medicine delivery with in Islamabad. </li>
								<li>You can place your order on phone or our intuitive website to get medicines at your home.</li>
								<li>Emergency Medical Services in Pakistan proud of their team members who are committed to deliver medicines through home delivery and the service that they offer to our customers.</li>
							</ul>
						</section>
						<!--/ last news -->
					</div>
					
					<div class="grid-col grid-col-3">
						<!-- location -->
						<section class="widget-alt location">
							<div class="widget-icon"></div>
							<div class="widget-title">Location</div>
							<address>Our Support Operators are always ready to help you.</address>
							<ul>
								<li><i class="fa fa-phone"></i>(092) 343-5551441</li>
								<li><i class="fa fa-at">@</i>ems@ems.com</li>
								<li><i class="fa fa-skype"></i>EMS</li>
							</ul>
							<nav>
								<a href="#" class="fa fa-twitter"></a>
								<a href="#" class="fa fa-facebook"></a>
								<a href="#" class="fa fa-instagram"></a>
							</nav>
						</section>
						<!--/ location -->	
					</div>
					
					<div class="grid-col grid-col-3">
						<!-- last news -->
						<section class="widget-alt recent-posts">
							<div class="widget-icon"></div>
							<div class="widget-title">Recent Posts</div>
							<ul>
							<?php
							$qry = "SELECT * FROM medicine order by m_id desc Limit 3";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		while($rows = mysql_fetch_assoc($results))
		{
			$m_id = $rows["m_id"];
			$name = $rows["name"];
			$c_id = $rows["c_id"];
			$issue_date = $rows["issue_date"];
			$exp_date = $rows["exp_date"];
			$type = $rows["type"];
			$mg = $rows["mg"];
			$descr = $rows["descr"];
			$price = $rows["price"];
			$image = $rows["image"];
			$date = $rows["datetime"];
				?>
								<li>
									<a href="medicine_detail.php?m_id=<?php echo $m_id; ?>"><img src="<?php if($image=="uploaded_files/"){ echo "img/medicine-icon.jpg"; } else { echo $image; } ?>" width="80" height="80" alt=""></a>
									<p><a href="medicine_detail.php?m_id=<?php echo $m_id; ?>"><?php echo $name; ?></a><br><?php echo date("jS F, Y", strtotime("$date")); ?></p>
								</li>
		<?php } ?>				
							</ul>
						</section>
						<!--/ last news -->						
					</div>
					
					<div class="grid-col grid-col-3">
						<!-- work time -->
						<section class="widget-alt work-time">
							<div class="widget-icon"></div>
							<div class="widget-title">Information</div>
							<ul>
							<li><a href="contacts.php">Contact Us</a></li>
							<li><a href="#">&nbsp;</a></li>
							<li><a href="#">Terms & Condition</a></li>
							<li><a href="#">&nbsp;</a></li>
							<li><a href="about-us.php">About Us</a></li>
							<li><a href="#">&nbsp;</a></li>
							
							</ul>
						</section>
						<!--/ work time -->							
					</div>
				</div>
			</footer>
			<!--/ page footer -->
			
			<!-- copyrights -->
			<div class="copyrights">Copyrights ©2016: EMS </div>
			<!--/ copyrights -->
			
			<!-- scripts -->
		
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.migrate.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox-media.js"></script>
		<script type="text/javascript" src="js/jquery.flot.js"></script>
		<script type="text/javascript" src="js/jquery.flot.pie.js"></script>
		<script type="text/javascript" src="js/jquery.flot.categories.js"></script>
		<script type="text/javascript" src="js/greensock.js"></script>
		<script type="text/javascript" src="js/layerslider.transitions.js"></script>
		<script type="text/javascript" src="js/layerslider.kreaturamedia.jquery.js"></script>

	<!-- Superscrollorama -->		
		<script type="text/javascript" src="js/jquery.superscrollorama.js"></script>
		<script type="text/javascript" src="js/TweenMax.min.js"></script>
		<script type="text/javascript" src="js/TimelineMax.min.js"></script>
	<!--/ Superscrollorama -->
	
		<script type="text/javascript" src="js/jquery.ui.core.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.widget.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.tabs.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-tabs-rotate.js"></script>
		<script type="text/javascript" src="js/jquery.ui.accordion.min.js"></script>
		<script type="text/javascript" src="js/jquery.tweet.js"></script>
	<!-- EASYPIECHART -->
		<script type="text/javascript" src="js/jquery.easypiechart.js"></script>
	<!--/ EASYPIECHART -->
		<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
		<!--/ scripts -->
		