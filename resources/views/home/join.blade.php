@extends('layouts.master-without-nav')
<style>
    /* Custom styles for Dropzone */
    .dropzone{
        min-height: 30px !important;
    }
    .dropzone .dz-message{
      font-size: 0.9rem !important;
    }
</style>

@section('title') @lang('translation.Form_Wizard') @endsection

@section('content')


<div class="account-pages my-5 pt-sm-5">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Pendaftaran Panitia</h3>
                        <form action="#" id="form-registration">

                            <!-- <div id="basic-example"> -->
                            <div id="cabang-wizard-form">
                                <!-- Kwartir Details -->
                                <h3>Pilih Panitia</h3>
                                <section>

                                    <div id="jenis_panitia" class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="jenis_panitia">Panitia (*)</label>
                                                <select class="js-example-basic-single" id="jenis_panitia_id" required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="bidang_panitia" class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="bidang_panitia">Bidang Panitia (*)</label>
                                                <select class="js-example-basic-single" name="bidang_panitia_id" id="bidang_panitia_id" required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="nama_panitia" class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="panitia">Nama Panitia (*)</label>
                                                <select class="js-example-basic-single" id="panitia_id" required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="no_telepon">Nomor Whatsapp Aktif (*)</label>
                                                <input type="number" class="form-control" name="no_telepon" id="no_telepon" placeholder="Masukan Nomor Whatsapp" required>
                                            </div>
                                        </div>
                                    </div>

                                </section>

                                <!-- Company Document -->
                                <h3>Verifikasi WA</h3>
                                <section>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="mt-4 text-center">
                                                <h5 class="mb-3 mx-2">Masukan kode OTP yang dikirimkan pada nomor whatsapp kakak</h5>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="alert alert-danger alert-dismissible" id="otp-invalid-alert" style="display: none">
                                                <strong>Kode OTP Salah!</strong> silahkan memasukkan kode OTP yang dikirimkan melalui nomor whatsapp,
                                                atau ubah nomor whatsapp yang dituju dengan menekan tombol kembali
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="alert alert-success alert-dismissible" id="otp-resend-alert" style="display: none">
                                                <strong>Berhasil mengirim OTP!</strong> silahkan memasukkan kode OTP yang dikirimkan melalui nomor whatsapp.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="otp">Kode OTP (*)</label>
                                                <input type="number" class="form-control" id="otp_token" name="otp_token" placeholder="Masukan Kode OTP">
                                                <small class="text-muted my-2">
                                                    Waktu verifikasi berakhir <span id="countdown-timer" style="text-decoration: underline"></span>
                                                </small><br />
                                                <small class="text-muted" id="retry-otp" style="display: none">
                                                Tidak menerima kode OTP ? <a href="#" style="text-decoration: underline" class="resend-otp">kirim ulang kode OTP</a>
                                            </small>
                                            </div>

                                        </div>


                                    </div>

                                </section>

                                

                                <h3>Biodata</h3>
                                <section>
                                    <div>

                                        <div class="row justify-content-center">
                                            <h3 class="text-center bold mb-3">BIODATA</h3>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nomor_tanda_anggota">Nomor Tanda Anggota</label>
                                                    <input type="text" class="form-control" id="NTA" placeholder="Masukan Nomor Tanda Anggota Kakak" name="no_tanda_anggota">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nama">Nama (*)</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Kakak" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email">Email (*)</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Kakak" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="tempat_lahir">Tempat lahir (*)</label>
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan tempat lahir Kakak" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="tanggal_lahir">Tanggal lahir (*)</label>
                                                    <div class="input-group" id="datepicker1">
                                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy"
                                                               data-date-format="dd/mm/yyyy" data-date-container='#datepicker1'
                                                               data-provide="datepicker" required name="tanggal_lahir" id="tanggal_lahir" data-date-autoclose="true">

                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="ukuran_baju">Pilih Ukuran Baju (*)</label>
                                                    </div>
                                                    <div class="col-2 ">
                                                        <input type="radio" class="form-check-input" name="ukuran_baju" id="s" value="s" checked>
                                                        <label for="s">S</label>
                                                    </div>

                                                    <div class="col-2 ">
                                                        <input type="radio" class="form-check-input" name="ukuran_baju" id="m" value="m">
                                                        <label for="m">M</label>
                                                    </div>

                                                    <div class="col-2 ">
                                                        <input type="radio" class="form-check-input" name="ukuran_baju" id="l" value="l">
                                                        <label for="l">L</label>
                                                    </div>

                                                    <div class="col-2 ">
                                                        <input type="radio" class="form-check-input" name="ukuran_baju" id="xl" value="xl">
                                                        <label for="xl">XL</label>
                                                    </div>

                                                    <div class="col-2 ">
                                                        <input type="radio" class="form-check-input" name="ukuran_baju" id="xxl" value="xxl">
                                                        <label for="xxl">XXL</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <h3>Lampiran</h3>
                                <section>
                                    <div class="row justify-content-center">
                                        <h3 class="text-center bold mb-3">LAMPIRAN</h3>
                                        <small text-center="" bold="" mb-3="" style="text-align: center;">(Maximum file size setiap file adalah <strong>✔2MB, ✔Hanya pdf dan gambar</strong>)</small>

                                        <br />

                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <div class="row mb-5">
                                                    <div class="col-12">
                                                        <label for="PasFoto" class="bold">
                                                            <h5> Pas Foto (*)</h5>
                                                        </label>

                                                        <div class="alert alert-danger" id="alert_pas_foto_val">
                                                            <strong>Lampiran Berikut Bersifat Wajib</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="dropzone" id="dzPasPhoto"></div>
                                                        <input type="text" name="pas_foto" id="pas_foto_val"
                                                            hidden>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div class="col-12">
                                                        <label for="Vaksin" class="bold">
                                                            <h5> Vaksin (*)</h5>
                                                        </label>

                                                        <div class="alert alert-danger" id="alert_vaksin_val">
                                                            <strong>Lampiran Berikut Bersifat Wajib</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="dropzone" id="dzVaksin"></div>
                                                        <input type="text" name="vaksin" id="vaksin_val" hidden>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <h3>Konfirmasi</h3>
                                <section>
                                    <div class="row justify-content-center">
                                        <h3 class="text-center bold mb-3">Konfirmasi Pendaftaran Panitia</h3>
                                        <div class="col-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="kwarda">Jenis Panitia </label>
                                                        <input type="text" class="form-control" id="jenis_panitia_konf" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3" id="bidang_panitia_input">
                                                        <label for="kwarcab">Bidang Panitia </label>
                                                        <input type="text" class="form-control"  id="bidang_panitia_konf" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- card BIODATA --}}
                                        <div class="row mb-2">
                                            <div class="card shadow-none border col-12">
                                                <h3 class="text-center bold mb-2 mt-2">BIODATA</h3>
                                                <div class="row mb-2">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3" id="nta_input">
                                                            <label for="nomorAnggota">Nomor Tanda Anggota </label>
                                                            <input type="text" class="form-control"  id="NTA_konf" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="nama">Nama </label>
                                                            <input type="text" class="form-control"  id="nama_konf" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="ttl">Tempat, Tanggal Lahir </label>
                                                            <input type="text" class="form-control" id="ttl_konf" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- card LAMPIRAN --}}
                                        <div class="row mb-2">
                                            <div class="card shadow-none border col-12">
                                                <h3 class="text-center bold mb-2 mt-2">LAMPIRAN</h3>
                                                <div class="row mb-2">
                                                    <div class="col-lg-12">
                                                        <div class="list-group">
                                                            <label class="list-group-item">
                                                                <input class="form-check-input me-1" type="checkbox"
                                                                       id="fotoCheck" disabled>
                                                                <a href="#" id="pasFotoLink" target="_blank">Pas Foto</a>
                                                            </label>
                                                            <label class="list-group-item">
                                                                <input class="form-check-input me-1" type="checkbox"
                                                                       id="vaksinCheck" disabled>
                                                                <a href="#" id="vaksinLink" target="_blank">Vaksinasi COVID</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row mb-2">
                                            <div class="form-check form-check-info mb-3">
                                                <input class="form-check-input attachment-checkbox" type="checkbox" id="persetujuan-id" >
                                                <label class="form-check-label" for="persetujuan-id">
                                                Dengan ini saya menyatakan bahwa data yang saya input benar sesuai adanya
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end row -->

