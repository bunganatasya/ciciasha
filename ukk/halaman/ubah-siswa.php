<?php
$id = $_GET['id'];
$kelas = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nisn= '$id'");
$data = mysqli_fetch_array($siswa);

?>

<legend>
    <h5>Form Ubah Siswa</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for="">NISN</label>
        <input type="text" name="nisn" class="form-control" required value="<?= $data['nisn'] ?>">
    </div>

    <div class="form-group">
        <label for="">NIS</label>
        <input type="text" name="nis" class="form-control" required value="<?= $data['nis'] ?>">
    </div>

    <div class="form-group">
        <label for="">Nama Siswa</label>
        <input type="text" name="nama_siswa" class="form-control" required value="<?= $data['nama_siswa'] ?>">
    </div>

    <div class="form-group">
        <label for="">Kelas</label>
        <select name ="kelas" id="" required class="form-control">
            <option value="">--pilih kelas--</option>
            <?php
        
            $kelas = mysqli_querry($koneksi,"SELECT * FROM kelas" );
            while($data= mysqli_fetch_array($kelas)){

            ?>
            <option value="<? $data ['id_kelas'] ?>"><?= $data['nama_kelas'] ?>
            !! <?= $data['kompetensi_keahlian'] ?></option>
        <?php } ?>
        </select>

    <div class="form-group">
        <label for="">Alamat</label>
        <input type="text" name="alamat" class="form-control" required value="<?= $data['alamat'] ?>">
    </div>

    <div class="form-group">
        <label for="">No Telp</label>
        <input type="text" name="no_telp" class="form-control" required value="<?= $data['no_telp'] ?>">
    </div>

    <div class="form-group">
        <label for="">SPP</label>
        <select name="spp" id="" required class="form-control">
            <option value="<?= $data['spp'] ?>">
            <?php

            $spp = mysqli_querry($koneksi,"SELECT * FROM spp");
            while($data=mysqli_fetch_array($kelas)){
               
                ?>
                <option value="<?= $data ['id_spp'] ?>"><?=$data['tahun'] ?>
                !! <?= rupiah($data['nominal']) ?></option>
            <?php } ?>
            </select>
    </div>


    <button class="btn btn-tambah btn-save" name="ubah">
        ubah
    </button>

</form>

<?php

//cek apakah tombol ubah sudah di tekan
if(isset($_POST['ubah'])){
    //tampung setiap imputan
    $nisn = htmlspecialchars($_POST['nisn']);
    $nis = htmlspecialchars($_POST['nis']);
    $nama = htmlspecialchars($_POST['nama']);
    $id_kelas= htmlspecialchars($_POST['id_kelas']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telp = htmlspecialchars($_POST['no_telp']);
    $id_spp = htmlspecialchars($_POST['id_spp']);

    //maukkan kedalam database
    //koneksi
    //query
    $ubah= mysqli_query($koneksi, "UPDATE siswa SET nisn = '$nisn', nis = '$nis', nama_siswa = '$nama', id_kelas= '$kelas', alamat='$alamat',no_telp='$no_telp',id_spp='$id_spp' WHERE id_siswa = 'id' ");
    
    if($ubah){
    echo"<script>
        alert('Data Berhasil diubah');
    document.location.href='?menu=kelas';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal diubah);

</script>";
    }
}