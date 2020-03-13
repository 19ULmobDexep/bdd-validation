/*function AfficherMasquer()
{
divInfo = document.getElementById('footer');
 
if (divInfo.style.display == 'none')
divInfo.style.display = 'block';
else
divInfo.style.display = 'none';
 
}*/

$("#mention").click(function(){
    $("#myModal").modal('show');
})


AOS.init({
    duration : 1200,
});

