<template>
    <div class="container">
        <p id="success"></p>
       <a href="http://"><i @click.prevent="disLikePost" class="fa fa-thumbs-down" aria-hidden="true"></i>({{ totalDislike }})</a>
    </div>
</template>
 
<script>
    export default {
        props:['recipe'],
        data(){
            return {
                totalDislike:'',
            }
        },
        methods:{
            disLikeRecipe(){
                axios.recipe('/dislike/'+this.recipe,{recipe:this.recipe})
                .then(response =>{
                    this.getDislike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getDislike(){
                axios.recipe('/dislike',{recipe:this.recipe})
                .then(response =>{
                    console.log(response.data.recipe.dislike)
                    this.totalDislike = response.data.recipe.dislike
                })
            }
        },
        mounted() {
            this.getDislike()
        }
    }
</script> 