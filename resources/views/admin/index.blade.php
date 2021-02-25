@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Anda sedang berada di halaman Admin <br>
                    <hr>
                    Masuk Halaman Provinsi <br><br>
                    <a href="{{route('provinsi.index')}}" class="btn btn-primary float-left">Klik Disini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection