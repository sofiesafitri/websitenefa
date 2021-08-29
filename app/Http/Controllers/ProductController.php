<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $product = DB::table('tb_product')->get();;
            return view ('backend/product',['product'=> $product]);
    
    }

    public function create()
    {
        $product = DB::table('product')->get();
        return view('backend/product_create',['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        DB::table('in_barang')->insert([
            'no_sbm' =>$request->no_sbm,
            'id_barang' =>$request->id_barang,
            'quantity' =>$request->quantity,
            'id_pegawai' =>$request->id_pegawai,
            'keterangan' =>$request->keterangan,
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/barang_in/create')->with('alert-success','Data Added!');

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
        $data = DB::table('tb_product')->where('product_id',$id)->get();

        return view ('backend/product_edit');
    }

    public function update(Request $request, $id)
    {
        DB::table('in_barang')->where('id_in',$id)->update([
            'id_barang' =>$request->id_barang,
            'quantity' =>$request->quantity,
            'id_pegawai' =>$request->id_pegawai,
            'keterangan' =>$request->keterangan,
            'updated_at'=> date('Y-m-d H:i:s')
            ]);
        return redirect('/barang_in')->with('alert-success','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_product')->where('product_id',$id)->delete();
        return redirect('backend/product')->with('alert-success', 'Data Deleted!');
    }
}
