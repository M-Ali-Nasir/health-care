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
    <div class="container" style="position: relative; display:flex; justify-content:between">
        <form id="medicationForm" class="postition:relative" action="{{ route('medicines-store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="medType"> Medication Type:</label>
                <select id="medType" name="medication_type" required>
                    <option value="Pills">Pills</option>
                    <option value="Syrup">Syrup</option>
                    <option value="Ointment">Ointment</option>
                    <option value="Injections">Injections</option>
                    <option value="Other">Other</option>
                </select>
                @error('medication_type')
                {{ $message }}

                @enderror
            </div>
            <div class="form-group">
                <label for="medName">Medicine Name:</label>
                <input type="text" id="medName" name="medicine_name">
                @error('medicine_name')
                {{ $message }}

                @enderror
            </div>
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="start_date" required>
                @error('start_date')
                {{ $message }}

                @enderror
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate" name="end_date" required>
                @error('end_date')
                {{ $message }}

                @enderror
            </div>
            <div class="form-group">
                <label for="alarmTime">Time of Alarm:</label>
                <input type="time" id="alarmTime" name="alarm_time" required>
                @error('alarm_time')
                {{ $message }}

                @enderror
            </div>
            <div class="form-group">
                <label for="alarmFrequency">Alarm Frequency:</label><br>
                <input type="radio" id="daily" name="alarm_frequency" value="daily" checked>
                <label for="daily">Daily</label>
                <input type="radio" id="weekly" name="alarm_frequency" value="weekly">
                <label for="weekly">Weekly</label>
                @error('alarm_frequency')
                {{ $message }}

                @enderror
            </div>
            <div class="form-group1">
                <button type="submit">Save
                </button>
            </div>
        </form>

        <div>
            <p>Bringing the future of healthcare</p>
        </div>
        <div class="Image">
            <img style="position: relative" src="{{ asset('imgs/OIP__7_-removebg-preview (2).png') }}"
                alt="Description of the image">
        </div>
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