<template id="edit-article">
    <b-container>
        <b-row class="text-center">
            <b-col>
                <h3>Edit Article</h3>
            </b-col>
        </b-row>
        <form @submit.prevent="updateArticle">
            <b-row>
                <b-col>
                    <b-form-group label="Title:" label-for="title">
                        <b-form-input id="title" name="title" v-model="article.title" type="text" required
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
        name: "EditArticle",
        data:function() {
            return {
                article: {
                    id: '',
                    title: '',
                    body: '',
                }
            }
        },
        created:function(){
            let uri = 'http://127.0.0.1:8000/articles/edit/' +this.$route.params.id;
            this.axios.post(uri).then((response) => {
                this.article = response.data.data;
                console.log(response);
            })
        },
        methods:{
            updateArticle(){
                let uri = 'http://127.0.0.1:8000/articles/edit/' +this.$route.params.id;
                this.axios.post(uri,this.article).then((response) => {
                    this.$router.push({name: 'ListArticle'});
                })
            }
        }
    }
</script>

<style scoped>

</style>