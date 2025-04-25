<?php
include '../db.php';
$db = new db();

$id = $_GET['id'];
$jadwal = $db->get_jadwalById($id)->fetch_assoc();
$dataDosen = $db->get_allDosen();
$dataMatkul = $db->get_allMatkul();
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Jadwal</h1>
    <p class="mb-4">Form untuk mengedit jadwal</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Jadwal</h6>
        </div>

        <div class="card-body">
            <form method="POST" id="formEditJadwal">
                <input type="hidden" name="id" value="<?= $jadwal['id']; ?>">

                <div class="form-group">
                    <label>ID Dosen</label>
                    <select class="form-control" name="id_dosen" id="id_dosen">
                        <option value="">-- Pilih Dosen --</option>
                        <?php while ($d = $dataDosen->fetch_assoc()) { ?>
                            <option value="<?= $d['id_dosen']; ?>" data-nama="<?= $d['nama']; ?>" <?= $jadwal['id_dosen'] == $d['id_dosen'] ? 'selected' : '' ?>>
                                <?= $d['id_dosen']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_dosen">Nama Dosen</label>
                    <input type="text" class="form-control" id="nama_dosen" value="<?= $jadwal['nama_dosen'] ?? ''; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>ID Mata Kuliah</label>
                    <select class="form-control" name="id_matkul" id="id_matkul">
                        <option value="">-- Pilih Mata Kuliah --</option>
                        <?php while ($m = $dataMatkul->fetch_assoc()) { ?>
                            <option value="<?= $m['id_matkul']; ?>" data-nama="<?= $m['nama']; ?>" <?= $jadwal['id_matkul'] == $m['id_matkul'] ? 'selected' : '' ?>>
                                <?= $m['id_matkul']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_matkul">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" id="nama_matkul" value="<?= $jadwal['nama_matkul'] ?? ''; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Waktu</label>
                    <input type="text" class="form-control" name="waktu" value="<?= $jadwal['waktu']; ?>">
                </div>

                <div class="form-group">
                    <label>Ruang</label>
                    <input type="text" class="form-control" name="ruang" value="<?= $jadwal['ruang']; ?>">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="list.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script src="asset/vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Isi nama dosen saat halaman dimuat
    let selectedDosen = $('#id_dosen option:selected').data('nama') || '';
    $('#nama_dosen').val(selectedDosen);

    // Isi nama matkul saat halaman dimuat
    let selectedMatkul = $('#id_matkul option:selected').data('nama') || '';
    $('#nama_matkul').val(selectedMatkul);

    $('#id_dosen').on('change', function() {
        let selectedNama = $(this).find('option:selected').data('nama') || '';
        $('#nama_dosen').val(selectedNama);
    });

    $('#id_matkul').on('change', function() {
        let selectedNama = $(this).find('option:selected').data('nama') || '';
        $('#nama_matkul').val(selectedNama);
    });
});
</script>
