<?php
include '../koneksi/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM tb_bank");
$row = mysqli_fetch_assoc($data);
?>

<div class="card-body">
     
    <!-- Data Profil -->
<div class="col-lg-8">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-success">Rekening</h6>                                                            
   </div>

  <div class="card-body">                     
    <form method="post" action="#">
      <div class="form-row">

      <div class="form-group col-md-6">
        <label>Atas Nama Pemilik Rekening</label>
        <input type="text" class="form-control form-control-user" name="an_bank" value="<?php echo $row['an_bank']; ?>" required>
      </div>
      </div>

      <div class="form-row">
       <div class="form-group col-md-6">
         <label>Nama Bank</label>
           <input type="text" class="form-control form-control-user" name="nama_bank" value="<?php echo $row['nama_bank']; ?>" required>
       </div>
       </div>

        <div class="form-row">
         <div class="form-group col-md-6">
           <label>No. Rekening</label>
           <input type="text" class="form-control form-control-user" name="no_rek" value="<?php echo $row['no_rek']; ?>" required>
         </div>
        </div>
      

     <button type="submit" class="btn btn-success" name="submit">Simpan Perubahan</button>
     <hr>
                                   
    </form>
   </div>
  </div>
</div>
</div>

<?php
if (isset($_POST['submit']))
{
    $koneksi->query("UPDATE tb_bank SET an_bank='$_POST[an_bank]',nama_bank='$_POST[nama_bank]',no_rek='$_POST[no_rek]'");
  
   echo "<script>alert('Data telah diubah');</script>";
   echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=rekening'>";
}
?>