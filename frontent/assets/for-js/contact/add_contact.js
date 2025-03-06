document.addEventListener('DOMContentLoaded', function () {

    const urlParams = new URLSearchParams(window.location.search);
    const leadId = urlParams.get("id");
    console.log("Lead ID:", leadId); // Check if you are getting the ID correctly.

    const inputfield = document.getElementById('editContactForm');
    
    inputfield.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting and refreshing the page

        let nameValue = document.getElementById('name').value;
        let emailValue = document.getElementById('email').value;
        let phoneValue = document.getElementById('phone').value;

        console.log("Name:", nameValue);
        console.log("Email:", emailValue);
        console.log("Phone:", phoneValue);
        console.log("Lead ID:", leadId);

        // Validate that all fields are filled
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
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(function (data) {
                    console.log("API Response:", data);
                    alert("Lead Added Successfully!");
                })
                .catch(function (error) {
                    console.error('Errrrrrrrrrrrror:', error);
                    alert("Error: Unable to add contact");
                });

        } else {
            alert("Please Fill All The Fields!");
        }
    });
});
