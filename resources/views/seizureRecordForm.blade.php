<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seizure Record Form</title>
    <link rel="stylesheet" href="{{ asset('css/seizure record form.css') }}">
</head>

<body>
    <header>
        <h1>Seizure Record</h1>
    </header>

    <main>
        <div class="container" style="position:relative; margin-top:60px;">
            <section id="seizure-form">
                <h2>Record Your Seizure Details</h2>
                <form id="record-form" action="{{ route('store-seizure-record') }}" method="post">
                    @csrf
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>

                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" required>

                    <label for="duration">Duration (in minutes):</label>
                    <input type="number" id="duration" name="duration" min="1" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>




                    <button type="submit" style="height: 30px; font-size:20px; cursor: pointer;">Submit</button>
                </form>
            </section>

            <section class="image-content">
                <img src="https://thumbs.dreamstime.com/b/young-couple-first-aid-concept-home-young-couple-first-aid-concept-home-171199522.jpg"
                    alt="Caregiver with Patient">

            </section>


        </div>
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

    <script src="srf.js"></script>



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