
fetch('http://localhost:8000/backend/api/contact/display_contact.php')
.then(function(response){
    return response.json();
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
                    <a href="update_contact.html?id=${element.id}" class="btn btn-warning">Edit</a>

                   <button type="button" class= "btn btn-danger" onclick="deleteFunction(${element.id})" > DELETE </button>
                </td>
         `;
         leadList.appendChild(row);

     });

})

window.deleteFunction = function($contact_id){
    const myObject ={ id: $contact_id}

    fetch('http://localhost:8000/backend/api/contact/delete_contact.php', {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(myObject)
    })
    
    .then(response => {
        return response.json( )
    })
    
    .then(function(data){
      console.log(data);
      alert("Delete Successfully!");
      window.location.href = 'display_contact.html';
    })
    
    
    
}

