

<?php
   include('functions.php');
   
   
   if (!isAdmin()) {
   	$_SESSION['msg'] = "You must log in first";
   	header('location: index.php');
   }
   
   
   // Connect to MySQL
   $pdo = pdo_connect_mysql();
   // MySQL query that selects all the images
   $stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');
   $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Home</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <style>
         .header {
         background: #003366;
         }
         button[name=register_btn] {
         background: #003366;
         }
         #log {
         text-align: center;
         color: red;
         }
      </style>
   </head>
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
               <a href="home.php?logout='1'" class="btn btn-danger">
               <span class="glyphicon glyphicon-log-out"></span> Log out!   </a>
               <a href="index.php" class="btn btn-secondary">
               <span class="glyphicon glyphicon-log-out"></span> INDEX   </a>
               </small>
               <?php endif ?>
            </div>
         </div>
      </div>
      <div class="col-12 col-xs-12 col-md-6 col-lg-12" >
         <div class="content home" id="gallery">
            </br>
            </br>
            <h2>Gallery</h2>
            <p>Here is the gallery page, you can view the list of images below.</p>
			  <a href="upload.php" class="upload-image" data-toggle="modal" data-target="#myModal" type="button">Upload Image</a>
                  <div class="modal" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Upload image</h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <form id="uploadForm" action="upload.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                     <div id="log"></div>
                     <label for="image">Choose Image</label>
                     <input type="file" name="image" accept="image/*" id="file" onchange="validateImage()"/> </br>
                     <label for="title">Title</label> </br>
                     <input type="text" name="title" id="title"> </br>
                     <label for="description">Description</label> </br>
                     <textarea name="description" id="description"></textarea>
                     </br>
                     <input type="submit"value="Upload Image" name="submit" >
                     <input type="button"value="Done" name="done" onclick="reload()">
                  </form>
                  <script src="validate.js"></script>
               </div>
            </div>
         </div>
      </div>
			
			
			
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
            					  <a href="delete.php?id=${img_meta.dataset.id}" id="delete" class="trash" title="Delete Image"><i class="fas fa-trash fa-xs" onclick="function()"> </i></a>
            				
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

   </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</body>  
</html>