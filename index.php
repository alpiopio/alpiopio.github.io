<html>
	<head>
		<title>Base64</title>
		<!-- start css -->
		<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
		<style>
			body {
				background-color : #F1F2F7;
			}
		</style>
		<!-- end css -->
	</head>
	<body>
		<?php
			define('__ROOT__', dirname(dirname(__FILE__)));
			require_once(__ROOT__.'/base64/base64.php');
			
			$base64 = new Base_Enam_Empat;			
			$img_src = $base64->base64('image', 400, 200);
		?>
		
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel">
						<div class="panel-heading">
							<h4>Base64 Image Converter</h4>
						</div>
						<div class="panel-body">
							<form method="post" enctype="multipart/form-data" action="" name="base">
								<div class="form-group">
									<input type="file" name="image">
								</div>
								<input type="submit" value="submit" class="btn btn-default">
							</form>
							
							<?php	
								if($img_src != false){
									echo "<div class='alert alert-success alert-dismissible>'";
									echo "<button type='button' class='colse' data-dismiss='alert'>";
									echo "<span hidden='true'>&times;</span>";
									echo "</button>";
									echo "<strong>Convert Success !</strong> Image has been converted.";
									echo "</div>";
									echo "<img src='".$img_src."' class='thumbnail'>";
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel">
						<div class="panel-heading">
							<h4>Base64 Image Converter</h4>
						</div>
						<div class="panel-body">
							<textarea class="form-control"><?php echo $img_src;?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
