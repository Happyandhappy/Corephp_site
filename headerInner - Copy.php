
<section id="myID" class="bottomMenu hom-menu" style="display:block !important;">

		<div class="container top-search-main">

			<div class="row">

				<div class="ts-menu">

					<!--SECTION: LOGO-->

					<div class="ts-menu-1">

						<a href="/"><img src="speedyHunt.png" alt=""> </a>

					</div>

					<!--SECTION: BROWSE CATEGORY(NOTE:IT'S HIDE ON MOBILE & TABLET VIEW)-->



					<!--SECTION: SEARCH BOX-->

					<div class="ts-menu-3">

						<div class="top-search">
<div id="menupeople" class="tab-pane fade in active">
							<form>

								<ul>

								

										
                                        
                                        <li style="width:30%; padding:5px; ">

												<input type="text" class="sea-drop-top" placeholder="John" style="border:1px solid #000;" name="fn" required>

												

											</li>
                                       <li style="width:30%; padding:5px; ">

			<input type="text" class="sea-drop-top" placeholder="Smith"  name="ln" style="border:1px solid #000;" required>

												

											</li>

									 <li style="width:25%; padding:5px;">

												 <div class="form-field field-select" style="width:100%; border:1px solid #000;">

                                    <div class="select">
                                       <select name="state"  id="state" style="border:1px solid #000;">
                                           <option value="">Nationwide</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
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

                                    </div>

                                </div>
												

											</li>	

							

									<li style="width:15% !important;padding:5px;">

												<input type="submit" value=""> </li>

										</ul>

									</form>
</div> <!--THIS SEARCH ENDS HERE-->

<div id="menuemail" class="tab-pane fade">
							<form>

								<ul>

								

										
                                        
                                        <li style="width:80%; padding:5px; ">

												<input type="email" placeholder="Email address" name="email" class="sea-drop-top" required> </li>

												

											
											</li>	

							

									<li style="width:20% !important;padding:5px;">

												<input type="submit" value=""> </li>

										</ul>

									</form>
</div> <!--THIS SEARCH ENDS HERE-->
						</div>

					</div>

					<!--SECTION: REGISTER,SIGNIN AND ADD YOUR BUSINESS-->

					<div class="ts-menu-4">

						<div class="top-links">

							<ul>
<?php  if (App::Auth()->is_User()) {
	
								echo '<li><a href="Account.php">My Account</a> </li>';
} else { echo '<li><a href="register.php">Register</a> </li>

								<li><a href="login.php">Sign In</a> </li>'; }
								?>

							</ul>

						</div>

					</div>

					<!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->

					<div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span> </div>

					<!--MOBILE MENU CONTAINER:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->

					<div class="mob-right-nav" data-wow-duration="0.5s">

						<div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>

						<h5>Personal</h5>

						<ul class="mob-menu-icon">

							<li><a href="#">Account</a> </li>

							<li><a href="register.php"> Register</a> </li>

							<li><a href="login.pgp" >Sign In</a> </li>

						</ul>

						

						

					</div>

				</div>

			</div>

		</div>

	</section>