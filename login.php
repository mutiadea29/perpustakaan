<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 30px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
        }

        /* INPUT & BUTTON BIAR SEJAJAR */
        .login-box input,
        .login-box button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-box input {
            border: 1px solid #ccc;
        }

        .login-box button {
            background: #4facfe;
            border: 1px solid #4facfe;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .login-box button:hover {
            background: #007bff;
        }

        .login-box p {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <form method="POST" action="proses_login.php">
        <input type="text" name="username" placeholder="Username" required>
        
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <p>© Sistem Perpustakaan</p>
</div>

</body>
</html>