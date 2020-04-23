@extends('layout.admin')
@section('content')
<div class="panel">
     <div class="panel-body">
         <div class="col lg 12">
         <h1> Daftar Supplyer</h1>
        <table class="table bordered">
            <tr>
                <td width="400"><br> BIODATA</br></td>
                <td><br> STUDI KASUS</br></td>

            </tr>
            <tr>
                <td><br> NAMA  : Luh Ayu Dina Wulandari</br></td>
                <td><br> JUDUL : Manajemen counter</br></td>

            </tr>
            <tr>
                <td><br> NIM  : 1815051111</br></td>
                <td><br> PENJELASAN :Sistem counter pulsa merupakan suatu toko untuk melayani jual beli pulsa elektronik </br></td>

            </tr>
            <tr>
                <td><br> PROGRAM STUDI :TEKNIK INFORMATIKA</br></td>
                <td><br> </br></td>

            </tr>
        </table>

    </div>
    </div>
    <div class="col lg 12">
    <a href="{{route('counter.create')}}">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr><th>No</th><th>Nama_Supplyer</th><th>Alamat</th><th>No_Hp</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @foreach ( $counter as $in=>$val )
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
    </div>
 </div>
</div>