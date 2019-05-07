<template id="delete-article">
    <b-container>
        <b-row class="text-center mt-5">
            <div class="b-col text-center"><h3>Do you want to delete the article ?</h3></div>
            <form @submit.prevent="deletePost">
                <b-button type="submit" variant="danger" name="button">Delete!</b-button>
            </form>
        </b-row>
    </b-container>
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
            let uri = 'http://127.0.0.1:8000/articles/'+ this.$route.params.id;
            this.axios.get(uri).then((response) => {
                this.article = response.data.data;
            })
            },
        methods:{
            deletePost:function () {
                let uri = 'http://127.0.0.1:8000/articles/delete/' + this.$route.params.id;
                this.axios.delete(uri,this.article).then((response) => {
                    this.$router.push({name: 'ListArticle'});
                })
            }
        }
    }
</script>

<style scoped>

</style>