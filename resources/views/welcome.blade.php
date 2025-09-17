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

        .grid-container {
          display: grid;
          grid-template-columns: 100%;
          grid-gap: 1rem;
        }

        .card {
          background-color: #fff;
          border-radius: 0.5rem;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
          padding: 1rem 2rem;
        }

        a {
            color: black;
        }
    </style>
</head>
<body>
    <h1>Times Google appears in feed: {{ $googleCount }}</h1>

    <div class="grid-container">
        @foreach ($formattedData as $item)
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{!! $item['title'] !!}</h2>
                    <p class="card-text">{!! $item['description'] !!}</p>
                    <a href="{{ $item['link'] }}" target="_blank" class="btn btn-primary">View</a>
                    <p>{{ date('m-d-Y', strtotime($item['date'])) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
