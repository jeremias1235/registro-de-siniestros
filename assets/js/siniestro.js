
const patch = `http://${document.location.hostname}`+'/siniestro';

function registerSiniestro(){
	let cliente = document.querySelector("#cliente");
	let date = document.querySelector("#date");
	let hour = document.querySelector("#hour");
	let place = document.querySelector("#place");
	let damage = document.querySelector("#damage");
	let values = {cliente:cliente.value,date:date.value,hour:hour.value,place:place.value,damage:damage.value};
	
	$.ajax({
    type:"POST", 
    url:patch+"/controllers/siniestro.php",
    accept: "application/json",
    data:values,
    success:function(rs){
        let result = JSON.parse(rs);
        let html = '';
         if(!result.status){
            result.msg.map((item,index)=>{
               html+=`${index +1}.-${item.message}\n`;
            })
         	alert(html)
         }else{
         	alert(result.msg);
            document.querySelector("#formsini").reset()
         	cargarDataTable()
         }
         
     },
     error: function(XMLHttpRequest, textStatus, errorThrown) { 
        console.log(XMLHttpRequest) 
        console.log(textStatus) 
        console.log(errorThrown) 
    }    
})



}

function viewTable(){
	document.getElementById("dtable").style.display='block';
	cargarDataTable();
}

function cargarDataTable() {
   
   $.ajax({
    type:"GET", 
    url:patch+"/controllers/siniestro.php",
    accept: "application/json",
    data:{},
    success:function(rs){
        let result = JSON.parse(rs);

       let table=  document.getElementById("tbody");

       let html ='';

        result.forEach((item,index)=>{
        	html+=`<tr>`;
        	html+=`<td>${index + 1}</td>`;
        	html+=`<td>${item.cliente}</td>`;
        	html+=`<td>${item.fecha}</td>`;
        	html+=`<td>${item.hora}</td>`;
        	html+=`<td>${item.lugar}</td>`;
        	html+=`<td>${item.danos}</td>`;
        	html+=`</tr>`;
        });
        
         table.innerHTML=html;
     },

 })
 
 
}

function destroySessionC(){
      $.ajax({
    type:"POST", 
    url:patch+"/controllers/sessions.php",
    accept: "application/json",
    data:{},
    success:function(rs){
        let result = JSON.parse(rs) 
         if(result.status){
            location.href=patch+'/login.php'
         }
     },
     error: function(XMLHttpRequest, textStatus, errorThrown) { 
        console.log(XMLHttpRequest) 
        console.log(textStatus) 
        console.log(errorThrown) 
    }    
})


}