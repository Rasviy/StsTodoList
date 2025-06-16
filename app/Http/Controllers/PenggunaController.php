<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function login($id) {
        $pegawai = DB::table('tb_pegawai')->where('id', $id)->first();

        if (!$pegawai) {
            return redirect('/')->with('error', 'Data pegawai tidak ditemukan.');
        }

        return view('todo.beranda', [
            'detailPegawai' => $pegawai
        ]);
    }

    public function adminLogin($id) {
    $pegawai = DB::table('tb_pegawai')->where('id', $id)->first();

    if (!$pegawai) {
        return redirect('/')->with('error', 'Data admin tidak ditemukan.');
    }

    
    $dataTodo = DB::table('tb_todo')
        ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
        ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
        ->select(
            'tb_todo.*',
            'pemberi.nama as nama_pemberi',
            'penerima.nama as nama_penerima'
        )
        ->where('tb_todo.tugas_dari', $id)
        ->get();

    return view('admin.berandaTodo', [
        'detailPegawai' => $pegawai,
        'dataTodo' => $dataTodo,
        'adminId' => $pegawai->id 
    ]);
}


    
    public function prosesLogin(Request $request) {
       
        $request->validate([
            'userName' => 'required',
            'kataSandi' => 'required',
            // 'jabatan'   => 'required|in:Staff,Manajer,CEO',
        ]);

       
        $login = DB::table('tb_login')
            ->where('nama_pengguna', $request->userName)
            ->where('kata_sandi', $request->kataSandi)
            ->first();

        if (!$login) {
            return redirect('/')->with('error', 'Nama pengguna atau kata sandi salah!');
        }

        
        $pegawai = DB::table('tb_pegawai')->where('id', $login->id)->first();

        if (!$pegawai) {
            return redirect('/')->with('error', 'Data pegawai tidak ditemukan.');
        }

       
        switch (strtolower($pegawai->jabatan)) {
            case 'staff':
            case 'pelaksana':
                return redirect("/todo/mytodo/{$pegawai->id}");

           

            case 'admin':
                return redirect("/todo/admin/{$pegawai->id}");

            default:
                return redirect('/')->with('error', 'Jabatan tidak dikenali.');
        }
    }
    public function logout()
{
    session()->flush();
    return redirect('/')->with('success', 'Berhasil logout!');
}

}
