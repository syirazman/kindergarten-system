
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <script src="https://kit.fontawesome.com/7a009050af.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        

        <title>Profile Guru</title>
    </head>
    <body> 

    <?php include 'navbar.php' ?>
      
	<h1>Profile</h1>
  <div class="container">
	<div class="card">
        <div class="card-header">
          <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <label for="validationCustom01">Name</label>
                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Name" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                <br>
                <div class="form-row">
                <div class="col-md-6">
                    <label for="validationCustomEmail">Email</label>
                    <div class="input-group">
                      <input type="text" name="email" class="form-control" id="validationCustomEmail" placeholder="Email" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Sila isi Email anda.
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustomMobile">Nombor Telefon</label>
                    <div class="input-group">
                      <input type="tel" name="phone" class="form-control" id="validationCustomMobile" placeholder="Phone" aria-describedby="inputGroupPrepend" pattern="[0-9]{3}-[0-9]{3}[0-9]{4}" required>
                      <div class="invalid-feedback">
                        Sila lengkapkan nombor telefon anda.
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="form-row">
                    <label for="validationCustom03">Alamat</label>
                    <input type="text" name="address" class="form-control" id="validationCustom03" placeholder="Alamat" required>
                    <div class="invalid-feedback">
                      Sila isi Alamat Penuh anda.
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-6">
                    <label for="validationCustomCity">Bandar</label>
                    <input type="text" name="city" class="form-control" id="validationCustomCity" placeholder="Bandar" required>
                    <div class="invalid-feedback">
                    Sila isi Bandar pada kotak kosong.
                    </div>
                    </div>
                  <div class="col-md-4">
                    <label for="validationCustom04">Negeri</label>
                    <input type="text" name="state" class="form-control" id="validationCustom04" placeholder="Negeri" required>
                    <div class="invalid-feedback">
                      Sila isi Negeri pada kotak kosong.
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label for="validationCustom05">Poskod</label>
                    <input type="number" name="code" class="form-control" id="validationCustom05" placeholder="Poskod" required>
                    <div class="invalid-feedback">
                      sila isi poskod alamat anda.
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="col-12">
    <button class="btn btn-primary" type="submit" name="update">Update</button>
  </div>
              </form>
            </div>
            </div>
  </div>
      
              
              <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
              
              </script>
          
</body>
</html>