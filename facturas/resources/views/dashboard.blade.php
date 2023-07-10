@extends('layouts.app')

@section('titulo')
    Consulta tu factura
@endsection

@section('contenido_top')
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>
@endsection

@section('contenido')
    <br> <br>
    <div class="relative w-full mx-auto mt-500 ">
        <div
            class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div
                        class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                        <img src="{{ asset('img/admin.png') }}" alt="profile_image" class="w-full shadow-2xl rounded-xl" />
                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        @auth
                            <h5 class="mb-1 dark:text-white">Administrador</h5>
                            <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Administrador
                            </p>
                        @endauth
                        @guest

                            <h5 class="mb-1 dark:text-white">Invitado</h5>
                            <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Invitado</p>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">


            <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Ingrese los siguientes datos</p>
                        </div>
                    </div>

                    <form action="{{ route('buscar') }}" method="POST" novalidate>
                        @csrf
                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="razon_social"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Empresa
                                            Emisora
                                        </label>
                                        <select name="rfc_emisor" id="rfc_emisor"
                                            class="peer block w-full border-2 rounded-sm p-0 text-base text-gray-900 focus:ring-0">
                                            <option value="{{ old('rfc_emisor') }}" disabled selected>Empresa Emisora
                                            </option>
                                            @if (isset($empresasEmisoras))
                                                @foreach ($empresasEmisoras as $empresaEmisora)
                                                    <option value="{{ $empresaEmisora->id }}">
                                                        {{ $empresaEmisora->razon_social }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('rfc_emisor')
                                            <span class="text-red-500 text-xs italic" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="correo_contacto"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                            Empresa Receptora</label>
                                        <select name="rfc_receptor" id="rfc_receptor"
                                            class="peer block w-full border-2 rounded-sm p-0 text-base text-gray-900 focus:ring-0">
                                            <option value="{{ old('rfc_receptor') }}" disabled selected>Empresa Receptora
                                            </option>
                                            @if (isset($empresasReceptoras))
                                                @foreach ($empresasReceptoras as $empresaReceptora)
                                                    <option value="{{ $empresaReceptora->id }}"
                                                        {{ old('rfc_receptor') == $empresaReceptora->id ? 'selected' : '' }}>
                                                        {{ $empresaReceptora->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('rfc_receptor')
                                            <span class="text-red-500 text-xs italic" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="folio_factura"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                            Folio de Factura</label>
                                        <select name="folio_factura" id="folio_factura"
                                            class="peer block w-full border-2 rounded-sm p-0 text-base text-gray-900 focus:ring-0">
                                            <option value="{{ old('folio_factura') }}" disabled selected>Folio de Factura
                                            </option>
                                            @if (isset($facturas))
                                                @foreach ($facturas as $factura)
                                                    <option value="{{ $factura->id }}"
                                                        {{ old('folio_factura') == $factura->id ? 'selected' : '' }}>
                                                        {{ $factura->folio_factura }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('folio_factura')
                                            <span class="text-red-500 text-xs italic" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Buscar Factura"
                                class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25" />
                        </div>
                    </form>

                </div>
            </div>



            <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                    <img class="w-full rounded-t-2xl" src="{{ asset('img/register.png') }}" alt="profile cover image">

                </div>
            </div>

        </div>

        @if (session('error'))
        <div class="alert alert-danger">
            <div class="my-10 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <h1 class="text-black text-sm lg:text-2xl text-center font-bold">{{ session('error') }}</h1>
            </div>
        </div>
        @endif

        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by Lorena Marisol Romero Hernández
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

@endsection