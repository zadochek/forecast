<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Gismeteo</title>
</head>
<body>
    <form action="/forecast" method="POST">
        @csrf
    <div class="container mt-3">
        <div class="row">
            @error('api_fail')
            <div class="col-md-12 my-3">
                <p>{{ $message }}</p>
            </div>
            @enderror
            <div class="col-md-12">
                <p>Координаты</p>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="lat" value="{{ old('lat') }}" placeholder="Широта. Диапазон допустимых значений от −90 до 90" required>
                @error('lat')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="lon" value="{{ old('lon') }}" placeholder="Долгота. Диапазон допустимых значений от −180 до 180" required>
                @error('lon')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-md-12 mt-2">
                <button class="btn" type="submit">Отправить</button>
            </div>
        </div>
    </div>
</form>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <p>Температура воздуха, &deg;C:</p>
                <input class="form-control" type="text" disabled value="{{ $result['main']['temp'] ?? "" }} ">
            </div>
            <div class="col-md-6">
                <p>Описание:</p>
                <textarea class="form-control" disabled cols="30" rows="3">{{ $result['weather'][0]['description'] ?? "" }}</textarea>
            </div>
        </div>
    </div>
</body>
</html>
