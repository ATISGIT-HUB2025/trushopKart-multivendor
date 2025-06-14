<!DOCTYPE html>
<html>
<head>
    <title>Center Certificates</title>
</head>
<body>
    @foreach($results as $primaryResult)
        @include('frontend.result.certificate_two_bulk', ['primaryResult' => $primaryResult])
        @if(!$loop->last)
            <div style="page-break-after: always;"></div>
        @endif
    @endforeach
</body>
</html>
