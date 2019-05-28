<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Gifood</title>
  
  
  
      <link rel="stylesheet" href="css/form.css">

  
</head>

<body>

  <div class="container">  
  <form id="contact" action="test.php" method="post">
    <h3>Bagikan Makanan</h3>
    <h4>Saya punya makanan untuk dibagikan</h4>
    <fieldset>
      <input placeholder="Nama Makanan" type="text" name="nama_makanan"  tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Deskripsi Makanan" type="text" name="deskripsi_makanan" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Jumlah Porsi" type="text" name="jumlah_porsi"  tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Dapat Diambil di... " type="text" name="lokasi" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input placeholder="Kota" type="text" tabindex="5" name="kota" required></input>
    </fieldset>
    <fieldset>
      <input placeholder="Dapat Diambil sebelum.." type="date" tabindex="5" name="tanggal" required></input>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <p class="copyright">Designed by <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a></p>
  </form>
</div>
  
  

</body>

</html>
