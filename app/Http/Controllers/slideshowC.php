<?php

namespace App\Http\Controllers;

use App\Models\slideshowM;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class slideshowC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = empty($request->keyword)?'':$request->keyword;

        $slideshow = slideshowM::where("judul", "like", "%$keyword%")
        ->paginate(15);
        $slideshow->appends($request->only(["limit", "keyword"]));

        return view("pages.slideshow.show", [
            "slideshow" => $slideshow,
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
        return view("pages.slideshow.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try{
        if($request->judul && $request->deskripsi && $request->gambar) {
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }

            $data["judul"] = "";
            $data["deskripsi"] = "";
            $data = $request->all();
            $data["gambar"] = "";
            if($data["judul"] == null) {
                $data["judul"] = "";
            }
            if($data["deskripsi"] == null) {
                $data["deskripsi"] = "";
            }

            if(!empty($request->deskripsi)) {
                $deskripsi = $request->deskripsi;
                $konten = trim($deskripsi);
                $konten = stripslashes($deskripsi);
                $konten = htmlspecialchars($deskripsi);
                $data["deskripsi"] = $konten;
            }


            if ($request->hasFile('gambar')) {
                $gambar = $request->gambar;
                $originalName = $gambar->getClientOriginalName();
                $extension = $gambar->extension();
                $encryptedName = Str::random(40) . '.' . $extension;

                $ex = strtolower($extension);

                // dd(base_path(""));
                if($ex == "jpg" || $ex == "jpeg" || $ex == "png") {
                    $gambar->move(public_path("/gambar/slideshow"), $encryptedName);
                }


                $data["gambar"] = $encryptedName;

            }

            slideshowM::create($data);

            return redirect("slideshow")->with('success', 'Success');


        // }catch(\Throwable $th){
        //     return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slideshowM  $slideshowM
     * @return \Illuminate\Http\Response
     */
    public function monitor(slideshowM $slideshowM)
    {
        $slideshow = slideshowM::orderBy("idslideshow", "asc")->get();

        return view("pages.slideshow.monitor", [
            "slideshow" => $slideshow,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slideshowM  $slideshowM
     * @return \Illuminate\Http\Response
     */
    public function edit(slideshowM $slideshowM, $idslideshow)
    {
        $slideshow = slideshowM::where("idslideshow", $idslideshow)->first();
        return view("pages.slideshow.edit", [
            "slideshow" => $slideshow,
            "idslideshow" => $idslideshow,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slideshowM  $slideshowM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slideshowM $slideshowM, $idslideshow)
    {
        // try{
            if($request->judul && $request->deskripsi && $request->gambar) {
                return redirect()->back()->with('error', 'Terjadi kesalahan');
            }
        $data["judul"] = "";
        $data["deskripsi"] = "";
        $data = $request->all();
        $data["gambar"] = "";
        if($data["judul"] == null) {
            $data["judul"] = "";
        }
        if($data["deskripsi"] == null) {
            $data["deskripsi"] = "";
        }


        if(!empty($request->deskripsi)) {
            $deskripsi = $request->deskripsi;
            $konten = trim($deskripsi);
            $konten = stripslashes($deskripsi);
            $konten = htmlspecialchars($deskripsi);
            $data["deskripsi"] = $konten;
        }


        if ($request->hasFile('gambar')) {
            $gambar = $request->gambar;
            $originalName = $gambar->getClientOriginalName();
            $extension = $gambar->extension();
            $encryptedName = Str::random(40) . '.' . $extension;

            $ex = strtolower($extension);

            // dd(base_path(""));
            if($ex == "jpg" || $ex == "jpeg" || $ex == "png") {
                $gambar->move(public_path("/gambar/slideshow"), $encryptedName);
            }


            $data["gambar"] = $encryptedName;

        }

        slideshowM::findOrFail($idslideshow)->update($data);

        return redirect("slideshow")->with('success', 'Success');


    // }catch(\Throwable $th){
    //     return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
    // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slideshowM  $slideshowM
     * @return \Illuminate\Http\Response
     */
    public function destroy(slideshowM $slideshowM, $idslideshow)
    {
        try{
            slideshowM::destroy($idslideshow);
            return redirect()->back()->with('success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }
}
