@if (session('message'))
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p class="mb-0">{{ session('message') }}<a class="alert-link" href="javascript:void(0)"></a></p>
    </div>
@endif
@if($errors->any())
    <div class="form-group">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p class="mb-0">{{$error}} <a class="alert-link" href="javascript:void(0)"></a>!</p>
            </div>
        @endforeach
    </div>
@endif
