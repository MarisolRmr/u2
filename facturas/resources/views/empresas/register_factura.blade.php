@extends('layouts.app')

@section('titulo')
    Registrar Facturas
@endsection

<!-- Directiva para integrar los estilos de Dropzone-->
@push('styles')
    <!-- Estilo Dropzone-->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="/resources/js/app.js"></script>
@endpush

@section('contenido_top')
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>
@endsection

@section('contenido')
    <br> <br>
    <div class="relative w-full mx-auto mt-500 ">

        <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div
                        class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                        <img src="{{ asset('img/admin.png') }}" alt="profile_image" class="w-full shadow-2xl rounded-xl" />
                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-1 dark:text-white">Administrador</h5>
                        <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Admin</p>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                    <div class="relative right-0">
                      <ul class="relative flex flex-wrap p-1 list-none bg-gray-50 rounded-xl" nav-pills role="tablist">
                        <li class="z-30 flex-auto text-center">
                          <a href="{{ route('factura.listado', auth()->user()->username) }} " class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700" nav-link active href="javascript:;" role="tab" aria-selected="true">
                            <i class="ni ni-app"></i>
                            <span class="ml-2">Listado Facturas</span>
                          </a>
                        </li>
                      </ul>
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
                    <form action="{{ route('factura.store', auth()->user()->username) }}" method="POST" novalidate
                        enctype="multipart/form-data">

                        @csrf

                        @if (session('mensaje'))
                            <div class="bg-green-500 p-2 rounded-lg mb-6 text-black text-center uppercase font-bold">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="empresa_emisora"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Empresa
                                            Emisora</label>
                                        <select name="empresa_emisora" id="empresa_emisora"
                                            class="peer block w-full border-2 rounded-sm p-0 text-base text-gray-900 focus:ring-0">
                                            <option value="{{ old('empresa_emisora') }}" disabled selected>Empresa Emisora
                                            </option>
                                            @if (isset($empresasEmisoras))
                                                @foreach ($empresasEmisoras as $empresaEmisora)
                                                    <option value="{{ $empresaEmisora->id }}">
                                                        {{ $empresaEmisora->razon_social }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="empresa_receptora"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">RFC
                                            receptor</label>
                                        <select name="empresa_receptora" id="empresa_receptora"
                                            class="peer block w-full border-2 rounded-sm p-0 text-base text-gray-900 focus:ring-0">
                                            <option value="{{ old('empresa_receptora') }}" disabled selected>Empresa
                                                Receptora
                                            </option>
                                            @if (isset($empresasReceptoras))
                                                @foreach ($empresasReceptoras as $empresaReceptora)
                                                    <option value="{{ $empresaReceptora->id }}"
                                                        {{ old('empresa_receptora') == $empresaReceptora->id ? 'selected' : '' }}>
                                                        {{ $empresaReceptora->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                {{-- Agregamos campo oculto para la subida de archivo pdf --}}
                                <div class="mb-4">
                                    <input name="archivopdf" type="hidden" id="archivopdf" value="{{ old('value') }}" />
                                    @error('archivopdf')
                                        <p class="bg-red-500 text-red my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }} </p>
                                    @enderror
                                </div>

                                {{-- Agregamos campo oculto para la subida de archivo xml --}}
                                <div class="mb-4">
                                    <input name="archivoxml" type="hidden" id="archivoxml" value="{{ old('value') }}" />
                                    @error('archivoxml')
                                        <p class="bg-red-500 text-red my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="folio"
                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Folio
                                            de Factura</label>
                                        <input type="text" id="folio" name="folio" placeholder="Folio de Factura"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Registrar factura"
                                class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25" />
                        </div>
                    </form>



                    {{-- Form para la subida de archivos --}}
                    <div class=" flex justify-center">

                        <div class="my-5 mx-5">
                            <form action="{{ route('factura.storepdf') }}" method="POST" enctype="multipart/form-data"
                                id="dropzonepdf"
                                class="dropzone border-dashed border-2 w-100 h-100 rounded flex justify-center items-center">
                                @csrf
                            </form>
                        </div>

                        <div class="my-5 mx-5">
                            <form action="{{ route('factura.storexml') }}" method="POST" enctype="multipart/form-data"
                                id="dropzonexml"
                                class="dropzone border-dashed border-2 w-100 h-100 rounded flex justify-center items-center">
                                @csrf
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                    <img class="w-full rounded-t-2xl" src="{{ asset('img/register.png') }}" alt="profile cover image">

                </div>
            </div>

            

        </div>

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
    @endsection