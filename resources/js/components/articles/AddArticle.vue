<template id="add-article">
    <div>
        <b-container>
            <b-row class="text-center">
                <b-col>
                    <h3>Add new Article</h3>
                </b-col>
            </b-row>
            <form @submit.prevent="addArticle">
                <b-row>
                    <b-col>
                        <b-form-group label="Title:" label-for="title">
                            <b-form-input v-model="article.title" id="title" name="title" type="text" required
                                          placeholder="Enter title..."></b-form-input>
                        </b-form-group>
                        <b-form-group label="Image:" label-for="image"></b-form-group>
                        <b-form-file id="image" placeholder="Choose a file..."
                                     drop-placeholder="Drop file here..."></b-form-file>
                    </b-col>
                    <b-col>
                        <b-form-group label="Description:" label-for="description">
                            <b-form-textarea v-model="article.body" name="body" type="text" id="description" required
                                             placeholder="Enter description..." rows="5"></b-form-textarea>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row class="text-center">
                    <b-col>
                        <b-button variant="success" type="submit">Add Article</b-button>
                    </b-col>
                </b-row>
            </form>
        </b-container>
    </div>

</template>

<script>
    export default {
        name: "AddArticle",
        data() {
            return {
                article: {
                    title: '',
                    body: '',
                }
            }
        },
        methods: {
            addArticle: function () {
                this.axios.post("http://127.0.0.1:8000/articles/add-article",{
                    title:this.article.title,
                    body:this.article.body,
                }).then(function (data) {
                    console.log(data);
                });
            }
        }
    }
</script>

<style scoped>

</style>