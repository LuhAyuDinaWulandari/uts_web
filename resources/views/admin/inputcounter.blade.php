@extends('layout.admin')
@section('content')
<div class="panel">
<form action="{{(isset($counter))?route('counter.update',$counter->id_supplyer):route('counter.store')}}" method="POST">
    @csrf
    @if(isset($counter))?@method('PUT')@endif
     <div class="panel-body">
          <div class="form-group">
          <label class="col-sm-2 control-label text-right">Nama Supplyer</label>
                <div class="col-sm-10"><input type="text" value="{{(isset($counter))?$counter->nama_supplyer:old('nama_supplyer')}}" name="nama_supplyer" class="form-control"></div>
                @error('nama_supplyer')<small style="color:red">{{$message}}</small>@enderror
          </div>
               <div class="form-group"><label class="col-sm-2 control-label text-right">Alamat</label>
                   <div class="col-sm-10"><input type="text"  value="{{(isset($counter))?$counter->alamat:old('alamat')}}" name="alamat" class="form-control"></div>
                </div>
                @error('alamat')<small style="color :red">{{$message}}</small>@enderror
                <div class="form-group"><label class="col-sm-2 control-label text-right">No_Hp</label>
                     <div class="col-sm-10"><input type="text"  value="{{(isset($counter))?$counter->no_hp:old('no_hp')}}" name="no_hp" class="form-control"></div>
                 </div>
                 @error('no_hp')<small style="color :red">{{$message}}</small>@enderror
                <div class="form-group">
                    <button type="submit">Simpan</button>
                </div>

    </div>
    </form>
</div>
 @endsection