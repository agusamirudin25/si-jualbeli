<?php

$id_pembelian = $_GET['id_pembelian'];
$pembelian->detail_pembelian($id_pembelian);

if (isset($_POST['simpan'])) {
  $id_suplier = trim(ucwords($_POST['id_suplier']));
  $deskripsi = trim(ucwords($_POST['deskripsi']));
  $id_size = trim(ucwords($_POST['id_size']));
  $harga = trim(ucwords($_POST['harga']));
  $qty = trim(ucwords($_POST['qty']));
  $tanggal_beli = trim(ucwords($_POST['tanggal_beli']));
  $tanggal_bayar = trim(ucwords($_POST['tanggal_bayar']));
  $keterangan = trim(ucwords($_POST['keterangan']));

  $error = array();
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }

  if (count($error) == 0) //jika tidak ada error
  {
    $pembelian->edit_pembelian($id_pembelian, $id_suplier, $deskripsi, $id_size, $harga, $qty, $tanggal_beli, $tanggal_bayar, $keterangan); //edit data
    $pembelian->detail_pembelian($id_pembelian);
  }
}
?>


<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <div class="text-center">
          <h3 class="page-header">
            EDIT PEMBELIAN
          </h3>
        </div>
        <hr>
         <form action="" method="POST" class="form-horizontal">
         <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Pembelian</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_pembelian" value="<?php echo $id_pembelian?>" id_pembelian="" readonly>
            </div>
          </div>
            <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Suplier</label>
            <div class="col-sm-6">
              <select name="id_suplier" class="form-control" required value="<?php echo $data['id_suplier']; ?>">
                <?php
                $query = mysqli_query($koneksi->conn, "SELECT * FROM suplier");
                echo "<option value=''>--Silahkan Pilih--</option>";
                while ($row = mysqli_fetch_array($query)) { ?>
                  <option value="<?php echo $row['id_suplier']; ?>" <?php if ($data['id_suplier'] == $row['id_suplier']) {
                                                                            echo 'selected ';
                                                                          } ?>>
                    <?php echo $row['id_suplier'] . " - " . $row['nama_suplier']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Deskripsi</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="<?= $data['deskripsi'];?>" name="deskripsi" required>
            </div>
          </div>

         <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Size</label>
            <div class="col-sm-6">
              <select name="id_size" class="form-control" required>
                <?php
                $query = mysqli_query($koneksi->conn, "SELECT * FROM size");
                $harga = mysqli_query($koneksi->conn, "SELECT * FROM size where id_size='".$data['id_size']."'");
				$harga = mysqli_fetch_array($harga);
				
			$jsArray = "var dtsize = new Array();\n";       
			 while ($row = mysqli_fetch_array($query)) {  
				 if($row['id_size'] === $data['id_size'])
				 {
					?>
                  <option value="<?php echo $row['id_size']; ?>" <?php if ($data['id_size'] == $row['id_size']) {
                                                                            echo 'selected ';
                                                                          } ?>>
                    <?php echo $row['id_size'] . " - " . $row['size_karton']; 
					$jsArray .= "dtsize['" . $row['id_size'] . "'] = {harga:'" . addslashes($row['harga']) . "',satuan:'".addslashes($row['satuan'])."'};\n";   

				 }
				 else
				 {?>
                  <option value="<?php echo $row['id_size']; ?>" <?php if ($data['id_size'] == $row['id_size']) {
                                                                            echo 'selected ';
                                                                          } ?>>
                    <?php echo $row['id_size'] . " - " . $row['size_karton']; 
					$jsArray .= "dtsize['" . $row['id_size'] . "'] = {harga:'" . addslashes($row['harga']) . "',satuan:'".addslashes($row['satuan'])."'};\n";   					 
				 }
			}     
			?>   
        </select>
              
            </div>
          </div>
		
     
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Harga</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="<?= $harga['harga'];?>" name="harga" id="harga" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Qty</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="<?= $data['qty'];?>" name="qty" required>
            </div>
          </div>
          
            <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Tanggal Beli</label>
            <div class="col-sm-6">
              <input type="date" class="form-control" name="tanggal_beli" id="" value="<?php echo $data['tanggal_beli']; ?>">
            </div>
          </div>
           <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Jatuh Tempo</label>
            <div class="col-sm-6">
              <input type="date" class="form-control" name="tanggal_bayar" id="" value="<?php echo $data['tanggal_bayar']; ?>">
            </div>
          </div>
          
           <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Keterangan</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="<?= $data['keterangan'];?>" name="keterangan" required>
            </div>
          </div>


         <script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(id_size){ 
    document.getElementById('harga').value = dtsize[id_size.harga; 
    document.getElementById('satuan').value = dtsize[id_size].satuan; 
    }; 
         </script>       
              
                    <div class="form-group row">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" name="simpan" class="btn btn-sm btn-success btn-custom">
                                <span class="fa fa-save"></span>
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-sm btn-danger btn-custom">
                                <span class="fa fa-refresh"></span>
                                Batal
                            </button>
                            <a href="index.php?p=pembelian" class="btn btn-sm btn-secondary btn-custom">
                                <span class="fa fa-reply-all"></span>
                                Kembali
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
