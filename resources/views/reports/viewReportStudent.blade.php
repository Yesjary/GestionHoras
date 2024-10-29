<h2>Reportes Pendientes</h2>
@foreach($pendingReports as $report)
    <div>
        <p>{{ $report->report_content }}</p>
    </div>
@endforeach

<h2>Reportes Aceptados</h2>
@foreach($approvedReports as $report)
    <div>
        <p>{{ $report->report_content }}</p>
    </div>
@endforeach

<h2>Reportes Rechazados</h2>
@foreach($rejectedReports as $report)
    <div>
        <p>{{ $report->report_content }}</p>
    </div>
@endforeach
