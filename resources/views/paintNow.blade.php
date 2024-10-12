<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paint Now</title>
    <link rel="stylesheet" href="{{ asset('css/ra4 paint now.css') }}">
</head>

<body>

    <header>
        <h1>Paint Now</h1>
        <nav>
            <ul>
                <li><a href="index.html"><a href="home final.html">Home</a></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Create Your Art</h2>
        <div id="paint-tools">
            <label for="color-picker">Color:</label>
            <input type="color" id="color-picker" value="#000000">

            <label for="brush-size">Brush Size:</label>
            <input type="range" id="brush-size" min="1" max="50" value="5">

            <button id="clear-canvas">Clear Canvas</button>
            <button id="save-painting">Save Painting</button>
        </div>
        <canvas id="paint-canvas"></canvas>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>At Epilepsy CareGiver Website, our mission is to provide caregivers and families with reliable
                    information, practical tools, and emotional support to help them care for loved ones with epilepsy.
                    We are dedicated to empowering caregivers with resources that enhance understanding, improve quality
                    of care, and foster a supportive community.</p>

                <p><a href="#contact">Contact us</a> to learn more or get involved.</p>
            </div>

            <div class="footer-section links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#Home"><a href="home final.html">Home</a></a></li>
                    <li><a href="#Services"><a href="home final.html">Our Services</a></a></li>
                    <li><a href="#About us"><a href="home final.html">About us</a></a></li>
                    <li><a href="#Stories"><a href="home final.html">Stories</a></a></li>
                    <li><a href="#Doctors"><a href="dr profile.html">Doctors</a></a></li>
                    <li><a href="#Privacy Policies"><a href="privacy policy.html" class="privacy policy">Privacy
                                Policies</a></a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h2>Contact Us</h2>
                <p>Email: info.EpilepsyCareGiver.com</p>
                <p>Phone: +92 333 8926521</p>
                <p>Address: 123 Main Street, Sialkot, Pakistan</p>
            </div>
            <div class="footer-section services">
                <h2>Our Services</h2>
                <ul>
                    <li><a href="#Educational Resources"><a href="educatinal resources.html">Educational
                                Resources</a></a></li>
                    <li><a href="#Relaxation Art"><a href="relaxation art home page.html">Relaxation Art</a></li>
                    <li><a href="#Breathing Exercises"><a href="breathing exercises.html">Breathing Exercises</a></a>
                    </li>
                    <li><a href="#Seizure Record"><a href="seizure record form.html">Seizure Record</a></a></li>
                    <li><a href="#Self Diagnosis"><a href="sd.html">Self Diagnosis</a></a></li>
                    <li><a href="#Care Alerts"><a href="home final.html">Care Alerts</a></a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 Your Website Name. All rights reserved.</p>
        </div>
    </footer>
    <a href="#" class="back-to-top">↑</a>
    <!-- about section ends -->

    <script src="{{ asset('imgs/ra4 paint now.js') }}"></script>
    <script>
        document.getElementById('save-painting').addEventListener('click', function() {
            const canvas = document.getElementById('paint-canvas');
            const dataURL = canvas.toDataURL('image/png'); // Convert the canvas to a data URL (base64 encoded image)
            
            fetch('/save-painting', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF protection
                },
                body: JSON.stringify({ image: dataURL })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.success);
                } else {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while saving your painting.');
            });
        });
    </script>
</body>

</html>