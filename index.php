<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>BookSaw - Free Book Store HTML CSS Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
	<link rel="stylesheet" type="text/css" href="css/vendor.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
		.row {
			display: flex;
			flex-wrap: wrap;
		}

		.col-md-3 {
			flex: 0 0 25%;
		
			max-width: 25%;
		}

		
		.sell-button {
			display: flex;
			align-items: center;
			gap: 5px;
			padding: 8px 16px;
			background-color: #F5E6D3;
	
			color: #8B7355;
		
			border-radius: 4px;
			text-decoration: none;
			border: 1px solid #E8D5C4;
		
			transition: all 0.3s ease;
		}

		.sell-button:hover {
			background-color: #E8D5C4;
		
			color: #6B5744;
			
			box-shadow: 0 2px 4px rgba(139, 115, 85, 0.1);
	
		}

		/* Modal Header Updates */
		.modal-header {
			padding: 20px;
			background-color: #F5E6D3;
			/* Matching cream color */
			border-bottom: 1px solid #E8D5C4;
			border-radius: 8px 8px 0 0;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.modal-header h2 {
			color: #8B7355;
			/* Matching text color */
		}

		/* Submit Button Updates */
		.btn-primary {
			background-color: #E8D5C4;
			/* Cream color for submit button */
			color: #8B7355;
			/* Brown text */
			border: 1px solid #D4C4B5;
			/* Slightly darker border */
		}


		.dropdown {
			position: relative;
			display: inline-block;
		}

		/* Menu Dropdown */
		.dropdown-menu {
			display: none;
			position: absolute;
			top: 100%;
			left: 0;
			background-color: #F5F5F5;
			min-width: 150px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			border: 1px solid #D4AF37;
			border-radius: 5px;
			z-index: 1000;
		}

		/* Dropdown Items */
		.dropdown-item {
			padding: 10px 15px;
			font-family: Georgia, serif;
			color: #333333;
			text-decoration: none;
			display: block;
		}

		.dropdown-item:hover {
			background-color: black;

		}

		/* Tampilkan Dropdown pada Hover */
		.dropdown:hover .dropdown-menu {
			display: block;
		}

		/* Link Akun */
		.user-account {

			color: #333333;
			text-decoration: none;
			cursor: pointer;
		}

		.user-account:hover {
			color: #D4AF37;
		}

		/* Styling untuk icon dan teks */
		.icon {
			margin-right: 10px;
		}

		.icon-search {
			margin-right: -14px;
		}

		.right-element a {
			color: #333333;
			text-decoration: none;
			margin-right: 15px;
		}

		.right-element a:hover {
			color: #D4AF37;
		}

		.btn-primary:hover {
			background-color: #D4C4B5;
			/* Darker cream on hover */
			color: #6B5744;
			/* Darker brown text */
			opacity: 1;
			/* Override previous opacity */
		}

		.btn-secondary {
			background-color: #F8F1EA;
			/* Lighter cream for secondary button */
			color: #8B7355;
			/* Brown text */
			border: 1px solid #E8D5C4;
		}

		.btn-secondary:hover {
			background-color: #F5E6D3;
			/* Slightly darker on hover */
			color: #6B5744;
			opacity: 1;
		}

		/* Form Focus State Updates */
		.form-group input:focus,
		.form-group select:focus,
		.form-group textarea:focus {
			border-color: #E8D5C4;
			outline: none;
			box-shadow: 0 0 0 0.2rem rgba(232, 213, 196, 0.25);
		}

		/* Rest of the existing styles remain the same */
		.modal {
			display: none;
			position: fixed;
			z-index: 1000;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			overflow-y: auto;
		}

		.modal-content {
			background-color: #fefefe;
			margin: 5% auto;
			padding: 0;
			width: 90%;
			max-width: 600px;
			border-radius: 8px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}

		.close {
			color: #8B7355;
			font-size: 24px;
			font-weight: bold;
			cursor: pointer;
			padding: 0 8px;
		}

		.close:hover {
			color: #6B5744;
		}

		#sellBookForm {
			padding: 20px;
		}

		.form-grid {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 20px;
		}

		.form-group {
			margin-bottom: 20px;
		}

		.full-width {
			grid-column: 1 / -1;
		}

		.form-group label {
			display: block;
			margin-bottom: 8px;
			font-weight: 600;
			color: #8B7355;
		}

		.form-group input,
		.form-group select,
		.form-group textarea {
			width: 100%;
			padding: 10px;
			border: 1px solid #E8D5C4;
			border-radius: 4px;
			font-size: 14px;
		}

		.file-hint {
			display: block;
			margin-top: 5px;
			color: #8B7355;
			font-size: 12px;
		}

		.form-actions {
			display: flex;
			justify-content: flex-end;
			gap: 10px;
			margin-top: 20px;
			padding-top: 20px;
			border-top: 1px solid #E8D5C4;
		}

		.btn {
			padding: 10px 20px;
			border-radius: 4px;
			font-weight: 600;
			cursor: pointer;
		}

		@media (max-width: 768px) {
			.form-grid {
				grid-template-columns: 1fr;
			}

			.modal-content {
				margin: 0;
				min-height: 100vh;
				border-radius: 0;
			}
		}

		/* Mengatur tampilan row agar menggunakan flexbox */
		.row {
			display: flex;
			flex-wrap: wrap;
			/* Membungkus elemen jika tidak muat dalam satu baris */
			margin: -15px;
			/* Menghilangkan margin antar kolom */
		}

		/* Mengatur kolom */
		.col-md-3 {
			flex: 0 0 25%;
			/* 4 kolom dalam satu baris */
			max-width: 25%;
			/* Maksimal lebar kolom */
			padding: 15px;
			/* Padding untuk kolom */
		}

		/* Mengatur tampilan produk */
		.product-item {
			border: 1px solid #ddd;
			/* Border untuk item produk */
			border-radius: 10px;
			/* Sudut membulat */
			padding: 15px;
			/* Padding dalam item produk */
			text-align: center;
			/* Rata tengah untuk teks */
			background-color: #fff;
			/* Warna latar belakang item produk */
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			/* Bayangan untuk efek kedalaman */
			transition: transform 0.2s, box-shadow 0.2s;
			/* Transisi saat hover */
		}

		/* Efek hover pada item produk */
		.product-item:hover {
			transform: translateY(-5px);
			/* Mengangkat item saat hover */
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
			/* Bayangan lebih besar saat hover */
		}

		/* Mengatur gambar produk */
		.product-style img {
			width: 100%;
			/* Gambar mengisi lebar kolom */
			height: auto;
			/* Tinggi otomatis */
			border-radius: 10px;
			/* Sudut membulat pada gambar */
		}

		/* Mengatur tombol Add to Cart */
		.add-to-cart {
			background-color: #28a745;
			/* Warna latar belakang tombol */
			color: white;
			/* Warna teks tombol */
			border: none;
			/* Menghilangkan border */
			padding: 10px 20px;
			/* Padding tombol */
			border-radius: 5px;
			/* Sudut membulat pada tombol */
			cursor: pointer;
			/* Mengubah kursor saat hover */
			font-size: 16px;
			/* Ukuran font tombol */
			margin-top: 10px;
			/* Margin atas untuk jarak dengan elemen di atasnya */
			transition: background-color 0.3s;
			/* Transisi saat hover */
		}

		/* Efek hover pada tombol */
		.add-to-cart:hover {
			background-color: #218838;
			/* Warna latar belakang saat hover */
		}

		/* Mengatur item harga */
		.item-price {
			font-size: 18px;
			/* Ukuran font untuk harga */
			font-weight: bold;
			/* Menebalkan teks harga */
			color: #333;
			/* Warna teks harga */
			margin-top: 10px;
			/* Margin atas untuk jarak dengan elemen di atasnya */
		}
	</style>

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

	<div id="header-wrap">

		<div class="top-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<div class="social-links">
							<ul>
								<li>
									<a href="#"><i class="icon icon-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-youtube-play"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-behance-square"></i></a>
								</li>
							</ul>
						</div><!--social-links-->
					</div>
					<div class="col-md-6">
						<div class="right-element">
							<!-- Dropdown Account -->
							<div class="dropdown">
								<a href="#" class="user-account dropdown-toggle for-buy">
									<i class="icon icon-user"></i><span><?= $_SESSION['email'] ?></span>
								</a>
								<div class="dropdown-menu">
									<a href="logout.php" class="dropdown-item">Logout</a>
									<a href="login.php" class="dropdown-item">Create Account</a>
								</div>
							</div>

							<!-- Cart -->
							<a href="#" class="cart for-buy">
								<i class="icon icon-clipboard"></i><span>Cart: (0 $)</span>
							</a>

							<!-- Search Bar -->
							<div class="action-menu">
								<div class="search-bar">
									<a href="#" class="search-button search-toggle" data-selector="#header-wrap">
										<i class="icon icon-search"></i>
									</a>
									<form role="search" method="get" class="search-box">
										<input class="search-field text search-input" placeholder="Search"
											type="search">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div><!--top-content-->
	<header id="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<div class="main-logo">
						<a href="index.html"><img src="images/main-logo.png" alt="logo"></a>
					</div>
				</div>

				<div class="col-md-10">
					<nav id="navbar">
						<div class="main-menu stellarnav">
							<ul class="menu-list">
								<li class="menu-item active"><a href="#home">Home</a></li>
								<li class="menu-item has-sub">
									<a href="#pages" class="nav-link">Pages</a>
									<ul>
										<li class="active"><a href="index.html">Home</a></li>
										<li><a href="index.html">About</a></li>
										<li><a href="index.html">Styles</a></li>
										<li><a href="index.html">Blog</a></li>
										<li><a href="index.html">Post Single</a></li>
										<li><a href="index.html">Our Store</a></li>
										<li><a href="index.html">Product Single</a></li>
										<li><a href="index.html">Contact</a></li>
										<li><a href="index.html">Thank You</a></li>
									</ul>
								</li>
								<li class="menu-item"><a href="#featured-books" class="nav-link">Featured</a></li>
								<li class="menu-item"><a href="#popular-books" class="nav-link">Popular</a></li>
								<li class="menu-item"><a href="#special-offer" class="nav-link">Offer</a></li>
								<li class="menu-item"><a href="#latest-blog" class="nav-link">Articles</a></li>
								<li class="menu-item">




									<!-- jual buku -->

									<a href="#" class="nav-link sell-button" onclick="openSellModal()">
										<i class="icon icon-plus"></i> Jual Buku
									</a>
								</li>
							</ul>

							<div class="hamburger">
								<span class="bar"></span>
								<span class="bar"></span>
								<span class="bar"></span>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>



	<div id="sellBookModal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Jual Buku</h2>
				<span class="close" onclick="closeSellModal()">&times;</span>
			</div>

			<form id="sellBookForm" action="" method="POST" enctype="multipart/form-data">
				<div class="form-grid">
					<div class="form-group">
						<label for="bookTitle">Judul Buku</label>
						<input type="text" id="bookTitle" name="judul" required>
					</div>

					<div class="form-group">
						<label for="bookAuthor">Penulis</label>
						<input type="text" id="bookAuthor" name="penulis" required>
					</div>


					<div class="form-group">
						<label for="bookGenre">Genre</label>
						<select id="bookGenre" name="genre" required>
							<option value="">Pilih Genre</option>
							<option value="fiction">Business</option>
							<option value="non-fiction">Technology</option>
							<option value="mystery">Romantic</option>
							<option value="science-fiction">Adventure</option>
							<option value="romance">Fictional</option>
						</select>
					</div>

					<div class="form-group">
						<label for="bookCondition">Kondisi Buku*</label>
						<select id="bookCondition" name="kondisi" required>
							<option value="">Pilih Kondisi</option>
							<option value="new">Baru</option>
							<option value="like-new">Seperti Baru</option>
							<option value="very-good">Sangat Baik</option>
							<option value="good">Baik</option>
							<option value="acceptable">Layak</option>
						</select>
					</div>
				</div>

				<div class="form-group full-width">
					<label for="bookDescription">Deskripsi singkat</label>
					<textarea id="bookDescription" name="deskripsi" rows="4"></textarea>
				</div>

				<div class="form-group full-width">
					<label for="bookDescription">Sinopsis</label>
					<textarea id="bookDescription" name="sinopsis" rows="4"></textarea>
				</div>

				<div class="form-group full-width">
					<label for="bookPrice">Harga</label>
					<input type="number" id="bookPrice" name="harga" placeholder="Masukkan harga" step="0.01" required>
				</div>

				<div class="form-group full-width">
					<label for="bookPrice">Tahun</label>
					<input type="number" id="bookPrice" name="tahun" placeholder="Masukan tahun pembuatan" step="0.01"
						required>
				</div>

				<div class="form-group">
					<label for="bookImage">Foto Buku</label>
					<input type="file" id="bookImage" name="foto" accept="image/*" required>
					<small class="file-hint">Format: JPG, PNG, atau GIF (Max. 5MB)</small>
				</div>

				<div class="form-actions">
					<button type="button" class="btn btn-secondary" onclick="closeSellModal()">Batal</button>
					<button type="submit" name="submit" class="btn btn-primary submit-btn">Submit</button>
				</div>
			</form>
		</div>
	</div>


	<!-- jual buku -->

	<?php
	include 'koneksi.php';

	if (isset($_POST['submit'])) {
		// Ambil data dari form
		$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
		$penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
		$genre = mysqli_real_escape_string($koneksi, $_POST['genre']);
		$kondisi = mysqli_real_escape_string($koneksi, $_POST['kondisi']);
		$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
		$sinopsis = mysqli_real_escape_string($koneksi, $_POST['sinopsis']);
		$harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
		$tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);

		// File Upload
		$fotoName = $_FILES['foto']['name'];
		$fotoTmp = $_FILES['foto']['tmp_name'];
		$fotoSize = $_FILES['foto']['size'];
		$fotoError = $_FILES['foto']['error'];
		$fotoType = $_FILES['foto']['type'];

		// Validasi file
		$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
		$fileExtension = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));

		if (in_array($fileExtension, $allowedExtensions) && $fotoError === 0 && $fotoSize <= 5242880) { // Maksimum 5MB
			$newFileName = uniqid('', true) . "." . $fileExtension;
			$uploadPath = 'img/' . $newFileName;

			if (move_uploaded_file($fotoTmp, $uploadPath)) {
				// Simpan ke database
				$query = "INSERT INTO jualbuku (judul, penulis, genre, kondisi, deskripsi, sinopsis,harga,tahun,foto) 
                      VALUES ('$judul', '$penulis', '$genre', '$kondisi', '$deskripsi', '$sinopsis','$harga','$tahun','$newFileName')";

				if (mysqli_query($koneksi, $query)) {
				} else {
					echo "<script>alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');</script>";
				}
			} else {
				echo "<script>alert('Gagal mengunggah file');</script>";
			}
		} else {
			echo "<script>alert('File tidak valid atau terlalu besar');</script>";
		}
	}
	?>












	</div><!--header-wrap-->

	<section id="billboard">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<button class="prev slick-arrow">
						<i class="icon icon-arrow-left"></i>
					</button>

					<div class="main-slider pattern-overlay">
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">Life of the Wild</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
									ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
									urna, a eu.</p>
								<div class="btn-wrap">
									<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content-->
							<img src="images/main-banner1.jpg" alt="banner" class="banner-image">
						</div><!--slider-item-->

						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">Birds gonna be Happy</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
									ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
									urna, a eu.</p>
								<div class="btn-wrap">
									<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content-->
							<img src="images/main-banner2.jpg" alt="banner" class="banner-image">
						</div><!--slider-item-->

					</div><!--slider-->

					<button class="next slick-arrow">
						<i class="icon icon-arrow-right"></i>
					</button>

				</div>
			</div>
		</div>

	</section>

	<section id="client-holder" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="logo-wrap">
						<div class="grid">
							<a href="#"><img src="images/client-image1.png" alt="client"></a>
							<a href="#"><img src="images/client-image2.png" alt="client"></a>
							<a href="#"><img src="images/client-image3.png" alt="client"></a>
							<a href="#"><img src="images/client-image4.png" alt="client"></a>
							<a href="#"><img src="images/client-image5.png" alt="client"></a>
						</div>
					</div><!--image-holder-->
				</div>
			</div>
		</div>
	</section>

	<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Featured Books</h2>
					</div>

					<div class="product-list" data-aos="fade-up">
						<div class="row">

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="images/product-item1.jpg" alt="Books" class="product-item">
										<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
											Cart</button>
									</figure>
									<figcaption>
										<h3>Simple way of piece life</h3>
										<span>Armor Ramsey</span>
										<div class="item-price">$ 40.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="images/product-item2.jpg" alt="Books" class="product-item">
										<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
											Cart</button>
									</figure>
									<figcaption>
										<h3>Great travel at desert</h3>
										<span>Sanchit Howdy</span>
										<div class="item-price">$ 38.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="images/product-item3.jpg" alt="Books" class="product-item">
										<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
											Cart</button>
									</figure>
									<figcaption>
										<h3>The lady beauty Scarlett</h3>
										<span>Arthur Doyle</span>
										<div class="item-price">$ 45.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="images/product-item4.jpg" alt="Books" class="product-item">
										<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
											Cart</button>
									</figure>
									<figcaption>
										<h3>Once upon a time</h3>
										<span>Klien Marry</span>
										<div class="item-price">$ 35.00</div>
									</figcaption>
								</div>
							</div>

						</div><!--ft-books-slider-->
					</div><!--grid-->


				</div><!--inner-content-->
			</div>

			<div class="row">
				<div class="col-md-12">

					<div class="btn-wrap align-right">
						<a href="#" class="btn-accent-arrow">View all products <i
								class="icon icon-ns-arrow-right"></i></a>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section id="best-selling" class="leaf-pattern-overlay">
		<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-8">

					<div class="row">

						<div class="col-md-6">
							<figure class="products-thumb">
								<img src="images/single-image.jpg" alt="book" class="single-image">
							</figure>
						</div>

						<div class="col-md-6">
							<div class="product-entry">
								<h2 class="section-title divider">Best Selling Book</h2>

								<div class="products-content">
									<div class="author-name">By Timbur Hood</div>
									<h3 class="item-title">Birds gonna be happy</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet,
										libero ipsum enim pharetra hac.</p>
									<div class="item-price">$ 45.00</div>
									<div class="btn-wrap">
										<a href="#" class="btn-accent-arrow">shop it now <i
												class="icon icon-ns-arrow-right"></i></a>
									</div>
								</div>

							</div>
						</div>

					</div>
					<!-- / row -->

				</div>

			</div>
		</div>
	</section>

	<section id="popular-books" class="bookshelf py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Popular Books</h2>
					</div>

					<ul class="tabs">
						<li data-tab-target="#all-genre" class="active tab">All Genre</li>
						<li data-tab-target="#business" class="tab">Business</li>
						<li data-tab-target="#technology" class="tab">Technology</li>
						<li data-tab-target="#romantic" class="tab">Romantic</li>
						<li data-tab-target="#adventure" class="tab">Adventure</li>
						<li data-tab-target="#fictional" class="tab">Fictional</li>
					</ul>



					<div class="tab-content">
						<!-- All Genre Section -->
						<div id="all-genre" data-tab-content class="active">
							<div class="row">
								<?php
								// Query to fetch all books
								$data = mysqli_query($koneksi, "SELECT * FROM jualbuku");

								// Loop through all data and display
								while ($baris = mysqli_fetch_array($data)) {
									?>
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<!-- Display image from the database -->
												<a href="detailproduct.php ?id=<?php echo $baris["id_peserta"]; ?>"><img
														src="img/<?php echo $baris['foto']; ?>" width="100" height="100"
														alt="Books" class="product-item">

												</a>

												<button type="button" class="add-to-cart"
													data-product-tile="add-to-cart">Add to Cart</button>
											</figure>
											<figcaption>
												<h3><?php echo $baris['judul']; ?></h3>
												<span><?php echo $baris['penulis']; ?></span><br>
												<span><?php echo $baris['kondisi']; ?></span>
												<span><?php echo $baris['genre']; ?></span>
												<div class="item-price">Rp</div>
											</figcaption>
										</div>
									</div>
									<?php
								} // End while loop
								?>
							</div>
						</div>

						<!-- Business Genre Section -->
						<div id="fictional" data-tab-content>
							<div class="row">
								<?php
								// Query for books in the business genre
								$data = mysqli_query($koneksi, "SELECT * FROM jualbuku WHERE genre LIKE 'fiction'");

								while ($baris = mysqli_fetch_array($data)) {
									?>
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<img src="img/<?php echo $baris['foto']; ?>" width="100" height="100"
													alt="Books" class="product-item">
												<button type="button" class="add-to-cart"
													data-product-tile="add-to-cart">Add to Cart</button>
											</figure>
											<figcaption>
												<h3><?php echo $baris['judul']; ?></h3>
												<span><?php echo $baris['penulis']; ?></span><br>
												<span><?php echo $baris['kondisi']; ?></span>
												<span><?php echo $baris['genre']; ?></span>
												<div class="item-price">Rp</div>
											</figcaption>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>

						<div id="business" data-tab-content>
							<div class="row">
								<?php
								// Query for books in the business genre
								$data = mysqli_query($koneksi, "SELECT * FROM jualbuku WHERE genre LIKE 'bussiness'");

								while ($baris = mysqli_fetch_array($data)) {
									?>
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<img src="img/<?php echo $baris['foto']; ?>" width="100" height="100"
													alt="Books" class="product-item">
												<button type="button" class="add-to-cart"
													data-product-tile="add-to-cart">Add to Cart</button>
											</figure>
											<figcaption>
												<h3><?php echo $baris['judul']; ?></h3>
												<span><?php echo $baris['penulis']; ?></span><br>
												<span><?php echo $baris['kondisi']; ?></span>
												<span><?php echo $baris['genre']; ?></span>
												<div class="item-price">Rp</div>
											</figcaption>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>


						<div id="adventure" data-tab-content>
							<div class="row">
								<?php
								// Query for books in the business genre
								$data = mysqli_query($koneksi, "SELECT * FROM jualbuku WHERE genre LIKE 'adventure'");

								while ($baris = mysqli_fetch_array($data)) {
									?>
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<img src="img/<?php echo $baris['foto']; ?>" width="100" height="100"
													alt="Books" class="product-item">
												<button type="button" class="add-to-cart"
													data-product-tile="add-to-cart">Add to Cart</button>
											</figure>
											<figcaption>
												<h3><?php echo $baris['judul']; ?></h3>
												<span><?php echo $baris['penulis']; ?></span><br>
												<span><?php echo $baris['kondisi']; ?></span>
												<span><?php echo $baris['genre']; ?></span>
												<div class="item-price">Rp</div>
											</figcaption>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>



						<div id="romantic" data-tab-content>
							<div class="row">
								<?php
								// Query for books in the business genre
								$data = mysqli_query($koneksi, "SELECT * FROM jualbuku WHERE genre LIKE 'romantic'");

								while ($baris = mysqli_fetch_array($data)) {
									?>
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<img src="img/<?php echo $baris['foto']; ?>" width="100" height="100"
													alt="Books" class="product-item">
												<button type="button" class="add-to-cart"
													data-product-tile="add-to-cart">Add to Cart</button>
											</figure>
											<figcaption>
												<h3><?php echo $baris['judul']; ?></h3>
												<span><?php echo $baris['penulis']; ?></span><br>
												<span><?php echo $baris['kondisi']; ?></span>
												<span><?php echo $baris['genre']; ?></span>
												<div class="item-price">Rp</div>
											</figcaption>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>

						<!-- Technology Genre Section -->
						<div id="technology" data-tab-content>
							<div class="row">
								<?php
								// Query for books in the technology genre
								$data = mysqli_query($koneksi, "SELECT * FROM jualbuku WHERE genre LIKE 'technology'");

								while ($baris = mysqli_fetch_array($data)) {
									?>
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<img src="img/<?php echo $baris['foto']; ?>" width="100" height="100"
													alt="Books" class="product-item">
												<button type="button" class="add-to-cart"
													data-product-tile="add-to-cart">Add to Cart</button>
											</figure>
											<figcaption>
												<h3><?php echo $baris['judul']; ?></h3>
												<span><?php echo $baris['penulis']; ?></span><br>
												<span><?php echo $baris['kondisi']; ?></span>
												<span><?php echo $baris['genre']; ?></span>
												<div class="item-price">Rp</div>
											</figcaption>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
	</section>

	<section id="quotation" class="align-center pb-5 mb-5">
		<div class="inner-content">
			<h2 class="section-title divider">Quote of the day</h2>
			<blockquote data-aos="fade-up">
				<q>“The more that you read, the more things you will know. The more that you learn, the more places
					you’ll go.”</q>
				<div class="author-name">Dr. Seuss</div>
			</blockquote>
		</div>
	</section>

	<section id="special-offer" class="bookshelf pb-5 mb-5">

		<div class="section-header align-center">
			<div class="title">
				<span>Grab your opportunity</span>
			</div>
			<h2 class="section-title">Books with offer</h2>
		</div>

		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="product-list" data-aos="fade-up">
						<div class="grid product-grid">
							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item5.jpg" alt="Books" class="product-item">
									<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
										Cart</button>
								</figure>
								<figcaption>
									<h3>Simple way of piece life</h3>
									<span>Armor Ramsey</span>
									<div class="item-price">
										<span class="prev-price">$ 50.00</span>$ 40.00
									</div>
							</div>
							</figcaption>

							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item6.jpg" alt="Books" class="product-item">
									<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
										Cart</button>
								</figure>
								<figcaption>
									<h3>Great travel at desert</h3>
									<span>Sanchit Howdy</span>
									<div class="item-price">
										<span class="prev-price">$ 30.00</span>$ 38.00
									</div>
							</div>
							</figcaption>

							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item7.jpg" alt="Books" class="product-item">
									<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
										Cart</button>
								</figure>
								<figcaption>
									<h3>The lady beauty Scarlett</h3>
									<span>Arthur Doyle</span>
									<div class="item-price">
										<span class="prev-price">$ 35.00</span>$ 45.00
									</div>
							</div>
							</figcaption>

							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item8.jpg" alt="Books" class="product-item">
									<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
										Cart</button>
								</figure>
								<figcaption>
									<h3>Once upon a time</h3>
									<span>Klien Marry</span>
									<div class="item-price">
										<span class="prev-price">$ 25.00</span>$ 35.00
									</div>
							</div>
							</figcaption>

							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item2.jpg" alt="Books" class="product-item">
									<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
										Cart</button>
								</figure>
								<figcaption>
									<h3>Simple way of piece life</h3>
									<span>Armor Ramsey</span>
									<div class="item-price">$ 40.00</div>
								</figcaption>
							</div>
						</div><!--grid-->
					</div>
				</div><!--inner-content-->
			</div>
		</div>
	</section>

	<section id="subscribe">
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-8">
					<div class="row">

						<div class="col-md-6">

							<div class="title-element">
								<h2 class="section-title divider">Subscribe to our newsletter</h2>
							</div>

						</div>
						<div class="col-md-6">

							<div class="subscribe-content" data-aos="fade-up">
								<p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit
									adipiscing enim pharetra hac.</p>
								<form id="form">
									<input type="text" name="email" placeholder="Enter your email addresss here">
									<button class="btn-subscribe">
										<span>send</span>
										<i class="icon icon-send"></i>
									</button>
								</form>
							</div>

						</div>

					</div>
				</div>

			</div>
		</div>
	</section>

	<section id="latest-blog" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Read our articles</span>
						</div>
						<h2 class="section-title">Latest Articles</h2>
					</div>

					<div class="row">

						<div class="col-md-4">

							<article class="column" data-aos="fade-up">

								<figure>
									<a href="#" class="image-hvr-effect">
										<img src="images/post-img1.jpg" alt="post" class="post-image">
									</a>
								</figure>

								<div class="post-item">
									<div class="meta-date">Mar 30, 2021</div>
									<h3><a href="#">Reading books always makes the moments happy</a></h3>

									<div class="links-element">
										<div class="categories">inspiration</div>
										<div class="social-links">
											<ul>
												<li>
													<a href="#"><i class="icon icon-facebook"></i></a>
												</li>
												<li>
													<a href="#"><i class="icon icon-twitter"></i></a>
												</li>
												<li>
													<a href="#"><i class="icon icon-behance-square"></i></a>
												</li>
											</ul>
										</div>
									</div><!--links-element-->

								</div>
							</article>

						</div>
						<div class="col-md-4">

							<article class="column" data-aos="fade-up" data-aos-delay="200">
								<figure>
									<a href="#" class="image-hvr-effect">
										<img src="images/post-img2.jpg" alt="post" class="post-image">
									</a>
								</figure>
								<div class="post-item">
									<div class="meta-date">Mar 29, 2021</div>
									<h3><a href="#">Reading books always makes the moments happy</a></h3>

									<div class="links-element">
										<div class="categories">inspiration</div>
										<div class="social-links">
											<ul>
												<li>
													<a href="#"><i class="icon icon-facebook"></i></a>
												</li>
												<li>
													<a href="#"><i class="icon icon-twitter"></i></a>
												</li>
												<li>
													<a href="#"><i class="icon icon-behance-square"></i></a>
												</li>
											</ul>
										</div>
									</div><!--links-element-->

								</div>
							</article>

						</div>
						<div class="col-md-4">

							<article class="column" data-aos="fade-up" data-aos-delay="400">
								<figure>
									<a href="#" class="image-hvr-effect">
										<img src="images/post-img3.jpg" alt="post" class="post-image">
									</a>
								</figure>
								<div class="post-item">
									<div class="meta-date">Feb 27, 2021</div>
									<h3><a href="#">Reading books always makes the moments happy</a></h3>

									<div class="links-element">
										<div class="categories">inspiration</div>
										<div class="social-links">
											<ul>
												<li>
													<a href="#"><i class="icon icon-facebook"></i></a>
												</li>
												<li>
													<a href="#"><i class="icon icon-twitter"></i></a>
												</li>
												<li>
													<a href="#"><i class="icon icon-behance-square"></i></a>
												</li>
											</ul>
										</div>
									</div><!--links-element-->

								</div>
							</article>

						</div>

					</div>

					<div class="row">

						<div class="btn-wrap align-center">
							<a href="#" class="btn btn-outline-accent btn-accent-arrow" tabindex="0">Read All Articles<i
									class="icon icon-ns-arrow-right"></i></a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section id="download-app" class="leaf-pattern-overlay">
		<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="row">

						<div class="col-md-5">
							<figure>
								<img src="images/device.png" alt="phone" class="single-image">
							</figure>
						</div>

						<div class="col-md-7">
							<div class="app-info">
								<h2 class="section-title divider">Download our app now !</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus
									liberolectus nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna.
									Adipiscing fames semper erat ac in suspendisse iaculis.</p>
								<div class="google-app">
									<img src="images/google-play.jpg" alt="google play">
									<img src="images/app-store.jpg" alt="app store">
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<div class="container">
			<div class="row">

				<div class="col-md-4">

					<div class="footer-item">
						<div class="company-brand">
							<img src="images/main-logo.png" alt="logo" class="footer-logo">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus
								nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames
								semper erat ac in suspendisse iaculis.</p>
						</div>
					</div>

				</div>

				<div class="col-md-2">

					<div class="footer-menu">
						<h5>About Us</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="#">vision</a>
							</li>
							<li class="menu-item">
								<a href="#">articles </a>
							</li>
							<li class="menu-item">
								<a href="#">careers</a>
							</li>
							<li class="menu-item">
								<a href="#">service terms</a>
							</li>
							<li class="menu-item">
								<a href="#">donate</a>
							</li>
						</ul>
					</div>

				</div>
				<div class="col-md-2">

					<div class="footer-menu">
						<h5>Discover</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="#">Home</a>
							</li>
							<li class="menu-item">
								<a href="#">Books</a>
							</li>
							<li class="menu-item">
								<a href="#">Authors</a>
							</li>
							<li class="menu-item">
								<a href="#">Subjects</a>
							</li>
							<li class="menu-item">
								<a href="#">Advanced Search</a>
							</li>
						</ul>
					</div>

				</div>
				<div class="col-md-2">

					<div class="footer-menu">
						<h5>My account</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="#">Sign In</a>
							</li>
							<li class="menu-item">
								<a href="#">View Cart</a>
							</li>
							<li class="menu-item">
								<a href="#">My Wishtlist</a>
							</li>
							<li class="menu-item">
								<a href="#">Track My Order</a>
							</li>
						</ul>
					</div>

				</div>
				<div class="col-md-2">

					<div class="footer-menu">
						<h5>Help</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="#">Help center</a>
							</li>
							<li class="menu-item">
								<a href="#">Report a problem</a>
							</li>
							<li class="menu-item">
								<a href="#">Suggesting edits</a>
							</li>
							<li class="menu-item">
								<a href="#">Contact us</a>
							</li>
						</ul>
					</div>

				</div>

			</div>
			<!-- / row -->

		</div>
	</footer>

	<div id="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="copyright">
						<div class="row">

							<div class="col-md-6">
								<p>© 2022 All rights reserved. Free HTML Template by <a
										href="https://www.templatesjungle.com/" target="_blank">TemplatesJungle</a></p>
							</div>

							<div class="col-md-6">
								<div class="social-links align-right">
									<ul>
										<li>
											<a href="#"><i class="icon icon-facebook"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-twitter"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-youtube-play"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-behance-square"></i></a>
										</li>
									</ul>
								</div>
							</div>

						</div>
					</div><!--grid-->

				</div><!--footer-bottom-content-->
			</div>
		</div>
	</div>

	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>
	<script>
		const userIcon = document.getElementById("user-icon");
		const dropdownMenu = document.getElementById("dropdown-menu");

		// Toggle Dropdown Menu saat User Icon diklik
		userIcon.addEventListener("click", function (event) {
			event.preventDefault();
			dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
		});

		// Menutup dropdown saat klik di luar area dropdown
		window.addEventListener("click", function (event) {
			if (!event.target.closest('.user-dropdown')) {
				dropdownMenu.style.display = "none";
			}
		});
	</script>



	<script>
		document.addEventListener('DOMContentLoaded', function () {
			// Modify the +Jual link to open the modal
			const sellLink = document.querySelector('.menu-item.has-sub a[href="#"]');
			if (sellLink) {
				sellLink.addEventListener('click', function (e) {
					e.preventDefault();
					document.getElementById('sellBookModal').style.display = 'block';
				});
			}
		});
	</script>
	<script>
		// Buka modal
		function openSellModal() {
			document.getElementById('sellBookModal').style.display = 'block';
		}

		// Tutup modal
		function closeSellModal() {
			document.getElementById('sellBookModal').style.display = 'none';
		}

		// Tutup modal saat klik di luar modal
		window.onclick = function (event) {
			const modal = document.getElementById('sellBookModal');
			if (event.target == modal) {
				closeSellModal();
			}
		}
	</script>

</body>

</html>