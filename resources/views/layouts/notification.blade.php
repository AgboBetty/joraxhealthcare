<!-- alerts -->
<div class="alert-holder" id="alert-holder">
    @if(session('info'))
        <div class="alert alert-info alert-with-icon" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-bulb-63"></span>
            <span class="text-white"><b> Heads up! - </b> {{ session('info') }} </span>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-with-icon" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-bell-55"></span>
            <span class="text-white"><b> Well done! - </b> {{ session('success') }} </span>
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning alert-with-icon" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-alert-circle-exc"></span>
            <span class="text-white"><b> Warning! - </b> {{ session('warning') }} </span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-with-icon" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-support-17"></span>
            <span class="text-white"><b> Oh snap! - </b> {{ session('error') }} </span>
        </div>
    @endif

    @if(count($errors) > 0)
        @foreach(array_slice($errors->all(), 0, 3) as $error)
            <div class="alert alert-primary alert-with-icon" role="alert">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
                </button>
                <span data-notify="icon" class="tim-icons icon-pin"></span>
                <span class="text-white"><b> Issue! - </b> {{ $error }} </span>
            </div>
        @endforeach
    @endif

    @if (session('status'))
        <div class="alert alert-info alert-with-icon" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-bulb-63"></span>
            <span class="text-white"><b> Heads up! - </b> {{ session('status') }} </span>
        </div>
    @endif

    @if (session('resent'))
        <div class="alert alert-info alert-with-icon" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-bulb-63"></span>
            <span class="text-white"><b> Heads up! - </b> {{ __('A fresh verification link has been sent to your email address.') }} </span>
        </div>
    @endif
</div>
<!-- end alerts -->


