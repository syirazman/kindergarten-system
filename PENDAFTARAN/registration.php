<?php include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <script src="https://kit.fontawesome.com/7a009050af.js" crossorigin="anonymous"></script>
    
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="registration.css">
        
        <title>Registration</title>
    </head>
    <body> 
	<center><img src="img/258425.svg" alt="tadika" style="padding-top: 30px; width: 150x; height: 150px"></center>
	<br><br>

<!----Registration section--->		
<div class="container">
		<div class="card">
			<h2 class="card-header">Maklumat Murid</h2>
		<div class="card-body">
			
	<form class="row g-3">

			<div class="col-md-8">
			  <label for="validationDefault08" class="form-label">Nama</label>
			  <input type="text" name="name" class="form-control" id="validationDefault01" value="" required>
			</div>

			<div class="col-md-4">
			  <label for="validationDefault09" class="form-label">No Mykid</label>
			  <input type="text" name="IdNo" class="form-control" id="validationDefault02" value="" required>
			</div>
			<br>
			<br>
			<div class="col-md-3">
				<label for="validationDefault10" class="form-label">Umur</label>
				<input type="text" name="age" class="form-control" id="validationDefault02" value="" required>
			  </div>
			
			  <div class="col-md-4">
				<label for="validationDefault11" class="form-label">Tarikh Lahir</label>
				<input type="date" name="dob" class="form-control" id="validationDefault02" value="" required>
			  </div>

			  <div class="col-md-4">
				<label for="validationDefault11" class="form-label">No Surat Beranak</label>
				<input type="text" name="birth" class="form-control" id="validationDefault02" value="" required>
			  </div>

			  <div class="col-md-4">
				<label for="validationDefault12" class="form-label">Jantina</label>
				<select class="form-select"  name="gender" id="validationDefault04" required>
				  <option selected disabled value="">Pilih</option>
				  <option>Lelaki</option>
				  <option>Perempuan</option>
				</select>
			  </div>

			  <div class="col-md-3">
				<label for="validationDefault13" class="form-label">Kewarganegaraan</label>
				<select class="form-select" name="nationality" id="validationDefault04" required>
				  <option selected disabled value="">Pilih</option>
				  <option>Warganegara</option>
				  <option>Bukan warganegara</option>
				</select>
			  </div>

			  <div class="col-md-3">
				<label for="validationDefault14" class="form-label">Agama</label>
				<select class="form-select" name="religion" id="validationDefault04" required>
				  <option selected disabled value="">Pilih</option>
				  <option>Islam</option>
				  <option>Buddha</option>
				  <option>Hindu</option>
				  <option>Kristian</option>
				  <option>Sikh</option>
				  <option>Others</option>
				</select>
			  </div>

			  <div>
				<label for="inputAddress" class="form-label">Alamat</label>
				<input type="text" name=" address" class="form-control" id="inputAddress" placeholder="">
			  </div>

			<div class="col-md-4">
			  <label for="validationDefault15" class="form-label">Bandar</label>
			  <input type="text" name="city" class="form-control" id="validationDefault03" required>
			</div>

			<div class="col-md-4">
			  <label for="validationDefault16" class="form-label">Negeri</label>
			  <select class="form-select" name="state" id="validationDefault04" required>
				<option selected disabled value="">Pilih</option>
				<option>Johor</option>
		  		<option>Kedah</option>
		  		<option>Kelantan</option>
		  		<option>Melaka</option>
		  		<option>Negeri Sembilan</option>
		  		<option>Pahang</option>
		  		<option>Pulau Pinang</option>
		  		<option>Perak</option>
		  		<option>Perlis</option>
		  		<option>Sabah</option>
		  		<option>Sarawak</option>
		  		<option>Selangor</option>
		  		<option>Terengganu</option>
		  		<option>Kuala Lumpur</option>
		  		<option>Labuan</option>
		  		<option>Putrajaya</option>
			  </select>
			</div>

			<div class="col-md-4">
			  <label for="validationDefault17" class="form-label">Poskod</label>
			  <input type="number" name="postal_code" class="form-control" id="validationDefault05" required>
			</div>

			<h2 class="card-header">Maklumat Penjaga</h2>
		<div class="col-md-6">
		  <label for="validationDefault01" class="form-label">Nama Penjaga</label>
		  <input type="text" name="guardian" class="form-control" id="validationDefault01" value="" required>
		</div>

		<div class="col-md-3">
			<label for="validationCustom02" class="form-label">No IC</label>
			<input type="text" name="noic" class="form-control" id="validationCustom02" placeholder="cth:XXXXXX-XX-XXXX" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" required>
			<div class="valid-feedback">
			</div>
		  </div>

		  <div class="col-md-3">
			<label for="validationCustom03" class="form-label">No Telefon</label>
			<input type="text" name="phone" class="form-control" id="validationCustom02" placeholder="cth:XXX-XXXXXXX" pattern="[0-9]{3}-[0-9]{7}" required>
			<div class="valid-feedback">
			</div>
		  </div>

		  <div class="col-md-4">
			<label for="validationCustom03" class="form-label">Pekerjaan</label>
			<input type="text" name="work" class="form-control" id="validationCustom02" value="" required>
			<div class="valid-feedback">
			</div>
		  </div>

		  <div class="col-md-4">
			<label for="validationCustom04" class="form-label">Hubungan antara murid</label>
			<input type="text" name="relate" class="form-control" id="validationCustom02" value="" required>
			<div class="valid-feedback">
			</div>
		  </div>
		  <div class="col-md-4">
			<label for="validationCustom05" class="form-label">Email</label>
			<input type="text" name="email" class="form-control" id="validationCustom02" value="" required>
			<div class="valid-feedback">
			</div>
		  </div>

		<div class="col-12">
		  <button class="btn btn-primary" name="submit" type="submit">Submit</button>
		</div>

	  </form>
	  </div>
</div>
</div>

<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright: Tabika Kemas Penjara Kajang
  <h5>Ibu Pejabat Penjara Malaysia, Kajang. Semenyih Bypass,</h5>
  <h5>43000 Kajang,</h5>
  <h5>Selangor Darul Ehsan</h5></div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="src/main.js"></script>
</body>
</html>
        