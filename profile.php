<?php
	session_start();
	if(!isset($_SESSION['uid'])){
	header('Location:index.php');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fatih Kahve Dünyası</title>
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top"  id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Fatih Kahve Dünyası</a>
			</div>

			<ul class="nav navbar-nav">

				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" name=""></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn" name=""><span class='glyphicon glyphicon-search'></span></button></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li id='shoppingcart'><a id="carticon" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Fatih Kahve Dünyası <span class="badge">2</span>	</a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3"><strong>S. No.</strong></div>
									<div class="col-md-3"><strong>Ürün Resmi</strong></div>
									<div class="col-md-3"><strong>Ürün Adı</strong></div>
									<div class="col-md-3"><strong>Fiyat </strong></div>
								</div>
								
								
								<hr>
								
								<div id="cartmenu">
							
								<!--<div class="row">
									<div class="col-md-3">S. No.</div>
									<div class="col-md-3">Ürün Resmi</div>
									<div class="col-md-3">Ürün Adı</div>
									<div class="col-md-3">Fiyat(TL)</div>
								</div>-->
								</div>
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
						<div style="text-align: center">
						<a  href="cart.php">Sepete Git</a>
</div>
						
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Merhaba, <?php echo $_SESSION['uname']; ?></a>
				<ul class="dropdown-menu">
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart-large"></span> Sepet<a></li>
					<li><a href="#">Şifre Değiştir</a></li>
					<li><a href="logout.php">Çıkış</a></li>
				</ul>

				</li>

				</ul>

		</div>
	</div>
	<br><br><br><br><br><br>
	<!-- Slider Begins -->

	 <div class="one-time">
	    <div><img src="assets/images/kahve1.jpg"></div>
	    <div><img src="assets/images/kahve2.jpg"></div>
	    <div><img src="assets/images/kahve3.jpg"></div>
  	</div>

	<!-- Slider ends -->

	<br>



	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
			<div id="get_cat"></div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>-->
				<div id="get_brand"></div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brands</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>-->
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12" id="cartmsg">

					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading text-center">Ürünlerimiz
							<div class='pull-right'>
							Sırala: &nbsp;&nbsp;&nbsp;<a href="#" id='price_sort'>Fiyat</a> | <a href="#" id='pop_sort'>Popülerlik</a>
							</div>
					</div>
					<div class="panel-body">
					<div id="get_product"></div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body"><img src="assets/prod_images/samsung_galaxy.jpg"></div>
								<div class="panel-heading">$500.00
								<button class="btn btn-danger btn-xs" style="float:right;">Sepete Ekle</button>
								</div>
							</div>
						</div>-->
					</div>
					<div class="panel-footer">Fatih Kahve Dünyası Lezzet üstadınız..</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class='pagination' id='pageno'>

					</ul>
				</center>
			</div>


			<!-- Modal -->

				<div class="modal fade" id="prod_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Ürün Detayları</h4>
				      </div>
				      <div class="modal-body" id='dynamic_content'>
				        ...
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>

				      </div>
				    </div>
				  </div>
				</div>

			 <!-- Modal ends-->
		</div>
	</div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>
<div class="foot"><footer>
<p> Dizayn eden firma <a href="https://kahvedunyasi.org/">Fatih Kahve Dünyası </a></p>
</footer></div>
<style> .foot{text-align: center;}
</style>
</html>
