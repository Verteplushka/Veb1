
            // const x = doucment.getElementById('x');
            // const error = document.getElementById('error');
            // x.addEventListener('input', function () {
            //     const value = x.value;
            //     // Здесь проводите проверку данных и обновляйте сообщение об ошибке, если необходимо
            //     if (!isNaN(value)) {
            //         error.textContent = 'X не удовлетворяет условию "от -3 до 3"';
            //     } else {
            //         error.textContent = ''; // Очистить сообщение об ошибке
            //     }
            // });



            function validate() {
                const x = document.getElementById('x');
                const y = document.getElementById('y');
                const r = document.getElementById('r');
                return validateNotEmpty(x, 'X') & validateNotEmpty(r, 'R') & validateIsNumber(x, 'X');

            }

            function validateXRange(value){
                if (value >= -3 && value <= 3) {
                    return true;
                }
                alert('X не удовлетворяет условию "от -3 до 3"');
                return false;
            }

            function validateNotEmpty(value, name) {
                //const value = inputField.value.trim();
                if (value === '') {
                    alert(name + ' не может быть пустым');
                    return false;
                }
                return true;
            }

            function validateIsNumber(value, name) {
                //const value = inputField.value.trim();
                if (isNaN(value)) {
                    return true;
                }
                alert(name + ' должно быть числом');
                return false;
            }