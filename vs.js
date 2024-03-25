for (var i = 1; i < product.length; i++) {
    document.getElementById("select1").innerHTML += `
    <option value="${i}">${product[i].name}</option>
    `;
    document.getElementById("select2").innerHTML += `
    <option value="${i}">${product[i].name}</option>
    `;
}


function item1(a){
    var select2 = document.getElementById("select2").value;
    if(a != select2){
        document.getElementById("img1").src=product[a].img
        document.getElementById("type1").innerHTML=product[a].type
        document.getElementById("price1").innerHTML=product[a].price+" .-"
        document.getElementById("description1").innerHTML=product[a].description
    }
    else{
        document.getElementById("select1").selectedIndex =0;
        document.getElementById("img1").src=product[0].img
        document.getElementById("type1").innerHTML=""
        document.getElementById("price1").innerHTML=""
        document.getElementById("description1").innerHTML=""
    }
}
function item2(a){
    var select1 = document.getElementById("select1").value;
    if(a != select1){
        document.getElementById("img2").src=product[a].img
        document.getElementById("type2").innerHTML=product[a].type
        document.getElementById("price2").innerHTML=product[a].price+" .-"
        document.getElementById("description2").innerHTML=product[a].description
    }
    else{
        document.getElementById("select2").selectedIndex =0;
        document.getElementById("img2").src=product[0].img
        document.getElementById("type2").innerHTML=""
        document.getElementById("price2").innerHTML=""
        document.getElementById("description2").innerHTML=""
    }
}