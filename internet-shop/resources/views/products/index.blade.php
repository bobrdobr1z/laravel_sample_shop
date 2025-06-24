@extends('layouts.app')

@section('content')
    <style>

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

        /* Изображение товара */
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        /* Заголовок товара */
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Текст описания и цены */
        .card-text {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
        }

        /* Кнопки внутри карточки */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        /* Общие стили для кнопок навигации */
        .btn {
            margin-right: 10px;
            margin-top: 20px;
        }

        /* Центрирование заголовка и кнопок */
        .actions {
            text-align: center;
            margin-top: 30px;
        }
    </style>

    <h1>Каталог товаров</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text font-weight-bold">{{ $product->price }} руб.</p>
                        <form action="{{ route('add.to.cart', $product->id) }}" method="POST" class="mt-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">В корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="actions">
        <a href="{{ route('cart') }}" class="btn btn-success">Корзина</a>
        <a href="{{ route('feedback') }}" class="btn btn-info">Обратная связь</a>
    </div>
@endsection