<div id="content-wrapper">

<div class="container-fluid">

   
  <!-- DataTables Example -->
  <div class="card mb-3">
      <div class="card-header">
          <!-- Button trigger modal -->
          <i class="fas fa-table"></i>
          Data Siswa</div>
          <div class="card-body">
                          <button type="button" class="btn btn-primary bts-sm" data-toggle="modal" data-target="#tambahSiswa">
                              Tambah Siswa
                            </button>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nis</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
     <tbody id='show_data'>
         
     </tbody>   
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
 
</div>
<!-- /.container-fluid -->

<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Your Website 2018</span>
    </div>
  </div>
</footer>

</div>
<!-- /.content-wrapper -->

</div>



<!-- Modal tambah data siswa-->
<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="">Nis</label>
                        <input type="text" name="nis" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Telepon</label>
                        <input type="text" name="telepon" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control"></textarea>
                    </div>
     
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- 
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data();
        $('#dataTable').dataTable();
    // }
        //menampilkn data di tabel dar database
        function tampil_data(){
            $.ajax({
                url:'<?=base_url();?>controller/getData',
                type:'POST',
                data:'data',
                dataType:'JSON',
                success: function(response){
                console.log(response);
                var i;
                var no = 0;
                var html = "",
                for (i =0; i < response.length; i++ ) {
                    no++;
                    html = html     + '<tr>'
                                    + '<td>' + no  + '</td>'
                                    + '<td>' + response[i].nis  + '</td>'
                                    + '<td>' + response[i].nama  + '</td>'
                                    + '<td>' + response[i].jenis_kelamin + '</td>'
                                    + '<td>' + response[i].telepon  + '</td>'
                                    + '<td>' + response[i].alamat  + '</td>'
                                    + '<td style="width: 16.66%;">' + '<span><button data-id="'+response[i].id_siswa+'" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="'+response[i].id_siswa+'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'
                                    + '</tr>';
                    }
                    $('#show_data').html(html);
          }
      });
    }
  });

</script>  -->
 
<script>
    $(document).ready(function(){
        tampil_data();
         $('#dataTable').dataTable();
        //Menampilkan Data di tabel
        function tampil_data(){
            $.ajax({
                url: '<?= base_url(); ?>controller/getData',
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    var i;
                    var no = 0;
                    var html = "";
                    for(i=0;i < response.length ; i++){
                        no++;
                        html = html + '<tr>'
                                    + '<td>' + no  + '</td>'
                                    + '<td>' + response[i].nis  + '</td>'
                                    + '<td>' + response[i].nama  + '</td>'
                                    + '<td>' + response[i].jenis_kelamin + '</td>'
                                    + '<td>' + response[i].telepon  + '</td>'
                                    + '<td>' + response[i].alamat  + '</td>'
                                    + '<td style="width: 16.66%;">' + '<span><button data-id="'+response[i].id_siswa+'" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="'+response[i].id_siswa+'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'
                                    + '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
      
    });
</script> 

