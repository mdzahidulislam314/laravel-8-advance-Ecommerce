@extends('admin.layouts.app')

@section('main')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Brands <small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Tables</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">All Brands</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">
            @include('admin.inc.flash-message')
            <div class="block block-rounded">
                <div class="block-header">
                    <button type="button" class="btn btn-outline-success mr-1 mb-3" id="btn-create">
                        <i class="fa fa-fw fa-plus mr-1"></i> Add New
                    </button>
                </div>
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter w-100" id="dtable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name EN</th>
                                    <th>Name BN</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
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
                                                <img id="showImg" class="img-avatar" src=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image" id="image" />
                                        </div>
                                        <div class="form-group">
                                            <label>Active</label>
                                            <div class="custom-control custom-switch mb-1">
                                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" />
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

    </main>
@endsection

@push('script')
    <script>
        $(function() {
            var dtable = $('#dtable').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                ajax: "{{ $dataUrl }}",
                // pageLength: 50,
                buttons: [
                    'copy'
                ],

                columns: [
                    { data: 'image', name: 'image',
                        render: function( data, type, full, meta ) {
                            return "<img src=\"/uploads/admin/brands/" + data + "\" height=\"50\"/>";
                        }
                    },
                    {
                        data: 'name_en',
                        name: 'name_en'
                    },
                    {
                        data: 'name_bn',
                        name: 'name_bn'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active',
                        render: function(data, type, row) {
                            return (data === 1) ?
                                '<span class="badge badge-primary">Active</span>' :
                                '<span class="badge badge-danger">Inactive</span>';
                        }
                    },
                    {
                        data: null,
                        "searchable": false,
                        defaultContent: "<button class='btn btn-sm btn-info dt-btn-edit mr-2'><i class=\"fa " +
                            "fa-edit\"></i></button>" +
                            "<button class='btn btn-sm btn-danger dt-btn-delete mr-2'><i class=\"fa " +
                            "fa-trash\"></i></button>"
                    },
                ]

            });

            // open create modal
            $("#btn-create").on("click", function(e) {
                e.preventDefault();
                $(".print-error-msg").css('display', 'none');
                $("#head_text").html('Add Brand');

                var form = $("#form-create");
                form.attr("action", route('brands.store'));
                form.attr("method", "POST");

                $("input[name=name_en]").val("");
                $("input[name=name_bn]").val("");
                $("input[name=is_active]").prop('checked', false);
                $("#showImg").attr('src','{{url('uploads/no-img.jpg')}}');
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
                            dtable.ajax.reload();
                            form.trigger("reset");
                            // toastr.success(data.message, '');
                            One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data.message})
                            $("#modal-create").modal('hide');
                        } else {
                            One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Something went wrong!'})
                        }
                    })
                    .fail(function(xhr) {
                        // button.html("Save").attr("disabled", false);
                        if (xhr.status == 422) {
                            printErrorMsg(xhr.responseJSON.errors);
                        } else {
                            One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Something went wrong!'})
                        }
                    });
            });

            //open Edit modal
            dtable.on('click', '.dt-btn-edit', function(e) {
                e.preventDefault();
                $("#head_text").html('Edit Brand');
                var data = dtable.row($(this).closest('tr')).data();

                $("input[name=name_en]").val(data.name_en);
                $("input[name=name_bn]").val(data.name_bn);
                if (data.is_active) {
                    $("input[name=is_active]").attr("checked", true);
                } else {
                    $("input[name=is_active]").attr("checked", false);
                }

                $("#showImg").attr("src",'/uploads/admin/brands/' + data.image);

                var form = $("#form-create");
                form.attr("action", route('brands.update', data.id));
                form.attr("method", "PUT");

                $("#modal-create").modal();
            });

            //delete
            dtable.on('click', '.dt-btn-delete', function(e) {
                e.preventDefault();
                var data = dtable.row($(this).closest('tr')).data();
                if (confirm("Delete this item?")) {
                    $.ajax({
                        url: route('brands.destroy', data.id),
                        method: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        }
                    })

                    .done(function(data) {
                        if (data.success) {
                            dtable.ajax.reload();
                            One.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: data.message})
                        } else {
                            One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Something went wrong!'})
                        }
                    })
                    .fail(function(xhr) {
                        if (xhr.status == 422) {
                            alert("Validation error");
                        } else {
                            One.helpers('notify', {type: 'danger', icon: 'fa fa-check mr-1', message: 'Something went wrong!'})
                        }
                    });
                }
            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }

            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImg').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })

            });
        });
    </script>
@endpush
