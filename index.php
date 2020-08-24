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
   <head>
      <meta charset="utf-8">
      <meta name="title" content="myPhoto">
      <meta name="description" content="This is a school project of webprogramming. ">
      <meta name="keywords" content="myPhoto, Imageupload, schoolproject">
	  <meta name="robots" content="index, nofollow">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="language" content="English">
      
      <title>myPhoto</title>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link href="style.css" rel="stylesheet" type="text/css">
      <style>
         #loader{
         display: none;
         }
         .responsive {
         width: 100%;
         height: auto;
         }
         div.content home {
         background-color:black;
         }
         .footer {
         position: fixed;
         left: 0;
         bottom: 0;
         width: 100%;
         text-align: center;
         background-color: rgb(255,246,173);
         background-color: linear-gradient(177deg, rgba(255,246,173,0.969625350140056) 71%, rgba(52,58,64,1) 74%);
         }
         .jumbotron {
         background: rgb(52,58,64);
         background: linear-gradient(184deg, rgba(52,58,64,1) 39%, rgba(255,246,173,0.969625350140056) 40%);
         }
         body {
         background: #fff6ad;
         font-family: Suplexmentary Comic NC;
         }
         .jumbotron .user {
         text-align:right;
         padding: 40px;
         padding-top:1px;
         color: white;
         opacity:0.6;
         }
         .content {
         background: #DC9D63 ;
         border-style: inset;
         border-width: 3px;
         border-color: #FFC997;
         padding: 5px; 
         box-shadow:20px 20px 50px 15px grey; 
         }
      </style>
      <script type="text/javascript">
         function click (e) {
           if (!e)
             e = window.event;
           if ((e.type && e.type == "contextmenu") || (e.button && e.button == 2) || (e.which && e.which == 3)) {
             if (window.opera)
               window.alert("");
             return false;
           }
         }
         if (document.layers)
           document.captureEvents(Event.MOUSEDOWN);
         document.onmousedown = click;
         document.oncontextmenu = click;
      </script>
   </head>
   
   <body>
      <!--Navbar -->
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="navigation">
         <a class="navbar-brand" href="#">myPhoto</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
               <li class="nav-item active">
                  <a class="nav-link" href="#section1" key="home">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#gallery">Gallery</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#section3">Contact</a>
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
                     <h4 class="modal-title">Sign In</h4>
                     <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <form class="form-signin" action="functions.php" method="post">
                        <input type="text" id="username" class="form-control" placeholder="username" name="username" required autofocus>
                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="password" required>
                        <div class="checkbox mb-3">
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit"  name="login_btn">Sign in</button>
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
                     <h4 class="modal-title">Registration</h4>
                     <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">

                     <div id="log"></div>
                     <form  id="regform" class="form-signin" action="#" method="post" >
                        <input type="text" id="username" class="form-control" placeholder="username" name="username" >
                        <input type="email" id="email" class="form-control" placeholder="email" name="email">
                        <input type="password" id="pass1" class="form-control"  placeholder="password" name="password_1" >
                        <input type="password" id="pass2" class="form-control" placeholder="password again" name="password_2">
                        </br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" onClick="return regvalidate()" name="register_btn">Register</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </nav>
      <div id="section1" class="jumbotron jumbotron-fluid">
         <div class="user">
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
                  </br>	
                  <a href="index.php?logout='1'" class="btn btn-danger">
                  <span class="glyphicon glyphicon-log-out"></span> Log out!
                  </a>
                  </small>
                  <?php endif ?>
               </div>
            </div>
         </div>
         <div class="container">
            <h1>Welcome to my page!</h1>
            <p>You can view my images here, after registration you can download them in full size.. </p>
         </div>
      </div>
      <div class="col-12 col-xs-12 col-md-6 col-lg-12" >
         <div class="content home" id="gallery">
            </br>
            </br>
            <h2>Gallery</h2>
            <p>Here is the gallery page, you can view the list of images below.</p>
            <div class="images">
               <?php foreach ($images as $image): ?>
               <?php if (file_exists($image['path'])): ?>
               <a href="download="<?=$image['id']?>" href="<?=$image['path']?>" title="ImageName">
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
            							<?php  if (isset($_SESSION['user'])) : ?>
            							</hr>
            					<a href="${img.src}" title="ImageName" download> <i class="fa fa-download"></i> DOWNLOAD</a>
            				
            						<?php endif ?>
            			
            					
            			
            					
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
               <p class="h1">Contact</p>
               <form id="pingForm">
                  <div class="form-group">
                     <label for="exampleFormControlInput2">Full name</label>
                     <input type="text" class="form-control" id="fullname" name="fullname" placeholder="your full name">
                  </div>
                  <div class="form-group">
                     <label for="exampleFormControlInput1">Email</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="email address">
                  </div>
                  <div class="form-group">
                     <label for="exampleFormControlTextarea1">Message</label>
                     <textarea class="form-control" placeholder="Message" id="message" name="message" rows="3"></textarea>
                  </div>
                  <button type="submit">SEND <img id="loader" src="https://res.cloudinary.com/sivadass/image/upload/v1498134389/icons/loader.gif" alt="loading"></button>
               </form>
               <script src="validate.js"></script>
            </div>
         </div>
      </div>
      <footer class="py-4 bg-dark text-white-50">
         <div class="container text-center">
            <small>Copyright &copy; myPhoto</small>
         </div>
      </footer>
   </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</html>