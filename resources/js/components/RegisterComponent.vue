<template>
    <form class="w-50 mx-auto">
        <!-- Name input -->
        <div class="form-outline mb-4">
            <span class="" v-if="errors.name">{{errors.name[0]}}</span>
            <input id="name" type="text" class="form-control" placeholder="Nom" v-model="form.name"/>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input id="email" type="email" class="form-control" placeholder="Email" v-model="form.email"/>
        </div>

        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <!-- Password input -->
            <div class="col">
                <div class="form-outline">
                    <input id="password" type="password" class="form-control" placeholder="Mot de passe" v-model="form.password" name="password"/>
                </div>
            </div>
            <!-- Password confirmation -->
            <div class="col">
                <div class="form-outline">
                    <input id="password_confirmation" type="password" class="form-control" placeholder="Confirmer votre mot de passe" v-model="form.password_confirmation" name="password_confirmation"/>
                </div>
            </div>
        </div>

        <!-- Submit button -->
        <button @click.prevent="saveForm" type="submit" class="btn btn-primary btn-block mb-4">Enregistrer</button>
    </form>

</template>
<script>
export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                password:'',
                password_confirmation:''
            },
            errors:[],
            url: document.head.querySelector('meta[name="url"]').content,
        }
    },
    methods:{
        saveForm(){
            let url = this.url + `/api/register`;
            axios.post(url, this.form).then((response) =>{
                if (response.status) {
                    document.getElementById("name").value = '';
                    document.getElementById("email").value = '';
                    document.getElementById("password").value = '';
                    document.getElementById("password_confirmation").value = '';
                    this.$utils.showSuccess('success', response.message);
                } else {
                    this.$utils.showError('error', response.message)
                }
            }).catch((error) =>{
                this.errors.push(error.response.date.error)
            })
        }
    }
}
</script>
