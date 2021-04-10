var oldmenu=".punjabi";
console.log(oldmenu);

function logout(){
    location.href="../logout.php";
}
function profile(){
    location.href="../profile/profile.php";
}

var oldmenu=".punjabi";
var cat=document.querySelector('#cat');
var item=document.querySelector('#lst');
function getmenu(menu,p){
    this.item.setAttribute("value","");
    document.querySelector('#catbtn').innerText=menu;
    // document.querySelector('.'+ menu).parentNode.firstElementChild.firstElementChild.firstElementChild.innerText=menu;
    
  
    // console.log("get menu function is called");
// menu=String('.'+menu);    
// console.log(typeof(menu));
    
    menuname=document.querySelector('.'+ menu);
    // console.log(menuname);
    // console.log(oldmenu);
    
    
    document.querySelector(this.oldmenu).classList.add("dishid");
    menuname.classList.remove("dishid");

    this.oldmenu=String('.'+menu);
    // console.log(menuname);
    console.log(this.cat);
    this.cat.setAttribute("value",menu);
}

function itemlist(list){
    
    console.log(item);    
    this.item.setAttribute("value",list);
}