function togglePasswordVisibility(num) {
  let password = document.getElementById("password" + num);
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
  let eyeIcon = document.getElementById("eyeIcon" + num);
  if (eyeIcon.classList.contains("bi-eye")) {
    eyeIcon.classList.remove("bi-eye");
    eyeIcon.classList.add("bi-eye-slash");
  } else {
    eyeIcon.classList.remove("bi-eye-slash");
    eyeIcon.classList.add("bi-eye");
  }
}


function addPhoneInput() {
  let phonesContainer = document.querySelector(`.AdminsForm .phones`);
  //create new element and append it to the container
  let count = phonesContainer.children.length;
  count++;
  let phpCount = document.getElementById('phoneCount');
  let countP = phpCount.getAttribute('value');
  phpCount.setAttribute('value', ++countP);

  let divCont = document.createElement(`div`);
  divCont.classList.add(`input-group`);
  divCont.classList.add(`mb-2`);
  divCont.innerHTML = `
  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
  <input type="text" class="form-control" name="phone` + count + `" 
          placeholder="Phone Number" aria-label="PhoneNumber" aria-describedby="basic-addon1">`;
  
  phonesContainer.appendChild(divCont);
}