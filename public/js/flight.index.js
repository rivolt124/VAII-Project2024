// AJAX
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('flightSearch');
    const tableBody = document.querySelector('table tbody');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toUpperCase();

        fetch('/?c=flight&a=searchFlights', {                  // posle ajax request na server
            method: 'POST',                                   // request je POST typu -> bude na server posielat volaco
            headers: {'Content-Type': 'application/json'},    // telo requestu bude obsahovat json data
            body: JSON.stringify({ query: query })      // telo requestu je json str toho query resultu (stringify ho skonvertuje do formatu pre server)
        })
            .then(response => response.json())      // spracuje odpoved od serveru -> pretipuje ju na json
            .then(data => {                                   //  filtrovane lety
                tableBody.innerHTML = '';

                data.flights.forEach(flight => {
                    const row = document.createElement('tr');

                    const originCell = document.createElement('td');
                    originCell.textContent = flight.origin;
                    const destinationCell = document.createElement('td');
                    destinationCell.textContent = flight.destination;

                    row.appendChild(originCell);
                    row.appendChild(destinationCell);
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error getting the filtered flight data from servr', error);
            });
    });
});
