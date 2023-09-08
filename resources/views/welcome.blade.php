<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Мой склад</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Данные из json:</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Аккаунт id</th>
            <th scope="col">Обновлено</th>
            <th scope="col">Название</th>
            <th scope="col">Код</th>
            <th scope="col">Внешний код</th>
            <th scope="col">Цена продажи из массива 0</th>
            <th scope="col">Цена продажи из массива 1</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach ($data['rows'] as $row)
            <tr>
                <td>{{ $row['id'] }}</td>
                <td>{{ $row['accountId'] }}</td>
                <td>{{ $row['updated'] }}</td>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['code'] }}</td>
                <td>{{ $row['externalCode'] }}</td>
                <td>{{ $row['salePrices'][0]['value']}}</td>
                <td>{{ $row['salePrices'][1]['value']}}</td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
    <form action="{{ route('download-xml') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Скачать файл</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
