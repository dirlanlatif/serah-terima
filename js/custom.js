$(document).ready(function(){

  /**
  * #add_buttonhh  => id="add_buttonhh"
  * .modal-title   => class="modal-title"
  * 
  */
  /**
  * untuk tombol pinjam hh
  */
  $('#add_buttonhh').click(function(){
    $('#hh_form')[0].reset();
    $('.modal-title').text("Peminjaman Handheld");
    $('#nik').prop('autocomplete', false);
    $('#ip').prop('autocomplete', false);
    $('#ip').prop('disabled', false);
    $('#jenis').val("hh");
    $('#nama').val("");
    $('#action').val("Add");
    $('#operation').val("Add");
    $('#ip').prop('placeholder',"IP Handheld");
    $('#hnama').prop('placeholder',"Pastikan Nama Terisi");
    $('#gambar').hide();
    $('.ket').show();
    $('#nik').show();
    $('#hnama').show();
    $('#ip').show();
    $('#bagian').show();
    $('#action').show();
  });

  
    /**
     * untuk tombol pinjam ht
     */
  $('#add_buttonht').click(function(){
    $('#ht_form')[0].reset();
    $('.modal-title').text("Peminjaman Handytalky");
    $('#nikht').prop('autofocus', true);
    $('#nikht').prop('autocomplete', false);
    $('#ipht').prop('autocomplete', false);
    $('#ipht').prop('disabled', false);
    $('#jenisht').val("ht");
    $('#namaht').val("");
    $('#hnamaht').prop('placeholder',"Pastikan Nama Terisi");
    $('#actionht').val("Add");
    $('#operationht').val("Addht");
    $('#ipht').prop('placeholder',"IP Handytalky");
  });
    /**
     * untuk tombol tambah data hh
     */
  $('#add_buttonhhnew').click(function(){
    $('#datahhnew_form')[0].reset();
    $('.modal-title').text("Tambah Handheld Baru");
    $('#kode5').prop('autocomplete', false);
    $('#sn5').prop('autocomplete', false);
    $('#aktiva5').prop('autocomplete', false);
    $('#jenis5').val("hhbaru");
    $('#actiondatahhnew').val("Simpan");
    $('#operation5').val("isidata");
    $('#sn5').prop('placeholder',"SN Hardware");
    $('#kode5').prop('placeholder',"IP Handheld");
    $('#aktiva5').prop('placeholder',"Kode Aktiva");
  });
    /**
     * untuk tombol tambah data ht
     */
  $('#add_buttonhtnew').click(function(){
    $('#datahtnew_form')[0].reset();
    $('.modal-title').text("Tambah Handytalky Baru");
    $('#kode6').prop('autocomplete', false);
    $('#sn6').prop('autocomplete', false);
    $('#aktiva6').prop('autocomplete', false);
    $('#jenis6').val("htbaru");
    $('#actiondatahhnew').val("Simpan");
    $('#operation6').val("isidataht");
    $('#sn6').prop('placeholder',"SN Hardware");
    $('#kode6').prop('placeholder',"Kode HT");
    $('#aktiva6').prop('placeholder',"Kode Aktiva");
  });
    /**
     * Untuk tombol Tambah Karyawan
     */
  $('#add_buttonkar').click(function(){
    $('#kar_form')[0].reset();
    $('.modal-title').text("Tambah Data Karyawan");
    $('#nik7').prop('autocomplete', false);
    $('#nama7').prop('autocomplete', false);
    $('#username7').prop('autocomplete', false);
    $('#nik7').prop('disabled',false);
    $('#jenis7').val("karbaru");
    $('#actionkar').val("Simpan");
    $('#operation7').val("isidatakar");
    $('#password7').prop('type','text');
  });
    /**
     * Untuk tombol Tambah Item
     */
  $('#add_buttonstok').click(function(){
    $('#stok_form')[0].reset();
    $('.modal-title').text("Tambah Item");
    $('#item1').prop('disabled', false);
    $('#qtylabel').hide();
    $('#qty').hide();
    $('#pakailabel').hide();
    $('#pakai').hide();
    $('#ketstok').hide();
    $('#keteranganlabel').hide();
    $('#actionstok').val("Simpan");
    $('#operation8').val("isidatastok");
    $('#password8').prop('type','text');
  });
    /**
     * untuk tombol btlr
     */
  $('#add_buttonbtlr').click(function(){
    $('#btlr_form')[0].reset();
    $('.modal-title').text("Pengambilan BTLR");
    $('#nik').prop('autocomplete', false);
    $('#jenis').val("btlr");
    $('#nama').val("");
    $('#actionbtlr').val("btlr");
    $('#operation9').val("btlr");
    $('#hnama').prop('placeholder',"Pastikan Nama Terisi");
    $('#item9').val('').trigger('change');
    $('.selectpicker').selectpicker('refresh');

  });
    /**
     * untuk tombol tambah menu 
     */
  $('#add_buttonmenu').click(function(){
    $('#menu_form')[0].reset();
    $('.modal-title').text("Penambahan Menu Akses");
    $('#untukapa').prop('placeholder', "Contoh: LIS G030");
    $('#operationmenu').val("tambahmenu");
    // $('#item9').val('').trigger('change');
    // $('#actionmenu').val("btlr");
  });

    /**
     * Untuk atur set fokus kursor saat buka modal
     */
  $('#ht-Modal').on('shown.bs.modal', function(){
    $('#nikht').trigger('focus');
  });
  $('#hh-Modal').on('shown.bs.modal', function(){
    $('#nik').trigger('focus');
  });
  $('#datahh-Modal').on('shown.bs.modal', function(){
    $('#kode_ip').trigger('focus');
  });
  $('#dataht-Modal').on('shown.bs.modal', function(){
    $('#kode1').trigger('focus');
  });
  $('#id001').on('shown.bs.modal', function(){
    $('#username').trigger('focus');
  });
  $('#datahhnew-Modal').on('shown.bs.modal', function(){
    $('#kode5').trigger('focus');
  });
  $('#datahtnew-Modal').on('shown.bs.modal', function(){
    $('#kode6').trigger('focus');
  });
  $('#kar-Modal').on('shown.bs.modal', function(){
    $('#nik7').trigger('focus');
  });
  $('#stok-Modal').on('shown.bs.modal', function(){
    $('#pakai').trigger('focus');
  });
  $('#btlr-Modal').on('shown.bs.modal', function(){
    $('#nik').trigger('focus');
  });
  $('#menu-Modal').on('shown.bs.modal', function(){
    $('#untukapa').trigger('focus');
  });
  $('#xaction').click(function(){
    $('#kdtk').trigger('focus');
  });
  $('#xaction2').click(function(){
    $('#kdtk').trigger('focus');
  });
  $('#xxaction').click(function(){
    $('#zona').trigger('focus');
  });
    /**
     * untuk memunculkan data di datatable
     */
  var dataTable = $('#hh_data').DataTable({
    "processing":true,
    "serverSide":true,
    "responsive":true,
    "scrollY": "350px",
    "scrollCollapse": true,
    "paging":false,
    "autoWidth":false,
    "pagingType": "full",
    "order":[],
    "ajax":{
      url:"fetch.php",
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4,5],
      "orderable":false,
    },
    ],
  });
  var dataTable1 = $('#ht_data').DataTable({
    "processing":true,
    "serverSide":true,
    "autoWidth":false,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"fetchht.php",
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4,5],
      "orderable":false,
    },
    ],
  });
  var dataTable2 =  $('#tblhisthh').DataTable({
    "processing":true,
    "serverSide":true,
    "responsive":true,
    "autoWidth":false,
    "order":[],
    "ajax":{
      url:"histhh.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      
      "targets":[0,1,2,3,4],
      "orderable":false,
    },
    ],
  });
  var dataTable3 =  $('#tblhistht').DataTable({
    "processing":true,
    "serverSide":true,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"histht.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4],
      "orderable":false,
    },
    ],
  });
  var dataTable4 =  $('#tbldatahh').DataTable({
    "processing":true,
    "serverSide":true,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"f_datahh.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4,5,6,7],
      "orderable":false,
    },
    ],
  });
  var dataTable5 =  $('#tbldataht').DataTable({
    "processing":true,
    "serverSide":true,
    "autoWidth":false,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"f_dataht.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4,5,6,7],
      "orderable":false,
    },
    ],
  });
  var dataTable6 =  $('#tbldatakary').DataTable({
    "processing":true,
    "serverSide":true,
    "autoWidth":false,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"f_datakar.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,3],
      "orderable":false,
    },
    ],
  });
  var dataTable7 =  $('#tbldatastok').DataTable({
    "processing":true,
    "serverSide":true,
    "autoWidth":false,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"f_datastok.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,3],
      "orderable":false,
    },
    ],
  });
  var dataTable8 =  $('#tbldatamasuk').DataTable({
    "processing":true,
    "serverSide":true,
    "autoWidth":false,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"f_datamasuk.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4,5],
      "orderable":false,
    },
    ],
  });
  var dataTable9 =  $('#tbldatakeluar').DataTable({
    "processing":true,
    "serverSide":true,
    "autoWidth":false,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"f_datakeluar.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4,5],
      "orderable":false,
    },
    ],
  });
  var dataTable10 = $('#btlr_data').DataTable({
    "processing":true,
    "serverSide":true,
    "autoWidth":false,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"f_btlr.php",
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4,5],
      "orderable":false,
    },
    ],
  });
  var dataTable11 = $('#tbl_stok').DataTable({
    "processing":true,
    "serverSide":true,
    "autoWidth":false,
    "responsive":true,
    "scrollY": "200px",
    "scrollCollapse": false,
    "paging":false,
    //"searching":false,
    "order":[],
    "ajax":{
      url:"f_stok.php",
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2],
      "orderable":false,
    },
    ],
  });
  var dataTable12 =  $('#tbldatahhn').DataTable({
    "processing":true,
    "serverSide":true,
    "responsive":true,
    "order":[],
    "ajax":{
      url:"f_datahhn.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4,5,6],
      "orderable":false,
    },
    ],
  });
  var dataTable13 =  $('#tblsegel').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"f_segel.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3],
      "orderable":false,
    },
    ],
  });
  var dataTable14 =  $('#tblrestart').DataTable({
    "processing":true,
    "serverSide":true,
    //"scrollY": "350px",
    "scrollCollapse": true,
    "paging":false,
    "autoWidth":false,
    "pagingType": "full",
    "order":[],
    "ajax":{
      url:"f_restart.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4],
      "orderable":false,
    },
    ],
  });
  var dataTable15 =  $('#tblrestarth').DataTable({
    "processing":true,
    "serverSide":true,
    //"scrollY": "350px",
    "scrollCollapse": true,
    "paging":false,
    "autoWidth":false,
    "pagingType": "full",
    "order":[],
    "ajax":{
      url:"f_restart_harian.php", //ganti
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4],
      "orderable":false,
    },
    ],
  });
  var dataTable16 = $('#menu_data').DataTable({
    "processing":true,
    "serverSide":true,
    "responsive":true,
    "autoWidth":true,
    "order":[],
    "ajax":{
      url:"f_menu.php",
      type:"POST"
    },
    "columnDefs":[
    {
      "targets":[0,1,2,3,4],
      "orderable":false,
    },
    ],
  });
    /**
     * untuk input data ke database, dari inputan pada tmbol edit di tab data hh 
     */
  $(document).on('submit', '#datahh_form', function(event){
    event.preventDefault();
    var kode_ip     = $('#kode_ip').val();
    var type        = $('#type').val();
    var no_mesin    = $('#no_mesin').val();
    var sn_hardware = $('#sn_hardware').val();
    var aktiva      = $('#aktiva').val();
    var bagian      = $('#bagian2').val();
    var keterangan  = $('#keterangan').val();

    if(kode_ip != '' && type != '' && sn_hardware != '' && aktiva !='')
      {
        $.ajax({
          url:"insert.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            alert(data);
            $('#datahh_form')[0].reset();
            $('#datahh-Modal').modal('hide');
            dataTable.ajax.reload();
            dataTable1.ajax.reload();
            dataTable2.ajax.reload();
            dataTable3.ajax.reload();
            dataTable4.ajax.reload();
          }
        });
      }
      else
      {
        alert("Masih Ada Data Yang Kosong");
      }
    });
      /**
       * untuk input data ke database, dari inputan pada tmbol edit di tab data ht 
       */
  $(document).on('submit', '#dataht_form', function(event){
    event.preventDefault();
  var kode       = $('#kode1').val();
  var type       = $('#type1').val();
  var sn         = $('#sn1').val();
  var aktiva     = $('#aktiva1').val();
  var bagian     = $('#bagian1').val();
  var keterangan = $('#keterangan1').val();

    if(kode != '' && type != '' && sn != '' && aktiva !='')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#dataht_form')[0].reset();
          $('#dataht-Modal').modal('hide');
          dataTable4.ajax.reload();
          dataTable5.ajax.reload();
          // $('#nama').val();
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
        }
      });
    }
    else
    {
      alert("Masih Ada Data Yang Kosong");
    }
  });
  /**
   * Tambah Data HH Baru ke db
   */
  $(document).on('submit', '#datahhnew_form', function(event){
    event.preventDefault();
  var kode_ip     = $('#kode5').val();
  var type        = $('#type5').val();
  var sn_hardware = $('#sn5').val();
  var aktiva      = $('#aktiva5').val();
  var bagian      = $('#bagian5').val();
  var keterangan  = $('#keterangan5').val();

    if(kode_ip != '' && sn_hardware != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#datahhnew_form')[0].reset();
          $('#datahhnew-Modal').modal('hide');

          // $('#nama').val();
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
          dataTable5.ajax.reload();
        }
      });
    }
    else
    {
      alert("Masih ada data belum terisi");
    }
  });
  /**
   * Tambah Data Segel
   */
  $(document).on('submit', '#segel_form', function(event){
    event.preventDefault();
  var kdtk    = $('#kdtk').val();
  var nmtk    = $('#nmtk').val();
  var nosegel = $('#nosegel').val();
  var xaction = $('#xaction').val();
  var operationsegel = $('#operationsegel').val();
    if(kdtk != '' && nmtk != '' && nosegel != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#segel_form')[0].reset();

          dataTable13.ajax.reload();

        }
      });
    }
    else
    {
      alert("Masih ada data belum terisi");
    }
  });
  /**
   * Tambah Data Restart
   */
  $(document).on('submit', '#restart_form', function(event){
    event.preventDefault();
  var zona              = $('#zona').val();
  var norestart         = $('#norestart').val();
  var xxaction          = $('#xxaction').val();
  var operationrestart  = $('#operationrestart').val();
    if(zona != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#restart_form')[0].reset();

          dataTable14.ajax.reload();
          dataTable15.ajax.reload();

        }
      });
    }
    else
    {
      alert("Masih ada data belum terisi");
    }
  });
  /**
   * Tambah Data Toko baru
   */
  $(document).on('submit', '#tobar_form', function(event){
    event.preventDefault();
  var kdtk    = $('#kdtkbaru').val();
  var nmtk    = $('#nmtkbaru').val();
  var xaction = $('#xaction').val();
  var operationsegel = $('#operationsegel').val();
    if(kdtk != '' && nmtk != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#tobar_form')[0].reset();

          //dataTable13.ajax.reload();

        }
      });
    }
    else
    {
      alert("Masih ada data belum terisi");
    }
  });
  /**
   * Tambah Karyawan baru ke DB
   */
  $(document).on('submit', '#kar_form', function(event){
    event.preventDefault();
  var nik          = $('#nik7').val();
  var nama_lengkap = $('#nama7').val();
  var username     = $('#username7').val();
  var password     = $('#password7').val();
  var no_hp        = $('#hp7').val();
  var email        = $('#email7').val();
  var akses        = $('#bagian7').val();

    if(nama_lengkap != '' && nik != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#kar_form')[0].reset();
          $('#kar-Modal').modal('hide');

          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
          dataTable5.ajax.reload();
          dataTable6.ajax.reload();
        }
      });
    }
    else
    {
      alert("Masih ada data belum terisi");
    }
  });
  /**
   * Tambah Menu Baru
   */
  $(document).on('submit', '#menu_form', function(event){
    event.preventDefault();
  var domain    = $('#domain').val();
  var pathname  = $('#pathname').val();
  var untukapa  = $('#untukapa').val();
  

    if(domain != '' && pathname != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#menu_form')[0].reset();
          $('#menu-Modal').modal('hide');

          dataTable16.ajax.reload();
        }
      });
    }
    else
    {
      alert("Masih ada data belum terisi");
    }
  });
  /**
   * Tambah Item
   */
  $(document).on('submit', '#stok_form', function(event){
    event.preventDefault();
  var item1   = $('#item1').val();
  var item2   = $('#item2').val();
  var qty     = $('#pakai').val();
  var keterangan  = $('#ketstok').val();
  
    if(item1 != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#stok_form')[0].reset();
          $('#stok-Modal').modal('hide');

          
          dataTable7.ajax.reload();
          dataTable8.ajax.reload();
          dataTable9.ajax.reload();
          dataTable11.ajax.reload();
        }
      });
    }
    else
    {
      alert("Masih ada data belum terisi");
    }
  });
  
  /**
   * Tambah Data HT Baru ke db
   */
  $(document).on('submit', '#datahtnew_form', function(event){
    event.preventDefault();
  var kode       = $('#kode6').val();
  var type       = $('#type6').val();
  var sn         = $('#sn6').val();
  var aktiva     = $('#aktiva6').val();
  var bagian     = $('#bagian6').val();
  var keterangan = $('#keterangan6').val();

    if(kode != '' && sn != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#datahtnew_form')[0].reset();
          $('#datahtnew-Modal').modal('hide');

          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
          dataTable5.ajax.reload();
        }
      });
    }
    else
    {
      alert("Masih ada data belum terisi");
    }
  });
  /**
   * Tambah data peminjaman Handheld ke db
   */
  $(document).on('submit', '#hh_form', function(event){
    event.preventDefault();
    var nik   = $('#nik').val();
    var ip    = $('#ip').val();
    var nama  = $('#nama').val();
    var bagian  = $('#bagian').val();
    var jenis   = $('#jenis').val("hh");

    if(nik != '' && ip != '' && nama != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#hh_form')[0].reset();
          $('#ht_form')[0].reset();
          $('#ht-Modal').modal('hide');
          $('#hh-Modal').modal('hide');

          // $('#nama').val();
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
        }
      });
    }
    else
    {
      alert("NIK atau Nama Masih Kosong");
    }
  });
  /**
   * untuk tombol serah terima handheld
   */
  $(document).on('click', '.update', function(){
    var hh_id = $(this).attr("id");
    $.ajax({
      url:"fetch_single.php",
      method:"POST",
      data:{hh_id:hh_id},
      dataType:"json",
      success:function(data)
      {
        $('#hh-Modal').modal('show');
        //$('#nik').val(data.nik);
        $('#nik').prop('placeholder', data.nik);
        $('#hnama').prop('placeholder', "Ganti NIK User di Atas");
        $('#nik').prop('autofocus', true);
        $('#nik').prop('autocomplete', false);
        $('#ip').prop('autocomplete', false);
        $('#hip').val(data.ip);
        $('#ip').val(data.ip);
        $('#bagian').val(data.bagian);
        $('#ip').prop('disabled', true);
        $('.modal-title').text("Serah terima handheld");
        $('#hh_id').val(hh_id);
        $('#action').val("Simpan");
        $('#nama').val("");
        $('#hnama').val("");
        $('#hnamaht').val("");
        $('#namaht').val("");
        $('#operation').val("Edit");
        $('#gambar').hide();
        $('.ket').show();
        $('#nik').show();
        $('#hnama').show();
        $('#ip').show();
        $('#bagian').show();
        $('#action').show();
      }
    })
  });
  /**
   * untuk lihat gambar
   */
  $(document).on('click', '.lihat', function(){
    var hh_id = $(this).attr("id");
    $.ajax({
      url:"fetch_gambar.php",
      method:"POST",
      data:{hh_id:hh_id},
      dataType:"json",
      success:function(data)
      {
        $('#hh-Modal').modal('show');
        $('.modal-title').text(data.nama_lengkap);
        $('#gambar').show();
        $('.ket').hide();
        $('#nik').hide();
        $('#hnama').hide();
        $('#ip').hide();
        $('#bagian').hide();
        $('#action').hide();

        $('#gambar').attr('src', '//172.20.12.33/HRMImage/'+data.nik+'.jpg' );
        
        
        $('#hip').val(data.ip);
        $('#ip').val(data.ip);
        $('#bagian').val(data.bagian);
        $('#ip').prop('disabled', true);
        $('#hh_id').val(hh_id);
        $('#action').val("lihat");
        $('#operation').val("lihat");


      }
    })
  });
  
  /**
   * Rekap BTLR ke db
   */
  $(document).on('submit', '#btlr_form', function(event){
    event.preventDefault();
  var item    = $('#item9').val();
  var qty     = $('#qty9').val();
  var nik         = $('#nik').val();
  var nama      = $('#nama').val();
  var zona      = $('#zona').val();
  var waktu     = $('#waktu').val();
  var waktu     = $('#keteranganbtlr').val();

    if(qty < 6)
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#datahhnew_form')[0].reset();
          $('#btlr_form')[0].reset();
          $('#btlr-Modal').modal('hide');

          
          dataTable10.ajax.reload();
          dataTable11.ajax.reload();
        }
      });
    }
    else
    {
      alert("Maksimal Input 5");
    }
  });
  /**
   * untuk tombol update stok BTLR
   */
  $(document).on('click', '.updatebtlr', function(){
    var id = $(this).attr("id");
    $.ajax({
      url:"updatebtlr.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        $('#stok-Modal').modal('show');
        $('.modal-title').text("Update Stok BTLR");
        $('#item1').prop('placeholder', data.item);
        $('#item1').val(data.item);
        $('#qtylabel').show();
        $('#qty').show();
        $('#qtylabel').text("Stok Saat Ini");
        $('#qty').prop('placeholder', data.sisa);
        $('#pakailabel').text("Update Stok");
        $('#keteranganlabel').hide();
        $('#ketstok').show();
        $('#ketstok').val("Pastikan inputan sesuai dengan hasil SO");
        $('#ketstok').prop('disabled',true);
        $('#datastok_id').val(id);
        $('#operation8').val("Editbtlr");
        $('#item2').val(data.sisa);
        $('#item3').val(data.stok);
        $('#pakai').show();
        $('#pakai').val("");
        $('#pakailabel').show();
      }
    })
  });
  /**
   * untuk tombol Tambah item BTLR
   */
  $(document).on('click', '.tambahbtlr', function(){
    var id = $(this).attr("id");
    $.ajax({
      url:"updatebtlr.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      {
        $('#stok-Modal').modal('show');
        $('#item1').prop('disabled', false);
        $('#item1').trigger('focus');
        $('.modal-title').text("Tambah Item BTLR");
        $('#item1').val("");
        $('#item1').prop('placeholder', "");
        $('#qtylabel').hide();
        $('#qty').hide();
        $('#pakai').hide();
        $('#pakailabel').hide();
        //$('#item1').val(0);
        $('#qty').val("");
        $('#qty').prop('placeholder', "");
        //$('#pakailabel').text("Qty (Jika Sudah Ada)");
        $('#keteranganlabel').hide();
        $('#ketstok').hide();
        $('#ketstok').val("Stok Saat ini + Penambahan Stok");
        $('#ketstok').prop('disabled',true);
        $('#datastok_id').val(id);
        $('#operation8').val("itembtlr");
        $('#item2').val(data.stok);
      }
    })
  });
  /**
   * untuk tombol serah terima ht
   */
  $(document).on('click', '.updateht', function(){
    var ht_id = $(this).attr("id");
    $.ajax({
      url:"fetch_single_ht.php",
      method:"POST",
      data:{ht_id:ht_id},
      dataType:"json",
      success:function(data)
      {
    $('#ht-Modal').modal('show');
    //$('#nik').val(data.nik);
    $('#nikht').prop('placeholder', data.nikht);
    $('#hnamaht').prop('placeholder', "Ganti NIK User di Atas");
    $('#nikht').prop('autofocus', true);
    $('#nikht').prop('autocomplete', false);
    $('#ipht').prop('autocomplete', false);
    $('#hipht').val(data.ipht);
    $('#ipht').val(data.ipht);
    $('#bagianht').val(data.bagianht);
    $('#ipht').prop('disabled', true);
    $('.modal-title').text("Serah terima HT");
    $('#ht_id').val(ht_id);
    $('#actionht').val("Simpan");
    $('#namaht').val("");
    $('#hnamaht').val("");
    //$('#hnamaht').val("");
    //$('#namaht').val("");
    $('#operationht').val("Editt");
    $('#jenisht').val("ht");
      }
    })
  });
  /**
   * hapus data peminjaman handheld
   */
  $(document).on('click', '.delete', function(){
    var hh_id = $(this).attr("id");
    if(confirm("Kembalikan?"))
    {
      $.ajax({
        url:"delete.php",
        method:"POST",
        data:{hh_id:hh_id},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
        }
      });
    }
    else
    {
      return false;
    }
  });
  /**
   * hapus data handheld
   */
  $(document).on('click', '.deldat', function(){
    var datahh_id = $(this).attr("id");
    if(confirm("Yakin Akan dihapus?"))
    {
      $.ajax({
        url:"delete.php",
        method:"POST",
        data:{datahh_id:datahh_id},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
        }
      });
    }
    else
    {
      return false;
    }
  });
  /**
   * hapus data ht
   */
  $(document).on('click', '.deldatht', function(){
    var dataht_id = $(this).attr("id");
    if(confirm("Yakin Akan dihapus?"))
    {
      $.ajax({
        url:"delete.php",
        method:"POST",
        data:{dataht_id:dataht_id},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
          dataTable5.ajax.reload();
        }
      });
    }
    else
    {
      return false;
    }
  });
  /**
   * hapus menu akses
   */
  $(document).on('click', '.hapusmenu', function(){
    var id_menu = $(this).attr("id");
    if(confirm("Yakin Akan dihapus?"))
    {
      $.ajax({
        url:"delete.php",
        method:"POST",
        data:{id_menu:id_menu},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
          dataTable16.ajax.reload();
        }
      });
    }
    else
    {
      return false;
    }
  });
  /**
   * hapus data karyawan
   */
  $(document).on('click', '.deldatkar', function(){
    var datakar_id = $(this).attr("id");
    if(confirm("Yakin Akan dihapus?"))
    {
      $.ajax({
        url:"delete.php",
        method:"POST",
        data:{datakar_id:datakar_id},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
          dataTable5.ajax.reload();
          dataTable6.ajax.reload();
        }
      });
    }
    else
    {
      return false;
    }
  });
