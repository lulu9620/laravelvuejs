<template id="delete-article">
</template>

<script>
    export default {
        name: "DeleteArticle",
        data: function(){
            return {
                article:{
                    id: '',
                    title: '',
                    body: '',
                }
            }
        },
        created: function() {
            this.axios.delete('http://127.0.0.1:8000/articles/delete/' + this.$route.params.id)
                .then((response) => {
                    console.log(response);
                   this.$router.push({name:'ListArticle'});
                });
            },

    }
</script>

<style scoped>

</style>