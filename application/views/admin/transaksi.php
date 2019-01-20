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

                <h4 class="card-title">Daftar Transaksi </h4>
                <a href="javascript:tambah()">
                  <button type="button" class="btn btn-success btn-sm" name="Tambah" data-toggle="modal" data-target="#tambah">Tambah</button>
                </a>
                <hr>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Detail Aset</th>
                        <th>Nama Orang Pesan</th>
                        <th>HP</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($transaksi as $value) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value->da_nama; ?></td>
                          <td><?php echo $value->tran_nama; ?></td>
                          <td><?php echo $value->tran_hp; ?></td>
                          <td><?php echo $value->tran_hari; ?></td>
                          <td><?php echo $value->tran_jam; ?></td>
                          <td>
                            <a href="javascript:edit('<?php echo $value->aset_id; ?>','<?php echo $value->aset_nama; ?>','<?php echo $value->aset_alamat; ?>','<?php echo $value->aset_desa; ?>','<?php echo $value->aset_jenis; ?>');">
                              <button type="button" class="btn btn-warning btn-sm" name="Edit" data-toggle="modal" data-target="#tambah" >Edit</button><br><br>
                            </a>
                            <a type="button" href="javascript:hapus('<?php echo $value->aset_id; ?>');" class="btn btn-danger btn-sm" name="Hapus">Hapus</a>
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
  <form class="forms-sample" action="<?php echo base_url(); ?>transaksi/add_transaksi" method="post">
		<div class="modal-content">
		  <div class="modal-header">
        <h4 class="modal-title" id="judul_modal">Transaksi </h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  </div>
      <div class="modal-body col-md-12">
          <input type="hidden" name="tran_id" id="tran_id" value="">
          <div class="form-group">
            <label for="exampleInputEmail1">Aset</label>
            <select class="form-control" onchange="javascript:cekda();" name="tran_aset" id="tran_aset">
              <?php
              foreach ($assets as $value) { ?>
                <option value="<?php echo $value->aset_id; ?>"><?php echo $value->aset_nama; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Detail Aset</label>
            <select class="form-control" name="tran_da" id="tran_da">
              <option value="0">Silahkan Pilih Aset</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Hari</label>
            <input type="date" class="form-control" name="tran_hari" id="tran_hari" placeholder="Masukkan Hari Main">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jam</label>
            <select class="form-control" name="tran_jam" id="tran_jam">
              <?php
              for ($i=7; $i < 25; $i++) {
              ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Pemesan</label>
            <input type="text" class="form-control" name="tran_nama" id="tran_nama" placeholder="Masukkan Nama Pemesan">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Club</label>
            <input type="text" class="form-control" name="tran_org" id="tran_org" placeholder="Masukkan Nama Club">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">HP Pemesan</label>
            <input type="text" class="form-control" name="tran_hp" id="tran_hp" placeholder="Masukkan Hp Pemesan">
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
  $("#tran_id").val("");
  $("#tran_da").val("");
  $("#tran_hari").val("");
  $("#tran_jam").val("");
  $("#tran_nama").val("");
  $("#tran_org").val("");
  $("#tran_hp").val("");

}
function edit(tran_id,tran_da,tran_hari,tran_jam,tran_nama,tran_org,tran_hp){
  $("#tran_id").val(tran_id);
  $("#tran_da").val(tran_da);
  $("#tran_hari").val(tran_hari);
  $("#tran_jam").val(tran_jam);
  $("#tran_nama").val(tran_nama);
  $("#tran_org").val(tran_org);
  $("#tran_hp").val(tran_hp);
}
function hapus(id){
  var pilih = confirm("Apakah anda mau menghapus ini!");
	if(pilih){
    location.href=base_url+"admin/delete_aset/"+id;
	}
}
function cekda(){
	var tran_aset = $('#tran_aset').val();
	$('#tran_da').load(base_url+"transaksi/cekda/"+tran_aset);
}

</script>
