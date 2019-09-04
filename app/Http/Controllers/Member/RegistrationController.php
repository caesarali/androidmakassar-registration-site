<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function showReceiptForm($code)
    {
        $registration = Registration::where('code', $code)->firstOrFail();
        return view('pages.member.receipt', compact('registration'));
    }

    public function receipt(Request $request, $code)
    {
        $registration = Registration::where('code', $code)->firstOrFail();
        if (!$registration->receipt) {
            $strukRule = 'required';
        } else {
            $strukRule = 'nullable';
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'paid_at' => 'required|date',
            'struk' => $strukRule . '|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $file = $request->file('struk');
        if ($file) {
            $ext = $file->getClientOriginalExtension();
            $name = 'receipt-' . $registration->code;
            $filename = $name  . '.' . $ext;
            $path = 'receipts/' . $filename;
            $file->move('receipts', $filename);

            $request->request->add(['file' => $path, 'nominal' => $registration->event->price]);
        }

        Receipt::updateOrCreate(
            ['code' => $registration->code],
            $request->all()
        );
        $registration->update(['status' => 1]);

        return redirect()->back()->withSuccess('Terimakasih, permintaan kamu sedang kami proses.');
    }
}
