document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('searchLeadByName'); 
    
    const tableContainer = document.querySelector('.tableforjs');

    tableContainer.style.display = 'none';

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault(); 

        const leadName = document.getElementById('namefield').value.trim(); 
         console.log(leadName);
        if (leadName === "") {
            alert("Please enter a name to search.");
            return;
        }
        fetch(`http://localhost:8000/backend/api/leads/search_lead.php?name=${leadName}`)
        .then(response => response.text())  // Get response as text
        .then(data => {
            console.log("API Response:", data);
            console.log("Length of data:", data.length);
            return JSON.parse(data);
        })
        .then(parsedData => {
            console.log("Parsed JSON Data:", parsedData);
            console.log(parsedData.length);
             

          
            let leadList = document.getElementById('tablebody');
                        leadList.innerHTML = '';
            
                        if (parsedData.length === undefined) {
                            tableContainer.style.display = 'none'; 
                            alert("No matching leads found.");
                            return;
                        }
            
                        let rows = '';
                        for (let i = 0; i < parsedData.length; i++) {
                            rows += `
                                <tr>
                                    <td>${parsedData[i].id}</td>
                                    <td>${parsedData[i].name}</td>
                                    <td>${parsedData[i].email}</td>
                                    <td>${parsedData[i].phone}</td>
                                </tr>
                            `;
                        }
                        leadList.insertAdjacentHTML('beforeend', rows);
                        
                         tableContainer.style.display = 'block'; 
          

        })
        .catch(error => console.error("Fetch error:", error));
    });
});


