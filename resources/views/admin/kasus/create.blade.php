@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Tambah Data Kasus
                </div>
                <div class="card-body">
                    <form action="{{route('kasus.store')}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col">
                        @livewire('dropdowns')
                        </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                            <label for="">Jumlah Reaktif</label>
                            <input type="text" name="reaktif" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Positif</label>
                            <input type="text" name="positif" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Meninggal</label>
                            <input type="text" name="meninggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Sembuh</label>
                            <input type="text" name="sembuh" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            <a href="{{route('kasus.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection