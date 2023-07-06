<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        Paginator::useBootstrap();
        $ar_produk = DB::table('produk') //join tabel dengan Query Builder Laravel
            ->join('kategori', 'kategori.id', '=', 'produk.idkategori')
            ->select(
                'produk.*',
                'kategori.nama as kategori'
            )
            ->where('produk.nama', 'like', '%' . $keyword . '%')
            ->orWhere('harga', 'like', '%' . $keyword . '%')
            ->orWhere('stok', 'like', '%' . $keyword . '%')
            ->orWhere('kategori.nama', 'like', '%' . $keyword . '%')
            ->orWhere('foto', 'like', '%' . $keyword . '%')
            ->get();
        return view('home', compact('ar_produk', 'keyword'));
    }

    public function produk(Request $request)
    {
        $keyword = $request->get('keyword');
        Paginator::useBootstrap();
        $ar_produk = DB::table('produk') //join tabel dengan Query Builder Laravel
            ->join('kategori', 'kategori.id', '=', 'produk.idkategori')
            ->select(
                'produk.*',
                'kategori.nama as kategori'
            )
            ->where('produk.nama', 'like', '%' . $keyword . '%')
            ->orWhere('harga', 'like', '%' . $keyword . '%')
            ->orWhere('stok', 'like', '%' . $keyword . '%')
            ->orWhere('kategori.nama', 'like', '%' . $keyword . '%')
            ->orWhere('foto', 'like', '%' . $keyword . '%')
            ->get();
        return view('user.index', compact('ar_produk', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
