<?php

include 'functions.php';
// Connect to MySQL
$pdo = pdo_connect_mysql();
// MySQL query that selects all the images
$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<header>
		<meta charset="utf-8">
		<title>myPhoto</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



<link href="style1.css" rel="stylesheet" type="text/css">



<style>

.responsive {
  width: 100%;
  height: auto;
}

</style>

<!--Navbar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="navigation">
        <a class="navbar-brand" href="#">myPhoto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" type="button" href="#" data-toggle="modal" data-target="#myModal">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" type="button" href="#" data-toggle="modal" data-target="#myModal1">Register</a>
                </li>
            </ul>
        </div>

            <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Customer Sign In</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
									<form class="form-signin" action="functions.php" method="post">
									<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
									<label for="inputEmail" class="sr-only">Username</label>
									<input type="text" id="username" class="form-control" placeholder="username" name="username" required autofocus>
									<label for="inputPassword" class="sr-only">Password</label>
									<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
									<div class="checkbox mb-3">
										<label>
											<input type="checkbox" value="remember-me"> Remember me
										</label>
									</div>
									<button class="btn btn-lg btn-primary btn-block" type="submit" name="login_btn">Sign in</button>
									<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
								</form>






            </div>
        </div>
    </div>
	 </div>

	 <div class="modal fade" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Customer Sign In</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
									<form class="form-signin" action="functions.php" method="post">
									<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
									<label for="inputEmail" class="sr-only">Username</label>
									<input type="text" id="username" class="form-control" placeholder="username" name="username" required autofocus>
									<label for="inputEmail" class="sr-only">Email address</label>
								  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email"required autofocus>
									<label for="inputPassword" class="sr-only">Password</label>
									<input type="password" id="inputPassword" class="form-control"  placeholder="Password" name="password_1" required>
									<label for="inputPassword" class="sr-only">Password</label>
									<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password_2" required>
									<div class="checkbox mb-3">
										<label>
											<input type="checkbox" value="remember-me"> Remember me
										</label>
									</div>
									<button class="btn btn-lg btn-primary btn-block" type="submit" name="register_btn">Register</button>

								</form>


  </div>
  </div>
  </div>
	</div>
	</div>
  </nav>

	<div id="intro" class="view">

       <div class="mask">
<p>sadsadsadsadsad</p>
       </div>

     </div>


	</header>
	<body>




<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">


			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>

					</small>





	<h2>Gallery</h2>
	<p>Welcome to the gallery page, you can view the list of images below.</p>



	<?php endif ?>
	</div>
	</div>
	</div>






<div class="col-12 col-xs-12 col-md-6 col-lg-12">
<div class="content home" id="gallery">
</br>
</br>

	<div class="images">
		<?php foreach ($images as $image): ?>
		<?php if (file_exists($image['path'])): ?>
		<a href="#">
			<img src="<?=$image['path']?>" class="responsive" alt="<?=$image['description']?>" data-id="<?=$image['id']?>" data-title="<?=$image['title']?>" width="300" height="200">
			<span><?=$image['description']?></span>
		</a>


		<?php endif; ?>
		<?php endforeach; ?>


	</div>

	<div class="container">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</div>


</div>

<div class="image-popup"></div>

<script>
// Container we'll use to show an image
let image_popup = document.querySelector('.image-popup');
// Loop each image so we can add the on click event
document.querySelectorAll('.images a').forEach(img_link => {
	img_link.onclick = e => {
		e.preventDefault();
		let img_meta = img_link.querySelector('img');
		let img = new Image();
		img.onload = () => {
			// Create the pop out image
			image_popup.innerHTML = `
				<div class="con">
					<div class="col-12 col-xs-12 col-md-6 col-lg-12">
					<h3>${img_meta.dataset.title}</h3>
					<p>${img_meta.alt}</p>
					<img src="${img.src}" width="600" height="400"  >
				</div>
				</div>


			`;
			image_popup.style.display = 'flex';
		};
		img.src = img_meta.src;
	};
});
// Hide the image popup container if user clicks outside the image
image_popup.onclick = e => {
	if (e.target.className == 'image-popup') {
		image_popup.style.display = "none";
	}
};
</script>





<div id="section3" style="padding-top:90px;padding-bottom:70px">
   <div class="col-xs-12 col-md-4 col-lg-4">
   <h1 class="display-5" align="center">CONTACT</h1>
   <form name="form1" action="mail.php" onsubmit="return validateForm()" method="post" >

    <div class="form-group">
    <label for="text">Name</label>
    <input type="text" class="form-control" id="text" name="name">

  </div>




  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email">

  </div>




  <div class="form-group">
    <label for="area">Message</label>
    <textarea class="form-control" id="area" rows="3" name="area"></textarea>
  </br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>

</div>


<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
	<div class="container text-center">
		<small>Copyright &copy; myPhoto</small>
	</div>
</footer>
</body>
</html>
