<div>
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        

        <form wire:submit="guardar">
            {{-- FORMULARIO ESTUDIANTE --}}
            <div>
                <div class="flex items-center mb-2">
                    <h3 class="font-semibold text-3xl leading-tight">
                        Datos del Alumno
                    </h3>
                </div>
                @if ($estudianteForm->encontrado)
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">¡Encontrado!</strong>
                        <span class="block sm:inline">{{ $estudianteForm->mensaje }}.</span>
                    </div>
                    
                @endif
                <x-section-border></x-section-border>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <x-label>DNI</x-label>
                        <x-input wire:model="estudianteForm.dniestudiante" wire:keydown="buscarEstudiante"></x-input>
                        <x-input-error for="estudianteForm.dniestudiante" />
                    </div>
                    <div>
                        <x-label>Fecha de nacimiento:</x-label>
                        <x-input type="date" wire:model="estudianteForm.fechaNacimiento"
                            wire:change="menordeEdad"></x-input>
                        <x-input-error for="estudianteForm.fechaNacimiento" />
                    </div>

                    <div>
                        <x-label>Nombres:</x-label>
                        <x-input wire:model="estudianteForm.nombres"></x-input>
                        <x-input-error for="estudianteForm.nombres" />
                    </div>

                    <div>
                        <x-label>Apellido paterno:</x-label>
                        <x-input wire:model="estudianteForm.apellidoPaterno"></x-input>
                        <x-input-error for="estudianteForm.apellidoPaterno" />
                    </div>

                    <div>
                        <x-label>Apellido materno:</x-label>
                        <x-input wire:model="estudianteForm.apellidoMaterno"></x-input>
                        <x-input-error for="estudianteForm.apellidoMaterno" />
                    </div>

                    <div>
                        <x-label>Sexo:</x-label>
                        <x-select wire:model="estudianteForm.sexo">
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                        </x-select>
                        <x-input-error for="estudianteForm.sexo" />
                    </div>

                    <div>
                        <x-label>Dirección de domicilio:</x-label>
                        <x-input wire:model="estudianteForm.direccion"></x-input>
                        <x-input-error for="estudianteForm.direccion" />
                    </div>

                    <div>
                        <x-label>Distrito de domicilio:</x-label>
                        <x-select wire:model="estudianteForm.distritoDomicilio">
                            @foreach ($estudianteForm->distritosDomicilio as $distrito)
                                <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="estudianteForm.distritoDomicilio" />
                    </div>

                    <div>
                        <x-label>Departamento (nacimiento):</x-label>
                        <x-select wire:model="estudianteForm.departamentoNacimiento" wire:change="datosProvincias">
                            <option>Seleccione un departamento</option>
                            @foreach ($estudianteForm->departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="estudianteForm.departamentoNacimiento" />
                    </div>

                    <div>
                        <x-label>Provincia (nacimiento):</x-label>
                        <x-select wire:model="estudianteForm.provinciaNacimiento" wire:change="datosDistritos">
                            <option>Seleccione una provincia</option>
                            @foreach ($estudianteForm->provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="estudianteForm.provinciaNacimiento" />
                    </div>

                    <div>
                        <x-label>Distrito (nacimiento):</x-label>
                        <x-select wire:model="estudianteForm.distritoNacimiento">
                            <option>Seleccione un distrito</option>
                            @foreach ($estudianteForm->distritosNacimiento as $distritoNac)
                                <option value="{{ $distritoNac->id }}">{{ $distritoNac->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="estudianteForm.distritoNacimiento" />
                    </div>

                    <div>
                        <x-label>Número de teléfono fijo:</x-label>
                        <x-input wire:model="estudianteForm.telefonoFijo"></x-input>
                        <x-input-error for="estudianteForm.telefonoFijo" />
                    </div>

                    <div>
                        <x-label>Número de móvil (celular):</x-label>
                        <x-input wire:model="estudianteForm.numeroCelular"></x-input>
                        <x-input-error for="estudianteForm.numeroCelular" />
                    </div>

                    <div>
                        <x-label>Correo electrónico:</x-label>
                        <x-input wire:model="estudianteForm.correoElectronico"></x-input>
                        <x-input-error for="estudianteForm.correoElectronico" />
                    </div>

                    <div>
                        <x-label>Confirmar correo electrónico:</x-label>
                        <x-input wire:model="estudianteForm.confirmarCorreo"></x-input>
                        <x-input-error for="estudianteForm.confirmarCorreo" />
                    </div>

                    <div>
                        <x-label>Tipo de seguro médico:</x-label>
                        <x-select wire:model="estudianteForm.tipoSeguroMedico">
                            <option>Seleccione un seguro</option>
                            @foreach ($seguros as $seguro)
                                <option value="{{ $seguro->id }}">{{ $seguro->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="estudianteForm.tipoSeguroMedico" />
                    </div>

                    <div>
                        <x-label>Tipo de grupo sanguíneo:</x-label>
                        <x-select wire:model="estudianteForm.grupoSanguineo">
                            <option>Seleccione un grupo sanguíneo</option>
                            @foreach ($sanguineos as $sanguineo)
                                <option value="{{ $sanguineo->id }}">{{ $sanguineo->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="estudianteForm.grupoSanguineo" />
                    </div>

                    <div>
                        <x-label>Enfermedades y/o alergias:</x-label>
                        <x-textarea wire:model="estudianteForm.enfermedadesAlergias"></x-textarea>
                        <x-input-error for="estudianteForm.enfermedadesAlergias" />
                    </div>

                    <div>
                        <x-label>Antibióticos y/o medicinas en emergencia:</x-label>
                        <x-textarea wire:model="estudianteForm.medicinasEmergencia"></x-textarea>
                        <x-input-error for="estudianteForm.medicinasEmergencia" />
                    </div>
                </div>
            </div>

            {{-- FORMULARIO APODERADO --}}
            @if ($estudianteForm->menordeEdad)
                <x-section-border></x-section-border>
                <div>
                    <div class="flex items-center">
                        <h3 class="font-semibold text-3xl leading-tight">
                            Datos del Apoderado
                        </h3>
                    </div>
                    <x-section-border></x-section-border>
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <x-label>DNI</x-label>
                            <x-input wire:model="apoderadoForm.dniapoderado" wire:keydown="buscarApoderado"></x-input>
                            <x-input-error for="apoderadoForm.dniapoderado" />
                        </div>

                        <div>
                            <x-label>Fecha de nacimiento:</x-label>
                            <x-input type="date" wire:model="apoderadoForm.fechaNacimiento"></x-input>
                            <x-input-error for="apoderadoForm.fechaNacimiento" />
                        </div>

                        <div>
                            <x-label>Nombres:</x-label>
                            <x-input wire:model="apoderadoForm.nombres"></x-input>
                            <x-input-error for="apoderadoForm.nombres" />
                        </div>

                        <div>
                            <x-label>Apellido paterno:</x-label>
                            <x-input wire:model="apoderadoForm.apellidoPaterno"></x-input>
                            <x-input-error for="apoderadoForm.apellidoPaterno" />
                        </div>

                        <div>
                            <x-label>Apellido materno:</x-label>
                            <x-input wire:model="apoderadoForm.apellidoMaterno"></x-input>
                            <x-input-error for="apoderadoForm.apellidoMaterno" />
                        </div>

                        <div>
                            <x-label>Dirección de domicilio:</x-label>
                            <x-input wire:model="apoderadoForm.direccion"></x-input>
                            <x-input-error for="apoderadoForm.direccion" />
                        </div>

                        <div>
                            <x-label>Distrito de domicilio:</x-label>
                            <x-select wire:model="apoderadoForm.distritoDomicilio">
                                {{-- @foreach ($apoderadoForm->distritosDomicilio as $distrito)
                                <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                            @endforeach --}}
                            </x-select>
                            <x-input-error for="apoderadoForm.distritoDomicilio" />
                        </div>

                        <div>
                            <x-label>Departamento (nacimiento):</x-label>
                            <x-select wire:model="apoderadoForm.departamentoNacimiento" wire:change="datosProvincias">
                                <option>Seleccione un departamento</option>
                                {{-- @foreach ($apoderadoForm->departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach --}}
                            </x-select>
                            <x-input-error for="apoderadoForm.departamentoNacimiento" />
                        </div>

                        <div>
                            <x-label>Provincia (nacimiento):</x-label>
                            <x-select wire:model="apoderadoForm.provinciaNacimiento" wire:change="datosDistritos">
                                <option>Seleccione una provincia</option>
                                {{-- @foreach ($apoderadoForm->provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                            @endforeach --}}
                            </x-select>
                            <x-input-error for="apoderadoForm.provinciaNacimiento" />
                        </div>

                        <div>
                            <x-label>Distrito (nacimiento):</x-label>
                            <x-select wire:model="apoderadoForm.distritoNacimiento">
                                <option>Seleccione un distrito</option>
                                {{-- @foreach ($apoderadoForm->distritosNacimiento as $distritoNac)
                                <option value="{{ $distritoNac->id }}">{{ $distritoNac->nombre }}</option>
                            @endforeach --}}
                            </x-select>
                            <x-input-error for="apoderadoForm.distritoNacimiento" />
                        </div>

                        <div>
                            <x-label>Número de teléfono fijo:</x-label>
                            <x-input wire:model="apoderadoForm.telefonoFijo"></x-input>
                            <x-input-error for="apoderadoForm.telefonoFijo" />
                        </div>

                        <div>
                            <x-label>Número de móvil (celular):</x-label>
                            <x-input wire:model="apoderadoForm.numeroCelular"></x-input>
                            <x-input-error for="apoderadoForm.numeroCelular" />
                        </div>

                        <div>
                            <x-label>Correo electrónico:</x-label>
                            <x-input wire:model="apoderadoForm.correoElectronico"></x-input>
                            <x-input-error for="apoderadoForm.correoElectronico" />
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-4">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>
    </div>
</div>
