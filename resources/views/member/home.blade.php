<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome, {{ $user->name }}!</h1>
<p>Your email: {{ $user->email }}</p>
<p>Your organization: {{ $user->organization_name }}</p>
<p>Your role: {{ $user->role }}</p>
<p>Your member status: {{ $user->member }}</p>
</body>
</html>
