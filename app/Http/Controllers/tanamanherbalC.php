<?php

namespace App\Http\Controllers;

use App\Models\tanamanherbalM;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class tanamanherbalC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = empty($request->keyword)?'':$request->keyword;

        $tanamanherbal = tanamanherbalM::where("namatanamanherbal", "like", "%$keyword%")
        ->orWhere("namalain", "like", "%$keyword%")
        ->paginate(15);
        $tanamanherbal->appends($request->only(["limit", "keyword"]));

        return view("pages.tanamanherbal.show", [
            "tanamanherbal" => $tanamanherbal,
            "keyword" => $keyword,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();
            if ($request->hasFile('gambar')) {
                $gambar = $request->gambar;
                $originalName = $gambar->getClientOriginalName();
                $extension = $gambar->extension();
                $encryptedName = Str::random(40) . '.' . $extension;

                $ex = strtolower($extension);

                // dd(base_path(""));
                if($ex == "jpg" || $ex == "jpeg" || $ex == "png") {
                    $gambar->move(public_path("/gambar/tanamanherbal"), $encryptedName);
                }


                $data["gambar"] = $encryptedName;

            }else {
                return redirect()->back()->with('error', 'Gambar wajib diinputkan');
            }

            tanamanherbalM::create($data);
            return redirect()->back()->with('success', 'Success');

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tanamanherbalM  $tanamanherbalM
     * @return \Illuminate\Http\Response
     */
    public function show(tanamanherbalM $tanamanherbalM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tanamanherbalM  $tanamanherbalM
     * @return \Illuminate\Http\Response
     */
    public function edit(tanamanherbalM $tanamanherbalM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tanamanherbalM  $tanamanherbalM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tanamanherbalM $tanamanherbalM, $idtanamanherbal)
    {
        try{
            $data = $request->all();
            if ($request->hasFile('gambar')) {
                $gambar = $request->gambar;
                $originalName = $gambar->getClientOriginalName();
                $extension = $gambar->extension();
                $encryptedName = Str::random(40) . '.' . $extension;

                $ex = strtolower($extension);

                // dd(base_path(""));
                if($ex == "jpg" || $ex == "jpeg" || $ex == "png") {
                    $gambar->move(public_path("/gambar/tanamanherbal"), $encryptedName);
                }


                $data["gambar"] = $encryptedName;

            }else {
                $data['gambar'] = tanamanherbalM::where("idtanamanherbal", $idtanamanherbal)->first()->gambar;
            }

            tanamanherbalM::findOrFail($idtanamanherbal)->update($data);
            return redirect()->back()->with('success', 'Success');

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tanamanherbalM  $tanamanherbalM
     * @return \Illuminate\Http\Response
     */
    public function destroy(tanamanherbalM $tanamanherbalM, $idtanamanherbal)
    {
        try{
            tanamanherbalM::destroy($idtanamanherbal);
            return redirect()->back()->with('success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }
}
