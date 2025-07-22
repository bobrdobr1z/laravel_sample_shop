@extends('layouts.app')

@section('content')

    <style>
        /* ваши стили */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.2);
        }
        /* убираем фиксированную высоту у изображений карточек */
        .card-img-top {
            object-fit: cover;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn {
            margin-right: 10px;
            margin-top: 20px;
        }
        .actions {
            text-align: center;
            margin-top: 30px;
        }

        /* Новый стиль для логотипов */
        .logo-img {
            max-width: 500px; /* Максимальная ширина */
            height: 250px;    /* Фиксированная высота */
            object-fit: cover; /* Обрезка по пропорциям */
            margin: 10px;     /* Отступы между изображениями */
        }
    </style>

<h1 style="text-align: center; margin-bottom: 30px;">Каталог товаров</h1>
<form action="{{ route('products.search') }}" method="GET">
    <input type="text" name="query" placeholder="Поиск товаров..." value="{{ request('query') }}">
    <button type="submit">Искать</button>
</form>
<!-- Блок с логотипами -->
<div class="row mb-4 justify-content-center">
    <div class="col-12 d-flex flex-wrap justify-content-center">
        <!-- Первый логотип -->
        <div class="col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/asus8.png') }}" alt="Логотип" class="logo-img mb-2">
            <p class="logo-info">Asus rog phone 8 pro</p>
        </div>
        <!-- Второй логотип -->
        <div class="col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/asu1s.jpg') }}" alt="Логотип" class="logo-img mb-2">
            <p class="logo-info">Asus rog phone 9 pro</p>
        </div>
        <!-- Третий логотип -->
        <div class="col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/nubia9pro.jpg') }}" alt="Логотип" class="logo-img mb-2">
            <p class="logo-info">Nubia 9 Pro</p>
        </div>
        <!-- Четвертый логотип -->
        <div class="col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/nubia5.jpg') }}" alt="Логотип" class="logo-img mb-2">
            <p class="logo-info">Nubia M-5G</p>
        </div>
        <!-- Пятый логотип -->
        <div class="col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/samsung.jpg') }}" alt="Логотип" class="logo-img mb-2">
            <p class="logo-info">Samsung</p>
        </div>
        <!-- Шестой логотип -->
        <div class="col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/i16.jpg') }}" alt="Логотип" class="logo-img mb-2">
            <p class='logo-info'>iPhone 16</p>
        </div>
        <!-- Седьмой логотип -->
         <div class='col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center'>
             <img src='{{asset("images/honor.jpg")}}' alt='Логотип' class='logo-img'>
             <p class='logo-info'>Honor</p>
         </div>
         <!-- Восьмой логотип -->
         <div class='col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center'>
             <img src='{{asset("images/pocof5.jpg")}}' alt='Логотип' class='logo-img'>
             <p class='logo-info'>Poco F5</p>
         </div> 
         <!-- Девятый логотип -->
         <div class='col-md-3 col-sm-4 col-6 mb-3 d-flex flex-column align-items-center'>
             <img src='{{asset("images/realme13.jpg")}}' alt='Логотип' class='logo-img'>
             <p class='logo-info'>Realme 13</p>
         </div> 
         <!-- Десятый логотип -->
         <div class='col-md-3 col-sm-4 col-6 mb=3 d-flex flex-column align-items-center'>
             <img src='{{asset("images/techno.jpg")}}' alt='Логотип' class='logo-img'>
             <p class='logo-info'>Techno</p>
         </div> 
         <!-- Одиннадцатый логотип -->
         <div class='col-md-3 col-sm=4 col-lg=3 mb=3 d-flex flex-column align-items-center'>
             <img src='{{asset("images/x15u.jpg")}}' alt='Логотип' class='logo-img'>
             <p class='logo-info'>Xiaomi 15 ultra</p>
         </div> 
         <!-- Двенадцатый логотип -->
         <div class='col-md-3 col-sm=4 col=6 mb=3 d-flex flex-column align-items-center'>
             <img src='{{asset("images/i14.png")}}' alt='Логотип' class='logo-img'>
             <p class='logo-info'>iPhone 14</p>
         </div> 
    </div>
</div>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
      <div class="card h-auto card-hover-effect">
          {{-- Если у продукта есть изображение --}}
          @if($product->image)
              <img src="{{ asset('images/' . $product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
          @else
              {{-- Заглушка или дефолтное изображение --}}
              <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
          @endif

          <div class='card-body d-flex flex-column'>
              <h5 class='card-title'>{{ $product->name }}</h5>
              <p class='card-text'>{{ $product->description }}</p>
              <p class='card-text font-weight-bold'>{{ $product->price }} руб.</p>

              {{-- Кнопка "В корзину" --}}
              <form action="{{ route('add.to.cart', $product->id) }}" method='POST' class='mt-auto'>
                  @csrf
                  <button type='submit' class='btn btn-primary w-100'>В корзину</button>
              </form>
          </div>                
      </div>
    </div>
    @endforeach
</div>

@endsection

@section('footer')
<div style='position: fixed; bottom: 0; width: 100%; text-align: center; margin-top: 20px; background-color: transparent; padding: 10px 0; z-index: 9999;'>
    <a href="{{ route('cart') }}"class ='btn btn-success m -2'>Корзина</a>
    &nbsp;&nbsp;<a href="{{ route('feedback') }}"class ='btn btn-info m -2'>Обратная связь</a>
    &nbsp;&nbsp;<a href="{{ route('payment') }}"class ='btn btn-primary m -2'>Оплата</a>
    &nbsp;&nbsp;<a href="{{ route('delivery') }}"class ='btn btn-primary m -2'>Доставка</a>
</div>
@endsection