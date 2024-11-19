<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $menu }} | {{ config('app.name', 'Laravel') }}</title>
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/css/adminlte.min.css') }}?v={{ time() }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/summernote/summernote-bs4.min.css') }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="{{ URL('assets/dist/plugins/toastr/toastr.min.css') }}">
        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse" id="app">

        <div class="wrapper w-100">
            @include ('layouts.header')

            @include ('layouts.sidebar')
            
            @yield('content')

            <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    </div>
                </div>
            </div>

            @include ('layouts.footer')
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>
    
        @livewireScripts

        <script src="{{ URL('assets/dist/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL('assets/dist/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="{{ URL('assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL('assets/dist/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ URL('assets/dist/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ URL('assets/dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ URL('assets/dist/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ URL('assets/dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ URL('assets/dist/js/adminlte.js') }}"></script>
        <script src="{{ URL('assets/dist/js/demo.js') }}"></script>
        <script src="{{ URL('assets/dist/plugins/iCheck/icheck.min.js')}}"></script>
        <script src="{{ URL('assets/dist/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL('assets/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ URL('assets/dist/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ URL('assets/dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{ URL('assets/dist/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ URL('assets/dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
        <script src="{{ URL('assets/dist/js/table-actions.js')}}?v={{ time() }}" data-navigate-once></script>
        <script src="{{ URL('assets/dist/plugins/toastr/toastr.min.js')}}"></script>
        <script type="text/javascript">
            $( function() {
                $("textarea[id=description]").summernote({
                    height: 250,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize', 'height']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['table','picture','link','map','minidiag']],
                        ['misc', ['fullscreen', 'codeview']],
                    ]
                });
            });

            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            });

            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',
                    locale: {
                        format: 'YYYY/MM/DD'
                    },
                }, function(start, end, label) {
                    console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
                });

                $('input[name="daterange"]').val('');

                @if(Session::has('success'))
                    toastr.success("{{Session::get('success')}}")
                @elseif(Session::has('danger'))
                    toastr.error("{{Session::get('danger')}}")
                @elseif(Session::has('warning'))
                    toastr.warning("{{Session::get('warning')}}")
                @endif
            });

            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

            selectedImages = [];

            function AjaxUploadImage(obj,id){
                var file = obj.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!match.includes(imagefile)) {
                    $('#previewing'+URL).attr('src', 'noimage.png');
                    alert("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                } else{
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(obj.files[0]);
                }

                function imageIsLoaded(e){
                    $('#DisplayImage').css("display", "block");
                    $('#DisplayImage').css("margin-top", "1.5%");
                    $('#DisplayImage').attr('src', e.target.result);
                    $('#DisplayImage').attr('width', '150');
                }
            }

            function AjaxMultiUploadImage(obj) {
                var files = obj.files;
                var imagePreviewContainer = document.getElementById('imagePreviewContainer');
                var match = ["image/jpeg", "image/png", "image/jpg"];

                $('.loading-spinner-main').css("display", "flex");
                
                // Loop through all selected files
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var imagefile = file.type;

                    if (!match.includes(imagefile)) {
                        alert("Please Select A valid Image File. Only jpeg, jpg, and png images are allowed.");
                        continue;
                    }

                    // Add the image to the selectedImages array
                    selectedImages.push(file);

                    $('#currentNoImage').remove();

                    // Create preview
                    var reader = new FileReader();
                    reader.onload = (function(file, index) {
                        return function(e) {
                            var imgWrapper = document.createElement("div");
                            imgWrapper.classList.add("image-preview-item");

                            var imgElement = document.createElement("img");
                            imgElement.src = e.target.result;
                            imgElement.width = 100; // Set preview width

                            // Add Remove button
                            var removeBtn = document.createElement("button");
                            removeBtn.innerHTML = "<i class='fa fa-times-circle'></i>";
                            removeBtn.classList.add("remove-btn");
                            removeBtn.onclick = function() {
                            removeImage(index);
                            };

                            imgWrapper.appendChild(imgElement);
                            imgWrapper.appendChild(removeBtn);
                            imagePreviewContainer.appendChild(imgWrapper);
                        };
                    })(file, selectedImages.length - 1);

                    reader.readAsDataURL(file);
                }

                setTimeout(() => {
                    $('.loading-spinner-main').css("display", "none");
                }, 3000);
            }

            // Function to remove image from preview and selectedImages array
            function removeImage(index) {
                selectedImages.splice(index, 1); // Remove the image from the selected array
                renderPreview(); // Re-render the preview to reflect changes
            }

            // Re-render the image preview
            function renderPreview() {
                var imagePreviewContainer = document.getElementById('imagePreviewContainer');
                imagePreviewContainer.innerHTML = ""; // Clear current preview

                selectedImages.forEach((file, index) => {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imgWrapper = document.createElement("div");
                        imgWrapper.classList.add("image-preview-item");

                        var imgElement = document.createElement("img");
                        imgElement.src = e.target.result;
                        imgElement.width = 100; // Set preview width

                        // Add Remove button
                        var removeBtn = document.createElement("button");
                        removeBtn.innerHTML = "<i class='fa fa-times-circle'></i>";
                        removeBtn.classList.add("remove-btn");
                        removeBtn.onclick = function() {
                            removeImage(index);
                        };

                        imgWrapper.appendChild(imgElement);
                        imgWrapper.appendChild(removeBtn);
                        imagePreviewContainer.appendChild(imgWrapper);
                    };
                    reader.readAsDataURL(file);
                });
            }
        </script>
    </body>
</html>