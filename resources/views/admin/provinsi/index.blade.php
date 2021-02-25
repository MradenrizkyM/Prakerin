@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-header">
                    <b>Data Provinsi</b>
                    <a href="{{route('provinsi.create')}}" class="btn btn-primary float-right">
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
                                <th>Kode Provinsi</th>
                                <th>Provinsi</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($provinsi as $data)
                                    <form action="{{route('provinsi.destroy',$data->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->kode_provinsi}}</td>
                                <td>{{$data->nama_provinsi}}</td>
                                <td>
                                        <a href="{{route('provinsi.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('provinsi.show', $data->id)}}" class="btn btn-warning">Show</a>
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