<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        select {
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            color: #333;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            form {
                padding: 15px;
            }

            select {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <form>
        <select id="clases">
            <option value="none" selected disabled>Selecciona una clase</option>
        </select>
    </form>
    <form id="formulario">
        
    </form>
<script src="1.js"></script>
</body>
</html>
