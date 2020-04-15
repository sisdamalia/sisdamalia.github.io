<!DOCTYPE html>
<html>
<title>Daftar Surat</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
a {
    color: teal;
}
a:hover {
    color:black;
    text-decoration: none;
}
#myTable {
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    width: 100%;
    font-size: 20px;
    margin-top:20px
}
#myTable td, th {
    padding: 10px;
    padding-left: 25px;
    border-bottom: 2px solid #ddd;
}
#myInput {
    font-size: 15px;
    border: solid teal 1.5px;
    height: 40px;
}
</style>

<script>
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        }
        else {
            tr[i].style.display = "none";
        }
        }       
    }
}
</script>

<body class="w3-content" style="max-width:1600px">
<div> 
<!-- Sidebar -->
<nav class="w3-sidebar w3-teal w3-animate-top w3-xxlarge" style="display:none; padding-top:150px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-teal w3-xxlarge w3-padding w3-display-topright" style="padding:6px 24px">
    <i class="fa fa-remove"></i>
  </a>
  <div class="w3-bar-block w3-center">
    <a href="index.html" class="w3-bar-item w3-button w3-text-white w3-hover-teal">Beranda</a>
    <a href="daftarputar.html" class="w3-bar-item w3-button w3-text-white w3-hover-teal">Daftar Putar</a>
    <a href="pengulangan.html" class="w3-bar-item w3-button w3-text-white w3-hover-teal">Pengulangan</a>
    <a href="bantuan.html" class="w3-bar-item w3-button w3-text-white w3-hover-teal">Bantuan</a>
    <a href="tentang.html" class="w3-bar-item w3-button w3-text-white w3-hover-teal">Tentang</a>
  </div>
</nav>

<!-- Header -->
<span class="w3-padding w3-xxlarge w3-right" onclick="w3_open()"><i style="color:teal" class="fa fa-bars"></i></span> 
<div class="w3-clear"></div>

<!-- About section -->
<div class="w3-container w3-center w3-padding-32">
<div class="w3-content w3-left-align w3-padding-32" style="max-width:500px">
<input style="width: 100%;"  id="myInput" onkeyup="myFunction()" type="text" class="form-control" placeholder="Cari surat (contoh: Yasin)" name="search">
    
    <table id="myTable">
      <?php
        $mysqli = NEW mySQLi ('localhost', 'root', '', 'murottal');
        
        $resultset = $mysqli->query ("select * from daftar_surat");
      ?>
      <?php
        while ($rows = $resultset->fetch_assoc())
        {
            $nama=$rows['nama_surat'];
            $link=$rows['no_surat'];
            echo "<tr><td><a href='$link.php'>$nama</td></tr>";

        }
      ?>
    </table>

<script>
// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.width = "100%";
  document.getElementById("mySidebar").style.display = "block"
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
