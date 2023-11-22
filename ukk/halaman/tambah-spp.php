<legend>
    <h5>Form Ubah SPP</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for="">Tahun</label>
        <input type="text" name="tahun" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="">Nominal</label>
        <input type="text" name="nominal" class="form-control" required>
    </div>

    <button class="btn btn-tambah btn-save" name="simpan">
        Simpan
    </button>

</form>

<?php

//cek apakah tombol ubah sudah di tekan
if(isset($_POST['simpan'])){
    //tampung setiap imputan
    $tahun = htmlspecialchars($_POST['tahun']);
    $nominal = htmlspecialchars($_POST['nominal']);

    //masukkan kedalam database
    //koneksi
    //query
    $simpan= mysqli_query($koneksi, "INSERT INTO spp VALUES ('', '$tahun', '$nominal')");
                                        
if($simpan){
    echo"<script>
        alert('Data Berhasil Diubah');
    document.location.href='?menu=spp';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal Diubah');

</script>";
    }
}