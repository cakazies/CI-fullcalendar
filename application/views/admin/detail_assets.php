<!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <?php
                if ($this->session->userdata('status') == 0) {
                  echo '<h4 class="card-title" style="color:red" >'.$this->session->userdata('note').'</h4>';
                }else if ($this->session->userdata('status') == 1) {
                  echo '<h4 class="card-title" style="color:blue" >'.$this->session->userdata('note').'</h4>';
                }
                 ?>

                <h4>Daftar Detail Aset <?php echo $assets[0]->aset_nama; ?></h4>
                <a href="javascript:tambah()">
                  <button type="button" class="btn btn-success btn-sm" name="Tambah" data-toggle="modal" data-target="#tambah">Tambah</button>
                </a>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Detail Aset</th>
                        <th>Keterangan Aset</th>
                        <th>Harga</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($assets as $value) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value->da_nama; ?></td>
                          <td><?php echo $value->da_ket; ?></td>
                          <td><?php echo "Rp " . number_format($value->da_harga,2,',','.'); ?></td>
                          <td>
                            <a href="javascript:edit('<?php echo $value->da_id; ?>','<?php echo $value->da_nama; ?>','<?php echo $value->da_ket; ?>','<?php echo $value->da_harga; ?>');">
                              <button type="button" class="btn btn-warning btn-sm" name="Edit" data-toggle="modal" data-target="#tambah" >Edit</button><br><br>
                            </a>
                            <a type="button" href="javascript:hapus('<?php echo $value->da_id; ?>');" class="btn btn-danger btn-sm" name="Hapus">Hapus</a>
                          </td>
                        </tr>

                      <?php
                      $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
            <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
            <i class="mdi mdi-heart text-danger"></i>
          </span>
        </div>
      </footer>
      <!-- partial -->
    </div>

<!-- modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
  <form class="forms-sample" action="<?php echo base_url(); ?>admin/add_da" method="post">
		<div class="modal-content">
		  <div class="modal-header">
        <h4 class="modal-title" id="judul_modal">Detail Jam </h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  </div>
      <div class="modal-body col-md-12">
          <input type="hidden" name="da_id" id="da_id" value="<?php echo $da_id; ?>">
          <input type="hidden" name="da_aset" value="<?php echo $assets_id; ?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Detail Aset</label>
            <input type="text" class="form-control" name="da_nama" id="da_nama" placeholder="Masukkan Nama Aset">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Keterangan</label>
            <input type="text" class="form-control" name="da_ket" id="da_ket" placeholder="Masukkan Keterangan">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Harga</label>
            <input type="number" class="form-control" name="da_harga" id="da_harga" placeholder="Masukkan Harga Aset">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">File</label>
            <input type="file" class="form-control" name="da_foto" id="da_foto" placeholder="Masukkan Harga Aset">
          </div>

      </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		  </div>
		</div>
  </form>
	  </div>
	</div>

<!-- end modal -->

<script type="text/javascript">
function tambah(){
  $("#da_id").val("");
  $("#da_nama").val("");
  $("#da_ket").val("");
  $("#da_harga").val("");
}
function edit(da_id,da_nama,da_ket,da_harga){
  $("#da_id").val(da_id);
  $("#da_nama").val(da_nama);
  $("#da_ket").val(da_ket);
  $("#da_harga").val(da_harga);
}
function hapus(id){
  var pilih = confirm("Apakah anda mau menghapus ini!");
	if(pilih){
    location.href=base_url+"admin/delete_da/"+id;
	}
}
</script>
