function validateForm() {
    
    // First Name Required Validation
    let firstname = document.forms["form"]["firstname"].value;
    if (firstname == "") {
      document.getElementById("fnameErr").style.display="";
      return false;
    }
    // Last Name Required Validation
    let lastname = document.forms["form"]["lastname"].value;
    if (lastname == "") {
      document.getElementById("lnameErr").style.display="";
      return false;
    }
    
    // Email Required Validation
    let email = document.forms["form"]["email"].value;
    if (email == "") {
      document.getElementById("emailErr").style.display="";
      return false;
    }
    
    // Telephone Required Validation
    let telephone = document.forms["form"]["telephone"].value;
    if (telephone == "") {
      document.getElementById("telephoneErr").style.display="";
      return false;
    }
    
    // Address Line 1 Required Validation
    let address1 = document.forms["form"]["address1"].value;
    if (address1 == "") {
      document.getElementById("address1Err").style.display="";
      return false;
    }
    
    // Postcode Required Validation
    let postcode = document.forms["form"]["postcode"].value;
    if (postcode == "") {
      document.getElementById("postcodeErr").style.display="";
      return false;
    }
    
    // Country Required Validation
    let country = document.forms["form"]["country"].value;
    if (country == "") {
      document.getElementById("countryErr").style.display="";
      return false;
    }
    
    // Description Required Validation
    let description = document.forms["form"]["description"].value;
    if (description == "") {
      document.getElementById("descriptionErr").style.display="";
      return false;
    }
    
    // File Required Validation
    if (document.getElementById("fileToUpload").files.length == 0) {
      document.getElementById("fileErr").style.display="";
      return false;
    }
}