<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class TodoController extends Controller
{
    public function mytodo($id)
    {
        $todo = DB::table('tb_todo')
            ->where('keterangan', 'Ditugaskan')
            ->where('tugas_untuk', $id)
            ->get();

        return view('todo.mytodo', [
            'daftarTugas' => $todo,
            'idPengguna' => $id,
            
        ]);
    }

    public function berandaTodo($id)
    {
        $detailPegawai = DB::table('tb_pegawai')->where('id', $id)->first();

        $dataTodo = DB::table('tb_todo')
            ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
            ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
            ->select('tb_todo.*', 'pemberi.nama as nama_pemberi', 'penerima.nama as nama_penerima')
            ->where('tb_todo.tugas_dari', $id)
            ->get();

        return view('admin.berandaTodo', [
            'detailPegawai' => $detailPegawai,
            'adminId' => $id,
            'dataTodo' => $dataTodo
        ]);
    }

    public function detailTodo($id, $idPengguna)
    {
        $detailTodo = DB::table('tb_todo as todo')
            ->join('tb_pegawai as pemberi', 'todo.tugas_dari', '=', 'pemberi.id')
            ->select('todo.id', 'todo.tugas', 'todo.waktu_mulai', 'todo.waktu_selesai', 'pemberi.nama as pemberi_tugas', 'todo.keterangan')
            ->where('todo.id', $id)
            ->first();

        return view('todo.detailTodo', [
            'detailTodo' => $detailTodo,
            'idPengguna' => $idPengguna
        ]);
    }

    public function perbaruiTodo(Request $request, $id)
    {
        DB::table('tb_todo')
            ->where('id', $id)
            ->update(['keterangan' => $request->statusPekerjaan]);

        return redirect()->route('todo.mytodo', ['id' => $request->idPengguna])->with('success', 'Status berhasil diperbarui!');
    }

    public function todoSelesai($id)
    {
        $todoSelesai = DB::table('tb_todo')
            ->where('keterangan', 'Selesai')
            ->where('tugas_untuk', $id)
            ->get();

        return view('todo.todoSelesai', [
            'todoSelesai' => $todoSelesai,
            'idPengguna' => $id
        ]);
    }

    public function setSelesai($id, $userId)
{
    DB::table('tb_todo')->where('id', $id)->update(['keterangan' => 'Selesai']);
    return redirect()->route('todo.mytodo', ['id' => $userId])->with('success', 'Tugas berhasil ditandai sebagai selesai.');
}


    public function todoDitolak($id)
    {
        $todoDitolak = DB::table('tb_todo')
            ->where('keterangan', 'Ditolak')
            ->where('tugas_untuk', $id)
            ->get();

        return view('todo.todoDitolak', [
            'todoDitolak' => $todoDitolak,
            'idPengguna' => $id
        ]);
    }

    public function setDitolak($id, $userId)
{
    DB::table('tb_todo')
        ->where('id', $id)
        ->update(['keterangan' => 'Ditolak']);

    return redirect()->route('todo.mytodo', ['id' => $userId])
        ->with('success', 'Tugas berhasil ditolak.');
}


    public function dataPenugasan($id)
    {
        $detailPegawai = DB::table('tb_pegawai')->where('id', $id)->first();

        $semuaTodo = DB::table('tb_todo')
            ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
            ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
            ->select('tb_todo.*', 'pemberi.nama as nama_pemberi', 'penerima.nama as nama_penerima')
            ->get();

        return view('admin.berandaTodo', [
            'dataTodo' => $semuaTodo,
            'adminId' => $id,
            'detailPegawai' => $detailPegawai
        ]);
    }

    public function penugasanBaru($id)
    {
        $delegator = DB::table('tb_pegawai')->where('id', $id)->get();
        $pelaksana = DB::table('tb_pegawai')
            ->where('jabatan', 'Staff')
            ->orWhere('jabatan', '')
            ->get();

        return view('admin.penugasanBaru', [
            'namaDelegator' => $delegator,
            'namaPelaksana' => $pelaksana,
            'idPengguna' => $id,
            'adminId' => $id
        ]);
    }

    public function simpanPenugasanBaru(Request $request)
    {
        $validated = $request->validate([
            'namaTodo' => 'required|string',
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date|after_or_equal:tanggalMulai',
            'pemberiTugas' => 'required|integer',
            'namaPenugas' => 'required|integer'
        ]);

        $cekDuplikat = DB::table('tb_todo')
            ->where('tugas', $validated['namaTodo'])
            ->where('tugas_untuk', $validated['namaPenugas'])
            ->where('tugas_dari', $validated['pemberiTugas'])
            ->whereDate('waktu_mulai', $validated['tanggalMulai'])
            ->whereDate('waktu_selesai', $validated['tanggalSelesai'])
            ->exists();

        if ($cekDuplikat) {
            return redirect()->back()->with('error', 'Tugas sudah ada dan tidak boleh duplikat!');
        }

        DB::table('tb_todo')->insert([
            'tugas' => $validated['namaTodo'],
            'waktu_mulai' => $validated['tanggalMulai'],
            'waktu_selesai' => $validated['tanggalSelesai'],
            'tugas_dari' => $validated['pemberiTugas'],
            'tugas_untuk' => $validated['namaPenugas'],
            'keterangan' => 'Ditugaskan'
        ]);

        return redirect()->route('admin.berandaTodo', ['id' => $validated['pemberiTugas']])->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function ubahPenugasan($id, $adminId)
    {
        $detailTodo = DB::table('tb_todo')
            ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
            ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
            ->select('tb_todo.*', 'pemberi.nama as nama_pemberi', 'penerima.nama as nama_penerima')
            ->where('tb_todo.id', $id)
            ->first();

        $delegator = DB::table('tb_pegawai')->where('id', $adminId)->first();
        $pelaksana = DB::table('tb_pegawai')->whereIn('jabatan', ['Staff', 'Manajer'])->get();

        return view('admin.ubahPenugasan', [
            'detailTodo' => $detailTodo,
            'delegator' => $delegator,
            'pelaksana' => $pelaksana,
            'adminId' => $adminId
        ]);
    }

    public function simpanPembaruanTugas(Request $request, $id, $adminId)
    {
        $request->validate([
            'namaTodo' => 'required|string',
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date|after_or_equal:tanggalMulai',
            'pemberiTugas' => 'required|integer',
            'namaPenugas' => 'required|integer'
        ]);

        DB::table('tb_todo')
            ->where('id', $id)
            ->update([
                'tugas' => $request->namaTodo,
                'waktu_mulai' => $request->tanggalMulai,
                'waktu_selesai' => $request->tanggalSelesai,
                'tugas_dari' => $request->pemberiTugas,
                'tugas_untuk' => $request->namaPenugas
            ]);

        return redirect()->route('admin.berandaTodo', ['id' => $adminId])->with('success', 'Tugas berhasil diperbarui!');
    }

    public function hapusPenugasan($id)
    {
        $todo = DB::table('tb_todo')->where('id', $id)->first();

        if (!$todo) {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan.');
        }

        $adminId = $todo->tugas_dari;

        DB::table('tb_todo')->where('id', $id)->delete();

        return redirect()->route('admin.berandaTodo', ['id' => $adminId])
                         ->with('success', 'Tugas berhasil dihapus!');
    }

    public function penugasanSelesai($id)
    {
        $penugasanSelesai = DB::table('tb_todo')
            ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
            ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
            ->select('tb_todo.*', 'pemberi.nama as nama_pemberi', 'penerima.nama as nama_penerima')
            ->where('keterangan', 'Selesai')
            ->get();

        return view('admin.penugasanSelesai', [
            'penugasanSelesai' => $penugasanSelesai,
            'adminId' => $id
        ]);
    }

    public function penugasanDitolak($id)
    {
        $penugasanDitolak = DB::table('tb_todo')
            ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
            ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
            ->select('tb_todo.*', 'pemberi.nama as nama_pemberi', 'penerima.nama as nama_penerima')
            ->where('keterangan', 'Ditolak')
            ->get();

        return view('admin.penugasanDitolak', [
            'penugasanDitolak' => $penugasanDitolak,
            'adminId' => $id
        ]);
    }

    public function rincianPenugasan($id)
    {
        $ditugaskan = DB::table('tb_todo')->where('keterangan', 'Ditugaskan')->get();
        $diselesaikan = DB::table('tb_todo')->where('keterangan', 'Selesai')->get();
        $ditolak = DB::table('tb_todo')->where('keterangan', 'Ditolak')->get();

        return view('admin.rincianPenugasan', [
            'ditugaskan' => $ditugaskan,
            'diselesaikan' => $diselesaikan,
            'ditolak' => $ditolak,
            'adminId' => $id,
            'jumlahDitugaskan' => $ditugaskan->count(),
            'jumlahDiselesaikan' => $diselesaikan->count(),
            'jumlahDitolak' => $ditolak->count()
        ]);
    }
}