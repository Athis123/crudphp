<?php
include "../db.php";
$db=new db;

switch ($_GET['action'])
{

    case 'save':

        $id_dosen = $_POST['id_dosen'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $query = $db->add_dosen($id_dosen,$nama,$alamat);
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

        $id_dosen = $_POST['id_dosen'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
      
        $query = $db->update_dosen($id_dosen,$nama,$alamat);
       
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

        $id_dosen = $_POST['id_dosen'];
        $query = $db->del_dosen($id_dosen);
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
