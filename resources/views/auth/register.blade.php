<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f3f4f6;
    }

    .container {
        width: 400px;
        padding: 40px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h2 {
        color: #333;
        margin-bottom: 30px;
    }

    input {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .input-group input {
        margin-bottom: 20px;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="phone" name="phone" placeholder="Phone" required>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
