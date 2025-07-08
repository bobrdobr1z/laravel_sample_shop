@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите ваш адрес электронной почты') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
<<<<<<< HEAD
                            {{ __('Ссылка для подтверждения была отправлена заново на ваш email.') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, пожалуйста, проверьте свою электронную почту на наличие ссылки для подтверждения.') }}
=======
                            {{ __('Новая ссылка для подтверждения отправлена на ваш email.') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, пожалуйста, проверьте свою почту на наличие письма с подтверждением.') }}
>>>>>>> f6d7962050b88512e87bee4b180a13460fb1bc1d
                    {{ __('Если вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь, чтобы запросить другое') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection