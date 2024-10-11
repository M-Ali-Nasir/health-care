<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/user profile.css') }}">
</head>

<body>
    <div class="container">
        <h1>User Profile</h1>
        <div class="profile-image">
            <img id="userImage" src="default-avatar.png" alt="Select Image" />
            <input type="file" id="imageInput" accept="image/*" onchange="previewImage(event)" />
        </div>
        <p><strong>Username:</strong> <span id="username">JohnDavid</span></p>
        <p><strong>Email:</strong> <span id="email">john@example.com</span></p>

        <button onclick="changePassword()">Change Password</button>
        <button onclick="logout()">Log Out</button>
    </div>

    <script>
        function previewImage(event) {
            const image = document.getElementById('userImage');
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function changePassword() {
            const newPassword = prompt("Enter your new password:");
            // Here, you would typically send a request to the server to change the password
            alert("Password changed successfully!");
        }

        function logout() {
            // Send a request to the server to log out
            window.location.href = '/logout'; // Adjust based on your server configuration
        }
    </script>
</body>

</html>