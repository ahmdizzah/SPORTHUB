document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('crud-form');
    const userList = document.getElementById('user-list');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      const usernameInput = document.getElementById('username');
      const fullnameInput = document.getElementById('fullname');
      const emailInput = document.getElementById('email');
      const dobInput = document.getElementById('dob');
      const weightInput = document.getElementById('weight');
      const heightInput = document.getElementById('height');
      const programInput = document.getElementById('program');
  
      const username = usernameInput.value;
      const fullname = fullnameInput.value;
      const email = emailInput.value;
      const dob = dobInput.value;
      const weight = weightInput.value;
      const height = heightInput.value;
      const program = programInput.value;
  
      if (username.trim() === '' || fullname.trim() === '' || email.trim() === '' || dob.trim() === '' || weight.trim() === '' || height.trim() === '' || program.trim() === '') {
        alert('Please fill out all fields');
        return;
      }
  
      const userItem = document.createElement('li');
      userItem.innerHTML = `
        <strong>Username:</strong> ${username} | 
        <strong>Name:</strong> ${fullname} | 
        <strong>Email:</strong> ${email} | 
        <strong>DOB:</strong> ${dob} | 
        <strong>Weight:</strong> ${weight} | 
        <strong>Height:</strong> ${height} | 
        <strong>Program:</strong> ${program}
        <button class="delete-btn">Delete</button>
      `;
      userList.appendChild(userItem);
  
      usernameInput.value = '';
      fullnameInput.value = '';
      emailInput.value = '';
      dobInput.value = '';
      weightInput.value = '';
      heightInput.value = '';
      programInput.value = '';
    });
  
    userList.addEventListener('click', function(event) {
      if (event.target.classList.contains('delete-btn')) {
        event.target.parentElement.remove();
      }
    });
  });
  