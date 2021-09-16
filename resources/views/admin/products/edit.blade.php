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
                            <li class="breadcrumb-item text-dark"><a href="{{ route('products.index') }}">All Products</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Edit Product</a>
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
                    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h2 class="content-heading border-bottom mb-4 pb-2">Regular</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                    <select class="js-select form-control" name="category_id" style="width: 100%;">
                                        <option selected value="">Select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name_en">Product Name En <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_en" name="name_en"
                                        value="{{ $product->name_en }}">
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="selling_price">Selling Price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="selling_price" name="selling_price"
                                        value="{{ $product->selling_price }}">
                                    @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="val-confirm-password">Colors En <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="color_en" class="form-control" data-role="tagsinput"
                                        value="{{ $product->color_en }}">
                                </div>
                                <div class="form-group">
                                    <label for="val-confirm-password">Sizes En <span class="text-danger">*</span></label>
                                    <input type="text" name="size_en" class="form-control" data-role="tagsinput"
                                        value="{{ $product->size_en }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="subcategory_id">Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control js-select" name="subcategory_id" style="width: 100%;">
                                        <option value="" selected="" disabled="">Select</option>
                                        @foreach ($subcategory as $sub)
                                            <option value="{{ $sub->id }}"
                                                {{ $sub->id == $product->subcategory_id ? 'selected' : '' }}>
                                                {{ $sub->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name_bn">Product Name Bn <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_bn" name="name_bn"
                                        value="{{ $product->name_bn }}">
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">Discount price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="discount_price" name="discount_price"
                                        value="{{ $product->discount_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="val-confirm-password">Tags En <span class="text-danger">*</span></label>
                                    <input type="text" name="tag_en" class="form-control" data-role="tagsinput"
                                        value="{{ $product->tag_en }}">
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Visibility</label>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="hot_deal" name="hot_deal"
                                            {{ $product->hot_deal == 1 ? 'checked': '' }}>
                                        <label class="custom-control-label" for="hot_deal">Hot Deal</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="featured" name="featured"
                                            {{ $product->featured == 1 ? 'checked': '' }}>
                                        <label class="custom-control-label" for="featured">Featured</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="spacial_offer"
                                            name="spacial_offer" {{ $product->spacial_offer == 1 ? 'checked': '' }}>
                                        <label class="custom-control-label" for="spacial_offer">Spacial Offer</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="spacial_deals"
                                            name="spacial_deals" {{ $product->spacial_deals == 1 ? 'checked': '' }}>
                                        <label class="custom-control-label" for="spacial_deals">Spacial Deals</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-control-inline mb-2">
                                        <input type="checkbox" class="custom-control-input" id="is-active" name="is_active"
                                            {{ $product->is_active == 1 ? 'checked': '' }}>
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="val-email">Inner Category <span class="text-danger">*</span></label>
                                    <select class="js-select form-control" name="inner_category_id" style="width: 100%;">
                                        <option value="" selected="" disabled="">Select</option>
                                        @if($product->inner_category_id)
                                            @foreach ($innercategories as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $row->id == $product->inner_category_id ? 'selected' : '' }}>
                                                    {{ $row->name_en }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="code">Product Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="code" name="code"
                                           value="{{ $product->code }}">
                                </div>
                                <div class="form-group">
                                    <label for="qty">Qty <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="qty" name="qty"
                                        value="{{ $product->qty }}">
                                    @error('qty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="val-confirm-password">Tags Bn <span class="text-danger">*</span></label>
                                    <input type="text" name="tag_bn" class="form-control" data-role="tagsinput" value="{{ $product->tag_bn }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Brands</label>
                                    <select class="form-control select2" name="brand_id" id="getBrand">
                                        <option value='' selected disabled>Select</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                {{ $brand->name_en }}</option>
                                        @endforeach
                                    </select>
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
                                <div class="d-flex align-items-center">
                                    <span class="pip">
                                        <img class="imageThumb" src="{{url('uploads/admin/products/'. $product->thumb_image)}}">
                                    </span>
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
                                    <div class="d-flex align-items-center">
                                        @foreach($multiImgs as $item)
                                            <span class="pip">
                                                <img class="imageThumb" src="{{url('uploads/admin/products/alt-img/'. $item->image)}}">
                                                <br>
                                                <span class="remove" onclick="deleteAltImgById(event, {{$item->id}})">Remove</span>
                                            </span>
                                        @endforeach
                                    </div>
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
                                        class="ckeditor">{{ $product->short_desc_en }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="val-email">Short Desc Bn</label>
                                <div class="form-group">
                                    <textarea name="short_desc_bn"
                                        class="ckeditor">{{ $product->short_desc_bn }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="val-email">Long Desc En</label>
                                <div class="form-group">
                                    <textarea name="long_desc_en"
                                        class="ckeditor">{{ $product->long_desc_en }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="val-email">Long Desc Bn</label>
                                <div class="form-group">
                                    <textarea id="js-ckeditor2" name="long_desc_bn"
                                        class="ckeditor">{{ $product->long_desc_bn }}</textarea>
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
@endsection

@push('script')
    <script src="{{ asset('admin/assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    {{-- image preview plugin --}}
    <script src="/admin/assets/vendor/bootstrap-file-input/fileinput.js"></script>
    <script src="/admin/assets/vendor/bootstrap-file-input/theme.js"></script>
    <script src="/admin/assets/vendor/dropify/js/dropify.js"></script>
    <!-- add brand ajax-->

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
