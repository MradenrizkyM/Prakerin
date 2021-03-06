@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Edit Data Desa
                </div>
                <div class="card-body">
                    <form action="{{route('desa.update', $desa->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Pilih Kecamatan</label>
                            <select name="id_kecamatan" class="form-control">
                            @foreach($kecamatan as $data)
                            <option value="{{$data->id}}" {{$data->id == $desa->id_kecamatan ? 'selected' : ''}}>
                                {{$data->nama_kecamatan}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Desa</label>
                            <input type="text" name="nama_desa" value="{{$desa->nama_desa}}" class="form-control" class="@error('nama_desa') is-invalid @enderror" required>
                            @error('nama_desa')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            <a href="{{route('desa.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection