document.addEventListener('click',e =>{
    if(e.target.matches('.dropdown-item'))
        filterUsers(e.target.dataset.serviceId);
})

function filterUsers(id)
{
    let cards = Array.from(document.getElementsByClassName("card"));
   cards.forEach(element => { element.style.display = "none" });

   
   let elements = Array.from(document.getElementsByClassName(id));
   elements.forEach(element => { element.style.display = "block" });

   // verifier si id ==0 pour tout afficher
   if(id == 0) {
    let cards = Array.from(document.getElementsByClassName("card"));
    cards.forEach(element => { element.style.display = "block" });
   }
    

}
