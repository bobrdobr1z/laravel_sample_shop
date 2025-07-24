@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width:300px;">
<p>{{ $product->description }}</p>
<p>Цена: {{ $product->price }} руб.</p>
<!-- Можно добавить кнопку "Добавить в корзину" -->
<form action="{{ route('add.to.cart', $product->id) }}" method="POST">
    @csrf
    <button type="submit">Добавить в корзину</button>
</form>
@endsection