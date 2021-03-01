var flashdata = $('.flash-data').data('flashdata');
// alert untuk hapus
$('.btn-validasi').on('click',function(e){
    e.preventDefault();
    var href = $(this).attr('href');

    Swal.fire({
        title: 'Validasi Calon Mahasiswa ?',
        text: "Calon Mahasiswa akan Divalidasi ,Pastikan Sudah Melakukan Kewajibannya",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Validasi!'
      }).then((result) => {
        if (result.value) {
         document.location.href = href;
        }
      })
});

$('.btn-lulusUjian').on('click',function(e){
    e.preventDefault();
    var href = $(this).attr('href');

    Swal.fire({
        title: 'Validasi Lulus Ujian?',
        text: "Calon Mahasiswa akan Divalidasi Lulus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Validasi!'
      }).then((result) => {
        if (result.value) {
         document.location.href = href;
        }
      })
});

$('.btn-btl-validasi').on('click',function(e){
    e.preventDefault();
    var href = $(this).attr('href');

    Swal.fire({
        title: 'Batalkan Validasi Calon Mahasiswa ?',
        text: "Validasi Calon Mahasiswa Akan dibatalakn",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Batalkan!'
      }).then((result) => {
        if (result.value) {
         document.location.href = href;
        }
      })
});

$('.btn-hapus').on('click',function(e){
    e.preventDefault();
    var href = $(this).attr('href');

    Swal.fire({
        title: 'Hapus Data Calon Mahasiswa?',
        text: "Data Calon Mahasiswa akan Dihapus ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.value) {
         document.location.href = href;
        }
      })
});

$('.btn-canceled').on('click',function(e){
  e.preventDefault();
  var href = $(this).attr('href');

  Swal.fire({
      title: 'Yakin?',
      text: "Validasi Akan Dibatalkan",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Batalkan!'
    }).then((result) => {
      if (result.value) {
       document.location.href = href;
      }
    })
});

$('.btn-approval').on('click',function(e){
  e.preventDefault();
  var href = $(this).attr('href');

  Swal.fire({
      title: 'Yakin?',
      text: "Lakukan Persetujuan",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Setujui!'
    }).then((result) => {
      if (result.value) {
       document.location.href = href;
      }
    })
});