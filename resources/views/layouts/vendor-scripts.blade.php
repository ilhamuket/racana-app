<script src="{{ URL::asset('build/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/select2/js/select2.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/node-waves/waves.min.js')}}"></script>
<script src="{{ URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
{{-- swal --}}
<script src="{{ URL::asset('/build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('/build/js/pages/sweet-alerts.init.js') }}"></script>
<!-- JS here -->
{{ URL::asset('/build/css/bootstrap.min.css') }}
<!-- All JS Custom Plugins Link Here here -->
<script src="{{ URL::asset('/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ URL::asset('/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ URL::asset('/assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ URL::asset('/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/slick.min.js') }}"></script>
<!-- Date Picker -->
<script src="{{ URL::asset('/assets/js/gijgo.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ URL::asset('/assets/js/wow.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/animated.headline.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Breaking New Pluging -->
<script src="{{ URL::asset('/assets/js/jquery.ticker.js') }}"></script>
<script src="{{ URL::asset('/assets/js/site.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ URL::asset('/assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src="{{ URL::asset('/assets/js/contact.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery.form.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/mail-script.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="{{ URL::asset('/assets/js/plugins.js') }}"></script>
<script src="{{ URL::asset('/assets/js/main.js') }}"></script>

<script>
    Dropzone.autoDiscover = false;
    $('#change-password').on('submit',function(event){
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "{{ url('update-password') }}" + "/" + Id,
            type:"POST",
            data:{
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "{{ csrf_token() }}",
            },
            success:function(response){
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if(response.isSuccess == false){ 
                    $('#current_passwordError').text(response.Message);
                }else if(response.isSuccess == true){
                    setTimeout(function () {   
                        window.location.href = "#"; 
                    }, 1000);
                }
            },
            error: function(response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
            }
        });
    });
</script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('build/js/app.js')}}"></script>

@yield('script-bottom')