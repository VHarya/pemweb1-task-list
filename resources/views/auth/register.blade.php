<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - SOLIDTASK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        h1 { text-align: center; }
        h2 { text-align: center; }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 60%;
            padding: 2rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: .8rem;
            color: var(--text-alt-color);
            background-color: #333333;
        }

        form {
            margin-top: 1rem;
            margin-bottom: 0rem;
            display: flex;
            flex-direction: column;
        }
        .input-container {
            margin-bottom: .5rem;
            display: flex;
            flex-direction: column;
        }
        .input-container > label {
            margin-bottom: .2rem;
        }
        .input-container > input {
            background-color: var(--background-alt-color);
        }
        .submit-button {
            margin-top: 1rem;
        }

        .login-container {
            margin-top: 1rem;
        }
        .login-container > a {
            color: #60a5fa;
        }
        .error-message {
            font-size: .8rem;
            color: var(--error-color);
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>TASKLIST</h1>
        <h2>Create a new account</h2>
        <form action="/register" method="post">
            @csrf
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" name="username" @error('username') style="border: 1px solid var(--error-color)" @enderror>
                @error('username')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email" @error('email') style="border: 1px solid var(--error-color)" @enderror>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" name="password" @error('password') style="border: 1px solid var(--error-color)" @enderror>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-container">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" @error('confirm-password') style="border: 1px solid var(--error-color)" @enderror>
                @error('confirm-password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="submit-button">Register</button>
        </form>
        <div class="login-container">
            <span>Already have an account?</span>
            <a href="{{ route('login') }}">Login to your account</a>
        </div>
    </div>
</body>
</html>