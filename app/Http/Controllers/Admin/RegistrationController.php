<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index()
    {

    }

    public function update(Request $request, Registration $registration)
    {
        $registration->update($request->all());

        return redirect()->back()->withSuccess('Pembayaran telah diverifikasi.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->back()->withSuccess('Peserta dihapus dari Kursu.');
    }
}
