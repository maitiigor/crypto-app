<section class="">
    @if ($errors->any())
    <br />
    <div class="alert alert-danger alert-dismissible" style="margin:15px;">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       
        <h4><i class="icon fa fa-warning"></i> Errors!</h4>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" style="margin:15px;">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" style="margin:15px;">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block" style="margin:15px;">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block" style="margin:15px;">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <strong>{{ $message }}</strong>
    </div>
    @endif


</section>
