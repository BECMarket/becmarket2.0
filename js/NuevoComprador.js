new Vue({
    el: '#app',
    data: {
        url: "http://localhost/BECMarket/",

        email: '',
        nombre: '',
        apellidos: '',
        contrasena: '',
        telefono: '',
        direccion: '',

        mensaje: '',
    },
    methods: {
        guardar: async function(){
            var form = new FormData();
            var fecha = new Date();
            var creacion = fecha.getFullYear() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getDate();
            form.append("email", this.email);
            form.append("nombre", this.nombre);
            form.append("apellidos", this.apellidos);
            form.append("contrasena", this.contrasena);
            form.append("telefono", this.telefono);
            form.append("direccion", this.direccion);
            form.append("fechaCreacion", creacion);
            try {
                var recurso = 'controladores/nuevoUsuario.php';
                const res = await fetch(this.url+recurso, {
                    method:"post",
                    body:form,
                });
                const resp = await res.json();
                console.log(resp);
                if (resp.msg == "si") {
                    window.location.href = this.url + "vistas/cliente/cliente-inicio.php";
                } else {
                    this.mensaje = "El correo ya se encuentra en uso";
                }
            } catch (error) {
                console.log(error);
            }
        },
    },
    created() {

    },
});
