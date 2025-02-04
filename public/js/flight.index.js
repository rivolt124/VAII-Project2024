document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('flightSearch');
    const tableRows = document.querySelectorAll('table tbody tr'); // Select all table rows in the tbody

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase();

        tableRows.forEach(row => {
            const originCell = row.cells[1]; // The second cell (index 1) contains the origin
            const destinationCell = row.cells[2]; // The third cell (index 2) contains the destination

            const origin = originCell.textContent.toLowerCase();
            const destination = destinationCell.textContent.toLowerCase();

            if (origin.includes(query) || destination.includes(query)) {
                row.style.display = ''; // Show the row
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
    });
});
