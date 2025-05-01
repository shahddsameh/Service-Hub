let deleteAlert=document.getElementById('deleteAlert');
let popContainer=document.getElementById('pop-container');
let cancelPopUP = document.getElementById("cancel-popup");
let deletePopUP = document.getElementById("delete-popup");


deleteAlert.addEventListener('click', function(e){
    e.preventDefault()

    popContainer.classList.remove("d-none")
  


})
deletePopUP.addEventListener("click", function(e){
    e.preventDefault()
    popContainer.classList.add("d-none")

})
cancelPopUP.addEventListener("click", function(e){
    e.preventDefault()
    popContainer.classList.add("d-none")

})

