/**
 * Ejemplo 4 de html2canvas para convertir el HTML de una web
 * a un elemento canvas - Descargar la captura como imagen PNG
 *
 * @author parzibyte
 */
//Definimos el botón para escuchar su click
const $boton = document.querySelector("#btnCapturar"), // El botón que desencadena
  $objetivo = document.body; // A qué le tomamos la fotocanvas
// Nota: no necesitamos contenedor, pues vamos a descargarla

// Agregar el listener al botón
$boton.addEventListener("click", () => {
  const opciones = {
    ignoreElements: elemento => {
      // Una función que ignora elementos. Regresa true si quieres que
      // el elemento se ignore, y false en caso contrario
      const tipo = elemento.nodeName.toLowerCase();
      // Si es imagen o encabezado h1, ignorar
      if (tipo === "navbar" || tipo === "btn-ss") {
        return true;
      }
      // Para todo lo demás, no ignorar
      return false
    }
  };
  html2canvas($objetivo, opciones) // Llamar a html2canvas y pasarle el elemento
    .then(canvas => {
      // Cuando se resuelva la promesa traerá el canvas
      // Crear un elemento <a>
      let enlace = document.createElement('a');
      enlace.download = "Imagen-diagnostico.png";
      // Convertir la imagen a Base64
      enlace.href = canvas.toDataURL();
      // Hacer click en él
      enlace.click();
    });
});
