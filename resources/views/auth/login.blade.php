<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* Pengaturan dasar untuk seluruh halaman */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container utama untuk form login */
        .login-container {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            text-align: center;
        }

        /* Judul form */
        .login-form h2 {
            color: #333;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        /* Styling pesan error */
        .error-message {
            background-color: #ffebeb;
            color: #cc0000;
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
            border: 1px solid #ffcccc;
            font-size: 0.9rem;
        }

        /* Grup input dengan label yang mengambang */
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 1rem 0.75rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            background: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
            outline: none;
            box-sizing: border-box;
        }

        .input-group input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
        }

        .input-group label {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        /* Efek label saat input diisi atau fokus */
        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: 0;
            transform: translateY(-50%);
            font-size: 0.75rem;
            color: #007bff;
            background-color: #fff;
            padding: 0 4px;
        }

        /* Tombol login */
        .login-button {
            width: 100%;
            padding: 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .login-button:active {
            transform: scale(0.99);
        }

        /* Link pendaftaran */
        .register-link {
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #555;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="{{ route('login.post') }}" method="POST">
            @csrf
            <h2>Login</h2>
            
            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="input-group">
                <input type="email" id="email" name="email" placeholder=" " value="{{ old('email') }}" required>
                <label for="email">Email</label>
            </div>
            
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder=" " required>
                <label for="password">Password</label>
            </div>
            
            <button type="submit" class="login-button">Login</button>
            <p class="register-link">Belum punya akun? <a href="#">Daftar di sini</a></p>
        </form>
    </div>
</body>
</html>