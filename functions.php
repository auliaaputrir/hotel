<?php 
$conn = mysqli_connect("localhost", "root", "", "modul12");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data){
    global $conn;

    $idtamu = $data["idtamu"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $masuk = $data["masuk"];
    $keluar = $data["keluar"];
    $note = $data["note"];
    $idkamar = $data['idkamar'];


    $query = "INSERT INTO tamu VALUES ('$idtamu','$nama', '$alamat', '$no_telp', '$masuk', '$keluar', '$note', '$idkamar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function transaksi($data){
    global $conn;

    $idtransaksi = $data["idtransaksi"];
    $idtamu = $data["idtamu"];
    $idpgw = $data["idpgw"];
    $tgltransaksi = $data["tgl"];
    $total_bayar = $data["total_bayar"];

    $query = "INSERT INTO transaksi VALUES ('$idtransaksi','$idtamu','$idpgw', '$tgltransaksi', '$total_bayar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);   
}
function edit($data){
    global $conn;

    $idtamu = $data["idtamu"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $masuk = $data["masuk"];
    $keluar = $data["keluar"];
    $note = $data["note2"];
    $idkamar = $data['tipe2'];


    $query = "UPDATE tamu SET 
    nama = '$nama',
    alamat = '$alamat',
    no_telp = '$no_telp',
    masuk = '$masuk',
    keluar = '$keluar',
    note = '$note',
    idkamar = '$idkamar'

    WHERE idtamu = '$idtamu'";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tamu WHERE idtamu = '$id'");
    return mysqli_affected_rows($conn);
}
function edit_kamar($data){
    global $conn;

    $idkamar = $data["idkamar"];
    $jenis_kamar= $data["jenis"];
    $jumlah_kamar = (int) $data["jumlah"];
    $harga_kamar = (int) $data["harga"];

    $query = "UPDATE kamar SET
    jenis_kamar = '$jenis_kamar',
    jumlah_kamar = '$jumlah_kamar',
    harga_kamar = '$harga_kamar'

    WHERE idkamar = '$idkamar'";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function hitungKamar($data){
    
}
?>
