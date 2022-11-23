$(document).ready(function() {
    var result = 0;
    var prevEntry = 0;
    var operation = null;
    var currentEntry = '0';
    updateScreen(result);
    
    $('.button').on('click', function(evt) {
      var buttonPressed = $(this).html();
      console.log(buttonPressed);      
      if (buttonPressed === "CLEAR") {
        result = 0;
        currentEntry = '0';  
      } else if (isNumber(buttonPressed)) {
        if (currentEntry === '0') currentEntry = buttonPressed;
        else currentEntry = currentEntry + buttonPressed;
      
      } 
      
      updateScreen(currentEntry);
    });
  });
  
  updateScreen = function(displayValue) {
    var displayValue = displayValue.toString();
    $('.screen').html(displayValue.substring(0, 10));
  };
  
  isNumber = function(value) {
    return !isNaN(value);
  }
  
  