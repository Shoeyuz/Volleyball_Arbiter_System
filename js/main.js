



//Function purpose: Wait for load
//
document.addEventListener("DOMContentLoaded", function (e) {
  var button = document.getElementsByClassName('card-footer-item');
  const modal = document.querySelector('.modal');
  const cancel = document.querySelector('.delete');
  const close = document.querySelector('.is-cancel')
  const submit = document.querySelector('.is-success')


  var i;
  for (i = 0; i < button.length; i++) {
    button[i].addEventListener('click', function () {
      modal.style.display = "block";
    });
  }




  close.addEventListener('click', function () {
    modal.style.display = 'none';
    resetForms
  });

  cancel.addEventListener('click', function () {
    modal.style.display = 'none';
    resetForms

  });







  /*
     Resets form of modal
     Not working 
  */
  function resetForms() {
    document.getElementById("submission").reset();
  }
});


