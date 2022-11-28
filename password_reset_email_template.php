<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACMA EC Election 2022-23</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body, table, tr, td {
            font-family: 'Poppins', sans-serif !important;
        }
        th, tr {
            vertical-align: top;
        }
        img {
            max-width: 100%;
        }
        @media (max-width: 767px) {
            h1 {
                font-size: 1.4rem;
            }
            h3, p {
                font-size: 0.9rem;
            }
            table thead th {
                display: block;
            }
        }
    </style>
</head>
<body style="width: 600px; max-width: 100%; margin: auto;">
    <div>
        <table style="width: 100%;" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>
                        <div style="background: #07395C; padding: 15px;">
                            <img src="https://www.acma.in/acma-ec-election-2022-23/images/logo.png" width="250" alt="Acma Logo">
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div style="background: #f5f5f5; padding: 30px; text-align: center;">
                            <table>
                                <tr>
                                    <td><h2 style="padding: 0; margin: 0;">Please reset your password</h2></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 15px;">Hello, We have sent you this email in response to your request to reset your password.</td>
                                </tr>
                                <tr>
                                    <td><a style="text-decoration: none; background:#07395c; color: #fff; padding: 10px 25px; display: inline-block; margin-top: 20px; transition: all 0.3s ease;" href="https://acma.in/password-reset.php?otp=<?php echo $_SESSION['password_reset']['otp']?>&email=<?php echo $_SESSION['password_reset']['email']?>">Reset Password</a></td>
                                </tr>
                                <tr>
                                    <td><p style="color: #999; padding: 0; margin: 0; padding-top: 15px;"><small><i>Please ignore this email if you did not request a password change.</i></small></p></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <div style="background: #07395C; padding: 10px; text-align: center;">
                            <p style="color: #fff;">© Copyright <script>document.write(new Date().getFullYear())</script> ACMA India, All Right Reserved.</p>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>