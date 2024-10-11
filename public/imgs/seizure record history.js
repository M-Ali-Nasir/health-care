document.addEventListener("DOMContentLoaded", function() {
    const recordList = document.getElementById("record-list");
    const addNewButton = document.getElementById("add-new");
    const ctx = document.getElementById("record-chart").getContext("2d");

    // Dummy records for initial display
    const dummyRecords = [
        { date: "2024-09-01", time: "08:30", duration: 15, description: "Felt light-headed before the episode." },
        { date: "2024-08-28", time: "14:45", duration: 20, description: "Occurred after a stressful meeting." },
        { date: "2024-07-15", time: "09:00", duration: 10, description: "No specific trigger identified." }
    ];

    function loadRecords() {
        // Retrieve records from localStorage or use dummy data
        let records = JSON.parse(localStorage.getItem("records")) || dummyRecords;

        // Display records
        if (records.length === 0) {
            recordList.innerHTML = '<p>No records found.</p>';
        } else {
            recordList.innerHTML = ''; // Clear previous content if any
            records.forEach((record, index) => {
                const recordElement = document.createElement('div');
                recordElement.className = 'history-item';
                recordElement.innerHTML = `
                    <strong>Record ${index + 1}</strong>
                    <p><strong>Date:</strong> ${record.date}</p>
                    <p><strong>Time:</strong> ${record.time}</p>
                    <p><strong>Duration:</strong> ${record.duration} minutes</p>
                    <p><strong>Description:</strong> ${record.description}</p>
                `;
                recordList.appendChild(recordElement);
            });

            // Update the chart with the records
            updateChart(records);
        }
    }

    function updateChart(records) {
        const labels = records.map(record => `${record.date} ${record.time}`);
        const data = records.map(record => record.duration);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Seizure Duration (minutes)',
                    data: data,
                    backgroundColor: 'rgba(90, 10, 150, 0.2)',
                    borderColor: 'rgba(90, 10, 150, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date and Time'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Duration (minutes)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    }

    loadRecords();

    addNewButton.addEventListener("click", function() {
        window.location.href = "index.html";
    });
});