@endsection
@section('script')
<!-- jquery step -->
<script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

<!-- form wizard init -->
<!-- <script src="{{ URL::asset('/build/js/pages/form-wizard.init.js') }}"></script> -->
<!-- {{-- <script src="{{ URL::asset('/build/js/wizard-form/kwarda.js') }}"></script> --}} -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- proses OTP -->
<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
   

    var mandatori = [
                    'pas_foto_val',
                    'vaksin_val',
                ]
                alertHide()

                function alertHide() {
                    $.each(mandatori, function(key, val) {
                        $('#alert_' + val).hide()
                    });
                }

                function hideSlowAttch() {
                    setTimeout(function (){
                            alertHide();
                    }, 5000)                    
                }

    $('#cabang-wizard-form').steps({
        headerTag: "h3",
        bodyTag: "section",
        next: 'Selanjutnya',
        previous: 'Sebelumnya',
        transitionEffect: "slide",
        labels: {
            cancel:"Batalkan",
            previous:"Kembali",
            finish:"Konfirmasi",
            next:"Lanjutkan",
        },
        onStepChanging: function (event, currentIndex, newIndex){
           
            let baseURL = "{{ url('/') }}";
            // changing from step 1 to step 2
            if(currentIndex === 0 && newIndex === 1){
                var $valid = $("#form-registration").valid();
                if (!$valid) {
                    return false;
                }
                let stepOneForm = $('#form-registration').serializeArray();
                $.ajax(baseURL+'/api/otp/send-verification', {
                    method: 'POST',
                    data: stepOneForm,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                });
                startOTPCountDown();
                return true;
               
            }
            // changing from set 2 to step 3
            else if(currentIndex === 1 && newIndex === 2){
                var $valid = $("#form-registration").valid();
                if (!$valid) {
                    return false;
                }
                let data = $('#form-registration').serializeArray();
                let isValid = false;
                $.ajax(baseURL+'/api/otp/verify-otp', {
                    method: 'POST',
                    data: data,
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (res){
                        if (res.data){
                            isValid = true;
                        }else{
                            otpInvalidAlert();
                            isValid = false;
                        }
                    },
                    error: function (res){
                        otpInvalidAlert();
                        isValid = false;
                    }
                });

                return isValid;
            }else if(currentIndex === 2 && newIndex === 3){
                var $valid = $("#form-registration").valid();
                if (!$valid) {
                    return false;
                }

                    return true;
                

            }else if(currentIndex === 3 && newIndex === 4){  // changing from set 4 to step 5
                var next = true;

                $.each(mandatori, function(key, val) {
                    if (!$('#' + val).val()) {
                        $('#alert_' + val).show()
                        next = false;
                    } else{
                        next = true;
                    }
                });

                var $valid = $("#form-registration").valid();
                if (!$valid) {
                    return false;
                } 

                return next;
            }else{
                return true;
            }

        },
        onFinishing: function (event, currentIndex){
            if ( !($('#persetujuan-id').is(":checked")) )
            {
                Swal.fire(
                    {
                        title: 'Centang Persetujuan!',
                        text: 'Silahkan centang persetujuan terlebih dahulu',
                        icon: 'error',
                        confirmButtonColor: '#556ee6',
                    }
                );
                return false;
            }
            let registrationForm = $("#form-registration").serializeArray();
            let pasFoto  = registrationForm.find(form => form.name === 'pas_foto');
            let vaksin  = registrationForm.find(form => form.name === 'vaksin');

            let redirectUrl;

            let kontingenType;

            if ($('#jenis_panitia_id').val() === '24' ) {
                kontingenType = 'panitia_pelaksana';
            } else if ($('#jenis_panitia_id').val() === '25' ) {
                kontingenType = 'penanggung_jawab';
            } else if ($('#jenis_panitia_id').val() === '26' ) {
                kontingenType = 'panitia_pengarah';
            }

            let bidangPanitia = $('#bidang_panitia_id').val();

            if (bidangPanitia !== null) {
                    
                registrationForm.push({
                    'name': 'bidang_panitia_id',
                    'value': bidangPanitia
                });

            } else {
                registrationForm.push({
                'name': 'bidang_panitia_id',
                'value': ''
                });
            }

            registrationForm.push({
                'name': 'kontingen_type',
                'value': kontingenType
            });

            registrationForm.push({
                'name': 'jenis_peserta_id',
                'value': $('#jenis_panitia_id').val()
            });

            let lampiran = {
                'pas_foto': pasFoto !== undefined ? pasFoto.value : null,
                'vaksin': vaksin !== undefined ? vaksin.value : null,
            };

            registrationForm.push({
                'name': 'lampiran',
                'value': JSON.stringify(lampiran)
            });
            let submitUrl = "{{ route('panitia.store') }}";
            $.ajax(submitUrl, {
                method: 'POST',
                data: registrationForm,
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (res) {
                    if (res.meta.code === 200) {
                    redirectUrl = res.data.url_payment;
                    } else {
                    redirectUrl = '';
                    }
                },
                error: function (xhr, status, error) {
                    redirectUrl = '';
                    // console.log('AJAX request failed:');
                    // console.log('Status: ' + status);
                    // console.log('Error: ' + error);
                }
                });

           
            if (redirectUrl === ''){
                Swal.fire(
                    {
                        title: 'Ada masalah Saat Melakukan Pendaftaran!',
                        text: 'Silahkan Coba Klik Tombol Konfirmasi Kembali',
                        icon: 'error',
                        confirmButtonColor: '#556ee6',
                    }
                );
                return true;
            }else{
                Swal.fire(
                    {
                        title: 'Berhasil Melakukan Pendaftaran!',
                        text: 'Terimakasih Telah Melakukan Pendaftaran',
                        icon: 'success',
                        confirmButtonColor: '#556ee6'
                    }
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/';
                    }
                });

                setTimeout(function (){
                    window.location.href = '/';
                }, 2*1000);
                return false;
            }
        }
        
    });

    $(document).on('click', '.resend-otp', function (e){
        let baseURL = "{{ url('/') }}";
        e.preventDefault();
        let stepOneForm = $('#form-registration').serializeArray();
        $.ajax(baseURL+'/api/otp/send-verification', {
            method: 'POST',
            data: stepOneForm,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (){
                otpResendAlert();
                startOTPCountDown();
            }
        });
    });

    function stepOneValid(stepOneForm)
    {
        let waNumber = stepOneForm.find(form => form.name === 'whatsapp_number');
        let kwarda = stepOneForm.find(form => form.name === 'tm_ref_propinsi');
        let kwarcab = stepOneForm.find(form => form.name === 'tm_ref_kabupaten');
        if (waNumber !== undefined && kwarda !== undefined && kwarcab !== undefined){
            return waNumber.value !== '' && kwarda.value !== '' && kwarcab.value !== '';
        }else{
            return false;
        }
    }

    function startOTPCountDown()
    {
        resetCountDown();

        setTimeout(function () {
            $('#retry-otp').fadeIn('slow');
        }, (10 * 1000));
        // Set the date we're counting down to
        let nowSecond = new Date();
        let validityTime = '{{ config('otp.validity_time') }}'; // in minute
        let countDownSecond = new Date(nowSecond);
        countDownSecond.setSeconds(nowSecond.getSeconds() + (parseInt(validityTime) * 60));

        // Update the count down every 1 second
        var x = setInterval(function () {
            let now = new Date().getTime();

            let distance = countDownSecond.getTime() - now;

            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            let countDownText = 'dalam ' + ('0' + minutes.toString()).slice(-2) + ":" + ('0' + seconds.toString()).slice(-2) + "";
            $('#countdown-timer').html(countDownText);

            if (distance < 0) {
                clearInterval(x);
                $('#retry-otp').fadeOut('slow');
                $('#countdown-timer').html('<a href="#" style="text-decoration: underline" class="resend-otp">kirim ulang</a>');
            }
        }, 1000);
    }

    function resetCountDown()
    {
        $('#countdown-timer').html('');
        var timeouts = window.setTimeout(function() {}, 0);
        const interval_id = window.setInterval(function(){}, Number.MAX_SAFE_INTEGER);

        while (timeouts--) {
            window.clearTimeout(timeouts); // will do nothing if no timeout with id is present
        }
        for (let i = 1; i < interval_id; i++) {
            window.clearInterval(i);
        }
    }

    function otpInvalidAlert()
    {
        $('#otp-invalid-alert').fadeIn('slow');
        setTimeout(function () {
            $('#otp-invalid-alert').fadeOut('slow');
        }, (5 * 1000));
    }

    function otpResendAlert()
    {
        $('#otp-resend-alert').fadeIn('slow');
        setTimeout(function () {
            $('#otp-resend-alert').fadeOut('slow');
        }, (5 * 1000));
    }

});
</script>

