
//<![CDATA[
// Script para sustituir imágenes rotas
function ImagenOk(img) {
if (!img.complete) return false;
if (typeof img.naturalWidth != "undefined" && img.naturalWidth == 0) return false;
return true;
}
function RevisarImagenesRotas() {
var replacementImg = "https://lh4.googleusercontent.com/-3UgRMogbe88/TgVOkNvmg4I/AAAAAAAABhE/AGffCXH_sMk/no-imagen.png";
for (var i = 0; i < document.images.length; i++) {
if (!ImagenOk(document.images[i])) {
document.images[i].src = replacementImg;
}}}
window.onload=RevisarImagenesRotas;
// ]]>
