 	<!DOCTYPE html>
 	<html lang="en">

 	<head>
 		<title>CSS Template</title>
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<style>
 			* {
 				box-sizing: border-box;
 			}

 			body {
 				font-family: Arial, Helvetica, sans-serif;
 			}

 			/* Style the header */
 			header {
 				background-color: #666;
 				background-image: url('http://localhost/belajarcrud_ci/gambar/Untitled.png');
 				padding: 60px;
 				text-align: center;
 				font-size: 35px;
 				color: white;
 			}

 			/* Create two columns/boxes that floats next to each other */
 			nav {
 				float: left;
 				width: 20%;
 				height: 500px;
 				/* only for demonstration, should be removed */
 				background: #ccc;
 				padding: 20px;
 			}

 			/* Style the list inside the menu */
 			nav ul {
 				list-style-type: none;
 				padding: 0;
 			}

 			article {
 				float: left;
 				padding: 50px;
 				width: 70%;
 				background-color: #fff;
 				position: center;
 				height: 500px;
 				/* only for demonstration, should be removed */
 			}

 			/* Clear floats after the columns */
 			section::after {
 				content: "";
 				display: table;
 				clear: both;
 			}

 			/* Style the footer */
 			footer {
 				background-color: black;
 				padding: 10px;
 				text-align: center;
 				color: white;
 			}

 			/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
 			@media (max-width: 600px) {

 				nav,
 				article {
 					width: 100%;
 					height: auto;
 				}
 			}

 			table {
 				width: 1000px;
 				height: 200px;
 			}
 		</style>
 	</head>

 	<body>

 		<header>
 			<h2>Aplikasi Belajar Crud CI3</h2>
 		</header>

 		<section>
 			<nav>
 				<ul>
 					<li>
 						<h3><a href=""><img src="http://localhost/belajarcrud_ci/gambar/OIP%20(1).jpg" width="50px" height="30px">
 								USER
 							</a></h3>
 					</li>
 					<hr>
 				</ul>
 			</nav>
 			<article>

 				<h4 style="color:blue;"> <?php echo $judul . '<small></h4>>> ' . $sub . '</small><br><br>' ?>
 					<a href="<?= site_url('User/create'); ?>" title="Tambah Data"> <button type="button" style="background-color: green;color:white;width:90px;height: 30px;">Tambah</button> </a>
 					<hr>
 					<!--Table-->
 					<?= $this->session->flashdata('pesan'); ?>
 					<?= $this->session->flashdata('pesan2'); ?>
 					<?= $this->session->flashdata('pesan3'); ?>
 					<br><br>
 					<table border="1" width=70%>
 						<tr style="background-color: yellow;">
 							<th>No</th>
 							<th>Kode</th>
 							<th>Nama</th>
 							<th>HP</th>
 							<th>Email</th>
 							<th>Aksi</th>
 						</tr>
 						<?php
							$no = 1;
							foreach ($all->result_array() as $row) {
							?>
 							<tr>
 								<td><?php echo $no; ?></td>
 								<td><?php echo $row['kd_user'] ?></td>
 								<td><?php echo $row['nm_user'] ?></td>
 								<td><?php echo $row['hp_user'] ?></td>
 								<td><?php echo $row['email_user'] ?></td>
 								<td>
 									<a href="<?= site_url('User/edit/' . $row['kd_user']) ?>" title="Edit"><button type="button" style="background-color: blue;color:white;">Ubah</button></a>

 									<a href="<?= site_url('User/delete/' . $row['kd_user']) ?>" title="Delete" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $row['kd_user']; ?>')"><button type="button" style="background-color: red;color:white;">Hapus</button></a>
 								</td>
 							</tr>
 						<?php
								$no++;
							}
							?>
 					</table>
 					<!--EndTable-->
 			</article>
 		</section>

 		<footer>
 			<p>Footer</p>
 		</footer>

 	</body>

 	</html>