// AJAX
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('flightSearch');
    const tableBody = document.querySelector('table tbody');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toUpperCase();

        fetch('/?c=flight&a=searchFlights', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ query: query })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                tableBody.innerHTML = '';

                data.flights.forEach(flight => {
                    const row = document.createElement('tr');

                    const flightNumberCell = document.createElement('td');
                    flightNumberCell.textContent = flight['flight_number']; // Assuming flightNumber is a key in the response
                    const originCell = document.createElement('td');
                    originCell.textContent = flight['origin'];
                    const destinationCell = document.createElement('td');
                    destinationCell.textContent = flight['destination'];
                    const airplaneCell = document.createElement('td');
                    airplaneCell.textContent = flight['airplane'];  // Assuming airplane is a key in the response
                    const actionsCell = document.createElement('td');
                    actionsCell.innerHTML = `
                        <a href="/?c=flight&a=edit&id=${flight.id}" class="btn btn-primary btn-sm border-0">Edit</a>
                        <a href="/?c=flight&a=delete&id=${flight.id}" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure you want to delete this flight?');">Delete</a>
                    `;

                    row.appendChild(flightNumberCell);
                    row.appendChild(originCell);
                    row.appendChild(destinationCell);
                    row.appendChild(airplaneCell);
                    row.appendChild(actionsCell);

                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error getting the filtered flight data from servr', error);
            });
    });
});
