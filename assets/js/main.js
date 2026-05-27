document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('feedback-popup');
    const openButtons = document.querySelectorAll('.js-open-feedback');
    const closeButtons = document.querySelectorAll('.js-close-feedback');

    if (!popup) {
        return;
    }

    function openPopup(event) {
        event.preventDefault();

        popup.classList.add('is-active');
        document.body.classList.add('popup-open');
    }

    function closePopup() {
        popup.classList.remove('is-active');
        document.body.classList.remove('popup-open');
    }

    openButtons.forEach(function (button) {
        button.addEventListener('click', openPopup);
    });

    closeButtons.forEach(function (button) {
        button.addEventListener('click', closePopup);
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closePopup();
        }
    });
});