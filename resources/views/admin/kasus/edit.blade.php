@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Edit Data Kasus
                </div>
                <div class="card-body">
                    <form action="{{route('kasus.update',$kasus->id)}}" method="post">
                        @method('put')
                        @csrf
                    <div class="row">
                        <div class="col">
                        @livewire('dropdowns',['selectedRw'=>$kasus->id_rw,'selectedDesa'=>$kasus->rw->id_desa,
                                               'selectedKecamatan'=>$kasus->rw->desa->id_kecamatan,
                                               'selectedKota'=>$kasus->rw->desa->kecamatan->id_kota,
                                               'selectedProvinsi'=>$kasus->rw->desa->kecamatan->kota->id_provinsi])
                        </div>
                        </div>                    
                        <div class="form-group">
                            <label for="">Reaktif</label>
                            <input type="text" name="reaktif" value="{{$kasus->reaktif}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Positif</label>
                            <input type="text" name="positif" value="{{$kasus->positif}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Meninggal</label>
                            <input type="text" name="meninggal" value="{{$kasus->meninggal}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Sembuh</label>
                            <input type="text" name="sembuh" value="{{$kasus->sembuh}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" value="{{$kasus->tanggal}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            <a href="{{route('kasus.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection