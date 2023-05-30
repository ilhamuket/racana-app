@extends('layouts.master-without-nav')


@section('content')


<div class="account-pages my-5 pt-sm-5">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Pendaftaran Anggota Racana</h3>
                        <form id="form-registration" method="POST" action="#">
                            @csrf
                            
                            <!-- <div id="basic-example"> -->
                            <div id="cabang-wizard-form">

                                

                                <h3>Biodata</h3>
                                <section>
                                    <div>

                                        <div class="row justify-content-center">
                                            <h3 class="text-center bold mb-3">BIODATA</h3>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nomor_tanda_anggota">Nomor Induk Mahasiswa</label>
                                                    <input type="number" class="form-control" id="NTA" placeholder="Masukan Nomor Induk Mahasiswa Kakak" name="nim">
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
                                                    <label for="no_telepon">Nomor Whatsapp Aktif (*)</label>
                                                    <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukan Nomor Whatsapp Kakak" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="jenis_kelamin">Pilih Jenis Kelamin (*)</label>
                                                    </div>
                                                    <div class="col-2 ">
                                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="pria" value="pria" required>
                                                        <label for="pria">Pria</label>
                                                    </div>

                                                    <div class="col-2 ">
                                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="wanita" value="wanita">
                                                        <label for="wanita">Wanita</label>
                                                    </div>
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
                                                        <input type="radio" class="form-check-input" name="ukuran_baju" id="s" value="s" required>
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
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="alamat">Alamat (*)</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Kakak" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="image">Foto (*)</label>
                                                    <input type="file" class="form-control" id="image" name="image" placeholder="Masukan Foto Kakak" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <h3>Konfirmasi</h3>
                                <section>
                                    <div class="row justify-content-center">
                                        <h3 class="text-center bold mb-3">Konfirmasi Pendaftaran Anggota</h3>

                                        {{-- card BIODATA --}}
                                        <div class="row mb-2">
                                            <div class="card shadow-none border col-12">
                                                <h3 class="text-center bold mb-2 mt-2">BIODATA</h3>
                                                <div class="row mb-2">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3" id="nta_input">
                                                            <label for="nomorAnggota">Nomor Induk Mahasiswa </label>
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
                                                            <label for="no_telepon">Nomor Whatsapp </label>
                                                            <input type="text" class="form-control"  id="no_telepon_konf" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="jenis_kelamin">Jenis Kelamin </label>
                                                            <input type="text" class="form-control"  id="jenis_kelamin_konf" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="ttl"> Tanggal Lahir </label>
                                                            <input type="text" class="form-control" id="ttl_konf" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="ukuran_baju">Ukuran Baju </label>
                                                            <input type="text" class="form-control"  id="ukuran_baju_konf" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" class="form-control"  id="alamat_konf" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="image_url_konf">Foto</label>
                                                            <img id="image_preview" src="#" alt="Preview" style="width: 100%;  display: none;">
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

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    

