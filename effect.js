window.addEventListener('load',reveal) ;
function reveal(){
    var reveals = document.querySelectorAll('.reveal');
    for (var i = 0; i < reveals.length; i++){
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint =-1;
        if (revealpoint< windowheight - revealtop){
            reveals[i].classList.add('active');}
            else{
                reveals[i].classList.remove('active');} 
            }
}