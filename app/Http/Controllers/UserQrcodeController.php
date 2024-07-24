<?php

namespace App\Http\Controllers;

use App\Models\Qrcode;
use App\Models\User;
use App\Models\UserQrcode;
use Illuminate\Http\Request;

class UserQrcodeController extends Controller
{
    // User Qrcodes

    public function index($userId)
    {
        $user = User::where('id', $userId)->first();
        $qrcodes = Qrcode::get();
        $user_qrcodes = UserQrcode::with('qrcode')->where('user_id', $userId)->get();

        return inertia('Users/UserQrcode', compact('user', 'qrcodes', 'user_qrcodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required|exists:users,id',
            'qrcode_id' => 'required|exists:qrcodes,id|unique:user_qrcodes,qrcode_id',
        ]);

        UserQrcode::create([
            'user_id' => $request->userId,
            'qrcode_id' => $request->qrcode_id,

        ]);
        Qrcode::find($request->qrcode_id)->update([ 'is_assigned'   => 1]);

        return to_route('user.qrcode', $request->userId)->with('success', 'QR code assigned successfully');
    }

    public function delete($id)
    {

        UserQrcode::find($id)->delete();
        return redirect()->back()->with('success', 'QR code deleted successfully');
    }


    // get qrcode by reference
    public function qrcode_reference($reference)
    {
        $qrcode = Qrcode::where('reference', $reference)->first();

        if ($qrcode && $qrcode->is_assigned != 1) {
            return response()->json($qrcode);
        } elseif($qrcode->is_assigned == 1){
            return response()->json(['error' => 'Qrcode has already registered'], 422);
        } else {
            return response()->json(['error' => 'Reference not found'], 404);
        }
    }

}
