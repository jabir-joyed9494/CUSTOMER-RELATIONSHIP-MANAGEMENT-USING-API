document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('searchLeadByName'); 
    const tableContainer = document.querySelector('.tableforjs');

    tableContainer.style.display = 'none';

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault(); 

        const leadName = document.getElementById('namefield').value.trim(); 

        if (leadName === "") {
            alert("Please enter a name to search.");
            return;
        }

        const myDataObject = { name: leadName };

        fetch(`http://localhost:8000/backend/api/leads/search_lead.php?name=${leadName}`)
        .then(response => response.json())
        .then(data => {
            console.log("API Response:", data);
            console.log("Length of data:", data.length);

            let leadList = document.getElementById('tablebody');
            leadList.innerHTML = '';

            if (data.length === undefined) {
                tableContainer.style.display = 'none'; 
                alert("No matching leads found.");
                return;
            }

            let rows = '';
            for (let i = 0; i < data.length; i++) {
                rows += `
                    <tr>
                        <td>${data[i].id}</td>
                        <td>${data[i].name}</td>
                        <td>${data[i].email}</td>
                        <td>${data[i].phone}</td>
                        <td>
                            <a href="add_contact.html?id=${data[i].id}" class="btn btn-warning">ADD CONTACT</a>
                        </td>
                    </tr>
                `;
            }
            leadList.insertAdjacentHTML('beforeend', rows);
            
             tableContainer.style.display = 'block'; 
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });
    });
});
