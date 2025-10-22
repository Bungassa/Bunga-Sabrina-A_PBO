<!DOCTYPE html>
<html>
<head>
    <title>Belajar JavaScript di Duniailkom</title>
<script type="text/JavaScript">
function tambah_semangat()
{
    var a=document.getElementByID("div_Semangat");
    a.innerHTML+=<p>Sedang Belajar JavaScript, Semangat...!!!</p>;
}
</script>
</head>
<body>
<h1>Belajar JavaScript</h1>
<p> Saya sedang belajar JavaScript di duniaIlkom.com</p>
Klik tombol ini untuk menambahkan kalimat baru:
<button id="tambah" onclick="tambah_semangat()">Semangaat..!!</button>
<div id="div_semangat"></div>
</body>
</html>