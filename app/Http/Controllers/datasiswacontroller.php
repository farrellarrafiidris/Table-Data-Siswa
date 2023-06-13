<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class datasiswacontroller extends Controller
{
    /**
     * Display a listing of the resource.s
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(!Auth::check()) {
            return redirect('/');
        }else {
            $data = Siswa::get();

            $siswa = [
            'data' => $data
        ];  
            return view('index', $siswa);
        }


        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()) {
            return redirect('/');
        }

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
        if(!Auth::check()) {
            return redirect('login');
        }
            $nama = $request->input('nama');
            $kelas = $request->input('kelas');

            Siswa::create([
            'nama' => $nama,
            'kelas' => $kelas,
        ]);
            return redirect('table');



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
            $data_edit = Siswa::where('id',$id)->first();

            $data = [
            'edit' => $data_edit
        ];
            return view('edit', $data);
        

    
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
        if(!Auth::check()) {
            return redirect('login');
        }
            $nama = $request->input('nama');
            $kelas = $request->input('kelas');

            //? "UPDATE .... Where id = $id"
            Siswa::selectgById($id)->update([
                'nama' => $nama,
                'kelas' => $kelas,
            ]);
            return redirect('table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()) {
            return redirect('login');
        }
            Siswa::selectById($id)->delete();
            return redirect('table');



    }
}
