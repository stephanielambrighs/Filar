// personal details
// edit profile settings
let editProfileButton = document.getElementById("edit");
// show the profile detail settings
let showProfile = document.getElementById("showProfileDetails");
// edit profile with a form
let editFormProfile = document.getElementById("editProfileDetails");
// update the form
let updateProfile = document.getElementById("update");


// adress details
// edit adress settings
let editAdressButton = document.getElementById("editAdress");
// show the adress detail settings
let showAdress = document.getElementById("showAdressDetails");
// edit address with a form
let editFormAdress = document.getElementById("editAdressDetails");
// update the form for adress
let updateAdress = document.getElementById("updateAdress");


let show = true;
showProfile.style.display = "grid";
editFormProfile.style.display = "none";

showAdress.style.display = "grid";
editFormAdress.style.display = "none";



editProfileButton.addEventListener("click", function(e){
    if(show == true){
        console.log("show");
        showProfile.style.display = "none";
        editFormProfile.style.display = "grid";
        show = false;
        // function get variable out of the database
        getProfileOutOfDatabase();
    }
    e.preventDefault();
})

updateProfile.addEventListener("click", function(e){
    if(show == false){
        editFormProfile.style.display = "none";
        showProfile.style.display = "grid";
        console.log("false");
        show = true;
        // function for update query in ajax
        updateProfileSettings();
    }
    else{
        console.log("true");
        show = false;
    }
    e.preventDefault();
})


editAdressButton.addEventListener("click", function(e){
    if(show == true){
        console.log("show");
        showAdress.style.display = "none";
        editFormAdress.style.display = "grid";
        show = false;
        // function get variable out of the database
        getAddressOutOfDatabase();
    }
    e.preventDefault();
})

updateAdress.addEventListener("click", function(e){
    if(show == false){
        editFormAdress.style.display = "none";
        showAdress.style.display = "grid";
        console.log("false");
        show = true;
        // function for update query in ajax
        updateAdressSettings();
    }
    else{
        console.log("true");
        show = false;
    }
    e.preventDefault();
})



function updateProfileSettings(){
    let firstname = document.getElementById("firstname").value;
    let lastname = document.getElementById("lastname").value;
    let date_of_birth = document.getElementById("date_of_birth").value;
    let password = document.getElementById("password").value;
    myBody = new FormData();
    myBody.append("userId", userId);
    myBody.append("firstname", firstname);
    myBody.append("lastname", lastname);
    myBody.append("date_of_birth", date_of_birth);
    myBody.append("password", password);

    fetch("ajax/updateProfileSettings.php", {
        method: "POST",
        body: myBody,
    })
    .then(response => response.json())
    .then(data => {
        console.log("Success: ", data);
    })
    .catch((error) => {
        console.log("Error: ", error);
    })
}

function updateAdressSettings(){
    let street = document.getElementById("street").value;
    let city = document.getElementById("city").value;
    let province = document.getElementById("province").value;
    let country = document.getElementById("country").value;
    myBody = new FormData();
    myBody.append("userId", userId);
    myBody.append("street", street);
    myBody.append("city", city);
    myBody.append("province", province);
    myBody.append("country", country);

    fetch("ajax/updateAdressSettings.php", {
        method: "POST",
        body: myBody,
    })
    .then(response => response.json())
    .then(data => {
        console.log("Success: ", data);
    })
    .catch((error) => {
        console.log("Error: ", error);
    })
}


function getAddressOutOfDatabase() {
    let street = document.getElementById("street");
    let city = document.getElementById("city");
    let province = document.getElementById("province");
    let country = document.getElementById("country");
    myBody = new FormData();
    myBody.append("userId", userId);
    myBody.append("street", street);
    myBody.append("city", city);
    myBody.append("province", province);
    myBody.append("country", country);

    fetch("ajax/getDetailsOutOfDb.php", {
        method: "POST",
        body: myBody,
    })
    .then(response => response.json())
    // .then(response => response.text())
    .then(data => {
        console.log("Success: ", data);

        street.value = data['data']['street'];
        city.value = data['data']['city'];
        province.value = data['data']['province'];
        country.value = data['data']['country'];

    })
    .catch((error) => {
        console.log("Error: ", error);
    })
}


function getProfileOutOfDatabase(){
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let date_of_birth = document.getElementById("date_of_birth");
    let password = document.getElementById("password");
    myBody = new FormData();
    myBody.append("userId", userId);
    myBody.append("firstname", firstname);
    myBody.append("lastname", lastname);
    myBody.append("date_of_birth", date_of_birth);
    myBody.append("password", password);

    fetch("ajax/getDetailsOutOfDb.php", {
        method: "POST",
        body: myBody,
    })
    .then(response => response.json())
    .then(data => {
        console.log("Success: ", data);

        firstname.value = data['data']['firstname'];
        lastname.value = data['data']['lastname'];
        date_of_birth.value = data['data']['date_of_birth'];
        // password.value = data['data']['password'];

    })
    .catch((error) => {
        console.log("Error: ", error);
    })
}