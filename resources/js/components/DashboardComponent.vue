<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-secondary ">Dashboard</h2>
        <div class="container mb-3">
            <div class="row" v-if="user">
                <div class="col-sm border-right">
                    Name: {{user.name}}
                    Name: {{user.name}}
                </div>
                <div class="col-sm border-right">
                    Email: {{user.email}}
                </div>
                <div class="col-sm">
                    <button @click.prevent="logout" class="btn btn-primary btn-sm">Logout</button>
                </div>
            </div>
        </div>

        <h2 class="text-center p-1 text-white bg-secondary">Immeubles</h2>
        <table class="table table-striped table-bordered mt-2">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres d'habitants</th>
                <th scope="col">Rue</th>
                <th scope="col">Proprio</th>
            </tr>
            </thead>

            <tbody v-for="immeuble in userImmeubles">
            <tr >
                <th scope="row">{{ immeuble.id }}</th>
                <td>{{ immeuble.nb_residents }}</td>
                <td>{{ immeuble.street }}</td>

                <td>
                    <ul v-for="owner in immeuble.owners">
                        <li>{{ owner.name }}</li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data(){
        return{
            user: null,
            url: document.head.querySelector('meta[name="url"]').content,
            userImmeubles:[]
        }
    },
    methods:{
        logout(){
            let url = this.url + `/api/logout`;
            axios.post(url).then(()=>{
                this.$router.push({ name: "Home"})
            })
        },
        loadData() {
            let url = this.url + `/api/user/immeubles`;
            axios.get(url).then((res)=>{
                this.userImmeubles = res.data;
                console.log(this.userImmeubles)
            })
        },
    },
    mounted(){
        let url = this.url + `/api/user`;
        axios.get(url).then((res)=>{
            this.user = res.data
        })
    },
    created() {
        this.loadData();
    },
}
</script>
