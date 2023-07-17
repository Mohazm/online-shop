<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Produk;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
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
            ->paginate(5);
        return view('produk.index', compact('ar_produk', 'keyword'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path('img');

        if ($request->hasFile('image')) {
            $file->move($destinationPath, $fileName);
        }

        Db::table('produk')->insert(
            [
                'nama' => $request->nama,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'idkategori' => $request->idkategori,
                'foto' => '/img/' . $fileName
            ]
        );
        //landing page
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail
        $ar_produk = DB::table('produk')->where('produk.id', '=', $id)
        ->join('kategori', 'kategori.id', '=', 'produk.idkategori')
        ->select('produk.*', 'kategori.nama as kategori')
        ->get();
    return view('produk.show', compact('ar_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit produk
        $data = DB::table('produk')
            ->where('id', '=', $id)->get();
        return view('produk.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);
    
        $product = DB::table('produk')->where('id', $id)->first();
    
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path('img');
            $file->move($destinationPath, $fileName);
    
            // Delete the previous photo if it exists
            if ($product->foto) {
                $previousPhotoPath = public_path('img/' . $product->foto);
                if (File::exists($previousPhotoPath)) {
                    File::delete($previousPhotoPath);
                }
            }
        } else {
            $fileName = $product->foto;
        }
    
        DB::table('produk')->where('id', $id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'idkategori' => $request->idkategori,
            'foto' => '/img/' . $fileName
        ]);
    
        return redirect('/Produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // Menghapus file gambar dari folder
       $produk = DB::table('produk')->select('foto')->where('id', $id)->first();
       if ($produk) {
           $fotoPath = public_path($produk->foto);
           if (File::exists($fotoPath)) {
               File::delete($fotoPath);
           }
       }

       // Menghapus data dari tabel
       DB::table('produk')->where('id', $id)->delete();

       return redirect('/produk');
    }

    // Menambah Keranjang
    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Produk::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "nama" => $product->nama,
                "harga" => $product->harga,
                "foto" => $product->foto,
                "quantity" => 1
            ];
        }
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
 
    public function updated(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function reduceStock($productId, $quantity)
{
    // Mengurangi stok produk berdasarkan ID produk
    $product = Produk::findOrFail($productId);
    
    // Memastikan stok tersedia sebelum pengurangan
    if ($product->stok >= $quantity) {
        $product->stok -= $quantity;
        $product->save();
        
        return true; // Mengembalikan nilai true jika pengurangan stok berhasil
    }
    
    return false; // Mengembalikan nilai false jika stok tidak mencukupi
}
    
}


