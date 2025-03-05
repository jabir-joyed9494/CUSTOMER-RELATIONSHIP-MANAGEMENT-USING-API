
const formElement = document.getElementById('inputfield');

document.addEventListener('submit', (event) => {
    
    event.preventDefault();

    const namefield = document.getElementById('namefield');
    const emailfield = document.getElementById('emailfield');
    const phonefield = document.getElementById('phonefield');

    const nameValue = namefield.value;
    const emailValue = emailfield.value;
    const phoneValue = phonefield.value;

    console.log(nameValue,emailValue,phoneValue);
    
    if (nameValue && emailValue && phoneValue) {
        // Creating an object
        const leadData = {
            name: nameValue,
            email: emailValue,
            phone: phoneValue
        };
        fetch('http://localhost:8000/backend/api/leads/add_lead.php',{
               method : 'POST',
               headers:{
                "Content-Type": "application/json"
               },
               body:JSON.stringify(leadData)
        })
        // .then(function(response){
        //     return response.json();
        // })
        .then(function(data){
             console.log(data.json());
           alert("Lead added successfuly");
           namefield.value = "";
           emailfield.value = "";
           phonefield.value = "";
        })
    } else {
        alert("Please fill all the fields");
    }
});
