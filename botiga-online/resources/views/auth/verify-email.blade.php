{{-- resources/views/auth/verify-email.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Verificació de correu electrònic</h1>

    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success">
            T'hem enviat un nou enllaç de verificació al teu correu electrònic.
        </div>
    @endif

    <p>Abans de continuar, has de verificar el teu correu electrònic fent clic a l’enllaç que t’hem enviat.</p>

    <p>No has rebut l'enllaç? Pots tornar a sol·licitar-lo aquí:</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Reenviar correu de verificació</button>
    </form>
</div>
@endsection
