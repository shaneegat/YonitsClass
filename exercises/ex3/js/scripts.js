var counter = 0;
var colorArray = new Array();

function addColor(){
    var options = '0123456789ABCDEF';
    var color = '#';
    
    for (var i = 0; i < 6; i++) {
      color += options[Math.floor(Math.random() * 16)];
    }

    colorArray.push(color);

    return color;
}

function addSquare(){

    var square = document.createElement("section");
    var formSquare = document.getElementsByTagName('main')[0];
    formSquare.appendChild(square); 
    square.className = "square";
    square.id = counter; 
    square.style.backgroundColor = addColor(); 
    square.addEventListener("click",changeBackground);
    stars();
    counter++;

    return square;
}

function createSquares(){

    var name = "gat";   
    var size = name.length *2;

    for(var i = 0; i < size; i++){
        addSquare();
    } 

    plus();

}

function changeBackground(){
    
    if(this.classList.value.includes("myBackground")){
        this.classList.remove("myBackground");
        this.style.backgroundColor = colorArray[this.id];
    }
    else{
        this.style.removeProperty("background-color");
        this.classList.add("myBackground");   
    } 
}

function plus(){

    var plus = document.createElement("img");
    plus.src = "images/plus.png";
    var src = document.getElementById(0);
    src.appendChild(plus);
    plus.className = "plus";
    
    plus.addEventListener("click", addSquare);
}

function stars(){

    if((counter+1) % 3 == 0){
        var star = document.createElement("img");
        star.src = "images/star.png";
        var src = document.getElementById(counter);
        src.appendChild(star);
        star.className = "star";    
    } 
}


