<?php

echo $action = $_POST['action'];

parse_str($_POST['dataform'], $hasil);

$gambarku = $_FILES["fotoku"];

$namafoto = trim($hasil['NamaLengkap']);

if (!empty($gambarku["name"]) and !empty($namafoto)){
	$namafile = $gambarku["name"];		//nama filenya
	preg_match("/([^\.]+$)/", $namafile, $ext);		//Regex: mencari string sesudah titik terakhir, saved in array ext
	$file_ext = strtolower($ext[1]);
	$namafilebaru = $hasil['NamaLengkap'].".".$ext[1];	//nama file barunya [ccnumber].png
    $file = $gambarku["tmp_name"];						//source filenya
    //perform the upload operation
	$extensions= array("jpeg","jpg","png");				//extensi file yang diijinkan
	//Kirim pesan error jika extensi file yang diunggah tidak termasuk dalam extensions
	$errors = array();
	if(in_array($file_ext,$extensions) === false)
	 $errors[] = "Extensi yang diperbolehkan jpeg atau png.";

	//Kirim pesan error jika ukuran file > 500kB
	$file_size = $gambarku['size'];
	if($file_size > 2097152)
	 $errors[] = "Ukuran file harus lebih kecil dari 2MB.";

	//Upload file
	if(empty($errors)){
		if(move_uploaded_file($file, "uploads/" . $namafilebaru))
			echo " Uploaded dengan nama $namafilebaru";
	}
}else echo $errors[] = "Lengkapi NIM dan gambarnya. ";
echo "<br/>";

if(!empty($errors)){
	echo "Error : ";
	foreach ($errors as $val)
		echo $val;
}

if ($action == 'create')
{
$sql = "INSERT INTO pendaftar(Nama_lengkap, Nama_Belakang, Nama_Panggilan, email, alamat, asalnegara, Tempat_Lahir, Tanggal_lahir, Jenis_Kelamin, Hobi, Nomor_Telfon, Foto, Data_Masuk) values ('$hasil[NamaLengkap]','$hasil[NamaBelakang]','$hasil[NamaPanggilan]','$hasil[email]','$hasil[alamat]','$hasil[asalnegara]','$hasil[TampatLahir]', '$hasil[TanggalLahir]', '$hasil[JenisKelamin]', '$hasil[Hobi]', '$hasil[NomorTelfon]', '{$namafilebaru}',now())";
}
elseif($action == 'read')
{
$sql = "SELECT * from `pendaftar` where Nama_lengkap = '$hasil[NamaLengkap]'";
}
elseif($action == 'update')
{
$sql = "UPDATE pendaftar set Nama_lengkap = '$hasil[NamaLengkap]', Nama_Belakang = '$hasil[NamaBelakang]', Nama_Panggilan = '$hasil[NamaPanggilan]', email = '$hasil[email]', alamat = '$hasil[alamat]', asalnegara = '$hasil[asalnegara]', Tempat_Lahir = '$hasil[TempatLahir]', Tanggal_lahir = '$hasil[TanggalLahir]', Jenis_Kelamin = '$hasil[JenisKelamin]', Hobi = '$hasil[hobi]', Nomor_Telfon = '$hasil[NomorTelfon]', Foto = '$namafilebaru' where Nama_lengkap = '$hasil[NamaLengkap]'"; 
}
elseif($action == 'delete')
{
$sql = "DELETE from pendaftar where Nama_lengkap = '$hasil[NamaLengkap]'";
}

else {
	echo "ERROR ACTION";
	exit();
}
$conn = new mysqli("localhost","root","","html");
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}else{
  echo "Database connected. ";
}

if ($conn->query($sql) === TRUE) {
	echo "Query $action suceeded !";

}
elseif ($conn->query($sql) === FALSE){
	echo "Error: $sql" .$conn -> error;
}
else
{
	$result = $conn->query($sql);
	if($result->num_rows > 0)

	{
		echo "<table id='tresult' class='table table-striped table-bordered'>";
		echo "<thead><th>NamaDepan</th><th>NamaBelakang</th><th>NamaPanggilan</th><th>Email</th><th>Alamat</th><th>Asalnegara</th><th>TempatLahir</th><th>TanggalLahir</th><th>JenisKelamin</th><th>Hobi</th><th>NomorTelpon</th><th>Foto</th>
			</thead>";
		while($row = $result->fetch_assoc())
		{
			echo "<tr><td>".$row['Nama_lengkap']."</td><td>". $row['Nama_Belakang']."</td></tr>".$row['Nama_Panggilan']."</td><td>".$row['email']."</td><td>".$row['alamat']."</td><td>".$row['asalnegara']."</td><td>".$row['Tempat_Lahir']."</td><td>".$row['Tanggal_lahir']."</td><td>".$row['Jenis_Kelamin']."</td><td>".$row['Hobi']."</td><td>".$row['Nomor_Telfon']."</td><td>".$row['Foto']."</td>
				</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
}
$conn->close();
?>