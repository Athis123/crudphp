<?php
include '../db.php';
$db = new db();
$dataDosen = $db->get_allDosen();
$dataMatkul = $db->get_allMatkul();
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal</h1>
    <p class="mb-4">Form untuk menambahkan jadwal mata kuliah baru</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Jadwal</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" id="formJadwal">
                    <!-- Dropdown Dosen -->
                    <div class="form-group">
                        <label for="id_dosen">ID Dosen</label>
                        <select class="form-control" name="id_dosen" id="id_dosen">
                            <option value="">-- Pilih ID Dosen --</option>
                            <?php while ($d = $dataDosen->fetch_assoc()) { ?>
                                <option value="<?= $d['id_dosen']; ?>" data-nama="<?= $d['nama']; ?>">
                                    <?= $d['id_dosen']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_dosen">Nama Dosen</label>
                        <input type="text" class="form-control" id="nama_dosen" placeholder="Nama Dosen" readonly>
                    </div>

                    <!-- Dropdown Matkul -->
                    <div class="form-group">
                        <label for="id_matkul">ID Mata Kuliah</label>
                        <select class="form-control" name="id_matkul" id="id_matkul">
                            <option value="">-- Pilih ID Mata Kuliah --</option>
                            <?php while ($m = $dataMatkul->fetch_assoc()) { ?>
                                <option value="<?= $m['id_matkul']; ?>" data-nama="<?= $m['nama']; ?>">
                                    <?= $m['id_matkul']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_matkul">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" id="nama_matkul" placeholder="Nama Mata Kuliah" readonly>
                    </div>

                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="text" class="form-control" name="waktu" placeholder="Contoh: Senin, 08:00 - 09:40">
                    </div>

                    <div class="form-group">
                        <label for="ruang">Ruang</label>
                        <input type="text" class="form-control" name="ruang" placeholder="Contoh: Lab Komputer 1">
                    </div>
               
                    <button type="submit" class="btn btn-primary" id="simpanJadwal">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Page level plugins -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/datatables-demo.js"></script>

<script>
$(document).ready(function() {
    // Ketika ID dosen dipilih
    $('#id_dosen').on('change', function() {
        let selectedNama = $(this).find('option:selected').data('nama') || '';
        $('#nama_dosen').val(selectedNama);
    });

    // Ketika ID matkul dipilih
    $('#id_matkul').on('change', function() {
        let selectedNama = $(this).find('option:selected').data('nama') || '';
        $('#nama_matkul').val(selectedNama);
    });
});
</script>