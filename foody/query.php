



<html>

<link rel="stylesheet" type="text/css" href="style.css">
<head>
  <title>Tes</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>
<body>
<div class="header">
  <a href="#default" class="logo">Selamat Datang di Sistem Foody</a>
  <div class="header-right">
    <a class="active" href="index.php">Home</a>
    <a href="query.php">Studi Kasus</a>
    <a href="form1.php">Tambah Instance</a>
  </div>
</div>

    <div class="row content">
      <div class="large-8 columns large-centered">
        <div class="callout">
          <form method="GET" action="#">
            <div class="dropdown" style="left: 200px">
              <button class="dropbtn">List Query</button>
              <div class="dropdown-content">
                <a href="#" onclick="query1()">Studi Kasus 1</a>
                <a href="#" onclick="query2()">Studi Kasus 2</a>
                <a href="#" onclick="query3()">Studi Kasus 3</a>
                <a href="#" onclick="query4()">Studi Kasus 4</a>
                <a href="#" onclick="query5()">Studi Kasus 5</a>
                <a href="#" onclick="query6()">Studi Kasus 6</a>
                <a href="#" onclick="query7()">Studi Kasus 7</a>
                <a href="#" onclick="query8()">Studi Kasus 8</a>
                <a href="#" onclick="query9()">Studi Kasus 9</a>
                <a href="#" onclick="query10()">Studi Kasus 10</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="ex1" class="modal" style="width: 500px;">
     <div class="row">
      <div class="large-10 columns large-centered">
      </div>
      <div id="judul" style="left: 1000px"></div>
      <br>
      <div id="penjelasan" style="left: 1000px"></div>
      <hr>
      <div id="disini" style="left: 1000px"></div>
    </div>
  </div>







  <script
  src="jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script type="text/javascript">


    function query1()
    {
      $.ajax("query1.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan Bahan yang dipakai untuk Makanan dengan cara penyajian di Rebus";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT ?name<br/>
        WHERE {<br/>
          &emsp; ?Bahan foo:DiRebus ?Makanan.<br/>
          &emsp; ?Bahan rdfs:label ?name .<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }



  </script>

  <script type="text/javascript">

    function query2()
    {
      $.ajax("query2.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan Makanan yang dikemas menggunakan Daun Pisang";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT ?nama<br/>
        WHERE {<br/>
        &emsp;  ?Makanan foo:DiKemas ?Kemasan.<br/>
        &emsp;  ?Makanan foo:DiKemas foo:Daun_Pisang.<br/>
        &emsp;  ?Makanan rdfs:label ?nama.<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }

  </script>

  <script type="text/javascript">

    function query3()
    {
      $.ajax("query3.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan Makanan yang memiliki rasa yang pedas";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT ?nama<br/>
        WHERE {<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa ?Rasa.<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa foo:Pedas.<br/>
        &emsp;  ?Makanan rdfs:label ?nama.<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }

  </script>

  <script type="text/javascript">

    function query4()
    {
      $.ajax("query4.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan Bahan yang digunakan sebagai pelengkap dari suatu makanan beserta nama makanan terkait";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT ?nama1 ?nama2<br/>
        WHERE {<br/>
        &emsp;  ?Bahan foo:Sebagai_Pelengkap ?Makanan;<br/>
        &emsp; &emsp; &emsp;  rdfs:label ?nama1.<br/>
        &emsp;  ?Makanan rdfs:label ?nama2.<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }

  </script>

  <script type="text/javascript">

    function query5()
    {
      $.ajax("query5.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan makanan, minuman, dan buah yang memiliki rasa manis";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT  ?nama1<br/>
        WHERE {<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa ?Rasa.<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa foo:Manis.<br/>
        &emsp;  ?Buah foo:Memiliki_Rasa ?Rasa.<br/>
        &emsp;  ?Buah foo:Memiliki_Rasa foo:Manis.<br/>
        &emsp;  ?Minuman foo:Memiliki_Rasa foo:Manis.<br/>
        &emsp;  ?Minuman foo:Memiliki_Rasa foo:Manis;<br/>
        &emsp; &emsp; &emsp;  rdfs:label ?nama1.<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }

  </script>

  <script type="text/javascript">

    function query6()
    {
      $.ajax("query6.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan Bahan yang bila dipanggang akan menghasilkan makanan yang memiliki rasa gurih";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT ?nama1<br/>
        WHERE {<br/>
        &emsp;  ?Bahan foo:DiPanggang ?Makanan.<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa ?Rasa.<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa foo:Gurih.<br/>
        &emsp;  ?Bahan rdfs:label ?nama1.<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }

  </script>

  <script type="text/javascript">

    function query7()
    {
      $.ajax("query7.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan Kemasan yang digunakan untuk sate ayam";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT ?nama<br/>
        WHERE {<br/>
        &emsp;  ?Makanan foo:DiKemas ?Kemasan.<br/>
        &emsp;  foo:Sate_Ayam foo:DiKemas ?Kemasan.<br/>
        &emsp;  ?Kemasan rdfs:label ?nama.<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }

  </script>

  <script type="text/javascript">

    function query8()
    {
      $.ajax("query8.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan makanan yang memiliki porsi individu";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT ?nama<br/>
        WHERE {<br/>
        &emsp;  ?Makanan foo:Jumlah_Porsi ?jml.<br/>
        &emsp;  ?Makanan rdfs:label ?nama.<br/>
        &emsp;  FILTER (?jml='Individu').<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }

  </script>

  <script type="text/javascript">

    function query9()
    {
      $.ajax("query9.php")
      .done(function(res)
      {
        document.getElementById("disini").innerHTML = res;
        document.getElementById("judul").innerHTML = "Menampilkan Makanan yang memiliki suhu yang panas dan minuman yang memiliki suhu yang dingin";
        document.getElementById("penjelasan").innerHTML = `

        SELECT DISTINCT ?nama1 ?nama2<br/>
        WHERE {<br/>
        &emsp;  ?Makanan foo:Temperatur ?temp;<br/>
        &emsp; &emsp; &emsp; rdfs:label ?nama1.<br/>
        &emsp;  FILTER (?temp='Panas').<br/>
        &emsp;  ?Minuman foo:Temperatur ?temp2;<br/>
        &emsp; &emsp; &emsp;  rdfs:label ?nama2.<br/>
        &emsp;  FILTER (?temp2='Dingin').<br/>
        }
        `;
        $('#ex1').modal('show');
      });

    }

  </script>

</script>

<script type="text/javascript">

  function query10()
  {
    $.ajax("query10.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan kandungan bahan pada makanan capcay";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
      &emsp;  ?Bahan foo:DiTumis ?Makanan.<br/>
      &emsp;  ?Bahan foo:DiTumis foo:Capcay.<br/>
      &emsp;  ?Bahan rdfs:label ?nama.<br/>
      }
      `;
      $('#ex1').modal('show');
    });

  }

</script>





</ul>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>


<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script type="text/javascript" >
  $('#form1').on('submit', function(e){
    $('#ex1').modal('show');
    e.preventDefault();
  });
</script>
<script type="text/javascript" >
  $('#form2').on('submit', function(e){
    $('#ex2').modal('show');
    e.preventDefault();
  });
</script>
</html>
