const items = document.querySelectorAll(".bEliminar");

items.forEach((item) => {
  item.addEventListener("click", function () {
    const habitacion = this.dataset.habitacion;

    const confirm = window.confirm(
      "Deseas realizar check out de la habitacion " + habitacion + " ?"
    );

    if (confirm) {
      httpRequest(
        "https://hotel-app-sql.herokuapp.com/consulta/eliminarHuesped/" +
          habitacion,
        function () {
          // console.log(this.responseText);
          document.querySelector("#respuesta").innerHTML = this.responseText;
          const tbody = document.querySelector("#tbody-huespedes");
          const fila = document.querySelector('#fila-' + habitacion);
          tbody.removeChild(fila);
        }
      );
    }
  });
});

function httpRequest(url, callback) {
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.send();

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      callback.apply(http);
    }
  };
}
