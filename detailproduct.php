<?php 
include 'koneksi.php';
?>

<?php
$id_peserta=$_GET["id"];

$ambil=$koneksi->query("SELECT * FROM jualbuku WHERE id_peserta=$id_peserta");
$detail=$ambil->fetch_assoc();
echo"<pre>";
print_r($detail);
echo"</pre>";
?>


<?php 



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Vintage Book Detail</title>
	<style>
		/* Vintage color palette */
		:root {
			--sepia: #704214;
			--cream: #F5E6D3;
			--vintage-gold: #D4AF37;
			--old-paper: #F4E4BC;
			--dark-brown: #2B1810;
			--light-cream: #FAF3E3;
		}

		body {
			background: var(--light-cream);
			font-family: 'Georgia', serif;
			margin: 0;
			padding: 20px;
		}

		.product-container {
			max-width: 1200px;
			margin: 40px auto;
			background: var(--cream);
			border-radius: 12px;
			padding: 40px;
			box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
			position: relative;
		}

		/* Ornamental frame */
		.product-container::before {
			content: '';
			position: absolute;
			top: 20px;
			left: 20px;
			right: 20px;
			bottom: 20px;
			border: 2px solid var(--vintage-gold);
			border-radius: 8px;
			pointer-events: none;
		}

		.product-layout {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 60px;
			position: relative;
			z-index: 1;
		}

		.product-image-section {
			position: relative;
		}

		.main-image {
			width: 100%;
			height: auto;
			/* Menjaga aspek rasio gambar */
			max-height: 800px;
			/* Atur batas maksimum tinggi gambar untuk menjaga ukuran */
			object-fit: cover;
			/* Memastikan gambar terpotong dengan baik jika tidak pas */
			border-radius: 8px;
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
			border: 5px solid white;
		}


		.image-decorator {
			position: absolute;
			width: 100px;
			height: 100px;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M0,0 C30,10 70,10 100,0 C90,30 90,70 100,100 C70,90 30,90 0,100 C10,70 10,30 0,0' fill='%23D4AF37' opacity='0.2'/%3E%3C/svg%3E");
			background-size: contain;
		}

		.decorator-1 {
			top: -20px;
			left: -20px;
		}

		.decorator-2 {
			bottom: -20px;
			right: -20px;
			transform: rotate(180deg);
		}

		.product-info {
			padding: 20px;
		}

		.product-category {
			color: var(--vintage-gold);
			font-style: italic;
			font-size: 1.1rem;
			margin-bottom: 10px;
		}

		.product-title {
			font-family: 'Playfair Display', serif;
			color: var(--sepia);
			font-size: 2.5rem;
			margin: 20px 0;
			position: relative;
			line-height: 1.2;
		}

		.product-title::after {
			content: '';
			display: block;
			width: 100px;
			height: 3px;
			background: linear-gradient(90deg, var(--vintage-gold), transparent);
			margin: 15px 0;
		}

		.product-price {
			font-size: 2.2rem;
			color: var(--sepia);
			font-weight: bold;
			margin: 25px 0;
			font-family: 'Playfair Display', serif;
			display: flex;
			align-items: baseline;
			gap: 10px;
		}

		.original-price {
			font-size: 1.3rem;
			text-decoration: line-through;
			color: #888;
		}

		.product-description {
			color: var(--dark-brown);
			font-size: 1.1rem;
			line-height: 1.8;
			margin: 30px 0;
			padding-bottom: 30px;
			border-bottom: 1px solid var(--vintage-gold);
		}

		.product-meta {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 20px;
			margin: 30px 0;
		}

		.meta-item {
			display: flex;
			flex-direction: column;
			gap: 5px;
		}

		.meta-label {
			color: var(--vintage-gold);
			font-size: 0.9rem;
			font-weight: bold;
		}

		.meta-value {
			color: var(--sepia);
			font-size: 1.1rem;
		}

		.action-buttons {
			display: flex;
			gap: 20px;
			margin-top: 40px;
		}

		.buy-button,
		.wishlist-button {
			padding: 15px 40px;
			border-radius: 30px;
			font-size: 1.1rem;
			cursor: pointer;
			transition: all 0.3s ease;
			font-family: 'Georgia', serif;
			text-transform: uppercase;
			letter-spacing: 1px;
		}

		.buy-button {
			background: var(--vintage-gold);
			color: white;
			border: none;
			flex: 2;
		}

		.wishlist-button {
			background: transparent;
			color: var(--sepia);
			border: 2px solid var(--vintage-gold);
			flex: 1;
		}

		.buy-button:hover {
			background: var(--sepia);
			transform: translateY(-2px);
		}

		.wishlist-button:hover {
			background: var(--vintage-gold);
			color: white;
		}

		.condition-badge {
			display: inline-block;
			background: var(--vintage-gold);
			color: white;
			padding: 8px 20px;
			border-radius: 20px;
			font-size: 0.9rem;
			margin-bottom: 20px;
		}

		@media (max-width: 768px) {
			.product-layout {
				grid-template-columns: 1fr;
				gap: 30px;
			}

			.main-image {
				height: 400px;
			}

			.product-container {
				padding: 20px;
			}
		}
	</style>
</head>

<body>
	<?php require "navbar.php" ?>
	<div class="product-container">
		<div class="product-layout">
			<div class="product-image-section">
				<div class="image-decorator decorator-1"></div>
				<img src="img/<?php echo $detail["foto"];?>" alt="First Edition Book" class="main-image" class="img-responsive">
				<div class="image-decorator decorator-2"></div>
			</div>

			<div class="product-info">
				<div class="product-category">
					<?php echo $detail["genre"];?></div>
				<span class="condition-badge"><?php echo $detail["kondisi"];?></span>
				<h1 class="product-title"><?php echo $detail["judul"];?></h1>

				<div class="product-price">
					<span class="original-price"></span>
					Rp.<?php echo $detail["harga"];?>
				</div>

				<p class="product-description">
				<?php echo $detail["sinopsis"];?>
				</p>

				<div class="product-meta">
					<div class="meta-item">
						<span class="meta-label">Publisher</span>
						<span class="meta-value"><?php echo $detail["judul"];?></span>
					</div>
					<div class="meta-item">
						<span class="meta-label">Year</span>
						<span class="meta-value"><?php echo $detail["tahun"];?></span>
					</div>
				
					<div class="meta-item">
						<span class="meta-label">Pages</span>
						<span class="meta-value">854</span>
					</div>
				</div>

				<div class="action-buttons">
					<button class="buy-button">Add to Cart</button>
					<button class="wishlist-button">Wishlist</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>