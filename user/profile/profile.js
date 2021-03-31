const box = document.querySelector(".stylebox");


// box.style.transform="translateY(100%)";
function getclassname(classname) {
    console.log(classname);

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



}
var p = document.getElementsByClassName("rb");
console.log(p);
p.style.color = "red";