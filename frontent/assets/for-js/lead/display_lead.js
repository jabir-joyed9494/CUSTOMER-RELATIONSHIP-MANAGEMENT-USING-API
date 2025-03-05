
displayLead();

function displayLead(){
    fetch('http://localhost:8000/backend/api/leads/display_lead.php')
.then(function(responce){
    return responce.json();
})
.then(function(data){
    console.log(data);

    let leadList = document.getElementById('leadDisplay');
    leadList.innerHTML = '';
    
     data.forEach(element => {
         const row = document.createElement('tr');
         row.innerHTML = `
           <td>${element.id} </td>
            <td>${element.name} </td>
             <td>${element.email} </td>
              <td>${element.phone} </td>
              <td>
                  <button> Edit </button>
                  <button type="button" class= "btn btn-danger" onclick="deleteFunction(${element.id})" > DELETE </button>
              </td>
         `;
         leadList.appendChild(row);

     });

})
}

function deleteFunction($lead_id){
    
    
     
}