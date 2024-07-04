<div class="grid gap-5">
    <div>
        <x-input-error for="fecha1" />
        <x-input-error for="fecha2" />
    </div>
    <div class="flex gap-2 flex-row w-full justify-between">
        <div class="dark:text-white flex flex-col">
            <label for="">Registros:</label>
            <x-select wire:model.live="registros">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </x-select>
        </div>
        <div class="dark:text-white flex flex-col">
            <label for="">Estado:</label>
            <x-select wire:model.live="estado_orden">
                <option value="">Todos</option>
                <option value="Envío">Envío</option>
                <option value="Recepción">Recepción</option>
                <option value="Analísis">Analísis</option>
                <option value="Liberada">Liberada</option>
                <option value="Cancelada">Cancelada</option>
            </x-select>
        </div>
        <div class="dark:text-white flex flex-col">
            <label for="Del">{{ __('End date') }}:</label>
            <x-input type="date" wire:model.live="fecha1" />
        </div>
        <div class="dark:text-white flex flex-col">
            <label for="Al">{{ __('Start date') }}:</label>
            <x-input type="date" wire:model.live="fecha2" />
        </div>
        <div class="dark:text-white flex flex-col w-full ">
            <label for="">Buscar:</label>
            <x-input wire:model.live="search" class="w-full" placeholder="(No. Orden)" />
        </div>
        <div class="grid place-items-end">
            <x-button-routing href="{{ route('ordenes.create') }}"> <svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                    <path d="M12 11l0 6" />
                    <path d="M9 14l6 0" />
                </svg> <span>{{ __('Nuevo') }}</span>
            </x-button-routing>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No. Orden
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Orden
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Factura
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estatus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Interesado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Editar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cancelar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $orden->numero_orden_servicio }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $orden->fecha_orden }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $orden->requiere_factura }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $orden->estatus_orden }}
                        </td>
                        @if ($orden->id_interesado)
                            <td class="px-6 py-4">
                                {{ $orden->interesado->nombre . ' ' . $orden->interesado->a_paterno . ' ' . $orden->interesado->a_materno }}
                            </td>
                        @else
                            <td class="px-6 py-4">
                                {{ $orden->clientes->razon_social }}
                            </td>
                        @endif
                        @if ($orden->estatus_orden == 'Envío')
                            <td class="px-6 py-4 text-right">
                                <x-button-routing
                                    href="{{ route('ordenes.show', $orden->numero_orden_servicio) }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg></x-button-routing>
                            </td>
                        @else
                            <td class="px-6 py-4 text-right">
                            </td>
                        @endif
                        <td class="px-6 py-4 text-right">
                            <x-danger-button wire:click="delete({{$orden->numero_orden_servicio}})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-x">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M10 12l4 4m0 -4l-4 4" />
                                </svg></x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="m-3">
        {{ $ordenes->links() }}
    </div>



    {{-- ===================================================================Agregar Nueva Muestra --}}
    <x-dialog-modal wire:model="cancelar_orden">
        <x-slot name='title'>
            <h2 class="text-center">¿Desea cancelar esta orden?</h2>
            <p class="text-center">{{$cancelar_orden_id}}</p>
        </x-slot>
        <x-slot name='content'>
            <div  class="flex justify-around m-5">
                <x-button wire:click="delete_orden">Cancelar Orden</x-button>
                <x-danger-button wire:click="regresar_orden">Regresar</x-danger-button>
            </div>
        </x-slot>
        <x-slot name='footer'></x-slot>
    </x-dialog-modal>
</div>
