

function makeSelected () {
    const selectObj = document.querySelector('#mechanic');
    const index = selectObj.dataset.selected;
    selectObj.options[ind-1].selected = true;
}

function makeSelectedd () {
    const selectObj = document.querySelector('#insurance');
    const index = selectObj.dataset.selected;
    selectObj.options[ind-1].selected = true;
}

window.onload = function init() {
    makeSelected();
}

window.onload = function initt() {
    makeSelectedd();
}


/***************************************************JQUERY************************************************/




function openNav() {
    document.getElementById("mySidenav").style.width = "380px";
    document.getElementById("mainSide").style.marginLeft = "380px";
  
      
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mainSide").style.marginLeft = "0px";
   
    
}




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




$(document).ready(function(){
    $("#flip").click(function(){
      $("#panel").slideToggle("slow");
    });
});


$(document).ready(function(){
    $("#flipMini").click(function(){
      $("#panelMini").slideToggle("slow");
    });
});






window.onload = function init(){
    makeSelected();
}

function makeSelected() {
    var selectObj = document.querySelector('#type');
    ind = selectObj.dataset.selected;
    console.log(ind);
    selectObj.options[ind-1].selected = true;
}



   /***************************************************JSON************************************************/

   $(document).ready(function(){
    $.getJSON("data/generalInfo.json",function(data){

        $.each(data.generalInformation, function(){
            $(".table tbody").append("<tr><th scope ="+"row>" + this.carPart    + "</th>" 
                                                      +"<td>" + this.status     + "</td>" 
                                                      +"<td>" + this.lastUpdate + "</td>" 
                                                      +"<td>" + this.milesLeft  + "</td></tr>");

        $(".table").append("</tbody>")
        });
    });
});