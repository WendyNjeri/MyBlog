@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Profile')
@section('content')

@livewire('author-profile-header')

    <hr>
    <div class="row">
        <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                <li class="nav-item">
                  <a href="#tabs-details" class="nav-link active" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <polyline points="5 12 3 12 12 3 21 12 19 12" />
                      <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                      <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg> Personal Details</a>
                </li>
                <li class="nav-item">
                  <a href="#tabs-password" class="nav-link" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <circle cx="12" cy="7" r="4" />
                      <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg> Change Password</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active show" id="tabs-details">
                <div>
                    @livewire('author-personal-details')
                </div>
                </div>
                <div class="tab-pane" id="tabs-password">
                  <div>
                    @livewire('author-change-password-form')
                  </div>
                </div>

              </div>
            </div>
          </div>

    </div>

@endsection

@push('scripts')
<script>
    $('#changeAuthorPictureFile').ijaboCropTool(
        {
            preview : '',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route('author.change-profile-picture') }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             //alert(message);
            Livewire.emit('updateAuthorProfileHeader');
            Livewire.emit('updateTopHeader');
            taostr.success(message);

          },
          onError:function(message, element, status){
            //alert(message);
            taostr.error(message);

          }
        }
    );
</script>

@endpush