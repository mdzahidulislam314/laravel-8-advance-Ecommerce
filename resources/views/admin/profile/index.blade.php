@extends('admin.layouts.app')

@section('main')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            @include('admin.inc.flash-message')
            <!-- User Profile -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">User Profile</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('admin.update')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row push">
                            <div class="col-lg-8 col-xl-5">
                                <div class="form-group">
                                    <label for="one-profile-edit-username">Name</label>
                                    <input type="text" class="form-control" id="one-profile-edit-username" name="name" value="{{$admin->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="one-profile-edit-email">Email</label>
                                    <input type="email" class="form-control" id="one-profile-edit-email" name="email"  value="{{$admin->email}}">
                                </div>
                                <div class="form-group">
                                    <label>Your Avatar</label>
                                    <div class="push">
                                        <img id="showImg" class="img-avatar" src="{{ (!empty($admin->profile_photo_path)) ? url('uploads/admin/' .$admin->profile_photo_path) : url('uploads/no-img.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="profile_photo_path" id="image">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END User Profile -->

            <!-- Change Password -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Change Password</h3>
                </div>
                <div class="block-content">
                    <form action="{{route('admin.updatePass')}}" method="POST" >
                        @csrf
                        <div class="row push">
                            <div class="col-lg-8 col-xl-5">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="oldpassword">
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label >Confirm New Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Change Password -->
        </div>
        <!-- END Page Content -->
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })

        });
    </script>
@endpush
