<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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

<form id="universityRegistrationForm" method="POST" action="#">
	<div class="jumbotron text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="userDetails">
						<h4>Personal Details (University Admin)</h4>
						<div class="form-group">
	   						<label for="firstName">First Name:</label>
	   						<input type="text" class="form-control" name="adminFirstName" required>
						</div>

						<div class="form-group">
	   						<label for="lastName">Last Name:</label>
	   						<input type="text" class="form-control" name="adminLastName" required>
						</div>

  						<div class="form-group">
    						<label for="phone">Phone:</label>
    						<input type="tel" class="form-control" name="adminPhone" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Email address:</label>
    						<input type="email" class="form-control" name="adminEmail" id="adminEmail" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Password:</label>
    						<input type="Password" class="form-control" name="adminPassword" id="adminPassword" required minlength=5>
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
							<input type="text" class="form-control" name="universityName" required>
						</div>

						<div class="form-group">
	   						<label for="universityAddress">University Address:</label>
	  						<input type="text" class="form-control" name="universityAddress" required>
						</div>

						<div class="form-group">
	  						<label for="universityPhone">University Phone:</label>
	   						<input type="tel" class="form-control" name="universityPhone" required>
						</div>

						<div class="form-group">
	  						<label for="universityDomain">University Email:</label>
	  						<input type="email" class="form-control" name="universityEmail" id="universityEmail" required>
						</div>

						<div class="form-group">
	   						<label for="universityDomain">University Domain:</label>
	   						<input type="text" class="form-control" name="universityDomain" id="universityDomain" required>
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


<form id="facultyRegistrationForm" method="POST" action="#">
	<div class="jumbotron text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4 userDetails">
					<h4>Personal Details (University Admin)</h4>
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
    						<input placeholder="johndoe@abc.edu" type="email" class="form-control" name="facultyEmail" id="facultyEmail" required>
  						</div>

  						<div class="form-group">
    						<label for="password">Password:</label>
    						<input pattern=".{3,}" title="3 characters minimum" type="password" class="form-control" name="password" id="password" required>
  						</div>

  						<div class="form-group">
    						<label for="password">Confirm Password:</label>
    						<input type="Password" class="form-control" name="confirmPassword" id="confirmPassword" required>
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
		      			

	$( "#facultyRegistrationForm" ).submit(function(e) {
		$('#errorList').html('');
		e.preventDefault();
		var email = $('#facultyEmail').val();
		var domain=email.split("@");
		var errors="";

		
			$.ajax({
	    		type: "GET",
	    		url: "./functions/functions.php?domain="+domain[1],
	    		dataType: "xml",
	    		success: function(xml){
		    		$(xml).find('login').each(function(){
		      			var status = $(this).find('status').text();
		      			if(status=='false'){
		      				errors="University with Domain Name "+domain[1]+" Not Found.";
		      				$("#errorList").append("<li>"+errors+"</li>");
		      			}
		      			var password=$('#password').val();
						var confirmPassword=$('#confirmPassword').val();
		      			if (password!==confirmPassword) {
		      				errors="Passwords Do Not Match";
		      				$("#errorList").append("<li>"+errors+"</li>");
		      			}

		      			if($('#errorList').children().length==0){
		      				$('#facultyRegistrationForm').submit();
		      			}
		      			

		    		});

	  			},
				error: function() {
					alert("An error occurred while processing XML file.");
				}
	  		});
	});




});


</script>
</body>
</html>