{{-- panitia dropdown jquery - waiting seed --}}
<script>
    
    $(document).ready(function() {
        $('#nama_panitia').hide();
        $('#bidang_panitia').hide();
        $.ajax({   
            url: "{{ route('panitia.index') }}",
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            cache: false,
            success: function(data) {
               
                let element = '<option value="">Pilih Panitia</option>';
                for (let i = 0; i < data.length; i++) {
                    element += '<option value="' + data[i]['id'] + '">' +
                        data[i]['name'] +
                        '</option>'
                }

                $('#jenis_panitia_id').html(element);
            },
        });
        

        $("#jenis_panitia_id").change(function() {
            if ($('#jenis_panitia_id').val() == "24") {
            $('#bidang_panitia').show();
            $('#nama_panitia').hide();
            $("#bidang_panitia_id").ready(function() {
                $.ajax({   
                url: "{{ route('panitia.bidangPanitia') }}",
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                cache: false,
                success: function(data) {
                    let element = '<option value="">Pilih Bidang Panitia</option>';
                    for (let i = 0; i < data.length; i++) {
                        element += '<option value="' + data[i]['id'] + '">' +
                            data[i]['name'] +
                            '</option>'
                    }

                    $('#bidang_panitia_id').html(element);
                },
                });
                });

                        $("#bidang_panitia_id").change(function() {
                    if ($('#bidang_panitia_id').val() !== null) {
                    $('#nama_panitia').show();
                        $("#panitia_id").ready(function() {
                        $.ajax({
                            url: "{{ route('panitia.bidang') }}",
                            type: 'GET',
                            data: {
                                id: $("#bidang_panitia_id").val() // Pass the selected ID as a query parameter
                            },
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            cache: false,
                            success: function(data) {
                               
                                let element = '<option value="">Pilih Panitia</option>';
                                for (let i = 0; i < data.length; i++) {
                                    element += '<option value="' + data[i]['id'] + '">' +
                                        data[i]['name'] +
                                        '</option>'
                                }

                                $('#panitia_id').html(element);
                            },
                        });
                    });
                    } else{
                    $('#nama_panitia').hide();
                    }
                });
            } else if($('#jenis_panitia_id').val() == "25"){
            $('#nama_panitia').show();
            $('#bidang_panitia').hide();
                 $("#panitia_id").ready(function() {
                        $.ajax({
                            url: "{{ route('panitia.nama') }}",
                            type: 'GET',
                            data: {
                                id: 'penanggung_jawab' // Pass the selected ID as a query parameter
                            },
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            cache: false,
                            success: function(data) {
                               
                                let element = '<option value="">Pilih Panitia</option>';
                                for (let i = 0; i < data.length; i++) {
                                    element += '<option value="' + data[i]['id'] + '">' +
                                        data[i]['name'] +
                                        '</option>'
                                }

                                $('#panitia_id').html(element);
                            },
                        });
                    });
            } else if($('#jenis_panitia_id').val() == "26"){
            $('#nama_panitia').show();
            $('#bidang_panitia').hide();
                    $("#panitia_id").ready(function() {
                        $.ajax({
                            url: "{{ route('panitia.nama') }}",
                            type: 'GET',
                            data: {
                                id: 'panitia_pengarah' // Pass the selected ID as a query parameter
                            },
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            cache: false,
                            success: function(data) {

                                let element = '<option value="">Pilih Panitia</option>';
                                for (let i = 0; i < data.length; i++) {
                                    element += '<option value="' + data[i]['id'] + '">' +
                                        data[i]['name'] +
                                        '</option>'
                                }

                                $('#panitia_id').html(element);
                            },
                        });
                    });
            } else{
            $('#nama_panitia').hide();
            $('#bidang_panitia').hide();
            }
        });


    });
</script>
<script>
    $(document).ready(function() {
        $('#tanggal_lahir').datepicker().on('changeDate', function(e) {
            // Close the datepicker when a date is selected
            $('#tanggal_lahir').datepicker('hide');
        });
    });
</script>


<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        $('.js-example-basic-single').select2();

        // Initialize Dropzone instances
        // Dropzone Pas Photo
        let dzPasPhoto = new Dropzone("#dzPasPhoto", {
            url: "{{ route('api.files.dropzone.upload') }}",  // Replace with your actual upload URL
            autoProcessQueue: true,
            maxFilesize: 2, // MB
            timeout: 120000, // 2 minute
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
            addRemoveLinks: true,
            dictDefaultMessage: "Klik atau geser file kedalam area ini!",
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    alert("Anda Hanya diizinkan mengunggah 1 file!");
                    file.previewElement.parentNode.removeChild(file.previewElement);
                });

                this.on("error", function(file, message) {
                    alert('file tidak boleh melebihi 2 MB!');
                    this.removeFile(file);
                });
            },
            success(file, res) {
                if (res.meta.code === 200) {
                    let uniqueName = res.data.file_name;
                    let fileUrl = res.data.file_url;
                    if (file.previewElement) {
                        file.previewElement.id = uniqueName;
                        $('#pas_foto_val').val(fileUrl);
                        updateCheckbox('fotoCheck', true);
                        createFileLink('pasFotoLink', fileUrl);
                        return file.previewElement.classList.add("dz-success");
                    }
                } else {
                    $('#pas_foto_val').val('');
                    createFileLink('pasFotoLink');
                    updateCheckbox('fotoCheck', false);
                }
            },
            removedfile(file) {
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    removeContent(file, 'pas_foto_val');
                    updateCheckbox('fotoCheck', false);
                    createFileLink('pasFotoLink');
                    $('#pas_foto_val').val('');
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
        });


        // Vaksin Dropzone
        let dzVaksin = new Dropzone("#dzVaksin", {
            url: "{{ route('api.files.dropzone.upload') }}",  // Replace with your actual upload URL
            autoProcessQueue: true,
            maxFilesize: 2, // mb
            timeout: 120000, // 2 minute
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
            addRemoveLinks: true,
            dictDefaultMessage: "Klik atau geser file kedalam area ini!",
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    alert("Anda Hanya diizinkan mengunggah 1 file!");
                    file.previewElement.parentNode.removeChild(file.previewElement);
                });
                this.on("error", function(file, message) {
                    alert('file tidak boleh melebihi 2 MB!');
                    this.removeFile(file);
                });
            },
            success(file, res) {
                if (res.meta.code === 200) {
                    let uniqueName = res.data.file_name;
                    let fileUrl = res.data.file_url;
                    if (file.previewElement) {
                        file.previewElement.id = uniqueName;
                        $('#vaksin_val').val(fileUrl);
                        updateCheckbox('vaksinCheck', true);
                        createFileLink('vaksinLink', fileUrl);
                        return file.previewElement.classList.add("dz-success");
                    }
                } else {
                    $('#vaksin_val').val('');
                    updateCheckbox('vaksinCheck', false);
                    createFileLink('vaksinLink');
                }
            },
            removedfile(file) {
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    removeContent(file, 'vaksin_val');
                    updateCheckbox('vaksinCheck', false);
                    createFileLink('vaksinLink');
                    $('#vaksin_val').val('');
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
        });


        // dz helper function to remove file
        function removeContent(file, inputId) {
            let fileUniqueName = file.previewElement.id;
            let removeUrl = "{{ route('api.files.dropzone.remove') }}";
            $.ajax(removeUrl, {
                method: 'POST',
                data: {
                    file_name: fileUniqueName,
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dataType: 'JSON',
                success: function (res) {
                    if (res.meta.code === 200) {
                        $('#'+inputId).val('');
                    }
                },
                error: function (res) {
                    // window.location.reload();
                }
            });
        }
        // Function to update the checkbox based on the uploaded files
        function updateCheckbox(checkboxId, isChecked) {
            $("#" + checkboxId).prop("checked", isChecked);
        }

        function createFileLink(fileId, url = '')
        {
            if (url === ''){
                $('#'+fileId).attr('href', '#');
                $('#'+fileId).attr('target', '_self');
            }else{
                $('#'+fileId).attr('href', url);
            }
        }
    });

