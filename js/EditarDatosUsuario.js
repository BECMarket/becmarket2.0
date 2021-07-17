new Vue({
    el:'#app',
    data:{
        url: "http://localhost/BECMarket/",
        nombre: '',
        apellidos: '',
        direccion: '',
        telefono: '',
    },
    methods:{
        editar: async function(){
            var form = new FormData();
            //datos
            form.append("nombre",this.nombre);
            form.append("apellidos",this.apellidos);
            form.append("direccion",this.direccion);
            form.append("telefono",this.telefono);
            try {
                var rec = 'controladores/EditarDatosUsuario.php';
                const res = await fetch(this.url+rec,{
                    method: 'post',
                    body: form,
                });
                const resp = await res.text();
                console.log(resp);
                location.reload();
            } catch (error) {
                console.log(error);
            }
        }
        
    },
    created(){

    }
});