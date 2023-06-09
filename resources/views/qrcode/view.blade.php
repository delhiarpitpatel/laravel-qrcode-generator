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

        <div class="card">
            <div class="card-header">
                <h2>{{ $shortCode->data }}</h2>
                <h6>Total Visits: {{ $shortCode->visits }}</h6>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->generate($shortCode->data) !!}
            </div>
        </div>
    </div>
</body>

</html>
