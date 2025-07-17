<form action="{{ route('photo.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="photos">Выберите изображения:</label>
    <input type="file" name="photos[]" id="photos" multiple required>
    <button type="submit">Загрузить</button>
</form>