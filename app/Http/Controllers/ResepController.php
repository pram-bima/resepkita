<?php

namespace App\Http\Controllers;

use App\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resep = Resep::all();
        return view('index', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required', 
            'gambar' => 'required|mimes:jpeg,png,jpg|max:2048', 
            'bahan' => 'required',
            'alat' => 'required', 
            'langkah' => 'required',
        ]);

        $file = $request->file('gambar');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'data_gambar';
        $file->move($tujuan_upload,$nama_file);


        $resep = new Resep;
        $resep->judul = $request->judul;
        $resep->gambar = $nama_file;
        $resep->bahan = $request->bahan;
        $resep->alat = $request->alat;
        $resep->langkah = $request->langkah;
        $resep->save();

        return redirect()->route('resep.index')
            ->with('success', 'Resep created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function show(Resep $resep)
    {
        return view('detail', compact('resep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        return view('edit', compact('resep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'judul' => 'required', 
            'gambar' => 'required', 
            'bahan' => 'required',
            'alat' => 'required', 
            'langkah' => 'required',
        ]);

        $resep->update($request->all());

        return redirect()->route('resep.index')
            ->with('success', 'Resep updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resep $resep)
    {
        $resep->delete();

        return redirect()->route('resep.index')
            ->with('success', 'Resep deleted successfully');
    }

    private function upload_foto($id_barang, $files) {
		$galleryPath = realpath(APPPATH.'../foto');
		$path = $galleryPath.'/'.$id_barang;

		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}

		$konfigurasi = array(
			'allowed_types' => 'jpg|png|jpeg',
			'upload_path' => $path,
			'overwrite' => true
		);

		$this->load->library('upload', $konfigurasi);

		$_FILES['file']['name'] = $files['file']['name'];
		$_FILES['file']['type'] = $files['file']['type'];
		$_FILES['file']['tmp_name'] = $files['file']['tmp_name'];
		$_FILES['file']['error'] = $files['file']['error'];
		$_FILES['file']['size'] = $files['file']['size'];

		if ($this->upload->do_upload('file')) {
			$data_barang = array(
				'foto_produk' => $this->upload->data('file_name')
			);

			$this->Barang_model->update_data($id_barang, $data_barang);

			return 'Success Upload';
		} else {
			return 'Error Upload';
		}
	}
}
