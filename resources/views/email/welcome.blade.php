<DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <h2>Hi {{ $data['name'] }}, We’re glad you’re here! Following are your account details:</h2>
        <h3>Email: </h3>
        <p>{{ $data['email'] }}</p>
        <h3>Password: </h3>
        <p>{{ $data['password'] }}</p>
    </body>

    </html>
