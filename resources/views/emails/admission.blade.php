<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Admission Enquiry</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <h2>New Admission Enquiry Received</h2>

    <p><strong>Name:</strong> {{ $admission->name }}</p>
    <p><strong>Phone:</strong> {{ $admission->phone }}</p>
    <p><strong>Class:</strong> {{ $admission->class }}</p>
    <p><strong>Source:</strong> {{ $admission->source }}</p>
    

    @if(!empty($admission->email))
        <p><strong>Email:</strong> {{ $admission->email }}</p>
    @endif

    @if(!empty($admission->message))
        <p><strong>Message:</strong><br>{{ $admission->message }}</p>
    @endif

    <hr>

    <p>
        Submitted on {{ $admission->created_at->format('d M Y, h:i A') }}
    </p>

</body>
</html>
