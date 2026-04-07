<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Completo - Clientes</title>

        <style>
            body {
                font-family: Verdana;
                background: #505050;
                margin: 0;
            }

            .container {
                margin: 30px auto;
                padding: 25px;
                background: #ffffff;
                max-width: 1000px;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            }

            h1 {
                text-align: center;
            }

            nav {
                text-align: center;
                margin-bottom: 20px;
            }

            nav a {
                margin: 5px;
                text-decoration: none;
                background: #4597ce;
                color: #ffffff;
                padding: 10px 18px;
                border-radius: 10px;
                display: inline-block;
                transition: 0.3s;
            }

            nav a:hover {
                background: #216897;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                overflow: hidden;
                border: 1px solid #505050;
            }

            th, td {
                padding: 8px;
                text-align: center;
            }

            th {
                background: #a4bbca;
            }

            td a {
                padding: 5px 8px;
                border-radius: 8px;
                text-decoration: none;
            }

            td a:first-child {
                background: #23a10a;
                color: white;
            }

            td a:last-child {
                background: #a10a0a;
                color: white;
            }

            td a:hover {
                opacity: 0.8;
            }

            .caixa-busca input {
                width: 50%;
                padding: 10px 15px;
                border: 1px solid #505050;
                border-radius: 8px;
                font-size: 14px;
            }

            .caixa-busca input:focus {
                outline: none;
                border-color: #216897;
                box-shadow: 0 0 8px rgba(76, 136, 176, 0.5);
            }

            .caixa-busca select {
                padding: 10px;
                border-radius: 8px;
                border: 1px solid #505050;
                font-size: 14px;
                cursor: pointer;
            }

            .caixa-busca button {
                padding: 10px 15px;
                border: none;
                border-radius: 8px;
                background: #4597ce;
                color: white;
                cursor: pointer;
                transition: 0.3s;
            }

            .caixa-busca button:hover {
                background: #216897;
            }

            .paginacao {
                margin-top: 20px;
                text-align: center;
            }

            .paginacao a {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 35px;
                height: 35px;
                margin: 3px;
                background: #e0e0e0;
                border-radius: 8px;
                text-decoration: none;
                color: black;
                transition: 0.3s;
            }

            .paginacao a:hover {
                background: #a4bbca;
                color: darkgray;
            }

            .paginacao a.ativa {
                background: #216897;
                color: white;
                font-weight: bold;
            }

            footer {
                text-align: center;
                font-size: 14px;
                margin-top: 20px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>CRUD Completo de Clientes</h1>

            <nav>
                <a href="clientes_listar.php">Listar Clientes</a>
                <a href="clientes_novo.php">Novo Cliente</a>
            </nav>

            <hr>