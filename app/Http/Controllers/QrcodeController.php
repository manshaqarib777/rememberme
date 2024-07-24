<?php

namespace App\Http\Controllers;

use App\Models\Qrcode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\Qrcode AS QRCODES;
class QrcodeController extends Controller
{
    public function index(){
        $qrcodes = Qrcode::paginate(20);
        return inertia('Qrcodes/Index',compact('qrcodes'));
    }

    public function create(){
        return inertia('Qrcodes/Create');
    }



    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'url' => ['required'],
            'number' => ['required', 'integer', 'min:1'],
        ]);

        // Get the last reference number
        $lastRecord = Qrcode::orderBy('reference', 'desc')->first();
        $lastReferenceNumber = $lastRecord ? (int)$lastRecord->reference : 100000;

        // Determine how many records to create
        $numberOfRecords = (int)$request->number;

        // Prepare the records to be inserted
        $records = [];
        for ($i = 0; $i < $numberOfRecords; $i++) {
            $lastReferenceNumber++;
            $records[] = [
                'reference' => $lastReferenceNumber,
                'url' => $request->url,
            ];
        }

        // Insert all records into the database
        Qrcode::insert($records);

        // Redirect to the qrcodes route with success message
        return to_route('qrcodes')->with('success', $numberOfRecords . ' records created successfully');
    }

    public function print_single(){
        $reference = $_GET['reference'];
        $cardFront = asset('card_front.png');
        $cardBack = asset('card_back.png');
        $qrcode =  Qrcode::where('reference', $reference)->first();
        return view('print_qrcode', ['cardFront' => $cardFront, 'cardBack' => $cardBack, 'qrcode' => $qrcode]);
        // return inertia('Qrcodes/Print', ['cardFront' => $cardFront, 'cardBack' => $cardBack, 'qrcode' => $qrcode]);

    }

    public function delete($id)
    {
        Qrcode::find($id)->delete();
        return to_route('qrcodes')->with('success', 'Qrcode deleted successfully');
    }


}
