<div>
    <form wire:submit="new_order" method="POST">

        <div class="grid grid-cols-1 max-md:grid-cols-1 gap-5 dark:text-white">
            <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3">
                <div class="flex flex-col">
                    <label for="prioridad">Prioridad:</label>
                    <x-select wire:model="prioridad">
                        <option value="">{{ __('Seleccione una opción') }}</option>
                        <option value="Normal">{{ __('Normal') }}</option>
                        <option value="Urgente">{{ __('Urgente') }}</option>
                    </x-select>
                    <x-input-error for="prioridad" />
                </div>
                <div class="flex flex-col">
                    <label for="">{{ __('Requiere Factura') }}:</label>
                    <x-select wire:model="factura">
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
                                type="checkbox" id="selectInteresado" wire:change="interesado_igual" /> {{ __('¿Es igual al cliente?') }}
                        </label>
                    </div>
                    <x-select wire:model="interesado" id="interesado">
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
        <div class="mt-3 flex justify-end">
            <button type="submit" class="flex items-center justify-center px-5 py-3 text-white transition-all duration-500 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md shadow-md">
                {{ __('Siguiente') }}
            </button>
        </div>
    </form>
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