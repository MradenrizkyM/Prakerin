@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Edit Data Kota
                </div>
                <div class="card-body">
                    <form action="{{route('kota.update', $kota->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Pilih Provinsi</label>
                            <select name="id_provinsi" class="form-control">
                            @foreach($provinsi as $data)
                            <option value="{{$data->id}}" {{$data->id == $kota->id_provinsi ? 'selected' : ''}}>
                                {{$data->nama_provinsi}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" value="{{$kota->kode_kota}}" class="form-control" class="@error('kode_kota') is-invalid @enderror" required>
                            @error('kode_kota')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" class="form-control" class="@error('nama_kota') is-invalid @enderror" required>
                            @error('nama_kota')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            <a href="{{route('kota.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection