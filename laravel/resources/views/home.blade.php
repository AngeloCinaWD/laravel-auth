@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">USER ICON UPDATER</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="" action="{{route('update-icon')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <input type="file" class="form-control bprder-0" name="icon" value="">
                      <br>
                      <br>
                      <input type="submit" class="btn btn-primary" value="UPDATE">

                    </form>
                </div>
            </div>

            @if (Auth::user() -> icon)
              <br>

              <div class="card">
                  <div class="card-header">ICON USER</div>

                  <div class="card-body">
                      <h4>username: {{Auth::user() -> name}}</h4>
                      <br>
                      <img src="{{asset('storage/icon/' . Auth::user() -> icon)}}" width="150px" alt="">
                  </div>
              </div>
            @endif


        </div>
    </div>
</div>
@endsection
