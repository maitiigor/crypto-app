@extends('layouts.app')

@section('title')
@endsection

@section('content')
    <div>
        <div class="text-end py-2 px-2">
            <a href="{{route('users.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add User
            </a>
        </div>
        <div class="bg-light pt-5 px-3" style="width: 100%;">
        @include('pages.users.table')
        </div>
    </div>
    <div class="modal" tabindex="-1" id="mdl-user-disable">
        <input type="hidden" name="user_id" id="user_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row px-3">
                        <div class="col-md-2 text-end text-dark my-3">
                           <label for="is_disabled" class="form-label">Status</label> 
                        </div>
                        <div class="col-md-10 my-3">
                            <select name="is_disabled" id="is_disabled" class="form-select text-dark">
                                <option value="0">
                                    Enabled
                                </option>
                                <option value="1">
                                    Disabled
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">  
                    <button type="button" id="btn-save-account-status" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('app_js')
    <script type="text/javascript">
        $(document).ready(function() {

            /*  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
             var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                 return new bootstrap.Tooltip(tooltipTriggerEl)
             }) */
            /*   swal({
                      title: "Are you sure you want t?",
                      text: "Once deleted, you will not be able to recover this imaginary file!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                      if (willDelete) {
                          swal("Poof! Your imaginary file has been deleted!", {
                              icon: "success",
                          });
                      } else {
                          swal("Your imaginary file is safe!");
                      }
                  }); */

            setTimeout(() => {
                $(".btn-disable-user").on("click", function() {
                   
                    $('#mdl-user-disable').modal('show');

                    let id = $(this).attr('data-val');

                    $('#user_id').val(id);
                    let is_disabled = $(this).attr('is-disabled')
                    $('#is_disabled').val(is_disabled); 
                });
            }, 1000);

            $('#btn-save-account-status').click(function (e) {
                
                let id = $('#user_id').val();
                let status =   $('#is_disabled').val(); 
                window.location.assign("{{route('account.disable','')}}/"+id+"?status="+status)

            })




        })
    </script>
@endpush
