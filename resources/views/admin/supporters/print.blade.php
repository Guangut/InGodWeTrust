<!DOCTYPE html>
<html>
<head>
    <title>Print Supporters</title>
    <style>
        body { font-family: sans-serif; }
        .print-button {
            display: inline-block;
            padding: 8px 16px;
            margin-bottom: 16px;
            background-color: #3490dc;
            color: white;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        @media print {
            .print-button { display: none; }
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">Print</button>
    <h1>Supporters List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Support Type</th>
                <th>Contribution</th>
                <th>Start Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supporters as $supporter)
            <tr>
                <td>{{ $supporter->id }}</td>
                <td>{{ $supporter->name }}</td>
                <td>{{ $supporter->email }}</td>
                <td>{{ $supporter->support_type }}</td>
                <td>{{ $supporter->contribution_amount }}</td>
                <td>{{ $supporter->start_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