/**
 * Tambah data peminjaman HT ke db
 */
  $(document).on('submit', '#ht_form', function(event){
    event.preventDefault();
    var nik = $('#nikht').val();
    var ip = $('#ipht').val();
    var nama = $('#namaht').val();
    var bagian = $('#bagianht').val();
    var jenis = $('#jenisht').val("ht");

    if(nik != '' && ip != '' && nama != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#ht_form')[0].reset();
          $('#ht-Modal').modal('hide');
          dataTable.ajax.reload();
          dataTable1.ajax.reload();
          dataTable2.ajax.reload();
          dataTable3.ajax.reload();
          dataTable4.ajax.reload();
        }
      });
    }
    else
    {
      alert("NIK atau Nama Masih Kosong");
    }
  });
  /**
   * IP Handheld Suggestion
   * dengan mengambil data inputan di modal pinjam hh dengan id=ip
   */
  $('#ip').typeahead({
    source: function (query, result) {
      $.ajax({
        url: "ipselector.php",
        data: 'query=' + query,            
        dataType: "json",
        type: "POST",
        success: function (data) {
          result($.map(data, function (item) {
            return item;
          }));
        }
      });
    }
  });
  
  /**
   * Kode HT suggestion
   *  dengan mengambil data inputan di modal pinjam ht dengan id=ipht
   */
  $('#ipht').typeahead({
    source: function (query, result) {
      $.ajax({
        url: "ipselectorht.php",
        data: 'query=' + query,            
        dataType: "json",
        type: "POST",
        success: function (data) {
          result($.map(data, function (item) {
            return item;
          }));
        }
      });
    }
  });
  /**
   * Autofill Nama saat input nik
   */
  $('#nik,#nikht').typeahead({
    source: function (query, result) {
      $.ajax({
        url: "nikselector.php",
        data: 'query=' + query,            
        dataType: "json",
        type: "POST",
        success: function (data) {
          $('#nama,#namaht').val(data.nama);
          $('#hnama,#hnamaht').val(data.nama);
          result($.map(data, function (item) {
            return item;
          }));
        }
      });
    }
  });
  /**
   * Autofill nmtk saat input kdtk
   */
  $('#kdtk').typeahead({
    source: function (query, result) {
      $.ajax({
        url: "selecttoko.php",
        data: 'query=' + query,            
        dataType: "json",
        type: "POST",
        success: function (data) {
          $('#nmtk').val(data.nmtk);
          //$('#nmtk').val(data.nama);
          result($.map(data, function (item) {
            return item;
          }));
        }
      });
    }
  });
  /**
   * Autofill nmtksaat input kdtk
   */
  $('#kdtkbaru').typeahead({
    source: function (query, result) {
      $.ajax({
        url: "selecttoko.php",
        data: 'query=' + query,            
        dataType: "json",
        type: "POST",
        success: function (data) {
          $('#nmtkbaru').val(data.nmtk);
          //$('#nmtk').val(data.nama);
          result($.map(data, function (item) {
            return item;
          }));
        }
      });
    }
  });
  /**
   * Atur Format tanggal
   */
  $('.tanggal').datepicker({
    format: "yyyy-mm-dd",
    autoclose:true
  });
  /**
   * edit data handheld di tab data hh
   */
  $(document).on('click', '.updatedatahh', function(){
    var datahh_id = $(this).attr("id");
    $.ajax({
      url:"ambildatahh.php",
      method:"POST",
      data:{datahh_id:datahh_id},
      dataType:"json",
      success:function(data)
      {
        $('#datahh-Modal').modal('show');
        $('#datahh_id').val(datahh_id);
        $('#kode_ip').val(data.kode_ip);
        $('#type').val(data.type);
        $('#no_mesin').hide();
        $('#lmesin').hide();
        $('#sn_hardware').val(data.sn_hardware);
        $('#aktiva').val(data.aktiva);
        $('#keterangan').val(data.keterangan);
        $('#bagian2').val(data.bagian);
        $('.modal-title').text("Edit Data Handheld");
        $('#operationdatahh').val("Editdatahh");
        $('#gambar').hide();
        $('.ket').show();
        $('#nik').show();
        $('#hnama').show();
        $('#ip').show();
        $('#bagian').show();
        $('#action').show();
      }
    })
  });
  /**
   * edit data menu
   */
  $(document).on('click', '.updatemenu', function(){
    var id_menu = $(this).attr("id");
    $.ajax({
      url:"ambildatamenu.php",
      method:"POST",
      data:{id_menu:id_menu},
      dataType:"json",
      success:function(data)
      {
        $('#menu-Modal').modal('show');
        $('#id_menu').val(id_menu);
        $('#domain').val(data.domain);
        $('#pathname').val(data.pathname);
        $('#untukapa').val(data.untukapa);
        
        $('.modal-title').text("Edit Menu Akses");
        $('#operationmenu').val("Editmenu");
        
        $('#action').show();
      }
    })
  });
  /**
   * Edit data HT di tab Data ht
   */
  $(document).on('click', '.updatedataht', function(){
    var dataht_id = $(this).attr("id");
    $.ajax({
      url:"ambildataht.php",
      method:"POST",
      data:{dataht_id:dataht_id},
      dataType:"json",
      success:function(data)
      {
        $('#dataht-Modal').modal('show');
        $('#dataht_id').val(dataht_id);
        $('#kode1').val(data.kode);
        $('#sn1').val(data.sn);
        $('#aktiva1').val(data.aktiva);
        $('#type1').val(data.type);
        $('#keterangan1').val(data.keterangan);
        $('#bagian1').val(data.bagian);
        $('.modal-title').text("Edit Data Handytalky");
        $('#operationdataht').val("Editdataht");
      }
    })
  });
  /**
   * Edit data HT di tab Data ht
   */
  
