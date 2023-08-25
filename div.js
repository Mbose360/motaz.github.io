let IRM=document.querySelector('#SCANNER');
let hover_btn=document.querySelector('.hover-btn');
let Radiologie_numérique=document.querySelector('#Radiologie-numérique');
let echographie=document.querySelector('#ECHOGRAPHIE');
let mammographie=document.querySelector('#MAMMOGRAPHIE');
let Panoramique_Dentaire=document.querySelector('#Panoramique-Dentaire');
let BIOPSIE=document.querySelector('#BIOPSIE');
let content=document.querySelector('#content');
let paragraph=document.querySelector('p');

IRM.addEventListener('click',()=>{
   content.innerHTML=document.getElementById('scanner').innerHTML;
  


});
  Radiologie_numérique.addEventListener('click',()=>{
    content.innerHTML=document.getElementById('Radiologie/numérique').innerHTML;
 
 
   });
   echographie.addEventListener('click',()=>{
      content.innerHTML=document.getElementById('Echographie').innerHTML;
   
   
     });

     mammographie.addEventListener('click',()=>{
      content.innerHTML=document.getElementById('Mammographie').innerHTML;
   
   
     });

     Panoramique_Dentaire.addEventListener('click',()=>{
      content.innerHTML=document.getElementById('Panoramique/Dentaire').innerHTML;
   
   
     });

     BIOPSIE.addEventListener('click',()=>{
      content.innerHTML=document.getElementById('biopsie').innerHTML;
   
   
     });


     const clickableParagraphs = document.querySelectorAll('.hover-btn');
     clickableParagraphs.forEach(paragraph => {
       paragraph.addEventListener('click', () => {
         // Remove the active class from all the paragraphs
         clickableParagraphs.forEach(p => {
           p.classList.remove('active');
         });
         // Add the active class to the clicked paragraph
         paragraph.classList.add('active');
       });
     });

     const bb = document.querySelectorAll('.clickabele');
     bb.forEach(paragraph => {
       paragraph.addEventListener('click', () => {
         // Remove the active class from all the paragraphs
        bb.forEach(p => {
           p.classList.remove('active');
         });
         // Add the active class to the clicked paragraph
         paragraph.classList.add('active');
       });
     });

     
   
