<!DOCTYPE html>
<html>
<head>
    <title>Моя галерея</title>
</head>
<body>
    
<h1>Мои фотографии</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<div style="display: flex; flex-wrap: wrap;">
    @foreach($images as $image)
        <div style="margin: 10px;">
            <img src="{{ asset('images/' . $image) }}" alt="Фото" style="max-width: 200px; height: auto;">
        </div>
    @endforeach
</div>

<a href="/upload">Загрузить новые фото</a>

</body>
</html>