/**
   * edit data karyawan di tab karyawan dc
   */
  $(document).on('click', '.updatedatakar', function(){
    var datakar_id = $(this).attr("id");
    $.ajax({
      url:"ambildatakar.php",
      method:"POST",
      data:{datakar_id:datakar_id},
      dataType:"json",
      success:function(data)
      {
        $('#kar-Modal').modal('show');
        $('#datakar_id').val(datakar_id);
        $('#nik7').val(data.nik);
        $('#nik7').prop('disabled',true);
        $('#nama7').val(data.nama_lengkap);
        $('#username7').val(data.username);
        $('#password7').val(data.password);
        $('#email7').val(data.email);
        $('#hp7').val(data.no_hp);
        $('#bagian7').val(data.akses);
        $('#password7').prop('type','password');
        $('.modal-title').text("Edit Data Karyawan");
        $('#operation7').val("Editdatakar");
      }
    })
  });
});
  /**
   * edit data stok pengeluaran
   */
  $(document).on('click', '.updatedatastok', function(){
    var datastok_id = $(this).attr("id");
    $.ajax({
      url:"ambildatastok.php",
      method:"POST",
      data:{datastok_id:datastok_id},
      dataType:"json",
      success:function(data)
      {
        $('#stok-Modal').modal('show');
        $('#pakai').prop('autofocus', true);
        $('#datastok_id').val(datastok_id);
        $('#item1').val(data.item);
        $('#item2').val(data.item);
        $('#qty').val(data.stok);
        $('#item1').prop('disabled',true);
        $('#qtylabel').show();
      $('#qty').show();
      $('#pakailabel').show();
      $('#pakai').show();
      $('#ketstok').show();
      $('#keteranganlabel').show();
      $('#jenis8').val("");
      $('#actionstok').val("Simpan");
      $('.modal-title').text("Pemakaian Stok");
        $('#operation8').val("Editdatastok");
        $('#actionstok').prop('class', 'btn btn-info');
        $('#actionstok').val('Pakai');
        $('#pakailabel').text("Pemakaian");
      }
    })
  });
  /**
   * edit data stok input stok baru atau tambah stok
   */
  $(document).on('click', '.tambahstok', function(){
    var datastok_id = $(this).attr("id");
    $.ajax({
      url:"ambildatastok.php",
      method:"POST",
      data:{datastok_id:datastok_id},
      dataType:"json",
      success:function(data)
      {
        $('#stok-Modal').modal('show');
        $('#pakai').prop('autofocus', true);
        $('#datastok_id').val(datastok_id);
        $('#item1').val(data.item);
        $('#item2').val(data.item);
        $('#qty').val(data.stok);
        $('#item1').prop('disabled',true);
        $('#qtylabel').show();
        $('#pakailabel').text("Stok Tambahan");
        $('#qtylabel').text("Stok Saat Ini");
        $('#qty').show();
        $('#pakailabel').show();
        $('#pakai').show();
        $('#ketstok').show();
        $('#keteranganlabel').show();
        $('#jenis8').val("");
        $('#actionstok').val("Simpan");
        $('.modal-title').text("Update Stok");
        $('#operation8').val("updatestok");
        $('#actionstok').prop('class', 'btn btn-danger');
        $('#actionstok').val('Update Stok');
      }
    })
  });
/**
 * Untuk Jam realtime
 */
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
};
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
};
/**
 * untuk inputan hanya angka
 */
function angka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
  
};

function angka2(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 51))
    return false;
  return true;
  
};

