function logar(){
  let email=  document.querySelector("#email").value;
  let senha= document.querySelector("#senha").value;

    if (email === "italo" && senha ==="123") {
        window.location.href="painel.html";
    } else {
        alert("Não é possível ser acessado")
    }

}