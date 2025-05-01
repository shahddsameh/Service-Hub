let onlineRadio=document.getElementById("online-radio");
let locationDis=document.getElementById("location-dis");
let offlineRadio=document.getElementById("offlineRadio")
console.log(locationDis);
onlineRadio.addEventListener("click",function(){
    locationDis.style.display="none"
})
offlineRadio.addEventListener("click",function(){
    locationDis.style.display="block"
})