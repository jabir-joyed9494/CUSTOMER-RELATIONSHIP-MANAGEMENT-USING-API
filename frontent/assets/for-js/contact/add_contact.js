document.addEventListener('DOMContentLoaded', function () {

    const urlParams = new URLSearchParams(window.location.search);
    const leadId = urlParams.get("id");
    console.log("Lead ID:", leadId); 

    const inputfield = document.getElementById('editContactForm');
    
    inputfield.addEventListener('submit', function (event) {
        event.preventDefault(); 

        let nameValue = document.getElementById('name').value;
        let emailValue = document.getElementById('email').value;
        let phoneValue = document.getElementById('phone').value;

        console.log("Name:", nameValue);
        console.log("Email:", emailValue);
        console.log("Phone:", phoneValue);
        console.log("Lead ID:", leadId);

        
        if (nameValue && emailValue && phoneValue) {
            const contactinfo = {
                name: nameValue,
                email: emailValue,
                phone: phoneValue,
                leadid: leadId
            };

            fetch('http://localhost:8000/backend/api/contact/add_contact.php', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(contactinfo)
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    console.log("API Response:", data);
                    alert("Lead Added Successfully!");
                    window.location.href = "searchleadfor_addcontact.html";
                })
                .catch(function (error) {
                    console.error('Error:', error);
                    alert("Error: Unable to add contact");
                });

        } else {
            alert("Please Fill All The Fields!");
        }
    });
});
