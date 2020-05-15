<?php

namespace App\Http\Controllers;

use App\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CounterController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Counter';
        $counter=Counter::paginate(4);
       // dd($counter);
        return view('admin.counter',compact('title','counter'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input supplyer';
        return view('admin.inputcounter',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'required' =>'Kolom:atribute harus lengkap',
            'date'     =>'Kolom:atribute harus Tanggal',
            'numeric'  =>'Kolom:atribute harus Angka',
        ];
        $validasi=$request->validate([
            'nama_supplyer' =>'required',
            'alamat'        =>'required',
            'no_hp'         =>'required',
        ],$messages);
        Counter::create($validasi);
        return redirect('counter')->with('succses','Data berhasil diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='Input supplyer';
        $counter=Counter::find($id);
        return view('admin.inputcounter',compact('title','counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages=[
            'required' =>'Kolom:atribute harus lengkap',
            'date'     =>'Kolom:atribute harus Tanggal',
            'numeric'  =>'Kolom:atribute harus Angka',
        ];
        $validasi=$request->validate([
            'nama_supplyer' =>'required',
            'alamat'        =>'required',
            'no_hp'         =>'required',
        ],$messages);
        Counter::whereid_supplyer($id)->update($validasi);
        return redirect('counter')->with('succses','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Counter::whereid_supplyer($id)->delete();
        return redirect('counter')->with('succses','Data berhasil diupdate'); 
    }
}
