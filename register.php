<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bulletin | Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="header">
		<img src="./assets/logo.png">
	</div>
	<div class="jumbotron text-center">
		<div class="container">
	  		<div class="row">
	    		<div class="col-sm-4">
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="form-group">
  						<label for="sel1">Register As : </label>
  						<select class="form-control" id="registrationType">
						    <option value="university">University</option>
						    <option value="faculty">Faculty</option>
						</select>
					</div>
	    		</div>
	    		<div class="col-sm-4">
	    		</div>
	    	</div>
	    </div>
	</div>

<form id="universityRegistrationForm" method="POST" action="./emailVerification.php">
	<div class="jumbotron text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="userDetails">
						<h4>Personal Details (University Admin)</h4>
						<div class="form-group">
	   						<label for="firstName">First Name:</label>
	   						<input placeholder="John" type="text" class="form-control" name="adminFirstName" required>
						</div>

						<div class="form-group">
	   						<label for="lastName">Last Name:</label>
	   						<input type="text" placeholder="Doe" class="form-control" name="adminLastName" required>
						</div>

  						<div class="form-group">
    						<label for="phone">Phone:</label>
    						<input type="tel" placeholder="551XXXXX83" class="form-control" name="adminPhone" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Email address:</label>
    						<input type="email" placeholder="johndoe@universityName.edu" class="form-control" name="email" id="adminEmail" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Password:</label>
    						<input type="Password" class="form-control" placeholder="Minimum 5 characters" name="adminPassword" id="adminPassword" required minlength=5>
  						</div>

  						<div class="form-group">
    						<label for="email">Confirm Password:</label>
    						<input type="Password" class="form-control" name="adminConfirmPassword" id="adminConfirmPassword" minlength=5 required>
  						</div>
  					</div>
				</div>

				<div class="col-sm-6">
					<div class="universityDetails">
						<h4>University Details</h4>
						<div class="form-group">
							<label for="universityName">University Name:</label>
							<input type="text" placeholder="Pace University" class="form-control" name="universityName" required>
						</div>

						<div class="form-group">
	   						<label for="universityAddress">University Address:</label>
	  						<input type="text" placeholder="1 Pace Plaza, New York, NY 10038" class="form-control" name="universityAddress" required>
						</div>

						<div class="form-group">
	  						<label for="universityPhone">University Phone:</label>
	   						<input type="tel" placeholder="501XXXXX23" class="form-control" name="universityPhone" required>
						</div>

						<div class="form-group">
	  						<label for="universityDomain">University Email:</label>
	  						<input type="email" class="form-control" placeholder="admin@sameDomainAsYourEmailid.edu" name="universityEmail" id="universityEmail" required>
						</div>

						<div class="form-group">
	   						<label for="universityDomain">University Domain:</label>
	   						<input placeholder="universityDomain.edu" type="text" class="form-control" name="universityDomain" id="universityDomain" required>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary buttonMargin" name="universityRegistrationForm">Register</button>
			<div class="errors">
				<ul id="universityErrors">
				</ul>
			</div>
		</div>
	</div>
	<input type="hidden" name="userRole" value="universityadmin">
</form>

<script type="text/javascript">
	$('#errors').hide();
	$(document).ready(function(){
    $("#universityRegistrationForm").on('submit',function(e){
    	e.preventDefault();
    	var form=this;
    	$('#universityErrors').html("");
    	var universityEmail=$('#universityEmail').val();
    	var adminEmail=$("#adminEmail").val();
    	var universityDomain=$("#universityDomain").val();
    	universityEmail=universityEmail.split('@');
    	adminEmail=adminEmail.split('@');
    	var password=$('#adminPassword').val();
    	var confirmPassword=$('#adminConfirmPassword').val();
    	if (universityDomain==universityEmail[1] && universityEmail[1]==adminEmail[1] && universityDomain==adminEmail[1]) {
    		$.ajax({
    			context:this,
        		type: "GET",
				url: "./functions/functions.php?domain="+universityDomain,
				dataType: "xml",
				success: function(xml) {
					$(xml).find('login').each(function(){
		      			var status = $(this).find('status').text();
		      			if (status=="false") {
		      				var password=$('#adminPassword').val();
    						var confirmPassword=$('#adminConfirmPassword').val();
    						if (password===confirmPassword) {
		      					form.submit();
		      				}
		      				else{
		      					$('errors').show();
		      					$('#universityErrors').append('<li>Passwords Do Not Match</li>');
		      				}
		      			}
		      			else{
		      				$('errors').show();
		      				$('#universityErrors').append('<li>University Already Exists.</li>');
		      			}
		      			
		      			
		      		});

				}
			});
			//e.preventDefault(); 
    	}
    	else{
    		$('errors').show();
    		$("#universityErrors").append("<li>Your email Id's domain name ("+adminEmail[1]+"), the domain name of the email Id of your university ("+universityEmail[1]+") and the domain name of your university ("+universityDomain+") should match</li>");
    			e.preventDefault();
    	}

    
    });
});
</script>


