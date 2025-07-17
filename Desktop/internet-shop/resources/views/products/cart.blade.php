@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Корзина</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
        </div>
    @endif

    <div class="table-responsive mb-4">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Товар</th>
                    <th scope="col" class="text-center">Количество</th>
                    <th scope="col" class="text-end">Цена</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td class="text-center">{{ $item['quantity'] }}</td>
                    <td class="text-end">{{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }} руб.</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Форма оформления заказа -->
    <div class="card p-4 shadow-sm">
        <h2 class="h5 mb-3">Оформление заказа</h2>
        <form action="{{ route('checkout') }}" method="POST" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Введите ваше имя" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="example@mail.com" required>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий</label>
                <textarea id="comment" name="comment" rows="4" class="form-control" placeholder="Дополнительные пожелания"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Оформить заказ</button>
        </form>
    </div>
</div>
@endsection