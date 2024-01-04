<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>
                <form action="" class="login-form" method="POST">
                    @csrf
		      		<div class="form-group">
		      			<input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	                <div class="form-group d-flex">
	                    <input type="password" name="password" class="form-control rounded-left" id="myInput" placeholder="Password" required>
	                </div>
	                <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Show Password
                            <input type="checkbox" onclick="myFunction()">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="w-50 text-md-right">
                        <a href="#">Forgot Password</a>
                    </div>
	            </div>
                <b class="text-danger"><i>{{ $msg ?? "" }}</i></b> <br/>

	            <div class="form-group">
	            	<button type="submit" name="btnLogin" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
        x.type = "text";
        } else {
        x.type = "password";
        }
    }
    </script>
</body>
</html>
