<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <style>
        body {
            max-width: 1200px;
            margin: 30px auto;
        }
        .text-red-500 {
            color: red;
        }
        table {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2;}

        tr:hover {background-color: #ddd;}

        th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }

    a {
        color: black;
    }
    </style>
</head>
<body>
    <h1>Times Google appears in feed: {{ $googleCount }}</h1>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Data</th>
                <th>Type</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formattedData as $item)
                <tr>
                    <td>{{ date('m-d-Y', strtotime($item['date'])) }}</td>
                    <td>
                        {!!  $item['data'] !!}
                    </td>
                    <td>{{ $item['type'] }}</td>
                    <td><a href="{{ $item['link'] }}" target="_blank">{{ $item['link'] }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
