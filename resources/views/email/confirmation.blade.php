<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <div>
            <p>Hi,</p>
            <p>Thanks for joining us.<p>
            <p>Please follow the link below to verify your email address
            {{ URL::to('register/verify/' . $confirmation_code) }} to get your first loan.<p>
            <p>Thank you,</p>
            <p>Fast Cash Pinoy</p>
        </div>

    </body>
</html>