<template>
    <div class="container">
        <p id="success"></p>
       <a href="http://"><i @click.prevent="likePost" class="fa fa-thumbs-up" aria-hidden="true"></i>({{ totallike }})</a>
    </div>
</template>
 
<script>
    export default {
        props:['recipe'],
        data(){
            return {
                totallike:'',
            }
        },
        methods:{
            likeRecipe(){
                axios.recipe('/like/'+this.recipe,{recipe:this.recipe})
                .then(response =>{
                    this.getlike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getlike(){
                axios.recipe('/like',{recipe:this.recipe})
                .then(response =>{
                    console.log(response.data.recipe.like)
                    this.totallike = response.data.recipe.like
                })
            }
        },
        mounted() {
            this.getlike()
        }
    }
</script> 