$(function () {
    $('.buttonTambahpic').on('click', function () {
        $('#judulModal').html('Tambah Data PIC');
        $('.buttonFormModal').html('Tambah Data');
    });
    $('.tomboledit').on('click', function () {
        $('#judulModal').html('Edit Data PIC');
        $('.buttonFormModal').html('Edit Data');
        $('.modal-body form').attr('action', 'http://blitzindoutama.com//system/edit_pic.php');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://blitzindoutama.com//login/man/json_pic.php',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#id').val(data.id);
            }
        });
    });
})

$(function () {
    $('.buttonTambahuser').on('click', function () {
        $('#judulModal').html('Tambah Data User');
        $('.buttonFormModal').html('Tambah User');
    });
    $('.tomboleditakun').on('click', function () {
        $('#judulModal').html('Edit Data User');
        $('.buttonFormModal').html('Edit Data');
        $('.modal-body form').attr('action', 'http://blitzindoutama.com/login/system/edit_akun.php');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://blitzindoutama.com/login/man/json_akun.php',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data.kode);
                $('#username').val(data.kode);
                $('#nama').val(data.nama);
                $('#email').val(data.email);
                $('#password').val(data.password);
                var level = data.level;
                if (level == 2) {
                    var leveling = "Admin";
                } else {
                    var leveling = "Operator"
                }
                $('#level').val(leveling);
                $('#id').val(data.id);
            }
        });
    });
})