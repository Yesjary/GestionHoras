@foreach($reports as $report)
    <div>
        <p>{{ $report->report_content }}</p>
        <form action="/report/{{ $report->id }}/approve" method="POST">
            @csrf
            <button type="submit">Aprobar</button>
        </form>
        <form action="/report/{{ $report->id }}/reject" method="POST">
            @csrf
            <button type="submit">Rechazar</button>
        </form>
    </div>
@endforeach