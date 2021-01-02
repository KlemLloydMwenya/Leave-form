//Auto strip off all the characters that aren't desired in a Man Number and capitalize
function alphanumericOnly(input) {
  let regex = /[^a-z0-9]/gi;
  input.value = input.value.replace(regex, "");
  input.value = input.value.toUpperCase();
}

/* Date input control */
$(document).ready(() => {
  let startDate = document.getElementById('start_date'),
      endDate = document.getElementById('end_date'),

  // Enable endDate if startDate is filled, as well as set minimum dates
      currentDate = new Date(),
      dd = currentDate.getDate(),
      mm = currentDate.getMonth() + 1, // January is [0] so I added 1 to get the right month.
      yy = currentDate.getFullYear();
      
  if(dd < 10) {
    dd = "0" + dd.toString();
  };

  if(mm < 10) {
    mm = "0" + mm.toString();
  };

  let today = yy + '-' + mm + '-' + dd;
  
  startDate.setAttribute("min", today);

  startDate.oninput = () => {
    if (startDate.value.length > 0) {
      endDate.disabled = false;

      let fullSelectedDate = new Date(startDate.value);
      fullSelectedDate.setDate(fullSelectedDate.getDate() + 1); // Updating selected day to following day

      let selectedDd = fullSelectedDate.getDate(),
          selectedMm = fullSelectedDate.getMonth() + 1,
          selectedYy = fullSelectedDate.getFullYear();
      
      if(selectedDd < 10) {
        selectedDd = "0" + selectedDd.toString();
      };
      
      if(selectedMm < 10) {
        selectedMm = "0" + selectedMm.toString();
      };

      let nextDay = selectedYy + '-' + selectedMm + '-' + selectedDd;
      
      endDate.setAttribute("min", nextDay);

      endDate.oninput = () => { 
        if (endDate.value.length > 0) {
          let startDateValue = new Date(startDate.value),
              endDateValue = new Date(endDate.value),

              diff = 0,
              days = 1000 * 60 * 60 * 24;

          diff = endDateValue - startDateValue;

          let totalDaysRequested = Math.floor(diff / days);

          document.getElementById("days").value = totalDaysRequested;
        }
      }

    } else {
      endDate.disabled = true;
    }
  };

  // datePickerFunc = () => this.setAttribute('value', this.value)
});

// Allowing only on checkbox to be selected
$(document).ready(function(){
  $('[type="checkbox"]').change(function(){  
    if(this.checked){
       $('[type="checkbox"]').not(this).prop('checked', false);
       extractLabel();    
      }    
  });
});


let medFile = document.getElementById('medical');
let sickLeave = document.getElementById('sick');

// Function that processes leave type and returns a value  
extractLabel = () => {
  let checkedBox = document.querySelectorAll('input[type="checkbox"]:checked');
  let parentDiv = checkedBox[0].parentNode;
  let label = parentDiv.querySelector("label");
  let labelText = label.innerText;

  // Mark medical as required if type is sickLeave
  makeMedicalRequired = () => {
    if (sickLeave.checked) {
      $('#medical').attr('required', '');          
      if (medFile.hasAttribute("required")) { 
        medFile.style.boxShadow = "4px 4px 20px rgba(200, 0, 0, 0.85)";
      }  
    } else {          
      if (medFile.hasAttribute("required")) { 
        $('#medical').removeAttr('required');
        medFile.style.boxShadow = null;
      } 
      // else {            
      //   console.log("medFile DOES NOT have required attribute!");
      // }
    }
    
    // if (medFile.hasAttribute('required')) {
    //   console.log("medFile has required attribute!");
    // }
  };

  makeMedicalRequired();

  document.getElementById("selectedLeaveType").value = labelText;
}

//the user clicks on the checkbox in question.
cleanBoxShadow = (sickLeave) => {
    if(!sickLeave.checked) {
      if (medFile.hasAttribute("required")) { 
        $('#medical').removeAttr('required');
        medFile.style.boxShadow = null;
      } else {
        medFile.style.boxShadow = null;
      }
    }
}

// Textarea to resize based on content
textAreaAdjust = (textarea) => {
  textarea.style.height = "1px";
  textarea.style.height = (25 + textarea.scrollHeight) + "px";
}

