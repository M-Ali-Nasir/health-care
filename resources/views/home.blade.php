<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>epilepsy caregiver website</title>
    <!-- Font awesome sdn link -->
    <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- custom css file link -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>

    <!-- header section starts -->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="{{ asset('imgs/Capture.PNG') }}" alt="">
            </div>
            <nav>
                <ul>
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#services">Our Services</a></li>
                    <li><a href="{{ route('faqs') }}">FAQS</a></li>
                    <li><a href="#about">about us </a></li>


                    <div class="stories">
                        <li><a>Stories</a></li>
                        <div class="dropdown">
                            <a href="{{ route('read-story') }}">Read Stories</a>
                            <a href="{{ route('write-story') }}">write Stories</a>
                        </div>
                    </div>
                    <li><a href="{{ route('dr-profile') }}">Doctors</a></li>
                    <li><a href="{{ route('privacy-policy') }}" class="privacy policy">privacy
                            Policies</a></a></li>
                </ul>
            </nav>
            <div class="login">

                @if (Auth::user() && Auth::user()->role == 'user')
                <a href="{{ route('user-profile') }}" style="margin:0 5px 0 5px;">Profile</a>
                <a href="{{ route('logout') }}" style="margin:0 5px 0 5px;">Logout</a>
                @else
                <button><a href="{{ route('auth') }}">Login</a></button>
                @endif
            </div>
    </header>
    <!-- header section ends -->

    <!-- home sectiomn starts -->
    <section class="image-section">
        <img src="https://th.bing.com/th/id/OIP.eh6gO-vwOygN4y8oCS83XwHaDk?rs=1&pid=ImgDetMain">
        <div class="text-overlay">
            <h2> "A voice to support the patients with epilepsy"</h2>
            <p>Providing guidance and practical tools to support people living with epilepsy and caregiving them. </p>
        </div>
    </section>




    <!-- home section ends -->
    <!-- icon sections starts -->
    <section class="icons-container">
        <div class="icons">
            <h3>50 Million</h3>
            <p>Living with epilepsy worldwide</p>
        </div>
        <div class="icons">
            <h3>75%</h3>
            <p>Living a sezure free life</p>
        </div>
        <div class="icons">
            <h3>125,000 </h3>
            <p>Death rate of people each year</p>
        </div>
        <div class="icons">
            <h3>4.70 Billion</h3>
            <p>Expected ratio of epilepsy by 2030</p>
        </div>
    </section>
    <!-- icons section ends -->
    <!-- services section starts -->
    <section class="services" id="services">
        <h1 class="heading"> Our <span>Services </span></h1>
        <div class="box-container">
            <div class="box">
                <span class="iconify" data-icon="wpf:books" data-inline="false"></span>
                <h3>Educational Resources</h3>
                <p>Explore our educational resources.Access valuable information and Empower yourself with knowledge.
                </p>
                <button id="myButton"><a href="{{ route('educational-resources') }}">Access Educational
                        Resources</a></button>



            </div>
            <div class="box">
                <span class="iconify" data-icon="pepicons-pop:paint-pallet" data-inline="false"></span>

                <h3>Relaxation Art</h3>
                <p>Relax with our painting sessions.Find peace in every brushstroke. Let your creativity flow.
                </p>
                <button id="myButton"><a href="{{ route('relaxation-art') }}"> Relaxation Art</a></button>


            </div>
            <div class="box">
                <span class="iconify" data-icon="healthicons:exercise-yoga" data-inline="false"></span>

                <h3>Breathing Exercises</h3>
                <p>Experience the power of mindful breathing. Take a moment to inhale deeply, hold, and exhale slow."
                </p>
                <button id="myButton"><a href="{{ route('breathing-exercise') }}"> Start Breathing
                        Exercises</a></button>
            </div>
            <div class="box">
                <span class="iconify" data-icon="clarity:note-edit-line" data-inline="false"></span>

                <h3>Seizure Record</h3>
                <p>Keep track of seizures effortlessly. Record and manage your seizure history. Stay informed about your
                    health.
                </p>
                <button id="myButton"><a href="{{ route('seizure-record-history') }}">Add Seizure Record</a></button>
            </div>
            <div class="box">
                <span class="iconify" data-icon="fa-solid:diagnoses" data-inline="false"></span>

                <h3> Self Diagnosis</h3>
                <p>Empower yourself with Self Diagnosis for epilepsy. Track your symptoms and manage your condition</p>
                <button id="myButton"><a href="{{ route('self-diagnosis') }}">Self Diagnosis</a></button>
            </div>
            <div class="box">
                <span class="iconify" data-icon="vaadin:alarm" data-inline="false"></span>

                <h3>Care Alerts</h3>
                <p>Never miss a dose with Care Alerts for medicine.Receive timely reminders and Stay on top of your
                    medication schedule.
                </p>
                <div class="Alerts">
                    <button id="myButton">Set Care Alerts</button>
                    <div class="dropdown">
                        <a href="{{ route('appointment-alert-history')}}">Appointment Alert</a>
                        <a href="{{ route('medicine-alarm-history') }}">Medicine Alert</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- services section ends -->
    <!-- about section starts -->
    <section class="about" id="about">
        <h1 class="heading"> <span>about</span> us</h1>
        <div class="row">
            <div class="image">
                <img src="https://images.rawpixel.com/image_social_square/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvay1zNDYtYWtlLTM5NTEuanBn.jpg?s=KYsF-3VzmH0XEJs6YkTH0JhBF9KzB0ise0D6UY_GUuk"
                    alt="">
            </div>
            <div class="content">
                <h3>Supporting You Every Step of the Way</h3>
                <p>Throuh this (Epilepsy CareGiver) Website, our mission is to provide comprehensive support to
                    individuals living with epilepsy and their caregivers. We are dedicated to enhancing the quality of
                    life for both patients.</p>

                <p>Giving you the tools and guidance to manage epilepsy and caregiving through the features such as
                    Educational resources, Stress management tools, Care alerts, specialist doctors, self diagnosis,
                    seizure record .</p>
                <a href="#" class="btn">learn more</a> <span class="iconify" data-icon="ep:d-arrow-rught"
                    data-inline="false"></span>

            </div>
        </div>
    </section>
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
                    <li><a href="#Services"><a href="#services">Our Services</a></a></li>
                    <li><a href="#About us"><a href="#about">About us</a></a></li>
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
                    <li><a href="#Care Alerts"><a href="#services">Care Alerts</a></a></li>
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


    {{-- npm install --save laravel-echo pusher-js --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function checkForAlarms() {
            console.log('Checking for alarms...');
            
            fetch('/check-alarm')
                .then(response => response.json())
                .then(data => {
                    if (data.alarm) {
                      
                        const audio = new Audio('{{ asset('alarm/alarm.mp3') }}');
                        audio.play();
                      
                        Swal.fire({
                            title: 'Alarm!',
                            text: data.message,
                            icon: 'warning',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false, 
                        }).then(() => {
                            
                            audio.pause();
                            audio.currentTime = 0; 
                        });
                    }
                })
                .catch(error => console.error('Error checking for alarms:', error));
        }
    
        checkForAlarms();
        
        setInterval(checkForAlarms, 60000);
    </script>

</body>

</html>