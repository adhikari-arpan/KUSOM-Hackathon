document.addEventListener('DOMContentLoaded', () => {
    const emojis = document.querySelectorAll('.emoji');
    const feedback = document.getElementById('feedback');

    emojis.forEach(emoji => {
        emoji.addEventListener('click', () => {
            emojis.forEach(e => e.classList.remove('selected'));
            emoji.classList.add('selected');
            const rating = emoji.getAttribute('data-rating');
            updateFeedback(rating);
        });
    });

    function updateFeedback(rating) {
        switch (rating) {
            case '1':
                feedback.textContent = "We're sorry to hear that! 😠";
                break;
            case '2':
                feedback.textContent = "We'll try to improve. 😕";
                break;
            case '3':
                feedback.textContent = "Thanks for your feedback. 😐";
                break;
            case '4':
                feedback.textContent = "Glad you liked it! 😊";
                break;
            case '5':
                feedback.textContent = "We're thrilled you loved it! 😍";
                break;
            default:
                feedback.textContent = "Please select a rating";
        }
    }
})