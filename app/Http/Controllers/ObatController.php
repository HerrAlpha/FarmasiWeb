<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

use App\Models\User;
use App\Models\DataObat;
use App\Models\DataPasien;
use App\Models\DataJadwalObat;


class ObatController extends Controller
{
    //Controller Data Medicine
    public function stock_obat(){
        $data = DataObat::get();
        return view('pages/stock-obat', ['data' => $data]);
    }

    public function add_obat(Request $request){
        $data = $request->all();

        $data['gambar'] = $request->file('gambar')->getClientOriginalName();

        if ($request->hasFile('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storePubliclyAs('image',$request->file('gambar')->getClientOriginalName(),'public');
            $request->file('gambar')-> move(public_path('public/ObatPic'), $request->file('gambar')->getClientOriginalName());
        }

        $data['slug'] = Str::slug($request->nama_obat);
        DataObat::create($data);
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function detail_obat($slug){
        $data = DataObat::where('slug', $slug)->get();
        return view('pages/detail-obat', ['data' => $data]);
    }

    public function edit_obat($slug){
        $data = DataObat::where('slug', $slug)->get();
        return view('pages/edit-obat', ['data' => $data]);
    }

    public function update_obat(Request $request){
        $dataupdate = request()->except(['_token']);
        $slug = $dataupdate['slug'];

        DataObat::where('slug', $slug)
                ->update($dataupdate);

        if($request->hasFile('gambar')){
            $validateData['gambar'] = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storePubliclyAs('image',$request->file('gambar')->getClientOriginalName(),'public');
            $request->file('gambar')-> move(public_path('public/ObatPic'), $request->file('gambar')->getClientOriginalName());
        }

        $data = DataObat::where('slug', $slug)->get();

        return view('pages/detail-obat', ['data' => $data])->with('success', 'Data berhasil ditambahkan!');
    }

    public function delete_obat($slug){
        $gambar = Dataobat::where('slug', $slug)->value('gambar');

        if (Storage::exists('public/image/'. $gambar)) {
            Storage::delete('public/image/'. $gambar);
        }else{
            dd('not found');
        }
        DataObat::where('slug', $slug)->delete();
        return redirect()->route('stock-obat')->with('success', 'Data berhasil dihapus!');
    }


    //Controller Medicine Pasien
    public function store_med(Request $request){
        $dataobat = request()->all();

        $waktuminum = array();

        for ($i=0; $i < $request->dosis_harian; $i++) {
            $waktuminum[] = request("waktu_$i");
        }
        $dataobat['waktu'] = implode(",",$waktuminum);

        $slug = $request->slug;

        $user = DataPasien::where('slug', $slug)->value('id');
        $dataobat['data_id_pasien'] = $user;
        $newdataobat = DataJadwalObat::create($dataobat);
        return Redirect::back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function delete_med(Request $request){
        $dataschedule = request()->all();

        $slug = $request->slug;
        $id = $request->id;

        $user = DataPasien::where('slug', $slug)->value('id');

        DataJadwalObat::where('id', $id)->delete();
        return Redirect::back()->with('success', 'Data berhasil dihapus!');
    }


}
