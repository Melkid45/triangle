import './bootstrap';


// В файле app.js или отдельном скрипте
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const responseElement = document.getElementById('response');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Показываем загрузку
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = 'Отправка...';
            submitBtn.disabled = true;
            
            // Собираем данные формы
            const formData = new FormData(form);
            
            // Отправляем AJAX запрос
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Сбрасываем все ошибки
                clearErrors();
                
                if (data.success) {
                    // Успешная отправка
                    showSuccess(data.message);
                    form.reset();
                } else {
                    // Показываем ошибки валидации
                    showErrors(data.errors);
                    if (data.message) {
                        showError(data.message);
                    }
                }
            })
            .catch(error => {
                showError('Произошла ошибка при отправке формы');
                console.error('Error:', error);
            })
            .finally(() => {
                // Восстанавливаем кнопку
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }
    
    function clearErrors() {
        // Убираем классы error
        form.querySelectorAll('.error').forEach(el => {
            el.classList.remove('error');
        });
        
        // Убираем сообщения об ошибках
        form.querySelectorAll('.error-message').forEach(el => {
            el.textContent = '';
        });
        
        // Очищаем блок ответа
        if (responseElement) {
            responseElement.textContent = '';
            responseElement.className = '';
        }
    }
    
    function showErrors(errors) {
        if (!errors) return;
        
        for (const field in errors) {
            const input = form.querySelector(`[name="${field}"]`);
            if (input) {
                input.classList.add('error');
                
                // Добавляем сообщение об ошибке
                let errorElement = input.nextElementSibling;
                if (!errorElement || !errorElement.classList.contains('error-message')) {
                    errorElement = document.createElement('span');
                    errorElement.className = 'error-message';
                    input.parentNode.appendChild(errorElement);
                }
                errorElement.textContent = errors[field][0];
            }
        }
    }
    
    function showSuccess(message) {
        if (responseElement) {
            responseElement.textContent = message;
            responseElement.className = 'text-success';
        }
    }
    
    function showError(message) {
        if (responseElement) {
            responseElement.textContent = message;
            responseElement.className = 'text-danger';
        }
    }
});




document.addEventListener('DOMContentLoaded', function() {
    const jobForm = document.getElementById('job-application-form');
    const jobResponse = document.getElementById('job-response');
    const submitJobBtn = document.getElementById('submit-job-btn');
    const cvUpload = document.getElementById('cv-upload');
    const filePreview = document.getElementById('file-preview');
    
    // Предпросмотр файла
    if (cvUpload) {
        cvUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                filePreview.innerHTML = `
                    <div style="background: #f8f9fa; padding: 10px; border-radius: 5px;">
                        <strong>Selected file:</strong> ${file.name}<br>
                        <small>Size: ${(file.size / 1024).toFixed(2)} KB</small>
                    </div>
                `;
            } else {
                filePreview.innerHTML = '';
            }
        });
    }
    
    if (jobForm) {
        jobForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Валидация формы
            if (!validateJobForm()) {
                return;
            }
            
            // Показываем загрузку
            const originalText = submitJobBtn.innerHTML;
            submitJobBtn.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Submitting Application...
            `;
            submitJobBtn.disabled = true;
            
            // Создаем FormData для отправки файла
            const formData = new FormData(jobForm);
            
            // Отправляем AJAX запрос
            fetch(jobForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                clearJobErrors();
                
                if (data.success) {
                    showJobSuccess(data.message);
                    jobForm.reset();
                    filePreview.innerHTML = '';
                    
                    // Автоматически скрыть сообщение через 8 секунд
                    setTimeout(() => {
                        if (jobResponse) {
                            jobResponse.style.opacity = '0';
                            setTimeout(() => {
                                jobResponse.textContent = '';
                                jobResponse.style.opacity = '1';
                            }, 500);
                        }
                    }, 8000);
                } else {
                    showJobErrors(data.errors);
                    if (data.message) {
                        showJobError(data.message);
                    }
                }
            })
            .catch(error => {
                showJobError('An error occurred while submitting your application. Please try again.');
                console.error('Error:', error);
            })
            .finally(() => {
                // Восстанавливаем кнопку
                submitJobBtn.innerHTML = originalText;
                submitJobBtn.disabled = false;
            });
        });
    }
    
    function validateJobForm() {
        let isValid = true;
        clearJobErrors();
        
        // Проверка обязательных полей
        const requiredFields = jobForm.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('error');
                showFieldError(field, 'This field is required');
            }
        });
        
        // Проверка email
        const emailField = jobForm.querySelector('input[type="email"]');
        if (emailField && emailField.value.trim()) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailField.value)) {
                isValid = false;
                emailField.classList.add('error');
                showFieldError(emailField, 'Please enter a valid email address');
            }
        }
        
        // Проверка длины текста для why_apply
        const whyApplyField = jobForm.querySelector('textarea[name="why_apply"]');
        if (whyApplyField && whyApplyField.value.trim()) {
            if (whyApplyField.value.trim().length < 50) {
                isValid = false;
                whyApplyField.classList.add('error');
                showFieldError(whyApplyField, 'Please provide more details (at least 50 characters)');
            }
        }
        
        // Проверка файла
        if (cvUpload && cvUpload.files.length > 0) {
            const file = cvUpload.files[0];
            const allowedTypes = ['application/pdf', 'application/msword', 
                                 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            const maxSize = 5 * 1024 * 1024; // 5MB
            
            if (!allowedTypes.includes(file.type)) {
                isValid = false;
                cvUpload.classList.add('error');
                showFieldError(cvUpload, 'Please upload a PDF, DOC or DOCX file');
            }
            
            if (file.size > maxSize) {
                isValid = false;
                cvUpload.classList.add('error');
                showFieldError(cvUpload, 'File size should not exceed 5MB');
            }
        }
        
        return isValid;
    }
    
    function showFieldError(field, message) {
        let errorElement = field.nextElementSibling;
        while (errorElement && !errorElement.classList.contains('error-message')) {
            errorElement = errorElement.nextElementSibling;
        }
        
        if (!errorElement || !errorElement.classList.contains('error-message')) {
            errorElement = document.createElement('span');
            errorElement.className = 'error-message';
            field.parentNode.appendChild(errorElement);
        }
        errorElement.textContent = message;
    }
    
    function clearJobErrors() {
        jobForm.querySelectorAll('.error').forEach(el => {
            el.classList.remove('error');
        });
        
        jobForm.querySelectorAll('.error-message').forEach(el => {
            el.textContent = '';
        });
        
        if (jobResponse) {
            jobResponse.textContent = '';
            jobResponse.className = '';
        }
    }
    
    function showJobSuccess(message) {
        if (jobResponse) {
            jobResponse.innerHTML = `<div class="alert alert-success">${message}</div>`;
            jobResponse.className = 'text-success';
        }
    }
    
    function showJobError(message) {
        if (jobResponse) {
            jobResponse.innerHTML = `<div class="alert alert-danger">${message}</div>`;
            jobResponse.className = 'text-danger';
        }
    }
    
    function showJobErrors(errors) {
        if (!errors) return;
        
        for (const field in errors) {
            const input = jobForm.querySelector(`[name="${field}"]`);
            if (input) {
                input.classList.add('error');
                showFieldError(input, errors[field][0]);
            }
        }
    }
});