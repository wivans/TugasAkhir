



<html>

<link rel="stylesheet" type="text/css" href="style.css">
<head>
  <title>Tes</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>Testing Query</h1>
<a href="index.php">back</a>

<h2>Contoh Study Kasus</h2>
<ul>

<div class="row content">
    <div class="large-6 columns large-centered">
      <div class="callout">
          <form method="GET" action="#">
<div class="dropdown" style="left: 600px">
  <button class="dropbtn">List Query</button>
  <div class="dropdown-content">
    <a href="#" onclick="query1()">Query 1</a>
    <a href="#" onclick="query2()">Query 2</a>
    <a href="#" onclick="query3()">Query 3</a>
    <a href="#" onclick="query4()">Query 4</a>
    <a href="#" onclick="query5()">Query 5</a>
    <a href="#" onclick="query6()">Query 6</a>
    <a href="#" onclick="query7()">Query 7</a>
    <a href="#" onclick="query8()">Query 8</a>
    <a href="#" onclick="query9()">Query 9</a>
    <a href="#" onclick="query10()">Query 10</a>
  </div>

 
</div>
 <div id="disini" style="left: 1000px"></div>

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
    });

  }

</script>





</ul>

</body>
</html>
