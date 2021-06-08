<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <script src="https://kit.fontawesome.com/7a009050af.js" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/text.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Maklumat murid</title>
</head>
<body id="body-pd"> 
<style>
  .modal-dialog{
    max-width: 80%;
  }
</style>

      <div class="container" style="padding-bottom:50px;">
          <div class="card">
              <div class="card-header">
                <h2>Maklumat Murid</h2>
              </div>
              <br>
              <div class="card-body">
                  <form class="row g-3 needs-validation" method="post" id="add_student">
                    <div>
                      <label for="validationCustom01" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="std_nama" name="std_nama" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom02" class="form-label">Umur</label>
                      <input type="number" class="form-control" id="std_umur" name="std_umur" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom02" class="form-label">Tarikh Lahir</label>
                      <input type="date" class="form-control" id="std_tarikh_lahir" name="std_tarikh_lahir" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
                    <br>

                    <div>
                      <label for="validationCustom04" class="form-label">Jantina</label><br>
                      <input type="radio" class="std_jantina" name="std_jantina" value="lelaki" required>
                      <label for="lelaki">Lelaki</label>
                      <input type="radio" class="std_jantina" name="std_jantina" value="perempuan" required>
                      <label for="perempuan">Perempuan</label>
                      <div class="invalid-feedback">
                        Sila nyatakan jantina pelajar.
                      </div>
                    </div>
                    <br>

                    <div>
                      <label for="validationCustom03" class="form-label">MyKid</label>
                      <input type="text" class="form-control" id="mykid" name="mykid" placeholder="cth:XXXXXX-XX-XXXX" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" required>
                      <div class="invalid-feedback">
                        Sila nyatakan no sijil kelahiran pelajar.
                      </div>
                    </div>
                    <br>

                    <div>
                      <label for="validationCustom03" class="form-label">No Sijil Kelahiran</label>
                      <input type="text" class="form-control" id="std_no_sijil" name="std_no_sijil" required>
                      <div class="invalid-feedback">
                        Sila nyatakan no sijil kelahiran pelajar.
                      </div>
                    </div>
                    <br>

                    <div>
                      <label for="validationCustom04" class="form-label">Kewarganegaraan</label><br>
                      <input type="radio" class="std_kewarganegaraan" name="std_kewarganegaraan" value="warganegara" required>
                      <label for="warganegara">Warganegara</label>
                      <input type="radio" class="std_kewarganegaraan" name="std_kewarganegaraan" value="Bukan warganegaraan" required>
                      <label for="bukan warganegara">Bukan Warganegara</label>
                      <div class="invalid-feedback">
                        Sila nyatakan kewarganegaraan pelajar.
                      </div>
                    </div>
                    <br>

                    <div>
                      <label for="validationCustom04" class="form-label">Agama</label>
                      <select class="form-select" id="std_agama" name="std_agama" required>
                        <option selected disabled value="">Choose</option>
                        <option value="Islam">Islam</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Kristian">Kristian</option>
                        <option value="Sikh">Sikh</option>
                        <option value="Others">Lain-lain</option>
                      </select>
                    </div>
                      <div class="invalid-feedback">
                        Sila nyatakan agama pelajar.
                      </div> 
                    <div>
                      <label for="validationCustom05" class="form-label">Sila nyatakan jika lain-lain</label>
                      <input type="text" class="form-control" id="std_comment" name="std_comment">
                      <div class="invalid-feedback">
                        Sila nyatakan agama pelajar.
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom03" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="std_alamat" name="std_alamat" required>
                      <div class="invalid-feedback">
                        Sila nyatakan alamat.
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom03" class="form-label">Bandar</label>
                      <input type="text" class="form-control" id="std_bandar" name="std_bandar" required>
                      <div class="invalid-feedback">
                        Please provide a valid city.
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom04" class="form-label">Negeri</label>
                      <select class="form-select" id="std_negeri" name="std_negeri" required>
                        <option selected disabled value="">Choose</option>
                        <option value="Johor">Johor</option>
                        <option value="Kedah">Kedah</option>
                        <option value="Kelantan">Kelantan</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                        <option value="Pahang">Pahang</option>
                        <option value="Pulau Pinang">Pulau Pinang</option>
                        <option value="Perak">Perak</option>
                        <option value="Perlis">Perlis</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Selangor">Selangor</option>
                        <option value="Terengganu">Terengganu</option>
                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                        <option value="Labuan">Labuan</option>
                        <option value="Putrajaya">Putrajaya</option>
                      </select><br><br>
                      <div class="invalid-feedback">
                        Please select a valid state.
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom03" class="form-label">Poskod</label>
                      <input type="number" class="form-control" id="std_poskod" name="std_poskod" pattern="[0-9]{5}"required>
                      <div class="invalid-feedback">
                        Sila nyatakan poskod.
                      </div>
                    </div>

                  <div class="card-header">
                      <h2>Maklumat Penjaga</h2>
                  </div>
                  <br>
                    <div>
                      <label for="validationCustom01" class="form-label">Nama Penjaga</label>
                      <input type="text" class="form-control" id="penjaga" name="penjaga" required>
                      <div class="valid-feedback">
                        Looks good! 
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom02" class="form-label">No Kad Pengenalan</label>
                      <input type="text" class="form-control" id="no_ic" name="no_ic" placeholder="cth:XXXXXX-XX-XXXX" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" required>
                      <div class="valid-feedback">
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom02" class="form-label">Hubungan antara  murid</label>
                      <input type="text" class="form-control" id="status" name="status" required>
                      <div class="valid-feedback">
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom02" class="form-label">No Telefon</label>
                      <input type="text" class="form-control" id="no_telefon" name="no_telefon" placeholder="cth:XXX-XXXXXXXX" pattern="[0-9]{3}-[0-9]{7}"required>
                      <div class="valid-feedback">
                      </div>
                    </div>

                    <div>
                      <label for="validationCustom02" class="form-label">Pekerjaan</label>
                      <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                      <div class="valid-feedback">
                      </div>
                    </div>
                    
                    <div>
                      <button class="btn btn-primary" type="submit">Save</button><br><br>
                    </div>

                  </form>
              </div>
          </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h5 class="modal-title" id="exampleModalLongTitle">Pendaftaran Berjaya!</h5> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <h5>PENDAFTARAN ANDA TELAH BERJAYA DAN MASIH DALAM PROSES</h5>
              <h5>BOLEH MEMBUAT PEMBAYARAN YURAN PENDAFTARAN MURID PADA AKAUN:</h5>
              <h5>MAYBANK - 12237823728</h5>
              <h5>* RM50</h5>
              <h5>SEBARANG MAKLUMAT AKAN DIMAKLUMKAN MELALUI <br> EMAIL DAN GROUP WHATSAPP TADIKA KAMI</h5>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>

