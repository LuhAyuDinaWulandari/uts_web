@extends('layout.admin')
@section('content')
<div class="panel">
    <div class="panel panel-flat border-top-primary"></div>
     <div class="panel-body">  
         <div class="col-lg-12">
             <div class="class col-lg-6"></div>
         <h1> Daftar Supplyer</h1>
        <table class="table bordered">
            <tr>
                <td width="400"><br> BIODATA</br></td>
                <td><br> STUDI KASUS</br></td>

            </tr>
            <tr>
                <td><br> NAMA  : LUH AYU DINA WULANDARI</br></td>
                <td><br> JUDUL : Sistem Manajemen Counter Pulsa Modern</br></td>

            </tr>
            <tr>
                <td><br> NIM  : 1815051111</br></td>
                <td><br> PENJELASAN :Sistem manajemen counter pulsa ini bertujuan untuk memudahkan admin untuk memanajemen administrasi toko dengan meminimalisir penginputan data keluar masuk pulsa sehingga pekerjaan dari admin menjadi lebih </br></td>

            </tr>
            <tr>
                <td><br> PROGRAM STUDI :TEKNIK INFORMATIKA</br></td>
                <td><br> </br></td>

            </tr>
        </table>
    </div>
    </div>
    <div class="col-lg-12">
    <a href="{{route('counter.create')}}">Tambah Data</a>
        <table class="table table-bordered">
            <thead class="thead-danger">
            <tr><th>No</th><th>Nama_Supplyer</th><th>Alamat</th><th>No_Hp</th><th>Aksi</th></tr>
            </thead>
            <tbody>
               @foreach ($counter as $in=>$val)
               <tr><td>{{($in+1)}}</td><td>{{$val->nama_supplyer}}</td><td>{{$val->alamat}}</td><td>{{$val->no_hp}}</td>
                    <td>
                    <a href = "{{route('counter.edit',$val->id_supplyer)}}">Update</a>
                <form action="{{route('counter.destroy',$val->id_supplyer)}}"method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                </form>
            </td></tr>
               @endforeach
            </tbody>
        </table>
        {{$counter->links()}}
    </div>

 @endsection