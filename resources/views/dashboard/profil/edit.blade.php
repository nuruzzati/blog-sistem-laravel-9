@extends('dashboard.layouts.main')


@section('container')
  
 <a href="/dashboard/profil" class="btn bt-sm btn-primary"><span data-feather="arrow-left"></span> Back</a>
    <form class="my-1" method="post" action="/dashboard/profil/update" enctype="multipart/form-data">
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
           <label for="formFile" class="form-label btn btn-secondary" style="cursor: pointer;">Choose Image</label>

           
        @if($errors->has('image'))
            <div class="text-danger">
                {{ $errors->first('image')}}
            </div>
        @endif
            <input class="form-control btn btn-light image" name="image" style="width: 7%;display: none" type="file" id="formFile" accept="image/*" aria-label="Pilih Foto" onchange="previewImage()">

            
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
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input name="name" type="text" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
        @if($errors->has('name'))
            <div class="text-danger">
                {{ $errors->first('name')}}
            </div>
        @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input name="username" value="{{ old('username', $user->username) }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
        @if($errors->has('username'))
            <div class="text-danger">
                {{ $errors->first('username')}}
            </div>
        @endif
                </div>
            </div>
            <div class="col-md-5">
            <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input name="email" value="{{ old('email', $user->email) }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
        @if($errors->has('email'))
            <div class="text-danger">
                {{ $errors->first('email')}}
            </div>
        @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" value="**********" type="password" disabled readonly class="form-control mb-1" id="exampleInputPassword1" >
                    <a href="#"><p style="font-size: 13px">change password?</p></a>
                    
        @if($errors->has('password'))
            <div class="text-danger">
                {{ $errors->first('password')}}
            </div>
        @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary  align-items-center d-flex m-auto mt-3 mb-5" style="width: fit-content"><span data-feather="edit-3"></span> Update Profil</button>
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

        // Simpan posisi scroll saat halaman dimuat
        window.onload = function() {
            sessionStorage.setItem('scrollPos', window.scrollY);
        }

        // Periksa apakah ada posisi scroll yang disimpan dan atur kembali posisi scroll
        window.onload = function() {
            var scrollPos = sessionStorage.getItem('scrollPos');
            if (scrollPos) {
                window.scrollTo(0, scrollPos);
                sessionStorage.removeItem('scrollPos');
            }
        }

</script>
@endsection
