
// MODAL REGISTRAR    


var btnAbrirModal = document.getElementById('btn-abrir-modal');
var btnCerrarModal = document.getElementById('btn-cerrar-modal');
var modal = document.getElementById('modal');

btnAbrirModal.addEventListener("click", function(){
  modal.showModal();

});

btnCerrarModal.addEventListener("click", function(){
  modal.close();
});

// MODAL EDITAR - ESTUDIANTE

  var ModalEditar = document.getElementById("modal-editar");
  var ModalEditOpen = document.querySelectorAll('.btn-abrir-modal-editar');
 

  ModalEditOpen.forEach(button =>{

    button.addEventListener('click', Editar);
  });

  async function Editar(e){
    
    let dato = e.currentTarget.getAttribute("value");
    const data = await fetch("editarEst.php?id="+dato);
    const si = await data.text();

    ModalEditar.innerHTML = si;
    ModalEditar.showModal();
    
  };

  // MODAL EDITAR - JURADOS

  var ModalEditarJur = document.getElementById("modal-editar-Jur");
  var ModalEditOpenJur = document.querySelectorAll('.btn-abrir-modal-editar-Jur');
 

  ModalEditOpenJur.forEach(buttonJur =>{

    buttonJur.addEventListener('click', EditarJur);
  });

  async function EditarJur(e){
    
    let datoJur = e.currentTarget.getAttribute("value");
    const dataJur = await fetch("editarJur.php?id="+datoJur);
    const Jur = await dataJur.text();

    ModalEditarJur.innerHTML = Jur;
    ModalEditarJur.showModal();
    
  };

  // MODAL EDITAR - DIRECTOR

  var ModalEditarDir = document.getElementById("modal-editar-Dir");
  var ModalEditOpenDir = document.querySelectorAll('.btn-abrir-modal-editar-Dir');
 

  ModalEditOpenDir.forEach(buttonDir =>{

    buttonDir.addEventListener('click', EditarDir);
  });

  async function EditarDir(e){
    
    let datoDir = e.currentTarget.getAttribute("value");
    const dataDir = await fetch("editarDir.php?id="+datoDir);
    const Dir = await dataDir.text();

    ModalEditarDir.innerHTML = Dir;
    ModalEditarDir.showModal();
    
  };

    // MODAL VER PROPUESTA

    var ModalPropu = document.getElementById("modal-ver-propuesta");
    var ModalAbrirPropu = document.querySelectorAll('.ver-propuesta');
   
  
    ModalAbrirPropu.forEach(button =>{
  
      button.addEventListener('click', VerPropuesta);
    });
  
    async function VerPropuesta(e){
      
      let datoVp = e.currentTarget.getAttribute("value");
     
      const dataVp = await fetch("visualizarPropu.php?id="+datoVp);
      const Vp = await dataVp.text();
  
      ModalPropu.innerHTML = Vp;
      ModalPropu.showModal();
      
    };

    // MODAL VER DIRECTOR

        var ModalVerDirector = document.getElementById("modal-ver-director");
        var ModalAbrirDirector = document.querySelectorAll('.ver-director');
       
      
        ModalAbrirDirector.forEach(button =>{
      
          button.addEventListener('click', VerDirector);
        });
      
        async function VerDirector(e){
          
          let datoVd = e.currentTarget.getAttribute("value");
      
        
          const dataVd = await fetch("visualizarDirector.php?id="+datoVd);
          const Vd = await dataVd.text();
      
          ModalVerDirector.innerHTML = Vd;
          ModalVerDirector.showModal();
         
          
        };

   // MODAL ASIGNAR DIRECTOR

   var ModalAsignarDirector = document.getElementById("modal-asignar-director");
   var ModalAbrirAsigDirector = document.querySelectorAll('.Asignar-director');
  
 
   ModalAbrirAsigDirector.forEach(button =>{
 
     button.addEventListener('click', AsignarDirector);
   });
 
   async function AsignarDirector(e){
     
     let datoAd = e.currentTarget.getAttribute("value");
   
   
     const dataAd = await fetch("Director-Asignar-Propuestas.php?id="+datoAd);
     const Ad = await dataAd.text();
 
     ModalAsignarDirector.innerHTML = Ad;
     ModalAsignarDirector.showModal();
    
     
   };     
   
   // VER MODAL - ESTUDIANTE

   var ModalEstudiante = document.getElementById("modal-estudiante");
   var ModalAbrirEstudiante = document.querySelectorAll('.ver-estudiante');
  
 
   ModalAbrirEstudiante.forEach(button =>{
 
     button.addEventListener('click', verEstudiantes);
   });
 
   async function verEstudiantes(e){
     
     let datoE = e.currentTarget.getAttribute("value");
   
     const dataE = await fetch("VisualizarEstudiante.php?id="+datoE);
     const E = await dataE.text();
 
     ModalEstudiante.innerHTML = E;
     ModalEstudiante.showModal();
    
     
   };  
   
   
   // MODAL ASIGNAR ESTUDIANTE

   var ModalAsignarEstudiante = document.getElementById("modal-asignar-estudiante");
   var ModalAbrirAsigEstudiante = document.querySelectorAll('.Asignar-estudiante');
  
 
   ModalAbrirAsigEstudiante.forEach(button =>{
 
     button.addEventListener('click', AsignarEstudiante);
   });
 
   async function AsignarEstudiante(e){
     
     let datoAE = e.currentTarget.getAttribute("value");
   
     const dataAE = await fetch("Estudiante-Asignar-Propuesta.php?id="+datoAE);
     const AE = await dataAE.text();
 
     ModalAsignarEstudiante.innerHTML = AE;
     ModalAsignarEstudiante.showModal();
    
     
   };

      // MODAL ASIGNAR ESTUDIANTE

      var ModalDesignarEstudiante = document.getElementById("modal-designar-estudiante");
      var ModalAbrirDesigEstudiante = document.querySelectorAll('.Designar-estudiante');
     
    
      ModalAbrirDesigEstudiante.forEach(button =>{
    
        button.addEventListener('click', DesignarEstudiante);
      });
    
      async function DesignarEstudiante(e){
        
        let datoDE = e.currentTarget.getAttribute("value");
      
        const dataDE = await fetch("Estudiante-Designar-Propuesta.php?id="+datoDE);
        const DE = await dataDE.text();
    
        ModalDesignarEstudiante.innerHTML = DE;
        ModalDesignarEstudiante.showModal();
       
        
      };

          // MODAL EDITAR PROPUESTA

      var ModalEditarPropuesta = document.getElementById("modal-editar-propuesta");
      var ModalAbrirEditarPropuesta = document.querySelectorAll('.form-boton-delete-act');
     
    
      ModalAbrirEditarPropuesta.forEach(button =>{
    
        button.addEventListener('click', Editarpropuesta);
      });
    
      async function Editarpropuesta(e){
        
        let datoEP = e.currentTarget.getAttribute("value");
      
        const dataEP = await fetch("Estudiante-Editar-Propuesta.php?id="+datoEP);
        const EP = await dataEP.text();
    
        ModalEditarPropuesta.innerHTML = EP;
        ModalEditarPropuesta.showModal();
       
        
      };

   
      
            









 // ---------- FUNCIONA

  // const data = await fetch("http://localhost/NoCoke/app/views/prueba.php?id="+dato);
    // const si = await data.text();
    // console.log(si);
    // ModalEditar.innerHTML = si;
   