</script>

<script>
    $(document).ready(function(){
        $('#kwarran-dropdown').hide();
        $('#gudep-dropdown').hide();
        $('#lainnya-text').hide();
        $("#jenis_peserta").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue > 1){
                    $('#type-pangkalan').show();
                } else{
                    $("#type-pangkalan").hide();
                }
            });
        }).change();
    });
</script>



<script>
    $(document).ready(function() {
        $('#bidang_panitia_input').hide();
        $('#nta_input').hide();
        //jenis panitia
        $('#jenis_panitia_id').on('select2:select', function(e) {
            var precedingValue = e.params.data.text;
            if (precedingValue !== '') {
                $('#jenis_panitia_konf').val(precedingValue);
            } else {
                $('#jenis_panitia_konf').val('');
                
            }
        });
        
        //panitia name
        $('#panitia_id').on('select2:select', function(e) {
            var precedingValue = e.params.data.text;
            var extractedValue = precedingValue.substring(0, precedingValue.lastIndexOf(',')).trim();
            if (extractedValue !== '') {
                $('#nama').val(extractedValue);
                $('#nama_konf').val(extractedValue);
            } else {
                $('#nama').val('');
                $('#nama_konf').val('');
            }
        });
        
        //bidang panitia
        $('#bidang_panitia_id').on('select2:select', function(e) {
            var precedingValue = e.params.data.text;
            if (precedingValue !== '') {
                $('#bidang_panitia_input').show();
            $('#bidang_panitia_konf').val(precedingValue);
            } else {
                $('#bidang_panitia_input').hide();
                $('#bidang_panitia_konf').val('');
            }
        });

        
        $('#NTA').on('input', function() {
            var precedingValue = $(this).val();
            if (precedingValue !== '') {
            $('#nta_input').show();
            $('#NTA_konf').val(precedingValue);
            } else {
            $('#nta_input').hide();
            $('#NTA_konf').val('');
            }
        });

        $('#nama').on('input', function() {
            var precedingValue = $(this).val();
            if (precedingValue !== '') {
            $('#nama_konf').val(precedingValue);
            } else {
            $('#nama_konf').val('');
            }
        });

        $('#tempat_lahir, #tanggal_lahir').on('change', function() {
            var tempat = $('#tempat_lahir').val();
            var tanggal = $('#tanggal_lahir').val();
            var ttl = tempat + ', ' + tanggal;
            if (ttl !== '') {
                $('#ttl_konf').val(ttl);
            } else {
                $('#ttl_konf').val('');
            }
        });

    })
</script>



@endsection