<?php include __DIR__ . "/../partials/header.view.php" ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: []
        });

        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/getAll/veilles', true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.response);
                const events = data.map(event => ({
                    id: event.veille_id,
                    title: event.title,
                    start: event.start,
                    end: event.end
                }));

                calendar.addEventSource(events);
            } else {
                const responseData = JSON.parse(xhr.responseText);
                console.log(responseData);
            }
        };

        xhr.onerror = function() {
            console.log("Check again");
        };

        xhr.send();

        calendar.render();
    });
</script>

<div id='calendar'></div>
<?php include __DIR__ . "/../partials/footer.view.php" ?>