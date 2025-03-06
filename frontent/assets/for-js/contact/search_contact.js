document.addEventListener('DOMContentLoaded',function(){
    const inputfield = document.getElementById('searchContactByName');
  
    inputfield.addEventListener('submit',function(event){
        event.preventDefault();

        const nameValue = document.getElementById('namefield').value;
        console.log(nameValue);
        
        if(nameValue === ""){
            alert("Please Enter a name");
            return;
        }

        fetch(`http://localhost:8000/backend/api/contact/search_contact.php?name=${nameValue}`)
        .then( response =>{
            return response.json( );
          })
          .then( data =>{
            console.log(data);
            console.log(data.length);

            if(data.length==='undefined'){
                alert("No matching Contact found!");
                return;
            }
            let leadList = document.getElementById('tablebody');
            leadList.innerHTML = '';

            let rows = '';
            for (let i = 0; i < data.length; i++) {
                rows += `
                    <tr>
                        <td>${data[i].id}</td>
                        <td>${data[i].name}</td>
                        <td>${data[i].email}</td>
                        <td>${data[i].phone}</td>
                    </tr>
                `;
            }
            leadList.insertAdjacentHTML('beforeend', rows);
            
             tableContainer.style.display = 'block'; 
          })
        .catch(error => {
            console.error("Fetch error:", error);
        });
    
    })
     
})