</body>
<script>
  $(document).ready(function(){
    // alert('dwad');
    $('form').on('submit', function(e){
      // alert('dwa');.
      $('#exampleModalCenter').modal('show');

      e.preventDefault();
      $.ajax({
          type: "POST",
          url: "action_query/add_student.php",
          data: {
            std_nama: $('#std_nama').val(),
            std_umur: $('#std_umur').val(),
            std_tarikh_lahir: $('#std_tarikh_lahir').val(),
            std_jantina: $('.std_jantina:checked').val(),
            std_no_sijil: $('#std_no_sijil').val(),
            std_kewarganegaraan: $('.std_kewarganegaraan:checked').val(),
            std_agama: $('#std_agama').val(),
            std_comment: $('#std_comment').val(),
            std_alamat: $('#std_alamat').val(),
            std_bandar: $('#std_bandar').val(),
            std_negeri: $('#std_negeri').val(),
            std_poskod: $('#std_poskod').val(),
            penjaga: $('#penjaga').val(),
            no_ic: $('#no_ic').val(),
            status: $('#status').val(),
            no_telefon: $('#no_telefon').val(),
            pekerjaan: $('#pekerjaan').val(),
            mykid: $('#mykid').val(),
          },
          success: function(response){
          },
          error: function(response){
          }
      });

      $('form').trigger("reset");

    });
  })
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="/src/main.js"></script>
</body>
</html>
        
        
        


