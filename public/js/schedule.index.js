document.addEventListener('DOMContentLoaded', function () {
    // Assuming you have a button or form for buying a ticket
    const buyTicketButtons = document.querySelectorAll('.buy-ticket-btn');

    buyTicketButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const flightNumber = button.getAttribute('data-flight-number');
            // Example: Make an AJAX request to handle the ticket purchase
            fetch('/?c=ticket&a=buy', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ flight_number: flightNumber })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    alert("Ticket successfully purchasedzxczxc!");
                    // Optionally, you could reload the page or update the ticket list dynamically
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
