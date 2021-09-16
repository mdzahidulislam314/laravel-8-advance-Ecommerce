@extends('admin.layouts.app')

@section('main')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Products <small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Tables</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">All Products</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">
            @include('admin.inc.flash-message')
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter w-100 js-dataTable-full">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name EN</th>
                                    <th>Name BN</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <img class="img-avatar img-avatar48"
                                                src="{{ isset($item->thumb_image) ? url('uploads/admin/products/' . $item->thumb_image) : url('uploads/no-img.jpg') }}"
                                                alt="">
                                        </td>
                                        <td>
                                            {{ $item->name_en }}
                                        </td>
                                        <td>
                                            {{ $item->name_bn }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('products.edit', $item->id) }}"
                                                    class="btn btn-sm btn-alt-primary js-tooltip-enabled"
                                                    data-toggle="tooltip" title="Edit" data-original-title="Edit">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-alt-primary js-tooltip-enabled"
                                                    data-toggle="tooltip" title="Delete" data-original-title="Delete">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection

@push('script')

@endpush
