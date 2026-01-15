<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Admission Enquiry</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <h2>New Admission Enquiry</h2>

    <p><strong>Name:</strong> {{ $admission->name }}</p>
    <p><strong>Phone:</strong> {{ $admission->phone }}</p>
    <p><strong>Class:</strong> {{ $admission->class }}</p>

    @if($admission->email)
        <p><strong>Email:</strong> {{ $admission->email }}</p>
    @endif

    @if($admission->father_name)
        <p><strong>Father Name:</strong> {{ $admission->father_name }}</p>
    @endif

    @if($admission->message)
        <p><strong>Message:</strong><br>{{ $admission->message }}</p>
    @endif

    <hr>

    <p>
        Submitted on {{ $admission->created_at->format('d M Y, h:i A') }}
    </p>

</body>
</html>
