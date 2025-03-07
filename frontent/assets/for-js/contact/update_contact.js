document.addEventListener("DOMContentLoaded", function () {
    // Get lead ID from URL
    const urlParams = new URLSearchParams(window.location.search);
    const leadId = urlParams.get("id");
      console.log(leadId);
    if (!leadId) {
        alert("No lead ID found!");
        return;
    }

    const leadIdInput = document.getElementById("leadId");
    let nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");

    fetch(`http://localhost:8000/backend/api/contact/get_contact.php?id=${leadId}`)
        .then(response => response.json())
        .then(data => {
           
            console.log(data);
            leadIdInput.value = data.id;
            nameInput.value = data.name;
            emailInput.value = data.email;
            phoneInput.value = data.phone;
        })
        .catch(error => console.error("Error fetching lead:", error));

  // Handle form submission
    document.getElementById("editLeadForm").addEventListener("submit", function (event) {
        
        event.preventDefault();
        const updatedLead = {
            id: leadIdInput.value,
            name: nameInput.value,
            email: emailInput.value,
            phone: phoneInput.value
        };

        fetch("http://localhost:8000/backend/api/contact/update_contact.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(updatedLead)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            alert(data.message);
            window.location.href = "display_contact.html"; 
        })
        .catch(error => console.error("Error updating lead:", error));
    });
});
