//Materialize Function 

$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.tooltipped').tooltip();
    $('.dropdown-trigger').dropdown();
    $('.collapsible').collapsible();
    $('.fixed-action-btn').floatingActionButton();
    $('.modal').modal();
    $('.sidenav').sidenav();
    $('select').formSelect();
  });

// Custom Async Code


// Edit City Function
function editCity(data){
 $('#hiddenValue').val(data);
      
  var input ={
          id:data,
          method:'editCityData'
      }

      async function post(data){
      const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
      method: 'POST',
      headers: {'Content-type': 'application/json'},
      body: JSON.stringify(data)
  });
  
  const responseData = await response.json();
  
  return responseData;
}

post(input)
.then(data => {  
  console.log(data.city);  

  document.querySelector("#cityname").value = data.city;
  M.updateTextFields();

var stateId = data.state_id;
var dropState = document.querySelector('#dropState');
var dropOptions = document.querySelectorAll('option');
dropOptions[0].removeAttribute("selected");

for(var i = 0; i < dropOptions.length; i++){
  if(dropOptions[i].value === stateId){
    dropState.selectedIndex = dropOptions[i].setAttribute("selected","selected");
    break;
  }
}

})
.catch(err => console.log(err));
}



// Edit State Function
function editState(data){
  $('#hiddenValue').val(data);
       
   var input ={
           id:data,
           method:'editStateData'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   
   return responseData;
 }
 
 post(input)
 .then(data => {  
   console.log(data.state);  
 
   document.querySelector("#statename").value = data.state;
   M.updateTextFields();
 
 })
 .catch(err => console.log(err));
 }
 


// Edit Role Master Function
function editRoleMaster(data){
  $('#hiddenValue').val(data);
       
   var input ={
           id:data,
           method:'editRoleMaster'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   
   return responseData;
 }
 
 post(input)
 .then(data => {  
   console.log(data.user_role);  
 
   document.querySelector("#rolename").value = data.user_role;
   M.updateTextFields();
 
 })
 .catch(err => console.log(err));
 }
 

 // Edit Plan Master Function
function editPlanMaster(data){
  $('#hiddenValue').val(data);
       
   var input ={
           id:data,
           method:'editPlanMaster'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   
   return responseData;
 }
 
 post(input)
 .then(data => {  
   console.log(data.plan_title);  
 
   document.querySelector("#plantitle").value = data.plan_title;
   document.querySelector("#planprice").value = data.plan_price;
   document.querySelector("#plandiscount").value = data.discount;
   document.querySelector("#plandescription").innerHTML = data.discraption;
   document.querySelector("#planduration").value = data.duration;
   M.textareaAutoResize($('#plandescription'));
   M.updateTextFields();
 
 })
 .catch(err => console.log(err));
 }


// Edit FAQ Master Function
function editFaqMaster(data){
  $('#hiddenValue').val(data);
       
   var input ={
           id:data,
           method:'editFaqMaster'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   
   return responseData;
 }
 
 post(input)
 .then(data => {   
 
   document.querySelector("#question").value = data.faq_que;
   document.querySelector("#answer").innerHTML = data.faq_ans;
   M.textareaAutoResize($('#answer'));
   M.updateTextFields();
 
 })
 .catch(err => console.log(err));
 }


 // Edit Package Type Master Function
function editPackageTypeMaster(data){
  $('#hiddenValue').val(data);
       
   var input ={
           id:data,
           method:'editPackageTypeMaster'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   
   return responseData;
 }
 
 post(input)
 .then(data => {   
 
   document.querySelector("#packagetype").value = data.package_type;
   M.updateTextFields();
 
 })
 .catch(err => console.log(err));
 }

// Edit Package Type Master Function
function editTripMaster(data){
  $('#hiddenValue').val(data);
       
   var input ={
           id:data,
           method:'editTripMaster'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   
   return responseData;
 }
 
 post(input)
 .then(data => {   
 
   document.querySelector("#name-of-destination").value = data.destination_name;
   document.querySelector("#destination-description").innerHTML = data.destination_discription;
   M.textareaAutoResize($('#destination-description'));
   M.updateTextFields();
 
 })
 .catch(err => console.log(err));
 }


// Edit Tour Admin Package Type Master Function
function editTourPackageMaster(data){
  $('#hiddenValue').val(data);
       
   var input ={
           id:data,
           method:'editTourPackageMaster'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   
   return responseData;
 }
 
 post(input)
 .then(data => {   
 
   document.querySelector("#plantitle").value = data.package_title;
   document.querySelector("#planprice").value = data.package_price;
   document.querySelector("#description").innerHTML = data.package_description;
   M.textareaAutoResize($('#description'));
   M.updateTextFields();
 
 })
 .catch(err => console.log(err));
 }


 // Edit User Profile  Master Function
function editUserprofileMaster(data){
  //$('#hiddenValue').val(data);
     
   var input ={
           id:data,
           method:'editUserprofileMaster'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   console.log(responseData);
   return responseData;
 }
 
 post(input)
 .then(data => {   
 
   document.querySelector("#full_name").value = data.Name;
   document.querySelector("#email").value = data.email;
   document.querySelector("#mobile").value = data.mobile;
   document.querySelector("#contact_no").value = data.contact_no;
   document.querySelector("#address").value = data.address;
   M.textareaAutoResize($('#address'));
   M.updateTextFields();
   console.log(data);
 
 })
 .catch(err => console.log(err));
 }


 function editOperatorprofileMaster(data){
  console.log(data);
  //$('#hiddenValue').val(data);
     
   var input ={
           id:data,
           method:'editOperatorprofileMaster'
       }
 
       async function post(data){
       const response = await fetch(`App_Code/AdminEditController.php?editid=${data.id}&method=${data.method}`, {
       method: 'POST',
       headers: {'Content-type': 'application/json'},
       body: JSON.stringify(data)
   });
   
   const responseData = await response.json();
   console.log(responseData);
   return responseData;
 }
 
 post(input)
 .then(data => {   
 
   document.querySelector("#owner_name").value = data.Name;
   document.querySelector("#owner_email").value = data.email;
   document.querySelector("#pro_email").value = data.pro_email;
   document.querySelector("#company_title").value = data.business_title;
   document.querySelector("#manager_name").value = data.manager_name;
   document.querySelector("#owner_mobile").value = data.mobile;
   document.querySelector("#reg_no").value = data.reg_no;
   document.querySelector("#tin_no").value = data.tin_no;
   document.querySelector("#office_contact").value = data.o_content_no;
   document.querySelector("#office_address").value = data.address;
   M.textareaAutoResize($('#office_address'));
   M.updateTextFields();
   console.log(data);
 
 })
 .catch(err => console.log(err));
 }