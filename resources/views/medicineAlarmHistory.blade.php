@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alarm History</title>
    <link rel="stylesheet" href="{{ asset('css/style medicine alarm saved history page.css') }}">
</head>

<body>
    <header>
        <h1>Alarm History</h1>
    </header>
    <main>
        <section class="alarm-history">
            <h2>Saved Alarms</h2>
            <table>
                <thead>
                    <tr>
                        <th>Starting Date</th>
                        <th>Ending Date</th>
                        <th>Alarm Frequency</th>
                        <th>Time</th>
                        <th>Medicine Type</th>
                        <th>Medicine Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($medicines)
                    @foreach ($medicines as $medicine)

                    <tr>
                        <td>{{ Carbon::parse($medicine->start_date)->format('d-m-Y') }}</td>
                        <td>{{ Carbon::parse($medicine->end_date)->format('d-m-Y') }}</td>
                        <td>{{ $medicine->alarm_frequency }}</td>
                        <td>{{ Carbon::parse($medicine->alarm_time)->format('h:i A') }}</td>
                        <td>{{ $medicine->medication_type }}</td>
                        <td>{{ $medicine->medicine_name }}</td>
                    </tr>

                    @endforeach
                    @endif
                </tbody>
            </table>
        </section>
        <section class="add-alarm">
            <a href="{{ route('medicine-alarm-set') }}" class="add-alarm" style="padding: 5px ;text-decoration:none">Add
                New Alarm</a>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function checkForAlarms() {
        console.log('hello');
        
        fetch('/check-alarm')
            .then(response => response.json())
            .then(data => {
                if (data.alarm) {
                    // Play alarm sound
                    const audio = new Audio('{{ asset('alarm/alarm.mp3') }}');
                    audio.play();
                    // Show notification
                    Swal.fire({
                        title: 'Alarm!',
                        text: data.message,
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Stop the alarm when the alert is closed
                        audio.pause();
                        audio.currentTime = 0; // Reset audio to the beginning
                    });
                }
            })
            .catch(error => console.error('Error checking for alarms:', error));
    }

    // Run the function every minute
    setInterval(checkForAlarms, 60000);
    </script>
</body>

</html>