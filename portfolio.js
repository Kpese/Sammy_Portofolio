const loader =  document.querySelector('.preloader')

setTimeout(() => {
   loader.style.display = 'none';
}, 3000);

$(".navbar a").click(function(){
    $("body, html").animate({
        scrollTop:$("#" + $(this).data('value')).offset().top
    }, 1000)
})

// const social = document.querySelector('.social')
// document.getElementById('toggleSwitch').addEventListener('change', function() {
//     document.body.classList.toggle('bg-primary');
//   });



  // Array of texts to type
  const textsToType = [
    "Software Dev.",
    "PHP Dev.",
    "FullStack Dev.",
  ];

  // DOM element where the text will be displayed
  const textContainer = document.getElementById("text-container");

  // Index to keep track of the current text
  let textIndex = 0;
  // Index to keep track of the characters being shown
  let charIndex = 0;

  // Function to display the next text
  function showNextText() {
    // Clear the text container
    textContainer.textContent = '';

    // Start typing the next text
    const currentText = textsToType[textIndex];
    const typeInterval = setInterval(function() {
      // Add the next character to the text container
      textContainer.textContent += currentText[charIndex];

      // Move to the next character
      charIndex++;

      // Check if we've reached the end of the text
      if (charIndex === currentText.length) {
        clearInterval(typeInterval); // Stop the interval when done

        // Move to the next text
        textIndex++;

        // If all texts are shown, start over
        if (textIndex === textsToType.length) {
          textIndex = 0;
        }

        charIndex = 0; // Reset the character index
        setTimeout(showNextText, 2000); // Wait for a pause before typing the next text
      }
    }, 100); // Adjust the interval duration as needed
  }

  // Start the typing animation
  showNextText();