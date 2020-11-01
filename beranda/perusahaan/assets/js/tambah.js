$('#myTable').on('click', 'button[type="submit"]', function () {
    $(this).closest('tr').remove();
})
// $('p input[type="button"]').click(function () {
//     $('#myTable').append('<tr><td></td><td> <input type="text" class="form-control" name = "nama_mandarin[]" placeholder = "Input Nama Mandarin"/></td><td><input type="text" class="form-control" name = "nama_latin[]" placeholder = "Input Nama Latin" /></td><td> <input type="text" class="form-control" name = "passport[]" placeholder = "Input No Passport"/></td><td><input type="text" class="form-control" name = "jenis_proses[]" placeholder = "Input Jenis Proses" /></td><td> <input type = "number" class="form-control" name = "harga[]" placeholder = "Input Harga" /></td><td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></td></tr>')
// });

$('p input[type="button"]').click(function () {
    $('#myTable').append('<tr><td ><input type="text" class="form-control" name = "nama_jabatan[]" placeholder = "Input" /></td><td><input type="number" class="form-control" name = jumlah_jabatan[]"  id= "jumlah_jabatan[]" placeholder = "Input Jumlah" style="width: 100%  !important;"  /></td><td><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td></tr>')
});