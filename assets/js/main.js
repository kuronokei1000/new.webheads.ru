/* обратная связь в попапе */
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

/* обработка формы */
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.feedback-form:not(.admin-form)');

    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const button = form.querySelector('button[type="submit"]');
            const formData = new FormData(form);

            if (button) {
                button.disabled = true;
                button.textContent = 'Отправка...';
            }

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (result) {
                    if (result.success) {
                        form.innerHTML = `
                            <div class="form-success">
                                <h3>Спасибо!</h3>
                                <p>${result.message}</p>
                            </div>
                        `;
                    } else {
                        showFormError(form, result.message);

                        if (button) {
                            button.disabled = false;
                            button.textContent = 'Отправить заявку';
                        }
                    }
                })
                .catch(function () {
                    showFormError(form, 'Ошибка отправки заявки');

                    if (button) {
                        button.disabled = false;
                        button.textContent = 'Отправить заявку';
                    }
                });
        });
    });

    function showFormError(form, message) {
        let error = form.querySelector('.form-error');

        if (!error) {
            error = document.createElement('div');
            error.className = 'form-error';
            form.prepend(error);
        }

        error.textContent = message;
    }
});