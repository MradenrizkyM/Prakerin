@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-header">
                    <b>Data Kasus</b>
                    <a href="{{route('kasus.create')}}" class="btn btn-primary float-right">
                       Tambah Data</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                        </div>
                @endif        
                <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Lokasi</th>
                                <th>Jumlah Reaktif</th>
                                <th>Jumlah Positif</th>
                                <th>Jumlah Meninggal</th>
                                <th>Jumlah Sembuh</th>
                                <th>Tanggal</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($kasus as $data)
                            <tr>
                                <td>{{$no++}}</td>
                            <td>
                            RW <b>{{$data->rw->nama_rw}}</b>, {{$data->rw->desa->nama_desa}}<br>
                            {{$data->rw->desa->kecamatan->nama_kecamatan}}<br>
                            {{$data->rw->desa->kecamatan->kota->nama_kota}}<br>
                            {{$data->rw->desa->kecamatan->kota->provinsi->nama_provinsi}}
                            </td>
                                <td>{{$data->reaktif}}</td>
                                <td>{{$data->positif}}</td>
                                <td>{{$data->meninggal}}</td>
                                <td>{{$data->sembuh}}</td>
                                <td>{{$data->tanggal}}</td>
                                <td>
                                <form action="{{route('kasus.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('kasus.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('kasus.show', $data->id)}}" class="btn btn-warning">Show</a>
                                        <button type="submit" onclick="return confirm('Apakah anda yakin?');"class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection