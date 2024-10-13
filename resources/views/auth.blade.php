<!DOCTYPE html>
<html>

<head>
    <title>Login-SignUp</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login sign up page.css') }}">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label1 for="chk" aria-hidden="true"> Sign Up</label1>
                <p> Welcome! Sign Up to continue access...!</p>
                <input type="text" name="name" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <p>Welcome!</p>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <p>Forgot Password?</p>
                <p>Don't have an account? <label for="chk" style="font-size: 15px; margin:0;">Sign Up</label></p>
                <button type="submit">Login</button>

            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}"
            });
        @endif
    
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}"
            });
        @endif
    
        @if (session('info'))
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: "{{ session('info') }}"
            });
        @endif
    
        @if (session('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: "{{ session('warning') }}"
            });
        @endif
    </script>

</body>

</html>