<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard principal del panel de administración.
     */
    public function index()
    {
        // Esta función se encarga de mostrar la página principal del panel.
        // Por ahora, solo devuelve la plantilla visual (la "vista").
        // En el futuro, desde aquí le pasaremos datos como estadísticas, etc.
        return view('admin.dashboard');
    }
}