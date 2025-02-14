<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Auth;
use Alert;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('pesan.index', compact('barang'));
    }
    public function pesan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        if($request->jumlah_pesan > $barang->stok)
        {
            return redirect('pesan/'.$id);
        }

        $cek_pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        if(empty($cek_pesanan)){
            $pesanan = new Pesanan;
            $pesanan->id_user = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }

         $pesanan_baru = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
         $cek_pesanan_detail = PesananDetail::where('id_barang', $barang->id)->where('id_pesanan', $pesanan_baru->id)->first();
         if(empty($cek_pesanan_detail)){
             $pesanan_detail = new PesananDetail;
             $pesanan_detail->id_barang = $barang->id;
             $pesanan_detail->id_pesanan = $pesanan_baru->id;
             $pesanan_detail->jumlah = $request->jumlah_pesan;
             $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
             $pesanan_detail->save();
         }else
        {
                $pesanan_detail = PesananDetail::where('id_barang', $barang->id)->where('id_pesanan', $pesanan_baru->id)->first();
                $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;
    
                $harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
                $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
                $pesanan_detail->update();
            }
         $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
         $pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
            $pesanan->update();

            Alert::success('Pesanan Berhasil Masuk Keranjang', 'Success');
            return redirect('check-out');
    }
    public function check_out()
    {
        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];

    if(!empty($pesanan)) {
        $pesanan_details = PesananDetail::where('id_pesanan', $pesanan->id)->get();
    }

    return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
}

public function delete($id)
{
    
    $pesanan_detail = PesananDetail::where('id', $id)->first();

    
    if (!$pesanan_detail) {
        return redirect('check-out')->with('error', 'Pesanan tidak ditemukan');
    }

   
    $pesanan = Pesanan::where('id', $pesanan_detail->id_pesanan)->first();


    if ($pesanan) {
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();
    }

   
    $pesanan_detail->delete();


    Alert::error('Pesanan Berhasil Dihapus', 'Hapus');
    return redirect('check-out');
}



    
    public function konfirmasi()
{
    $user = Auth::user();


    if (empty($user->alamat) || empty($user->no_hp)) {
        Alert::error('Harap lengkapi identitas Anda terlebih dahulu', 'Error');
        return redirect('profile');
    }


    $pesanan = Pesanan::where('id_user', $user->id)->where('status', 0)->first();

    if (!$pesanan) {
        Alert::error('Tidak ada pesanan yang dapat di-checkout', 'Error');
        return redirect('home');
    }

    $pesanan->status = 1;
    $pesanan->update();

    $pesanan_details = PesananDetail::where('id_pesanan', $pesanan->id)->get();
    foreach ($pesanan_details as $pesanan_detail) {
        $barang = Barang::where('id', $pesanan_detail->id_barang)->first();
        $barang->stok -= $pesanan_detail->jumlah;
        $barang->update();
    }

    Alert::success('Pesanan Berhasil Check Out. Silahkan Melakukan Proses Pembayaran.', 'Success');
    return redirect('history' . '/' . $pesanan->id);

    }
    public function profile()
    {
    return view('profile');
    }

    public function history()
{
    $pesanans = Pesanan::where('id_user', Auth::user()->id)
                       ->where('status', '!=', 0)
                       ->orderBy('tanggal', 'desc')
                       ->get();

    return view('history.index', compact('pesanans'));

}

public function uploadBuktiTransfer(Request $request, $id)
{
    $request->validate([
        'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $pesanan = Pesanan::findOrFail($id);

    if ($request->hasFile('bukti_transfer')) {
        
        $file = $request->file('bukti_transfer');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/bukti_transfer'), $fileName);

        
        $pesanan->bukti_transfer = $fileName;
        $pesanan->save();
    }

   
    Alert::success('Bukti transfer berhasil diunggah!', 'Success')->persistent('OK')->autoclose(3000);
    
   
    return redirect('home');
}

}
