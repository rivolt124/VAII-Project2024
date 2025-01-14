 document.addEventListener('DOMContentLoaded', function ()
 {
    const searchInput = document.getElementById('flightSearch');
    const flightCards = document.querySelectorAll('.flight-card');

    searchInput.addEventListener('input', function ()
    {
        const query = searchInput.value.toLowerCase();

        flightCards.forEach(card =>
        {
            const origin = card.getAttribute('data-origin');
            const destination = card.getAttribute('data-destination');

            if (origin.includes(query) || destination.includes(query))
            {
                card.style.display = '';
            }
            else
            {
                card.style.display = 'none';
            }
        });
    });
});