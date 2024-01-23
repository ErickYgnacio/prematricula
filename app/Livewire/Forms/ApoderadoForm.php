<?php

namespace App\Livewire\Forms;

use App\Models\Apoderado;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ApoderadoForm extends Form
{
    public $distritosDomicilio, $departamentos, $provincias =[], $distritosNacimiento =[];

    public $apoderado;
    public $mensaje = false;

    public $dniapoderado;
    public $fechaNacimiento;
    public $nombres;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $direccion;
    public $distritoDomicilio = 150137;
    public $departamentoNacimiento = 15;
    public $provinciaNacimiento = 1501;
    public $distritoNacimiento;
    public $telefonoFijo;
    public $numeroCelular;
    public $correoElectronico;

    public function guardar(){
        
    }

    public function buscarApoderado()
    {
        if (strlen($this->dniapoderado) === 8) {
            // Busca al apoderado por el DNI
            $this->apoderado = Apoderado::where('dni', $this->dniapoderado)->first();

            if ($this->apoderado) {
                $this->fechaNacimiento = $this->apoderado->fecha_nacimiento;
                $this->nombres = $this->apoderado->nombres;
                $this->apellidoPaterno = $this->apoderado->ape_paterno;
                $this->apellidoMaterno = $this->apoderado->ape_materno;
                $this->direccion = $this->apoderado->direccion;
                $this->distritoDomicilio = $this->apoderado->distrito_de_domicilio;
                $this->departamentoNacimiento = $this->apoderado->departamento;
                $this->provinciaNacimiento = $this->apoderado->provincia;
                $this->distritoNacimiento = $this->apoderado->distrito;
                $this->telefonoFijo = $this->apoderado->telefono;
                $this->numeroCelular = $this->apoderado->movil;
                $this->correoElectronico = $this->apoderado->correo;

                $this->mensaje = true;
            } else {
                $this->reset([
                    'apoderado',
                    'fechaNacimiento',
                    'nombres',
                    'apellidoPaterno',
                    'apellidoMaterno',
                    'direccion',
                    'distritoDomicilio',
                    'departamentoNacimiento',
                    'provinciaNacimiento',
                    'distritoNacimiento',
                    'telefonoFijo',
                    'numeroCelular',
                    'correoElectronico',
                    'mensaje',
                ]);
            }
        }
    }

    public function findApoderadoById($apoderado_id){
        $this->apoderado = Apoderado::where('id', $apoderado_id)->first();
        if ($this->apoderado) {
            $this->dniapoderado = $this->apoderado->dni;
            $this->fechaNacimiento = $this->apoderado->fecha_nacimiento;
            $this->nombres = $this->apoderado->nombres;
            $this->apellidoPaterno = $this->apoderado->ape_paterno;
            $this->apellidoMaterno = $this->apoderado->ape_materno;
            $this->direccion = $this->apoderado->direccion;
            $this->distritoDomicilio = $this->apoderado->distrito_de_domicilio;
            $this->departamentoNacimiento = $this->apoderado->departamento;
            $this->provinciaNacimiento = $this->apoderado->provincia;
            $this->distritoNacimiento = $this->apoderado->distrito;
            $this->telefonoFijo = $this->apoderado->telefono;
            $this->numeroCelular = $this->apoderado->movil;
            $this->correoElectronico = $this->apoderado->correo;

            $this->mensaje = true;
        } else {
            $this->reset([
                'fechaNacimiento',
                'nombres',
                'apellidoPaterno',
                'apellidoMaterno',
                'direccion',
                'distritoDomicilio',
                'departamentoNacimiento',
                'provinciaNacimiento',
                'distritoNacimiento',
                'telefonoFijo',
                'numeroCelular',
                'correoElectronico',
                'mensaje',
            ]);
        }
    }

    public function valorDefault()
    {
        $this->reset([
            'dniapoderado',
            'fechaNacimiento',
            'nombres',
            'apellidoPaterno',
            'apellidoMaterno',
            'direccion',
            'distritoDomicilio',
            'departamentoNacimiento',
            'provinciaNacimiento',
            'distritoNacimiento',
            'telefonoFijo',
            'numeroCelular',
            'correoElectronico',
            'mensaje',
        ]);
    }
}
