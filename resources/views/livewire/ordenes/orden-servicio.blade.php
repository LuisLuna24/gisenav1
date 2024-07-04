<div>
    <form wire:submit="enviar_orden" method="POST">
        <div class="mt-3 flex justify-end">
            <button type="submit"
                class="flex items-center justify-center px-5 py-3 text-white transition-all duration-500 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-send-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" />
                    <path d="M6.5 12h14.5" />
                </svg>{{ __('Enviar Orden') }}
            </button>
        </div>
        <div class="grid grid-cols-1 max-md:grid-cols-1 gap-5 dark:text-white">
            <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                <div class="flex flex-col">
                    <label for="prioridad">Prioridad:</label>
                    <x-select wire:model="OrdenServicio.prioridad">
                        <option value="">{{ __('Seleccione una opción') }}</option>
                        <option value="Normal">{{ __('Normal') }}</option>
                        <option value="Urgente">{{ __('Urgente') }}</option>
                    </x-select>
                    <x-input-error for="prioridad" />
                </div>
                <div class="flex flex-col">
                    <label for="factura">{{ __('Requiere Factura') }}:</label>
                    <x-select wire:model="OrdenServicio.factura">
                        <option value="">{{ __('Seleccione una opción') }}</option>
                        <option value="Si">{{ __('Si') }}</option>
                        <option value="No">No</option>
                    </x-select>
                    <x-input-error for="factura" />
                </div>
            </div>
            <div class="grid grid-cols-1 max-md:grid-cols-1 gap-3">
                <div class="flex flex-col">
                    <div class="flex justify-between">
                        <label for="interesado">Interesado:</label>
                        <label class="text-white">
                            <input
                                class="dark:border-white-400/20 dark:scale-100 transition-all duration-500 ease-in-out dark:hover:scale-110 dark:checked:scale-100 w-4 h-4"
                                type="checkbox" id="selectInteresado" /> {{ __('¿Es igual al cliente?') }}
                        </label>
                    </div>
                    <x-select wire:model="OrdenServicio.interesado" id="interesado">
                        <option value="">{{ __('Seleccione una opción') }}</option>
                        @foreach ($interesados as $interesado)
                            <option value="{{ $interesado->id_interesado }}">
                                {{ $interesado->nombre . ' ' . $interesado->a_paterno . ' ' . $interesado->a_materno }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="interesado" />
                </div>
            </div>
        </div>

    </form>
    <br>
    @livewire('ordenes.muestra', [
        'num_orden' => $num_orden,
    ])
    @livewire('ordenes.tabla_muestras', [
        'num_orden' => $num_orden,
        'etc' => $etc,
    ])
</div>
