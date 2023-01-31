   // MODAL VER FECHA_PRE

   var ModalEditarFechaPre = document.getElementById("modal-ver-fecha_pre");
   var ModalAbrirEditarFechaPre = document.querySelectorAll('.ver-fecha_pre');
            
           
             ModalAbrirEditarFechaPre.forEach(button =>{
           
               button.addEventListener('click', EditarFechaPre);
             });
           
             async function EditarFechaPre(e){
              
               let datoFP = e.currentTarget.getAttribute("value");
               const dataFP = await fetch("modal-fecha-presentacio.php?id="+datoFP);
               const FP = await dataFP.text();
           
               ModalEditarFechaPre.innerHTML = FP;
               ModalEditarFechaPre.showModal();
              
               
             };


                // MODAL VER RECINTO

   var ModalEditarRecinto = document.getElementById("modal-ver-recinto");
   var ModalAbrirEditarRecinto = document.querySelectorAll('.ver-recinto');
            
           
             ModalAbrirEditarRecinto.forEach(button =>{
           
               button.addEventListener('click', EditarRecinto);
             });
           
             async function EditarRecinto(e){
          
               let datoR = e.currentTarget.getAttribute("value");
               const dataR = await fetch("modal-fecha-presentacio.php?id="+datoR);
               const R = await dataR.text();
           
               ModalEditarRecinto.innerHTML = R;
               ModalEditarRecinto.showModal();
              
               
             };

             // MODAL VER JURADO

  var ModalEditarJurado = document.getElementById("modal-ver-jurado");
   var ModalAbrirEditarJurado = document.querySelectorAll('.ver-jurado');
            
           
             ModalAbrirEditarJurado.forEach(button =>{
           
               button.addEventListener('click', EditarJurado);
             });
           
             async function EditarJurado(e){
          
               let datoJ = e.currentTarget.getAttribute("value");
               const dataJ = await fetch("modal-ver-jurado.php?id="+datoJ);
               const J = await dataJ.text();
           
               ModalEditarJurado.innerHTML = J;
               ModalEditarJurado.showModal();
              
               
             }

  // MODAL VER VEREDICTO

  var ModalEditarVeredicto = document.getElementById("modal-ver-veredicto");
  var ModalAbrirEditarVeredicto = document.querySelectorAll('.ver-veredicto');
                     
  ModalAbrirEditarVeredicto.forEach(button =>{
                    
  button.addEventListener('click', EditarVeredicto);});
                    
  async function EditarVeredicto(e){
                   
  let datoV = e.currentTarget.getAttribute("value");
  const dataV = await fetch("modal-ver-veredicto.php?id="+datoV);
  const V = await dataV.text();
                    
  ModalEditarVeredicto.innerHTML = V;
  ModalEditarVeredicto.showModal();
                       
  }
   