<!DOCTYPE html>
<html>

<head>
    <title>Calendario</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!--fullcalendar plugin files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <!-- for plugin notification -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>

    <div class="container">
        <h3 style="text-align: center">Calendario</h3>
        <div id="calendar"></div>
    </div>

    <script>
        $(document).ready(function() {

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: "<?php echo $this->Url->build(['controller' =>'Fullcalendar', 'action'=>'loadData']) ?>",
                displayEventTime: false,
                editable: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {

                    var title = prompt('Nombre de la actividad:');
                    var hora_inicio = prompt('Hora de inicio:');
                    var hora_fin = prompt('Hora de fin:');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                        $.ajax({
                            url: "<?php echo $this->Url->build(['controller' =>'Fullcalendar', 'action'=>'ajax']) ?>",
                            data: {
                                title: title,
                                hora_inicio:hora_inicio,
                                hora_fin:hora_fin,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            type: "POST",
                            success: function(data) {
                                displayMessage("Event Created Successfully");

                                calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: title,
                                    start: start,
                                    hora_inicio:hora_inicio,
                                    hora_fin:hora_fin,
                                    end: end,
                                    allDay: allDay
                                }, true);

                                calendar.fullCalendar('unselect');
                            }
                        });
                    }
                },

                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    $.ajax({
                        url: "<?php echo $this->Url->build(['controller' =>'Fullcalendar', 'action'=>'ajax']) ?>",
                        data: {
                            title: event.title,
                            hora_inicio:event.hora_inicio,
                            hora_fin:event.hora_fin,
                            start: start,
                            end: end,
                            id: event.id,
                            type: 'update'
                        },
                        type: "POST",
                        success: function(response) {

                            displayMessage("Event Updated Successfully");
                        }
                    });
                },
                
                eventClick: function(event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo $this->Url->build(['controller' =>'Fullcalendar', 'action'=>'ajax']) ?>",
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function(response) {

                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event Deleted Successfully");
                            }
                        });
                    }
                }

            });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>

</body>

</html>