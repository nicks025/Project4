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
  