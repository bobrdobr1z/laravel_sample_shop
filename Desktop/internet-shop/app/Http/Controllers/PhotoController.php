<?php

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    public function upload(Request $request)
{
    // Валидация: проверка массива файлов
    $request->validate([
        'photos.*' => 'required|image|max:2048', // максимум 2MB на файл
    ]);

    // Получение массива файлов
    $files = $request->file('photos');

    foreach ($files as $file) {
        // Генерация уникального имени файла
        $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();

        // Путь для сохранения изображения
        $path = public_path('images/' . $filename);

        // Обработка изображения: уменьшение до ширины 300px с сохранением пропорций
        $img = Image::make($file);
        $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save($path);
    }

    return back()->with('success', 'Изображения успешно загружены и уменьшены!');
 }
}