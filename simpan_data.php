<?php
include('koneksi.php');

$nomor_surat = $_POST['nomor_surat'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];

$direktori = "berkas/";
$file_name = $_FILES['NamaFile']['name'];
move_uploaded_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);

$action = $_POST['action'];


function tambah_data($koneksi, $nmr, $ktgr, $jdl, $flnm){
    $ins = "INSERT INTO arsip(nomor_surat, kategori, judul, file) VALUES('$nmr', '$ktgr', '$jdl', '$flnm')";
    return $koneksi->query($ins);
}


if(strtolower($action) == 'tambah'){
    $check = tambah_data($koneksi, $nomor_surat, $kategori, $judul, $file_name);
    if($check){
        echo 'Data berhasil ditambah';
    }
    else{
        echo 'Data gagal ditambah';
    }
}
?>

<a href="index.php"> Kembali </a>
