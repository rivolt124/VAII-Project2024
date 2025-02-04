document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('flightSearch');
    const tableRows = document.querySelectorAll('table tbody tr');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase();

        tableRows.forEach(row => {
            const originCell = row.cells[1];
            const destinationCell = row.cells[2];

            const origin = originCell.textContent.toLowerCase();
            const destination = destinationCell.textContent.toLowerCase();

            if (origin.includes(query) || destination.includes(query)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
