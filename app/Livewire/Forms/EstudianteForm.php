<?php

namespace App\Livewire\Forms;

use App\Models\Apoderado;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Estudiante;
use App\Models\Provincia;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EstudianteForm extends Form
{
    public $distritosDomicilio, $departamentos, $provincias =[], $distritosNacimiento =[];

    public $estudiante;
    public $mensaje = 'Alumno Nuevo';
    public $menordeEdad = false;
    public $encontrado = false;
    public $apoderado_id;

    public $dniestudiante;
    public $fechaNacimiento;
    public $nombres;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $sexo;
    public $direccion;
    public $distritoDomicilio = 150137;
    public $departamentoNacimiento = 15;
    public $provinciaNacimiento = 1501;
    public $distritoNacimiento;
    public $telefonoFijo;
    public $numeroCelular;
    public $correoElectronico;
    public $confirmarCorreo;
    public $tipoSeguroMedico;
    public $grupoSanguineo;
    public $enfermedadesAlergias;
    public $medicinasEmergencia;

    public function guardar(){
        
    }

    public function cargarDatosIniciales(){
        $this->distritosDomicilio = Distrito::where('provincia_id', 1501)->get();
        $this->departamentos = Departamento::all();
        $this->provincias = Provincia::where('departamento_id', 15)->get();
        $this->distritosNacimiento = Distrito::where('provincia_id', 1501)->get();
    }

    public function buscarEstudiante()
    {
        if (strlen($this->dniestudiante) === 8) {
            // Busca al estudiante por el DNI
            $this->estudiante = Estudiante::where('dni', $this->dniestudiante)->first();

            if ($this->estudiante) {
                $this->fechaNacimiento = $this->estudiante->fecha_nacimiento;
                $this->nombres = $this->estudiante->nombres;
                $this->apellidoPaterno = $this->estudiante->ape_paterno;
                $this->apellidoMaterno = $this->estudiante->ape_materno;
                $this->sexo = $this->estudiante->sexo;
                $this->direccion = $this->estudiante->direccion;
                $this->distritoDomicilio = $this->estudiante->distrito_de_domicilio;
                $this->departamentoNacimiento = $this->estudiante->departamento;
                $this->provinciaNacimiento = $this->estudiante->provincia;
                $this->distritoNacimiento = $this->estudiante->distrito;
                $this->telefonoFijo = $this->estudiante->telefono;
                $this->numeroCelular = $this->estudiante->movil;
                $this->correoElectronico = $this->estudiante->correo;
                $this->tipoSeguroMedico = $this->estudiante->seguro_id;
                $this->grupoSanguineo = $this->estudiante->sanguineo_id;
                $this->enfermedadesAlergias = $this->estudiante->enfermedades;
                $this->medicinasEmergencia = $this->estudiante->medicinas;

                $this->apoderado_id = $this->estudiante->apoderado_id;
                $this->encontrado = true;
                $this->mensaje = 'El alumno ya se encuentra registrado en la Pre-Matricula';

                
                $this->menordeEdad();
            } else {
                $this->reset([
                    'fechaNacimiento',
                    'nombres',
                    'apellidoPaterno',
                    'apellidoMaterno',
                    'sexo',
                    'direccion',
                    'distritoDomicilio',
                    'departamentoNacimiento',
                    'provinciaNacimiento',
                    'distritoNacimiento',
                    'telefonoFijo',
                    'numeroCelular',
                    'correoElectronico',
                    'confirmarCorreo',
                    'tipoSeguroMedico',
                    'grupoSanguineo',
                    'enfermedadesAlergias',
                    'medicinasEmergencia',
                    'mensaje',
                    'encontrado',
                    'apoderado_id',
                ]);
            }
        }
    }

    public function datosProvincias()
    {
            // Puedes obtener las provincias de alguna fuente, por ejemplo, de una base de datos o un array estático
            $this->provincias = Provincia::where('departamento_id', $this->departamentoNacimiento)->get();
            $this->provinciaNacimiento = null; // Restablece la provincia seleccionada
            $this->distritosNacimiento = []; // Restablece el distrito seleccionado
    }
    public function datosDistritos()
    {
            // Puedes obtener las provincias de alguna fuente, por ejemplo, de una base de datos o un array estático
            $this->distritosNacimiento = Distrito::where('provincia_id', $this->provinciaNacimiento)->get();            
    }

    public function menordeEdad(){
        $fecha = $this->fechaNacimiento;
        $fecha = explode('-', $fecha);
        $fecha = $fecha[0];
        $edad = date('Y') - $fecha;
        if($edad < 18){
            $this->menordeEdad = true;
        }else{
            $this->menordeEdad = false;
        }
    }
}
