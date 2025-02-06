<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Ticket</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6E7BFF, #4A90E2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .ticket {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 450px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .ticket h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #4A90E2;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .ticket .company {
            font-size: 1.5rem;
            color: #666;
            margin-top: -15px;
            margin-bottom: 25px;
        }

        .ticket p {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #333;
        }

        .ticket p strong {
            color: #4A90E2;
        }

        .ticket::before {
            content: "";
            position: absolute;
            top: -30px;
            left: 50%;
            width: 50%;
            height: 20px;
            background-color: #4A90E2;
            border-radius: 50%;
            transform: translateX(-50%);
        }

        .ticket::after {
            content: "";
            position: absolute;
            bottom: -30px;
            left: 50%;
            width: 50%;
            height: 20px;
            background-color: #4A90E2;
            border-radius: 50%;
            transform: translateX(-50%);
        }

        .ticket .details {
            border-top: 2px solid #4A90E2;
            margin-top: 20px;
            padding-top: 15px;
        }
    </style>
</head>
<body>
<div class="ticket">
    <h2>Flight Ticket</h2>
    <div class="company">UNIZA TRAVEL</div>
    <p><strong>Ticket Number:</strong> <?php echo $ticket->getTicketNumber(); ?></p>
    <p><strong>Flight Number:</strong> <?php echo $ticket->getFlightNumber(); ?></p>
    <p><strong>Departure Date:</strong> <?php echo date('Y-m-d', strtotime($departureDate[0]->getDate())); ?></p>
    <p><strong>Passenger:</strong> <?php echo $passenger->getName(); ?></p>

    <div class="details">
        <p><strong>Issued by:</strong> UNIZA TRAVEL</p>
        <p><strong>Date of Issue:</strong> <?php echo date('Y-m-d'); ?></p>
    </div>
</div>
</body>
</html>
