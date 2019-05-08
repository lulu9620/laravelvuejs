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
                            <b-form-input v-model="article.title" id="title"  type="text" required
                                          placeholder="Enter title..."></b-form-input>
                        </b-form-group>
                        <b-form-group label="Image:" label-for="image"></b-form-group>
                        <b-form-file id="image" name="image" placeholder="Choose a file..."
                                     drop-placeholder="Drop file here..." @change="getImage" ></b-form-file>
                    </b-col>
                    <b-col>
                        <b-form-group label="Description:" label-for="description">
                            <b-form-textarea v-model="article.body" type="text" id="description" required
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
                    image: '',
                }
            }
        },

        methods: {
            getImage(e){
                var fileReader = new FileReader();
                fileReader.readAsDataURL(e.target.files[0]);
                fileReader.onload = (e) => {
                    this.article.image = e.target.result;
                    console.log(this.article);
                };
            },
            addArticle: function () {
                this.axios.post("http://127.0.0.1:8000/articles/add-article", this.article)
                    .then((response) => {
                       console.log(response);
                    });
            },
        }
    }
</script>

<style scoped>

</style>