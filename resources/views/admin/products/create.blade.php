@extends('admin.layouts.app')
@section('css')
    <link href="/admin/assets/vendor/bootstrap-file-input/fileinput.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/vendor/dropify/css/dropify.css" rel="stylesheet" type="text/css" />
@stop
@section('main')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Create Product <small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Tables</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Create Product</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">
            @include('admin.inc.flash-message')
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="content-heading border-bottom mb-4 pb-2">Regular</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                    <select class="js-select form-control" name="category_id" style="width: 100%;">
                                        <option selected value="">Select</option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}">{{ $row->name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_en">Product Name En <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_en" name="name_en"
                                        value="{{ old('name_en') }}">
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="selling_price">Selling Price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="selling_price" name="selling_price"
                                        value="{{ old('selling_price') }}">
                                    @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="val-confirm-password">Colors En <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="color_en" class="form-control" data-role="tagsinput"
                                        value="{{ old('color_en') }}">
                                </div>
                                <div class="form-group">
                                    <label for="val-confirm-password">Sizes En <span class="text-danger">*</span></label>
                                    <input type="text" name="size_en" class="form-control" data-role="tagsinput"
                                        value="{{ old('size_en') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="subcategory_id">Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control js-select" name="subcategory_id" style="width: 100%;">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name_bn">Product Name Bn <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_bn" name="name_bn"
                                        value="{{ old('name_bn') }}">
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">Discount price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="discount_price" name="discount_price"
                                        value="{{ old('discount_price') }}">
                                </div>
                                <div class="form-group">
                                    <label for="val-confirm-password">Tags En <span class="text-danger">*</span></label>
                                    <input type="text" name="tag_en" class="form-control" data-role="tagsinput"
                                        value="{{ old('tag_en') }}">
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Visibility</label>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="hot_deal" name="hot_deal">
                                        <label class="custom-control-label" for="hot_deal">Hot Deal</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="featured" name="featured">
                                        <label class="custom-control-label" for="featured">Featured</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="spacial_offer"
                                            name="spacial_offer">
                                        <label class="custom-control-label" for="spacial_offer">Spacial Offer</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="spacial_deals"
                                            name="spacial_deals">
                                        <label class="custom-control-label" for="spacial_deals">Spacial Deals</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="is-active" name="is_active">
                                        <label class="custom-control-label" for="is-active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="val-email">Inner Category <span class="text-danger">*</span></label>
                                    <select class="js-select form-control" name="inner_category_id" style="width: 100%;">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="code">Product Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        value="{{ old('code') }}">
                                </div>
                                <div class="form-group">
                                    <label for="qty">Qty <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="qty" name="qty"
                                        value="{{ old('qty') }}">
                                    @error('qty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="val-confirm-password">Tags Bn <span class="text-danger">*</span></label>
                                    <input type="text" name="tag_bn" class="form-control" data-role="tagsinput"
                                        value="{{ old('tag_bn') }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Brands</label>
                                    <select class="form-control select2" name="brand_id" id="getBrand">
                                        <option value='0'></option>
                                    </select>
                                    <a href="javascript:void(0);" class="btn btn-info btn-sm mt-2 brandCreate"
                                        id="brandCreate"><i class="ri-add-fill"></i>Add New</a>
                                </div>
                            </div>
                        </div>

                        <h2 class="content-heading border-bottom mb-4 pb-2">Images</h2>
                        <div class="row items-push">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="val-confirm-password">Main image <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="thumb_image" class="form-control dropify">
                                    @error('thumb_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Avatar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" type="file"
                                            onchange="showAltImg(event, '#alt_img_show', 'pro_alt_temp_img')" multiple>
                                        <label class="custom-file-label" for="one-profile-edit-avatar">Choose a new
                                            avatar</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="alt_img_show" class="d-flex align-items-center">

                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="validationCustom03">Additional Image</label>
                                    <div class="custom-file">
                                        <input id="file-demo" type="file" class="file" name="multi_images[]"
                                               multiple=true data-preview-file-type="any"
                                               data-theme="fas">
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <h2 class="content-heading border-bottom mb-4 pb-2">Description</h2>
                        <div class="row items-push">
                            <div class="col-lg-6">
                                <label for="val-email">Short Desc En <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <textarea name="short_desc_en"
                                        class="ckeditor">{{ old('short_desc_en') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="val-email">Short Desc Bn</label>
                                <div class="form-group">
                                    <textarea name="short_desc_bn"
                                        class="ckeditor">{{ old('short_desc_bn') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="val-email">Long Desc En</label>
                                <div class="form-group">
                                    <textarea name="long_desc_en"
                                        class="ckeditor">{{ old('long_desc_en') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="val-email">Long Desc Bn</label>
                                <div class="form-group">
                                    <textarea id="js-ckeditor2" name="long_desc_bn"
                                        class="ckeditor">{{ old('long_desc_bn') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row items-push">
                            <div class="col-lg-7">
                                <button type="submit" class="btn btn-alt-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title" id="head_text">Modal Title</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data" id="form-create">
                        @csrf
                        <div class="block-content font-size-sm">
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul class="m-0"></ul>
                            </div>
                            <div class="row push">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name_en">Name En</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name_bn">Name Bn</label>
                                        <input type="text" class="form-control" id="name_bn" name="name_bn" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="push">
                                            <img id="showImg" class="img-avatar" src="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" id="image" />
                                    </div>
                                    <div class="form-group">
                                        <label>Active</label>
                                        <div class="custom-control custom-switch mb-1">
                                            <input type="checkbox" class="custom-control-input" id="is_active"
                                                name="is_active" />
                                            <label class="custom-control-label" for="is_active"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-right border-top">
                                <button type="submit" class="btn btn-primary btn-save">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin/assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    {{-- image preview plugin --}}
    <script src="/admin/assets/vendor/bootstrap-file-input/fileinput.js"></script>
    <script src="/admin/assets/vendor/bootstrap-file-input/theme.js"></script>
    <script src="/admin/assets/vendor/dropify/js/dropify.js"></script>
    <!-- add brand ajax-->
    <script>
        $(function() {
            // open create modal
            $(".brandCreate").on("click", function(e) {
                e.preventDefault();
                console.log('ok');
                $(".print-error-msg").css('display', 'none');
                $("#head_text").html('Add Brand');

                var form = $("#form-create");
                form.attr("action", route('brands.store'));
                form.attr("method", "POST");

                $("input[name=name_en]").val("");
                $("input[name=name_bn]").val("");
                $("input[name=is_active]").prop('checked', false);
                $("#showImg").attr('src', '{{ url('uploads/no-img.jpg') }}');
                $("input[name=image]").val("");
                $(".img-avatar").hide();

                $("#modal-create").modal();
            });

            //insert data
            $("#form-create").on("click", ".btn-save", function(e) {
                e.preventDefault();
                $(".print-error-msg").css('display', 'none');

                var form = $("#form-create");
                var action = form.attr("action");
                var data = new FormData(form[0]);
                data.append("_method", form.attr("method"));

                $.ajax({
                        url: action,
                        method: "POST",
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false
                    })
                    .done(function(data) {
                        if (data.success) {
                            form.trigger("reset");
                            One.helpers('notify', {
                                type: 'success',
                                icon: 'fa fa-check mr-1',
                                message: data.message
                            })
                            $("#modal-create").modal('hide');
                        } else {
                            One.helpers('notify', {
                                type: 'danger',
                                icon: 'fa fa-check mr-1',
                                message: 'Something went wrong!'
                            })
                        }
                    })
                    .fail(function(xhr) {
                        // button.html("Save").attr("disabled", false);
                        if (xhr.status == 422) {
                            printErrorMsg(xhr.responseJSON.errors);
                        } else {
                            One.helpers('notify', {
                                type: 'danger',
                                icon: 'fa fa-check mr-1',
                                message: 'Something went wrong!'
                            })
                        }
                    });
            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });

        $(document).ready(function() {
            // CSRF Token
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //brand load ajax
            $("#getBrand").select2({
                ajax: {
                    url: "{{ route('get.brands') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 150,
                    data: function(params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var subcat = $('select[name="subcategory_id"]');
            var innercat = $('select[name="inner_category_id"]');
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            innercat.html('');
                            subcat.empty();
                            subcat.append('<option selected value="">Select</option>');
                            $.each(data, function(key, value) {
                                subcat.append('<option value="' + value.id + '">' +
                                    value.name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            subcat.on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/admin/inner-category/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            innercat.empty();
                            innercat.append('<option selected value="">Select</option>');
                            $.each(data, function(key, value) {
                                innercat.append('<option value="' + value.id + '">' +
                                    value.name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
        $(function() {
            $(document).ready(function() {
                $('.js-select').select2();
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImg').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })

            });
        });

        $(document).ready(function() {
            $('.dropify').dropify();
        });

        $("#file-demo").fileinput({
            theme: 'fas',
            uploadUrl: false,
            uploadIcon: false
        })


        window.alt_tmp_img_up = '{{ url('admin/product-images') }}';
        window.alt_tmp_img_remove = '{{ url('admin/product-images-remove') }}';
        window.delete_alt_img_by_id = '{{ url('admin/product-images-delete') }}';
    </script>

@endpush
