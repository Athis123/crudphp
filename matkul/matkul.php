<?php
include "../db.php";
$db=new db;

switch ($_GET['action'])
{

    case 'save':

        $id_matkul = $_POST['id_matkul'];
        $nama = $_POST['nama'];
        $sks = $_POST['sks'];

        $query = $db->add_matkul($id_matkul,$nama,$sks);
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :";
        }
    break;

    case 'edit':

        $id_matkul = $_POST['id_matkul'];
        $nama = $_POST['nama'];
        $sks = $_POST['sks'];
      
        $query = $db->update_matkul($id_matkul,$nama,$sks);
       
        if ($query)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :";
        }
    break;

    case 'delete':

        $id_matkul = $_POST['id_matkul'];
        $query = $db->del_matkul($id_matkul);
        if ($query)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" ;
        }
    break;
}
?>
