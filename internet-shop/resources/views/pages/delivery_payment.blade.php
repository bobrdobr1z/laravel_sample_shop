@extends('layouts.app')

@section('title', 'Доставка и оплата')

@section('content')
<h1>Доставка и оплата</h1>
<p>Здесь размещена информация о способах доставки и условиях оплаты.</p>
<!-- Можно дополнить таблицами, списками или другой информацией -->
@endsection
@push('styles')
<style>

    h1 {
        color: #2c3e50;
        font-size: 2em;
        margin-bottom: 20px;
        text-align: center;
    }

    p {
        font-size: 1.2em;
        line-height: 1.5;
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

</style>
@endpush