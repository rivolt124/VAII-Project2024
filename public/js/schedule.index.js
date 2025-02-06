document.addEventListener('DOMContentLoaded', function () {
    const buyTicketButtons = document.querySelectorAll('.buy-ticket-btn');

    buyTicketButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const flightNumber = button.getAttribute('data-flight-number');
            fetch('/?c=ticket&a=buy', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ flight_number: flightNumber })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    alert("Ticket successfully purchased!");
                } else {
                    alert("There was an issue purchasing the ticket.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Something went wrong. Please try again.");
            });
        });
    });
});
