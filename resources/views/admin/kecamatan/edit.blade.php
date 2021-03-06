@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Edit Data Kecamatan
                </div>
                <div class="card-body">
                    <form action="{{route('kecamatan.update', $kecamatan->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Pilih Kota</label>
                            <select name="id_kota" class="form-control">
                            @foreach($kota as $data)
                            <option value="{{$data->id}}" {{$data->id == $kecamatan->id_kota ? 'selected' : ''}}>
                                {{$data->nama_kota}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" class="form-control" class="@error('nama_kecamatan') is-invalid @enderror" required>
                            @error('nama_kecamatan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            <a href="{{route('kecamatan.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection