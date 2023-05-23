
<x-layout>
    <x-slot name="title">Rapido - Register</x-slot>
    <!-- ======= FORM LOGIN ======= -->
    <div class="container-fluid mt-5" style="height: 65vh">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <!--FORM TITLE -->
                <h2 class="form-title space-around text-center">{{__('Crear tu cuenta')}}</h2>
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
                <form action="/register" method="POST" role="form" class="form-control form-card">
                    @csrf
                    <!--Name -->
                    <div class="my-2">
                        <input type="text" name="name" id="name" class="form-control forms_field-input form-card-2"
                        placeholder="{{__('Tu nombre')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <!--Email -->
                    <div class="my-2">
                        <input type="email" name="email" id="email" class="form-control forms_field-input form-card-2"
                        placeholder="{{__('Tu correo')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <!--Password -->
                    <div class=" my-2">
                        <input type="password" name="password" id="password" class="form-control forms_field-input form-card-2" 
                        placeholder="{{__('Tu contraseña')}}">
                        <div class="validate"></div>
                    </div>
                    <div class=" my-2">
                        <input type="password" name="password_confirmation" id="password" class="form-control forms_field-input form-card-2"
                        placeholder="{{__('Confirma contraseña')}}">
                        <div class="validate"></div>
                    </div>
                    <!--Button Register-->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn m-2" style="background-color: rgb(74, 180, 74);">
                            {{__('Registrar')}}
                        </button>
                    </div>
                </form>
                
                <p class="my-3 text-center">{{__('¿Ya eres de los nuestros?')}} <a class="btn btn-sm ms-2" style="background-color: rgb(74, 180, 74);" href="{{route('login')}}">{{__('¡Entra ya!')}}</a> </p>
            </div>
        </div>
    </div>
</x-layout>