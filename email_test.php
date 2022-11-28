
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
<body style="width: 600px; max-width: 100%;">
    <div style="max-width: 1199px; margin:auto; padding: 15px; background-color: #07395c;">
        <table style="width: 100%;" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th style="color:white;">
                        <img src="https://www.acma.in/acma-ec-election-2022-23/images/logo.png" style="max-width: 100%;" alt="ACMA Logo">
                        <h1 class="text-white">PASSWORD RESET</h1>
                        <a href="https://acma.in/password-reset.php?otp=<?php echo $_SESSION['password_reset']['otp']?>&email=<?php echo $_SESSION['password_reset']['email']?>" style="background:#07395c">Click Here</a>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</body>
</html>