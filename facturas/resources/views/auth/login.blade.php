@extends('layouts.app')

@section('titulo')
    Iniciar Sesión
@endsection

@section('contenido')
<div class="flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
    <div style="max-width: 50%;">
        <img src="{{ asset('img/login_2.png') }}" alt="Imagen login de usuarios" style="width: 100%; height: 100%;">
    </div>
            
    <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
      <div class="bg-white p-2 rounded-lg shadow-xl">
        <div class="p-6 pb-0 mb-0">
          <h4 class="font-bold">Iniciar Sesión</h4>
          <p class="mb-0">Ingrese su correo electrónico y contraseña para iniciar sesión</p>
        </div>
        <div class="flex-auto p-6">
            
            <form method="post" action="{{route('login')}}" novalidate>

                @csrf    
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{session('mensaje')}}
                    </p>
                @endif
    
                
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="text" 
                        placeholder="Tu email de registro" 
                        class="border p-3 w-full rounded-lg
                        @error('email') border-red-500 @enderror"
                           
                        value="{{old('email')}}"
                    />
                </div>
    
                <br>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        placeholder="Password de registro" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <br>
                <!--Check de mantener sesión abierta-->
                <div class="mb-5">
                    <input type="checkbox" name="remember">
                        <label class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                </div>
                
    
                <input
                    type="submit"
                    value="Iniciar sesión"
                    class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25"
                />
            </form>
        </div>
      </div>
    </div>
</div>
@endsection

