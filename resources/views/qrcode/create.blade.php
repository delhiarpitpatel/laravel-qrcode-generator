<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR Code</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">
        <form action="{{ route('qrcode.store') }}" method="POST">
            @csrf
            <div class="container mt-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Generate QR Code</h2>
                        <h5>{!! Session::get('success') !!}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="qr_code_data" class="form-label">QR Code Data</label>
                            <textarea name="qr_code_data" id="qr_code_data" cols="30" rows="10" class="form-control">{{ old('qr_code_data') }}</textarea>
                            @error('qr_code_data')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
