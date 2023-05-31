<!DOCTYPE html>
<html>
<head>
    <title>Email</title>
</head>
<body>
    <h1>{{ $data['subject'] }}</h1>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>From:</strong> {{ $data['fromEmail'] }}</p>
    <p><strong>Message:</strong> {{ $data['message'] }}</p>
</body>
</html>
