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

                <form method="get" class="my-4" id="form-registration" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row row justify-content-center">
                        <div class="col-lg-8">
                            <div class="col-lg-12" id="judulInput">
                                <div class="mb-3">
                                    <label for="name">Judul Artikel</label>
                                    <input type="text" class="form-control" name="name" id="judul" value="{{ $anggota->name }}" disabled>
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
                                    <select class="form-control select2" style="width: 100%;" id="categories" name="categories_id"  disabled>
                                   </select>
                                </div>
                            </div>
                        

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="image">Gambar Thumbnail</label>
                                    
                                    <div id="imagePreview"></div>
                                </div>
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


</script>
@endsection