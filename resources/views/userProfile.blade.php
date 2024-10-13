@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/user profile.css') }}">




</head>

<body>
    <div class="main-box">


        <div class="container">
            <h1>User Profile</h1>
            <div class="profile-image">
                <img id="userImage" src="default-avatar.png" alt="Select Image" />
                <input type="file" id="imageInput" accept="image/*" onchange="previewImage(event)" />
            </div>

            <p><strong>Username:</strong> <span id="username">{{ $user->name }}</span></p>
            <p><strong>Email:</strong> <span id="email">{{ $user->email }}</span></p>

            <button onclick="changePassword()">Change Password</button>
            <button><a href="{{ route('logout') }}" style="color:white; text-decoration:none;">Logout</a></button>
        </div>

        <main style="background-color: white; padding: 10px 50px; width:100%;">
            <header>
                <h1>My Stories</h1>
            </header>
            <section id="story-container">
                @if ($user->story)
                @php
                $sr=0;
                @endphp
                @foreach ($user->story as $story)
                @php
                $sr++;
                @endphp
                <h4 style="margin: 0">{{ $sr }}: {{ $story->title }} &nbsp;&nbsp;&nbsp;
                    <a href="{{ route('delete-story',['id'=> $story->id]) }}" style="color: red;">Delete</a>
                </h4>
                <p>By {{ $story->user->name }}</p>
                <p>{{ $story->story }}</p>
                @endforeach
                @endif
            </section>
            <section class=" add-story">
                <a href="{{ route('write-story') }}" class="add-story" style="color:black;">Add Your Story</a>
            </section>


            {{-- Seizure Record --}}

            <section id="history">
                <header>
                    <h1>My Seizure Records</h1>
                </header>
                <div id="record-list" class="text-center">
                    <table class="table">
                        <thead>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if ($user->seizureRecord)
                            @foreach ($user->seizureRecord as $record)

                            <tr>
                                <td>{{ $record->date }}</td>
                                <td>{{ Carbon::parse($record->time)->format('h:i A') }}</td>
                                <td>{{ $record->duration }} days</td>
                                <td>{{ $record->description }}</td>
                                <td>
                                    <a href="{{ route('delete-seizure-record',['id'=> $record->id]) }}"
                                        style="color: red;">Delete</a>
                                </td>
                            </tr>


                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
                <section class="add-story">
                    <a href="{{ route('seizure-record-form') }}" style="color:black">Add
                        New
                        Record</a>
                </section>
            </section>


            {{-- medicine alaram --}}

            <section class="alarm-history">
                <header>
                    <h1>My Medicine Alarms</h1>
                </header>
                <table>
                    <thead>
                        <tr>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Alarm Frequency</th>
                            <th>Time</th>
                            <th>Medicine Type</th>
                            <th>Medicine Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($user->medicine)
                        @foreach ($user->medicine as $medicine)

                        <tr>
                            <td>{{ Carbon::parse($medicine->start_date)->format('d-m-Y') }}</td>
                            <td>{{ Carbon::parse($medicine->end_date)->format('d-m-Y') }}</td>
                            <td>{{ $medicine->alarm_frequency }}</td>
                            <td>{{ Carbon::parse($medicine->alarm_time)->format('h:i A') }}</td>
                            <td>{{ $medicine->medication_type }}</td>
                            <td>{{ $medicine->medicine_name }}</td>
                            <td>
                                <a href="{{ route('delete-medicine',['id'=> $medicine->id]) }}"
                                    style="color: red;">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                        @endif
                    </tbody>
                </table>

                <section class="add-alarm">
                    <a href="{{ route('medicine-alarm-set') }}" class="add-alarm" style="color:black">Add
                        New Alarm</a>

                </section>
            </section>


            {{-- appointment alarm --}}

            <section class="alarm-history">
                <header>
                    <h1>My Appointment Alerts</h1>
                </header>
                <table>
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Doctor Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($user->appointment)
                        @foreach ($user->appointment as $appointment)

                        <tr>
                            <td>{{ Carbon::parse($appointment->appointment_date)->format('Y') }}</td>
                            <td>{{ Carbon::parse($appointment->appointment_date)->format('F') }}</td>
                            <td>{{ Carbon::parse($appointment->appointment_date)->format('d') }}</td>
                            <td>{{ Carbon::parse($appointment->appointment_date)->format('h:i A') }}</td>
                            <td>{{ $appointment->doctor_name }}</td>
                            <td>
                                <a href="{{ route('delete-appointment',['id'=> $appointment->id]) }}"
                                    style="color: red;">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                        @endif


                    </tbody>
                </table>
                <section class="add-alarm1">
                    <a href="{{ route('appointment-alert-set') }}" class="add-alarm" style="color:black"> Add New
                        Alert</a>

                </section>
            </section>


            <section class="alarm-history">
                <header>
                    <h1>My saved Paintings</h1>
                </header>

                <div>
                    @if ($user->painting)
                    @foreach ($user->painting as $painting)


                    <img src="{{ asset($painting->image_path) }}" alt="{{ $painting->image_path }}"
                        style="border: 1px solid black" width="200px" height="200px">

                    @endforeach
                    @endif
                </div>

            </section>




        </main>

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