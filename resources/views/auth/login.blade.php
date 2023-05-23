<x-layout>
    <x-slot name="title">Shoplify - {{__('Iniciar sesión')}}</x-slot>
    <div class="container-fluid mt-5" style="height: 65vh">
        <div class="row"> 
            <div class="col-12 col-md-6 offset-md-3">
                <h2 class="form-title space-around text-center">{{__('Iniciar sesión')}}</h2>
                    @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                    @endif
                <!--FORM FIELDS -->
                <form action="/login" method="POST" role="form" class="form-control form-card">
                    @csrf
                <!--Email -->
                <div class="space-around my-2">
                        <input type="email" name="email" id="email" class="form-control forms_field-input form-card-2" placeholder="{{__('Tu correo')}}" data-rule="minlen:4" data-msg="{{__('Por favor introduce al menos 4 caracteres')}}">
                    <div class="validate"></div>
                </div>
                <!--Password -->
                <div class=" space-around my-2">
                    <input type="password" name="password" id="password" class="form-control forms_field-input form-card-2" placeholder="{{__('Tu contraseña')}}">
                    <div class="validate"></div>
                </div>
                <!--Button Login-->    
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn m-2" style="background-color: rgb(74, 180, 74);">{{__('Entrar')}}</button>
                </div>
                </form>
                <p class="my-3 text-center" >{{__('¿Aún no eres de los nuestros?')}}<a class="btn btn-sm ms-2" style="background-color: rgb(74, 180, 74);" href="{{ route('register')}}">{{__('¡Registrate!')}}</a></p>
            </div>
        </div>
    </div>
</x-layout>