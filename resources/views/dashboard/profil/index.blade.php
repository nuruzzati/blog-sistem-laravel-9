@extends('dashboard.layouts.main')


@section('container')
 @if (session()->has('success'))
              <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  {{ session('success') }}
                </div>
              </div>
            @endif
    <form class="my-1" method="post" action="/dashboard/profil/{{ $user->id }}"  enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col justify-content-center m-auto text-center mb-5">
            @if ($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" class="img-preview img-fluid img-thumbnail rounded-circle" height="200" style="max-height: 200px; overflow: hidden;" width="200">
            @else
                <img src="https://www.triwiga.co.id/foto/noimage.png" class="img-preview img-fluid img-thumbnail rounded-circle" height="200" style="max-height: 200px; overflow: hidden;" width="200">
            @endif
            <div class="mb-3 col-4">
            </div>


            <input readonly disabled class="form-control btn btn-light image" name="image" style="width: 7%;display: none" type="file" id="formFile" accept="image/*" aria-label="Pilih Foto" onchange="previewImage()">

            
            <div class="alert alert-light col-md-4 m-auto mt-3 shadow " role="alert">
                <h4 class="alert-heading">Halo {{ $user->username }}!</h4>
                <p>Change your profile photo right now!</p>
                <hr>
                <p class="mb-0">Maximum photo is 1 megabyte.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input readonly disabled name="name" type="text" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
   
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input readonly disabled name="username" value="{{ $user->username }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
            </div>
            <div class="col-md-5">
            <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input readonly disabled name="email" value="{{ $user->email }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input readonly disabled name="password" value="**********" type="password" disabled readonly class="form-control mb-1" id="exampleInputPassword1" >
                    <a href="#"><p style="font-size: 13px">change password?</p></a>

                </div>
            </div>
        </div>
        <a href="/dashboard/profil/edit" type="submit" class="btn btn-primary  align-items-center d-flex m-auto mt-3 mb-5" style="width: fit-content"><span data-feather="edit-3"></span> edit Profil</a>
    </div>
</form>

<script>
     function previewImage() {
            const image = document.querySelector('.image');
            const imgPreview = document.querySelector('.img-preview');

            if (image.files && image.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                }

                reader.readAsDataURL(image.files[0]);
            }
        }

</script>
@endsection