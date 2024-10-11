<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medication Alert Form</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet medicine alarm set page.css') }}">
</head>
<header>
    <h1>Medication Alarm</h1>
</header>

<body>
    <div class="container">
        <form id="medicationForm">
            <div class="form-group">
                <label for="medType"> Medication Type:</label>
                <select id="medType" name="medType">
                    <option value="pills">Pills</option>
                    <option value="syrup">Syrup</option>
                    <option value="ointment">Ointment</option>
                    <option value="injections">Injections</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="medName">Medicine Name:</label>
                <input type="text" id="medName" name="medName" required>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate" name="endDate" required>
            </div>
            <div class="form-group">
                <label for="alarmTime">Time of Alarm:</label>
                <input type="time" id="alarmTime" name="alarmTime" required>
            </div>
            <div class="form-group">
                <label for="alarmFrequency">Alarm Frequency:</label><br>
                <input type="radio" id="daily" name="alarmFrequency" value="daily" checked>
                <label for="daily">Daily</label>
                <input type="radio" id="weekly" name="alarmFrequency" value="weekly">
                <label for="weekly">Weekly</label>
            </div>
            <div class="form-group1">
                <button1 type="Save"><a href="medicine alarm saved history page.html" class="form-group1">Save</a>
                </button1>
            </div>
        </form>
    </div>
    <div>
        <p>Bringing the future of healthcare</p>
    </div>
    <div class="Image">
        <img src="C:\Users\IT Solution\Downloads\OIP__7_-removebg-preview.png" alt="Description of the image">
    </div>
    <footer>
        <div class="footer-container">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p6>At Epilepsy CareGiver Website, our mission is to provide caregivers and families with reliable
                    information, practical tools, and emotional support to help them care for loved ones with epilepsy.
                    We are dedicated to empowering caregivers with resources that enhance understanding, improve quality
                    of care, and foster a supportive community.Contact us to learn more or get involved.</p6>

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