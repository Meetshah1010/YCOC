const box = document.querySelector(".stylebox");
var globaloldclass = 'a';


// box.style.transform="translateY(100%)";
function getclassname(classname) {
    console.log(classname);
    // var t = document.querySelector('.' + classname);
    // t.addEventListener('click', function () {
    //     t.style.color = "red";
    // });


    function position(classname) {
        switch (classname) {
            case 'a':
                return 14;
                break;
            case 'rb':
                return 130;
                break;
            case 'fc':
                return 242;
                break;
            case 'dfc':
                return 360;
                break;
            case 'yf':
                return 480;
                break;
            case 'oh':
                return 598;
                break;
            case 'ru':
                return 718;
                break;

        }
    }

    val = position(classname);
    val = String(val + '%');
    box.style.transform = `translateY(` + val + `)`;
    // change color function
    function changetextcolor(oldclass, classname) {
        document.querySelector('.' + oldclass).removeAttribute("style");
        document.querySelector('.' + classname).setAttribute("style", "color:rgb(237, 90, 107)");
        globaloldclass = classname;
        // console.log("after clling function");
        // console.log("oldclass " + globaloldclass);
        // console.log("newclass " + classname);
    }
    // console.log("before function calling");
    // console.log("oldclass " + globaloldclass);
    // console.log("newclass " + classname);
    changetextcolor(globaloldclass, classname);



}