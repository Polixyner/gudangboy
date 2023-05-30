$(document).ready(function () {
    $('#bulan').on('change', function (e) {
        var bulan = $(this).val();
        $("#awal").val('');
        $("#akhir").val('');

        $.ajax({
            url: 'filterMonth.php',
            type: 'GET',
            data: { bulan: bulan },
            dataType: 'json',
            success: function (response) {
                var tbody = $('#example1 tbody');
                tbody.empty();

                for (var i = 0; i < response.length; i++) {
                    var no = i + 1;
                    var row = response[i];
                    var tr = $('<tr></tr>');
                    tr.append('<td>' + no + '</td>');
                    tr.append('<td>' + row.namaBarang + '</td>');
                    if (row.statusTransaksi == 1) {
                        tr.append('<td class="text-center"><button class="btn btn-sm btn-success">Masuk</button></td>');
                    } else {
                        tr.append('<td class="text-center"><button class="btn btn-sm btn-danger">Keluar</button></td>');
                    }

                    tr.append('<td>' + row.tanggalTransaksi + '</td>');
                    tr.append('<td>' + row.stokTransaksi + '</td>');
                    tr.append('<td>' + row.namaUser + '</td>');
                    tbody.append(tr);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });

    $("#searchDate").submit(function (event) {
        event.preventDefault();

        var awal = $("#awal").val();
        var akhir = $("#akhir").val();
        $('#bulan').val('');

        $.ajax({
            url: 'filterDate.php',
            type: 'GET',
            data: { awal: awal, akhir: akhir },
            dataType: 'json',
            success: function (response) {
                var tbody = $('#example1 tbody');
                tbody.empty();

                for (var i = 0; i < response.length; i++) {
                    var no = i + 1;
                    var row = response[i];
                    var tr = $('<tr></tr>');
                    tr.append('<td>' + no + '</td>');
                    tr.append('<td>' + row.namaBarang + '</td>');
                    if (row.statusTransaksi == 1) {
                        tr.append('<td class="text-center"><button class="btn btn-sm btn-success">Masuk</button></td>');
                    } else {
                        tr.append('<td class="text-center"><button class="btn btn-sm btn-danger">Keluar</button></td>');
                    }

                    tr.append('<td>' + row.tanggalTransaksi + '</td>');
                    tr.append('<td>' + row.stokTransaksi + '</td>');
                    tr.append('<td>' + row.namaUser + '</td>');
                    tbody.append(tr);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });

    $('#dateReset').on('click', function (e) {
        var awal = "";
        var akhir = "";
        $('#bulan').val('');

        $.ajax({
            url: 'filterDate.php',
            type: 'GET',
            data: { awal: awal, akhir: akhir },
            dataType: 'json',
            success: function (response) {
                var tbody = $('#example1 tbody');
                tbody.empty();

                for (var i = 0; i < response.length; i++) {
                    var no = i + 1;
                    var row = response[i];
                    var tr = $('<tr></tr>');
                    tr.append('<td>' + no + '</td>');
                    tr.append('<td>' + row.namaBarang + '</td>');
                    if (row.statusTransaksi == 1) {
                        tr.append('<td class="text-center"><button class="btn btn-sm btn-success">Masuk</button></td>');
                    } else {
                        tr.append('<td class="text-center"><button class="btn btn-sm btn-danger">Keluar</button></td>');
                    }

                    tr.append('<td>' + row.tanggalTransaksi + '</td>');
                    tr.append('<td>' + row.stokTransaksi + '</td>');
                    tr.append('<td>' + row.namaUser + '</td>');
                    tbody.append(tr);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });

});
