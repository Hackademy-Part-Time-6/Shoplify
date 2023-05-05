<x-layout>
    <x-slot name="title">Shoplify - {{__('Iniciar Sesion')}}</x-slot>
    <div class="container-fluid mt-5" style="height: 65vh">
        <div class="row"> 
            <div class="col-12 col-md-6 offset-md-3">
                <h2 class="form-title space-around">{{__('Iniciar sesion')}}</h2>
                    @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                    @endif
    
                <form action="/login" method="POST" role="form" class="form-control">
                    @csrf
                    <div class="space-around my-2">
                        <input type="email" name="email" id="email" class="form-control forms_field-input" placeholder="{{__('Tu correo')}}" data-rule="minlen:4" data-msg="{{__('Por favor introduce al menos 4 caracteres')}}">
                    <div class="validate"></div>
                </div>
                <div class=" space-around my-2">
                    <input type="password" name="password" id="password" class="form-control forms_field-input" placeholder="{{__('Tu contraseña')}}">
                    <div class="validate"></div>
                </div>    
                <button type="submit" class="btn btn-info">{{__('Entrar')}}</button>
                </form>
                <p class="my-3">{{__('¿Aún no eres de los nuestros?')}}<a class="btn btn-info btn-sm ms-2" href="{{ route('register')}}">{{__('¡Registrate!')}}</a></p>
            </div>
        </div>
    </div>
</x-layout>