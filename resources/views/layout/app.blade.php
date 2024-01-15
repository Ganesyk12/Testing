<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>@yield('title', 'Dashboard - NiceAdmin Bootstrap Template')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    @yield('styles')
</head>
<body>

   @include('layout.header')

   <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('scripts')
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Sembunyikan kolom yang harus diisi setelah kolom sebelumnya diisi
            $("#addProdakForm input, #addProdakForm select").prop("disabled", true);
            $("#nama_proses").prop("disabled", false);

            // Sembunyikan kolom yang harus diisi setelah kolom sebelumnya diisi
            $("#addProdakForm input:not(#nama_proses), #addProdakForm select").prop("disabled", true);

            $("#nama_proses").on("input", function() {
                if ($(this).val().trim() !== "") {
                    // Aktifkan kolom "Klasifikasi Perubahan" setelah "Nama Proses" diisi
                    $("#addProdakForm select[name='id_line']").prop("disabled", false);
                } else {
                    // Jika "Nama Proses" kosong, nonaktifkan kolom "Klasifikasi Perubahan"
                    $("#addProdakForm select[name='id_line']").prop("disabled", true);
                }
            });

            $("#nama_proses").on("input", function() {
                if ($(this).val().trim() !== "") {
                    // Aktifkan kolom "Klasifikasi Perubahan" setelah "Nama Proses" diisi
                    $("#addProdakForm input[name='klasifikasi_perubahan']").prop("disabled", false);
                } else {
                    // Jika "Nama Proses" kosong, nonaktifkan kolom "Klasifikasi Perubahan"
                    $("#addProdakForm input[name='klasifikasi_perubahan']").prop("disabled", true);
                }
            });

            // Menangani perubahan pada kolom "Klasifikasi Perubahan"
            $("#addProdakForm input[name='klasifikasi_perubahan']").on("change", function() {
                // Aktifkan kolom "Pelaksanaan 2nd QA" setelah "Klasifikasi Perubahan" dipilih
                $("#addProdakForm input[name='pelaksanaan2ndQA']").prop("disabled", false);
            });

            // Menangani perubahan pada kolom "Pelaksanaan 2nd QA"
            $("#addProdakForm input[name='pelaksanaan2ndQA']").on("change", function() {
                // Aktifkan kolom "Item Perubahan" setelah "Pelaksanaan 2nd QA" dipilih
                $("#addProdakForm input[name='item_perubahan']").prop("disabled", false);
            });

            // Menangani perubahan pada kolom "Item Perubahan"
            $("#item_perubahan").on("input", function() {
                if ($(this).val().trim() !== "") {
                    // Aktifkan kolom "Lembar Instruksi" setelah "Item Perubahan" diisi
                    $("#addProdakForm input[name='no_lembar_instruksi']").prop("disabled", false);
                } else {
                    // Jika "Item Perubahan" kosong, nonaktifkan kolom "Lembar Instruksi"
                    $("#addProdakForm input[name='no_lembar_instruksi']").prop("disabled", true);
                }
            });

            // Menangani perubahan pada kolom "No. Lembar Instruksi"
            $("#addProdakForm input[name='no_lembar_instruksi']").on("input", function() {
                if ($(this).val().trim() !== "") {
                    // Aktifkan kolom "Produksi Saat Perubahan" setelah "No. Lembar Instruksi" diisi
                    $("#addProdakForm input[name='tanggal_produksi_saat_perubahan'], #addProdakForm input[name='shiftt']").prop("disabled", false);
                } else {
                    // Jika "No. Lembar Instruksi" kosong, nonaktifkan kolom "Produksi Saat Perubahan"
                    $("#addProdakForm input[name='tanggal_produksi_saat_perubahan'], #addProdakForm input[name='shiftt']").prop("disabled", true);
                }
            });

            // Menangani perubahan pada kolom "Shift"
            $("#addProdakForm input[name='shiftt']").on("change", function() {
                // Aktifkan kolom "Part Number Finish Good" setelah "Shift" dipilih
                $("#addProdakForm input[name='part_number_finish_good']").prop("disabled", false);
            });

            // Menangani perubahan pada kolom "Part Number Finish Good"
            $("#part_number_finish_good").on("input", function() {
                if ($(this).val().trim() !== "") {
                    // Aktifkan kolom "Kualitas" setelah "Part Number Finish Good" diisi
                    $("#addProdakForm input[name='kualitas']").prop("disabled", false);
                } else {
                    // Jika "Part Number Finish Good" kosong, nonaktifkan kolom "Kualitas"
                    $("#addProdakForm input[name='kualitas']").prop("disabled", true);
                }
            });
            // Menangani perubahan pada kolom "PCDT"
            $("#addProdakForm input[name='pcdt']").on("change", function() {
                if ($(this).val() === "O") {
                    // Aktifkan kolom "Tanggal Perubahan PCDT" jika "PCDT" dipilih sebagai "Revised"
                    $("#tanggal_perubahan_pcdt").prop("disabled", false);
                } else {
                    // Jika "PCDT" dipilih sebagai "Not Revised", nonaktifkan kolom "Tanggal Perubahan PCDT"
                    $("#tanggal_perubahan_pcdt").prop("disabled", true);
                }
            });
            $("#addProdakForm input[name='pcdt']").on("change", function() {
                // Aktifkan kolom "Fakta-Fakta NG" setelah "pcdt" dipilih
                $("#addProdakForm input[name='instruksi_kerja']").prop("disabled", false);
            });

            // Menangani perubahan pada kolom "Instruksi Kerja"
            $("#addProdakForm input[name='instruksi_kerja']").on("change", function() {
                // Aktifkan kolom "Tanggal Perubahan Instruksi Kerja" setelah "Instruksi Kerja" dipilih sebagai "Revised"
                if ($(this).val() === "O") {
                    $("#tanggal_perubahan_instruksi_kerja").prop("disabled", false);
                } else {
                    $("#tanggal_perubahan_instruksi_kerja").prop("disabled", true);
                }
            });
            $("#addProdakForm input[name='instruksi_kerja']").on("change", function() {
                // Aktifkan kolom "Fakta-Fakta NG" setelah "instruksi_kerja" dipilih
                $("#addProdakForm input[name='isir']").prop("disabled", false);
            });
            // Menangani perubahan pada kolom "ISIR"
            $("#addProdakForm input[name='isir']").on("change", function() {
                // Aktifkan kolom "Tanggal Perubahan ISIR" setelah "ISIR" dipilih sebagai "Revised"
                if ($(this).val() === "O") {
                    $("#tanggal_perubahan_isir").prop("disabled", false);
                } else {
                    $("#tanggal_perubahan_isir").prop("disabled", true);
                }
            });
            $("#addProdakForm input[name='isir']").on("change", function() {
                // Aktifkan kolom "Fakta-Fakta NG" setelah "isir" dipilih
                $("#addProdakForm input[name='pemahaman']").prop("disabled", false);
            });
            $("#addProdakForm input[name='pemahaman']").on("change", function() {
                // Aktifkan kolom "Fakta-Fakta NG" setelah "isir" dipilih
                $("#addProdakForm input[name='ulasan']").prop("disabled", false);
            });

            $(document).ready(function() {
                $("#submitButton").prop("disabled", true);
            });

            $("input[name='fakta_ng']").on("change", function() {
                $("#addProdakForm input[name='pcdt']").prop("disabled", false);
                // Mengaktifkan tombol submit jika ulasan sudah diisi
            });

            $("input[name='ulasan']").add("input[name='pemahaman_paham']").on("change", function() {
                // Mengaktifkan tombol submit jika ulasan sudah diisi
                $("#submitButton").prop("disabled", false);
            });


        });
        // add prodak
        $(document).ready(function() {
            $('#addProdakForm').submit(function(e) {
                e.preventDefault();
                let nama_proses                     = $('#nama_proses').val();
                let klasifikasi_perubahan           = $('input[name="klasifikasi_perubahan"]:checked').val();
                let pelaksanaan2ndQA                = $('input[name="pelaksanaan2ndQA"]:checked').val();
                let item_perubahan                  = $('#item_perubahan').val();
                let no_lembar_instruksi             = $('#no_lembar_instruksi').val();
                let tanggal_produksi_saat_perubahan = $('#tanggal_produksi_saat_perubahan').val();
                let shiftt                          = $('input[name="shiftt"]:checked').val();
                let part_number_finish_good         = $('#part_number_finish_good').val();
                let kualitas                        = $('input[name="kualitas"]:checked').val();
                let fakta_ng                        = $('#fakta_ng').val();
                let pcdt                            = $('input[name="pcdt"]:checked').val();
                let tanggal_perubahan_pcdt          = $('#tanggal_perubahan_pcdt').val();
                let instruksi_kerja                 = $('input[name="instruksi_kerja"]:checked').val();
                let tanggal_perubahan_instruksi_kerja = $('#tanggal_perubahan_instruksi_kerja').val();
                let isir                            = $('input[name="isir"]:checked').val();
                let tanggal_perubahan_isir          = $('#tanggal_perubahan_isir').val();
                let pemahaman                       = $('input[name="pemahaman"]:checked').val();
                let ulasan                          = $('#ulasan').val();
                let id_line                         = $('#id_line').val();


                $.ajax({
                    url: "{{ route('add.prodak') }}",
                    method: 'post',
                    data: {
                        nama_proses: nama_proses,
                        klasifikasi_perubahan: klasifikasi_perubahan,
                        pelaksanaan2ndQA: pelaksanaan2ndQA,
                        item_perubahan: item_perubahan,
                        no_lembar_instruksi: no_lembar_instruksi,
                        tanggal_produksi_saat_perubahan: tanggal_produksi_saat_perubahan,
                        shiftt: shiftt,
                        part_number_finish_good: part_number_finish_good,
                        kualitas: kualitas,
                        fakta_ng: fakta_ng,
                        pcdt: pcdt,
                        tanggal_perubahan_pcdt: tanggal_perubahan_pcdt,
                        instruksi_kerja: instruksi_kerja,
                        tanggal_perubahan_instruksi_kerja: tanggal_perubahan_instruksi_kerja,
                        isir: isir,
                        tanggal_perubahan_isir: tanggal_perubahan_isir,
                        pemahaman: pemahaman,
                        ulasan: ulasan,
                        id_line:id_line
                        // Add other data fields as needed
                    },

                    success: function(res) {
                        if (res.status == 'success') {
                            $('#addModal').modal('hide');
                            $('#addProdakForm')[0].reset();
                            $('.table').load(location.href + ' .table');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data berhasil ditambahkan',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('prodaks') }}";
                                }
                            });

                        }
                    },
                    error: function(err) {
                        let errors = err.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                        });
                    }

                });
            });
            
            // menampilkan modal update data
            $(document).on('click', '.updateProdakForm', function() {
                let id                          = $(this).data('id');
                let nama_proses                 = $(this).data('nama_proses');
                let klasifikasi_perubahan       = $(this).data('klasifikasi_perubahan');
                let pelaksanaan2ndQA            = $(this).data('pelaksanaan2ndQA');
                let item_perubahan              = $(this).data('item_perubahan');
                let no_lembar_instruksi         = $(this).data('no_lembar_instruksi');
                let tanggal_produksi_saat_perubahan = $(this).data('tanggal_produksi_saat_perubahan');
                let shiftt                      = $(this).data('shiftt');
                let part_number_finish_good     = $(this).data('part_number_finish_good');
                let kualitas                    = $(this).data('kualitas');
                let fakta_ng                    = $(this).data('fakta_ng');
                let pcdt                        = $(this).data('pcdt');
                let tanggal_perubahan_pcdt      = $(this).data('tanggal_perubahan_pcdt');
                let instruksi_kerja             = $(this).data('instruksi_kerja');
                let tanggal_perubahan_instruksi_kerja = $(this).data('tanggal_perubahan_instruksi_kerja');
                let isir                        = $(this).data('isir');
                let tanggal_perubahan_isir      = $(this).data('tanggal_perubahan_isir');
                let pemahaman                   = $(this).data('pemahaman');
                let ulasan                      = $(this).data('ulasan');

                $('#up_id').val(id);
                $('#up_nama_proses').val(nama_proses);
                $('#up_klasifikasi_perubahan').val(klasifikasi_perubahan);
                $('#up_pelaksanaan2ndQA').val(pelaksanaan2ndQA);
                $('#up_item_perubahan').val(item_perubahan);
                $('#up_no_lembar_instruksi').val(no_lembar_instruksi);
                $('#up_tanggal_produksi_saat_perubahan').val(tanggal_produksi_saat_perubahan);
                $('#up_shiftt').val(shiftt);
                $('#up_part_number_finish_good').val(part_number_finish_good);
                $('#up_kualitas').val(kualitas);
                $('#up_fakta_ng').val(fakta_ng);
                $('#up_pcdt').val(pcdt);
                $('#up_tanggal_perubahan_pcdt').val(tanggal_perubahan_pcdt);
                $('#up_instruksi_kerja').val(instruksi_kerja);
                $('#up_tanggal_perubahan_instruksi_kerja').val(tanggal_perubahan_instruksi_kerja);
                $('#up_isir').val(isir);
                $('#up_tanggal_perubahan_isir').val(tanggal_perubahan_isir);
                $('#up_pemahaman').val(pemahaman);
                $('#up_ulasan').val(ulasan);
            });

            // update prodak
            $(document).on('click', '.update_prodak', function(e) {
                e.preventDefault();
                let up_id                       = $('#up_id').val();
                let up_nama_proses              = $('#up_nama_proses').val();
                let up_klasifikasi_perubahan    = $('input[name="up_klasifikasi_perubahan"]:checked').val();
                let up_pelaksanaan2ndQA         = $('input[name="up_pelaksanaan2ndQA"]:checked').val();
                let up_item_perubahan           = $('#up_item_perubahan').val();
                let up_no_lembar_instruksi      = $('#up_no_lembar_instruksi').val();
                let up_tanggal_produksi_saat_perubahan = $('#up_tanggal_produksi_saat_perubahan').val();
                let up_shiftt                   = $('input[name="up_shiftt"]:checked').val();
                let up_part_number_finish_good  = $('#up_part_number_finish_good').val();
                let up_kualitas                 = $('input[name="up_kualitas"]:checked').val();
                let up_fakta_ng                 = $('#up_fakta_ng').val();
                let up_pcdt                     = $('input[name="up_pcdt"]:checked').val();
                let up_tanggal_perubahan_pcdt   = $('#up_tanggal_perubahan_pcdt').val();
                let up_instruksi_kerja          = $('input[name="up_instruksi_kerja"]:checked').val();
                let up_tanggal_perubahan_instruksi_kerja = $('#up_tanggal_perubahan_instruksi_kerja').val();
                let up_isir                     = $('input[name="up_isir"]:checked').val();
                let up_tanggal_perubahan_isir   = $('#up_tanggal_perubahan_isir').val();
                let up_pemahaman                = $('input[name="up_pemahaman"]:checked').val();
                let up_ulasan                   = $('#up_ulasan').val();

                $.ajax({
                    url: "{{ route('update.prodak') }}",
                    method: 'post',
                    data: {
                        up_id: up_id,
                        up_nama_proses: up_nama_proses,
                        up_klasifikasi_perubahan: up_klasifikasi_perubahan,
                        up_pelaksanaan2ndQA: up_pelaksanaan2ndQA,
                        up_item_perubahan: up_item_perubahan,
                        up_no_lembar_instruksi: up_no_lembar_instruksi,
                        up_tanggal_produksi_saat_perubahan: up_tanggal_produksi_saat_perubahan,
                        up_shiftt: up_shiftt,
                        up_part_number_finish_good: up_part_number_finish_good,
                        up_kualitas: up_kualitas,
                        up_fakta_ng: up_fakta_ng,
                        up_pcdt: up_pcdt,
                        up_tanggal_perubahan_pcdt: up_tanggal_perubahan_pcdt,
                        up_instruksi_kerja: up_instruksi_kerja,
                        up_tanggal_perubahan_instruksi_kerja: up_tanggal_perubahan_instruksi_kerja,
                        up_isir: up_isir,
                        up_tanggal_perubahan_isir: up_tanggal_perubahan_isir,
                        up_pemahaman: up_pemahaman,
                        up_ulasan: up_ulasan
                    },

                    success: function(res) {
                        if (res.status == 'success') {
                            $('#updateModal').modal('hide');
                            $('#updateProdakForm')[0].reset();
                            $('.table').load(location.href + ' .table');
                            Swal.fire('Success!', 'Data berhasil diupdate', 'success');
                        }
                    },
                    error: function(err) {
                        $('.errMsgContainer').html('');
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                        });
                    }
                });
            });
            
            $(document).on('click', '.approvalProdakForm', function() {
                let id                              = $(this).data('id');
                let nama_proses                     = $(this).data('nama_proses');
                let klasifikasi_perubahan           = $(this).data('klasifikasi_perubahan');
                let pelaksanaan2ndQA                = $(this).data('pelaksanaan2ndQA');
                let item_perubahan                  = $(this).data('item_perubahan');
                let no_lembar_instruksi             = $(this).data('no_lembar_instruksi');
                let tanggal_produksi_saat_perubahan = $(this).data('tanggal_produksi_saat_perubahan');
                let shiftt                          = $(this).data('shiftt');
                let part_number_finish_good         = $(this).data('part_number_finish_good');
                let kualitas                        = $(this).data('kualitas');
                let fakta_ng                        = $(this).data('fakta_ng');
                let pcdt                            = $(this).data('pcdt');
                let tanggal_perubahan_pcdt          = $(this).data('tanggal_perubahan_pcdt');
                let instruksi_kerja                 = $(this).data('instruksi_kerja');
                let tanggal_perubahan_instruksi_kerja = $(this).data('tanggal_perubahan_instruksi_kerja');
                let isir                            = $(this).data('isir');
                let tanggal_perubahan_isir          = $(this).data('tanggal_perubahan_isir');
                let pemahaman                       = $(this).data('pemahaman');
                let ulasan                          = $(this).data('ulasan');
                let status                          = $(this).data('status');
                let status_mng_mfg                  = $(this).data('status_mng_mfg');
                let status_mng_qc                   = $(this).data('status_mng_qc');
                let status_gm                       = $(this).data('status_gm');


                $('#uup_id').val(id);
                $('#uup_nama_proses').val(nama_proses);
                $('#uup_klasifikasi_perubahan').val(klasifikasi_perubahan);
                $('#uup_pelaksanaan2ndQA').val(pelaksanaan2ndQA);
                $('#uup_item_perubahan').val(item_perubahan);
                $('#uup_no_lembar_instruksi').val(no_lembar_instruksi);
                $('#uup_tanggal_produksi_saat_perubahan').val(tanggal_produksi_saat_perubahan);
                $('#uup_shiftt').val(shiftt);
                $('#uup_part_number_finish_good').val(part_number_finish_good);
                $('#uup_kualitas').val(kualitas);
                $('#uup_fakta_ng').val(fakta_ng);
                $('#uup_pcdt').val(pcdt);
                $('#uup_tanggal_perubahan_pcdt').val(tanggal_perubahan_pcdt);
                $('#uup_instruksi_kerja').val(instruksi_kerja);
                $('#uup_tanggal_perubahan_instruksi_kerja').val(tanggal_perubahan_instruksi_kerja);
                $('#uup_isir').val(isir);
                $('#uup_tanggal_perubahan_isir').val(tanggal_perubahan_isir);
                $('#uup_pemahaman').val(pemahaman);
                $('#uup_ulasan').val(ulasan);
                $('#uup_status').val(status);
                $('#uup_status_mng_mfg').val(status_mng_mfg);
                $('#uup_status_mng_qc').val(status_mng_qc);
                $('#uup_status_gm').val(status_gm);

            });

            // approval prodak
            $(document).on('click', '.approve_prodak', function(e) {
                e.preventDefault();
                let uup_id                          = $('#uup_id').val();
                let uup_nama_proses                 = $('#uup_nama_proses').val();
                let uup_klasifikasi_perubahan       = $('input[name="uup_klasifikasi_perubahan"]:checked').val();
                let uup_pelaksanaan2ndQA            = $('input[name="uup_pelaksanaan2ndQA"]:checked').val();
                let uup_item_perubahan              = $('#uup_item_perubahan').val();
                let uup_no_lembar_instruksi         = $('#uup_no_lembar_instruksi').val();
                let uup_tanggal_produksi_saat_perubahan = $('#uup_tanggal_produksi_saat_perubahan').val();
                let uup_shiftt                      = $('input[name="uup_shiftt"]:checked').val();
                let uup_part_number_finish_good     = $('#uup_part_number_finish_good').val();
                let uup_kualitas                    = $('input[name="uup_kualitas"]:checked').val();
                let uup_fakta_ng                    = $('#uup_fakta_ng').val();
                let uup_pcdt                        = $('input[name="uup_pcdt"]:checked').val();
                let uup_tanggal_perubahan_pcdt      = $('#uup_tanggal_perubahan_pcdt').val();
                let uup_instruksi_kerja             = $('input[name="uup_instruksi_kerja"]:checked').val();
                let uup_tanggal_perubahan_instruksi_kerja = $('#uup_tanggal_perubahan_instruksi_kerja').val();
                let uup_isir                        = $('input[name="uup_isir"]:checked').val();
                let uup_tanggal_perubahan_isir      = $('#uup_tanggal_perubahan_isir').val();
                let uup_pemahaman                   = $('input[name="uup_pemahaman"]:checked').val();
                let uup_ulasan                      = $('#uup_ulasan').val();
                let uup_status                      = $('input[name="uup_status"]:checked').val();
                let uup_status_mng_mfg              = $('input[name="uup_status_mng_mfg"]:checked').val();
                let uup_reject_kakaricho            = $('#uup_reject_kakaricho').val();
                let uup_reject_mng_mfg              = $('#uup_reject_mng_mfg').val();
                let uup_status_mng_qc               = $('input[name="uup_status_mng_qc"]:checked').val();
                let uup_reject_mng_qc               = $('#uup_reject_mng_qc').val();
                let uup_status_gm                   = $('input[name="uup_status_gm"]:checked').val();
                let uup_reject_gm                   = $('#uup_reject_gm').val();

                $.ajax({
                    url: "{{ route('approve.prodak') }}",
                    method: 'post',
                    data: {
                        uup_id: uup_id,
                        uup_nama_proses: uup_nama_proses,
                        uup_klasifikasi_perubahan: uup_klasifikasi_perubahan,
                        uup_pelaksanaan2ndQA: uup_pelaksanaan2ndQA,
                        uup_item_perubahan: uup_item_perubahan,
                        uup_no_lembar_instruksi: uup_no_lembar_instruksi,
                        uup_tanggal_produksi_saat_perubahan: uup_tanggal_produksi_saat_perubahan,
                        uup_shiftt: uup_shiftt,
                        uup_part_number_finish_good: uup_part_number_finish_good,
                        uup_kualitas: uup_kualitas,
                        uup_fakta_ng: uup_fakta_ng,
                        uup_pcdt: uup_pcdt,
                        uup_tanggal_perubahan_pcdt: uup_tanggal_perubahan_pcdt,
                        uup_instruksi_kerja: uup_instruksi_kerja,
                        uup_tanggal_perubahan_instruksi_kerja: uup_tanggal_perubahan_instruksi_kerja,
                        uup_isir: uup_isir,
                        uup_tanggal_perubahan_isir: uup_tanggal_perubahan_isir,
                        uup_pemahaman: uup_pemahaman,
                        uup_ulasan: uup_ulasan,
                        uup_status: uup_status,
                        uup_status_mng_mfg: uup_status_mng_mfg,
                        uup_reject_kakaricho: uup_reject_kakaricho,
                        uup_reject_mng_mfg: uup_reject_mng_mfg,
                        uup_status_mng_qc: uup_status_mng_qc,
                        uup_reject_mng_qc: uup_reject_mng_qc,
                        uup_status_gm: uup_status_gm,
                        uup_reject_gm: uup_reject_gm
                    },

                    success: function(res) {
                        if (res.status == 'success') {
                            $('#approveModal').modal('hide');
                            $('#modal3').modal('hide');
                            $('#approveProdakForm')[0].reset();
                            $('.table').load(location.href + ' .table');
                            Swal.fire('Success!', 'Data berhasil di approve', 'success');
                        }
                    },
                    error: function(err) {
                        $('.errMsgContainer').html('');
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                        });
                    },

                });
            });
        });

        // action pada add prodak
        $(document).ready(function() {
            $('#addModal').on('shown.bs.modal', function() {
                // Tetapkan fokus pada elemen dengan ID "nama_proses"
                $('#nama_proses').focus();
            });
            // Merekam perubahan pada elemen radio kualitas
            $('input[name="kualitas"]').change(function() {
                // Mendapatkan nilai yang dipilih
                var kualitasValue = $('input[name="kualitas"]:checked').val();

                // Menangani ketergantungan antara kualitas dan fakta_ng
                if (kualitasValue === 'O') {
                    // Jika kualitas OK, nonaktifkan input fakta_ng
                    $("#addProdakForm input[name='pcdt']").prop("disabled", false);
                    $('#fakta_ng').prop('disabled', true);
                    $('#fakta_ng').val('');
                } else if (kualitasValue === 'X') {
                    $("#addProdakForm input[name='pcdt']").prop("disabled", true);
                    // Jika kualitas NG, aktifkan input fakta_ng
                    $('#fakta_ng').prop('disabled', false);
                }
            });
            $('input[name="pcdt"]').change(function() {
                // Mendapatkan nilai yang dipilih
                var pcdtValue = $('input[name="pcdt"]:checked').val();

                // Menangani ketergantungan antara pcdt dan tanggal_perubahan_pcdt
                if (pcdtValue === 'O') {
                    // Jika pcdt O, aktifkan input tanggal_perubahan_pcdt
                    $('#tanggal_perubahan_pcdt').prop('disabled', false);
                } else if (pcdtValue === 'X') {
                    // Jika pcdt X, nonaktifkan input tanggal_perubahan_pcdt
                    $('#tanggal_perubahan_pcdt').prop('disabled', true);
                }
            });
            $('input[name="instruksi_kerja"]').change(function() {
                // Mendapatkan nilai yang dipilih
                var instruksi_kerjaValue = $('input[name="instruksi_kerja"]:checked').val();

                // Menangani ketergantungan antara instruksi_kerja dan tanggal_perubahan_instruksi_kerja
                if (instruksi_kerjaValue === 'O') {
                    // Jika instruksi_kerja O, aktifkan input tanggal_perubahan_instruksi_kerja
                    $('#tanggal_perubahan_instruksi_kerja').prop('disabled', false);
                } else if (instruksi_kerjaValue === 'X') {
                    // Jika instruksi_kerja X, nonaktifkan input tanggal_perubahan_instruksi_kerja
                    $('#tanggal_perubahan_instruksi_kerja').prop('disabled', true);
                }
            });
            $('input[name="isir"]').change(function() {
                // Mendapatkan nilai yang dipilih
                var isirValue = $('input[name="isir"]:checked').val();

                // Menangani ketergantungan antara isir dan tanggal_perubahan_isir
                if (isirValue === 'O') {
                    // Jika isir O, aktifkan input tanggal_perubahan_isir
                    $('#tanggal_perubahan_isir').prop('disabled', false);
                } else if (isirValue === 'X') {
                    // Jika isir X, nonaktifkan input tanggal_perubahan_isir
                    $('#tanggal_perubahan_isir').prop('disabled', true);
                }
            });

            $('input[name="pemahaman"]').change(function() {
                // Mendapatkan nilai yang dipilih
                var pemahamanValue = $('input[name="pemahaman"]:checked').val();
                if (pemahamanValue === 'paham') {
                    $('#ulasan').prop('disabled', true);
                    $("#submitButton").prop("disabled", false);
                    $('#ulasan').val('');
                } else if (pemahamanValue === 'kurang paham') {
                    $('#ulasan').prop('disabled', false);
                    $("#submitButton").prop("disabled", true);
                } else {
                    $('#ulasan').prop('disabled', false);
                    $("#submitButton").prop("disabled", true);
                }
            });
            // Ketika tombol submit ditekan
            $('#submitButton').click(function() {
                // Menghapus atribut disabled dari elemen dengan ID "approvalOption"
                $('#approvalOption').prop('disabled', false);
            });

        });

        // action pada delete prodak
        $(document).on('click', '.delete_prodak', function(e) {
                e.preventDefault();
                let prodak_id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this product!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('delete.prodak') }}",
                            method: 'post',
                            data: {
                                prodak_id: prodak_id
                            },
                            success: function(res) {
                                if (res.status == 'success') {
                                    $('.table').load(location.href + ' .table');
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    );
                                }
                            },
                            error: function(err) {
                                $('.errMsgContainer').html('');
                                let errors = err.responseJSON.errors;
                                $.each(errors, function(index, value) {
                                    $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                                });
                            }
                        });
                    }
                });
            });

            // FUNGSI REJECT BUTTON
            $(document).ready(function() {
                $("#rejectbutton").prop("disabled", true);
            });
            $("#uup_reject_kakaricho").on("input", function() {
                if ($(this).val().trim() !== "") {
                    $("#rejectbutton").prop("disabled", false);
                    // $("#approvalProdakForm input[name='uup_reject_kakaricho']").prop("disabled", false);
                } else {
                    // Jika "Nama Proses" kosong, nonaktifkan kolom "Klasifikasi Perubahan"
                    // $("#approvalProdakForm input[name='uup_reject_kakaricho']").prop("disabled", true);
                }
            });

            $(document).ready(function() {
                $("#rejectbutton").prop("disabled", true);
            });
            $("#uup_reject_mng_mfg").on("input", function() {
                if ($(this).val().trim() !== "") {
                    $("#rejectbutton").prop("disabled", false);
                    // $("#approvalProdakForm input[name='uup_reject_kakaricho']").prop("disabled", false);
                } else {
                    // Jika "Nama Proses" kosong, nonaktifkan kolom "Klasifikasi Perubahan"
                    // $("#approvalProdakForm input[name='uup_reject_kakaricho']").prop("disabled", true);
                }
            });
            $(document).ready(function() {
                $("#rejectbutton").prop("disabled", true);
            });
            $("#uup_reject_mng_qc").on("input", function() {
                if ($(this).val().trim() !== "") {
                    $("#rejectbutton").prop("disabled", false);
                    // $("#approvalProdakForm input[name='uup_reject_kakaricho']").prop("disabled", false);
                } else {
                    // Jika "Nama Proses" kosong, nonaktifkan kolom "Klasifikasi Perubahan"
                    // $("#approvalProdakForm input[name='uup_reject_kakaricho']").prop("disabled", true);
                }
            });
            $(document).ready(function() {
                $("#rejectbutton").prop("disabled", true);
            });
            $("#uup_reject_gm").on("input", function() {
                if ($(this).val().trim() !== "") {
                    $("#rejectbutton").prop("disabled", false);
                    // $("#approvalProdakForm input[name='uup_reject_kakaricho']").prop("disabled", false);
                } else {
                    // Jika "Nama Proses" kosong, nonaktifkan kolom "Klasifikasi Perubahan"
                    // $("#approvalProdakForm input[name='uup_reject_kakaricho']").prop("disabled", true);
                }
            });

    </script>

    {!! Toastr::message() !!}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</html>
