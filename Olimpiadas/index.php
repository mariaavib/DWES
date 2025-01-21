<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            flex-direction: column;
            justify-content: space-around; /* Adjusted to bring forms closer */
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
            padding: 20px 0;
        }

        form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 0.95;
        }

        form:hover {
            transform: translateY(-10px);
            opacity: 1;
        }

        h1 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 20px;
            color: #ffffff;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        select {
            padding: 12px;
            width: 100%;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.2);
            font-size: 16px;
            color: #000;
            outline: none;
            transition: border 0.3s ease, box-shadow 0.3s ease;
            text-shadow: none;
        }

        select:focus {
            border-color: #ffd700;
            box-shadow: 0 0 8px rgba(255, 215, 0, 0.7);
        }

        /* Button for submitting the form */
        button {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #f6d365, #fda085);
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #fda085, #f6d365);
            box-shadow: 0 4px 12px rgba(255, 173, 91, 0.5);
        }

        /* Responsive design */
        @media (max-width: 480px) {
            form {
                padding: 20px;
            }

            select {
                font-size: 14px;
            }

            button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!--Primer formulario-->
    <form>
        <select id="clases">
            <option value="none" selected disabled>Selecciona una clase</option>
        </select>
    </form>
    <!--Segundo formulario-->
    <form id="formulario">
        
    </form>
<script src="1.js"></script>
</body>
</html>
