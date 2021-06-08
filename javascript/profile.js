// edit profile settings
let editProfileButton = document.getElementById("edit");
// show the profile detail settings
let showProfile = document.getElementById("showProfileDetails");
// edit profile with a form
let editFormProfile = document.getElementById("editProfileDetails");
// update the form
let updateProfile = document.getElementById("update");




let show = true;
showProfile.style.display = "grid";
editFormProfile.style.display = "none";


editProfileButton.addEventListener("click", function(e){
    if(show == true){
        console.log("show");
        showProfile.style.display = "none";
        editFormProfile.style.display = "grid";
        show = false;

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
