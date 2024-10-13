document.addEventListener('DOMContentLoaded', function() {
    const questions = [
        "Have you ever experienced sudden, unexplained episodes of staring or blanking out?",
        "Do you sometimes feel strange smells, tastes, or sensations without any external stimuli?",
        "Have you ever had muscle spasms or sudden jerking movements without control?",
        "Do you sometimes feel confused or have trouble speaking during episodes?",
        "Have you ever lost consciousness or awareness without warning?",
        "Do you experience repetitive movements, such as chewing or hand rubbing, during episodes?",
        "Have others noticed any unusual behavior or movements during your episodes?",
        "Do you sometimes feel extreme fear or anxiety before or during episodes?",
        "Have you ever experienced headaches or unusual sensations after episodes?",
        "Do you often feel tired or exhausted after episodes?",
        "Have you ever bitten your tongue or cheeks during episodes?",
        "Do you sometimes have memory problems or difficulty recalling what happened during episodes?",
        "Have you ever experienced tingling or numbness in parts of your body during episodes?",
        "Do your episodes happen suddenly and without warning?",
        "Have you ever had more than one episode of these symptoms?"
    ];

    const form = document.getElementById('diagnosis-form');
    const questionContainer = document.getElementById('question-container');
    const resultDiv = document.getElementById('diagnosis-result');

    // Generate the form questions dynamically
    questions.forEach((question, index) => {
        const qNum = index + 1;
        const questionBlock = `
            <label for="q${qNum}">${qNum}. ${question}</label>
            <div class="radio-options">
                <input type="radio" id="q${qNum}_yes" name="q${qNum}" value="yes" required>
                <label for="q${qNum}_yes">Yes</label>
                <input type="radio" id="q${qNum}_no" name="q${qNum}" value="no">
                <label for="q${qNum}_no">No</label>
            </div>
        `;
        questionContainer.innerHTML += questionBlock;
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        let score = 0;
        const totalQuestions = questions.length;
        
        // Calculate the score based on answers
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.querySelector(`input[name="q${i}"]:checked`);
            if (question && question.value === 'yes') {
                score++;
            }
        }
        
        // Calculate the percentage
        const percentage = (score / totalQuestions) * 100;
        
        // Display the result
        resultDiv.innerHTML = `
            <p>Your self-diagnosis score is: ${percentage.toFixed(2)}%</p>
            <p>We recommend that you consult with a healthcare professional for a proper diagnosis and further evaluation.</p>
        `;
    });
});
