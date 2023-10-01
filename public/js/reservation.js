const submit = document.getElementById('submit');

const saveData= (e)=>{
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const table_number = document.getElementById('table_number').value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const data = {
        name:name,
        email:email,
        phone:phone,
        date:date,
        time:time,
        table_number:table_number
    }
    fetch('/table_reserved', {
        method: 'POST', // Adjust the HTTP method as needed (e.g., GET, POST, PUT, DELETE)
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN':csrfToken // Include the CSRF token if necessary
        },
        body: JSON.stringify(data) // Convert the data to JSON format
      })
        .then(response => response.json())
        .then(data => {
          // Handle the response data
          console.log(data);
        })
        .catch(error => {
          // Handle any errors
          console.error(error);
        });
}
submit.addEventListener('click',saveData)

