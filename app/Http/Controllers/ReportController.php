<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function create()
    {
        return view('reports.newReport');
    }

    public function store(Request $request) {
        $report = new Report();
        $report->user_id = auth()->user()->id;
        $report->report_content = $request->input('report_content');
        $report->save();
        return redirect()->back()->with('message', 'Reporte enviado correctamente');
    }
    
    public function index() {
        // Solo el jefe de servicio verá los reportes pendientes
        $reports = Report::where('status', 'pending')->get();
        return view('reports.viewReports', compact('reports'));
    }

    public function indexStudent() {
        // Obtener el ID del usuario autenticado
        $userId = auth()->user()->id;
    
        // Obtener los reportes del usuario y separarlos por estado
        $pendingReports = Report::where('user_id', $userId)
                                ->where('status', 'pending')
                                ->get();
    
        $approvedReports = Report::where('user_id', $userId)
                                 ->where('status', 'approved')
                                 ->get();
    
        $rejectedReports = Report::where('user_id', $userId)
                                 ->where('status', 'rejected')
                                 ->get();
    
        return view('reports.viewReportStudent', compact('pendingReports', 'approvedReports', 'rejectedReports'));
    }
    
    
    
    public function approve($id) {
        $report = Report::findOrFail($id);
        $report->status = 'approved';
        $report->save();
        return view('dashboard');
    }
    
    public function reject($id) {
        $report = Report::findOrFail($id);
        $report->status = 'rejected';
        $report->save();
        return redirect()->back()->with('success', 'Reporte rechazado');
    }
}
