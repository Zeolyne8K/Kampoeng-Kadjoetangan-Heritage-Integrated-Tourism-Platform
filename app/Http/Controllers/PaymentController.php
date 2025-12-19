<?php

namespace App\Http\Controllers;

use App\Models\Gopay;
use App\Models\MakeOrder;
use App\Models\QRISCodes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf As PDF;

class PaymentController extends Controller
{
    //
    public function arrival()  {
        return view('user.payment.arrive');
    }

    public function makeOrder(Request $request)  {

        $request->validate([
            'nama_awalan' => 'required|string|max:100',
            'jenis_tiket' => 'required|in:Lokal,Mancanegara',
            'email' => 'required|email|max:255',
            'jumlah_tiket' => 'required|integer|min:1|max:100',
            'total_harga' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date_format:Y-m-d|after_or_equal:today',
        ]);

        // Store request data in session
        session(['first_request' => $request->except('_token')]);

        return redirect()->route('payment.method.methodSelect')->with('success', 'Silahkan pilih metode pembayaran');
    }

    public function methodSelect()  {
        
        $first_request = session('first_request') ?? request()->query('first_request', []);
        $data_gopay = Gopay::first();
        $data_qris = QRISCodes::first();

        return view('user.payment.method', compact('first_request', 'data_gopay', 'data_qris'))->with('success', 'Silahkan pilih metode pembayaran');
    }

    public function methodStore(Request $request)  {
        
        $request->validate([
            'metode_pembayaran' => 'required|in:Gopay,QRIS',
        ]);

        $first_request = $request->except('_token', '_method', 'metode_pembayaran');
        
        session(['payment_method' => $request->metode_pembayaran]);
        session(['first_request' => $first_request]);

        return redirect()->route('payment.bill.payment');
    }

    public function billPayment()  {
        
        $first_request = session('first_request') ?? [];
        $payment_method = session('payment_method') ?? null;
        
        if (!$payment_method) {
            return redirect()->route('payment.arrival');
        }

        $data_gopay = Gopay::first();
        $data_qris = QRISCodes::first();

        return view('user.payment.bill', compact('first_request', 'payment_method', 'data_gopay', 'data_qris'));
    }

    public function billStore(Request $request)  {
        
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:png,jpg,jpeg|max:5120',
        ]);

        $first_request = session('first_request') ?? [];
        $payment_method = session('payment_method') ?? null;

        // Store file in Storage Path
        $filePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        // Create MakeOrder record
        $makeOrder = MakeOrder::create([
            'nama_awalan' => $first_request['nama_awalan'] ?? '',
            'email' => $first_request['email'] ?? '',
            'jenis_tiket' => $first_request['jenis_tiket'] ?? '',
            'metode_pembayaran' => $payment_method,
            'jumlah_tiket' => $first_request['jumlah_tiket'] ?? 0,
            'total_harga' => $first_request['total_harga'] ?? 0,
            'status_pembayaran' => 'Ditunggu',
            'bukti_pembayaran' => $filePath,
            'tanggal_berlaku' => Carbon::now(),
            'tanggal_kadaluarsa' => $first_request['tanggal_kadaluarsa'] ?? null,
        ]);

        session(['make_order_id' => $makeOrder->id]);

        session()->forget(['first_request', 'payment_method']);

        return redirect()->route('payment.struck')->with('success', 'Pesanan berhasil dibuat. Mohon tunggu konfirmasi dari admin.');
    }

    public function struck()  {
        
        $order_id = session('make_order_id');
        
        if (!$order_id) {
            return redirect()->route('payment.arrival');
        }

        $makeOrder = MakeOrder::find($order_id);

        if (!$makeOrder) {
            return redirect()->route('payment.arrival');
        }

        session()->forget('make_order_id');

        return view('user.payment.struck', compact('makeOrder'));
    }

    public function billDelete()  {

        session()->forget(['first_request', 'payment_method']);
        
        return response()->json(['success' => true]);
    }

    public function downloadStruk($id)  {
        
        $makeOrder = MakeOrder::findOrFail($id);

        // Generate PDF dengan layout struk
        $pdf = PDF::loadView('user.payment.struk-pdf', compact('makeOrder'));
        
        // Set paper size dan margin
        $pdf->setPaper('A4', 'portrait');
        
        // Download dengan nama file
        $filename = 'Struk-' . $makeOrder->id . '-' . Carbon::now()->format('dmY') . '.pdf';
        
        return $pdf->download($filename);
    }
}