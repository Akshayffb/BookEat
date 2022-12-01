function subaside1(){
    head=1;
    kaamkar();
}
function subaside2(){
    head=2;
    kaamkar();
}
function subaside3(){
    head=3;
    kaamkar();
}
function subaside4(){
    head=4;
    kaamkar();
}
// function aidu(){
//     head=5;
//     kaamkar();
// }
// function aaru(){
//     head=6;
//     kaamkar();
// }
// function yelu(){
//     head=7;
//     kaamkar();
// }

function kaamkar(){
    var eles=document.getElementsByClassName("subasideimg");
    console.log(eles.length, head, eles);
    for (let i = 0; i < eles.length; i++) {
        if (head-1==i) {
            eles[i].classList.add("show");
            eles[i].classList.remove("hide");
        }
        else{
            eles[i].classList.add("hide");
            eles[i].classList.remove("show");
        }
        
    }

}
