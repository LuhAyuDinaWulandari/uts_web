<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PplController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('ppl')) return $next($request);
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
        $title='PPL';
        return view('ppl.home',compact('title'));
    }
}

  