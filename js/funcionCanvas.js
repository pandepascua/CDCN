 /* Variables de Configuracion */
 var idCanvas='canvas';
 var idForm='formulario_acta';
 var inputImagen='imagen';
 var estiloDelCursor='hand';
 var colorDelTrazo='#000';

 var img = new Image();//LO AGREGADO


 var colorDeFondo='#fff';
 var grosorDelTrazo=1;

 /* Variables necesarias */
 var contexto=null;
 var valX=0;
 var valY=0;
 var flag=false;
 var imagen=document.getElementById(inputImagen); 
 var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
 var altoCanvas=document.getElementById(idCanvas).offsetHeight;
 var Canvas=document.getElementById(idCanvas);

 



//******************* */
 

 /* Esperamos el evento load */
 window.addEventListener('load',IniciarDibujo,false);

 function IniciarDibujo(){
   /* Creamos pizarra */
   Canvas.style.cursor=estiloDelCursor;
   contexto=Canvas.getContext('2d');

 
//--------------------------
 img.src = "images/dolores_opt.JPG"//LO AGREGADO
 

  // Importante el onload

//---------------------
   contexto.fillStyle=colorDeFondo;
   contexto.fillRect(0,0,anchoCanvas,altoCanvas);
   contexto.strokeStyle=colorDelTrazo;
   contexto.lineWidth=grosorDelTrazo;
   contexto.lineJoin='round';
   contexto.lineCap='round';
   /* Capturamos los diferentes eventos */
   Canvas.addEventListener('mousedown',MouseDown,false);// Click pc
   Canvas.addEventListener('mouseup',MouseUp,false);// fin click pc
   Canvas.addEventListener('mousemove',MouseMove,false);// arrastrar pc
   Canvas.addEventListener('touchstart',TouchStart,false);// tocar pantalla tactil
   Canvas.addEventListener('touchmove',TouchMove,false);// arrastras pantalla tactil
   Canvas.addEventListener('touchend',TouchEnd,false);// fin tocar pantalla dentro de la pizarra
   Canvas.addEventListener('touchleave',TouchEnd,false);// fin tocar pantalla fuera de la pizarra
 }

 img.onload = function(){//LO AGREGADO
   contexto.drawImage(img,0 , 0);//LO AGREGADO
 }
 function MouseDown(e){
   flag=true;
   contexto.beginPath();
   valX=e.pageX-posicionX(Canvas); valY=e.pageY-posicionY(Canvas);
   contexto.moveTo(valX,valY);
 }

 function MouseUp(e){
   contexto.closePath();
   flag=false;
 }

 function MouseMove(e){
   if(flag){
     contexto.beginPath();
     contexto.moveTo(valX,valY);
     valX=e.pageX-posicionX(Canvas); valY=e.pageY-posicionY(Canvas);
     contexto.lineTo(valX,valY);
     contexto.closePath();
     contexto.stroke();
   }
 }

 function TouchMove(e){
   e.preventDefault();
   if (e.targetTouches.length == 1) { 
     var touch = e.targetTouches[0]; 
     MouseMove(touch);
   }
 }

 function TouchStart(e){
   if (e.targetTouches.length == 1) { 
     var touch = e.targetTouches[0]; 
     MouseDown(touch);
   }
 }

 function TouchEnd(e){
   if (e.targetTouches.length == 1) { 
     var touch = e.targetTouches[0]; 
     MouseUp(touch);
   }
 }

 function posicionY(obj) {
   var valor = obj.offsetTop;
   if (obj.offsetParent) valor += posicionY(obj.offsetParent);
   return valor;
 }

 function posicionX(obj) {
   var valor = obj.offsetLeft;
   if (obj.offsetParent) valor += posicionX(obj.offsetParent);
   return valor;
 }

 /* Limpiar pizarra */
 function LimpiarTrazado(){
   contexto=document.getElementById(idCanvas).getContext('2d');
   contexto.fillStyle=colorDeFondo;
   contexto.fillRect(0,0,anchoCanvas,altoCanvas);
 }

 /* Enviar el trazado */
 function GuardarTrazado(){
   imagen.value=document.getElementById(idCanvas).toDataURL();
   document.forms[idForm].submit();
 }
 
 function reiniciar(){
  location.reload(contexto);
 } 
 function clearcanvas() {
	//elimina todo lo del canvas --->
	contexto.clearRect(0, 0, canvas.width, canvas.height);
}