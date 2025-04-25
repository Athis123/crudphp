<?php
include '../db.php';
$db = new db();

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case "save":
            if(isset($_POST['id_matkul']) && isset($_POST['id_dosen']) && isset($_POST['waktu']) && isset($_POST['ruang'])) {
                $id_matkul = $_POST['id_matkul'];
                $id_dosen = $_POST['id_dosen'];
                $waktu = $_POST['waktu'];
                $ruang = $_POST['ruang'];
                
                if($db->add_jadwal($id_matkul, $id_dosen, $ruang, $waktu)) {
                    echo "Data jadwal berhasil disimpan";
                } else {
                    echo "Gagal menyimpan data jadwal";
                }
            } else {
                echo "Semua field harus diisi!";
            }
            break;
            
        case "edit":
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $id_matkul = $_POST['id_matkul'];
                $id_dosen = $_POST['id_dosen'];
                $waktu = $_POST['waktu'];
                $ruang = $_POST['ruang'];
                
                if($db->update_jadwal($id, $id_matkul, $id_dosen, $waktu, $ruang)) {
                    echo "Data jadwal berhasil diupdate";
                } else {
                    echo "Gagal mengupdate data jadwal";
                }
            }
            break;
            
        case "delete":
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                if($db->delete_jadwal($id)) {
                    echo "Data jadwal berhasil dihapus";
                } else {
                    echo "Gagal menghapus data jadwal";
                }
            }
            break;
            
        case "get":
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $data = $db->get_jadwalById($id);
                echo json_encode($data->fetch_assoc());
            }
            break;
            
        default:
            echo "Action tidak valid";
            break;
    }
}