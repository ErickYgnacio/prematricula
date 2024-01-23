<?php

namespace App\Livewire;

use App\Livewire\Forms\ApoderadoForm;
use App\Livewire\Forms\EstudianteForm;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Sanguineo;
use App\Models\Seguro;
use Livewire\Component;

class Formulario extends Component
{
    public $seguros, $sanguineos;
    public $estudiante;
    public $mensaje = '';

    public EstudianteForm $estudianteForm;
    public ApoderadoForm $apoderadoForm;

    public function mount()
    {
        $this->estudianteForm->cargarDatosIniciales();
        $this->seguros = Seguro::all();
        $this->sanguineos = Sanguineo::all();
    }

    # Estudiante

    public function buscarEstudiante()
    {
        $this->estudianteForm->buscarEstudiante();

        if ($this->estudianteForm->apoderado_id != 0) {
            $this->apoderadoForm->findApoderadoById($this->estudianteForm->apoderado_id);
        } else {
            $this->apoderadoForm->valorDefault();
        }
    }

    public function datosProvincias()
    {
        $this->estudianteForm->datosProvincias();
    }
    public function datosDistritos()
    {
        $this->estudianteForm->datosDistritos();
    }

    public function menordeEdad()
    {
        $this->estudianteForm->menordeEdad();
    }

    # Apoderado

    public function buscarApoderado()
    {
        $this->apoderadoForm->buscarApoderado();
    }

    # CRUD

    public function guardar()
    {
        $this->estudianteForm->guardar();
        $this->apoderadoForm->guardar();
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
