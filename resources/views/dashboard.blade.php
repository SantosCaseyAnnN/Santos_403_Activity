<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6f8;
            color: #222;
        }

        /* HEADER */
        .header {
            background: #ffffff;
            padding: 20px 35px;
            border-bottom: 1px solid #ddd;
        }

        .header h1 {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .header p {
            color: #777;
            font-size: 14px;
        }

        /* CONTENT */
        .container {
            width: 94%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .title {
            margin-bottom: 25px;
        }

        .title h2 {
            font-size: 21px;
        }

        .title p {
            color: #777;
            margin-top: 5px;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #e3e3e3;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }

        .card-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            color: white;
            font-size: 25px;
            margin-bottom: 18px;
        }

        .blue {
            background: #2864e8;
        }

        .red {
            background: #e52525;
        }

        .card h3 {
            font-size: 21px;
            margin-bottom: 10px;
        }

        .card p {
            color: #777;
            line-height: 1.5;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 22px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-blue {
            background: #2864e8;
        }

        .btn-red {
            background: #e52525;
        }

        .btn-blue:hover {
            background: #1d50c5;
        }

        .btn-red:hover {
            background: #c91d1d;
        }

        @media (max-width: 700px) {
            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <h1>Dashboard</h1>
        <p>Manage your counter and employee records.</p>
    </header>

    <main class="container">

        <div class="title">
            <h2>Welcome to the Dashboard</h2>
            <p>Select a section below to continue.</p>
        </div>

        <div class="cards">

            {{-- COUNTER --}}
            <div class="card">

                <div class="card-icon blue">
                    +
                </div>

                <h3>Counter</h3>

                <p>
                    Manage your counter by increasing or decreasing
                    the current count.
                </p>

                <a href="{{ route('counter') }}" class="btn btn-blue">
                    Open Counter
                </a>

            </div>


            {{-- EMPLOYEES --}}
            <div class="card">

                <div class="card-icon red">
                    👤
                </div>

                <h3>Employees</h3>

                <p>
                    Add, edit, search and manage your employee records.
                </p>

                <a href="{{ route('employees') }}" class="btn btn-red">
                    Manage Employees
                </a>

            </div>

        </div>

    </main>

</body>
</html>
