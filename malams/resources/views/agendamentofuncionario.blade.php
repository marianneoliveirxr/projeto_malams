<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda do Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        #calendar { max-width: 1100px; margin: 40px auto; padding: 10px; }
    </style>
</head>
<body>
    <h2 style="text-align: center; margin-top: 20px;">Agenda do Funcionário #{{ $idFuncionario }}</h2>
    <div id="calendar"></div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: @json($events),
                eventClick: function(info) {
                    alert(
                        'Cliente: ' + info.event.title +
                        '\\nData/Hora: ' + new Date(info.event.start).toLocaleString()
                    );
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>