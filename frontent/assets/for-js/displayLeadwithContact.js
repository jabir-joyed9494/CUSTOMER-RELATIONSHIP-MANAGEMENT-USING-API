  // Fetch leads data
  fetch('http://localhost:8000/backend/api/leads/getAllLeads.php')
  .then(function(response) {
      return response.json();
  })
  .then(function(leads) {
      const leadsTableBody = document.querySelector('#leadsTable tbody');

      leads.forEach((element) => {
          let leadid = { id: element.id };

          fetch('http://localhost:8000/backend/api/contact/get_contactById.php', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(leadid)
          })
          .then(function(response) {
              return response.json();
          })
          .then(function(contact) {

              let row = document.createElement('tr');

              row.innerHTML = `
                  <td>${element.id}</td>
                  <td>${element.name}</td>
                  <td>${element.email}</td>
                  <td>${element.phone}</td>
                  <td>
                      <ul class="list-unstyled">
                          ${contact.map(contactElement => `
                              <li>
                                  <strong>Contact ID:</strong> ${contactElement.id} <br>
                                  <strong>Name:</strong> ${contactElement.name} <br>
                                  <strong>Email:</strong> ${contactElement.email} <br>
                                  <strong>Phone:</strong> ${contactElement.phone} <br>
                              </li>
                          `).join('')}
                      </ul>
                  </td>
              `;

              leadsTableBody.appendChild(row);
          });
      });
  })
  .catch(function(error) {
      console.error('Error:', error);
  });
































// fetch('http://localhost:8000/backend/api/leads/getAllLeads.php')
// .then(function(responce){
//     return responce.json();
// })
// .then(function(leads){
//    // console.log(leads);
    
//     leads.forEach( (element) => { 

//        // console.log(element.id);

//         let leadid = { id: element.id };

//          fetch('http://localhost:8000/backend/api/contact/get_contactById.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify(leadid)
//         })
//         .then(function(responce){
//             return responce.json();
//         })
//         .then (function(contact){
//             console.log("leads:", element.id, element.name,element.email,element.phone);
//            // console.log(contact);
//            contact.forEach((contact_element)=>{
//             console.log("Contact:", contact_element.id,contact_element.name,contact_element.email,contact_element.phone);
//            })

//         })
//     });

// })