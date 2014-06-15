<html>
<head>
<title>Proses Upload File</title>
<body>
<?php
echo "<pre>";
print_r($_FILES['userfile']);
echo "</pre>";
if($_FILES['userfile']['error']==0){

$namafilebaru="../gambar/".$_FILES['userfile']['name'];

if(move_uploaded_file($_FILES['userfile']['tmp_name'],
$namafilebaru)==true){
echo "File telah tersimpan.";
}
else
echo "Gagal menyimpan file upload";
}
else
echo "Gagal Upload";
?>
</body>
</html>
