(function() {  
  window.addEventListener('click', function() {
      let forms = document.getElementsByClassName('needs-validation');
       let validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
  
updateList = function() {
  let input = document.getElementById('file');
  let output = document.getElementById('tester');
  for (let i = 0; i < input.files.length; ++i) {
    output.innerHTML = input.files.item(i).name;
  }
 }
 
function clearBox(elementID)
{
    document.getElementById(elementID).innerHTML = "";
}



