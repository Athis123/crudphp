<?php

class db{
    private $koneksi;
    function __construct()
    {
        $this->koneksi= $koneksi=new mysqli("localhost","root","","db_pelatihan_muhammadkahfi");
        
    }
    function get_user($username,$password){
        $data=$this->koneksi->query("select * from tbl_user where username='$username' and password='$password'");
        return $data;
    }
    // mahasiswa
    function get_allMhs(){
        $data=$this->koneksi->query("select * from tbl_mahasiswa");
        return $data;
    }

    // Dosen
    function get_allDosen(){
        $data=$this->koneksi->query("select * from tbl_dosen");
        return $data;
    }

        // Matkul
        function get_allMatkul(){
            $data=$this->koneksi->query("select * from tbl_matkul");
            return $data;
        }

        function get_allJadwal() {
            $query = "SELECT 
                        j.*, 
                        d.nama AS nama_dosen, 
                        m.nama AS nama_matkul
                      FROM tbl_jadwal j
                      JOIN tbl_dosen d ON j.id_dosen = d.id_dosen
                      JOIN tbl_matkul m ON j.id_matkul = m.id_matkul";
            return $this->koneksi->query($query);
        }
        

    function add_mhs($nim,$nama,$alamat,$jurusan){
        $this->koneksi->query("insert into tbl_mahasiswa(nim,nama,alamat,jurusan) values('$nim','$nama','$alamat','$jurusan')");
        return true;

    }

    function add_jadwal($id_matkul, $id_dosen, $ruang, $waktu) {
        $this->koneksi->query("INSERT INTO tbl_jadwal(id_matkul, id_dosen, waktu, ruang) 
                              VALUES('$id_matkul', '$id_dosen', '$waktu', '$ruang')");
        return true;
    }

    function update_jadwal($id, $id_matkul, $id_dosen, $waktu, $ruang) {
        $this->koneksi->query("UPDATE tbl_jadwal SET 
            id_matkul = '$id_matkul', 
            id_dosen = '$id_dosen', 
            waktu = '$waktu', 
            ruang = '$ruang' 
            WHERE id = '$id'");
        return true;
    }
    
    function delete_jadwal($id) {
        $this->koneksi->query("DELETE FROM tbl_jadwal WHERE id = '$id'");
        return true;
    }
    
    function get_jadwalById($id) {
        return $this->koneksi->query("SELECT * FROM tbl_jadwal WHERE id = '$id'");
    }
    

    // Dosen 
    function add_dosen($id_dosen,$nama,$alamat){
        $this->koneksi->query("insert into tbl_dosen(id_dosen,nama,alamat) values('$id_dosen','$nama','$alamat')");
        return true;

    }

        // matkul 
        function add_matkul($id_matkul,$nama,$sks){
            $this->koneksi->query("insert into tbl_matkul(id_matkul,nama,sks) values('$id_matkul','$nama','$sks')");
            return true;
    
        }

    function update_mhs($nim,$nama,$alamat,$jurusan){
            $this->koneksi->query("UPDATE tbl_mahasiswa SET nama = '$nama', alamat = '$alamat', jurusan = '$jurusan' WHERE nim='$nim'");
            return true;
    }

    function update_dosen($id_dosen,$nama,$alamat){
        $this->koneksi->query("UPDATE tbl_dosen SET id_dosen = '$id_dosen', nama = '$nama', alamat = '$alamat' WHERE id_dosen='$id_dosen'");
        return true;
    }

    function update_matkul($id_matkul,$nama,$sks){
        $this->koneksi->query("UPDATE tbl_matkul SET id_matkul = '$id_matkul', nama = '$nama', sks = '$sks' WHERE id_matkul='$id_matkul'");
        return true;
    }

    function get_MhdByNim($nim){
        $data=$this->koneksi->query("select * from tbl_mahasiswa where nim='$nim'");
        return $data;
    }

    function get_MhdByIdDosen($id_dosen){
        $data=$this->koneksi->query("select * from tbl_dosen where id_dosen='$id_dosen'");
        return $data;
    }

    function get_MhdByIdMatkul($id_matkul){
        $data=$this->koneksi->query("select * from tbl_matkul where id_matkul='$id_matkul'");
        return $data;
    }

    function del_mhs($nim){
        $this->koneksi->query("delete from tbl_mahasiswa where nim='$nim'");
        return true;

    }

    function del_dosen($id_dosen){
        $this->koneksi->query("delete from tbl_dosen where id_dosen='$id_dosen'");
        return true;

    }

    function del_matkul($id_matkul){
        $this->koneksi->query("delete from tbl_matkul where id_matkul='$id_matkul'");
        return true;

    }

} 

?>


