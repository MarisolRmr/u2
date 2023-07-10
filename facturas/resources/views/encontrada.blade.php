@extends('layouts.app')

@section('titulo')
    Factura Encontrada
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
        <div class="alert alert-success">
       
            <div class="flex flex-col">
                
                <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="overflow-hidden">
                                <table class="min-w-full pt-2">
                                    <thead class="bg-gray-200 border-b rounded-2xl bg-clip-border">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                ID
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Empresa Emisora
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Empresa Receptora
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Folio de Factura
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                PDF
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                XML
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Creado
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($facturaEncontrada)
                                            <tr class="bg-white border-b rounded-md transition duration-300 ease-in-out hover:bg-gray-100 ">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 ">
                                                    {{ $facturaEncontrada->id }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $facturaEncontrada->empresaEmisora->razon_social }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $facturaEncontrada->empresaReceptora->nombre }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $facturaEncontrada->folio_factura }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @if ($facturaEncontrada->archivopdf)
                                                        <a href="{{ asset('uploadspdf/' . $facturaEncontrada->archivopdf) }}"
                                                            target="_blank"> PDF
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @if ($facturaEncontrada->archivoxml)
                                                        <a href="{{ asset('uploadsxml/' . $facturaEncontrada->archivoxml) }}"
                                                            target="_blank">XML
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $facturaEncontrada->created_at->format('d-m-Y') }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No se encontraron facturas registradas</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
</div>

    

@endsection
