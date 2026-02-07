
   document.addEventListener('DOMContentLoaded', () => {
        const passwordInput = document.getElementById('password');
        const meterContainer = document.getElementById('password-meter-container'); // Grab the container
        const meter = document.getElementById('password-meter');
        const text = document.getElementById('password-text');

        const labels = ['Very Weak', 'Weak', 'Fair', 'Strong', 'Very Strong'];
        const colors = ['red', 'orange', 'gold', 'lightgreen', 'green'];

        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;

            if (val.length > 0) {
                // Show the bar if there is text
                meterContainer.style.display = 'block';

                const result = window.zxcvbn(val);
                meter.value = result.score;
                text.innerText = "Strength: " + labels[result.score];
                text.style.color = colors[result.score];
            } else {
                // Hide the bar if the input is empty
                meterContainer.style.display = 'none';
            }
        });
    });