@extends('layouts.master')
<style>
    /* Custom styles for Dropzone */
    .dropzone {
        min-height: 30px !important;
    }

    .dropzone .dz-message {
        font-size: 0.9rem !important;
    }
</style>

@section('title')
@lang('translation.Dashboards')
@endsection

@section('content')

{{-- card BIODATA --}}
<div class="row mb-2">
    <section>
        <div class="row justify-content-center">

            <div class="card shadow-none border col-12">
                <h3 class="text-center bold mt-3 mb-3">Edit Artikel</h3>

                <form method="post" action="{{ route('article.update',  $anggota->id ) }}" class="my-4" id="form-registration" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row row justify-content-center">
                        <div class="col-lg-8">
                            <div class="col-lg-12" id="judulInput">
                                <div class="mb-3">
                                    <label for="name">Judul Artikel</label>
                                    <input type="text" class="form-control" name="name" id="judul" value="{{ $anggota->name }}" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" name="description" id="editor" >{{ $anggota->description }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-lg-12" id="jenis_kategori">
                                <div class="mb-3">
                                    <label for="categories">Kategori</label>
                                    <select class="form-control select2" style="width: 100%;" id="categories" name="categories_id"  required>
                                   </select>
                                </div>
                            </div>
                        

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="image">Gambar Thumbnail</label>
                                    <input type="file" class="form-control" name="image_url" id="image" onchange="previewImage(event)">
                                    <div id="imagePreview"></div>
                                </div>
                            </div>
                            

                        <div class="col-12 mb-5">
                            <button type="submit" class="btn btn-info waves-effect waves-light float-end mx-2">
                                <i class="bx bx-save font-size-16 align-middle me-2"></i> SIMPAN
                            </button>
        
                        </div>

                    </div>
                </form>

            </div>
        </div>
</div>


</div>
</section>
@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
<script src="/build/plugins/select2/js/select2.full.min.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
    
        reader.onload = function() {
            var imagePreview = document.getElementById('imagePreview');
            var imageElement = document.createElement('img');
            imageElement.src = reader.result;
            imageElement.classList.add('preview-image');
            imagePreview.innerHTML = '';
            imagePreview.appendChild(imageElement);
        };
    
        reader.readAsDataURL(input.files[0]);
    }
    
    // Display initial image preview if available
    var initialImageUrl = "{{ $anggota->image_url }}";
    if (initialImageUrl) {
        var imagePreview = document.getElementById('imagePreview');
        var imageElement = document.createElement('img');
        imageElement.src = initialImageUrl;
        imageElement.classList.add('preview-image');
        imagePreview.innerHTML = '';
        imagePreview.appendChild(imageElement);
    }
    </script>
    
    <style>
    .preview-image {
        max-width: 100%;
        height: auto;
    }
    </style>
<script>
    $(document).ready(function() {
        $.ajax({   
            url: "{{ route('article.list') }}",
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            cache: false,
            success: function(data) {
                let element = '<option value="">Pilih Kategori</option>';
                for (let i = 0; i < data.length; i++) {
                    element += '<option value="' + data[i]['id'] + '">' +
                        data[i]['name'] +
                        '</option>';
                }
    
                $('#categories').html(element);
    
                // Preselect the value based on $anggota->categories_id
                let anggotaCategoriesId = "{{ $anggota->categories_id }}";
                $('#categories').val(anggotaCategoriesId);
            },
        });
    });
    </script>
<script>
    $(document).ready(function() {
    let registrationForm = $("#form-registration");

    registrationForm.on("submit", function(event) {
        event.preventDefault();

        // Get the form data
        let formData = new FormData(this);


        $.ajax({
            url: registrationForm.attr("action"),
            method: registrationForm.attr("method"),
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(res) {
                // Handle success response
                if (res.success) {
                    redirectUrl = '/';
                    Swal.fire(
                    {
                        title: 'Berhasil Melakukan Pendaftaran!',
                        text: 'Selamat Kakak Telah Melakukan Pendaftaran, Kakak akan dihubungi oleh kami nanti ya!',
                        icon: 'success',
                        confirmButtonColor: '#556ee6'
                    }
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = {{ route('article.index') }};
                    }
                });
                    } else {
                    redirectUrl = '';
                    }
                
            },
            error: function(res) {
                // Handle error response
                console.log("gagal");
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
    });
});

</script>
@endsection