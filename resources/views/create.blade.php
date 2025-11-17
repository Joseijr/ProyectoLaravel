<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar curso</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        form {
            width: 350px;
            margin: 0 auto;
            background: white;
            padding: 20px 25px 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #444;
        }

        input {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 95%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
          
        }

        button:hover {
            background: #45a049;
        }
    </style>
</head>

<body>

    <h1>Registrar un nuevo curso</h1>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <label>Codigo del curso</label>
        <input type="text" name="code">
        
        <label>Nombre del curso</label>
        <input type="text" name="name">

        <label>Categoría</label>
        <input type="text" name="category">

        <label>Ciclo</label>
        <input type="text" name="cycle">

        <label>Modalidad</label>
        <input type="text" name="modality">

        <label>Cupo</label>
        <input type="number" name="quota">

        <label>Descripción</label>
        <input name="description"></input>

        <button type="submit">Guardar</button>
    </form>

</body>
</html>
