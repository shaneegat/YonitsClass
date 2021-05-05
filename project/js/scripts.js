
var counter=0;
var names = ["husbands", "favorite", "work"];
var percentages = [35, 90, 75];

var size = 3;

function addUser(){
    var user = document.createElement("section");
    var formUser = document.getElementById("users");
    formUser.insertBefore(user,formUser.firstChild); 
    user.id = "user" + counter;
    user.className = "user";
    addPic();
    title();
    counter++;
    console.log(user);
    return user;
}

function users(){

    for(var i = 0; i < size; i++){
        addUser();
    }

    document.getElementById("plus").addEventListener("click",plus);
    document.getElementById("user"+0).addEventListener("click",page);


}

function plus(){
    location.replace("form.html"); 
}
function page(){
    location.replace("main.html"); 
}

function addPic(){
    var car = document.createElement("section");
    var formCar = document.getElementById("user" + counter);
    formCar.appendChild(car); 
    car.className = "car"+" "+"car"+ counter;

    return car;
}

function title(){

    var div = document.getElementById("user" + counter);
    div.innerHTML += names[counter] + " car <br> car status: " + percentages[counter] + "%</p>";
    
}



$(document).ready(function(){
    $('.accordion-item_trigger').click(function(){
        $(this).next('.accordion-item_content').slideToggle(200);
        $(this).find('.chevron').toggleClass('rotate');
        
    });
});



function openNav() {
    document.getElementById("mySidenav").style.width = "380px";
    document.getElementById("mainSide").style.marginLeft = "380px";
  
      
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mainSide").style.marginLeft = "0px";
   
    
}