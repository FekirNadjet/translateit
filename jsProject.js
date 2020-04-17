function traducteurChecked() {
    if(document.getElementById("radioTraduc").checked){
        document.getElementById("cv").style.visibility='visible';
        }

    else{
        document.getElementById("cv").style.visibility='hidden';

    }
}
function  refadd(ref) {
       document.getElementById(ref).style.visibility='visible';
}



