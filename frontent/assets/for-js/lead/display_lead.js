
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
                    <a href="update_lead.html?id=${element.id}" class="btn btn-warning">Edit</a>

                   <button type="button" class= "btn btn-danger" onclick="deleteFunction(${element.id})" > DELETE </button>
                </td>
         `;
         leadList.appendChild(row);

     });

})
}

 window.deleteFunction = function($lead_id){
    
     let myobject = {id:$lead_id};
    fetch('http://localhost:8000/backend/api/leads/delete_lead.php' , {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(myobject)
    })
    .then(function(responce){
        return responce.json();
    })
    .then(function(data){
        console.log(data);
        alert("Delete Successfully!");
        displayLead();
    })
     
}