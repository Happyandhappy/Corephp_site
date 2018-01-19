<section id="myID" class="bottomMenu hom-top-menu">

		<div class="container top-search-main">
			<div class="row">
				<div class="ts-menu">
					<!--SECTION: LOGO-->
					<div class="ts-menu-1">
						<a href="/"><img src="speedyHunt.png" alt=""> </a>
					</div>
					<!--SECTION: BROWSE CATEGORY(NOTE:IT'S HIDE ON MOBILE & TABLET VIEW)-->
					<div class="ts-menu-2"><div class="dropdown">
    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" href="#" style="background:#F44336 !important; border:none !important;">
      <span id="selected" style="color:#fff; font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i>People<i class="fa fa-angle-down" aria-hidden="true"></i></span><span class="caret"></span></a>
      
  <ul class="dropdown-menu">
   <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-search" aria-hidden="true"></i>People </a> </li>

							<li><a data-toggle="tab" href="#menu1"><i class="fa fa-envelope" aria-hidden="true"></i> Email </a> </li>

							<li><a data-toggle="tab" href="#menu2"><i class="fa fa-phone" aria-hidden="true"></i>  Phone</a> </li>

<li><a data-toggle="tab" href="#menu3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Arrests</a> </li>

<li><a data-toggle="tab" href="#menu4"><i class="fa fa-eye-slash" aria-hidden="true"></i> Sex Offender</a> </li>

   <li><a data-toggle="tab" href="#menu5"><i class="fa fa-internet-explorer" aria-hidden="true"></i> Domain</a> </li>
   <li><a data-toggle="tab" href="#menu6"><i class="fa fa-users" aria-hidden="true"></i> Username</a> </li>
  </ul>
</div>
						</div>
					</div>
										<!--SECTION: SEARCH BOX-->
					<div class="ts-menu-3">
                    <div class="tab-content">
                    
                    <div id="home" class="tab-pane fade active in">
							<form class="tourz-search-form tourz-top-search-form" method="get" action="search.php">
								<div class="input-field" style="display:none !important;">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
                                <ul>
									<li style="width:30%; float:left; margin-right:1%;">
<input type="text" id="top-select-search" class="autocomplete" placeholder="John" name="fn" required>
											</li>
                                            	<li style="width:30%; float:left; margin-right:1%;">
<input type="text" id="top-select-search" class="autocomplete" placeholder="Smith" name="ln" required>
											</li>
                                            
                                 <li style="width:35%; float:left; margin-right:1%;">

								     <div class="select" id="top-select-search-dropdown" style="width:100%;">
                                       <select name="state"  id="state" style="border:1px solid #000; height:100%;">
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

                                

											</li>           
                                            
                                            </ul>
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn" style="width:100%;"> </div>	
							</form>
						</div>
                        
					 <div id="menu1" class="tab-pane fade">
							<form class="tourz-search-form tourz-top-search-form" method="get" action="email.php">
								<div class="input-field" style="display:none !important;">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
									<input type="email" id="top-select-search" class="autocomplete" placeholder="Email address" name="email" required>
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn" style="width:100%;"> </div>	
							</form>
						</div>
                        
                         <div id="menu2" class="tab-pane fade">
							<form class="tourz-search-form tourz-top-search-form" method="get" action="phone.php">
								<div class="input-field" style="display:none !important;">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
									<input type="text" pattern="(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}" placeholder="555-555-5555" name="phone" id="top-select-search" required> 
                                    
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn" style="width:100%;"> </div>	
							</form>
						</div>
                        
                      <div id="menu3" class="tab-pane fade">
							<form class="tourz-search-form tourz-top-search-form" method="get" action="arrest.php">
								<div class="input-field" style="display:none !important;">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
                                <ul>
									<li style="width:30%; float:left; margin-right:1%;">
<input type="text" id="top-select-search" class="autocomplete" placeholder="John" name="fn" required>
											</li>
                                            	<li style="width:30%; float:left; margin-right:1%;">
<input type="text" id="top-select-search" class="autocomplete" placeholder="Smith" name="ln" required>
											</li>
                                            
                                 <li style="width:35%; float:left; margin-right:1%;">

								     <div class="select" id="top-select-search-dropdown" style="width:100%;">
                                       <select name="state"  id="state" style="border:1px solid #000; height:100%;">
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

                                

											</li>           
                                            
                                            </ul>
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn" style="width:100%;"> </div>	
							</form>
						</div>
                        
              <div id="menu4" class="tab-pane fade">
							<form class="tourz-search-form tourz-top-search-form" method="get" action="sex.php">
								<div class="input-field" style="display:none !important;">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
                                <ul>
									<li style="width:30%; float:left; margin-right:1%;">
<input type="text" id="top-select-search" class="autocomplete" placeholder="John" name="fn" required>
											</li>
                                            	<li style="width:30%; float:left; margin-right:1%;">
<input type="text" id="top-select-search" class="autocomplete" placeholder="Smith" name="ln" required>
											</li>
                                            
                                 <li style="width:35%; float:left; margin-right:1%;">

								     <div class="select" id="top-select-search-dropdown" style="width:100%;">
                                       <select name="state"  id="state" style="border:1px solid #000; height:100%;">
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

                                

											</li>           
                                            
                                            </ul>
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn" style="width:100%;"> </div>	
							</form>
						</div>           
        
         <div id="menu5" class="tab-pane fade">
							<form class="tourz-search-form tourz-top-search-form" method="get" action="domain.php">
								<div class="input-field" style="display:none !important;">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
									<input type="text" placeholder="Domain" name="domain" id="top-select-search" class="autocomplete" pattern="^(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][a-zA-Z0-9-_]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,6}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,3})$" required> 
                                    
                                    
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn" style="width:100%;"> </div>	
							</form>
						</div>
                        
                         <div id="menu6" class="tab-pane fade">
							<form class="tourz-search-form tourz-top-search-form" method="get" action="username.php">
							<div class="input-field" style="display:none !important;">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
									<input type="text" placeholder="Username" name="username" id="top-select-search" class="autocomplete" required>
                                    
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn" style="width:100%;"> </div>	
							</form>
						</div>
        
        
        
        
        
        
                        
                        
                        
                    </div>    
					</div>
                    
                            
                          
					<!--SECTION: REGISTER,SIGNIN AND ADD YOUR BUSINESS-->
					<div class="ts-menu-4">
						<div class="v3-top-ri">
							<ul>
								                                <?php  if (App::Auth()->is_User()) {
	
								echo '
	<li><a href="Account.php" class="v3-menu-sign"><i class="fa fa-user"></i>Account</a> </li>
	<li><a href="signout.php" class="v3-menu-sign"><i class="fa fa-sign-out"></i>Sign Out</a> </li>';
} else { echo ' <li><a href="login.php"  class="v3-menu-sign"><i class="fa fa-sign-in"></i>Sign In</a> </li>
				<li><a href="register.php"  class="v3-menu-sign"><i class="fa fa-user"></i>Register</a> </li>

								'; }
								?>
							</ul>
						</div>
					</div>
					<!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
					<div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span> </div>
					<!--MOBILE MENU CONTAINER:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
					<div class="mob-right-nav" data-wow-duration="0.5s">
						<div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
						<h5>Account</h5>
						<ul class="mob-menu-icon">
						  <?php  if (App::Auth()->is_User()) {
	
								echo '
	<li><a href="Account.php"><i class="fa fa-user"></i>Account</a> </li>
	<li><a href="signout.php"><i class="fa fa-sign-out"></i>Sign Out</a> </li>';
} else { echo ' <li><a href="login.php"><i class="fa fa-sign-in"></i>Sign In</a> </li>
				<li><a href="register.php"><i class="fa fa-user"></i>Register</a> </li>

								'; }
								?>
						</ul>
						<h5>Search</h5>
						<ul>
							<li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-search" aria-hidden="true"></i>People </a> </li>

							<li><a data-toggle="tab" href="#menu1"><i class="fa fa-envelope" aria-hidden="true"></i> Email </a> </li>

							<li><a data-toggle="tab" href="#menu2"><i class="fa fa-phone" aria-hidden="true"></i>  Phone</a> </li>

<li><a data-toggle="tab" href="#menu3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Arrests</a> </li>

<li><a data-toggle="tab" href="#menu4"><i class="fa fa-eye-slash" aria-hidden="true"></i> Sex Offender</a> </li>

   <li><a data-toggle="tab" href="#menu5"><i class="fa fa-internet-explorer" aria-hidden="true"></i> Domain</a> </li>
   <li><a data-toggle="tab" href="#menu6"><i class="fa fa-users" aria-hidden="true"></i> Username</a> </li>
						</ul>
					</div>
				</div>
			</div>

	</section>