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

<div class="row">
    {{-- Блок с логотипами --}}
    <div class="col-12 mb-4 text-center d-flex justify-content-center flex-wrap">
        <img src="{{ asset('images/asus8.jpg') }}" alt="Логотип" class="logo-img">
        <img src="{{ asset('images/asu1s.jpg') }}" alt="Логотип" class="logo-img">
    </div>

    @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 card-hover-effect">
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
<div style='text-align: center; margin-top: 20px;'>
    <a href='{{ route("cart") }}' class='btn btn-success'>Корзина</a>
    <a href='{{ route("feedback") }}' class='btn btn-info'>Обратная связь</a>
    <a href='{{ route("payment") }}' class='btn btn-primary'>Оплата</a>
    <a href='{{ route("delivery") }}' class='btn btn-primary'>Доставка</a>
</div>
@endsection