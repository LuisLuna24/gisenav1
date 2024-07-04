<div wire:poll>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subcategoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipo Muestra
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripción
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipo Análisis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Análisis Especifico
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
                @foreach ($muetras as $muetra)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            wire:key="muestra-{{ $muetra->id_muestra_orden_servicio }}">
                            {{ $muetra->catalogo_categoria->nombre_categoria }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $muetra->catalogo_subcategoria->nom_subcategoria }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $muetra->catalogo_tipo_muestra->nom_tipo_muestra }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $muetra->descrip_muestra->nombre_descrip }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $muetra->catalogo_tipo_analisis->nomb_tipo_analisis }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $muetra->catalogo_analisis_especifico->nombre_analisis_especifico }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-button-nosunmit wire:click="edit_mues({{ $muetra->id_muestra_orden_servicio }})"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </x-button-nosunmit>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <x-danger-button wire:click="delete_mues({{ $muetra->id_muestra_orden_servicio }})"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-x">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M10 12l4 4m0 -4l-4 4" />
                                </svg>
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($etc == 1)
        <div class="flex justify-end mt-3">
            <a href="{{ route('ordenes.show', $num_orden) }}"
                class="flex items-center justify-center px-5 py-3 text-white transition-all duration-500 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md shadow-md">
                {{ __('Siguiente') }}
            </a>
        </div>
    @endif

    {{-- ===================================================================Eliminar Muestra --}}
    <x-dialog-modal wire:model="delete_muetsra">
        <x-slot name='title'>
            <h2 class="text-center">¿Desea eliminar esta muestra?</h2>
        </x-slot>
        <x-slot name='content'>
            <div class="flex justify-around max-md:flex-col w-full">
                <x-button wire:click="eliminar_muestra">Eliminar</x-button>
                <x-danger-button wire:click="cancelar_muestra">Cancelar</x-danger-button>
            </div>
        </x-slot>
        <x-slot name='footer'></x-slot>
    </x-dialog-modal>

    {{-- ===================================================================Agregar Nueva Muestra --}}
    <x-dialog-modal wire:model="edit_muestras">
        <x-slot name='title'>
            <h2 class="text-center">Editar Muestra</h2>
        </x-slot>
        <x-slot name='content'>
            <div>
                <form wire:submit="editar_muestra">
                    <div class="grid gap-3">
                        <div>
                            <h2 class="mb-2 mt-3 text-2xl dark:text-white">Procedencia</h2>
                            <hr>
                        </div>
                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.sitio_muestreo_procedencia">Sitio de Muestreo:</label>
                                <x-input wire:model="EditMustra.sitio_muestreo_procedencia" />
                                <x-input-error for="EditMustra.sitio_muestreo_procedencia" />
                            </div>

                            <div class="flex flex-col">
                                <label for="EditMustra.nombre_sitio_procedencia">Nombre del sitio de muestreo:</label>
                                <x-input wire:model="EditMustra.nombre_sitio_procedencia" />
                                <x-input-error for="EditMustra.nombre_sitio_procedencia" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.estado_procedencia">Estado:</label>
                                <x-select wire:model.live="EditMustra.estado_procedencia">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id_estado }}">{{ $estado->nombre }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.estado_procedencia" />

                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.municipio_procedencia">Municipio:</label>
                                <x-select wire:model.live="EditMustra.municipio_procedencia">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id_municipio }}">
                                            {{ $municipio->nombre }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.municipio_procedencia" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.colonia_procedencia">Colonia:</label>
                                <x-select wire:model.live="EditMustra.colonia_procedencia">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($colonias as $colonia)
                                        <option value="{{ $colonia->id_colonia }}">{{ $colonia->nombre_colonia }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.colonia_procedencia" />

                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.calle_procedencia">Calle:</label>
                                <x-input wire:model="EditMustra.calle_procedencia" />
                                <x-input-error for="EditMustra.calle_procedencia" />

                            </div>
                        </div>
                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                                <div class="flex flex-col">
                                    <label for="EditMustra.num_exterior_procedencia">No. Exterior:</label>
                                    <x-input wire:model="EditMustra.num_exterior_procedencia" />
                                    <x-input-error for="EditMustra.num_exterior_procedencia" />

                                </div>
                                <div class="flex flex-col">
                                    <label for="EditMustra.num_interior_procedencia">No. Interior:</label>
                                    <x-input wire:model="EditMustra.num_interior_procedencia" />
                                    <x-input-error for="EditMustra.num_interior_procedencia" />
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.cp_procedencia">Codigo Postal:</label>
                                <x-input wire:model="EditMustra.cp_procedencia" />
                                <x-input-error for="EditMustra.cp_procedencia" />

                            </div>
                        </div>
                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.gps_procedencia">GPS:</label>
                                <x-input wire:model="EditMustra.gps_procedencia" />
                                <x-input-error for="EditMustra.gps_procedencia" />

                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.Sader_proceSaderdencia">Registro Sader:</label>
                                <x-input wire:model="EditMustra.sader_procedencia" />
                                <x-input-error for="EditMustra.sader_procedencia" />

                            </div>
                        </div>
                    </div>
                    {{-- ===================================================================================== Datos de la muestra --}}
                    <div class="grid gap-3">
                        <div>
                            <h2 class="mb-2 mt-3 text-2xl dark:text-white">Datos de la muestra</h2>
                            <hr>
                        </div>
                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.categoria_muestra">Categoria de la muestra:</label>
                                <x-select wire:model.live="EditMustra.categoria_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($categorias as $categotia)
                                        <option value="{{ $categotia->id_categoria }}">
                                            {{ $categotia->nombre_categoria }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.categoria_muestra" />

                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.subcategoria_muestra">Subcategoria de la muestra:</label>
                                <x-select wire:model.live="EditMustra.subcategoria_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id_subcategoria }}">
                                            {{ $subcategoria->nom_subcategoria }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.subcategoria_muestra" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.tipo_muestra">Tipo de la muestra:</label>
                                <x-select wire:model.live="EditMustra.tipo_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($tipo_muestras as $tipo_muestra)
                                        <option value="{{ $tipo_muestra->id_tipo_muestra }}">
                                            {{ $tipo_muestra->nom_tipo_muestra }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.tipo_muestra" />
                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.descripcion_muestra">Descripcion de la muestra:</label>
                                <x-select wire:model.live="EditMustra.descripcion_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($descripcion_muestras as $descripcion_muestra)
                                        <option value="{{ $descripcion_muestra->id_descrip_muestra }}">
                                            {{ $descripcion_muestra->nombre_descrip }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.descripcion_muestra" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.tipo_analisis_mueestra">Tipo de la Analisis:</label>
                                <x-select wire:model.live="EditMustra.tipo_analisis_mueestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($tipo_analises as $tipo_analisis)
                                        <option value="{{ $tipo_analisis->id_tipo_analisis }}">
                                            {{ $tipo_analisis->nomb_tipo_analisis }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.tipo_analisis_mueestra" />

                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.analisis_especifico_muestra">Analisis Especifico:</label>
                                <x-select wire:model.live="EditMustra.analisis_especifico_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($analisis_especificos as $analisis_especifico)
                                        <option value="{{ $analisis_especifico->id_analisis_especifico }}">
                                            {{ $analisis_especifico->nombre_analisis_especifico }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.analisis_especifico_muestra" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.cantidad_muestra">Cantidad de muestra:</label>
                                <x-input wire:model="EditMustra.cantidad_muestra" placeholder="mililitros o gramos" />
                                <x-input-error for="EditMustra.cantidad_muestra" />
                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.lote_muestra">No. Lote:</label>
                                <x-input wire:model="EditMustra.lote_muestra" />
                                <x-input-error for="EditMustra.lote_muestra" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.productor_muestra">Productor o Responsable:</label>
                                <x-input wire:model="EditMustra.productor_muestra" />
                                <x-input-error for="EditMustra.productor_muestra" />
                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.fecha_muestreo_muestra">Fecha de Muestreo:</label>
                                <x-input type="date" wire:model="EditMustra.fecha_muestreo_muestra" />
                                <x-input-error for="EditMustra.fecha_muestreo_muestra" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="EditMustra.idioma_muestra">Idioma Informe:</label>
                                <x-select wire:model.live="EditMustra.idioma_muestra">
                                    <option value="Español">Español</option>
                                    <option value="Ingles">Ingles</option>
                                </x-select>
                                <x-input-error for="EditMustra.idioma_muestra" />
                            </div>
                            <div class="flex flex-col">
                                <label for="EditMustra.contenedor_muestra">Contenedor:</label>
                                <x-select wire:model.live="EditMustra.contenedor_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($contenedores as $contenedor)
                                        <option value="{{ $contenedor->idcontenedor }}">
                                            {{ $contenedor->tipo_contenedor }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="EditMustra.contenedor_muestra" />
                            </div>
                        </div>

                        <div class="w-full flex justify-around m-5">
                            <x-button>Editar</x-button>
                            <x-danger-button wire:click="cancel_edit_muestra">Cancelar</x-danger-button>
                        </div>
                    </div>
                </form>
            </div>
        </x-slot>
        <x-slot name='footer'></x-slot>
    </x-dialog-modal>

</div>
