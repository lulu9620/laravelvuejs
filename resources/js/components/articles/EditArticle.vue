<template id="edit-article">
    <b-container>
        <b-row class="text-center">
            <b-col>
                <h3>Edit Article</h3>
            </b-col>
        </b-row>
        <form @submit.prevent="updateData">

            <b-row>
                <b-col>
                    <b-form-group label="Title:" label-for="title">
                        <b-form-input id="title" name="title" v-model="article.title" type="text"
                                      placeholder="Enter title..."></b-form-input>
                    </b-form-group>
                    <b-form-group label="Image:" label-for="image"></b-form-group>
                    <b-form-file id="image" placeholder="Choose a file..."
                                 drop-placeholder="Drop file here..."></b-form-file>
                </b-col>
                <b-col>
                    <b-form-group label="Description:" label-for="description">
                        <b-form-textarea v-model="article.body" name="body" type="text" id="description" required
                                         placeholder="" rows="5"></b-form-textarea>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row class="text-center">
                <b-col>
                    <b-button variant="success" type="submit">Update Article</b-button>
                </b-col>
            </b-row>
        </form>
    </b-container>
</template>

<script>
    export default {
        data:function() {
            return {
                article: [],
            }
        },
        name: "EditArticle",
        created:function(){
            this.getData();
        },
        methods:{
             getData(){
                this.axios.get('http://127.0.0.1:8000/articles/edit/' +this.$route.params.id)
                    .then((response) => {
                        this.article = response.data.article;
                    });
            },
            updateData(){
                 this.axios.put('http://127.0.0.1:8000/articles/editArticle/'+ this.$route.params.id,this.article)
                     .then((response) => {
                         console.log(response);
                         this.$router.push({name: 'ListArticle'});
                     });
            }
        }
    }
</script>

<style scoped>

</style>