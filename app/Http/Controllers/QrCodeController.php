<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    private $shortCodeController;

    public function __construct(ShortCodeController $shortCodeController)
    {
        $this->shortCodeController = $shortCodeController;
    }

    public function view(ShortCode $shortCode)
    {
        $shortCode->visit_count = $shortCode->visit_count + 1;
        $shortCode->save();
        if (filter_var($shortCode->data, FILTER_VALIDATE_URL)) {
            return redirect()->away($shortCode->data);
        }
        return view('qrcode.view', compact('shortCode'));
    }
    public function store(Request $request)
    {
        $qrCodeData = $request->input('qr_code_data');

        $shortCode = $this->shortCodeController->generateShortCode($qrCodeData);

        $shortCodeViewUrl = route('qrcode.view', ['shortCode' => $shortCode->code]);
        $successMessage = "Your QR Code is generated successfully. You can view it at <a href='$shortCodeViewUrl'>$shortCodeViewUrl</a>";

        return redirect()->route('qrcode.create')->with('success', $successMessage);
    }
}