<form id="facultyRegistrationForm" method="POST" action="./emailVerification.php">
	<div class="jumbotron text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4 userDetails">
					<h4>Personal Details (Faculty)</h4>
						<div class="form-group">
	   						<label for="firstName">First Name:</label>
	   						<input placeholder="John" type="text" class="form-control" name="firstName" required>
						</div>

						<div class="form-group">
	   						<label for="lastName">Last Name:</label>
	   						<input placeholder="Doe" type="text" class="form-control" name="lastName" required>
						</div>

  						<div class="form-group">
    						<label for="phone">Phone:</label>
    						<input placeholder="(xxx)-xxx-xxxx" type="tel" class="form-control" name="phone" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Email address:</label>
    						<input placeholder="johndoe@universityName.edu" type="email" class="form-control" name="email" id="facultyEmail" required>
  						</div>

  						<div class="form-group">
    						<label for="password">Password:</label>
    						<input placeholder="Minimum 5 characters" type="password" class="form-control" name="passwordFaculty" id="passwordFaculty" minlength=5 required>
  						</div>

  						<div class="form-group">
    						<label for="password">Confirm Password:</label>
    						<input type="Password" class="form-control" name="confirmPasswordFaculty" id="confirmPasswordFaculty" minlength=5 required>
  						</div>

  						<button type="submit" id="facultyRegButton" name="facultyRegistrationForm" class="buttonMargin btn btn-primary">Register</button>
  						<div id="errors">
  							<ol id="errorList">	
  							</ol>
  						</div>	
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="userRole" value="faculty">
</form>



<script type="text/javascript">
$('#facultyRegistrationForm').hide();
$(document).ready(function(){
	$('#registrationType').on('change', function (e) {
	    var optionSelected = $("option:selected", this);
	    var valueSelected = this.value;
	    if (valueSelected=='faculty') {
	    	$('#universityRegistrationForm').hide();
	    	$('#facultyRegistrationForm').show();
	    }
	    if (valueSelected=='university') {
	    	$('#universityRegistrationForm').show();
	    	$('#facultyRegistrationForm').hide();
	    }
	});
});
	$(document).ready(function(){
    $("#facultyRegistrationForm").on('submit',function(e){
    	e.preventDefault();
    	var form=this;
    	$('#errorList').html("");
    	var facultyEmail=$('#facultyEmail').val();
    	facultyEmail=facultyEmail.split('@');
    		$.ajax({
    			context:this,
        		type: "GET",
				url: "./functions/functions.php?domain="+facultyEmail[1],
				dataType: "xml",
				success: function(xml) {
					$(xml).find('login').each(function(){
		      			var status = $(this).find('status').text();
		      			if (status=="true") {
		      				var password=$('#passwordFaculty').val();
    						var confirmPassword=$('#confirmPasswordFaculty').val();
    						if (password===confirmPassword) {
		      					form.submit();
		      				}
		      				else{
		      					$('#errorList').append('<li>Passwords Do Not Match</li>');
		      				}
		      			}
		      			else{
		      				$('#errorList').append('<li>University Does not Exists.</li>');
		      			}
		      			
		      			
		      		});

				}
			});
    });
});
</script>
</body>
</html>