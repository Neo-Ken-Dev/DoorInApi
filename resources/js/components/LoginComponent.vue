<template>
    <form class="w-50 mx-auto">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <span class="w-full text-red-500" v-if="errors.email">{{errors.email[0]}}</span>
            <input type="email" class="form-control" placeholder="Adresse email"  v-model="form.email"/>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" class="form-control" placeholder="Mot de passe" v-model="form.password"/>
        </div>

        <!-- Submit button -->
        <button @click.prevent="loginUser" type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

    </form>

</template>
<script>
export default {
    data(){
        return{
            form:{
                email: '',
                password: ''
            },
            errors: [],
            url: document.head.querySelector('meta[name="url"]').content,
        }
    },
    methods:{
        loginUser(){
            let url = this.url + `/api/login`;
            axios.post(url, this.form).then(() =>{
                this.$router.push({ name: "Dashboard"});
            }).catch((error) =>{
                this.errors = error.response.data.errors;
            })
        }
    }
}
</script>
