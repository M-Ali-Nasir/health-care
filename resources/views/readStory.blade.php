<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Alert History</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet read stories page.css') }}">
</head>

<body>
    <header>
        <h1>View Stories</h1>
    </header>
    <main>
        <section id="story-container">
            @if ($stories)
            @php
            $sr=0;
            @endphp
            @foreach ($stories as $story)
            @php
            $sr++;
            @endphp
            <h4 style="margin: 0">{{ $sr }}: {{ $story->title }}</h4>
            <p>By {{ $story->user->name }}</p>
            <p>{{ $story->story }}</p>
            @endforeach
            @endif
        </section>
        <section class="add-story">
            <a href="{{ route('write-story') }}" class="add-story">Add Your Story</a>
        </section>
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
    <script src="home final.js"></script>
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