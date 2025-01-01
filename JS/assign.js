function submitAssignment(event, subject) {
    event.preventDefault();
    const form = event.target;
    const fileInput = form.querySelector('input[type="file"]');
    
    // Simulating file submission process
    if (fileInput.files.length > 0) {
      const fileName = fileInput.files[0].name;
      alert(`Assignment for ${subject} submitted successfully!\nFile: ${fileName}`);
      fileInput.value = '';  // Clear the file input after submission
    } else {
      alert('Please upload a file before submitting.');
    }
  }

  function submitAssignment(event, subject) {
    event.preventDefault(); // Prevent default form submission

    // Create FormData object for file upload
    const formData = new FormData(event.target);

    // Determine the target URL based on the subject
    const url = '../Back-end/assign.php'; // Adjust as needed for your backend

    // Use AJAX to submit the form asynchronously
    const xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            // If the submission is successful, show the message returned from the backend
            document.querySelector('.alert').innerText = 'Assignment submitted successfully!';
        } else {
            // If there's an error, show the error message
            document.querySelector('.alert').innerText = 'Error submitting assignment!';
        }
    };

    // Send the form data
    xhr.send(formData);
}
