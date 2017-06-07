
/* requires jQuery */

(function ($) {


$(document).ready(function () {
  
  $("select").change(function () {
        var $this = $(this);
        var prevVal = $this.data("prev");
        var otherSelects = $("select").not(this);
    var thisVal = $(this).val();  
    
    //otherSelects.find("option[value=" + thisVal + "]").attr('disabled', true);
    otherSelects.find("option:contains(" + thisVal + ")").attr('disabled', true);
    
        if (prevVal) {
            //otherSelects.find("option[value=" + prevVal + "]").attr('disabled', false);
            otherSelects.find("option:contains(" + prevVal + ")").attr('disabled', false);
        }

        $this.data("prev", $this.val());
    });
});

function clearForm(form) {
  // iterate over all of the inputs for the form
  // element that was passed in
  $(':input', form).each(function() {
    var type = this.type;
    var tag = this.tagName.toLowerCase(); // normalize case
    // it's ok to reset the value attr of text inputs,
    // password inputs, and textareas
    if (type == 'text' || type == 'password' || tag == 'textarea')
      this.value = "";
    // checkboxes and radios need to have their checked state cleared
    // but should *not* have their 'value' changed
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    // select elements need to have their 'selectedIndex' property set to -1
    // (this works for both single and multiple select elements)
    else if (tag == 'select')
      this.selectedIndex = -1;
  });
};


})(jQuery);