<!-- proses OTP -->
<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
   

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
                
                return true;
               
            }
            // changing from set 2 to step 3
            else if(currentIndex === 1 && newIndex === 2){
                var $valid = $("#form-registration").valid();
                if (!$valid) {
                    return false;
                }

                return true;
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
            // Obtain the file input element
            let imageInput = document.getElementById('image');

            // Create a new FormData object
            let formData = new FormData();

            // Append the file to the FormData object
            formData.append('image', imageInput.files[0]);

            // Append other form data fields to the FormData object
            formData.append('name', $('#name').val());
            formData.append('email', $('#email').val());
            formData.append('nim', $('#nim').val());
            formData.append('no_telepon', $('#no_telepon').val());
            formData.append('jenis_kelamin', $('input[name="jenis_kelamin"]:checked').val());
            formData.append('tanggal_lahir', $('#tanggal_lahir').val());
            formData.append('ukuran_baju', $('input[name="ukuran_baju"]:checked').val());
            formData.append('alamat', $('#alamat').val());
            formData.append('image', $('#image')[0].files[0]);
            
            let redirectUrl;

            
            $.ajax({
                url: "{{ route('store') }}",
                type: "POST",
                data: formData, 
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false, // Set contentType to false for file uploads
                processData: false, // Set processData to false for file uploads
                success: function (res) {
                    console.log(res);
                    if (res.success) {
                    redirectUrl = '/';
                    Swal.fire(
                    {
                        title: 'Berhasil Melakukan Pendaftaran!',
                        text: 'Selamat Kakak Telah Melakukan Pendaftaran, Silahkan Join Grup Whatsapp dengan Menekan Tombol OK!',
                        icon: 'success',
                        confirmButtonColor: '#556ee6'
                    }
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'https://chat.whatsapp.com/H7TBqpSKgrMJIe8YKDB5EQ';
                    }
                });
                    } else {
                    redirectUrl = '';
                    }
                    
                },
                error: function (xhr, status, error) {
                    redirectUrl = '';
                    console.log('AJAX request failed:');
                    console.log('Status: ' + status);
                    console.log('Error: ' + error);
                    Swal.fire(
                    {
                        title: 'Ada masalah Saat Melakukan Pendaftaran!',
                        text: 'Silahkan Coba Klik Tombol Konfirmasi Kembali',
                        icon: 'error',
                        confirmButtonColor: '#556ee6',
                    }
                );
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
                // Swal.fire(
                //     {
                //         title: 'Berhasil Melakukan Pendaftaran!',
                //         text: 'Terimakasih Telah Melakukan Pendaftaran',
                //         icon: 'success',
                //         confirmButtonColor: '#556ee6'
                //     }
                // ).then((result) => {
                //     if (result.isConfirmed) {
                //         window.location.href = '/';
                //     }
                // });

               
            }
        }
        
    });



    });
</script>

{{-- panitia dropdown jquery - waiting seed --}}

<script>
    $(document).ready(function() {
        $('#tanggal_lahir').datepicker().on('changeDate', function(e) {
            // Close the datepicker when a date is selected
            $('#tanggal_lahir').datepicker('hide');
        });
    });
</script>






<script>
        $(document).ready(function() {
    $('#nta_input').hide();

    $('input[name="nim"]').on('input', function() {
        var precedingValue = $(this).val();
        if (precedingValue !== '') {
        $('#NTA_konf').val(precedingValue);
        } else {
        $('#NTA_konf').val('');
        }
    });

    $('input[name="nama"]').on('input', function() {
        var precedingValue = $(this).val();
        if (precedingValue !== '') {
        $('#nama_konf').val(precedingValue);
        } else {
        $('#nama_konf').val('');
        }
    });

    $('input[name="no_telepon"]').on('input', function() {
        var precedingValue = $(this).val();
        if (precedingValue !== '') {
        $('#no_telepon_konf').val(precedingValue);
        } else {
        $('#no_telepon_konf').val('');
        }
    });

    $('input[name="jenis_kelamin"]').on('change', function() {
    var precedingValue = $('input[name="jenis_kelamin"]:checked').val();
    if (precedingValue !== undefined) {
      $('#jenis_kelamin_konf').val(precedingValue);
    } else {
      $('#jenis_kelamin_konf').val('');
    }
  });

  $('input[name="ukuran_baju"]').on('change', function() {
    var precedingValue = $('input[name="ukuran_baju"]:checked').val();
    if (precedingValue !== undefined) {
      $('#ukuran_baju_konf').val(precedingValue);
    } else {
      $('#ukuran_baju_konf').val('');
    }
  });


    $('#tanggal_lahir').on('change', function() {
        var precedingValue = $(this).val();
        if (precedingValue !== '') {
        $('#ttl_konf').val(precedingValue);
        } else {
        $('#ttl_konf').val('');
        }
    });

    

    $('input[name="alamat"]').on('input', function() {
        var precedingValue = $(this).val();
        if (precedingValue !== '') {
        $('#alamat_konf').val(precedingValue);
        } else {
        $('#alamat_konf').val('');
        }
    });

    $('input[name="image"]').on('change', function() {
        var fileInput = $(this)[0];
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image_preview').attr('src', e.target.result).show();
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            $('#image_preview').attr('src', '#').hide();
        }
    });

});


</script>



@endsection