<!-- resources/views/tickets/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
</head>

<body>
    <h1>Ticket Details</h1>
    <p>{{ $ticket->content }}</p>

    <button onclick="printTicket()">Print Ticket</button>

    <script>
        function printTicket() {
            window.print();
        }
    </script>
</body>

</html>