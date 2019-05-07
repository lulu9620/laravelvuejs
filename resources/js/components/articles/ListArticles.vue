<template id="article-list">
    <div>
        <b-container class="text-center">
            <b-row>
                <b-col><p class="display-4">Articles List</p></b-col>
            </b-row>
            <b-row class="text-center">
                <b-col>
                    <router-link class="btn btn-warning mb-4" v-bind:to="{name:'AddArticle'}">Add New Post
                    </router-link>
                </b-col>
            </b-row>
            <b-row col lg="12">
                <b-card no-body class="overflow-hidden mb-3" style="max-height: 280px;width: 100%;" v-for="article in articles" v-bind:key="article.id">
                    <b-row no-gutters>
                        <b-col lg="4">
                            <b-card-img src="https://picsum.photos/400/400/?image=20" class="rounded-1"></b-card-img>
                        </b-col>
                        <b-col lg="8">
                            <b-card-body>
                                <b-card-title>{{article.title}}</b-card-title>
                                <b-card-text>
                                    {{article.body}}
                                </b-card-text>
                                <b-card-footer>
                                    <router-link class="btn btn-info" v-bind:to="{name: 'EditArticle', params: {id: article.id}}">More details</router-link>
                                    <router-link class="btn btn-danger" v-bind:to="{name: 'DeleteArticle', params: {id: article.id}}">Delete Article</router-link>
                                </b-card-footer>
                            </b-card-body>
                        </b-col>
                    </b-row>
                </b-card>
            </b-row>


        </b-container>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                articles: [],
            }
        },
        created() {
            axios.get('http://127.0.0.1:8000/articles')
                .then(response => this.articles = response.data);

        }
    }
</script>
<style scoped>

</style>