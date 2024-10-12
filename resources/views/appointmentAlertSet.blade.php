<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medication Alert Form</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet appointment alert set.css') }}">
</head>
<header>
    <h1>Appointment Alert</h1>
</header>

<body>
    <div class="container">
        <form id="appointmentForm" action="{{ route('appointments-store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="medName">Doctor Name:</label>
                <input type="text" id="medName" name="doctor_name" required>
                @error('doctor_name')
                <p>{{ $error }}</p>

                @enderror
            </div>
            <div class="form-group">
                <label for="startDate">Appointment Date:</label>
                <input type="date" id="startDate" name="appointment_date" required>
                @error('startDate')
                <p>{{ $error }}</p>

                @enderror
            </div>
            <div class="form-group">
                <label for="alarmTime">Time of Appointment:</label>
                <input type="time" id="alarmTime" name="appointment_time" required>
                @error('appointment_time')
                <p>{{ $error }}</p>

                @enderror
            </div>
            <div class="form-group1">
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
    <div>
        <p>Medicine cure diseases but only doctors can cure patients</p>
    </div>
    <div class="Image">
        <img src="https://epilepsyspace.org.uk/wp-content/uploads/2020/02/scan-results.jpg"
            alt="Description of the image">
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>At Epilepsy CareGiver Website, our mission is to provide caregivers and families with emotional
                    support to help them care for loved ones with epilepsy. We are dedicated to empowering caregivers
                    with resources that enhance understanding and foster a supportive community.Contact us to learn more
                    or get involved.</p>


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
                <p1>Email: info.EpilepsyCareGiver.com</p1>
                <p1>Phone: +92 333 8926521</p1>
                <p1>Address: 123 Main Street, Sialkot, Pakistan</p1>
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
            <p3>&copy; 2024 Your Website Name. All rights reserved.</p3>
        </div>
    </footer>
    <a href="#" class="back-to-top">↑</a>
    <!-- about section ends -->
    <script src="home final.js"></script>
</body>

</html>