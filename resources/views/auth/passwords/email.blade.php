
<!doctype html>
<html lang="en" dir="ltr">


<!-- Mirrored from shreethemes.in/landrick/dashboard/email-password-reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Jan 2023 10:43:22 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Reset - Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico" />
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&amp;display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400;">

        <!-- Hero Start -->
        <div style="margin-top: 50px;">
            <table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
                <thead>
                    <tr style="background-color: #2f55d4; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; font-weight: 700; letter-spacing: 1px;">
                        <th scope="col"><img src="assets/images/logo-light.png" height="24" alt=""></th>
                    </tr>
                </thead>

                <tbody>
                    @if (session('status'))
                        <tr>
                            <td>
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
                            Hello,
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px 24px 15px; color: #8492a6;">
                            To reset your password, please click the button below :
                        </td>
                    </tr>

                    <tr>

                        <td style="padding: 15px 24px;">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 15px 24px 0; color: #8492a6;">
                            This link will be active for 90 second from the time this email was sent. If you did not request to reset your password, please ignore this email and your account will not be affected.
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 15px 24px 15px; color: #8492a6;">
                            Khaalifa <br> Support Team
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                            © <script>document.write(new Date().getFullYear())</script> Khaalifa.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Hero End -->
    </body>
</html>

