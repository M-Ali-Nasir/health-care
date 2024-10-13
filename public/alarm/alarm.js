
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