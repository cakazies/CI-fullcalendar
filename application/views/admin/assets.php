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

                <h4 class="card-title">Daftar Aset </h4>
                <a href="javascript:tambah()">
                  <button type="button" class="btn btn-success btn-sm" name="Tambah" data-toggle="modal" data-target="#tambah">Tambah</button>
                </a>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Aset</th>
                        <th>Alamat</th>
                        <th>Desa</th>
                        <th>Jenis</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($assets as $value) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value->aset_nama; ?></td>
                          <td><?php echo $value->aset_alamat; ?></td>
                          <td><?php echo $value->aset_desa; ?></td>
                          <td><?php echo $value->jns_nama; ?></td>
                          <td>
                            <a href="javascript:edit('<?php echo $value->aset_id; ?>','<?php echo $value->aset_nama; ?>','<?php echo $value->aset_alamat; ?>','<?php echo $value->aset_desa; ?>','<?php echo $value->aset_jenis; ?>');">
                              <button type="button" class="btn btn-warning btn-sm" name="Edit" data-toggle="modal" data-target="#tambah" >Edit</button><br><br>
                            </a>
                            <a type="button" href="javascript:hapus('<?php echo $value->aset_id; ?>');" class="btn btn-danger btn-sm" name="Hapus">Hapus</a>
                          </td>
                          <td>
                            <form class="" action="<?php echo base_url(); ?>admin/detail_assets" method="post">
                              <input type="hidden" name="assets_id" value="<?php echo $value->aset_id; ?>">
                              <button type="submit" class="btn btn-primary" name="Detail">Detail</button>
                            </form>
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
  <form class="forms-sample" action="<?php echo base_url(); ?>admin/add_aset" method="post">
		<div class="modal-content">
		  <div class="modal-header">
        <h4 class="modal-title" id="judul_modal">Detail Jam </h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  </div>
      <div class="modal-body col-md-12">
          <input type="hidden" name="aset_id" id="aset_id" value="<?php echo $aset_id; ?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Aset</label>
            <input type="text" class="form-control" name="aset_nama" id="aset_nama" placeholder="Masukkan Nama Aset">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control" name="aset_alamat" id="aset_alamat" placeholder="Masukkan Alamat Aset">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Desa</label>
            <input type="text" class="form-control" name="aset_desa" id="aset_desa" placeholder="Masukkan Desa Aset">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jenis</label>
            <select class="form-control" name="jns_id" id="jns_id">
              <?php
              foreach ($jenis as $value) { ?>
                <option value="<?php echo $value->jns_id; ?>"><?php echo $value->jns_nama; ?></option>
              <?php
              }
              ?>
            </select>
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
  $("#aset_id").val("");
  $("#aset_nama").val("");
  $("#aset_alamat").val("");
  $("#aset_desa").val("");
  $("#jns_id").val("");

}
function edit(aset_id,aset_nama,aset_alamat,aset_desa,jns_id){
  $("#aset_id").val(aset_id);
  $("#aset_nama").val(aset_nama);
  $("#aset_alamat").val(aset_alamat);
  $("#aset_desa").val(aset_desa);
  $("#jns_id").val(jns_id);
}
function hapus(id){
  var pilih = confirm("Apakah anda mau menghapus ini!");
	if(pilih){
    location.href=base_url+"admin/delete_aset/"+id;
	}
}
</script>
