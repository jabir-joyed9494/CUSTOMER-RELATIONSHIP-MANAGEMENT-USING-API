document.addEventListener('DOMContentLoaded', function () {
    const searchfield = document.getElementById('searchLeadByName');

    searchfield.addEventListener('submit', function (event) {
        event.preventDefault();

        const leadName = document.getElementById('namefield').value;

        const myDataObject = { name:leadName }

        fetch('http://localhost:8000/backend/api/leads/search_lead.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(myDataObject)
        })

            .then(response => {
                return response.json()
            })

            .then(data =>
                console.log(data)
            );



    });
});



