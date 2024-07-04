<div>
    <div class="flex justify-end m-3">
        <x-button wire:click="open_modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                <path d="M12 11l0 6" />
                <path d="M9 14l6 0" />
            </svg> Nuevo </x-button>
    </div>

    {{-- ===================================================================Agregar Nueva Muestra --}}
    <x-dialog-modal wire:model="orden_muestras">
        <x-slot name='title'>
            <h2 class="text-center text-2xl">Nueva Muestra</h2>
        </x-slot>
        <x-slot name='content'>
            <div>
                <form wire:submit="new_muestra">
                    <div class="grid gap-3">
                        <div>
                            <div class="flex justify-between items-center">
                                <h2 class="mb-2 mt-3 text-2xl dark:text-white">Procedencia</h2>
                                <x-button-nosunmit wire:click=reset_procedencia>Nueva Procedencia</x-button-nosunmit>
                            </div>
                            <hr>
                        </div>
                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="sitio_muestreo_procedencia">Sitio de Muestreo:</label>
                                <x-input wire:model="sitio_muestreo_procedencia" />
                                <x-input-error for="sitio_muestreo_procedencia" />
                            </div>

                            <div class="flex flex-col">
                                <label for="nombre_sitio_procedencia">Nombre del sitio de muestreo:</label>
                                <x-input wire:model="nombre_sitio_procedencia" />
                                <x-input-error for="nombre_sitio_procedencia" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="estado_procedencia">Estado:</label>
                                <x-select wire:model.live="estado_procedencia">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id_estado }}">{{ $estado->nombre }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="estado_procedencia" />

                            </div>
                            <div class="flex flex-col">
                                <label for="municipio_procedencia">Municipio:</label>
                                <x-select wire:model.live="municipio_procedencia">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id_municipio }}">
                                            {{ $municipio->nombre }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="municipio_procedencia" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="colonia_procedencia">Colonia:</label>
                                <x-select wire:model.live="colonia_procedencia">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($colonias as $colonia)
                                        <option value="{{ $colonia->id_colonia }}">{{ $colonia->nombre_colonia }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="colonia_procedencia" />

                            </div>
                            <div class="flex flex-col">
                                <label for="calle_procedencia">Calle:</label>
                                <x-input wire:model="calle_procedencia" />
                                <x-input-error for="calle_procedencia" />

                            </div>
                        </div>
                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                                <div class="flex flex-col">
                                    <label for="num_exterior_procedencia">No. Exterior:</label>
                                    <x-input wire:model="num_exterior_procedencia" />
                                    <x-input-error for="num_exterior_procedencia" />

                                </div>
                                <div class="flex flex-col">
                                    <label for="num_interior_procedencia">No. Interior:</label>
                                    <x-input wire:model="num_interior_procedencia" />
                                    <x-input-error for="num_interior_procedencia" />
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label for="cp_procedencia">Codigo Postal:</label>
                                <x-input wire:model="cp_procedencia" />
                                <x-input-error for="cp_procedencia" />

                            </div>
                        </div>
                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="gps_procedencia">GPS:</label>
                                <x-input wire:model="gps_procedencia" />
                                <x-input-error for="gps_procedencia" />

                            </div>
                            <div class="flex flex-col">
                                <label for="Sader_proceSaderdencia">Registro Sader:</label>
                                <x-input wire:model="sader_procedencia" />
                                <x-input-error for="sader_procedencia" />

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
                                <label for="categoria_muestra">Categoria de la muestra:</label>
                                <x-select wire:model.live="categoria_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($categorias as $categotia)
                                        <option value="{{ $categotia->id_categoria }}">
                                            {{ $categotia->nombre_categoria }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="categoria_muestra" />

                            </div>
                            <div class="flex flex-col">
                                <label for="subcategoria_muestra">Subcategoria de la muestra:</label>
                                <x-select wire:model.live="subcategoria_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id_subcategoria }}">
                                            {{ $subcategoria->nom_subcategoria }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="subcategoria_muestra" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="tipo_muestra">Tipo de la muestra:</label>
                                <x-select wire:model.live="tipo_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($tipo_muestras as $tipo_muestra)
                                        <option value="{{ $tipo_muestra->id_tipo_muestra }}">
                                            {{ $tipo_muestra->nom_tipo_muestra }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="tipo_muestra" />
                            </div>
                            <div class="flex flex-col">
                                <label for="descripcion_muestra">Descripcion de la muestra:</label>
                                <x-select wire:model.live="descripcion_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($descripcion_muestras as $descripcion_muestra)
                                        <option value="{{ $descripcion_muestra->id_descrip_muestra }}">
                                            {{ $descripcion_muestra->nombre_descrip }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="descripcion_muestra" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="tipo_analisis_mueestra">Metodo:</label>
                                <x-select wire:model.live="tipo_analisis_mueestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($tipo_analises as $tipo_analisis)
                                        <option value="{{ $tipo_analisis->id_tipo_analisis }}">
                                            {{ $tipo_analisis->nomb_tipo_analisis }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="tipo_analisis_mueestra" />

                            </div>
                            <div class="flex flex-col">
                                <label for="analisis_especifico_muestra">Analisis:</label>
                                <x-select wire:model.live="analisis_especifico_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($analisis_especificos as $analisis_especifico)
                                        <option value="{{ $analisis_especifico->id_analisis_especifico }}">
                                            {{ $analisis_especifico->nombre_analisis_especifico }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="analisis_especifico_muestra" />

                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <x-label-info><x-slot name='title'>Cantidad de muestra:</x-slot><x-slot name='content'>Colocar la cantidad de muestra enviada</x-slot></x-label-info>
                                
                                <x-input wire:model="cantidad_muestra" />
                                <x-input-error for="cantidad_muestra" />
                            </div>
                            <div class="flex flex-col">
                                <label for="lote_muestra">No. Lote:</label>
                                <x-input wire:model="lote_muestra" />
                                <x-input-error for="lote_muestra" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="productor_muestra">Productor o Responsable:</label>
                                <x-input wire:model="productor_muestra" />
                                <x-input-error for="productor_muestra" />
                            </div>
                            <div class="flex flex-col">
                                <label for="fecha_muestreo_muestra">Fecha de Muestreo:</label>
                                <x-input type="date" wire:model="fecha_muestreo_muestra" />
                                <x-input-error for="fecha_muestreo_muestra" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                            <div class="flex flex-col">
                                <label for="idioma_muestra">Idioma Informe:</label>
                                <x-select wire:model.live="idioma_muestra">
                                    <option value="Español">Español</option>
                                    <option value="Ingles">Ingles</option>
                                </x-select>
                                <x-input-error for="idioma_muestra" />
                            </div>
                            <div class="flex flex-col">
                                <label for="contenedor_muestra">Contenedor:</label>
                                <x-select wire:model.live="contenedor_muestra">
                                    <option value="">{{ __('Seleccione una opción') }}</option>
                                    @foreach ($contenedores as $contenedor)
                                        <option value="{{ $contenedor->idcontenedor }}">
                                            {{ $contenedor->tipo_contenedor }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="contenedor_muestra" />
                            </div>
                        </div>

                        <div class="w-full flex justify-around m-5">
                            <x-button>Guardar</x-button>
                            <x-danger-button wire:click="cancel_edit_muestra">Cancelar</x-danger-button>
                        </div>
                    </div>
                </form>
            </div>
        </x-slot>
        <x-slot name='footer'></x-slot>
    </x-dialog-modal>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const selectInteresado = document.getElementById('selectInteresado');
        const interesadoInput = document.getElementById('interesado');

        selectInteresado.addEventListener('change', () => {
            if (selectInteresado.checked) {
                interesadoInput.disabled = true;
                interesadoInput.value = '';
            } else {
                interesadoInput.disabled = false;
            }
        });
    });
</script>