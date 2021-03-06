@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Tambah Data Rw
                </div>
                <div class="card-body">
                    <form action="{{route('rw.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Pilih Desa</label>
                            <select name="id_desa" class="form-control">
                                @foreach($desa as $data)
                                <option value="{{$data->id}}">{{$data->nama_desa}}</option>
                                @endforeach
                            </select>
                            </div>
                        <div class="form-group">
                            <label for="">Rw</label>
                            <input type="text" name="nama_rw" class="form-control" class="@error('nama_rw') is-invalid @enderror" required>
                            @error('nama_rw')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            <a href="{{route('rw.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection