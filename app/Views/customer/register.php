<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--    <link rel="stylesheet" href="--><?php //echo base_url('bootstrap/css/bootstrap.css')?><!--" type="text/css">-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js')?>"><</script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('#password').addEventListener('input', function () {
                const password = document.getElementById('password');
                const confirm_password = document.getElementById('confirm_password');

                if (password.value !== confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords don't match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            });

            document.querySelector('#confirm_password').addEventListener('input', function () {
                const password = document.getElementById('password');
                const confirm_password = document.getElementById('confirm_password');

                if (password.value !== confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords don't match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            });
        });

        // Toggle password visibility
        document.querySelectorAll('.eye-toggle').forEach(function(icon) {
            icon.addEventListener('click', function() {
                const input = document.querySelector(this.getAttribute('toggle'));
                input.type = input.type === 'password' ? 'text' : 'password';
                this.classList.toggle('fa-eye-slash');
            });
        });

    </script>

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-signup {
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-signup h1 {
            margin-bottom: 30px;
            font-weight: bold;
            color: #333;
        }
        .form-signup .form-floating {
            margin-bottom: 20px;
        }
        .form-signup input[type="text"],
        .form-signup input[type="email"],
        .form-signup input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .form-signup button[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .form-signup button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<main class="form-signup">
    <form action="/customer/register" method="post">
        <h1 class="h3 mb-4">Customer Registration</h1>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <div class="form-floating">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= set_value('username') ?>" required autofocus>
        </div>
        <div class="form-floating">
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?= set_value('email') ?>" required>
        </div>
        <div class="form-floating">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-floating">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        </div>
        <button class="btn btn-primary" type="submit">Register</button>
    </form>
</main>

</body>
</html>
