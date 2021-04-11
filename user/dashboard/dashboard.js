var food = {
    "chinese": ["chowmin", "momos", "noodles"],
    "punjabi": ["lassi", "parotha", "dal-fry"],
    "south": ["idli", "uttapam", "rava", "menduvada"],
    "gujarati":["Khandvi","Undhiyu","Dhokla","Handvo","Fafda","Patra","Gathiya","Dabeli"],
    "maharashtrian":["Kaju Kothimbir Vadi","Pudachi Wadi","Pav Bhaji","Puran Poli","Kolhapuri Vegetables"]
}





var oldmenu = ".punjabi";
console.log(oldmenu);

function logout() {
    location.href = "../logout.php";
}
function profile() {
    location.href = "../profile/profile.php";
}

var oldmenu = ".punjabi"; //reference value 
var cat = document.querySelector('#cat'); //hidden input which stores catagory
var item = document.querySelector('#lst');//hidden input which stores catagory items



// console.log(jsobj);



function getmenu(menu, p) {
    this.item.setAttribute("value", "");
    document.querySelector('#catbtn').innerText = menu;
    document.getElementById('pop').innerHTML="";


    menuname = document.querySelector('.' + menu);



    // document.querySelector(this.oldmenu).classList.add("dishid");
    // menuname.classList.remove("dishid");

    // jsobj.innerHtml=""; /// emptying inner html of  div to be populated

    this.oldmenu = String('.' + menu);
    console.log(this.cat);
    this.cat.setAttribute("value", menu);


    ///populating item list based on catagory selected

            let itemdiv= `  <div class="${menu}">
            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="itembtn">
                    food-item 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">`;
    for (let cat in this.food) {
        // console.log(`${cat} is ${this.food[cat]}`);
        if ((cat.toLocaleLowerCase()) == (menu.toLowerCase())) {
            // console.log(`${cat} is ${food[cat]}`);
            food[cat].sort();
            food[cat].forEach(function (element) {
                
                // console.log(element,typeof(element));
                    itemdiv+=`<button class="dropdown-item" onclick="itemlist(this);" type="button">${element}</button>`;
                   
        
            })
        itemdiv+=`</div></div></div>`;
        }
    }
    console.log(itemdiv);
    document.getElementById('pop').innerHTML=itemdiv;
    
}

function itemlist(list) {

    console.log(item);
    document.querySelector('#itembtn').innerText = list.innerText;
    this.item.setAttribute("value", list.innerText);

}



// for (let cat in food) {
//     // console.log(`${cat} is ${food[cat]}`);
//     if (cat == "chinese") {
//         // console.log(`${cat} is ${food[cat]}`);
//         food[cat].forEach(function(element){
//             console.log(element);
//         })
//     }
// }
